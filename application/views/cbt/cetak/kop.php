<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-sm btn-danger float-right" onclick="history.back();">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow card-primary card-outline">
                        <div class="card-header">
                            <h6 class="card-title">Setting Kop</h6>
                            <button class="card-tools btn btn-sm bg-primary text-white" onclick="submitKop()">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?= form_open_multipart('', array('id' => 'set-logo-kanan')) ?>
                                    <div class="form-group pb-2">
                                        <label for="logo-kanan">Logo Kanan</label>
                                        <input type="file" id="logo-kanan" name="logo" class="dropify"
                                               data-max-file-size-preview="2M"
                                               data-allowed-file-extensions="jpg jpeg png"
                                               data-default-file="<?= base_url() . $kop->logo_kanan ?>"/>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                                <div class="col-md-4">
                                    <?= form_open_multipart('', array('id' => 'set-logo-kiri')) ?>
                                    <div class="form-group pb-2">
                                        <label for="logo-kiri">Logo Kiri</label>
                                        <input type="file" id="logo-kiri" name="logo" class="dropify"
                                               data-max-file-size-preview="2M"
                                               data-allowed-file-extensions="jpg jpeg png"
                                               data-default-file="<?= base_url() . $kop->logo_kiri ?>"/>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                                <div class="col-md-4">
                                    <?= form_open_multipart('', array('id' => 'set-tandatangan')) ?>
                                    <div class="form-group pb-2">
                                        <label for="logo-kiri">Tandatangan Kepala Sekolah</label>
                                        <input type="file" id="tanda-tangan" name="logo" class="dropify"
                                               data-max-file-size-preview="2M"
                                               data-allowed-file-extensions="jpg jpeg png"
                                               data-default-file="<?= base_url() . $kop->tanda_tangan ?>"/>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                            <?= form_open('', array('id' => 'set-kop')) ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Header 1</label>
                                        <textarea id="header-1" class="form-control" name="header_1" rows="2"
                                                  placeholder="Header baris 1" required><?= $kop->header_1 ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Header 2</label>
                                        <textarea id="header-2" class="form-control" name="header_2" rows="2"
                                                  placeholder="Header baris 2" required><?= $kop->header_2 ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Header 3</label>
                                        <textarea id="header-3" class="form-control" name="header_3" rows="2"
                                                  placeholder="Header baris 3" required><?= $kop->header_3 ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Header 4</label>
                                        <textarea id="header-4" class="form-control" name="header_4" rows="2"
                                                  placeholder="Header baris 4" required><?= $kop->header_4 ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kota/Kab</label>
                                        <input id="input-kota" class="form-control" name="kota" placeholder="Kota/Kab"
                                               value="<?= $kop->kota ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titimangsa</label>
                                        <input id="input-tanggal" class="form-control" name="tanggal"
                                               placeholder="Titimangsa" value="<?= $kop->tanggal ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kepala Sekolah</label>
                                        <input id="input-kepsek" class="form-control" name="kepala_sekolah"
                                               placeholder="Kepala Sekolah" value="<?= $kop->kepala_sekolah ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Proktor</label>
                                        <input id="input-proktor" class="form-control" name="proktor"
                                               placeholder="Proktor" value="<?= $kop->proktor ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pengawas 1</label>
                                        <input id="input-pengawas-1" class="form-control" name="pengawas_1"
                                               placeholder="Pengawas 1" value="<?= $kop->pengawas_1 ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pengawas 2</label>
                                        <input id="input-pengawas-2" class="form-control" name="pengawas_2"
                                               placeholder="Pengawas 2" value="<?= $kop->pengawas_2 ?>" required>
                                    </div>
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
<script>
    var oldVal1 = "<?=$kop->header_1?>";
    var oldVal2 = "<?=$kop->header_2?>";
    var oldVal3 = "<?=$kop->header_3?>";
    var oldVal4 = "<?=$kop->header_4?>";
    var oldKota = "<?=$kop->kota?>";
    var oldTgl = "<?=$kop->tanggal?>";
    var oldKepsek = "<?=$kop->kepala_sekolah?>";
    var logoKanan = "<?=base_url() . $kop->logo_kanan?>";
    var logoKiri = "<?=base_url() . $kop->logo_kiri?>";
    var tandatangan = "<?=base_url() . $kop->tanda_tangan?>";

    function submitKop() {
        $('#set-kop').submit();
    }

    $(document).ready(function () {
        ajaxcsrf();

        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Seret logo kesini atau klik',
                'replace': 'Seret atau klik<br>untuk mengganti logo',
                'remove': 'Hapus',
                'error': 'Ooops, ada kesalahan!!.'
            },
            error: {
                'fileSize': 'The file size is too big ({{ value }} max).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'The image format is not allowed ({{ value }} only).'
            }
        });


        drEvent.on('dropify.beforeClear', function (event, element) {
            //return confirm("Hapus logo \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            //console.log(element.element.id);
            if (element.element.id === 'logo-kanan') {
                logoKanan = '';
            } else if (element.element.id === 'logo-kiri') {
                logoKiri = '';
            } else if (element.element.id === 'tanda-tangan') {
                tandatangan = '';
            }
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
            $.toast({
                heading: "Error",
                text: "file rusak",
                icon: 'warning',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 5000,
                position: 'top-right'
            });
        });

        $("#logo-kanan").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var form = new FormData($('#set-logo-kanan')[0]);
                uploadAttach(base_url + 'cbtcetak/uploadfile/logo_kanan', form);
            }
        });

        $("#logo-kiri").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var form = new FormData($('#set-logo-kiri')[0]);
                uploadAttach(base_url + 'cbtcetak/uploadfile/logo_kiri', form);
            }
        });

        $("#tanda-tangan").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var form = new FormData($('#set-tandatangan')[0]);
                uploadAttach(base_url + 'cbtcetak/uploadfile/tandatangan', form);
            }
        });

        $("#header-1").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal1) {
                return;
            }
            oldVal1 = currentVal;
        });
        $("#header-2").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal2) {
                return;
            }
            oldVal2 = currentVal;
        });
        $("#header-3").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal3) {
                return;
            }
            oldVal3 = currentVal;
        });
        $("#header-4").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal4) {
                return;
            }
            oldVal4 = currentVal;
        });

        $('#input-kota').on('input', function (e) {
            oldKota = $(this).val();
        });

        $('#input-tanggal').on('input', function (e) {
            oldTgl = $(this).val();
        });

        $('#input-kepsek').on('input', function (e) {
            oldKepsek = $(this).val();
        });

        $('#set-kop').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $.ajax({
                url: base_url + 'cbtcetak/savekop',
                type: 'POST',
                data: $(this).serialize() + '&logo_kanan=' + logoKanan + '&logo_kiri=' + logoKiri + '&tanda_tangan=' + tandatangan,
                success: function (response) {
                    console.log(response);
                    history.back();
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                }
            });
        });

        function uploadAttach(action, data) {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    if (data.src.includes('kanan')) {
                        logoKanan = data.src;
                        //console.log('kanan', data.src);
                    } else if (data.src.includes('kiri')) {
                        logoKiri = data.src;
                        //console.log('kiri', data.src);
                    } else if (data.src.includes('tanda')) {
                        tandatangan = data.src;
                        //console.log('tandatangan', data.src);
                    }
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    $.toast({
                        heading: "ERROR!!",
                        text: "file tidak terbaca",
                        icon: 'error',
                        showHideTransition: 'fade',
                        allowToastClose: true,
                        hideAfter: 5000,
                        position: 'top-right'
                    });
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src: src},
                type: "POST",
                url: base_url + "cbtcetak/deletefile",
                cache: false,
                success: function (response) {
                    console.log(response);
                }
            });
        }
    })

</script>
