<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul . $kelas->nama_kelas ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="card border border-success">
                        <div class="card-header alert-default-success">
                            <b>PILIHAN DESKRIPSI NILAI SOSIAL</b>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                - Penulisan deskripsi sosial max 100 huruf
                                <br>
                                - Klik pada tiap teks untuk mengedit deskripsi
                                <br>
                                - Jangan lupa untuk menyimpan perubahan
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table id="tbl1" class="table table-bordered">
                                        <thead>
                                        <tr class="alert-default-danger">
                                            <th class="text-center align-middle border-danger" style="width: 50px">
                                                Poin
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Edit Deskripsi Berdasarkan Poin</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 0; $i < 5; $i++):
                                            $skp = $sosial[$i]; ?>
                                            <tr>
                                                <td class="text-sm text-center border-danger nomor pt-0 pb-0"><?= $skp->kode ?></td>
                                                <td class="text-sm border-danger editable p-0 pl-2"><?= $skp->sikap ?></td>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table id="tbl2" class="table table-bordered border-danger">
                                        <thead>
                                        <tr class="alert-default-danger">
                                            <th class="text-center align-middle border-danger" style="width: 50px">
                                                Point
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Edit Deskripsi Berdasarkan Point</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 5; $i < count($sosial); $i++):
                                            $skp = $sosial[$i]; ?>
                                            <tr>
                                                <td class="text-sm text-center border-danger nomor pt-0 pb-0"><?= $skp->kode ?></td>
                                                <td class="text-sm border-danger editable p-0 pl-2"><?= $skp->sikap ?></td>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?= form_open('', array('id' => 'editsikap')) ?>
                            <button type="submit" class="btn btn-danger float-right" data-jenis="1">Simpan</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <hr>
                    <div class="card border border-danger">
                        <div class="card-header alert-default-danger">
                            <b>INPUT NILAI SOSIAL</b>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                - 8 point sikap sosial, 3 point sangat baik, 3 point baik dan 2 point kurang
                                <br>
                                - Wajib diisi minimal 1 point SANGAT BAIK dan 1 point BAIK
                                <br>
                                - Jangan ada point sama di satu siswa
                                <br>
                                - Predikat wajib diisi
                                <br>
                                - Jangan lupa untuk menyimpan perubahan
                            </div>
                            <div id="t-siswa" class="w-100"></div>
                            <?= form_open('', array('id' => 'uploadnilai')) ?>
                            <button type="submit" class="btn btn-primary float-right mt-3 mb-3">
                                <i class="fa fa-save mr-1"></i>Simpan
                            </button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jexcel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jsuites.js"></script>
