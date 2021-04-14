import EventManager from './EventManager'
import GalleryModal from './GalleryModal'
import DataManager from './DataManager'

export default class SummernoteGallery {
    constructor(options) {
        this.options = $.extend({
            name: 'summernote-gallery',
            button_label: '<i class="fa fa-file-image-o"></i>',
            tooltip: 'summernote gallery'
        }, options);

        this.event = new EventManager();

        this.plugin_default_options = {}
    }

    // set the focus to the last focused element in the editor
    recoverEditorFocus() {
        var last_focused_el = $(this.editor).data('last_focused_element');
        if(typeof last_focused_el !== "undefined") {
            var editor = this.editable;
            var range = document.createRange();
            var sel = window.getSelection();
            var cursor_position =  last_focused_el.length;

            range.setStart(last_focused_el, cursor_position);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
            editor.focus();
        }
    }

    saveLastFocusedElement() {
        var focused_element = window.getSelection().focusNode;
        var parent = $(this.editable).get(0);
        if ($.contains(parent, focused_element)) {
            $(this.editor).data('last_focused_element', focused_element)
        }
    }

    attachEditorEvents() {
        var _this = this;

        $(this.editable).on('keypress, mousemove', function() {
            _this.saveLastFocusedElement();
        })
    }

    initGallery(context) {
        this.context = context;
        this.editor = this.context.layoutInfo.note;
        this.editable = this.context.layoutInfo.editable;
        this.plugin_options = $.extend(
            this.plugin_default_options,
            this.context.options[this.options.name] || {}
        );

        this.modal = new GalleryModal(this.plugin_options.modal);
        this.data_manager = new DataManager(this.plugin_options.source);

        this.attachModalEvents();
        this.attachEditorEvents();
    }

    attachModalEvents() {
        var _this = this;

        this.modal.event.on('beforeSave', function (gallery_modal) {
            _this.recoverEditorFocus();
        });

        this.modal.event.on('save', function (gallery_modal, $image) {
            // add selected images to summernote editor
            _this.context.invoke(
                'editor.pasteHTML',
                '<img src="' + $image.attr('src') + '" alt="' + ($image.attr('alt') || "") + '" />'
            );
        });

        this.modal.event.on('scrollBottom', function (gallery_modal) {
            if (_this.modal.options.loadOnScroll) {
                _this.data_manager.fetchNext();
            }
        });

        this.modal.event.on('close', function (gallery_modal) {
            _this.data_manager.init();
            _this.modal.clearContent();
        });
    }

    createButton() {
        var _this = this;

        var button = $.summernote.ui.button({
            contents: this.options.button_label,
            tooltip: this.options.tooltip,
            click: function() {
                _this.openGallery();
            }
        });

        // create jQuery object from button instance.
        return button.render();
    }

    attachDataEvents() {
        var _this = this;

        this.data_manager.event
        .on('beforeFetch', function () {
            _this.modal.showLoading();
        })
        .on('fetch', function (data, page, link) {
            _this.modal.addImages(data, page);

            setTimeout(function () {
                if (_this.modal.options.loadOnScroll && !_this.modal.imagesContainerHasScroll()) {
                    // The loadOnScroll wont work if the images container doesn't have the scroll displayed,
                    // so we need to keep loading the images until the scroll shows.
                    _this.data_manager.fetchNext();
                }
            }, 2000)
        })
        .on('afterFetch', function () {
            _this.modal.hideLoading();
        })
        .on('error', function (error) {
            _this.modal.showError(error, true);
        });
    }

    openGallery() {
        this.attachDataEvents();
        this.data_manager.fetchData();
        this.modal.open();
    }
}