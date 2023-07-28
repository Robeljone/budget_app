 <!-- Main Footer -->
 <footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2023 <a href="/home">PMS</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script src="/js/table/jquery.dataTables.min.js"></script>
 <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/adminlte.min.js"></script>
 <script src="../../plugins/codemirror/codemirror.js"></script>
 <script src="../../plugins/codemirror/mode/css/css.js"></script>
 <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
 <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
 <script>
     $(function () {
         // Summernote
         $('#summernote').summernote()

         // CodeMirror
         CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
             mode: "htmlmixed",
             theme: "monokai"
         });
     })
 </script>
@isset($script)
<script src="/js/my/{{$script}}"></script>
@endisset
</body>
</html>