<script>
    var arrSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswa)?>));
    var arrSosial = JSON.parse(JSON.stringify(<?= json_encode($sosial)?>));
    var arrNilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var idKelas = '<?=$kelas->id_kelas?>';

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function setDesk(desk, type) {
        desk = $.grep(desk, function (n, i) {
            return (n !== '' && n != null);
        });

        if (desk.length === 0) return '';

        var result;
        if (type === 1) result = 'selalu menunjukkan sikap ';
        else if (type === 2) result = ', menunjukkan sikap ';
        else result = ', namun kurang dalam sikap ';

        for (let i = 0; i < desk.length; i++) {
            var key = desk[i];
            if ($.isNumeric(key)) {
                var kode = parseInt(key) - 1;
                if (i > 0) {
                    if (i < (desk.length - 1)) {
                        result += ', ';
                    } else {
                        result += ' dan ';
                    }
                }
                if (arrSosial[kode] != null) {
                    result += arrSosial[kode].sikap;
                } else {
                    showDangerToast('Hanya untuk pengisian angka 1 s/d 10!');
                    return '#ERROR';
                }

                if (i === (desk.length - 1)) {
                    if (type === 1) result += ' dengan sangat baik';
                    else if (type === 2) result += ' dengan baik';
                    else result += '.';
                }
            } else {
                showDangerToast('Hanya untuk pengisian angka!');
                return '#ERROR';
            }
        }
        return result;
    }

    $(document).ready(function () {
        //console.log('siswa',arrSiswa);
        //console.log('nilai',arrNilai);
        //console.log('sosial',arrSosial);

        $('.editable').attr('contentEditable', true);

        var tableSize = $('#t-siswa');
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            var n1 = arrNilai[v.id_siswa].a1;
            var n2 = arrNilai[v.id_siswa].a2;
            var n3 = arrNilai[v.id_siswa].a3;
            var n4 = arrNilai[v.id_siswa].b1;
            var n5 = arrNilai[v.id_siswa].b2;
            var n6 = arrNilai[v.id_siswa].b3;
            var n7 = arrNilai[v.id_siswa].c1;
            var n8 = arrNilai[v.id_siswa].c2;
            dataSiswa.push(
                [
                    noInduk, v.nama,
                    arrNilai[v.id_siswa].predikat,
                    n1, n2, n3, n4, n5, n6, n7, n8,
                    v.nama + ' ' + setDesk([n1, n2, n3], 1) + setDesk([n4, n5, n6], 2) + setDesk([n7, n8], 3),
                    v.id_siswa,
                ]
            );
            row++;
        });

        var arrCol = [];
        for (let i = 0; i < 13; i++) {
            var item = {};
            if (i === 0) {
                item['width'] = 160;
            } else if (i === 1) {
                item['width'] = 250;
            } else if (i === 2) {
                item['type'] = 'dropdown';
                item['source'] = ['A', 'B', 'C', 'D'];
                //item['width'] = 35;
            } else if (i === 11) {
                item['width'] = 600;
                item['wordWrap'] = true;
            } else if (i === 12) {
                item['title'] = 'id';
                item['width'] = 1;
            } else {
                item['type'] = 'numeric';
                //item['mask'] = '#';
                item['width'] = 35;
            }

            arrCol.push(item);
        }

        var tableSiswa = $('#t-siswa').jexcel({
            data: dataSiswa,
            minDimensions: [13],
            //defaultColWidth: 100,
            tableOverflow: true,
            tableWidth: '' + tableSize.width() + 'px',
            tableHeight: (80 * (dataSiswa.length + 2)) + 'px',
            search: true,
            freezeColumns: 2,
            //rowResize: true,
            columnResize: false,
            columns: arrCol,
            /*[
            {width: 100},
            {width: 300},       ],*/
            nestedHeaders: [
                [
                    {title: 'DATA SISWA', colspan: '2',},
                    {title: 'DESKRIPSI SIKAP SOSIAL SISWA', colspan: '11'},
                ],
                [
                    {title: 'N I S N', colspan: '1'},
                    {title: 'NAMA SISWA', colspan: '1'},
                    {title: 'PRE\nDIKAT', colspan: '1'},
                    {title: 'SANGAT\nBAIK', colspan: '3'},
                    {title: 'BAIK', colspan: '3'},
                    {title: 'KURANG', colspan: '2'},
                    {title: 'DESKRIPSI', colspan: '2'},
                ]
            ],
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0 || col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                }

                if (col === 2 || col === 9 || col === 10) {
                    cell.style.backgroundColor = '#f3e5f5';
                }

                if (col === 3 || col === 4 || col === 5) {
                    cell.style.backgroundColor = '#b9f6ca';
                }

                if (col === 6 || col === 7 || col === 8) {
                    cell.style.backgroundColor = '#e0f7fa';
                }

                if (col === 11 || col === 12) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                    cell.style.fontSize = 'small';
                    cell.style.textAlign = 'left';
                }
            },
            onchange: function (instance, cell, col, row, value, label) {
                var cellName = jexcel.getColumnNameFromId([col, row]);
                if (inRange(col, 3, 10)) {
                    if (cellName != 'L' + row) {
                        console.log(cellName + ', val:' + value + 'col:' + col + 'row:' + row);
                        //changed(parseInt(row)+1);
                        changed(parseInt(row));
                    }
                }
            }
        });

        function changed(row) {
            var d1 = [];
            var d2 = [];
            var d3 = [];
            for (let i = 3; i < 11; i++) {
                if (inRange(i, 3, 5)) {
                    var values1 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                    //d1.push(tableSiswa.getData(col[i]+''+row), true);
                    d1.push(values1);
                } else if (inRange(i, 6, 8)) {
                    var values2 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                    //d2.push(tableSiswa.getData(col[i]+''+row), true);
                    d2.push(values2);
                } else {
                    var values3 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                    d3.push(values3);
                }
            }
            console.log(d1);
            console.log(d2);
            console.log(d3);
            var merged = $.merge($.merge([], d1), d2);
            $.merge(merged, d3);
            //console.log(merged);
            merged = $.grep(merged, function (n, i) {
                return (n !== '' && n != null);
            });
            var duplikat = [];
            var unique = {};
            $.each(merged, function (i, v) {
                if (!unique[v]) {
                    unique[v] = true;
                } else {
                    duplikat.push(v);
                }
            });

            if (duplikat.length > 0) {
                showDangerToast('Point tidak boleh sama!');
            } else {
                tableSiswa.setValue('L' + (row + 1), tableSiswa.getValue('B' + (row + 1)) + ' ' + setDesk(d1, 1) + setDesk(d2, 2) + setDesk(d3, 3), true);
            }
        }

        $('#uploadsosial').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = new FormData($('#uploadsosial')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'rapor/uploadsosial/' + idKelas,
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log(data);
                    swal.fire({
                        title: "Sukses",
                        html: "<b>" + data + "<b> nilai berhasil diupdate",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + 'rapor/raporsosial/' + idKelas
                        }
                    });
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    showDangerToast(e.responseText);
                }
            });
        });

        $('#uploadnilai').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var tbl = $('table.jexcel tr').get().map(function (row) {
                return $(row).find('td').get().map(function (cell) {
                    return $(cell).html();
                });
            });
            tbl.shift();
            tbl.shift();
            tbl.shift();
            console.log($(this).serialize() + '&nilai=' + JSON.stringify(tbl));

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importsosial/' + idKelas,
                data: $(this).serialize() + '&nilai=' + JSON.stringify(tbl),
                cache: false,
                success: function (data) {
                    console.log(data);
                    swal.fire({
                        title: "Sukses",
                        html: "<b>" + data + "<b> nilai berhasil disimpan",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + 'rapor/raporsosial/' + idKelas
                        }
                    });
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    showDangerToast(e.responseText);
                }
            });
        });

        $('#editsikap').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var jsonObj = [];

            var table1 = $('#tbl1');
            const $rows1 = table1.find('tr'), headers1 = $rows1.splice(0, 1);
            $rows1.each((i, row) => {
                const desk = $(row).find('.editable').text();
                const nomor = $(row).find('.nomor').text();

                let item = {};
                item ["id_sikap"] = idKelas + '2' + nomor;
                item ["kelas"] = idKelas;
                item ["jenis"] = '2';
                item ["kode"] = nomor;
                item ["sikap"] = desk;

                jsonObj.push(item);
            });

            var table2 = $('#tbl2');
            const $rows2 = table2.find('tr'), headers2 = $rows2.splice(0, 1);
            $rows2.each((i, row) => {
                const desk = $(row).find('.editable').text();
                const nomor = $(row).find('.nomor').text();

                let item = {};
                item ["id_sikap"] = idKelas + '2' + nomor;
                item ["kelas"] = idKelas;
                item ["jenis"] = '2';
                item ["kode"] = nomor;
                item ["sikap"] = desk;

                jsonObj.push(item);
            });

            var dataPost = $(this).serialize() + "&sikap=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "rapor/savesikap",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        //showSuccessToast('Data berhasil disimpan')
                        window.location.href = base_url + 'rapor/raporsosial/' + idKelas
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });

    });
</script>
