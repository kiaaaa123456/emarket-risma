<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 Risma Risdayanti.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div> 
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("adminlte3") }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("adminlte3") }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset("adminlte3") }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("adminlte3") }}/dist/js/demo.js"></script>
<script src="{{ asset('assets') }}/plugins/datables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('sweetalert2') }}/dist/sweetalert2.min.js"></script>
@stack('script')
</body>
</html>