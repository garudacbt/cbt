/*
   https://github.com/PhilippeMarcMeyer/FieldsLinker v 1.03

   v 1.03 : bug fix : no drag and drop when FieldsLinker is disabled
   v 1.02 : Improvement : adding an id to the root dom element if not provided
   v 1.01 : Bug correction : the manual sorting by drap and drop now works
   v 1.00 : jquery 3.5 compatibility
   v 0.96 : Remove filter option and alternateview : theses modes have nothing to do with the original concept 
   v 0.95 : rewritten for multiples instances in mind
   v 0.92 : introducing new option : whiteSpace
   v 0.91 : fix mobileClickIt if set, add selected css classes, automatic mobileClickIt on touch devices
   v 0.90 : Code beautified by flartet 
   v 0.89 : Corrected a bug that corrupted the links array of objects detected by flartet on github
   v 0.88 : New display mode : idea by Naveen nsirangu => show links between two "tables" linked by ids like a join in sql. instead of headers names, objects ar provided
   v 0.87 : New option for touch devices {"mobileClickIt":true} : idea by Norman Tomlins => make links more easily on touch devices just by clicking 
*/
let fieldsLinkerMemory = [];

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

;(function ($) {
    $.fn.fieldsLinker = function (action, input) {
        factory = this;
        if (action == 'init') {
            factory.selector = factory[0];

            if (!factory.selector.id) {
                factory.selector.id = "FLinkerId_" + getRandomInt(1024000000);
            }

            factory.work = new FieldsLinker(factory.selector);
            if (fieldsLinkerMemory.length == 0) {
                fieldsLinkerMemory.push({"selector": factory.selector, "factory": factory});
            } else {
                let found = false;
                fieldsLinkerMemory.forEach(function (x, i) {
                    if (x.selector == factory.selector) {
                        found = true;
                        fieldsLinkerMemory[i].factory = factory;
                    }
                });
                if (!found) {
                    fieldsLinkerMemory.push({"selector": factory.selector, "factory": factory});
                }
            }
            factory.work.init(input);
            factory.work.deduplicate();
            factory.work.setGlobalRedraw();
            factory.work.readUserPreferences();
            factory.work.fillChosenLists();
            factory.work.makeDropDownForLists();
            factory.work.drawColumnsAtLoadTime();
            factory.work.drawColumnsContentA();
            factory.work.drawColumnsContentB();
            factory.work.createCanvas();
            factory.work.setListeners();
            factory.work.changeSelects();
            factory.work.manageExistingLinks();
            factory.work.manageResize();
            factory.work.draw();
            factory.work.applyBg();

            return factory;

        } else if (action == 'eraseLinks') {
            factory.work.eraseLinks();
            factory.work.draw();
            return factory;

        } else if (action === 'getLinks') {
            return factory.work.getLinks();

        } else if (action === 'changeParameters') {
            factory.work.changeParameters(input);

        } else if (action == 'disable') {
            factory.work.enable(false);
            return (factory);

        } else if (action == 'enable') {
            factory.work.enable(true);
            return (factory);
        } else {
            console.log(factory.work.errMsg + 'no action parameter provided (param 1)');
        }
    };
}(jQuery));


