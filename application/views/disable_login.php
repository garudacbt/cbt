<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Garuda CBT</title>

    <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
    <link rel="shortcut icon" href="<?= $logo_app ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
</head>

<script type="text/javascript">
    let base_url = 'http://localhost/main/';
</script>

<body id="page-top">
<section class="d-flex align-items-center">
        <div class="container">
        <div class="align-content-center">
            <img class="mt-3 mb-3" width="30" height="30" src="<?= base_url('assets/img/garuda_circle.png') ?>">
            <span class="text-lg"><b>arudaCBT</b></span>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-8">
                <h4>Akun Suspend</h4>
            </div>
        </div>
        <div class="alert alert-default-danger align-content-center" role="alert">
            <h4>Tidak bisa login:</h4>
            <ol>
                <li>Pastikan username dan password telah sesuai</li>
                <li>Anda mungkin telah mengganti username atau password, hubungi admin</li>
            </ol>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>