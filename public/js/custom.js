$(window).on('load', function () {
    $('.loader .inner').fadeOut(250, function () {
        $('nav').removeClass('opacity');
        $('.loader').fadeOut(400);
        setTimeout(function () {
            if (!Cookies.get('cookieConsent')) {
                $('.cookie-consent').addClass('cookies-show');
                $('#agreeOnCookies').on('click', function () {
                    $('.cookie-consent').removeClass('cookies-show');
                    Cookies.set('cookieConsent', 'true', {expires: 365})
                });
            }
        }, 1000)
    });
    $('.items').isotope({
        filter: '*',
        animationOptions: {
            duration: 1500,
            easing: 'linear',
            queue: false
        }
    })
});

$(document).ready(function () {
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.hasClass("navbar-toggler")) {
            $(".navbar-toggler").click();
        }
    });
});

$(function () {
    $("#message").fadeTo(4000, 500).slideUp(500, function () {
        $("#message").slideUp(500);
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.navbar').addClass('solid');
            $('.brand,.h1').addClass('brand-resize')
        } else {
            $('.navbar').removeClass('solid');
            $('.brand, .h1').removeClass('brand-resize')
        }

        if (navigator.userAgent.match(/i(Phone|Pad)/i) || navigator.userAgent.match(/Android/i)) {
            if ($(this).scrollTop() > 5) {
                $('.navbar').addClass('solid');
                $('.brand,.h1').addClass('brand-resize')
            } else {
                $('.navbar').removeClass('solid');
                $('.brand, .h1').removeClass('brand-resize')
            }
        }
    });
});

$(document).ready(function () {
    $("#back2Top").click(function (event) {
        event.preventDefault();
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

});

$(document).ready(function () {
    $("#offers-carousel").owlCarousel({
            items: 3,
            autoplay: true,
            smartSpeed: 1700,
            loop: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        }
    );
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.icon').addClass('icon-visible');
            $('.toTop').addClass('toTop-opacity');
        } else {
            $('.icon').removeClass('icon-visible');
            $('.toTop').removeClass('toTop-opacity');
        }
    })
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('.mouse').css('opacity', 1 - $(window).scrollTop() / 250);
    });

    $('.gallery-list-item').click(function () {
        let value = $(this).attr('data-filter');
        if (value === 'all') {
            $('.filter').show(300);
        } else {
            $('.filter').not('.' + value).hide(300)
            $('.filter').filter('.' + value).show(300)
        }

        $('.gallery-list-item').click(function () {
            $(this).addClass('active-item').siblings().removeClass('active-item')
        })
    });

    $("a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });

    $('[data-fancybox]').fancybox({
        gutter: 50,
        keyboard: true,
        preventCaptionOverlap: true,
        arrows: true
    })


    $('#filters a').click(function () {
        $('#filters .current').removeClass('current')
        $(this).addClass('current')
        var selector = $(this).attr('data-filter')
        $('.items').isotope({
            filter: selector,
            animationOptions: {
                duration: 1500,
                easing: 'linear',
                queue: false
            }
        })
        return false
    })
});
