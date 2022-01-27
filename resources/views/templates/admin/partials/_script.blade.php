<!-- plugins:js -->
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/admin/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/admin/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/admin/js/template.js')}}"></script>
<script src="{{ asset('assets/admin/js/settings.js')}}"></script>
<script src="{{ asset('assets/admin/js/todolist.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/tinymce/themes/modern/theme.js')}}"></script>
<script src="{{ asset('assets/admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/editorDemo.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="{{asset('assets/admin/js/maps.js')}}"></script> -->
<script src="{{asset('assets/admin/js/data-table.js')}}"></script>
<script src="{{ asset('assets/admin/js/file-upload.js')}}"></script>
<script src="{{ asset('assets/admin/js/owl-carousel.js')}}"></script>
<script>
var tanpa_rupiah = document.getElementById('price');
tanpa_rupiah.addEventListener('keyup', function(e)
{
tanpa_rupiah.value = formatRupiah(this.value);
});


/* Fungsi */
function formatRupiah(angka, prefix)
{
var number_string = angka.replace(/[^,\d]/g, '').toString(),
split    = number_string.split(','),
sisa     = split[0].length % 3,
rupiah     = split[0].substr(0, sisa),
ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

if (ribuan) {
separator = sisa ? '.' : '';
rupiah += separator + ribuan.join('.');
}

rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
