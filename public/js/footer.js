$(document).ready(function () {
    $('#backToTop').hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#backToTop').fadeIn('slow');
        } else {
            $('#backToTop').fadeOut('slow');
        }
    });
    $('#backToTop').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
});