</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <?= strftime('%A, %d %B %Y') ?>, <span class="live-clock"><?= date('H:i:s') ?></span>
        <div class="pull-right hidden-xs">
            <b>Ujian Online</b> v2
        </div>
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/pace/pace.min.js"></script>

<script type="text/javascript">
    function sisawaktu(t) {
        var time = new Date(t);
        var n = new Date();
        var x = setInterval(function () {
            var now = new Date().getTime();
            var dis = time.getTime() - now;
            var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
            var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
            var s = Math.floor((dis % (1000 * 60)) / (1000));
            h = ("0" + h).slice(-2);
            m = ("0" + m).slice(-2);
            s = ("0" + s).slice(-2);
            var cd = h + ":" + m + ":" + s;
            $('.sisawaktu').html(cd);
        }, 100);
        setTimeout(function () {
            waktuHabis();
        }, (time.getTime() - n.getTime()));
    }

    function countdown(t) {
        var time = new Date(t);
        var n = new Date();
        var x = setInterval(function () {
            var now = new Date().getTime();
            var dis = time.getTime() - now;
            var d = Math.floor(dis / (1000 * 60 * 60 * 24));
            var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
            var s = Math.floor((dis % (1000 * 60)) / (1000));
            d = ("0" + d).slice(-2);
            h = ("0" + h).slice(-2);
            m = ("0" + m).slice(-2);
            s = ("0" + s).slice(-2);
            var cd = d + " Hari, " + h + " Jam, " + m + " Menit, " + s + " Detik ";
            $('.countdown').html(cd);

            setTimeout(function () {
                location.reload()
            }, dis);
        }, 1000);
    }

    function ajaxcsrf() {
        var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
        var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
    }

    $(document).ready(function () {
        setInterval(function () {
            var date = new Date();
            var h = date.getHours(),
                m = date.getMinutes(),
                s = date.getSeconds();
            h = ("0" + h).slice(-2);
            m = ("0" + m).slice(-2);
            s = ("0" + s).slice(-2);

            var time = h + ":" + m + ":" + s;
            $('.live-clock').html(time);
        }, 1000);
    });
</script>
</body>

</html>