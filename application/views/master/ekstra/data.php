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
                    <div class="mb-3">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i
                                    class="fa fa-sync"></i> Reload
                        </button>
                        <button type="button" data-toggle="modal" data-target="#createEkstraModal"
                                class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Ekskul
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <table id="tableEkstra" class="w-100 table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle p-0">No.</th>
                                    <th>Ekstrakurikuler</th>
                                    <th>Kode</th>
                                    <th class="text-center align-middle p-0" style="width: 100px"><span>Aksi</span></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <?= form_open('save', array('id' => 'save')) ?>
                            <div class="card border mt-1">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h6>Tentukan Kelas Ekskul</h6>
                                    </div>
                                    <div class="card-tools">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-save mr-1"></i>Simpan
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (count($kelas) > 0) :
                                        foreach ($kelas as $key => $kls) :
                                            $ids_selected = [];
                                            if ($ekskul_kelas[$key] != null) {
                                                $ids = unserialize($ekskul_kelas[$key][0]->ekstra ?? '');
                                                foreach ($ids as $id) {
                                                    array_push($ids_selected, $id['ekstra']);
                                                }
                                            }

                                            ?>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Kelas <?= $kls ?></span>
                                                </div>
                                                <?php
                                                echo form_dropdown(
                                                    'ekskul' . $key . '[]',
                                                    $ekskul,
                                                    $ids_selected,
                                                    'id="ekskul' . $key . '" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Ekskul"'
                                                ); ?>
                                            </div>
                                        <?php endforeach;
                                    else: ?>
                                        <div class="alert alert-default-warning" role="alert">Belum ada data kelas</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createEkstraModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Ekstrakurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Ekstrakurikuler*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnama" name="nama_ekstra" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkode" name="kode_ekstra" class="form-control" required>
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
<div class="modal fade" id="editEkstraModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Ekstrakurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Ekstrakurikuler*</label>
                    <div class="col-md-9">
                        <input type="text" id="namaEdit" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="kodeEdit" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdEkstra" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>


