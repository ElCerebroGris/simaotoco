<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://itel.gov.ao">ITEL</a>.</strong> All rights
    reserved.
</footer>       <!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>libs/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>libs/plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>libs/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>libs/dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>libs/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="<?= base_url() ?>libs/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>libs/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>libs/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>libs/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>libs/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>libs/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>libs/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>libs/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>libs/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>libs/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?= base_url() ?>libs/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <link href="<?= base_url() ?>libs/plugins/toastr/toastr.js" rel="stylesheet"/>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>libs/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>libs/dist/js/adminlte.js"></script>

<script>
    $(function () {
    
        //Initialize Select2 Elements
        $('.select2').select2({
           
            
        });
        

    });


    $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
</script>

</body>
</html>
