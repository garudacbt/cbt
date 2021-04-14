/**
 * 
 * copyright 2018 [Taal & Digitaal | Hendri Smit].
 * email: hen3smit@gmail.com
 * license: MIT
 * 
 */
(function (factory) {
    /* Global define */
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(window.jQuery);
    }
}(function ($) {
    $.extend(true, $.summernote.lang, {
        'en-US': {
            audio: {
                audio: 'Audio',
                insert: 'Insert Audio',
                selectFromFiles: 'Select from files',
                url: 'Audio URL',
                maximumFileSize: 'Maximum file size',
                maximumFileSizeError: 'Maximum file size exceeded.'
            }
        },
        'nl-NL': {
            audio: {
                audio: 'Audio',
                insert: 'Audio invoegen',
                selectFromFiles: 'Selecteer een bestand',
                url: 'URL van de audio',
                maximumFileSize: 'Maximale bestandsgrootte',
                maximumFileSizeError: 'Bestand te groot.'
            }
        },
    });

    $.extend($.summernote.options, {
        audio: {
            icon: '<i class="note-icon-audio"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 75" width="12px" height="12px"><g id="g1"><polygon id="polygon1" points="39.389,13.769 22.235,28.606 6,28.606 6,47.699 21.989,47.699 39.389,62.75 39.389,13.769" style="stroke:#111111;stroke-width:5;stroke-linejoin:round;fill:#111111;" /><path id="path1" d="M 48.128,49.03 C 50.057,45.934 51.19,42.291 51.19,38.377 C 51.19,34.399 50.026,30.703 48.043,27.577" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/><path id="path2" d="M 55.082,20.537 C 58.777,25.523 60.966,31.694 60.966,38.377 C 60.966,44.998 58.815,51.115 55.178,56.076" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/><path id="path1" d="M 61.71,62.611 C 66.977,55.945 70.128,47.531 70.128,38.378 C 70.128,29.161 66.936,20.696 61.609,14.01" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/></g></svg></i>'
        },
        callbacks: {
            onAudioUpload: null,
            onAudioUploadError: null,
            onAudioLinkInsert: null
        }
    });

    $.extend($.summernote.plugins, {
        /**
         *  @param {Object} context - context object has status of editor.
         */
        'audio': function (context) {
            var self = this,
                    // ui has renders to build ui elements
                    // for e.g. you can create a button with 'ui.button'
                    ui = $.summernote.ui,
                    $note = context.layoutInfo.note,
                    // contentEditable element
                    $editor = context.layoutInfo.editor,
                    $editable = context.layoutInfo.editable,
                    $toolbar = context.layoutInfo.toolbar,
                    // options holds the Options Information from Summernote and what we extended above.
                    options = context.options,
                    // lang holds the Language Information from Summernote and what we extended above.
                    lang = options.langInfo;

            context.memo('button.audio', function () {
                // Here we create a button
                var button = ui.button({

                    // icon for button
                    contents: options.audio.icon,

                    // tooltip for button
                    tooltip: lang.audio.audio,
                    click: function (e) {
                        context.invoke('audio.show');
                    }
                });
                return button.render();
            });

            this.initialize = function () {

                // This is how we can add a Modal Dialog to allow users to interact with the Plugin.

                // get the correct container for the plugin how it's attached to the document DOM.
                var $container = options.dialogsInBody ? $(document.body) : $editor;

                var audioLimitation = '';
                if (options.maximumAudioFileSize) {
                    var unit = Math.floor(Math.log(options.maximumAudioFileSize) / Math.log(1024));
                    var readableSize = (options.maximumAudioFileSize / Math.pow(1024, unit)).toFixed(2) * 1 +
                            ' ' + ' KMGTP'[unit] + 'B';
                    audioLimitation = '<small>' + lang.audio.maximumFileSize + ' : ' + readableSize + '</small>';
                }

                // Build the Body HTML of the Dialog.
                var body = [
                    '<div class="form-group note-form-group note-group-select-from-files">',
                    '<label class="note-form-label">' + lang.audio.selectFromFiles + '</label>',
                    '<input class="note-audio-input note-form-control note-input" ',
                    ' type="file" name="files" accept="audio/*" multiple="multiple" />',
                    '</div>',
                    audioLimitation,
                    '<div class="form-group note-group-image-url" style="overflow:auto;">',
                    '<label class="note-form-label">' + lang.audio.url + '</label>',
                    '<input class="note-audio-url form-control note-form-control note-input ',
                    ' col-md-12" type="text" />',
                    '</div>'
                ].join('');

                // Build the Footer HTML of the Dialog.
                var footer = '<button href="#" class="btn btn-primary note-audio-btn">' + lang.audio.insert + '</button>';

                this.$dialog = ui.dialog({

                    // Set the title for the Dialog. Note: We don't need to build the markup for the Modal
                    // Header, we only need to set the Title.
                    title: lang.audio.insert,

                    // Set the Body of the Dialog.
                    body: body,

                    // Set the Footer of the Dialog.
                    footer: footer

                            // This adds the Modal to the DOM.
                }).render().appendTo($container);
            };

            this.destroy = function () {
                ui.hideDialog(this.$dialog);
                this.$dialog.remove();
            };

            this.bindEnterKey = function ($input, $btn) {
                $input.on('keypress', function (event) {
                    if (event.keyCode === 13)
                        $btn.trigger('click');
                });
            };

            this.bindLabels = function () {
                self.$dialog.find('.form-control:first').focus().select();
                self.$dialog.find('label').on('click', function () {
                    $(this).parent().find('.form-control:first').focus();
                });
            };

            /**
             * @method readFileAsDataURL
             *
             * read contents of file as representing URL
             *
             * @param {File} file
             * @return {Promise} - then: dataUrl
             *
             * @todo this method already exists in summernote.js so we should use that one
             */
            this.readFileAsDataURL = function (file) {
                return $.Deferred(function (deferred) {
                    $.extend(new FileReader(), {
                        onload: function (e) {
                            var dataURL = e.target.result;
                            deferred.resolve(dataURL);
                        },
                        onerror: function (err) {
                            deferred.reject(err);
                        }
                    }).readAsDataURL(file);
                }).promise();
            };

            this.createAudio = function (url) {
                // audio url patterns (mp3, ogg)
                var mp3RegExp = /^.+.(mp3)$/;
                var mp3Match = url.match(mp3RegExp);

                var oggRegExp = /^.+.(ogg|oga)$/;
                var oggMatch = url.match(oggRegExp);

                var base64RegExp = /^data:(audio\/mpeg|audio\/ogg).+$/;
                var base64Match = url.match(base64RegExp);

                var $audio;
                if (mp3Match || oggMatch || base64Match) {
                    $audio = $('<audio controls>')
                            .attr('src', url);
                } else {
                    // this is not a known audio link. Now what, Cat? Now what?
                    return false;
                }

                $audio.addClass('note-audio-clip');

                return $audio;
            };

            this.insertAudio = function (src, param) {
                var $audio = self.createAudio(src);

                if (!$audio) {
                    context.triggerEvent('audio.upload.error');
                }

                context.invoke('editor.beforeCommand');

                if (typeof param === 'string') {
                    $audio.attr('data-filename', param);
                }

                $audio.show();
                context.invoke('editor.insertNode', $audio[0]);

                context.invoke('editor.afterCommand');
            };

            this.insertAudioFilesAsDataURL = function (files) {
                $.each(files, function (idx, file) {
                    var filename = file.name;
                    if (options.maximumAudioFileSize && options.maximumAudioFileSize < file.size) {
                        context.triggerEvent('audio.upload.error', lang.audio.maximumFileSizeError);
                    } else {
                        self.readFileAsDataURL(file).then(function (dataURL) {
                            return self.insertAudio(dataURL, filename);
                        }).fail(function () {
                            context.triggerEvent('audio.upload.error');
                        });
                    }
                });
            };

            this.show = function (data) {
                context.invoke('editor.saveRange');
                this.showAudioDialog().then(function (data) {
                    // [workaround] hide dialog before restore range for IE range focus
                    ui.hideDialog(self.$dialog);
                    context.invoke('editor.restoreRange');

                    if (typeof data === 'string') { // audio url
                        // If onAudioLinkInsert set
                        if (options.callbacks.onAudioLinkInsert) {
                            context.triggerEvent('audio.link.insert', data);
                        } else {
                            self.insertAudio(data);
                        }
                    } else { // array of files
                        // If onAudioUpload set
                        if (options.callbacks.onAudioUpload) {
                            context.triggerEvent('audio.upload', data);
                        } else {
                            // else insert Audio as dataURL
                            self.insertAudioFilesAsDataURL(data);
                        }
                    }
                }).fail(function () {
                    context.invoke('editor.restoreRange');
                });
            };
            this.showAudioDialog = function () {
                return $.Deferred(function (deferred) {
                    var $audioInput = self.$dialog.find('.note-audio-input');
                    var $audioUrl = self.$dialog.find('.note-audio-url');
                    var $audioBtn = self.$dialog.find('.note-audio-btn');

                    ui.onDialogShown(self.$dialog, function () {
                        context.triggerEvent('dialog.shown');

                        // Cloning AudioInput to clear element.
                        $audioInput.replaceWith($audioInput.clone().on('change', function(event) {
                            deferred.resolve(event.target.files || event.target.value);
                        }).val(''));

                        $audioBtn.click(function (e) {
                            e.preventDefault();
                            deferred.resolve($audioUrl.val());
                        });

                        $audioUrl.on('keyup paste', function() {
                            var url = $audioUrl.val();
                            ui.toggleBtn($audioBtn, url);
                        }).val('');

//                        if (!env.isSupportTouch) {
//                            $audioUrl.trigger('focus');
//                        }
                        self.bindEnterKey($audioUrl, $audioBtn);
                        self.bindLabels();
                    });
                    ui.onDialogHidden(self.$dialog, function () {
                        $audioInput.off('change');
                        $audioUrl.off('keyup paste keypress');
                        $audioBtn.off('click');

                        if (deferred.state() === 'pending')
                            deferred.reject();
                    });
                    ui.showDialog(self.$dialog);
                });
            };
        }
    });
}));

