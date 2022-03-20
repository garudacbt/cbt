<section class="d-flex align-items-center">
    <?php
    /*
    echo '<pre>';
    foreach ($json as $js) {
        foreach ($js as $objects) {
            if (!is_string($objects)) {
                foreach ($objects as $key=>$object) {
                    foreach ($object as $key=>$obj) {
                        var_dump($key);
                        var_dump($obj);
                        echo '<br>';
                    }
                }
            }
        }
    }
    echo '</pre>';
    */
    ?>
    <div class="container">
        <div class="align-content-center">
            <img class="mt-3 mb-3" width="30" height="30" src="<?= base_url('assets/img/garuda_circle.png') ?>">
            <span class="text-lg"><b>arudaCBT</b></span>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-8">
                <h4>UPDATE/RESET DATABASE</h4>
            </div>
            <div class="col-4 text-right">
                <a href="<?=base_url()?>" class="btn btn-success">
                    <svg style="margin-bottom: 5px" width="20" height="20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.0" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 115.89 91.59" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path fill="#FFFFFF" d="M115.87 0c-5.48,11.17 -22.76,12.93 -35.49,12.83 -25.61,-0.32 -49.5,-9.74 -46.18,14.9 -20.65,1.16 -34.89,16.99 -34.17,22.41 9.99,-3.77 20.67,-4 25.82,-2.77 0.57,8.68 14.85,14.9 24.52,18.57 -6.36,-9.17 -11.52,-28 6.34,-32.59 1.11,-0.23 1.55,-0.31 2.89,-0.39 27.86,-1.2 57.34,-9.9 56.27,-32.96z"></path>
                        <path fill="#FFFFFF" d="M24.01 55.4c7.39,49.12 66.11,44.11 77.13,9.65 2.88,2.25 6.63,1.22 9.62,0.31 -8.28,-8.6 0.17,-26.97 -9.18,-26.71l-44.28 1.35c2.7,12.27 7.85,18.66 23.32,19.96 -12.65,18.88 -45.34,10.32 -56.61,-4.56z"></path>
                </svg>
                    <span class="ml-2">Ke Aplikasi</span>
                </a>
            </div>
        </div>
        <div class="alert alert-default-danger align-content-center" role="alert">
            <h4>Sebelum melakukan update:</h4>
            <ol>
                <li>Pastikan aplikasi sedang tidak digunakan</li>
                <li>Backup database terlebih dahulu untuk berjaga-jaga</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-3 col-6">
                <button id="check" class="w-100 btn btn-primary" onclick="cekDb()">Cek Database</button>
            </div>
            <!--
            <div class="col-md-3 col-6">
                <a href="<?=base_url().'/update/make_base'?>" class="w-100 btn btn-primary">Make Migration</a>
            </div>
            -->
            <div id="update" class="col-md-3 col-6 d-none">
                <button id="btn-update" class="w-100 btn btn-success" onclick="updateDb()">Update Database</button>
            </div>

            <div id="progress" class="col-md-6 col-12 d-none">
                <div class="border border-primary" style="height: 35px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; height: 35px">
                    </div>
                </div>
            </div>

            <div id="spinner" class="col-md-9 d-none">
                <div class="spinner-border text-danger" role="status">
                    <span class="sr-only">Loading</span>
                </div>
                <span class="ml-2">
                    Mengambil informasi ....
                </span>
            </div>
        </div>
        <div id="info-db" class="alert alert-default-info align-content-center mt-3 d-none" role="alert">
        </div>
        <div class="row mt-4" id="info-table">
        </div>
    </div>

    <?= form_open('update', array('id' => 'update-database')) ?>
    <?=form_close()?>

</section>

