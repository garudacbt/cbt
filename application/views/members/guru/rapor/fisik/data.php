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
                            <b>PILIHAN DESKRIPSI CATATAN WALI KELAS</b>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                - Penulisan deskripsi max 50 huruf
                                <br>
                                - Klik pada tiap teks untuk mengedit deskripsi
                                <br>
                                - Jangan lupa untuk menyimpan perubahan
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table id="tbl1" class="table table-bordered">
                                        <thead>
                                        <tr class="alert-default-danger">
                                            <th class="text-center align-middle border-danger" style="width: 40px">No
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Pendengaran</span>
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Penglihatan</span>
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Gigi</span>
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Lain-lain</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $arrFis = ['telinga', 'mata', 'gigi', 'lain'];
                                        for ($i = 0; $i < 4; $i++) :?>
                                            <tr>
                                                <td class="text-sm text-center border-success pt-0 pb-0 kode"><?= $i + 1 ?></td>
                                                <?php foreach ($deskFisik as $desk) :
                                                    if ($desk->kode == $i + 1) :?>
                                                        <td data-jenis="<?= $desk->jenis ?>"
                                                            class="text-sm border-success editable p-0 pl-2"><?= $desk->deskripsi ?></td>
                                                    <?php endif; endforeach; ?>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?= form_open('', array('id' => 'editdeskripsi')) ?>
                            <button type="submit" class="btn btn-danger float-right" data-jenis="1">Simpan</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <hr>
                    <div class="card border border-danger">
                        <div class="card-header alert-default-danger">
                            <b>INPUT CATATAN SISWA</b>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                - Jika catatan fisik tidak diisi maka tidak akan muncul di rapor
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
    var arrNilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var arrFisik = JSON.parse(JSON.stringify(<?= json_encode($deskFisik)?>));
    var idKelas = '<?=$kelas->id_kelas?>';
    var smt = '<?=$smt_active->id_smt?>';

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function setDesk(desk) {
        desk = $.grep(desk, function (n, i) {
            return (n !== '' && n != null);
        });

        if (desk.length === 0) return '';

        var result = '';
        for (let i = 0; i < arrFisik.length; i++) {
            var n1 = parseInt(arrFisik[i].kode);
            var n2 = arrFisik[(i + 1)] != null && arrFisik[(i + 1)].kode != null ? parseInt(arrFisik[(i + 1)].kode) : (n1 + 100);
            if (inRange(desk, n1, (n2 - 1))) {
                result += '\n' + arrFisik[i].deskripsi;
            }
        }
        return result;
    }

    $(document).ready(function () {
        //console.log('siswa',arrSiswa);
        console.log('nilai', arrNilai);
        //console.log('absen',smt);

        var arrTelinga = [];
        var arrMata = [];
        var arrGigi = [];
        var arrLain = [];

        $.each(arrFisik, function (i, v) {
            if (v.jenis == '1') {
                arrTelinga.push(v.deskripsi)
            } else if (v.jenis == '2') {
                arrMata.push(v.deskripsi)
            } else if (v.jenis == '3') {
                arrGigi.push(v.deskripsi)
            } else {
                arrLain.push(v.deskripsi)
            }
        });

        $('.editable').attr('contentEditable', true);
        var tableSize = $('#t-siswa');
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var telinga = arrNilai[v.id_siswa].kondisi.telinga;
            var mata = arrNilai[v.id_siswa].kondisi.mata;
            var gigi = arrNilai[v.id_siswa].kondisi.gigi;
            var lainnya = arrNilai[v.id_siswa].kondisi.lain;
            var tinggi1 = arrNilai[v.id_siswa].smt1.tinggi;
            if (tinggi1 === '0') tinggi1 = '';
            var tinggi2 = arrNilai[v.id_siswa].smt2.tinggi;
            if (tinggi2 === '0') tinggi2 = '';
            var berat1 = arrNilai[v.id_siswa].smt1.berat;
            if (berat1 === '0') berat1 = '';
            var berat2 = arrNilai[v.id_siswa].smt2.berat;
            if (berat2 === '0') berat2 = '';

            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            dataSiswa.push(
                [
                    noInduk, v.nama,
                    tinggi1, tinggi2, berat1, berat2,
                    telinga, mata, gigi, lainnya,
                    v.id_siswa,
                ]
            );
            row++;
        });

        var arrCol = [];
        for (let i = 0; i < 11; i++) {
            var item = {};
            if (i === 0) {
                item['title'] = 'N I S N';
                item['width'] = 160;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA';
                item['width'] = 250;
            } else if (i === 2 || i === 4) {
                item['title'] = 'SMT I';
                item['width'] = 50;
            } else if (i === 3 || i === 5) {
                item['title'] = 'SMT II';
                item['width'] = 50;
            } else if (i === 6) {
                item['title'] = 'Pendengaran';
                item['type'] = 'dropdown';
                item['source'] = arrTelinga;
                item['wordWrap'] = true;
                item['width'] = 150;
            } else if (i === 7) {
                item['title'] = 'Penglihatan';
                item['type'] = 'dropdown';
                item['source'] = arrMata;
                item['wordWrap'] = true;
                item['width'] = 150;
            } else if (i === 8) {
                item['title'] = 'Gigi';
                item['type'] = 'dropdown';
                item['source'] = arrGigi;
                item['wordWrap'] = true;
                item['width'] = 150;
            } else if (i === 9) {
                item['title'] = 'Lain-lain';
                item['type'] = 'dropdown';
                item['source'] = arrLain;
                item['wordWrap'] = true;
                item['width'] = 150;
            } else if (i === 10) {
                item['title'] = 'id';
                item['width'] = 1;
            }

            arrCol.push(item);
        }

        var tableSiswa = $('#t-siswa').jexcel({
            data: dataSiswa,
            minDimensions: [11],
            //defaultColWidth: 100,
            tableOverflow: true,
            tableWidth: '' + tableSize.width() + 'px',
            tableHeight: (80 * dataSiswa.length) + 'px',
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
                    {title: 'DATA SISWA', colspan: '2'},
                    {title: 'TINGGI', colspan: '2'},
                    {title: 'BERAT', colspan: '2'},
                    {title: 'KONDISI KESEHATAN', colspan: '5'},
                ]
            ],
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0 || col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                }

                if (col === 2 || col === 3 || col === 4 || col === 5) {
                    cell.style.backgroundColor = '#b9f6ca';
                }

                if (smt === 1) {
                    if (col === 2 || col === 4) {
                        cell.classList.add('readonly');
                    }
                } else {
                    if (col === 3 || col === 5) {
                        cell.classList.add('readonly');
                    }
                }

                if (col === 0 || col === 2 || col === 4 || col === 6) {
                    cell.style.borderLeft = '3px solid #9e9e9e';
                }

                if (col === 6 || col === 7 || col === 8 || col === 9) {
                    cell.style.backgroundColor = '#e0f7fa';
                    cell.style.fontSize = 'small';
                }

                if (col === 6 || col === 7 || col === 8 || col === 9) {
                    cell.style.textAlign = 'left';
                    cell.style.fontSize = 'small';
                }

                if (col === 10) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                    cell.style.fontSize = 'small';
                }
            },
            onchange: function (instance, cell, col, row, value, label) {
                /*
                var cellName = jexcel.getColumnNameFromId([col,row]);
                if (inRange(col, 2, 7)) {
                    if (cellName != 'I' + row) {
                        console.log(cellName + ', val:' + value + 'col:' + col + 'row:'+row);
                        //changed(parseInt(row)+1);
                        changed(parseInt(row));
                    }
                }*/
            }
        });

        function changed(row) {
            var d1 = [];
            for (let i = 2; i < 5; i++) {
                if (inRange(i, 2, 4)) {
                    var values1 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                    d1.push(values1);
                }
            }
            console.log(d1);
            var values2 = $(`td[data-x="7"][data-y="${row}"]`).text();
            console.log(values2);
            tableSiswa.setValue('I' + (row + 1), setDesk(d1, 1) + setDesk([values2], 2), true);
        }

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
            console.log($(this).serialize() + '&nilai=' + JSON.stringify(tbl));

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importfisik/' + idKelas,
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
                            window.location.href = base_url + 'rapor/raporfisik'
                        }
                    });
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    showDangerToast(e.responseText);
                }
            });
        });

        $('#editdeskripsi').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var tbl = $('table#tbl1 tr').get().map(function (row) {
                return $(row).find('td').get().map(function (cell) {
                    return $(cell).html();
                });
            });
            tbl.shift();
            var dataPost = $(this).serialize() + "&kelas=" + idKelas + "&fisik=" + JSON.stringify(tbl);
            console.log(dataPost);

            $.ajax({
                url: base_url + "rapor/savefisik",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        //showSuccessToast('Data berhasil disimpan')
                        window.location.href = base_url + 'rapor/raporfisik'
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
