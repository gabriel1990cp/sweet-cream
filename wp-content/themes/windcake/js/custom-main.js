/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 /* 1. MENU JS */

/*
 * realiza scrollTo atraves de classes padrões
 */
    jQuery('li.menu-item a,.mainmenu-area ul.navbar-nav li a,.logotipo').on('click', function (e) {
        var anchor = jQuery(this);
        scrolltop(anchor, e);
    });

 /* realiza scrollTo atraves de classe especifica
 */
    jQuery('.scroll-to').on('click', function (e) {
        var anchor = jQuery(this);
        scrolltopClasse(anchor, e);

    });

    function scrolltopClasse(anchor, e) {
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.find('.target').data('url')).offset().top - 50
        }, 1500);
        e.preventDefault();
    }

    function scrolltop(anchor, e) {
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top - 50
        }, 1500);
        e.preventDefault();
    }

    jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.mainmenu-area').addClass('menu-animation');
            jQuery('.header-3 .logo-area').addClass('menu-animation');
            jQuery('.header-4 .logo-area').addClass('menu-animation');
        } else {
            jQuery('.mainmenu-area').removeClass('menu-animation');
            jQuery('.header-3 .logo-area').removeClass('menu-animation');
            jQuery('.header-4 .logo-area').removeClass('menu-animation');
        }
    });