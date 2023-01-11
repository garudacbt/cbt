! function(root, factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], function($) {
            return factory($, window, document);
        });
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function(root, $) {
            if (!root) {
                root = window;
            }
            if (!$) {
                $ = typeof window !== 'undefined' ? // jQuery's factory checks for a global window
                    require('jquery') :
                    require('jquery')(root);
            }
            return factory($, root, root.document);
        };
    } else {
        // Browser
        factory(jQuery, window, document);
    }
}(this, function($, w, d) {
    'use strict';

    var _multiModalClass = 'multi-step';
    var _modalHeaderClass = 'card-step-header';
    var _modalBodyClass = 'card-step-body';
    var _modalFooterClass = 'card-step-footer';
    var _modalStepsClass = 'card-steps';
    var _stepDotClass = 'dot';
    var _stepLabelClass = 'label';
    var _stepClass = 'step';
    var _stepContentContainerClass = 'step-content-container';
    var _stepContentClass = 'step-content';
    var _contentInnerClass = 'content-inner';
    var _prevClass = 'btn-prev';
    var _skipClass = 'btn-skip';
    var _nextClass = 'btn-next';
    var _currentClass = 'current';
    var _completedClass = 'completed';
    var _skippedClass = 'skipped';
    var _disabledClass = 'disabled';
    var _skippableClass = 'skippable';
    var defaults = {
        data: [],
        final: 'Are you sure you want to confirm?',
        finalLabel: 'Selesai',
        title: '',
        prevText: 'Sebelumnya',
        skipText: 'Lewati',
        nextText: 'Selanjutnya',
        finishText: 'Mulai Applikasi',
        modalSize: 'md',
        onClose: function() {

        },
        onDestroy: function($elem) {

        }

    };

    var multiStep = function($element, options) {
        var $this = this;
        this.element = $element;
        this.options = $.extend({}, defaults, options);
        this.destroy = function() {
            this.element.html('');
            var id = this.element.attr('data-id')
            this.element.attr('id', id);
            this.element.removeAttr('data-id')
                .removeAttr('class');
                //.removeAttr('tabindex')
                //.removeAttr('role')
                //.removeAttr('aria-labelledby')
                //.removeAttr('aria-hidden');
            this._onDestroy();
        };
        this.init();
    };

    function uuidv4() {
        return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        )
    }

    multiStep.prototype = {
        constructor: multiStep,
        init: function() {
            this._buildModal();
            this._buildMultiStep();
        },
        update: function(options) {
            this.options = $.extend({}, this.options, options);
            this.init();
        },
        _buildMultiStep: function() {

            var $element = this.element;
            var id = $element.attr('id')
            if (!id || id.trim() == '') {
                id = uuidv4();
                $element.attr('id', id);
            }
            this.id = id;
            $element.addClass(_multiModalClass);
            var $header = $element.find(`.${_modalHeaderClass}`);
            this.header = $header;
            $header.append(`<div class="${_modalStepsClass}"></div>`);
            var $modalSteps = $header.find(`.${_modalStepsClass}`);
            this.modalSteps = $modalSteps;
            var $body = $element.find(`.${_modalBodyClass}`);
            this.body = $body;
            var $footer = $element.find(`.${_modalFooterClass}`);
            this.footer = $footer;
            this._buildDataContent();
            this._buildFooterContent();
            this._attachEvents();
            this._initialModal();

        },
        _buildModal: function() {
            var id = this.element.attr('id');
            var dataId = id;
            if (this.options.id) {
                id = this.options.id;
            }
            if (!id) {
                id = uuidv4();
            }
            this.element.attr('id', id)
                .attr('data-id', dataId)
                .attr('class', 'card-step');
                //.attr('tabindex', '-1')
                //.attr('role', 'dialog')
                //.attr('aria-labelledby', `${id}Title`)
                //.attr('aria-hidden', 'true');
            this.element.html(`<div class="multi-step">
<div class="card card-step-content" style="background-color: rgba(255,255,255,.7);">
    <div class="card-header">    
        <div class="card-step-header">
            <h5 class="card-step-title" id="${id}LongTitle">${this.options.title}</h5>
        </div>
    </div>
<div class="card-body card-step-body"></div>
                                <div class="overlay d-none loading">
                                    <div class="spinner-grow"></div>
                                </div>
<div class="modal-footer card-step-footer"></div>
</div>
</div>`);
            var $this = this;
            this.element.on('hide.bs.modal', function() {
                $this._initialModal();
                $this._onClose();
            }).on('hidden.bs.modal', function() {
                $this._initialModal();
                $this._onClose();
            })
        },
        _onClose: function() {
            if (typeof this.options.onClose == 'function') {
                this.options.onClose(this.element);
            }
        },
        _onDestroy: function() {
            if (typeof this.options.onDestroy == 'function') {
                this.options.onDestroy();
            }
        },
        _buildDataContent: function() {
            var data = this.options.data;
            if (data && data.length > 0) {
                var steps = '';
                var stepContent = '';
                this.data = data;
                this.stepsCount = data.length;
                for (var i in data) {
                    var currentStep = Number(i) + 1;
                    var stepLabel = data[i].label ? data[i].label : `Step ${currentStep}`;
                    steps += `<div class="${_stepClass}" data-step="${currentStep}" data-step-skip=${data[i].skip==true}>
                                <div class="${_stepDotClass}"></div>
                                <label class="${_stepLabelClass}">${stepLabel}</label>
                                </div>`;
                    stepContent += `<div class="${_stepContentClass}" data-step="${currentStep}" data-step-skip=${data[i].skip==true}>
                                       <div class="${_contentInnerClass}">${data[i].content}</div>
                                       </div>`
                }
                steps += `<div class="${_stepClass}" data-step="${data.length+1}" data-step-skip=false>
                                <div class="${_stepDotClass}"></div>
                                <label class="${_stepLabelClass}">${this.options.finalLabel}</label>
                                </div>`;
                stepContent += `<div class="${_stepContentClass}" data-step="${data.length+1}" data-step-skip=false>
                                       <div class="${_contentInnerClass}">${this.options.final}</div>
                                       </div>`
                this.modalSteps.html(steps);
                stepContent = `<div class="${_stepContentContainerClass}">${stepContent}</div>`;
                this.body.html(stepContent);
                this.stepContentContainer = this.body.find(`.${_stepContentContainerClass}`);
            }

        },
        _buildFooterContent: function() {
            var footer = `<button type="button" class="btn-success btn ${_prevClass}">${this.options.prevText}</button>
            <button type="button" class="btn-warning btn ${_skipClass}">${this.options.skipText}</button>
            <button type="button" class="btn-primary btn ${_nextClass}">${this.options.nextText}</button>`;
            this.footer.html(footer);
            this.prev = this.footer.find(`.${_prevClass}`);
            this.skip = this.footer.find(`.${_skipClass}`);
            this.next = this.footer.find(`.${_nextClass}`);
        },
        _attachEvents: function() {
            this._attachPrevEvent();
            this._attachSkipEvent();
            this._attachNextEvent();
        },
        _attachPrevEvent: function() {
            var $this = this;
            $this.prev.click(function() {
                $this.next.text($this.options.nextText);
                var prevIdx = $this.currentStepIdx - 1;
                if (prevIdx <= 1) {
                    prevIdx = 1;
                    $this.prev.addClass(_disabledClass).attr(_disabledClass, _disabledClass);
                } else {
                    $this.prev.removeClass(_disabledClass).removeAttr(_disabledClass);
                }
                $this._currentStep(prevIdx);
                $this._checkSkip();
                $this._showContent(prevIdx);
            });
        },
        _checkSkip: function() {
            var skipStep = this.modalSteps.find(`.${_currentClass}`).attr('data-step-skip') == 'true';
            if (skipStep) {
                this.skip.addClass(_skippableClass);
            } else {
                this.skip.removeClass(_skippableClass);
            }

        },
        _attachSkipEvent: function() {
            var $this = this;
            $this.skip.click(function() {
                var nextIdx = $this.currentStepIdx;
                if (nextIdx + 1 <= 1) {
                    $this.prev.addClass(_disabledClass).attr(_disabledClass, _disabledClass);
                } else {
                    $this.prev.removeClass(_disabledClass).removeAttr(_disabledClass);
                }
                $this._skipStep(nextIdx);
                $this._showContent(nextIdx + 1);

            });
        },
        _attachNextEvent: function() {
            var $this = this;
            $this.next.click(function() {
                var nextIdx = $this.currentStepIdx;
                if (nextIdx >= $this.stepsCount + 1) {
                    $this.element.modal('hide');
                    return;
                }
                if (nextIdx >= $this.stepsCount) {
                    $this.next.text($this.options.finishText);
                } else {
                    $this.next.text($this.options.nextText);
                }
                if (nextIdx + 1 <= 1) {
                    $this.prev.addClass(_disabledClass).attr(_disabledClass, _disabledClass);
                } else {
                    $this.prev.removeClass(_disabledClass).removeAttr(_disabledClass);
                }
                $this._completeStep(nextIdx);
                $this._showContent(nextIdx + 1);

            });
        },
        _currentStep: function(i) {
            var idx = this.modalSteps.find(`[data-step]`).length;
            this._recursiveCurrentStep(i, idx);
            this.currentStepIdx = i;

        },
        _showContent: function(i) {
            var $this = this;
            if (this.stepContentContainer) {
                this.stepContentContainer.find(`.${_stepContentClass}`).removeClass('active');
                this.stepContentContainer.find(`[data-step="${i}"]`).addClass('active');

            }

        },
        _recursiveCurrentStep: function(target, i) {
            if (i < 1) {
                return;
            }
            var currentStep = this.modalSteps.find(`[data-step="${i}"]`);
            var $this = this;
            if (target == i) {
                currentStep.removeClasses([_completedClass, _skippedClass]).addClass(_currentClass);
                $this._checkSkip();
            } else {
                if (currentStep.hasAnyClass([_completedClass, _currentClass, _skippedClass])) {
                    currentStep.removeClasses([_completedClass, _currentClass, _skippedClass]);
                    setTimeout(function() {
                        $this._recursiveCurrentStep(target, --i);
                    }, 200);
                } else {
                    $this._recursiveCurrentStep(target, --i);
                }
            }

        },
        _completeStep: function(i) {
            var $this = this;
            this.modalSteps.find(`[data-step="${i}"]`).addClass(_completedClass).removeClasses([_currentClass, _skippedClass]);
            setTimeout(function() {
                $this.modalSteps.find(`[data-step="${Number(i)+1}"]`).addClass(_currentClass);
                $this.currentStepIdx = Number(i) + 1;
                $this._checkSkip();
            }, 200);
        },
        _skipStep: function(i) {
            var $this = this;
            this.modalSteps.find(`[data-step="${i}"]`).addClass(_skippedClass).removeClasses([_currentClass, _completedClass]);
            setTimeout(function() {
                $this.modalSteps.find(`[data-step="${Number(i)+1}"]`).addClass(_currentClass);
                $this.currentStepIdx = Number(i) + 1;
                $this._checkSkip();
            }, 200);
        },
        _initialModal: function() {
            this._currentStep(1);
            this.prev.addClass(_disabledClass).attr(_disabledClass, _disabledClass);
            this._checkSkip();
            this._showContent(1);
            this.next.text(this.options.nextText);
        }
    }



    $.fn.MultiStep = function(options, callback) {
        if (typeof options == 'object') {
            options = $.extend(true, {}, defaults, options);
        }
        this.each(function() {
            var $this = $(this);
            if (!$this.data('multiStep') && (options ? typeof options == 'object' : true)) {
                $this.data('multiStep', new multiStep($this, options));
            } else if ($this.data('multiStep')) {
                if (typeof options == 'string') {
                    var func = options;
                    var params = callback;
                    $this.data('multiStep')[func].call(params);
                } else {
                    $this.data('multiStep').update(options);
                }

            }


        });
        if (typeof callback == 'function') {
            callback.call(this.element);
        };
        return this;
    };
    $.fn.MultiStep.defaults = defaults;
    $.fn.MultiStep.multiStep = multiStep;


    $(document).ready(function() {
        $('.multi-step').MultiStep();
    });
});
$.fn.removeClasses = function(arr) {
    if (typeof arr == 'string') {
        arr = [arr];
    }
    for (var i = arr.length - 1; i >= 0; i--) {
        var x = arr[i];
        this.removeClass(x);
    }
    return this;
}
$.fn.addClasses = function(arr) {
    if (typeof arr == 'string') {
        arr = [arr];
    }
    for (var i = arr.length - 1; i >= 0; i--) {
        var x = arr[i];
        this.addClass(x);
    }
    return this;
}
$.fn.hasAnyClass = function(arr) {
    if (typeof arr == 'string') {
        arr = [arr];
    }
    for (var i = arr.length - 1; i >= 0; i--) {
        var x = arr[i];
        if (this.hasClass(x)) {
            return true;
        }
    }
    return false;
}
