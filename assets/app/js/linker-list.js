function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

;(function ($, window, document, undefined) {
    "use strict";
    const pluginName = "linkerList";
    const defaults = {
        data: {
            kiri: [
                {key: '1', value: '<p>Jawa barat</p>'},
                {key: '2', value: '<p>Sumatera Selatan<p/>'},
            ],
            kanan: [
                {
                    key: 'A',
                    value: '<p>Palembang</p>'
                },
                {
                    key: 'B',
                    value: '<p>Bandung</p>'
                },
            ],
            linked: {
                '1': ['B'],
                '2': ['A'],
                //'3': []
            },
        }
    };
    const colorsLine = [
        "#BDBDBD",
        "#C62828", "#283593", "#00695C", "#9E9D24", "#6A1B9A",
        "#FBC02D", "#F57C00", "#E64A19", "#5D4037", "#37474F",
        "#C62828", "#283593", "#00695C", "#9E9D24", "#6A1B9A",
        "#FBC02D", "#F57C00", "#E64A19", "#5D4037", "#37474F",
    ]
    const colorsBg = [
        "#FFFFFF",
        "#fff7f8", "#e6e9ff", "#d6faff", "#f0ffdc", "#fbecff",
        "#fffbde", "#fff0d6", "#ffe5dc", "#fff5f0", "#effcff",
        "#fff7f8", "#e6e9ff", "#d6faff", "#f0ffdc", "#fbecff",
        "#fffbde", "#fff0d6", "#ffe5dc", "#fff5f0", "#effcff",
    ]
    const templates = {
        kiriContainer: '<div style="width: 42%; min-width: 200px"></div>',
        kananContainer: '<div style="width: 42%; min-width: 200px"></div>',
        canvasContainer: '<div style="width: 16%; min-width: 100px"></div>',
        canvasItem: '<canvas id="canvas" width="10" height="10"></canvas>',
        itemKiri: '<div class="my-2 item-kiri py-1 px-2"></div>',
        itemKanan: '<div class="my-2 item-kanan py-1 px-2"></div>',
        headerContainer: `<div class="row">
        <div class="col-7">
            <div class="row">
                <div class="col mb-2" style="max-width: 130px">
                    <select name="model_opsi" class="form-control" data-id="model-opsi">
                        <option value="1">List</option>
                        <option value="2">Table</option>
                    </select>
                </div>
                <div class="col mb-2" style="max-width: 250px">
                    <select name="type_opsi" class="form-control" data-id="type-opsi">
                        <option value="2">1 baris 1 jawaban</option>
                        <option value="1">1 baris banyak jawaban</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-5 text-right">
            <button class="btn btn-default" data-id=""><i class="fa fa-pencil-alt mr-2"></i>Edit</button>
            <button class="btn btn-default" data-id=""><i class="fa fa-check mr-2"></i>Selesai</button>
        </div>
    </div>`
    };

    function LinkerList(element, options) {
        this.randomId = getRandomInt(1024000000);
        this.listIdPrefix = '-' + this.randomId;
        this.rootId = 'linker-' + this.randomId
        this.element = element;
        this.itemIdPrefix = element.id + "-item-";
        $(this.element).addClass('card shadow-none');

        this.cardBody = $('<div class="card-body p-0"></div>')
        this.overlay = $('<div class="overlay d-none"></div>')
        $(this.element).append(this.cardBody)
        $(this.element).append(this.overlay)

        this.modelSoal = '1'; // list, tabel
        this.tipeSoal = '2'; // 1 to many, 1 to 1,
        this.maxJawaban = {};
        this.offsetMax = '0' // for warning max jawaban

        // viewMode
        // 1 = disable all (just view)
        // 2 = enable select && disable edit (siswa mode)
        // 3 = enable all (admin/guru mode)
        this.viewMode = '1';

        let datas = {};
        if (options.data) {
            if (options.data.jawaban.length > 0) {
                const ext = $.extend(true, [], options.data.jawaban)
                datas['data'] = convertDefaultToList(ext);
            }
            this.maxJawaban = options.data.max
            this.modelSoal = options.data.model === "0" ? "2" : options.data.model
            this.tipeSoal = options.data.type === "0" ? "2" : options.data.type
            this.viewMode = options.viewMode || '1'
        }
        this.settings = $.extend({}, defaults, datas);
        this.fnc = options.callback
        this.idResult = options.id
        this.onInit = options.onInit
        this.initialize = false

        this.listKiri = []
        this.listKanan = []
        this.linkeds = {}
        this.hasLinks = false
        this.dataResult = {};
        this.dataEditor = {};
        this.storedBoxes = [];
        this.storedLines = [];

        this.viewKiri = null
        this.viewKanan = null
        this.viewCanvas = null

        this.canvas = null;
        this.ctx = null;
        this.startX = 0;
        this.startY = 0;
        this.canvasOffset = 0;
        this.offsetX = 0;
        this.offsetY = 0;
        this.scrollX = 0;
        this.scrollY = 0;
        this.warnaKiri = {}
        this.warnaKanan = {}
        this.clicked = false
        this.idActive = ''
        this.firstY = 0;
        this.canvasWidth = 0;
        this.mouseX = 0;
        this.mouseY = 0;
        this.asyncResize = undefined;

        this.editMode = false;

        this.init();
    }

    $.extend(LinkerList.prototype, {
        init: function () {
            let self = this
            if (self.settings.data) {
                //console.log(self.settings.data)
                self.listKiri = $.extend(true, [], self.settings.data.kiri)
                self.listKanan = $.extend(true, [], self.settings.data.kanan)
                self.linkeds = $.extend(true, [], self.settings.data.linked)
                delete self.settings.data;
            }

            if (self.viewMode === '3') {
                let header = $('<div class="row" style="min-width: 500px"></div>')
                header.append('<div class="col-7"><div class="row"><div class="col mb-2" style="max-width: 90px">' +
                    '<div class="btn-group" role="group" data-toggle="button">' +
                    '   <button class="btn btn-outline-primary '+ (self.modelSoal === '1' ? 'active' : '') +'" data-id="switch-list' + self.listIdPrefix + '"><i class="fa fa-bars"></i></button>' +
                    '   <button class="btn btn-outline-primary '+ (self.modelSoal === '2' ? 'active' : '') +'" data-id="switch-table' + self.listIdPrefix + '"><i class="fa fa-table"></i></button>' +
                    '</div></div>' +
                    '<div class="col mb-2" style="max-width: 250px">' +
                    '   <select class="form-control" data-id="type-opsi' + self.listIdPrefix + '">' +
                    '       <option value="2">1 baris 1 jawaban</option>' +
                    '       <option value="1">1 baris banyak jawaban</option>' +
                    '   </select>' +
                    '</div></div></div>' +
                    '<div class="col-5 text-right">' +
                    '   <button class="btn btn-default" data-id="btn-edit' + self.listIdPrefix + '"><i class="fa fa-pencil-alt mr-2"></i>Edit</button>' +
                    '   <button class="btn btn-default d-none" data-id="btn-ok' + self.listIdPrefix + '"><i class="fa fa-check mr-2"></i>Selesai</button>' +
                    '</div>');

                $(self.cardBody).append(header)
                $(`select[data-id="type-opsi${self.listIdPrefix}"]`).val(self.tipeSoal)
                self.handleClick()
            }
            if (self.initialize) return
            if (self.modelSoal === '1') self.initList()
            else self.initTable()
        },

        initList: function () {
            let self = this
            let linkerContainer = $('<div class="d-flex flex-row flex-fill linker-list"></div>');
            let contKiri = $(templates.kiriContainer)
            contKiri.attr('id', 'list-kiri' + self.listIdPrefix)
            self.listKiri.forEach(function (kr, idx) {
                let div = $('<div></div>');
                div.attr('id', 'item' + kr.key + self.listIdPrefix);
                div.addClass('col my-2 item-kiri py-1 px-2');
                div.css({
                    'background-color': "#FFF",
                    'border': '1px solid #BDBDBD',
                    'border-radius': '6px',
                });
                if (self.viewMode !== '1') {
                    div.css({'cursor': 'pointer'});
                }
                div.html(self.convertLinkImage(kr.value))
                contKiri.append(div)
            })
            linkerContainer.append(contKiri)
            let contCanvas = $(templates.canvasContainer)
            contCanvas.attr('id', 'col-canvas' + self.listIdPrefix)
            let cnvs = $(templates.canvasItem)
            cnvs.attr('id', 'canvas' + self.listIdPrefix)
            contCanvas.append(cnvs)
            cnvs.mousemove(function (e) {
                self.handleMouseMove(e)
            })
            linkerContainer.append(contCanvas)

            let contKanan = $(templates.kananContainer)
            contKanan.attr('id', 'list-kanan' + self.listIdPrefix)
            self.listKanan.forEach(function (kn, idx) {
                let div = $('<div></div>');
                div.attr('id', 'item' + kn.key + self.listIdPrefix);
                div.addClass('col my-2 item-kanan py-1 px-2');
                div.css({
                    'background-color': "#FFF",
                    'border': '1px solid #BDBDBD',
                    'border-radius': '6px',
                });
                if (self.viewMode !== '1') {
                    div.css({'cursor': 'pointer'});
                }
                div.html(self.convertLinkImage(kn.value))
                contKanan.append(div)
            })
            linkerContainer.append(contKanan)

            let divResponsive =$('<div class="table-responsive"></div>')
            divResponsive.append(linkerContainer)
            $(self.cardBody).append(divResponsive)

            if (self.viewMode !== '1') {
                $('.item-kiri').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();

                    const firstChilds = $('#list-kiri' + self.listIdPrefix).children()[0]
                    const firstRect = firstChilds.getBoundingClientRect()
                    console.log(firstRect)
                    self.firstY = firstRect.top

                    const id = $(this).attr('id').replace('item', '').replace(self.listIdPrefix, '')
                    const idx = self.listKiri.findIndex(function (o) {
                        return o.key === id
                    })
                    if (!self.clicked) {
                        self.idActive = id
                        self.clicked = true

                        const div = $(this)
                        const rect = div[0].getBoundingClientRect()
                        const center = (rect.bottom - rect.top) / 2

                        //console.log('offset:'+self.offsetY, 'first:'+self.firstY)
                        const box = {
                            key: id,
                            color: colorsLine[idx + 1],
                            rectBoxX: 0,
                            rectBoxY: (rect.top - self.firstY) + center + 2,
                            lineMove: 7,
                            lineTo: 15,
                            lineY: (rect.top - self.firstY) + center + 7,
                        }
                        self.storedBoxes.push(box)

                        self.startX = 15;
                        self.startY = (rect.top - self.firstY) + center + 7;

                        $(this).css({
                            'background-color': colorsBg[idx + 1],
                            'border': '1px solid ' + colorsLine[idx + 1]
                        })
                    } else {
                        if (self.idActive !== '') {
                            self.storedBoxes.pop()
                            self.applyColor()
                            self.redraw()
                        }
                        self.clicked = false
                        self.idActive = ''
                    }
                })

                let $itemKanan = $('.item-kanan')
                $itemKanan.click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    self.clicked = false
                    const id = $(this).attr('id').replace('item', '').replace(self.listIdPrefix, '')
                    if (self.idActive !== '') {
                        self.listKiri.find(function (item) {
                            if (item.key === self.idActive) {
                                if (self.tipeSoal === '2') {
                                    self.linkeds[item.key] = []
                                } else {
                                    if (!self.linkeds[item.key]) self.linkeds[item.key] = []
                                }
                                if (!self.linkeds[item.key].includes(id)) self.linkeds[item.key].push(id)
                            }
                        })
                        self.triggerResult()
                    } else {
                        if (self.warnaKanan[id]) {
                            self.warnaKanan[id] = [0]
                            self.listKiri.find(function (item) {
                                if (self.warnaKanan[id].includes(item.key)) {
                                    self.warnaKanan[id] = [0]
                                }
                                if (self.linkeds[item.key] && self.linkeds[item.key].includes(id)) {
                                    self.linkeds[item.key] = self.arrayRemove(self.linkeds[item.key], id)
                                    if (self.linkeds[item.key].length === 0) self.warnaKiri[item.key] = 0
                                }
                            })
                            self.triggerResult()
                        }
                    }
                    self.createPoints()
                    self.idActive = ''
                })

                $itemKanan.hover(function (el) {
                    el.preventDefault();
                    el.stopPropagation();
                    el.stopImmediatePropagation();
                    if (self.idActive === '') return

                    const id = (el.target.id).replace('item', '').replace(self.listIdPrefix, '')
                    const div2 = $(this)
                    const rect2 = div2[0].getBoundingClientRect()
                    const center2 = (rect2.bottom - rect2.top) / 2

                    const box = {
                        key: id,
                        color: colorsLine[id],
                        rectBoxX: self.canvasWidth - 7,
                        rectBoxY: (rect2.top - self.firstY) + center2 + 2,
                        lineMove: self.canvasWidth - 15,
                        lineTo: self.canvasWidth - 7,
                        lineY: (rect2.top - self.firstY) + center2 + 7,
                    }

                    self.storedBoxes.push(box)
                    self.mouseX = self.canvasWidth - 15;
                    self.mouseY = (rect2.top - self.firstY) + center2 + 7;
                    self.redraw()

                    // draw the current line
                    self.ctx.beginPath();
                    self.ctx.moveTo(self.startX, self.startY);
                    self.ctx.lineTo(self.mouseX, self.mouseY);
                    self.ctx.strokeStyle = colorsLine[self.idActive];
                    self.ctx.lineWidth = 1;
                    self.ctx.lineCap = 'round';
                    self.ctx.stroke()

                    div2.css({
                        'border': '1px solid ' + colorsLine[self.idActive]
                    })
                }, function () {
                    if (self.idActive === '') return
                    self.storedBoxes.pop()
                    self.applyColor()
                    self.redraw()
                })

                self.showDialog(false)
            }
            self.drawLinked()

            new ResizeSensor($('#list-kiri' + self.listIdPrefix), function(){
                if (self.modelSoal === '1' && !self.editMode) self.drawLinked()
            });

            $(window).on('resize', function () {
                if (self.modelSoal === '1' && !self.editMode) self.drawLinked()
            });
            $(window).on('scroll', function () {
                if (self.canvas.length) {
                    const rect = self.canvas.getBoundingClientRect();
                    self.offsetX = rect.left;
                    self.offsetY = rect.top;
                }
            });
            self.triggerResult()
            if (!self.initialize) {
                self.initialize = true
            }
        },

        initTable: function () {
            let self = this
            let dataTable = convertListToTable(self.listKiri, self.listKanan, self.linkeds)
            let table = $('<table id="table-jodohkan' + self.listIdPrefix + '" class="table table-sm table-bordered linker-list"></table>');
            let trs = '';

            $.each(dataTable, function (k, v) {
                if (k === 0) {
                    trs += '<tr>';
                    $.each(v, function (key, val) {
                        if (key === 0) {
                            trs += '<th class="text-white">' + val + '</th>';
                        } else {
                            trs += '<th class="kolom align-middle text-center">' + self.convertLinkImage(val) + '</th>';
                        }
                    });
                    trs += '</tr>';
                } else {
                    trs += '<tr>';
                    $.each(v, function (t, i) {
                        if (t === 0) {
                            trs += '<td class="baris text-bold align-middle text-center">' + self.convertLinkImage(i) + '</td>';
                        } else {
                            const selected = i === '1';
                            const checked = selected ? ' checked' : '';
                            const type = self.tipeSoal !== '2' ? 'checkbox' : 'radio';
                            trs += '<td class="align-middle text-center">';
                            if (self.viewMode === '1') {
                                trs += selected ? '✔' : ''
                            } else {
                                const mx = self.maxJawaban && self.maxJawaban[k] ? self.maxJawaban[k] : '20'
                                trs += '<input class="check' + self.listIdPrefix + '" type="' + type +
                                    '" data-max="' + mx + '" name="check' + k +
                                    '" style="height: 20px; width: 20px"' + checked + '>';
                            }
                            trs += '</td>';
                        }
                    });
                    trs += '</tr>';
                }
            });
            table.append($(trs))

            let divResponsive =$('<div class="table-responsive"></div>')
            divResponsive.append(table)

            $(self.cardBody).append(divResponsive)

            if (self.viewMode !== '1') {
                $('.check' + self.listIdPrefix).click(function (e) {
                    var row = $(e.target).closest('tr');
                    var isChecked = $(row).find("input:checked");
                    var max = $(this).data('max');
                    if (isChecked.length > max) {
                        $(this).prop('checked', !$(this).prop('checked'));
                        self.offsetMax = max
                    } else {
                        self.offsetMax = '0'
                    }
                    self.triggerResult()
                })
            }
            self.showDialog(false)

            self.triggerResult()
            if (!self.initialize) {
                self.initialize = true
            }

        },

        initEdit: function () {
            let self = this
            let linkerContainer = $('<div class="d-flex flex-row flex-fill editor-list justify-content-between"></div>');

            let contKiri = $(templates.kiriContainer)
            contKiri.attr('data-id', 'editor-kiri' + self.listIdPrefix)
            let lastKeyKiri = 0
            //console.log('kiri', self.dataEditor)
            self.dataEditor.kiri.forEach(function (kr, idx) {
                lastKeyKiri = idx + 1
                let div = $('<div></div>');
                div.attr('data-id', 'item' + kr.key + self.listIdPrefix);
                div.addClass('col my-2 item-kiri py-1 px-2');
                let edittext = $('<textarea data-id="' + kr.key + '" class="kiri summernote-editor' + self.listIdPrefix + '">' + self.convertLinkImage(kr.value) + '</textarea>');
                div.append(edittext)
                contKiri.append(div)
            })
            contKiri.append($('<button class="btn btn-default hapus ml-2" data-id="tambah-kiri' + self.listIdPrefix + '"><i class="fa fa-plus text-gray"></i> Tambah Baris</button>'))
            linkerContainer.append(contKiri)

            let contKanan = $(templates.kananContainer)
            contKanan.attr('data-id', 'editor-kanan' + self.listIdPrefix)
            let lastKeyKanan = 0
            self.dataEditor.kanan.forEach(function (kn, idx) {
                lastKeyKanan = idx
                let div = $('<div></div>');
                div.attr('data-id', 'item' + kn.key + self.listIdPrefix);
                div.addClass('col my-2 item-kanan py-1 px-2');
                let edittext = $('<textarea data-id="' + kn.key + '" class="kanan summernote-editor' + self.listIdPrefix + '">' + self.convertLinkImage(kn.value) + '</textarea>');
                div.append(edittext)
                contKanan.append(div)
            })
            contKanan.append($('<button class="float-right btn btn-default hapus ml-2" data-id="tambah-kanan' + self.listIdPrefix + '"><i class="fa fa-plus text-gray"></i> Tambah Kolom</button>'))
            linkerContainer.append(contKanan)
            $(self.cardBody).append(linkerContainer)

            initSummernote()
            let btnAddKiri = $(`button[data-id="tambah-kiri${self.listIdPrefix}"]`);
            let btnAddKanan = $(`button[data-id="tambah-kanan${self.listIdPrefix}"]`);

            btnAddKiri.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                lastKeyKiri += 1
                let div = $('<div></div>');
                div.attr('data-id', 'item' + lastKeyKiri + self.listIdPrefix);
                div.addClass('col my-2 item-kiri py-1 px-2');
                let edittext = $('<textarea data-id="' + lastKeyKiri + '" class="kiri summernote-editor' + self.listIdPrefix + '"></textarea>');
                div.append(edittext)

                div.insertBefore(btnAddKiri);
                initSummernote()
            })

            const alpha = Array.from(Array(26)).map((e, i) => i + 65);
            const alphabet = alpha.map((x) => String.fromCharCode(x));
            btnAddKanan.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                lastKeyKanan += 1
                let div = $('<div></div>');
                div.attr('data-id', 'item' + alphabet[lastKeyKanan] + self.listIdPrefix);
                div.addClass('col my-2 item-kanan py-1 px-2');
                let edittext = $('<textarea data-id="' + alphabet[lastKeyKanan] + '" class="kanan summernote-editor' + self.listIdPrefix + '"></textarea>');
                div.append(edittext)
                div.insertBefore(btnAddKanan);
                initSummernote()
            })
            self.showDialog(false)

            function initSummernote() {
                let HelloButton = function (context) {
                    let ui = $.summernote.ui;
                    let button = ui.button({
                        contents: '<i class="card-tools fa fa-times"/>',
                        tooltip: 'Hapus',
                        click: function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            e.stopImmediatePropagation();
                            const key = $(this).closest('.col')
                            const data = {
                                element: key,
                                item: $(key).hasClass('item-kiri') ? 'baris' : 'kolom',
                                id: key.attr('data-id')
                            }
                            self.showDialog(true, false, data)
                        }
                    });
                    return button.render();
                };

                $('.summernote-editor' + self.listIdPrefix).summernote({
                    placeholder: 'Tulis Jawaban disini',
                    tabsize: 2,
                    minHeight: 50,
                    toolbar: [
                        ['font', ['bold', 'italic', 'underline']],
                        ['color', ['color']],
                        ['insert', ['picture', 'math']],
                        ['view', ['codeview']],
                        ['delete', ['hapus']]
                    ],
                    buttons: {
                        hapus: HelloButton
                    },
                });
            }
        },

        createPoints: function () {
            let self = this
            self.storedBoxes = [];
            self.storedLines = [];
            self.warnaKanan = {}

            self.listKiri.forEach(function (kr, idx) {
                const div = $('#item' + kr.key + self.listIdPrefix)
                const rect = div[0].getBoundingClientRect()
                if (kr.key === "1") self.firstY = rect.top
                const center = (rect.bottom - rect.top) / 2

                const linked = self.linkeds[kr.key]
                if (linked && linked.length > 0) {
                    const box = {
                        key: kr.key,
                        color: colorsLine[idx + 1],
                        rectBoxX: 0,
                        rectBoxY: (rect.top - self.firstY) + center + 2,
                        lineMove: 7,
                        lineTo: 15,
                        lineY: (rect.top - self.firstY) + center + 7,
                    }
                    self.storedBoxes.push(box)

                    const pointKiriY = (rect.top - self.firstY) + center + 7;
                    const pointKiriX = 15;
                    linked.forEach(function (ln) {
                        if (ln.length) {
                            const div2 = $('#item' + ln + self.listIdPrefix)
                            const rect2 = div2[0].getBoundingClientRect()
                            const center2 = (rect2.bottom - rect2.top) / 2

                            const box = {
                                key: ln,
                                color: colorsLine[idx + 1],
                                rectBoxX: self.canvasWidth - 7,
                                rectBoxY: (rect2.top - self.firstY) + center2 + 2,
                                lineMove: self.canvasWidth - 15,
                                lineTo: self.canvasWidth - 7,
                                lineY: (rect2.top - self.firstY) + center2 + 7,
                            }
                            self.storedBoxes.push(box)

                            const stoke = {
                                key: kr.key + '' + ln,
                                color: colorsLine[idx + 1],
                                lineMoveX: pointKiriX,
                                lineMoveY: pointKiriY,
                                lineToX: self.canvasWidth - 15,
                                lineToY: (rect2.top - self.firstY) + center2 + 7
                            }
                            self.storedLines.push(stoke)
                        } else {
                            console.log('div2 undefined')
                        }
                    })

                    self.warnaKiri[kr.key] = idx + 1
                    linked.forEach(function (v) {
                        if (!self.warnaKanan[v]) self.warnaKanan[v] = []
                        self.warnaKanan[v].push(idx + 1)
                    })
                }
            })

            self.applyColor()
            self.redraw()
        },

        drawLinked: function () {
            let self = this

            const tKiri = $("#list-kiri" + self.listIdPrefix);
            const hKiri = tKiri.innerHeight();
            const tKanan = $("#list-kanan" + self.listIdPrefix);
            const hKanan = tKanan.innerHeight();

            const canv = $("#col-canvas" + self.listIdPrefix);
            self.canvasWidth = canv.outerWidth();
            const selCanvas = $("#canvas" + self.listIdPrefix)
            if (selCanvas.length) {
                self.canvas = selCanvas[0];
                self.ctx = self.canvas.getContext("2d");
                selCanvas.attr("width", self.canvasWidth);
                //selCanvas.attr("height", 0);

                //function resizeCanvas() {
                    const fixedHeight = hKiri < hKanan ? hKanan : hKiri
                    selCanvas.attr("height", '' + (fixedHeight-15));

                    const rect = self.canvas.getBoundingClientRect();
                    self.offsetX = rect.left;
                    self.offsetY = rect.top;

                    //self.canvasOffset = $(self.canvas).offset();
                    //self.offsetX = self.canvasOffset.left;
                    //self.offsetY = self.canvasOffset.top;
                    self.createPoints()
                //}

                //clearTimeout(self.asyncResize)
                //self.asyncResize = setTimeout(resizeCanvas, 200)
            }
        },

        handleClick: function () {
            let self = this
            let typeOpsi = $(`select[data-id="type-opsi${self.listIdPrefix}"]`);
            let btnEdit = $(`button[data-id="btn-edit${self.listIdPrefix}"]`);
            let btnOk = $(`button[data-id="btn-ok${self.listIdPrefix}"]`);
            let switchList = $(`button[data-id="switch-list${self.listIdPrefix}"]`);
            let switchTable = $(`button[data-id="switch-table${self.listIdPrefix}"]`);

            switchList.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                //self.triggerResult()
                const converted = convertDefaultToList(self.getResult())
                self.listKiri = converted.kiri
                self.listKanan = converted.kanan
                self.linkeds = converted.linked

                self.modelSoal = '1';
                switchList.toggleClass('active', self.modelSoal === '1')
                switchTable.toggleClass('active', self.modelSoal === '2')
                if ($(self.cardBody).children().length > 1) {
                    $(self.cardBody).children()[1].remove()
                }

                self.initList()
            })

            switchTable.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                self.modelSoal = '2';
                //self.triggerResult()

                switchList.toggleClass('active', self.modelSoal === '1')
                switchTable.toggleClass('active', self.modelSoal === '2')
                if ($(self.cardBody).children().length > 1) {
                    $(self.cardBody).children()[1].remove()
                }
                self.initTable()
            })

            btnEdit.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                self.showDialog(true, true)
                setTimeout(function () {
                    self.editMode = true
                    btnEdit.addClass('d-none')
                    btnOk.removeClass('d-none')
                    switchList.attr('disabled', 'disabled')
                    switchTable.attr('disabled', 'disabled')
                    typeOpsi.attr('disabled', 'disabled')
                    const res = self.getResult();
                    const converted = convertDefaultToList(res)
                    self.dataEditor['kiri'] = converted.kiri
                    self.dataEditor['kanan'] = converted.kanan
                    //self.linkeds = converted.linked
                    if ($(self.cardBody).children().length > 1) {
                        $(self.cardBody).children()[1].remove()
                    }
                    self.initEdit()
                }, 200)
            })

            btnOk.click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                self.showDialog(true, true)
                setTimeout(function () {
                    self.saveEditor()
                    self.editMode = false
                    btnEdit.removeClass('d-none')
                    btnOk.addClass('d-none')
                    switchList.removeAttr('disabled')
                    switchTable.removeAttr('disabled')
                    typeOpsi.removeAttr('disabled')
                    if ($(self.cardBody).children().length > 1) {
                        $(self.cardBody).children()[1].remove()
                    }
                    if (self.modelSoal === '1') self.initList()
                    else self.initTable()
                }, 200)
            })

            typeOpsi.on('change', function () {
                if (self.modelSoal === '2') {
                    if ($(this).val() === '2') {
                        $('.check' + self.listIdPrefix).attr('type', 'radio');
                    } else {
                        $('.check' + self.listIdPrefix).attr('type', 'checkbox');
                    }
                }
                self.tipeSoal = $(this).val()
                self.triggerResult()
            });
        },

        applyColor: function () {
            let self = this
            Object.keys(self.warnaKiri).forEach(function (key) {
                $(`#item${key + self.listIdPrefix}`).css({
                    'background-color': colorsBg[self.warnaKiri[key]],
                    'border': '1px solid ' + colorsLine[self.warnaKiri[key]]
                })
            })
            self.listKanan.forEach(function (kn, idx) {
                let css;
                if (self.warnaKanan[kn.key]) {
                    let colors = self.warnaKanan[kn.key];
                    let grad = 'to right';
                    const percent = 100 / colors.length;
                    let postLine;
                    $.each(colors, function (i, c) {
                        postLine = c
                        grad += ', ' + colorsBg[c] + ' ' + percent * i + '%, ' + colorsBg[c] + ' ' + percent * (i + 1) + '%';
                    });
                    css = {
                        'background-color': colorsBg[colors.length - 1],
                        'background-image': 'linear-gradient(' + grad + ')',
                        'border': '1px solid ' + colorsLine[postLine]
                    }
                } else {
                    css = {
                        'background-color': colorsBg[0],
                        'background-image': 'linear-gradient(' + colorsBg[0] + ',' + colorsBg[0] + ')',
                        'border': '1px solid ' + colorsLine[0]
                    }
                }
                $(`#item${kn.key + self.listIdPrefix}`).css(css)
            })
        },

        redraw: function () {
            let self = this
            self.ctx.clearRect(0, 0, self.canvas.width, self.canvas.height);
            if (self.storedLines.length === 0 && self.storedBoxes.length === 0) {
                return;
            }

            self.storedBoxes.forEach(function (box) {
                self.ctx.beginPath();
                self.ctx.rect(box.rectBoxX, box.rectBoxY, 7, 10);
                self.ctx.fillStyle = box.color;
                self.ctx.fill();

                self.ctx.beginPath();
                self.ctx.moveTo(box.lineMove, box.lineY);
                self.ctx.lineTo(box.lineTo, box.lineY);
                self.ctx.lineWidth = 1;
                self.ctx.strokeStyle = box.color;
                self.ctx.stroke();
            })

            self.storedLines.forEach(function (line) {
                self.ctx.beginPath();
                self.ctx.moveTo(line.lineMoveX, line.lineMoveY);
                self.ctx.lineTo(line.lineToX, line.lineToY);
                self.ctx.strokeStyle = line.color;
                self.ctx.lineWidth = 1;
                self.ctx.lineCap = 'round';
                self.ctx.stroke();
            })
        },

        handleMouseMove: function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            let self = this
            if (!self.clicked) {
                return;
            }
            self.redraw()

            self.mouseX = parseInt(e.clientX - self.offsetX);
            self.mouseY = parseInt(e.clientY - self.offsetY);

            self.ctx.beginPath();
            self.ctx.moveTo(self.startX, self.startY);
            self.ctx.lineTo(self.mouseX, self.mouseY);
            self.ctx.strokeStyle = colorsLine[self.idActive];
            self.ctx.lineWidth = 1;
            self.ctx.lineCap = 'round';
            self.ctx.stroke()
        },

        arrayRemove: function (arr, value) {
            return arr.filter(function (it) {
                return it !== value;
            });
        },

        getResult: function () {
            let self = this
            //console.log('modelSoal', self.modelSoal)
            if (self.modelSoal === '2') {
                let arrEmpty = []
                let res = $(`#table-jodohkan${self.listIdPrefix} tr`).get().map(function (row) {
                    var $tables = [];
                    $(row).find('th').get().map(function (cell) {
                        const klm = $(cell).html();
                        $tables.push(klm);
                    });

                    let ar = []
                    $(row).find('td').get().map(function (cell) {
                        if ($(cell).children('input').length > 0) {
                            const val = $(cell).find('input').prop("checked") === true ? "1" : "0"
                            $tables.push(val);
                            if (val === "1") ar.push(val)
                        } else {
                            $tables.push($(cell).html())
                        }
                    });
                    arrEmpty.push(ar.length > 0 ? 1 : 0)
                    return $tables
                })
                arrEmpty.shift()
                //console.log('links1', arrEmpty)
                self.hasLinks = arrEmpty.includes(1)
                return res;
            } else {
                let arrEmpty = []
                $.each(self.linkeds, function( key, value ) {
                    if (key) {
                        arrEmpty.push(value.length > 0 ? 1 : 0)
                    }
                });
                //console.log('links2', arrEmpty)
                self.hasLinks = arrEmpty.includes(1)
                return convertListToTable(self.listKiri, self.listKanan, self.linkeds)
            }
        },

        getKeyLinked: function () {
            let self = this
            let links;
            if (self.modelSoal === '2') {
                const converted = convertDefaultToList(self.getResult())
                links = converted.linked
            } else {
                links = self.linkeds
            }
            return links
        },

        saveEditor: function () {
            let self = this
            const $summernotes = $('.summernote-editor' + self.listIdPrefix)

            let kiri = []
            let kanan = []
            $.each($summernotes, function (idx, summ) {
                const key = $(this).data('id')
                const val = $(this).summernote('code')
                let obj = {}
                obj['key'] = key + ''
                obj['value'] = val
                if ($(this).hasClass('kiri')) {
                    kiri.push(obj)
                } else {
                    kanan.push(obj)
                }
            })
            self.listKiri = kiri
            self.listKanan = kanan
            self.linkeds = {}
            self.warnaKanan = {}
            self.warnaKiri = {}
        },

        showDialog: function (show, loading, data) {
            let self = this
            self.overlay.html('')
            if (!show) {
                self.overlay.addClass('d-none')
            } else {
                let content;
                let idHapus = '0'
                let item;
                if (loading) {
                    content = $('<div class="spinner-grow"></div>')
                } else {
                    const id = data.id
                    item = data.item
                    idHapus = id.split('-')[0].replace('item', '')
                    content = '<div class="card border card' + self.listIdPrefix + '">' +
                        '<div class="card-body">Hapus ' + item + ' ' + idHapus + '?</div>' +
                        '<div class="card-footer"><button class="btn text-info btn-cancel">Batal</button><button class="btn btn-outline-danger btn-hapus">Hapus</button></div>' +
                        '</div>'
                }
                self.overlay.append(content)
                self.overlay.removeClass('d-none')

                $('.card' + self.listIdPrefix + ' .btn-cancel').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    self.overlay.html('')
                    self.overlay.addClass('d-none')
                })

                $('.card' + self.listIdPrefix + ' .btn-hapus').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    data.element.remove()
                    self.overlay.html('')
                    self.overlay.addClass('d-none')
                })
            }
        },

        triggerResult: function () {
            let self = this
            if (self.fnc) {
                self.dataResult['type'] = self.tipeSoal
                self.dataResult['model'] = self.modelSoal
                self.dataResult['links'] = self.getKeyLinked()
                self.dataResult['jawaban'] = self.getResult()
                self.fnc(
                    self.idResult,
                    self.dataResult,
                    self.hasLinks,
                    self.offsetMax
                )
            }
        },

        convertLinkImage: function (value) {
            let konten = $($.parseHTML(value));
            konten.find(`img`).each(function () {
                $(this).removeAttr('alt');
                $(this).css({'max-width': '150px'});
                var curSrc = $(this).attr('src');
                if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
                } else {
                    var pathUpload = 'uploads';
                    var forReplace = curSrc.split(pathUpload);
                    $(this).attr('src', base_url + pathUpload + forReplace[1]);
                }
            });
            const copy = konten.html(konten.clone()).html()
            return copy || value
        }
    });

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            const rndm = getRandomInt(1024000000)
            const plugin = "plugin_" + pluginName + rndm
            if (!$.data(this, plugin)) {
                $.data(this, plugin, new LinkerList(this, options));
            }
        });
    };

})(jQuery, window, document);

