</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>GarudaCBT</strong> v.<?= APP_VERSION ?>
    <div class="float-right d-none d-sm-inline-block">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        <b>V.</b>3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>

<!-- Required JS -->
<!-- v3 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Datatables Buttons -->
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/assets/plugins/sparklines/sparkline.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/file/summernote-file.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/gallery/dist/summernote-gallery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/math/summernote-math.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- multi select -->
<script src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- moment -->
<script src="<?= base_url() ?>/assets/plugins/moment/moment-with-locales.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.toast.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/demo.js"></script>
<!-- /v3 -->
<!-- datetimepicker -->
<script src="<?= base_url() ?>/assets/plugins/jquery-datetimepicker/jquery.datetimepicker.full.js"></script>
<!-- TimeAgo -->
<script src="<?= base_url() ?>/assets/plugins/jquery-timeago/jquery.timeago.js" type="text/javascript"></script>
<!-- App JS -->
<script src="<?= base_url() ?>/assets/app/js/show.toast.js"></script>
<script src="<?= base_url() ?>/assets/app/js/dashboard_guru.js"></script>

<script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Custom JS -->
<script type="text/javascript">
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    function ajaxcsrf() {
        var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
        var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
    }

    function reload_ajax() {
        table.ajax.reload();
    }

    var initDestroyTimeOutPace = function () {
        var counter = 0;

        var refreshIntervalId = setInterval(function () {
            var progress;

            if (typeof $('.pace-progress').attr('data-progress-text') !== 'undefined') {
                progress = Number($('.pace-progress').attr('data-progress-text').replace("%", ''));
            }

            if (progress === 99) {
                counter++;
            }

            if (counter > 50) {
                clearInterval(refreshIntervalId);
                Pace.stop();
            }
        }, 100);
    };
    initDestroyTimeOutPace();

</script>

</body>

</html>