<script>
    var kelases = JSON.parse('<?=json_encode($kelas)?>');
    var table;

    function deleteItem(id) {
        //console.log(id);
        swal.fire({
            title: "Anda yakin?",
            text: "mapel ini akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "dataekstra/delete/" + id,
                    success: function (data) {
                        console.log(data);
                        if (data.status) {
                            showSuccessToast(data.message);
                            reload_ajax()
                        } else {
                            //showDangerToast(data.message);
                            swal.fire({
                                title: "Gagal",
                                html: data.total,
                                icon: "error"
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        showDangerToast('Data error');
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        $('.select2').select2();

        var arrKelas = [];
        $.each(kelases, function (key, entry) {
            var item = {};
            item['kls_id'] = key;
            arrKelas.push(item);
        });
        console.log(arrKelas);

        table = $("#tableEkstra").DataTable({
            initComplete: function () {
                var api = this.api();
                $("#tableEkstra_filter input")
                    .off(".DT")
                    .on("keyup.DT", function (e) {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            searching: false,
            info: false,
            paging: false,
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: base_url + "dataekstra/read",
                dataType: "json",
                type: "POST"
                //data: csrf
            },
            columns: [
                {
                    data: "id_ekstra",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nama_ekstra",
                },
                {
                    data: "kode_ekstra",
                }
            ],
            columnDefs: [
                {
                    searchable: false,
                    targets: 3,
                    className: "text-center",
                    data: {
                        id_ekstra: "id_ekstra",
                        nama_ekstra: "nama_ekstra",
                        kode_ekstra: "kode_ekstra"
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="btn-group btn-group-xs">
									<a class="btn btn-xs btn-warning editRecord" data-toggle="modal" data-target="#editEkstraModal" data-id='${data.id_ekstra}' data-nama='${data.nama_ekstra}' data-kode='${data.kode_ekstra}'>
										<i class="fa fa-pencil-alt text-white text-xs"></i>
									</a>
									<a onclick="deleteItem(${data.id_ekstra})" class="btn btn-xs btn-danger deleteRecord" data-id='${data.id_ekstra}'>
								<i class="fa fa-trash text-white text-xs"></i>
							</a>
								</div>`;
                    }
                }
            ],
            order: [[1, "asc"]],
            rowId: function (a) {
                return a;
            },
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $("td:eq(0)", row).html(index);
            }
        });

        table
            .buttons()
            .container()
            .appendTo("#tableEkstra_wrapper .col-md-6:eq(1)");

        $("#myModal").on("shown.modal.bs", function () {
            $(':input[name="banyak"]').select();
        });

        $("#tableEkstra tbody").on("click", "tr .check", function () {
            var check = $("#tableEkstra tbody tr .check").length;
            var checked = $("#tableEkstra tbody tr .check:checked").length;
            if (check === checked) {
                $(".select_all").prop("checked", true);
            } else {
                $(".select_all").prop("checked", false);
            }
        });

        $('#save').submit(function (e) {
            e.preventDefault();

            console.log("data:", $(this).serialize() + '&kelas=' + JSON.stringify(arrKelas));
            $.ajax({
                url: base_url + "dataekstra/save",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize() + '&kelas=' + JSON.stringify(arrKelas),
                success: function (data) {
                    if (data.status) {
                        console.log(data);
                        showSuccessToast(data.message)
                        //window.location.href = base_url+'dataekstra';
                    } else {
                        showDangerToast('Data tidak tersimpan.');
                    }
                }, error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    showDangerToast('Data tidak tersimpan.');
                }
            });
        });

        $('#create').on('submit', function () {
            var nama = $('#createnama').val();
            var kode = $('#createkode').val();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "dataekstra/create",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    window.location.href = base_url + 'dataekstra';
                    /*
                    $('#createEkstraModal').modal('hide').data('bs.modal', null);
                    $('#createEkstraModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    //showSuccessToast('Data berhasil disimpan.');
                    //table.ajax.reload();
                    */
                }, error: function (xhr, status, error) {
                    $('#createEkstraModal').modal('hide').data('bs.modal', null);
                    $('#createEkstraModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast();
                }
            });
            return false;
        });

        $('#editEkstraModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var nama = $(e.relatedTarget).data('nama');
            var kode = $(e.relatedTarget).data('kode');

            $(e.currentTarget).find('input[id="namaEdit"]').val(nama);
            $(e.currentTarget).find('input[id="kodeEdit"]').val(kode);
            $(e.currentTarget).find('input[id="editIdEkstra"]').val(id);

            var attrId = document.getElementById("editIdEkstra");
            attrId.setAttribute("name", "id_ekstra");

            var attrNama = document.getElementById("namaEdit");
            attrNama.setAttribute("name", "nama_ekstra");

            var attrKode = document.getElementById("kodeEdit");
            attrKode.setAttribute("name", "kode_ekstra");
        });

        $('#update').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var btn = $('#submit');
            btn.attr('disabled', 'disabled').text('Wait...');

            console.log("data", $(this).serialize());

            $.ajax({
                url: base_url + "dataekstra/update",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (data) {
                    console.log("result", jQuery.parseJSON(data));
                    btn.removeAttr('disabled').text('Simpan');
                    $('#editEkstraModal').modal('hide').data('bs.modal', null);
                    $('#editEkstraModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    showSuccessToast('Data berhasil diupdate.');
                    table.ajax.reload();
                },
                error: function (xhr, status, error) {
                    $('#editEkstraModal').modal('hide').data('bs.modal', null);
                    $('#editEkstraModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast('Error');
                    console.log(xhr);
                }
            });
        });
    });

    function dismissEdit() {
        var count = $('#tableEkstra tr').length;
        console.log("size", "-->" + count);
        for (var i = 0; i < count; i++) {
            var inputs = document.getElementById('check' + i);
            if (inputs != null) {
                inputs.checked = false;
                console.log("id", "-->" + 'check' + i);
            }
        }
    }

</script>
