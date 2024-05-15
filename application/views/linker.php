<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/app/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <style>
        .linker-list p {
            margin-bottom: .5rem;
            margin-top: .5rem;
        }
        .linker-container p {
            margin-bottom: .5rem;
            margin-top: .5rem;
        }
    </style>
</head>
<body>
<div class="container pt-4">
    <div class="mt-4">
        <div class="linker-container"></div>
        <hr />
        <div class="linker-container"></div>
        <hr />
        <div class="linker-container"></div>
        <hr />
    </div>
</div>
<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script>
    const dataDefault = [
        ['#', '<p>Test A</p>', '<p>Test B</p><img class="img-fluid img-linker" src="http://localhost/main/assets/img/siswa.png" alt="Alt Text" style="max-width: 200px">'],
        ["<p>Test 1 test fsdbsd hgfky fyfk uyfku yf'fd djtdjytd jtdjhtd</p>", '0', '1'],
        ["<p>Test 2<p/>", '1', '1']
    ]
    const jawabanDefault1 = {
        jawaban: [
            ['#', '<p>Test A</p>', '<p>Test B</p><img class="img-fluid img-linker" src="http://localhost/main/assets/img/siswa.png" alt="Alt Text" style="max-width: 200px">'],
            ["<p>Test 1 test fsdbsd hgfky fyfk uyfku yf'fd djtdjytd jtdjhtd</p>", '0', '1'],
            ["<p>Test 2<p/>", '1', '1']
        ],
        model: '2',
        type: '1'
    }

    const jawabanDefault2 = {
        jawaban: [
            ['#', '<p>Test A</p>', '<p>Test B</p><img class="img-fluid img-linker" src="http://localhost/main/assets/img/siswa.png" alt="Alt Text" style="max-width: 200px">'],
            ["<p>Test 1 test fsdbsd hgfky fyfk uyfku yf'fd djtdjytd jtdjhtd</p>", '0', '1'],
            ["<p>Test 2<p/>", '1', '1']
        ],
        model: '1',
        type: '2'
    }

    $(document).ready(function () {
        let $linkers = $('.linker-container');
        $.each($linkers, function (idx, el) {
            if (idx === 1) {
                $(el).linkerList({
                    //enableSelect: false,
                    //enableEditor: false,
                    data: jawabanDefault1,
                    id: idx+1,
                    callback: function (id, data) {
                        console.log('data:'+id, data)
                    }
                });
            } else {
                $(el).linkerList({
                    enableSelect: false,
                    enableEditor: false,
                    data: jawabanDefault2,
                    id: idx+1,
                    callback: function (id, data) {
                        console.log('data:'+id, data)
                    }
                });
            }
        })
    })
</script>

<script>

</script>
</body>
</html>