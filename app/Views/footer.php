       <!--  <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2023 &copy; Penggajian </p>
            </div>
            <div class="float-end">
              <p>
                Crafted with
                <span class="text-danger"
                ><i class="bi bi-heart-fill icon-mid"></i
                ></span>
                by Kevin Fernando</a>
              </p>
            </div>
          </div>
        </footer> -->

      </div>
    </div>
    <script src="<?=base_url('assets2/static/js/components/dark.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
    <script src="<?=base_url('assets2/compiled/js/app.js')?>"></script>

    <!-- DataTables -->
    <script src="<?=base_url('assets2/extensions/jquery/jquery.min.js')?>"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?=base_url('assets2/static/js/pages/datatables.js')?>"></script>

    <!-- Foto Uploader -->
    <script src="<?=base_url('assets2/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/filepond/filepond.js')?>"></script>
    <script src="<?=base_url('assets2/extensions/toastify-js/src/toastify.js')?>"></script>
    <script src="<?=base_url('assets2/static/js/pages/filepond.js')?>"></script>

    <script src="<?=base_url('assets2/extensions/sweetalert2/sweetalert2.min.js')?>"></script>
    <script src="<?=base_url('assets2/static/js/pages/sweetalert2.js')?>"></script>

    <script src="<?php echo base_url('assets2/extensions/flatpickr/flatpickr.min.js')?>"></script>
    <script src="<?php echo base_url('assets2/static/js/pages/date-picker.js')?>"></script>

    <!-- Log Out Otomatis -->
    <script>
      function startLogoutTimer() {
        let timeoutId;

        function resetTimer() {
          clearTimeout(timeoutId);
          timeoutId = setTimeout(logout, 30 * 60 * 1000); 
        }

        function logout() {
          window.location.href = '<?= base_url('logout') ?>';
        }

        window.addEventListener('mousemove', resetTimer);
        window.addEventListener('click', resetTimer);
        window.addEventListener('keypress', resetTimer);
        resetTimer();
      }

      startLogoutTimer();
    </script>
    
  </body>
  </html>