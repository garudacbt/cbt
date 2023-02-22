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
                            <b>PILIHAN DESKRIPSI PRESTASI SISWA</b>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                - Penulisan deskripsi max 100 huruf
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
                                            <th class="text-center align-middle border-danger" style="width: 100px">
                                                Ranking
                                            </th>
                                            <th class="border-danger">
                                                <span class="pl-2 align-middle">Edit Saran / Dorongan</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 0; $i < count($deskRanking); $i++):
                                            $skp = $deskRanking[$i]; ?>
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
                                - Jumlah nilai otomatis diambil dari nilai akhir tiap mapel
                                <br>
                                - Prestasi siswa diisi manual
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
    var arrRanking = JSON.parse(JSON.stringify(<?= json_encode($deskRanking)?>));
    var idKelas = '<?=$kelas->id_kelas?>';
    var arrMapel = JSON.parse(JSON.stringify(<?= json_encode($mapels)?>));

    var arrNilaiHarian = JSON.parse(JSON.stringify(<?= json_encode($nilaiHarian)?>));
    var arrNilaiRataP = JSON.parse(JSON.stringify(<?= json_encode($nilaiRata_p)?>));
    var arrNilaiRataK = JSON.parse(JSON.stringify(<?= json_encode($nilaiRata_k)?>));

    var arrNilaiRata = JSON.parse(JSON.stringify(<?= json_encode($nilaiRata)?>));

    var arrNilaiPts = JSON.parse(JSON.stringify(<?= json_encode($nilaiPts)?>));
    var arrNilaiPas = JSON.parse(JSON.stringify(<?= json_encode($nilaiPas)?>));
    var jmlNilai = [];

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function setDesk(desk) {
        if (desk === '') return '';
        var result = '';
        for (let i = 0; i < arrRanking.length; i++) {
            var n1 = parseInt(arrRanking[i].kode);
            var n2 = arrRanking[(i + 1)] != null && arrRanking[(i + 1)].kode != null ? parseInt(arrRanking[(i + 1)].kode) : (n1 + 100);
            if (inRange(parseInt(desk), n1, (n2 - 1))) {
                result += '' + arrRanking[i].deskripsi;
                console.log('desk', parseInt(desk));
            }
        }
        return result;
    }

    function calcNilai(id_siswa) {
        jmlNilai = [];
        jmlNilaik = [];
        $.each(arrMapel, function (k, val) {
            jmlNilai.push(parseInt(arrNilaiPas[id_siswa][val.id_mapel]) + parseInt(arrNilaiRataK[id_siswa][val.id_mapel]));
            //jmlNilai.push(arrNilaiRata[id_siswa]);
        });
    }

    $(document).ready(function () {
        //console.log('siswa',arrSiswa);
        //console.log('nilai',arrNilai);
        //console.log('ranking',arrRanking);
        //console.log('mapel',arrMapel);
        //console.log('harian',arrNilaiHarian);
        //console.log('pts',arrNilaiPts);
        console.log('pas', arrNilaiPas);
        console.log("rata_harian", arrNilaiRataK);


        var totalR = 0;
        var totalK = 0;

        $('.editable').attr('contentEditable', true);
        var tableSize = $('#t-siswa');
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            var n1 = arrNilai[v.id_siswa].ranking;
            var n3 = arrNilai[v.id_siswa].p1;
            var n4 = arrNilai[v.id_siswa].p1_desk;
            var n5 = arrNilai[v.id_siswa].p2;
            var n6 = arrNilai[v.id_siswa].p2_desk;
            var n7 = arrNilai[v.id_siswa].p3;
            var n8 = arrNilai[v.id_siswa].p3_desk;

            calcNilai(v.id_siswa);

            var arrData = [
                noInduk, v.nama,
                '=SUM(M' + row + ':AZ' + row + ')',
                '',//'=RANK_EQ(C'+row+',[C1:C'+arrSiswa.length+'])',
                '',//setDesk(n1),
                n3, n4, n5, n6, n7, n8,
                v.id_siswa,
            ];
            $.merge(arrData, jmlNilai);

            dataSiswa.push(
                arrData
            );
            row++;
        });
        //console.log('arrNilai',dataSiswa);

        var arrCol = [];
        for (let i = 0; i < (12 + arrMapel.length); i++) {
            var item = {};
            if (i === 0) {
                item['title'] = 'N I S N';
                item['width'] = 160;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA';
                item['width'] = 250;
            } else if (i === 2) {
                item['title'] = 'JML NILAI';
                item['width'] = 80;
            } else if (i === 3) {
                item['title'] = 'RANKING';
                item['width'] = 80;
            } else if (i === 4) {
                item['title'] = 'DESKRIPSI';
                item['width'] = 200;
                item['wordWrap'] = true;
            } else if (i === 5 || i === 7 || i === 9) {
                item['title'] = 'JENIS';
                item['width'] = 100;
                item['wordWrap'] = true;
            } else if (i === 6 || i === 8 || i === 10) {
                item['title'] = 'KETERANGAN';
                item['width'] = 200;
                item['wordWrap'] = true;
            } else if (i === 11) {
                item['title'] = 'id';
                item['width'] = 3;
            } else {
                item['width'] = 1;
            }

            arrCol.push(item);
        }

        var tableSiswa = $('#t-siswa').jexcel({
            data: dataSiswa,
            minDimensions: [(11 + arrMapel.length)],
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
                    {title: 'PERINGKAT KELAS (otomatis)', colspan: '3'},
                    {title: 'PRESTASI (diisi manual)', colspan: '7'},
                ]
            ],
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0 || col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                }

                if (col === 2) {
                    cell.className = 'total';
                    changed(col, row);
                }

                if (col === 3) {
                    cell.className = 'ranking';
                }

                if (col === 2 || col === 3 || col === 4) {
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                }

                if (col === 4) {
                    cell.style.fontSize = 'small';
                    cell.style.textAlign = 'left';
                }

                if (col === 0 || col === 2 || col === 5 || col === 7 || col === 9) {
                    cell.style.borderLeft = '3px solid #9e9e9e';
                }

                if (col === 5 || col === 6 || col === 7 || col === 8 || col === 9 || col === 10) {
                    cell.style.backgroundColor = '#e0f7fa';
                }

                if (col === 11) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                    cell.style.fontSize = 'small';
                    cell.style.textAlign = 'left';
                    cell.style.borderRight = '3px solid #9e9e9e';
                }

                if (col > 11) {
                    $(cell).hide();
                }

            },
            onchange: function (instance, cell, col, row, value, label) {
                var cellName = jexcel.getColumnNameFromId([col, row]);
                if (col === 2) {
                    changed(col, row);
                }
            }
        });

        function changed(col, row) {
            let totalList = $(".total")
                .map(function () {
                    return $(this).text()
                })
                .get()
                .sort(function (a, b) {
                    return a - b
                })
                .reduce(function (a, b) {
                    if (b != a[0]) a.unshift(b);
                    return a
                }, []);

            totalList.forEach((v, i) => {
                $('.total').filter(function () {
                    if (v == 0) {
                        return '';
                    } else {
                        return $(this).text() == v;
                    }
                }).next().text(i + 1);
            });

            setTimeout(function () {
                var values1 = $(`td[data-x="3"][data-y="${row}"]`).text();
                $(`td[data-x="4"][data-y="${row}"]`).text(setDesk(values1));
            }, 1000);
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
                url: base_url + 'rapor/importprestasi/' + idKelas,
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
                            window.location.href = base_url + 'rapor/raporprestasi/';
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
                    item ["id_prestasi"] = idKelas + '1' + nomor[0].trim();
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
                item ["id_prestasi"] = idKelas + '2' + nomor;
                item ["jenis"] = '2';
                item ["kelas"] = idKelas;
                item ["rank"] = '';
                item ["kode"] = nomor;
                item ["deskripsi"] = desk;

                jsonObj.push(item);
            });

            var dataPost = $(this).serialize() + "&prestasi=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "rapor/saveprestasi",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        //showSuccessToast('Data berhasil disimpan')
                        window.location.href = base_url + 'rapor/raporprestasi/' + idKelas
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });

        $(`thead tr`).each(function (i, row) {
            const $cols = $(this).find('td');
            $cols.each((j, v) => {
                //console.log('parent:' + i + ', '+j, v);
                if (i === 1) {
                    if (j > 0) {
                        v.style.borderLeft = '3px solid #9e9e9e';
                        v.style.borderTop = '3px solid #9e9e9e';
                    }
                    if (j === 3) {
                        v.style.borderRight = '3px solid #9e9e9e';
                    }
                } else if (i === 2) {
                    if (j === 1 || j === 3 || j === 6 || j === 8 || j === 10) v.style.borderLeft = '3px solid #9e9e9e';
                    else if (j === 12) v.style.borderRight = '3px solid #9e9e9e';
                    else if (j > 12) v.style.display = 'none';
                }
            })
        });

        /*
        setTimeout(function () {
            for (let i = 0; i < arrSiswa.length; i++) {
                var values1 = $(`td[data-x="3"][data-y="${i}"]`).text();
                $(`td[data-x="4"][data-y="${i}"]`).text(setDesk(values1));
            }
        }, 1000);
        */

    });
</script>