<script>
    $(document).ready(function() {

    });

    let jmlTbl, jmlCol, jmlMod;
    let percen, newPercen = 0;
    let forAddTbl, forAddCol, forModCol;

    function tableCreate(data) {
        var html = '<div id="create" class="col-md-6">' +
            '<p>Table yang akan dibuat</p>\n' +
            '<table class="table table-bordered table-sm border-primary">\n' +
            '    <tr class="bg-gray">\n' +
            '        <th class="text-center">NO</th>\n' +
            '        <th>Table</th>\n' +
            '    </tr>\n';

        var no = 1;
        $.each(data, function (i, table) {
            html += '<tr>' +
                '<td class="text-center">'+no+'</td>' +
                '<td>'+table.table_name+'</td>' +
                '</tr>\n';
            no++;
        });
        html += '</table></div>';
        $('#info-table').append(html);
    }

    function columnAdd(data) {
        var html = '<div id="add" class="col-md-6">\n' +
            '<p>Kolom yang akan ditambahkan ke table</p>\n' +
            '<table class="table table-bordered table-sm">\n' +
            '    <tr class="bg-gray">\n' +
            '        <th class="text-center">NO</th>\n' +
            '        <th>Table</th>\n' +
            '        <th>Kolom</th>\n' +
            '    </tr>\n';

        var no = 1;
        $.each(data, function (table, column) {
            html += '        <tr>\n' +
                '            <td rowspan="'+column.length+'" class="text-center">'+no+'</td>\n' +
                '            <td rowspan="'+column.length+'">'+table+'</td>\n' +
                '            <td>'+column[0].name+'</td>\n' +
                '        </tr>\n';

            for (let i = 1; i < column.length; i++) {
                html += '        <tr>\n' +
                    '            <td>'+column[i].name+'</td>\n' +
                    '        </tr>\n';
            }
            no++;
        });
        html += '</table></div>';
        $('#info-table').append(html);
    }


    function columnMod(data) {
        var html = '<div id="modify" class="col-md-6"><p>Kolom yang akan dimodifikasi</p>\n' +
            '<table class="table table-bordered table-sm">\n' +
            '    <tr class="bg-gray">\n' +
            '        <th class="text-center">NO</th>\n' +
            '        <th>Table</th>\n' +
            '        <th>Kolom</th>\n' +
            '    </tr>\n';
        var no = 1;
        $.each(data, function (table, column) {
            var col_names = $.map(column, function(element,index) {return index});
            html += '        <tr>\n' +
            '            <td rowspan="'+col_names.length+'" class="text-center">'+no+'</td>\n' +
            '            <td rowspan="'+col_names.length+'">'+table+'</td>\n' +
            '            <td>'+col_names[0]+'</td>\n' +
            '        </tr>\n';
            for (let i = 1; i < col_names.length; i++) {
                html += '            <tr>\n' +
                    '                <td>'+col_names[i]+'</td>\n' +
                    '            </tr>\n';
            }
            no++;
        });
        html += '</table></div>';
        $('#info-table').append(html);
    }

    function cekDb() {
        $('#check').attr('disabled', 'disabled');
        $('#spinner').removeClass('d-none');
        $('#update').addClass('d-none');
        $('#progress').addClass('d-none');
        $.ajax({
            type: "GET",
            url: base_url+'update/checkdb',
            success: function (response) {
                console.log(response);
                //updateProgress(100, response.message);
                $('#check').removeAttr('disabled');
                $('#check').text('Cek Ulang Database');
                $('#spinner').addClass('d-none');
                $('#info-db').removeClass('d-none');

                forAddTbl = response.add_tbl;
                forAddCol = response.add_col;
                forModCol = response.mod_col;

                jmlTbl = response.count_tbl;
                jmlCol = response.count_col;
                jmlMod = response.count_mod;

                var schedule = 0;
                if (jmlTbl > 0) schedule += 1;
                console.log('sch', schedule);
                if (jmlCol > 0) schedule += 1;
                console.log('sch', schedule);
                if (jmlMod > 0) schedule += 1;
                console.log('sch', schedule);
                percen = 100 / schedule;

                console.log('percen', percen);

                if (jmlTbl === 0 && jmlCol === 0 && jmlMod === 0) {
                    console.log('updated');
                    $('#info-db').html('Database sudah versi terbaru');
                } else {
                    console.log('need update');
                    $('#info-db').html('Database perlu update, silahkan lakukan update ke versi terbaru');
                    $('#update').removeClass('d-none');
                }
                $('#info-table').html('');
                if (jmlTbl > 0) tableCreate(response.create_tables);
                if (jmlCol > 0) columnAdd(response.add_columns_to_table);
                if (jmlMod > 0) columnMod(response.edit_columns);
            }
        });
    }

    function updateProgress(count, message) {
        var progress = $('.progress-bar');
        var prog = Math.round(Number(count));
        progress.attr('aria-valuenow', prog);
        progress.attr('style','width:'+ prog +'%; height: 35px');
        progress.html('<span class="text-dark">' + prog + '%  ' + message + '</span>');

        if (count >= 100) {
            $('#check').removeAttr('disabled');
            $('#btn-update').removeAttr('disabled');
        }

        $('#info-db').html(message);
    }

    function updateDb() {
        $('#check').attr('disabled', 'disabled');
        $('#btn-update').attr('disabled', 'disabled');
        $('#progress').removeClass('d-none');

        const dataPost = $('#update-database').serialize() + '&data=' + forAddTbl.replace(/\+/g, "%2B");
        if (jmlTbl > 0) {
            $.ajax({
                method: "POST",
                data: dataPost,
                url: base_url+'update/createtable',
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        updateProgress(percen, response.message);
                        createColumn(percen);
                    }
                }
            });
        } else {
            updateProgress(0, 'Update kolom');
            createColumn(0);
        }
    }

    function createColumn(prc) {
        const dataPost = $('#update-database').serialize() + '&data=' + forAddCol.replace(/\+/g, "%2B");
        if (jmlCol > 0) {
            $.ajax({
                method: "POST",
                data: dataPost,
                url: base_url+'update/createcolumn',
                success: function (response) {
                    console.log(response);
                    percen += prc;
                    if (response.success) {
                        updateProgress(percen, response.message);
                        editColumn(percen);
                    }
                }
            });
        } else {
            updateProgress(0, 'Modify kolom');
            editColumn(0);
        }
    }

    function editColumn(prc) {
        const dataPost = $('#update-database').serialize() + '&data=' + forModCol.replace(/\+/g, "%2B");
        if (jmlMod > 0) {
            $.ajax({
                method: "POST",
                data: dataPost,
                url: base_url+'update/editcolumn',
                success: function (response) {
                    percen += prc;
                    console.log(response);
                    if (response.success) {
                        //updateProgress(percen, response.message);
                        updateProgress(100, 'Update Selesai');
                    }
                }
            });
        } else {
            updateProgress(0, 'Update Selesai');
        }
    }

</script>