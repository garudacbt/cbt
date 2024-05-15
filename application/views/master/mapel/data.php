<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h6>Kelompok Utama</h6>
                                </div>
                                <div class="col-6">
                                    <button type="button" data-toggle="modal" data-target="#editKelompokModal"
                                            class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tableKelompok" class="w-100 table table-sm table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th height="40" class="text-center align-middle">Kategori</th>
                                        <th class="text-center align-middle">Kode</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="text-center align-middle p-0"><span>Aksi</span></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h6>Sub Kelompok</h6>
                                </div>
                                <div class="col-6">
                                    <button type="button" data-toggle="modal" data-target="#editSubKelompokModal"
                                            class="btn btn-xs btn-primary float-right"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tableSubKelompok" class="table table-sm table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th height="40" class="text-center align-middle">Kode</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="text-center align-middle">Kel. Utama</th>
                                        <th class="text-center align-middle p-0"><span>Aksi</span></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-shadow mb-4">
                <div class="card-header with-border">
                    <h3 class="card-title text-bold"><?= $subjudul ?></h3>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i
                                    class="fa fa-sync"></i> Reload
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-light border border-success align-content-center mb-3" role="alert">
                        <b>Nomor Urut Rapor</b> dan <b>Kelompok</b> diperlukan jika ingin mencetak rapor
                    </div>
                    <?= form_open('', array('id' => 'bulk')) ?>
                    <div class="table-responsive">
                        <table id="tableMapel" class="w-100 table table-sm table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th height="40" class="text-center align-middle p-0 w-auto">
                                    <input type="checkbox" class="select_all">
                                </th>
                                <th class="text-center align-middle p-0 w-auto">No.Urut Rapor</th>
                                <th class="align-middle">Mata Pelajaran</th>
                                <th class="text-center align-middle">Kode Mata Pelajaran</th>
                                <th class="text-center align-middle">Kelompok</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle p-0"><span>Aksi</span></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create-kelompok')) ?>
<div class="modal fade" id="editKelompokModal" tabindex="-1" role="dialog" aria-labelledby="editKelompokModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKelompokModalLabel">Kelompok Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_kel_mapel" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" name="id_parent" value="0" class="form-control" required>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkodekel" name="kode_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nama*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnamakel" name="nama_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kategori*</label>
                    <div class="col-md-9">
                        <select id="kategori" name="kategori" class="form-control" required="">
                            <?php
                            foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat ?>"><?= $kat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('create', array('id' => 'create-sub-kelompok')) ?>
