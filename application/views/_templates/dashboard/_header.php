<!DOCTYPE html>
<html>

<head>

    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
    <link rel="shortcut icon" href="<?= $logo_app ?>" type="image/x-icon">

    <!-- Required CSS -->
    <!-- v3 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/v4-shims.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/Ionicons/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/pace-progress/themes/silver/pace-theme-center-circle.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- multi select -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/multiselect/css/multi-select.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Datetime picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jquery-datetimepicker/jquery.datetimepicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/jquery.toast.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/dropify/css/dropify.min.css">

    <!-- Datatables Buttons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/poppins.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/calibri.css">
    <!--
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/montserrat.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/fonts.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/uthmanic.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/scheherazade.css">
	-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/show.toast.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">

    <!-- textarea editor -->
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/katex/katex.css">
    <!-- /texarea editor; -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/DualSelectList/css/bala.DualSelectList.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/weekCalendar.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap-icon/bootstrap-icons.css">

    <link href="<?= base_url() ?>/assets/plugins/ios-switch/component-custom-switch.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script type="text/javascript"
            src="<?= base_url() ?>/assets/plugins/DualSelectList/js/bala.DualSelectList.jquery.js"></script>

    <script defer src="<?= base_url() ?>/assets/plugins/katex/contrib/auto-render.min.js" onload="renderMathInElement(document.body);"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/app/css/stylised.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/contextmenu/jquery.contextmenu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/plugins/fields-linker/fieldsLinker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/plugins/pignose/css/pignose.calendar.css">

    <style>
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: none;
        }

        page[size="A4"][layout="potrait"] {
            width: 21cm;
            height: 29.7cm;
        }

        page[size="A4"] {
            width: 29.7cm;
            height: 21cm;
        }

        .linker-list p {
            margin-bottom: .5rem;
            margin-top: .5rem;
        }
    </style>
</head>
<script>
    let base_url = '<?=base_url()?>';
    let globalToken;
    let adaJadwalUjian;
</script>
<script src="<?= base_url() ?>/assets/app/js/generate.js"></script>
<script type="text/javascript">
    let tp_active = '<?= $tp_active->tahun ?>';
    let smt_active = '<?= $smt_active->smt ?>';
    let id_tp_active = '<?= $tp_active->id_tp ?>';
    let id_smt_active = '<?= $smt_active->id_smt ?>';

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);

        $('#live-clock').html('<span class="text-lg">' + h + ':' + m + '</span>:' + s);
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        return i;
    }

    function buat_tanggal_indonesia(str) {
        str = str.replace("Jan", "Januari");
        str = str.replace("Feb", "Februari");
        str = str.replace("Mar", "Maret");
        str = str.replace("Apr", "April");
        str = str.replace("May", "Mei");
        str = str.replace("Jun", "Juni");
        str = str.replace("Jul", "Juli");
        str = str.replace("Aug", "Agustus");
        str = str.replace("Sep", "September");
        str = str.replace("Oct", "Oktober");
        str = str.replace("Nov", "Nopember");
        str = str.replace("Dec", "Desember");
        str = str.replace("Mon", "Senin");
        str = str.replace("Tue", "Selasa");
        str = str.replace("Wed", "Rabu");
        str = str.replace("Thu", "Kamis");
        str = str.replace("Fri", "Jumat");
        str = str.replace("Sat", "Sabtu");
        str = str.replace("Sun", "Minggu");
        return str;
    }

    function sanitizeJSON(unsanitized) {
        return unsanitized.replace(/\\/g, "\\\\").replace(/\n/g, "\\n").replace(/\r/g, "\\r").replace(/\t/g, "\\t").replace(/\f/g, "\\f").replace(/"/g, "\\\"").replace(/'/g, "\\\'").replace(/\&/g, "\\&");
    }

    var bulans = ['Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var arrhari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];

    function stringToDate(dateStr) {
        var parts = dateStr.split("-");
        return new Date(parts[0], parts[1] - 1, parts[2])
    }

    function dateToString(date) {
        let year = date.getFullYear();
        //let month = (1 + date.getMonth()).toString().padStart(2, '0');
        const month = date.getMonth();
        let day = date.getDate().toString().padStart(2, '0');
        return day + ' ' + bulans[month] + ' ' + year;
    }

    function dateToStringDay(date) {
        let year = date.getFullYear();
        //let month = (1 + date.getMonth()).toString().padStart(2, '0');
        const month = date.getMonth();
        let day = date.getDate().toString().padStart(2, '0');
        return arrhari[date.getDay()] + ', ' + day + ' ' + bulans[month] + ' ' + year;
    }

</script>

<?php

function buat_tanggal($str)
{
    $str = str_replace("Jan", "Januari", $str);
    $str = str_replace("Feb", "Februari", $str);
    $str = str_replace("Mar", "Maret", $str);
    $str = str_replace("Apr", "April", $str);
    $str = str_replace("May", "Mei", $str);
    $str = str_replace("Jun", "Juni", $str);
    $str = str_replace("Jul", "Juli", $str);
    $str = str_replace("Aug", "Agustus", $str);
    $str = str_replace("Sep", "September", $str);
    $str = str_replace("Oct", "Oktober", $str);
    $str = str_replace("Nov", "Nopember", $str);
    $str = str_replace("Dec", "Desember", $str);
    $str = str_replace("Mon", "Senin", $str);
    $str = str_replace("Tue", "Selasa", $str);
    $str = str_replace("Wed", "Rabu", $str);
    $str = str_replace("Thu", "Kamis", $str);
    $str = str_replace("Fri", "Jum'at", $str);
    $str = str_replace("Sat", "Sabtu", $str);
    $str = str_replace("Sun", "Minggu", $str);
    return $str;
}

function singkat_tanggal($str)
{
    $str = str_replace("Jan", "Jan", $str);
    $str = str_replace("Feb", "Feb", $str);
    $str = str_replace("Mar", "Mar", $str);
    $str = str_replace("Apr", "Apr", $str);
    $str = str_replace("May", "Mei", $str);
    $str = str_replace("Jun", "Jun", $str);
    $str = str_replace("Jul", "Jul", $str);
    $str = str_replace("Aug", "Agt", $str);
    $str = str_replace("Sep", "Sep", $str);
    $str = str_replace("Oct", "Okt", $str);
    $str = str_replace("Nov", "Nov", $str);
    $str = str_replace("Dec", "Des", $str);
    $str = str_replace("Mon", "Senin", $str);
    $str = str_replace("Tue", "Selasa", $str);
    $str = str_replace("Wed", "Rabu", $str);
    $str = str_replace("Thu", "Kamis", $str);
    $str = str_replace("Fri", "Jum'at", $str);
    $str = str_replace("Sat", "Sabtu", $str);
    $str = str_replace("Sun", "Minggu", $str);
    return $str;
}

?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm" onload="startTime()">
<div class="wrapper">

    <!-- Navbar -->
    <?php require_once("navbar.php"); ?>

    <!-- Sidebar -->
    <?php require_once("sidebar.php"); ?>
    <!-- /.sidebar -->
