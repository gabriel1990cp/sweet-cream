(function ($) {
    'use strict';


    /*Espera todas as requisições ajax terminarem*/
    $(document).ajaxStop(function () {
        jQuery('.vc_grid-btn-load_more a').html('Ver mais produtos');


        function get_post_receita(slug_post, target_conteudo) {
            var target_html = $('.' + target_conteudo);
            target_html.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i>');

            $.ajax({
                type: "POST",
                url: receitas_ajax_object.ajax_url,
                data: {
                    action: 'receita_load_ajax_content',
                    slug: slug_post,
                }
            }).done(function (conteudo) {
                target_html.html(conteudo);
            });

        }

        $('.descricao-slider-como-usar h2').on('click', function (e) {

            var target_conteudo = "conteudo-receita";//local que será exibido a receita;
            var slug = null;

            //Chama modal de receitas 
            slug = $(this).attr('rel');
            if (typeof slug !== typeof undefined && slug !== false) {
                jQuery('#modalLerReceita').modal('show');
                get_post_receita(slug, target_conteudo);
            }

        });

    });



    jQuery(document).ready(function () {

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

        jQuery('.icones-mande-sua-receita').on('click', function (e) {
            jQuery('#modalReceita').modal('show');
        });

    });
})(jQuery);