<div class="modal fade" id="editSubKelompokModal" tabindex="-1" role="dialog"
     aria-labelledby="editSubKelompokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubKelompokModalLabel">Sub Kelompok Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_kel_sub" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" id="kategori_sub" name="kategori" class="form-control" required>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkodesub" name="kode_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nama*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnamasub" name="nama_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kel. Utama*</label>
                    <div class="col-md-9">
                        <select id="id_parent_sub" name="id_parent" class="form-control" required>
                            <?php
                            foreach ($kelompok_mapel as $ky => $km) :
                                if ($km->id_parent == 0) :
                                    ?>
                                    <option value="<?= $ky ?>"><?= $km->nama_kel_mapel ?></option>
                                <?php endif; endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createMapelModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Mapel*</label>
                    <div class="col-md-10">
                        <input type="text" id="createnama" name="nama_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode*</label>
                    <div class="col-md-10">
                        <input type="text" id="createkode" name="kode_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kelompok*</label>
                    <div class="col-md-10">
                        <?php echo form_dropdown(
                            'kelompok',
                            $kelompok,
                            '',
                            'class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Status*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'status',
                            $status,
                            '1',
                            'class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">No. Urut Rapor*</label>
                    <div class="col-md-10">
                        <input type="number" name="urutan_tampil" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row" id="formnama">
                    <label class="col-md-2 col-form-label">Mapel*</label>
                    <div class="col-md-10">
                        <input type="text" id="namaEdit" name="nama_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">Kode*</label>
                    <div class="col-md-10">
                        <input type="text" id="kodeEdit" name="kode_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formkelompok">
                    <label class="col-md-2 col-form-label">Kelompok*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'kelompok',
                            $kelompok,
                            '',
                            'id="kelompok" class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formstatus">
                    <label class="col-md-2 col-form-label">Status*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'status',
                            $status,
                            '1',
                            'id="status" class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">No. Urut Rapor*</label>
                    <div class="col-md-10">
                        <input type="number" id="kodeUrut" name="urutan_tampil" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdMapel" name="id_mapel" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal fade" id="editDataMapelModal" tabindex="-1" role="dialog" aria-labelledby="editDataMapelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataMapelModalLabel">Setting Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

<?= form_open('create', array('id' => 'hapus-kelompok')) ?>
<?= form_close() ?>
<script>
    var jsonkelompokMapel = JSON.parse(JSON.stringify(<?=json_encode($kelompok_mapel)?>));
    var kelompokMapel = Object.keys(jsonkelompokMapel).map(function (key) {
        return jsonkelompokMapel[key];
    });

    var save_label;
    var table;
    var tableKelompok;
    var tableSubKelompok;
    $(document).ready(function () {
        ajaxcsrf();
        tableKelompok = $("#tableKelompok").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            searching: false,
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/getdatakelompok",
                type: "POST"
            },
            columns: [
                {
                    data: "kategori",
                    className: "text-center",
                },
                {
                    data: "kode_kel_mapel",
                    className: "text-center",
                },
                {
                    data: "nama_kel_mapel",
                }
            ],
            columnDefs: [
                {
                    searchable: false,
                    targets: 3,
                    className: "text-center",
                    data: {
                        id_kel_mapel: "id_kel_mapel",
                        nama_kel_mapel: "nama_kel_mapel",
                        kode_kel_mapel: "kode_kel_mapel",
                        id_parent: "id_parent",
                        kategori: "kategori"
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="btn-group btn-group-xs">
									<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editKelompokModal"
									 data-id="${data.id_kel_mapel}"
									 data-nama="${data.nama_kel_mapel}"
									  data-kode="${data.kode_kel_mapel}"
									  data-kategori="${data.kategori}">
										<i class="fa fa-pencil-alt text-white"></i>
									</a>

                                    <button onclick="hapusKelompok(this)" class="btn btn-danger btn-xs deleteRecord"
									 data-id="${data.id_kel_mapel}"
									 data-utama="${data.id_parent}"
								  data-kode="${data.kode_kel_mapel}">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
								</div>`;
                    }
                }
            ],
            order: [[0, "asc"]],
            rowId: function (a) {
                return a;
            },
        });

        tableSubKelompok = $("#tableSubKelompok").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            searching: false,
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/getdatasubkelompok",
                type: "POST"
            },
            columns: [
                {
                    data: "kode_kel_mapel",
                    className: "text-center",
                },
                {
                    data: "nama_kel_mapel",
                },
                {
                    data: "kategori",
                    className: "text-center",
                }
            ],
            columnDefs: [
                {
                    searchable: false,
                    targets: 3,
                    className: "text-center",
                    data: {
                        id_kel_mapel: "id_kel_mapel",
                        nama_kel_mapel: "nama_kel_mapel",
                        kode_kel_mapel: "kode_kel_mapel",
                        id_parent: "id_parent",
                        kategori: "kategori"
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="btn-group btn-group-xs">
									<a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editSubKelompokModal"
									 data-id="${data.id_kel_mapel}"
									 data-nama="${data.nama_kel_mapel}"
									  data-kode="${data.kode_kel_mapel}"
									  data-utama="${data.id_parent}"
									  data-kategori="${data.kategori}">
									    <i class="fa fa-pencil-alt text-white"></i>
									</a>
                                                <button onclick="hapusKelompok(this)" class="btn btn-danger btn-xs deleteRecord"
									 data-id="${data.id_kel_mapel}"
									 data-utama="${data.id_parent}"
								  data-kode="${data.kode_kel_mapel}">
                                                    <i class="fa fa-trash text-white"></i>
                                                </button>
								</div>`;
                    }
                }
            ],
            order: [[0, "asc"]],
            rowId: function (a) {
                return a;
            },
        });

        var groupColumn = 4;
        table = $("#tableMapel").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableMapel_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            dom:
                "<'row'<'toolbar col-sm-6'lfrtip><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            paging: false,
            ajax: {
                url: base_url + "datamapel/read",
                type: "POST"
            },
            columns: [
                {
                    data: "id_mapel",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "urutan_tampil",
                    className: "text-center",
                    searchable: false
                },
                {
                    data: "nama_mapel",
                },
                {
                    data: "kode",
                    className: "text-center",
                },
                {
                    data: "kelompok",
                    className: "text-center",
                },
                {
                    data: "status",
                    className: "text-center",
                }
            ],
            columnDefs: [
                //{ "visible": false, "targets": groupColumn },
                {
                    targets: 0,
                    data: null,
                    render: function (data, type, row, meta) {
                        //var disabled = row.deletable === '0' ? 'disabled' : 'enabled';
                        var disabled = row.deletable === '0' ? '' : '';
                        return `<div class="text-center">
									<input id="check${row.id_mapel}" name="checked[]" class="check ${disabled}" value="${row.id_mapel}" type="checkbox" ${disabled}>
								</div>`;
                    }
                },
                {
                    searchable: false,
                    targets: 6,
                    data: {
                        id_mapel: "id_mapel",
                        nama_mapel: "nama_mapel",
                        kode: "kode",
                        kelompok: "kelompok",
                        deletable: "deletable",
                        status: "status",
                        urutan_tampil: "urutan_tampil"
                    },
                    render: function (data, type, row, meta) {
                        //var disabled = data.deletable === '0' ? 'disabled' : '';
                        var disabled = data.deletable === '0' ? '' : '';
                        return `<div class="text-center">
									<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editMapelModal"
									 data-deletable="${data.deletable}" data-status="${data.status}" data-id="${data.id_mapel}"
									  data-nama="${data.nama_mapel}" data-kode="${data.kode}" data-kelompok="${data.kelompok}"
									   data-urutan="${data.urutan_tampil}">
										<i class="fa fa-pencil-alt text-white"></i>
									</a>
									<!--
									<button onclick="deleteItem(${data.id_mapel})" class="btn btn-xs btn-danger deleteRecord" data-id='${data.id_mapel}' ${disabled}>
								<i class="fa fa-trash text-white"></i>
							</button>
							-->
								</div>`;
                    }
                }
            ],
            //order: [[4, "asc"]],
            order: [[ groupColumn, 'asc' ]],
            rowId: function (a) {
                return a;
            },
            drawCallback: function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group bg-gray"><td class="pl-2 text-bold" colspan="7">'+group+'</td></tr>'
                        );
                        last = group;
                    }
                } );
            },
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                //$("td:eq(1)", row).html(index);

                var st = data.status === '0' ?
                    '<div class="badge badge-btn badge-secondary">Nonaktif</div>' :
                    '<div class="badge badge-btn badge-success">Aktif</div>';
                $("td:eq(5)", row).html(st);
            }
        });

        table
            .buttons()
            .container()
            .appendTo("#tableMapel_wrapper .col-md-6:eq(1)");

        $("div.toolbar").html(
            '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-sm btn-danger mr-3 mb-2 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>' +
            '<button type="button" data-toggle="modal" data-target="#createMapelModal" class="btn btn-sm btn-primary mr-1 mb-2"><i class="fa fa-plus"></i> Tambah Data</button>' +
            '<a href="'+base_url+'datamapel/import" class="btn btn-sm btn-success mr-1 mb-2"><i class="fa fa-upload"></i> Import</a>'
            /*'<button data-toggle="modal" data-target="#editDataMapelModal" class="btn btn-sm btn-warning" type="button"><i class="fas fa-cog"></i> Mapel Nonaktif</button>'
            /*'<div class="btn-group">' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
            '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
            //'<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mapelNonAktif">Lihat Mapel Nonaktif</button>' +
            '</div>'
            */
        );

        $('#id_parent_sub').on('change', function () {
            var indexKelompok = kelompokMapel.map(function (kel) { return kel.id_kel_mapel; }).indexOf($(this).val());
            var kategori = kelompokMapel[indexKelompok].kategori;
            $('#kategori_sub').val(kategori);
        });

        $("#myModal").on("shown.modal.bs", function () {
            $(':input[name="banyak"]').select();
        });

        $('#editKelompokModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var kat = $(e.relatedTarget).data('kategori');

            $('#createnamakel').val(nama);
            $('#createkodekel').val(kode);
            $('#id_kel_mapel').val(id);
            $('#kategori').val(kat);
        });

        $('#editSubKelompokModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var utama = $(e.relatedTarget).data('utama');
            var kat = $(e.relatedTarget).data('kategori');

            $('#createnamasub').val(nama);
            $('#createkodesub').val(kode);
            $('#id_kel_sub').val(id);
            $('#id_parent_sub').val(utama);
            $('#kategori_sub').val(kat);
            console.log(utama);
        });

        $('#create-kelompok').on('submit', function () {
            $.ajax({
                url: base_url + "datamapel/addkelompokmapel",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#editKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    //tableKelompok.ajax.reload();
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                }, error: function (xhr, status, error) {
                    $('#editKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $('#create-sub-kelompok').on('submit', function () {
            $.ajax({
                url: base_url + "datamapel/addkelompokmapel",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#editSubKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editSubKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    //tableSubKelompok.ajax.reload();
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 1000);
                }, error: function (xhr, status, error) {
                    $('#editSubKelompokModal').modal('hide').data('bs.modal', null);
                    $('#editSubKelompokModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $(".select_all").on("click", function () {
            if (this.checked) {
                $(".check").each(function () {
                    this.checked = true;
                    $(".select_all").prop("checked", true);
                    $('#hapusterpilih').removeClass('d-none');
                });
            } else {
                $(".check").each(function () {
                    this.checked = false;
                    $(".select_all").prop("checked", false);
                    $('#hapusterpilih').addClass('d-none');
                });
            }
        });

        $("#tableMapel tbody").on("click", "tr .check", function () {
            var check = $("#tableMapel tbody tr .check").length;
            var checked = $("#tableMapel tbody tr .check:checked").length;
            if (check === checked) {
                $(".select_all").prop("checked", true);
            } else {
                $(".select_all").prop("checked", false);
            }

            if (checked === 0) {
                $('#hapusterpilih').addClass('d-none');
            } else {
                $('#hapusterpilih').removeClass('d-none');
            }
        });

        $('#create').on('submit', function () {
            var nama = $('#createnama').val();
            var kode = $('#createkode').val();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "datamapel/create",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#createMapelModal').modal('hide').data('bs.modal', null);
                    $('#createMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    table.ajax.reload();
                }, error: function (xhr, status, error) {
                    $('#createMapelModal').modal('hide').data('bs.modal', null);
                    $('#createMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal menyimpan data");
                }
            });
            return false;
        });

        $('#editMapelModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');
            var kelompok = $(e.relatedTarget).data('kelompok');
            var status = $(e.relatedTarget).data('status');
            var deletable = $(e.relatedTarget).data('deletable');
            var urut = $(e.relatedTarget).data('urutan');

            $('#namaEdit').val(nama);
            $('#kodeEdit').val(kode);
            $('#editIdMapel').val(id);
            $('#kelompok').val(kelompok);
            $('#status').val(status);
            $('#kodeUrut').val(urut);

            //console.log(status);
            /*
            if (deletable == 0) {
                $('#formnama').addClass('d-none');
                $('#formkode').addClass('d-none');
                $('#formkelompok').addClass('d-none');
            } else {
                $('#formnama').removeClass('d-none');
                $('#formkode').removeClass('d-none');
                $('#formkelompok').removeClass('d-none');
            }
            */
        });

        $('#update').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //var btn = $('#submit');
            //btn.attr('disabled', 'disabled').text('Wait...');
            console.log("data", $(this).serialize());

            $.ajax({
                url: base_url + "datamapel/update",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (data) {
                    console.log("result", jQuery.parseJSON(data));
                    //btn.removeAttr('disabled').text('Simpan');
                    $('#editMapelModal').modal('hide').data('bs.modal', null);
                    $('#editMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    showSuccessToast('Data berhasil diupdate.');
                    table.ajax.reload();
                },
                error: function (xhr, status, error) {
                    $('#editMapelModal').modal('hide').data('bs.modal', null);
                    $('#editMapelModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast('Error');
                    console.log(xhr);
                }
            });
        });

        $("#bulk").on("submit", function (e) {
            if ($(this).attr("action") == base_url + "datamapel/delete") {
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajax({
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    type: "POST",
                    success: function (respon) {
                        console.log('tables', respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: respon.total + " data berhasil dihapus",
                                icon: "success"
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                html: respon.total,
                                icon: "error"
                            });
                        }
                        reload_ajax();
                    },
                    error: function () {
                        swal.fire({
                            title: "Gagal",
                            text: "Ada data yang sedang digunakan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    function aktifkan(e) {
        var id = $(e).data('id');
        console.log(id);

        $.ajax({
            url: base_url + "datamapel/aktifkan/"+id,
            type: "GET",
            success: function (data) {
                console.log("result", data);
                window.location.href = base_url + 'datamapel'
            }, error: function (xhr, status, error) {
                $('#mapelNonAktif').modal('hide').data('bs.modal', null);
                $('#mapelNonAktif').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                showDangerToast();
            }
        });
    }

    function dismissEdit() {
        var count = $('#tableMapel tr').length;
        console.log("size", "-->"+count);
        for (var i = 0; i<count; i++) {
            var inputs = document.getElementById('check'+i);
            if (inputs!=null) {
                inputs.checked = false;
                console.log("id", "-->"+'check'+i);
            }
        }
    }

    function deleteItem(id) {
        dismissEdit();
        var checkBox = document.getElementById("check" + id);
        checkBox.checked = true;
        bulk_delete("check" + id);
    }

    function bulk_delete(id) {
        if ($("#tableMapel tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            $("#bulk").attr("action", base_url + "datamapel/delete");
            swal.fire({
                title: "Anda yakin?",
                text: "Data akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then(result => {
                if (result.value) {
                    $("#bulk").submit();
                } else {
                    var inputs = document.getElementById(id);
                    inputs.checked = false;
                }
            });
        }
    }

    function bulk_edit() {
        if ($("#tableMapel tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            $("#bulk").attr("action", base_url + "datamapel/edit");
            $("#bulk").submit();
        }
    }

    function hapusKelompok(e) {
        var id = $(e).data('id');
        var kode = $(e).data('kode');
        var parent = $(e).data('utama');

        var dataPost = $('#hapus-kelompok').serialize() + '&id_kel='+id+'&id_parent='+parent+'&kode='+kode;
        console.log(dataPost);

        swal.fire({
            title: "Anda yakin?",
            text: "Data Kelompok Mapel akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "datamapel/hapuskelompok",
                    type: "POST",
                    data: dataPost,
                    success: function (data) {
                        console.log("result", data);
                        if (data.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    tableKelompok.ajax.reload();
                                    tableSubKelompok.ajax.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                html: data.message,
                                icon: "error"
                            });
                        }
                    }, error: function (xhr, status, error) {
                        showDangerToast();
                    }
                });
            }
        });
    }
</script>