function FieldsLinker(selector) {
    this.selector = selector;
    this.$root = $(this.selector);
    this.FL_Factory_Lists = null;
    this.FL_Original_Factory_Lists = null;
    this.bootstrap_enabled = (typeof $().modal == 'function');
    this.errMsg = 'fieldsLinker error : ';
    this.data = {};
    this.listsNr = 0;
    this.listNames = [];
    this.listA = [];
    this.listB = [];
    this.chosenListA = '';
    this.chosenListB = '';
    this.keyNameA = '';
    this.keyNameB = '';
    this.dropDownForLists = null;
    this.$leftDiv;
    this.$midDiv;
    this.$rightDiv;
    this.$canvas;
    this.$main;
    this.$btn;
    this.$ulLeft;
    this.$ulRight;
    this.$filterDiv1;
    this.$filterDiv2;
    this.canvasId = '';
    this.canvasCtx = null;
    this.canvasWidth = 0;
    this.canvasHeight = 0;
    this.canvasPtr = null;
    this.mandatoryErrorMessage = 'This field is mandatory';
    this.mandatoryTooltips = true;
    this.onError = false;
    this.className = 'fieldsLinker';
    this.linksByName = [];
    this.ListHeights1 = [];
    this.ListHeights2 = [];
    this.move = null;
    this.that = null;
    this.lineStyle = 'straight'; // straight or square-ends
    //this.handleColor        = '#CF0000,#00AD00,#0000AD,#FF4500,#00ADAD,#AD00AD,#582900,#FFCC00,#000000,#33FFCC'.split(',');
    this.handleColor = '#D50000,#33691e,#304FFE,#3E2723,#FF6F00,#64DD17,#4A148C,#FFD600,#263238,#212121'.split(',');
    this.handleBackground = '#ffcdd2,#c8e6c9,#90caf9,#d7ccc8,#ffcc80,#ccff90,#e1bee7,#ffff00,#cfd8dc,#e0e0e0'.split(',');
    this.lineColor = 'black';
    this.associationMode = 'oneToOne';
    this.isDisabled = false;
    this.globalAlpha = 1;
    this.mandatories = [];
    this.whiteSpace = "nowrap";
    this.hideLink = false;
    this.isTouchScreen = is_touch_device();
    this.mobileClickIt = false;

    this.hexc = function (colorval) {
        var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        if (parts == null) return null;
        delete (parts[0]);
        for (var i = 1; i <= 3; ++i) {
            parts[i] = parseInt(parts[i]).toString(16);
            if (parts[i].length == 1) parts[i] = '0' + parts[i];
        }
        return '#' + parts.join('');
    };

    this.draw = function () {
        var self = this;
        var tablesAB = self.chosenListA + '|' + self.chosenListB; // existingLinks
        self.canvasCtx.globalAlpha = self.globalAlpha;
        self.canvasCtx.beginPath();
        self.canvasCtx.fillStyle = 'white';
        self.canvasCtx.strokeStyle = self.lineColor;
        self.canvasCtx.clearRect(0, 0, self.canvasWidth, self.canvasHeight);
        var links = self.linksByName.filter(function (x) {
            return x.tables == tablesAB;
        });
        links.forEach(function (item, i) {
            var positionA = self.listA.indexOf(item.from);
            var positionB = self.listB.indexOf(item.to);

            if (positionB == -1 || positionA == -1) {
                console.log('error link names unknown');
                return;
            }
            var Ax = 0;
            var Ay = self.ListHeights1[positionA];
            var Bx = self.canvasWidth;
            var By = self.ListHeights2[positionB];
            self.canvasCtx.beginPath();
            self.canvasCtx.moveTo(Ax, Ay);
            var handleCurrentColor = self.handleColor[positionA % self.handleColor.length];
            if (self.lineStyle == 'square-ends' || self.lineStyle == 'square-ends-dotted') {
                self.canvasCtx.fillStyle = handleCurrentColor;
                self.canvasCtx.strokeStyle = handleCurrentColor;
                self.canvasCtx.rect(Ax, Ay - 4, 8, 8);
                self.canvasCtx.rect(Bx - 8, By - 4, 8, 8);
                self.canvasCtx.fill();
                self.canvasCtx.stroke();
                self.canvasCtx.moveTo(Ax + 8, Ay);
                self.canvasCtx.lineTo(Ax + 16, Ay);
                self.canvasCtx.lineTo(Bx - 16, By);
                self.canvasCtx.lineTo(Bx - 8, By);
                self.canvasCtx.stroke();
            } else {
                self.canvasCtx.strokeStyle = handleCurrentColor;
                self.canvasCtx.lineTo(Bx, By);
                self.canvasCtx.stroke();
            }
            self.canvasCtx.closePath();
            self.canvasCtx.lineWidth = 1;
        });
        //self.applyBg();
    }
    this.applyBg = function () {
        var self = this;
        var tablesAB = self.chosenListA + '|' + self.chosenListB; // existingLinks
        var links = self.linksByName.filter(function (x) {
            return x.tables == tablesAB;
        });
        var colors = {};
        links.forEach(function (item, i) {
            var positionA = self.listA.indexOf(item.from);
            var positionB = self.listB.indexOf(item.to);

            if (positionB == -1 || positionA == -1) {
                console.log('error link names unknown');
                return;
            }

            var handleCurrentBg = self.handleBackground[positionA % self.handleBackground.length];
            if (colors[self.listB[positionB]] == null) colors[self.listB[positionB]] = [];
            colors[self.listB[positionB]].push(handleCurrentBg);
            $(`ul[data-col="${self.chosenListA}"]`).find(`li:contains(${self.listA[positionA]})`)
                .css({'background-color': handleCurrentBg});
        });
        $.each(colors, function (ii, vv) {
            var li_kiri = $(`ul[data-col="${self.chosenListB}"]`).find(`li:contains(${ii})`);
            if (vv.length > 1) {
                var grad = 'to right';
                var percent = 100 / vv.length;
                $.each(vv, function (i, c) {
                    grad += ', ' + c + ' ' + percent * i + '%, ' + c + ' ' + percent * (i + 1) + '%';
                });
                li_kiri
                    .css({'background-color': vv[vv.length - 1]})
                    .css({'background-image': 'linear-gradient(' + grad + ')'})
                    .addClass('linked');
            } else {
                li_kiri
                    .css({'background-color': vv[0]})
                    .css({'background-image': 'linear-gradient(' + vv[0] + ',' + vv[0] + ')'})
                    .addClass('linked');
            }
        })
    }
    this.makeLink = function (infos) {
        var self = this;
        var tablesAB = self.chosenListA + '|' + self.chosenListB;
        var already = false;
        var test = self.linksByName.filter(function (x) {
            return x.tables == tablesAB && x.to == infos.nameB && x.from == infos.nameA;
        });
        if (test.length > 0) already = true;
        if (!already) {
            if (self.associationMode == 'oneToOne') {
                for (var i = self.linksByName.length - 1; i >= 0; i--) {
                    if (self.linksByName[i].tables == tablesAB && self.linksByName[i].to == infos.nameB) {
                        self.linksByName.splice(i, 1);
                    }
                }

                for (var i = self.linksByName.length - 1; i >= 0; i--) {
                    if (self.linksByName[i].tables == tablesAB && self.linksByName[i].from == infos.nameA) {
                        self.linksByName.splice(i, 1);
                    }
                }
            }
            self.linksByName.push({
                'tables': tablesAB,
                'from': infos.nameA,
                'to': infos.nameB
            });

            $(self.$root).trigger({
                type: 'fieldLinkerUpdate',
                what: 'addLink'
            });
        }
        self.draw();
    }
    this.eraseLinkA = function (nameA) {
        var self = this;
        var tablesAB = self.chosenListA + '|' + self.chosenListB;
        for (var i = self.linksByName.length - 1; i >= 0; i--) {
            if (self.linksByName[i].tables == tablesAB && self.linksByName[i].from == nameA) {
                self.linksByName.splice(i, 1);
            }
        }
        self.draw();
        $(self.$root).trigger({
            type: 'fieldLinkerUpdate',
            what: 'removeLink'
        });
    }
    this.eraseLinkB = function (nameB) {
        var self = this;
        var tablesAB = self.chosenListA + '|' + self.chosenListB;
        for (var i = self.linksByName.length - 1; i >= 0; i--) {
            if (self.linksByName[i].tables == tablesAB && self.linksByName[i].to == nameB) {
                $(`ul[data-col="${self.chosenListB}"]`).find(`li:contains(${nameB})`)
                    .css({'background-color': '#fff'})
                    .css({'background-image': 'linear-gradient(#fff,#fff)'})
                    .removeClass('linked');
                self.linksByName.splice(i, 1);
            }
        }
        self.draw();
        $(self.$root).trigger({
            type: 'fieldLinkerUpdate',
            what: 'removeLink'
        });

        var sisa = [];
        $.each(self.linksByName, function (nom, isi) {
            sisa.push(isi.from);
        });

        $.each(self.listA, function (n, is) {
            if ($.inArray(is, sisa) < 0) {
                $(`ul[data-col="${self.chosenListA}"]`).find(`li:contains(${is})`).css({'background-color': '#fff'});
            }
        });
    }
    this.readUserPreferences = function () {
        var self = this;
        if (self.data.options.className) {
            self.className = self.data.options.className;
        }
        if (self.data.options.whiteSpace) {
            self.whiteSpace = self.data.options.whiteSpace;
        }
        if (self.data.options.lineStyle) {
            if (self.data.options.lineStyle == 'square-ends' || self.data.options.lineStyle == 'square-ends-dotted')
                self.lineStyle = self.data.options.lineStyle;
        }
        if (self.data.options.lineColor) {
            self.lineColor = self.data.options.lineColor;
        }
        if (self.data.options.handleColor) {
            self.handleColor = self.data.options.handleColor.split(',');
        }
        if (self.data.options.associationMode) {
            self.associationMode = self.data.options.associationMode;
        }
        if (self.data.options.mobileClickIt != undefined) {
            self.mobileClickIt = self.data.options.mobileClickIt;
        }
        if (self.isTouchScreen) {
            self.mobileClickIt = true;
        }

    }
    this.fillChosenLists = function () {
        var self = this;
        self.listNames = [];
        self.listA = [];
        self.listB = [];
        if (self.chosenListA == '' || self.chosenListB == '') {
            self.chosenListA = self.data.Lists[0].name;
            self.chosenListB = self.data.Lists[1].name;
        }
        self.keyNameA = self.data.Lists[0].keyName || '';
        self.keyNameB = self.data.Lists[1].keyName || '';

        self.data.Lists.forEach(function (x) {
            self.listNames.push(x.name);
            if (x.name == self.chosenListA) {
                x.list.forEach(function (y) {
                    self.listA.push(y);
                });
            }
            if (x.name == self.chosenListB) {
                if (x.mandatories != undefined) {
                    self.mandatories = x.mandatories;
                }
                x.list.forEach(function (y) {
                    self.listB.push(y);
                });
            }
        });
    }
    this.makeDropDownForLists = function () {
        var self = this;
        self.dropDownForLists = $('<select></select>');
        self.dropDownForLists
            .css('width', '100%');
        self.listNames.forEach(function (x) {
            var $option = $('<option></option>');
            $option
                .val(x)
                .text(x)
                .appendTo(self.dropDownForLists);
        });
    }
    this.drawColumnsAtLoadTime = function () {
        var self = this;
        self.$root.html('');
        self.$main = $('<div></div>');
        self.$main
            .appendTo(self.$root)
            .addClass('FL-main ' + self.className)
            .css({
                'position': 'relative',
                'width': '100%',
                'text-align': 'left'
            });

        self.$leftDiv = $('<div></div>');
        self.$leftDiv
            .appendTo(self.$main)
            .addClass('FL-left')
            .css({
                'float': 'left',
                'width': '40%',
                'display': 'inline-block',
                'text-align': 'left',
                'white-space': self.whiteSpace
            })
            .append(self.dropDownForLists.clone());

        self.$leftDiv.find('select')
            .attr('id', 'select1')
            .val(self.chosenListA)
            .addClass('text-white d-none')
            .on('change', function () {
                self.chosenListA = $(this).val();
                self.fillChosenLists();
            });

        self.$ulLeft = $('<ul></ul>');
        self.$ulLeft
            .appendTo(self.$leftDiv)
            .css({
                'text-align': 'left',
                'list-style': 'none'
            });

        self.$midDiv = $('<div></div>');
        self.$midDiv
            .appendTo(self.$main)
            .addClass('FL-mid')
            .css({
                'display': 'inline-block',
                'width': '20%'
            });

        self.$rightDiv = $('<div></div>');
        self.$rightDiv
            .appendTo(self.$main)
            .addClass('FL-right')
            .css({
                'float': 'right',
                'width': '40%',
                'display': 'inline-block',
                'text-align': 'left',
                'white-space': self.whiteSpace
            })
            .append(self.dropDownForLists.clone());

        if (self.data.options.buttonErase) {
            self.$btn = $('<button></button>');
            self.$btn
                .appendTo(self.$root.find('.FL-main'))
                .attr('type', 'button')
                .addClass('btn btn-default btn-sm eraseLink')
                .attr("style", "position:absolute;top:-6px;right:0;opacity:0.9;")
                .html(self.data.options.buttonErase);
        }

        self.$rightDiv.find('select')
            .attr('id', 'select2')
            .addClass('text-white d-none')
            .val(self.chosenListB)
            .on('change', function () {
                self.chosenListB = $(this).val();
                self.fillChosenLists();
            });

        self.$ulRight = $('<ul></ul>');
        self.$ulRight
            .appendTo(self.$leftDiv)
            .css({
                'text-align': 'left',
                'list-style': 'none'
            });
    }
    this.computeListHeight = function (li) {
        // outerHeight(true) adds margins too, full step is simply full outerHeight / 2 between li siblings
        if (!$(li).hasClass('hidden')) {
            var step = Math.ceil($(li).outerHeight(true) / 2);
            return Math.floor($(li).position().top + step);
        }
    }
    this.drawColumnsContentA = function () {
        var self = this;

        if (self.$ulLeft.length == 1) {
            self.$ulLeft.empty();
        } else {
            self.$ulLeft = $('<ul></ul>');
            self.$ulLeft.appendTo(self.$leftDiv)
        }

        self.$ulLeft
            .attr('data-col', self.chosenListA)
            .css({
                'text-align': 'left',
                'list-style': 'none'
            });

        self.listA.forEach(function (x, i) {
            let nrItems = Object.keys(x).length;
            if (self.hideLink) {
                nrItems--;
            }
            if (nrItems < 0) {
                nrItems = 1;
            }
            let percent = (100 / nrItems) + '%';
            var $li = $('<li></li>');
            let item = x;
            let id = x;
            var handleCurrentColor = self.handleBackground[i % self.handleBackground.length];
            $li
                .appendTo(self.$ulLeft)
                .attr('data-offset', i)
                .attr('data-name', id)
                .css({
                    'width': '100%',
                    'position': 'relative'
                });
            var $div = $('<div></div>');
            $div
                .appendTo($li)
                .attr('ondrop', 'LM_drop(event)')
                .attr('ondragover', 'LM_allowDrop(event)')
                .attr('ondragstart', 'LM_drag(event)')
                .attr('draggable', 'true')
                .css({
                    'width': '80%'
                })
                .html(item);
            /*
            var $eraseIcon = $('<i></i>');
            $eraseIcon
                .appendTo($li)
                .addClass('fa fa-undo unlink')
                .attr('draggable', 'false')
                .css({
                    'right': '28px',
                    'color': '#aaa',
                    'position': 'absolute',
                    'top': '50%',
                    'transform': 'translateY(-50%)'
                });
            var $pullIcon = $('<i></i>');
            $pullIcon
                .appendTo($li)
                .addClass('fa fa-arrows-alt link')
                .attr('draggable', 'false')
                .css({
                    'right': '8px',
                    'color': '#aaa',
                    'position': 'absolute',
                    'top': '50%',
                    'transform': 'translateY(-50%)'
                });
                */
        });
        // Computing the vertical offset of the middle of each cell.
        self.ListHeights1 = [];

        $(self.$ulLeft).find('li').each(function (i, li) {
            var val = self.computeListHeight(li);
            self.ListHeights1.push(val);
        });

        if (!self.mobileClickIt) {
            $(self.$ulLeft).find('li').off('mousedown').on('mousedown', function (e) {
                // we make a move object to keep track of the origine and also remember that we are starting a mouse drag (mouse is down)
                if (self.isDisabled) return;
                self.move = {};
                self.move.offsetA = $(this).data('offset');
                self.move.nameA = $(this).data('name');
                self.move.offsetB = -1;
                self.move.nameB = -1;
            });
        }

        if (self.isTouchScreen && !self.mobileClickIt) {
            // On mousedown in left List :
            $(self.$root).find('.link').off('touchstart').on('touchstart', function (e) {

                if (self.isDisabled) return;
                self.move = {};
                self.move.offsetA = $(this).parent().data('offset');
                self.move.nameA = $(this).parent().data('name');
                self.move.offsetB = -1;
                self.move.nameB = -1;

                var originalEvent = e.originalEvent;
                if (originalEvent != null && originalEvent.touches != undefined) {
                    var touch = originalEvent.touches[0];
                    if (move != null) {
                        var mouseEvent = new MouseEvent('mousedown', {
                            clientX: touch.clientX,
                            clientY: touch.clientY
                        });
                        self.drawImmediate(mouseEvent);
                    }
                }
            });

            $(self.$root).find('.link').off('touchmove').on('touchmove', function (e) {
                var originalEvent = e.originalEvent;
                if (originalEvent != null && originalEvent.touches != undefined) {
                    var touch = originalEvent.touches[0];
                    var mouseEvent = new MouseEvent('mousemove', {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });

                    if (self.move != null) {
                        self.drawImmediate(mouseEvent);
                    }

                }
            });

            $(self.$root).find('.link').off('touchend').on('touchend', function (e) {
                if (self.isDisabled) return;

                var originalEvent = e.originalEvent;
                if (originalEvent != null && originalEvent.touches != undefined) {
                    var touch = originalEvent.changedTouches[0];
                    var mousePosition = {
                        x: touch.clientX,
                        y: touch.clientY
                    };
                    if (self.move != null) {
                        let found = false;
                        $(self.$ulRight).find('li').each(function (i) {
                            if (!found) {
                                var rect = this.getBoundingClientRect();
                                //left, top, right, bottom, width, height
                                if (mousePosition.x >= rect.left && mousePosition.x <= rect.right && mousePosition.y >= rect.top && mousePosition.y <= rect.bottom) {
                                    if (self.associationMode == 'oneToOne') {
                                        self.eraseLinkB($(this).data('name')); // we erase an existing link if any
                                    }
                                    self.move.offsetB = $(this).data('offset');
                                    self.move.nameB = $(this).data('name');
                                    var infos = JSON.parse(JSON.stringify(move));
                                    self.move = null;
                                    self.makeLink(infos);
                                    found = true;
                                }
                            }
                        });
                        if (!found) {
                            self.draw();
                        }
                    }
                }
            });
        }

        if (!self.mobileClickIt) {
            $(self.$ulLeft).find('li').off('mouseup').on('mouseup', function (e) {
                if (self.isDisabled) return;
                // We do a mouse up on the left side : the drag is canceled
                self.move = null;
            });

            $(self.$ulLeft).find('li').off('click').on('click', function (e) {
                if (self.isDisabled) return;
                self.eraseLinkA($(this).data('name'));
                self.draw();
            });
        }

        if (self.mobileClickIt) {
            $(self.$ulLeft).find('li').off('click').on('click', function (e) {
                if (self.isDisabled) return;
                let el = $(this);
                var handleCurrentColor = self.handleBackground[el.index() % self.handleBackground.length];
                $(self.$root).find('.selected').removeClass('selected').css({'background-color': '#fff'});
                el.addClass('selected');
                el.css({'background-color': handleCurrentColor});
                self.move = {};
                self.move.offsetA = el.data('offset');
                self.move.nameA = el.data('name');
                self.move.offsetB = -1;
                self.move.nameB = -1;
            });
        }

        $(self.$root).find('.unlink').off('click').on('click', function (e) {
            if (self.isDisabled) return;
            self.eraseLinkA($(this).data('name'));
            self.draw();
        });
    }
    this.drawColumnsContentB = function () {
        var self = this;
        if (self.$ulRight.length == 1) {
            self.$ulRight.empty();
        } else {
            self.$ulRight = $('<ul></ul>');
            self.$ulRight.appendTo(self.$rightDiv)
        }
        self.$ulRight
            .appendTo(self.$rightDiv)
            .attr('data-col', self.chosenListB)
            .css({
                'text-align': 'left',
                'list-style': 'none'
            });
        self.listB.forEach(function (x, i) {
            let item = x;
            let id = x;
            var isMandatory = (self.mandatories.indexOf(x) != -1);
            var $li = $('<li></li>');
            $li
                .appendTo(self.$ulRight)
                .attr('data-offset', i)
                .attr('data-name', id)
                .attr('data-mandatory', isMandatory)
                .attr('draggable', 'true');
            //.css({'background-color' : handleCurrentColor});
            var $div = $('<div></div>');
            $div
                .appendTo($li)
                .attr('ondrop', 'LM_drop(event)')
                .attr('ondragover', 'LM_allowDrop(event)')
                .attr('ondragstart', 'LM_drag(event)')
                .attr('draggable', 'true')
                .css({
                    'width': '80%'
                })
                .html(item);
            if (isMandatory && self.mandatoryTooltips) {
                $li
                    .attr('data-placement', 'top')
                    .attr('title', self.mandatoryErrorMessage);
                if (self.bootstrap_enabled)
                    $li.tooltip();
            }
        });
        // Computing the vertical offset of the middle of each cell.
        self.ListHeights2 = [];

        $(self.$ulRight).find('li').each(function (i, li) {
            var val = self.computeListHeight(li);
            self.ListHeights2.push(val);
        });
        // Mouse up on the right side
        $(self.$ulRight).find('li').off('mouseup').on('mouseup', function (e) {
            if (self.isDisabled) return;
            if (self.move != null) { // no drag
                if (self.associationMode == 'oneToOne') {
                    self.eraseLinkB($(this).data('name')); // we erase an existing link if any
                }
                self.move.offsetB = $(this).data('offset');
                self.move.nameB = $(this).data('name');
                var infos = JSON.parse(JSON.stringify(self.move));
                self.move = null;
                self.makeLink(infos);
            }
        });

        $(self.$ulRight).find('li').off('dblclick').on('dblclick', function (e) {
            if (self.isDisabled) return;
            self.eraseLinkB($(this).data('name')); // we erase an existing link if any
            self.draw();
        });
        // mousemove over a right cell
        $(self.$ulRight).find('li').off('mousemove').on('mousemove', function (e) {
            if (self.isDisabled) return;
            if (self.move != null) { // drag occuring
                var _from = self.move.offsetA;
                var _To = $(this).data('offset');
                var Ax = 0;
                var Ay = self.ListHeights1[_from];
                var Bx = self.canvasWidth;
                var By = self.ListHeights2[_To];
                self.draw();
                self.canvasCtx.beginPath();
                var color = self.handleColor[_from % self.handleColor.length];
                self.canvasCtx.fillStyle = 'white';
                self.canvasCtx.strokeStyle = color;
                self.canvasCtx.moveTo(Ax, Ay);
                self.canvasCtx.lineTo(Bx, By);
                self.canvasCtx.stroke();
            }
        });

        if (self.mobileClickIt) {
            $(self.$ulRight).find('li').off('click').on('click', function (e) {
                self.applyBg();
                if ($(this).hasClass('linked') && $(self.$root).find('.selected').length === 0) {
                    if (self.isDisabled && self.move !== null) return;
                    $(this).removeClass('linked');
                    self.eraseLinkB($(this).data('name')); // we erase an existing link if any
                    self.draw();
                } else {
                    $(self.$root).find('.selected').removeClass('selected');

                    if (self.isDisabled || self.move === null) return;
                    $(this).addClass('linked');
                    self.move.offsetB = $(this).data('offset');
                    self.move.nameB = $(this).data('name');
                    var infos = JSON.parse(JSON.stringify(move));
                    self.move = null;
                    self.makeLink(infos);
                }
            });
        }

    }
    this.createCanvas = function () {
        var self = this;
        self.canvasId = 'cnv_' + Date.now();
        var w = self.$midDiv.width();
        var h2 = self.$rightDiv.height();
        var h1 = self.$leftDiv.height();
        var h = h1 >= h2 ? h1 : h2;
        self.$canvas = $('<canvas></canvas>');
        self.$canvas
            .appendTo(self.$midDiv)
            .attr('id', self.canvasId)
            .css({
                'width': w + 'px',
                'height': h + 'px'
            });
        self.canvasWidth = w;
        self.canvasHeight = h;
        self.canvasPtr = document.getElementById(self.canvasId);
        if (self.canvasPtr) {
            self.canvasPtr.width = self.canvasWidth;
            self.canvasPtr.height = self.canvasHeight;
            self.canvasCtx = self.canvasPtr.getContext("2d");
        }
    }
    this.getTouchPos = function (e) {
        var self = this;
        var rect = self.canvasPtr.getBoundingClientRect();
        return {
            x: e.clientX - rect.left,
            y: e.clientY - rect.top
        };
    }
    this.drawImmediate = function (e) {
        var self = this;
        self.canvasCtx.clearRect(0, 0, self.canvasWidth, self.canvasHeight);
        // we redraw all the existing links
        self.draw();
        self.canvasCtx.beginPath();
        // we draw the new would-be link
        var _from = self.move.offsetA;
        var color = self.handleColor[_from % self.handleColor.length];
        self.canvasCtx.fillStyle = 'white';
        self.canvasCtx.strokeStyle = color;
        var Ax = 0;
        var Ay = self.ListHeights1[_from];
        // mouse position relative to the canvas
        //var Bx = e.offsetX;
        //var By = e.offsetY;
        var relativePosition = self.getTouchPos(e);
        var Bx = relativePosition.x;
        var By = relativePosition.y;
        self.canvasCtx.moveTo(Ax, Ay);
        self.canvasCtx.lineTo(Bx, By);
        self.canvasCtx.stroke();

    }
    this.setListeners = function () {
        var self = this;
        if (self.data.options.buttonErase) {
            $(self.$root).find('.FL-main .eraseLink').on('click', function (e) {
                if (self.isDisabled) return;
                self.linksByName.length = 0;
                self.draw();
                $(self.selector).trigger({
                    type: 'fieldLinkerUpdate',
                    what: 'removeLink'
                });
            });
        }
        // mousemove over the canvas
        $(self.$canvas).on('mousemove', function (e) {
            if (self.isDisabled) return;
            if (self.move != null) {
                self.drawImmediate(e);
            }
        });
        $(self.$main).on('mouseup', function (e) {
            if (self.isDisabled) return;
            if (self.move != null) {
                self.move = null;
                self.draw();
            }
        });
        // this is a remnant of LinksMaker : could handle more than 2 columns
        // this won't change unluss we trigger it
        $(self.$leftDiv).find('select').on('change', function (e) {
            if (self.isDisabled) return;
            self.chosenListA = $(this).val();
            $(self.$rightDiv).find('select option').each(function () {
                $(this)
                    .attr('disabled', $(this).val() == self.chosenListA);
            });
            self.drawColumnsContentA();
            self.draw();
        });

        $(self.$rightDiv).find('select').on('change', function (e) {
            if (self.isDisabled) return;
            self.chosenListB = $(this).val();
            $(self.$leftDiv).find('select option').each(function () {
                $(this)
                    .attr('disabled', $(this).val() == this.chosenListB);
            });
            self.drawColumnsContentB();
            self.draw();
        });
    }
    this.setGlobalRedraw = function () {
        var self = this;
        $(self.selector).on('LM_Message_Redraw', function () {
            self.mandatories = [];
            self.move = null;
            self.listA = [];
            self.listB = [];
            self.FL_Factory_Lists.Lists.forEach(function (x) {
                if (x.name == self.chosenListA) {
                    let dict = {};
                    x.list.forEach(function (y) {
                        if (!dict[y]) {
                            dict[y] = 1;
                        } else {
                            dict[y] + 1;
                            y += '(' + dict[y] + ')';
                        }
                    });
                    self.listA = x.list;
                }
                if (x.name == self.chosenListB) {
                    self.listB = x.list;
                    if (x.mandatories != undefined) {
                        self.mandatories = x.mandatories;
                    }
                }
            });
            self.drawColumnsContentA();
            self.drawColumnsContentB();
            self.draw();
        });
    }
    this.setError = function (message) {
        var self = this;
        self.onError = true;
        throw self.errMsg + message;
    }
    this.init = function (input, onFilter) {

        var self = this;
        if (!input) {
            setError('no input options provided (param 2)');
        }
        self.data = JSON.parse(JSON.stringify(input));
        self.FL_Factory_Lists = self.data;

        if (!onFilter) {
            self.FL_Original_Factory_Lists = JSON.parse(JSON.stringify(self.data));
        }
        if (!self.data.Lists || self.data.Lists.length < 2) {
            self.setError('provide at least 2 lists');
        }
    }
    this.deduplicate = function () {
        var self = this;
        self.listsNr = self.data.Lists.length;

        for (let i = 0; i < self.listsNr; i++) {
            let dict = {};
            for (let j = 0; j < self.data.Lists[i].list.length; j++) {
                let val = self.data.Lists[i].list[j];
                if (!dict[val]) {
                    dict[val] = 1;
                } else {
                    dict[val] += 1;
                    self.data.Lists[i].list[j] += '(' + dict[val] + ')';
                }
            }
        }
    }
    this.changeSelects = function () {
        var self = this;
        $(self.selector)
            .find('.FL-left select')
            .trigger('change')
            .css('border', 'none')
            .css('appearance', 'none')
            .attr('disabled', 'true');

        $(self.selector)
            .find('.FL-right select')
            .trigger('change')
            .css('border', 'none')
            .css('appearance', 'none')
            .attr('disabled', 'true');
    }
    this.manageExistingLinks = function () {
        var self = this;
        if (self.data.existingLinks) {
            self.linksByName = self.data.existingLinks;
            var tablesAB = self.chosenListA + '|' + self.chosenListB;
            self.linksByName.forEach(function (x) {
                x.tables = tablesAB;
            });
        }
    }
    this.manageResize = function () {
        var self = this;
        $(window).resize(function () {
            self.canvasWidth = $(self.selector).find('.FL-main .FL-mid').width();
            self.canvasPtr.width = self.canvasWidth;
            $('#' + self.canvasId).css('width', self.canvasWidth + 'px');
            self.draw();
        });
    }
    this.eraseLinks = function () {
        var self = this;
        self.linksByName.length = 0;
        self.draw();
    }
    this.getLinks = function () {
        var self = this;
        if (!self.onError) {
            var isMandatoryError = false;
            let links = null;
            var errorMessage = self.mandatoryErrorMessage + ' : ';
            var fieldInErrorName = '';
            self.mandatories.forEach(function (m, i) {
                if (!isMandatoryError) {
                    var match = self.linksByName.filter(function (link) {
                        return link.to == m;
                    });
                    if (match.length == 0) {
                        isMandatoryError = true;
                        fieldInErrorName = m;
                    }
                }
            });
            if (isMandatoryError) {
                return {
                    'error': true,
                    'errorMessage': errorMessage + fieldInErrorName,
                    'links': []
                };
            } else {
                links = [];
                self.linksByName.forEach(function (x) {
                    links.push({
                        from: x.from,
                        to: x.to
                    });
                });
                return {
                    'error': false,
                    'errorMessage': '',
                    'links': links
                };
            }
        } else {
            return [];
        }
    }
    this.changeParameters = function (input) {
        var self = this;
        if (!self.onError) {
            if (input) {
                var options = JSON.parse(JSON.stringify(input));
                if (options.className) {
                    self.className = options.className;
                }
                if (options.whiteSpace) {
                    self.whiteSpace = options.whiteSpace;

                    self.$leftDiv.css("white-space", self.whiteSpace);
                    self.$rightDiv.css("white-space", self.whiteSpace);

                    self.ListHeights1 = [];

                    $(self.$ulLeft).find('li').each(function (i, li) {
                        var val = self.computeListHeight(li);
                        self.ListHeights1.push(val);
                    });

                    self.ListHeights2 = [];

                    $(self.$ulRight).find('li').each(function (i, li) {
                        var val = self.computeListHeight(li);
                        self.ListHeights2.push(val);
                    });

                }
                if (options.lineStyle) {
                    self.lineStyle = options.lineStyle;
                }
                if (options.lineColor) {
                    self.lineColor = options.lineColor;
                }
                if (options.handleColor) {
                    self.handleColor = options.handleColor.split(',');
                }
                if (options.associationMode) {
                    let unicityTokenA = '';
                    let unicityTokenB = '';
                    let formerAssociation = self.associationMode;
                    self.associationMode = options.associationMode;
                    if (self.associationMode == 'oneToOne' && formerAssociation == 'manyToMany') {
                        let unicityDict = {};
                        for (var i = self.linksByName.length - 1; i >= 0; i--) {
                            unicityTokenA = self.linksByName[i].tables + '_A_' + self.linksByName[i]['from'];
                            unicityTokenB = self.linksByName[i].tables + '_B_' + self.linksByName[i]['to'];
                            let doDelete = false;
                            if (!unicityDict[unicityTokenA]) {
                                unicityDict[unicityTokenA] = true;
                            } else {
                                doDelete = true;
                            }
                            if (!unicityDict[unicityTokenB]) {
                                unicityDict[unicityTokenB] = true;
                            } else {
                                doDelete = true;
                            }
                            if (doDelete) {
                                self.linksByName.splice(i, 1);
                            }
                        }
                    }
                }
            }
            self.draw();
        }
    }
    this.enable = function (doEnable) {
        var self = this;
        self.isDisabled = !doEnable;

        $(self.$root)
            .find('.eraseLink')
            .prop('disabled', self.isDisabled);

        if (doEnable) {
            $(self.$root)
                .find('li')
                .removeClass('inactive')
                .find('div')
                .prop('draggable', true);
        } else {
            $(self.$root)
                .find('li')
                .addClass('inactive')
                .find('div')
                .prop('draggable', false);
        }

        $(self.$root)
            .find('select')
            .prop('disabled', self.isDisabled);

        self.globalAlpha = self.isDisabled ? 0.5 : 1;

        self.draw();

    }
}

