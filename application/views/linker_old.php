<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.min.js"></script>
    <!--
    <style>
        canvas {
            border:1px solid red;
        }
    </style>
    -->
</head>
<body>
<div class="container pt-4">
    TEST
    <div id="graph"></div>
    <div class="container-fluid d-flex p-0 box-item-kiri" style="background-color: rgb(255, 235, 238); border: 1px solid rgb(198, 40, 40); border-radius: 6px;">
        <div id="item1-430236683" class="col py-1 px-2 item-kiri" style="cursor: pointer">
            Test 1
            <br />
            sdghvcs
        </div>
        <div class="flex-fixed-width-item">
            <button class="btn btn-sm"><i class="fa fa-pencil-alt"></i></button>
            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="table-responsive">
        <div class="d-flex flex-row flex-fill linker-list">
            <div id="list-kiri" style="width: 38%; min-width: 200px"></div>
            <div id="col-canvas" style="width: 24%; min-width: 100px">
                <canvas id="canvas" height="200" width="100"></canvas>
            </div>
            <div id="list-kanan" style="width: 38%; min-width: 200px"></div>
        </div>
    </div>
    <hr />
    <div id="linker-container1"></div>
    <hr />
    <div>
        <button id="clear">Clear Canvas</button>
    </div>
</div>
<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script>
    //const colorsLine = '#D50000,#33691e,#304FFE,#3E2723,#FF6F00,#64DD17,#4A148C,#FFD600,#263238,#212121'.split(',');
    //const colorsBg = '#ffcdd2,#c8e6c9,#90caf9,#d7ccc8,#ffcc80,#ccff90,#e1bee7,#ffff00,#cfd8dc,#e0e0e0'.split(',');

    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var canvasOffset = $("#canvas").offset();
    var offsetX = canvasOffset.left;
    var offsetY = canvasOffset.top;
    var storedLines = [];
    var storedBoxes = [];
    var startX = 0;
    var startY = 0;
    var isDown;

    let warnaKiri = {}
    let warnaKanan = {}
    let clicked = false
    let idActive = ''
    let firstY = 0;
    let canvasWidth = 0;
    let mouseX, mouseY;

    ctx.strokeStyle = "orange";
    ctx.lineWidth = 3;

    const colorsLine = [
        "#BDBDBD",
        "#C62828",
        "#283593",
        "#00695C",
        "#9E9D24",
        "#6A1B9A",
        "#FBC02D",
        "#F57C00",
        "#E64A19",
        "#5D4037",
        "#37474F",
    ]

    const colorsBg = [
        "#FFFFFF",
        "#FFEBEE",
        "#C5CAE9",
        "#B2EBF2",
        "#DCEDC8",
        "#E1BEE7",
        "#FFF9C4",
        "#FFE0B2",
        "#FFCCBC",
        "#D7CCC8",
        "#CFD8DC",
    ]

    let listMatch = {
        kiri: [
            {key: '1', value: 'Test 1'},
            {key: '2', value: 'Test 2 gfh z resgfgj gih oih iuglfy tdjy  yytd j<br>Test'},
            {key: '3', value: 'Test 3'},
            {key: '4', value: 'Test 4<br>Test<br>Test'},
            {key: '5', value: 'Test 5'},
        ],
        kanan: [
            {key: 'A', value: 'Test A'},
            {key: 'B', value: 'Test B'},
            {key: 'C', value: 'Test C'},
            {key: 'D', value: 'Test D<br>Test'},
            {key: 'E', value: 'Test E'},
            {key: 'F', value: 'Test F'},
        ],
        linked: {
            '1': ['B', 'C'],
            '2': ['D'],
            '3': ['F'],
            '4': ['D'],
            '5': [],
        }
    }

    let asyncResize;

    const drawLinker = function() {
        const tKiri = document.getElementById("list-kiri");
        const hKiri = tKiri.clientHeight;
        const tKanan = document.getElementById("list-kanan");
        const hKanan = tKanan.clientHeight;

        const canv = document.getElementById("col-canvas");
        canvasWidth = canv.clientWidth;
        const canvas = document.getElementById("canvas");
        canvas.setAttribute("width", canvasWidth);
        canvas.setAttribute("height", 0);
        function resizeCanvas() {
            const fixedHeight = hKiri < hKanan ? hKanan : hKiri
            canvas.setAttribute("height", ''+fixedHeight);
            createPoints()
        }

        clearTimeout(asyncResize)
        asyncResize = setTimeout(resizeCanvas, 100)
    };

    function createPoints() {
        //console.log('kiri', listMatch.kiri)
        storedBoxes = [];
        storedLines = [];
        warnaKanan = {}
        //listMatch.kanan.forEach(function (kn, idx) {
        //    if (!warnaKanan[v]) warnaKanan[v] = []
        //    warnaKanan[kn.key].push(0)
        //})

        const linkeds = listMatch.linked;
        listMatch.kiri.forEach(function (kr, idx) {
            //warnaKiri[kr.key] = 0
            const div = document.getElementById('item'+kr.key)
            const rect = div.getBoundingClientRect()
            if (kr.key === "1") firstY = rect.top
            const center = (rect.bottom - rect.top) / 2

            const linked = linkeds[kr.key]
            if (linked.length > 0) {
                const box = {
                    key: kr.key,
                    color: colorsLine[idx+1],
                    rectBoxX: 0,
                    rectBoxY: (rect.top - firstY) + center + 2,
                    lineMove: 7,
                    lineTo: 15,
                    lineY: (rect.top - firstY) + center + 7,
                }
                storedBoxes.push(box)

                const pointKiriY = (rect.top - firstY) + center + 7;
                const pointKiriX = 15;
                linked.forEach(function (ln) {
                    const div2 = document.getElementById('item'+ln)
                    const rect2 = div2.getBoundingClientRect()
                    const center2 = (rect2.bottom - rect2.top) /2

                    const box = {
                        key: ln,
                        color: colorsLine[idx+1],
                        rectBoxX: canvasWidth - 7,
                        rectBoxY: (rect2.top - firstY) + center2 + 2,
                        lineMove: canvasWidth - 15,
                        lineTo: canvasWidth - 7,
                        lineY: (rect2.top - firstY) + center2 + 7,
                    }
                    storedBoxes.push(box)

                    const stoke = {
                        key: kr.key+''+ln,
                        color: colorsLine[idx+1],
                        lineMoveX: pointKiriX,
                        lineMoveY: pointKiriY,
                        lineToX: canvasWidth - 15,
                        lineToY: (rect2.top - firstY) + center2 + 7
                    }
                    storedLines.push(stoke)
                })
            }

            if (linked && linked.length) warnaKiri[kr.key] = idx+1
            linked.forEach(function (v) {
                if (!warnaKanan[v]) warnaKanan[v] = []
                warnaKanan[v].push(idx+1)
            })
        })

        applyColor()
        redraw()
    }

    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if (storedLines.length === 0 && storedBoxes.length === 0) {
            return;
        }

        storedBoxes.forEach(function (box) {
            ctx.beginPath();
            ctx.rect(box.rectBoxX, box.rectBoxY, 7, 10);
            ctx.fillStyle = box.color;
            ctx.fill();

            ctx.beginPath();
            ctx.moveTo(box.lineMove, box.lineY);
            ctx.lineTo(box.lineTo, box.lineY);
            ctx.lineWidth = 1;
            ctx.strokeStyle = box.color;
            ctx.stroke();
        })

        storedLines.forEach(function (line) {
            ctx.beginPath();
            ctx.moveTo(line.lineMoveX, line.lineMoveY);
            ctx.lineTo(line.lineToX, line.lineToY);
            ctx.strokeStyle = line.color;
            ctx.lineWidth = 1;
            ctx.lineCap = 'round';
            ctx.stroke();
        })
    }

    function applyColor() {
        Object.keys(warnaKiri).forEach(function (key) {
            $(`#item${key}`).css({
                'background-color': colorsBg[warnaKiri[key]],
                'border': '1px solid '+ colorsLine[warnaKiri[key]]
            })
        })

        listMatch.kanan.forEach(function (kn, idx) {
            let css;
            if (warnaKanan[kn.key]) {
                let colors = warnaKanan[kn.key];
                let grad = 'to right';
                const percent = 100 / colors.length;
                $.each(colors, function (i, c) {
                    grad += ', ' + colorsBg[c] + ' ' + percent * i + '%, ' + colorsBg[c] + ' ' + percent * (i + 1) + '%';
                });
                css = {
                    'background-color': colorsBg[colors.length - 1],
                    'background-image': 'linear-gradient(' + grad + ')',
                    'border': '1px solid ' + colorsLine[warnaKanan[kn.key]]
                }
            } else {
                css = {
                    'background-color': colorsBg[0],
                    'background-image': 'linear-gradient(' + colorsBg[0] + ',' + colorsBg[0] + ')',
                    'border': '1px solid ' + colorsLine[0]
                }
            }
            $(`#item${kn.key}`).css(css)
        })
    }

    $(document).ready(function () {
        $('#linker-container1').linkerList();

        listMatch.kiri.forEach(function (kr, idx) {
            let div = $('<div></div');
            div.attr('id', 'item'+kr.key);
            div.addClass('my-2 item-kiri  py-1 px-2');
            div.css({'background-color': "#FFF", 'border': '1px solid #BDBDBD', 'border-radius': '6px', 'cursor': 'pointer'});
            div.html(kr.value)
            $('#list-kiri').append(div)
        })
        listMatch.kanan.forEach(function (kn, idx) {
            let div = $('<div></div');
            div.attr('id', 'item'+kn.key);
            div.addClass('my-2 item-kanan py-1 px-2');
            div.css({'background-color': "#FFF", 'border': '1px solid #BDBDBD', 'border-radius': '6px', 'cursor': 'pointer'});
            div.html(kn.value)

            $('#list-kanan').append(div)
        })
        storedBoxes = [];
        storedLines = [];
        drawLinker()

        window.addEventListener("resize", drawLinker);

        $('.item-kiri').click(function (e) {
            const id = (e.target.id).replace('item', '')
            //console.log('click', id)
            const idx = listMatch.kiri.findIndex(function (o) {
                return o.key === id
            })
            if (!clicked) {
                idActive = id
                clicked = true
                const div = document.getElementById(e.target.id)
                const rect = div.getBoundingClientRect()
                const center = (rect.bottom - rect.top) /2

                const box = {
                    key: id,
                    color: colorsLine[idx+1],
                    rectBoxX: 0,
                    rectBoxY: (rect.top - firstY) + center + 2,
                    lineMove: 7,
                    lineTo: 15,
                    lineY: (rect.top - firstY) + center + 7,
                }
                storedBoxes.push(box)

                startX = 15;
                startY = (rect.top - firstY) + center + 7;
                //handleMouseMove(e)
                $(`#item${id}`).css({
                    'background-color': colorsBg[idx+1],
                    'border': '1px solid '+ colorsLine[idx+1]
                })
            } else {
                if (idActive !== '') {
                    storedBoxes.pop()
                    $(`#item${id}`).css({
                        'background-color': '#FFF',
                        'border': '1px solid #BDBDBD'
                    })
                }
                clicked = false
                idActive = ''
            }
        })
        $('.item-kanan').click(function (e) {
            clicked = false
            const id = (e.target.id).replace('item', '')
            if (idActive !== '') {
                /*
                const idx = listMatch.kiri.findIndex(function (o) {
                    return o.key === idActive
                })

                const div2 = document.getElementById(e.target.id)
                const rect2 = div2.getBoundingClientRect()
                const center2 = (rect2.bottom - rect2.top) /2

                const box = {
                    key: id,
                    color: colorsLine[idx],
                    rectBoxX: canvasWidth - 7,
                    rectBoxY: (rect2.top - firstY) + center2,
                    lineMove: canvasWidth - 15,
                    lineTo: canvasWidth - 7,
                    lineY: (rect2.top - firstY) + center2 + 7,
                }
                storedBoxes.push(box)

                const stoke = {
                    key: idActive+''+id,
                    color: colorsLine[idx],
                    lineMoveX: startX,
                    lineMoveY: startY,
                    lineToX: canvasWidth - 15,
                    lineToY: (rect2.top - firstY) + center2 + 7
                }
                 */
                //storedLines.push(stoke)

                listMatch.kiri.find(function (item) {
                    if (item.key === idActive) {
                        if (!listMatch.linked[item.key].includes(id)) listMatch.linked[item.key].push(id)
                    }
                })
                /*
                $(`#item${id}`).css({
                    'background-color': colorsBg[idx],
                    'border': '1px solid '+ colorsLine[idx]
                })
                 */
            } else {
                warnaKanan[id] = [0]
                //console.log(id, warnaKanan[id])
                listMatch.kiri.find(function (item) {
                    if (warnaKanan[id].includes(item.key)) {
                        warnaKanan[id] = [0]
                    }
                    if (listMatch.linked[item.key].includes(id)) {
                        listMatch.linked[item.key] = arrayRemove(listMatch.linked[item.key], id)
                        if (listMatch.linked[item.key].length === 0) warnaKiri[item.key] = 0
                    }
                })
            }
            createPoints()
            idActive = ''
        })

        $('.item-kanan').hover(function (el) {
            if (idActive === '') return
            const id = (el.target.id).replace('item', '')
            const div2 = document.getElementById(el.target.id)
            const rect2 = div2.getBoundingClientRect()
            const center2 = (rect2.bottom - rect2.top) /2

            const box = {
                key: id,
                color: colorsLine[id],
                rectBoxX: canvasWidth - 7,
                rectBoxY: (rect2.top - firstY) + center2 + 2,
                lineMove: canvasWidth - 15,
                lineTo: canvasWidth - 7,
                lineY: (rect2.top - firstY) + center2 + 7,
            }
            storedBoxes.push(box)
            mouseX = canvasWidth - 15;
            mouseY = (rect2.top - firstY) + center2 + 7;
            redraw()

            // draw the current line
            ctx.beginPath();
            ctx.moveTo(startX, startY);
            ctx.lineTo(mouseX, mouseY);
            ctx.strokeStyle = colorsLine[idActive];
            ctx.lineWidth = 1;
            ctx.lineCap = 'round';
            ctx.stroke()
        }, function () {
            if (idActive === '') return
            storedBoxes.pop()
            redraw()
        })
    })

    /*
    $("#canvas").click(function (e) {
        //isDown = !isDown
        //console.log('isDown1', isDown)
        isDown = !isDown;
        //console.log('isDown2', isDown)
        if (isDown) handleMouseDown(e);
        else handleMouseUp(e)
    });
     */

    //$("#canvas").mousedown(function (e) {
        //handleMouseDown(e);
    //});

    $("#canvas").mousemove(function (e) {
        handleMouseMove(e);
    });

    //$("#canvas").mouseup(function (e) {
        //handleMouseUp(e);
    //});

    //$("#canvas").mouseout(function (e) {
        //handleMouseOut(e);
    //});

    $("#clear").click(function () {
    });

    function handleMouseDown(e) {
        e.preventDefault();
        e.stopPropagation();

        var mouseX = parseInt(e.clientX - offsetX);
        var mouseY = parseInt(e.clientY - offsetY);

        //isDown = true;
        startX = mouseX;
        startY = mouseY;

    }

    function handleMouseMove(e) {
        e.preventDefault();
        e.stopPropagation();

        //if (!isDown) {
        //    return;
        //}

        //redrawStoredLines();

        if (!clicked) {
            return;
        }
        redraw()

        mouseX = parseInt(e.clientX - offsetX);
        mouseY = parseInt(e.clientY - offsetY);

        // draw the current line
        ctx.beginPath();
        ctx.moveTo(startX, startY);
        ctx.lineTo(mouseX, mouseY);
        ctx.strokeStyle = colorsLine[idActive];
        ctx.lineWidth = 1;
        ctx.lineCap = 'round';
        ctx.stroke()

    }

    function handleMouseUp(e) {
        e.preventDefault();
        e.stopPropagation();

        //isDown = false;

        var mouseX = parseInt(e.clientX - offsetX);
        var mouseY = parseInt(e.clientY - offsetY);

        storedLines.push({
            x1: startX,
            y1: startY,
            x2: mouseX,
            y2: mouseY
        });

        redrawStoredLines();

    }

    function redrawStoredLines() {

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        if (storedLines.length == 0) {
            return;
        }

        // redraw each stored line
        for (var i = 0; i < storedLines.length; i++) {
            ctx.beginPath();
            ctx.moveTo(storedLines[i].x1, storedLines[i].y1);
            ctx.lineTo(storedLines[i].x2, storedLines[i].y2);
            ctx.stroke();
        }
    }

    function arrayRemove(arr, value) {
        return arr.filter(function (it) {
            return it !== value;
        });
    }
</script>

<script>

</script>
</body>
</html>