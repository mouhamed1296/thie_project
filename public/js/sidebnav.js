$(document).ready(function () {
    
    /* closure for fixing the height */

    let fixHeight = function () {
        $('.navbar-nav').css(
            'max-height',
            document.documentElement.clientHeight - 150
        )
    };

    /* closure for toggling menu icon */

    let toggler = function () {
        $('.navbar .navbar-toggler span').Rotate(360).hide("fast");
        $('.navbar .navbar-toggler span').toggleClass('fa-bars');
        $('.navbar .navbar-toggler span').show(200);
        $('.navbar .navbar-toggler span').toggleClass('fa-times').Rotate(360);
    };
    fixHeight();

    $(window).resize(function () {
        fixHeight();
    });

    /**
     * Cette fonction permet de faire la rotation de l'élément sélectionné
     * @param {int} angle l'angle de rotation
     * @param {int} duration la durée de la rotation
     * @param {string} easing l'effet associé à la rotation
     * @param {callable} complete la fonction de callback à executer à la fin de la rotation
     */

    $.fn.Rotate = function (angle, duration, easing, complete) {
        let args = $.speed(duration, easing, complete);
        let step = args.step;
        return this.each(function (i, e) {
            args.complete = $.proxy(args.complete, e);
            args.step = function(now) {
                $.style(e, 'transform', 'rotate(' + now + 'deg');
                if (step) return step.apply(e, arguments);
            };
            $({deg: 0}).animate({deg: angle}, args);
        });
    };

    /* les actions à effectuer lors d'un click sur le boutton du menu */

    $('.navbar .navbar-toggler').on('click', function () {
        fixHeight();
    });
    $('.navbar-toggler, .hoverlay').on('click', function () {
        $('.mobileMenu, .hoverlay').toggleClass('open');
        toggler();
    });
    $(window).scroll(function () {
        $('.navbar .container-fluid').addClass('mb-0');
    });
});