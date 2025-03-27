<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Scripts -->
<script>
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Navbar scroll behavior
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.header_section').addClass('header-scrolled');
            } else {
                $('.header_section').removeClass('header-scrolled');
            }
        });

        // Product image hover effect
        $('.card').hover(
            function() {
                $(this).find('.card-img-top').css('opacity', '0.8');
            },
            function() {
                $(this).find('.card-img-top').css('opacity', '1');
            }
        );

        // Mobile menu toggle
        $('.navbar-toggler').on('click', function() {
            $(this).toggleClass('active');
        });
    });
</script>