// utils
function LM_allowDrop(ev) {
    //  ev.dataTransfer.dropEffect = "none"; // dropping is not allowed
    console.log(ev.currentTarget);
    ev.preventDefault();
}

function LM_drag(ev) {
    let $target = $(ev.target);
    let data = {};
    data.name = $target.parent().attr('data-name');
    data.col = $target.parent().parent().attr('data-col');
    data.offset = $target.parent().attr('data-offset');
    ev.dataTransfer.setData('text/plain', JSON.stringify({
        'data': data
    }));
}

function LM_drop(ev) {
    ev.preventDefault();
    let src = JSON.parse(ev.dataTransfer.getData('text'));
    if (src) {
        src = src.data;
    }
    let $target = $(ev.target);
    let $root = $target.closest(".fieldsLinker").parent();
    let currentDropId = $root.attr("id");
    let factory = null;
    if ($root.length == 1) {
        let oneMemory = fieldsLinkerMemory.filter(function (x, i) {
            return x.selector.id == currentDropId;
        });
        if (oneMemory.length > 0) {
            factory = oneMemory[0].factory;
        }

        if (factory != null) {
            let dest = {};
            dest.name = $target.parent().attr('data-name');
            dest.col = $target.parent().parent().attr('data-col');
            dest.offset = $target.parent().attr('data-offset');
            if (src.col == dest.col && src.offset != dest.offset && src.name != dest.name) {
                factory.work.FL_Factory_Lists.Lists.forEach(function (x) {
                    if (x.name == src.col) {
                        let indexA = x.list.indexOf(src.name);
                        let indexB = x.list.indexOf(dest.name);
                        if (indexA != -1 && indexB != -1) {
                            let temp = x.list[indexA];
                            x.list[indexA] = x.list[indexB];
                            x.list[indexB] = temp;
                        }
                    }
                });
                $($root).trigger('LM_Message_Redraw');
            }
        }
    }

}

function is_touch_device() { // from bolmaster2 - stackoverflow
    var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
    var mq = function (query) {
        return window.matchMedia(query).matches;
    };

    if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    }

    // include the 'heartz' as a way to have a non matching MQ to help terminate the join
    // https://git.io/vznFH
    var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
    return mq(query);
}