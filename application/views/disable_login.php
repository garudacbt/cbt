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
    let base_url = '<?=base_url();?>';
    function logout() {
        location.href=base_url+"logout";
    }

</script>

<body id="page-top">
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="mt-3 mb-3" width="30" height="30" src="<?= base_url('assets/img/garuda_circle.png') ?>">
                <span class="text-lg"><b>arudaCBT</b></span>
            </div>
            <div class="col-6 pt-3">
                <button class="btn btn-danger float-right" onclick="logout()">Keluar</button>
            </div>
        </div>
        <hr class="m-0">
        <div class="alert alert-default-danger align-content-center" role="alert">
            <h4>Akun Suspend</h4>
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