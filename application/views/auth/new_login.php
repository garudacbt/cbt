<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  -->

    <link rel="stylesheet" href="<?= base_url() ?>/assets/fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/login-style.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">

    <title>Login #8</title>

    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus {
            border-bottom: 1px solid #ccc;
            -webkit-text-fill-color: inherit !important;
            -webkit-box-shadow: 0 0 0px 1000px #f8fafb inset;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>

    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/app/js/login-main.js"></script>

</head>
<body>


<div class="content">
    <div class="info-box bg-transparent shadow-none">
        <?php
        $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri;
        ?>
        <img src="<?= $logo_app ?>" width="60" height="60">
        <div class="info-box-content ml-2" style="text-shadow: 1px 1px 2px #000000">
            <h5 class="info-box-text text-white text-wrap"><b><?= $setting->nama_aplikasi ?></b></h5>
            <span class="info-box-text text-white"><?= $setting->alamat ?></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url("/assets/img/ma1.jpg") ?>" alt="Los Angeles"
                                 style="width: 100%; height: auto; object-fit: cover;object-position: center;">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url("/assets/img/ma2.jpg") ?>" alt="Chicago"
                                 style="width: 100%; height: auto; object-fit: cover;object-position: center;">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url("/assets/img/ma3.jpg") ?>" alt="New York"
                                 style="width: 100%; height: auto; object-fit: cover;object-position: center;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
                <!--
            <img id="item" src="<?= base_url() ?>/assets/img/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
            -->
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In to <strong>Colorlib</strong></h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                                adipisicing.</p>
                        </div>
                        <form action="#" method="post">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username">

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div>

                            <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    let base_url = '<?=base_url();?>';

    var i = 0;

    //var img = ["wal-1.jpeg", "wal-2.jpg", "wal-3.jpg"];
    var img = ["ma1.jpg", "ma2.jpg", "ma3.jpg"];

    var opacity = 0;
    var incOpacity = 1;
    var delay = 50;

    function changeBg() {
        opacity = 0;
        incOpacity = 1;

        $('.item').css("opacity", opacity);
        $('.item').attr("src", base_url + "/assets/img/" + img[i]);

        i++;
        // cek if i = max
        if (i === img.length) {
            i = 0;
        }

        fadeIn();

        setTimeout(changeBg, 10000);
    }

    // fungsi effek fade
    function fadeIn() {
        opacity = incOpacity / delay;
        if (incOpacity <= delay) {
            $('.item').css("opacity", opacity);
            setTimeout(fadeIn, 10);
            incOpacity++;
        }
    }

    // inisialisai fungsi gambar
    changeBg();
</script>
<script src="<?= base_url() ?>/assets/app/js/auth/login.js"></script>

</body>
</html>