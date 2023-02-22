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
                                - Penulisan deskripsi max 200 huruf
                                <br>
                                - Klik pada tiap teks untuk mengedit deskripsi
                                <br>
                                - Jangan lupa untuk menyimpan perubahan
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <table id="tbl2" class="table table-bordered border-success">
                                        <thead>
                                        <tr class="alert-default-danger">
                                            <th class="text-center align-middle border-danger" style="width: 50px">
                                                Opsi
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Edit Catatan dan Saran</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 0; $i < count($deskCatatan); $i++):
                                            $skp = $deskCatatan[$i]; ?>
                                            <tr>
                                                <td class="text-sm text-center border-success kode pt-0 pb-0"><?= $skp->kode ?></td>
                                                <td class="text-sm border-success editable p-0 pl-2"><?= $skp->deskripsi ?></td>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <table id="tbl1" class="table table-bordered">
                                        <thead>
                                        <tr class="alert-default-danger">
                                            <th class="text-center align-middle border-danger" style="width: 100px">
                                                Tidak Hadir
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Edit Peringatan Ketidakhadiran</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 0; $i < count($deskAbsensi); $i++):
                                            $skp = $deskAbsensi[$i]; ?>
                                            <tr>
                                                <td class="text-sm text-center border-success rank pt-0 pb-0"><?= $skp->rank ?></td>
                                                <td class="text-sm border-success editable p-0 pl-2"><?= $skp->deskripsi ?></td>
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
                                - 3 point catatan/saran, wajib diisi minimal 1 point
                                <br>
                                - Jangan ada point sama di satu siswa
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
    var arrCatatan = JSON.parse(JSON.stringify(<?= json_encode($deskCatatan)?>));
    var arrAbsensi = JSON.parse(JSON.stringify(<?= json_encode($deskAbsensi)?>));
    var idKelas = '<?=$kelas->id_kelas?>';

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function setDesk(desk, type) {
        desk = $.grep(desk, function (n, i) {
            return (n !== '' && n != null);
        });

        if (desk.length === 0) return '';

        var result = '';
        if (type === 1) {
            for (let i = 0; i < desk.length; i++) {
                var key = desk[i];
                if ($.isNumeric(key)) {
                    var kode = parseInt(key) - 1;
                    if (i > 0) {
                        result += ' ';
                    }

                    if (arrCatatan[kode] != null) {
                        result += arrCatatan[kode].deskripsi;
                    } else {
                        showDangerToast('Hanya untuk pengisian angka 1 s/d 6!');
                        return '#ERROR';
                    }
                } else {
                    showDangerToast('Hanya untuk pengisian angka 1 s/d 6!');
                    return '#ERROR';
                }
            }
        } else {
            for (let i = 0; i < arrAbsensi.length; i++) {
                var abs = parseInt(desk[0]);
                var n1 = parseInt(arrAbsensi[i].kode);
                var n2 = arrAbsensi[(i + 1)] != null && arrAbsensi[(i + 1)].kode != null ? parseInt(arrAbsensi[(i + 1)].kode) : (n1 + 100);
                if (inRange(abs, n1, (n2 - 1))) {
                    result += '\n' + arrAbsensi[i].deskripsi;
                }
            }
        }
        return result;
    }

    $(document).ready(function () {
        console.log('siswa', arrSiswa);
        console.log('nilai', arrNilai);
        console.log('cat', arrCatatan);
        console.log('absen', arrAbsensi);

        $('.editable').attr('contentEditable', true);
        var tableSize = $('#t-siswa');
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            var n1 = arrNilai[v.id_siswa].op1;
            var n2 = arrNilai[v.id_siswa].op2;
            var n3 = arrNilai[v.id_siswa].op3;
            var n4 = arrNilai[v.id_siswa].s;
            var n5 = arrNilai[v.id_siswa].i;
            var n6 = arrNilai[v.id_siswa].a;
            dataSiswa.push(
                [
                    noInduk, v.nama,
                    n1, n2, n3, n4, n5, n6,
                    setDesk([n1, n2, n3], 1) + setDesk([n6], 2),
                    v.id_siswa,
                ]
            );
            row++;
        });

        var arrCol = [];
        for (let i = 0; i < 10; i++) {
            var item = {};
            if (i === 0) {
                item['title'] = 'N I S N';
                item['width'] = 160;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA';
                item['width'] = 250;
            } else if (i === 5) {
                item['title'] = 'S';
                item['width'] = 35;
            } else if (i === 6) {
                item['title'] = 'I';
                item['width'] = 35;
            } else if (i === 7) {
                item['title'] = 'A';
                item['width'] = 35;
            } else if (i === 8) {
                item['title'] = '(otomatis)';
                item['width'] = 600;
                item['wordWrap'] = true;
            } else if (i === 9) {
                item['title'] = 'id';
                item['width'] = 1;
            } else {
                item['title'] = '#';
                item['type'] = 'numeric';
                //item['mask'] = '#';
                item['width'] = 35;
            }

            arrCol.push(item);
        }

        var tableSiswa = $('#t-siswa').jexcel({
            data: dataSiswa,
            minDimensions: [10],
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
                    {title: 'OPSI\nSARAN', colspan: '3'},
                    {title: 'ABSEN', colspan: '3'},
                    {title: 'SARAN-SARAN', colspan: '2'},
                ]
            ],
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0 || col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                    //cell.style.border = 'black';
                }

                if (col === 2 || col === 3 || col === 4) {
                    cell.style.backgroundColor = '#b9f6ca';
                }

                if (col === 5 || col === 6 || col === 7) {
                    cell.style.backgroundColor = '#e0f7fa';
                }

                if (col === 8 || col === 9) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                    cell.style.fontSize = 'small';
                    cell.style.textAlign = 'left';
                }
            },
            onchange: function (instance, cell, col, row, value, label) {
                var cellName = jexcel.getColumnNameFromId([col, row]);
                if (inRange(col, 2, 7)) {
                    if (cellName != 'I' + row) {
                        console.log(cellName + ', val:' + value + 'col:' + col + 'row:' + row);
                        //changed(parseInt(row)+1);
                        changed(parseInt(row));
                    }
                }
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

        $('#uploadcatatan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = new FormData($('#uploadcatatan')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'rapor/uploadcatatan/' + idKelas,
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
                            window.location.href = base_url + 'rapor/raporcatatan/' + idKelas
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
            console.log($(this).serialize() + '&nilai=' + JSON.stringify(tbl));

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importcatatan/' + idKelas,
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
                            window.location.href = base_url + 'rapor/raporcatatan/' + idKelas
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

            var jsonObj = [];

            var table1 = $('#tbl1');
            const $rows1 = table1.find('tr'), headers1 = $rows1.splice(0, 1);
            $rows1.each((i, row) => {
                const desk = $(row).find('.editable').text();
                const rank = $(row).find('.rank').text();
                var nomor = rank.split(' ');
                console.log(nomor);

                if (rank.length > 0) {
                    let item = {};
                    item ["id_catatan"] = idKelas + '1' + nomor[0].trim();
                    item ["jenis"] = '1';
                    item ["kelas"] = idKelas;
                    item ["rank"] = rank;
                    item ["kode"] = nomor[0].trim();
                    item ["deskripsi"] = desk;

                    jsonObj.push(item);
                }
            });

            var table2 = $('#tbl2');
            const $rows2 = table2.find('tr'), headers2 = $rows2.splice(0, 1);
            $rows2.each((i, row) => {
                const desk = $(row).find('.editable').text();
                const nomor = $(row).find('.kode').text();

                let item = {};
                item ["id_catatan"] = idKelas + '2' + nomor;
                item ["jenis"] = '2';
                item ["kelas"] = idKelas;
                item ["rank"] = '';
                item ["kode"] = nomor;
                item ["deskripsi"] = desk;

                jsonObj.push(item);
            });

            var dataPost = $(this).serialize() + "&catatan=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "rapor/savecatatan",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        //showSuccessToast('Data berhasil disimpan')
                        window.location.href = base_url + 'rapor/raporcatatan/' + idKelas
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
