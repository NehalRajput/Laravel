<!-- Vendor JS -->
<script src="{{ asset('AdminLinks/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/hoverable-collapse.js') }}"></script>
<!-- Endinject -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Plugin JS for this page -->
<script src="{{ asset('AdminLinks/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin JS for this page -->

<!-- Inject: JS -->
<script src="{{ asset('AdminLinks/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/misc.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/settings.js') }}"></script>
<script src="{{ asset('AdminLinks/assets/js/todolist.js') }}"></script>
<!-- Endinject -->

<!-- Custom JS for this page -->
<script src="{{ asset('AdminLinks/assets/js/dashboard.js') }}"></script>
<!-- End custom JS for this page -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200, 
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