function convertDefaultToList(array) {
    const alpha = Array.from(Array(26)).map((e, i) => i + 65);
    const alphabet = alpha.map((x) => String.fromCharCode(x));
    let posAlpha = 0;

    var kanan = array.shift();
    let listKiri = []
    $.each(array, function (i, v) {
        const s = v.shift()
        let objKiri = {}
        objKiri['key'] = (i + 1) + ''
        objKiri['value'] = s
        listKiri.push(objKiri)
    });
    kanan.shift();
    let listKanan = []
    $.each(kanan, function (i, v) {
        let objKanan = {}
        objKanan['key'] = alphabet[posAlpha]
        objKanan['value'] = v
        listKanan.push(objKanan)
        posAlpha++;
    });

    let objLink = {}
    $.each(array, function (n, arv) {
        if (!objLink['' + listKiri[n].key]) objLink[listKiri[n].key] = []
        $.each(arv, function (t, v) {
            if (v === '1') {
                objLink['' + listKiri[n].key].push(listKanan[t].key)
            }
        });
    });
    var item = {};
    item['kiri'] = listKiri
    item['kanan'] = listKanan
    item['linked'] = objLink;
    return item;
}

function convertListToTable(kiri, kanan, linked) {
    var listkanan = $.extend(true, [], kanan);
    var listkiri = $.extend(true, [], kiri);

    var arrayres = [];

    $.each(listkiri, function (ind, val) {
        var vv = [];
        for (let i = 0; i < listkanan.length; i++) {
            var sv = '0';
            if (linked[val.key] && linked[val.key].length > 0) {
                sv = linked[val.key].includes(listkanan[i].key) ? '1' : '0'
            }
            vv.push(sv);
        }

        vv.unshift(val.value);
        arrayres.push(vv);
    });
    let arrkanan = ['#']
    $.each(listkanan, function (i, v) {
        arrkanan.push(v.value)
    })
    arrayres.unshift(arrkanan);
    return arrayres
}

