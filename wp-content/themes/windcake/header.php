<?php 
/**
 * Header modificado.
 * Header original: header_old.php
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <title><?php bloginfo('name'); ?></title>

        <meta name="description" content="<?php echo of_get_option('sitedescription') ?>">
        <meta name="keywords" content="<?php echo of_get_option('sitekeywords') ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php if (of_get_option('favicon')) { ?>
            <link rel="icon" href="<?php echo of_get_option('favicon') ?>">
        <?php } ?>
        <?php if (of_get_option('iphoneicon')) { ?>
            <link rel="apple-touch-icon" href="<?php echo of_get_option('iphoneicon') ?>" />
        <?php } ?>	
        <?php if (of_get_option('iphoneretinaicon')) { ?>
            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo of_get_option('iphoneretinaicon') ?>" >
        <?php } ?>
        <?php if (of_get_option('ipadicon')) { ?>	
            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo of_get_option('ipadicon') ?>" >
        <?php } ?>
        <?php if (of_get_option('ipadretinaicon')) { ?>	
            <link rel="apple-touch-icon" sizes="144x144" href="<?php echo of_get_option('ipadretinaicon') ?>" >	
        <?php } ?>

        <script type="text/javascript">
            var ajaxurl1 = '<?php echo home_url(); ?>/wp-admin/admin-ajax.php';
        </script>



        <?php if (of_get_option('customcss') != '') { ?> 

            <?php load_template(get_template_directory() . '/customcss.php'); ?>

        <?php } ?>

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?> >


        <a href="#" id="gototop"><i class="fa fa-long-arrow-up fa-2x"></i></a>

        <div class="header">
            <div class="container header-inner">

                <nav class="navbar navbar-inverse">  

                    <div class="header-logo">
                        <?php
                        if (of_get_option('logoimg1')) {
                            $logoimg = of_get_option('logoimg1');
                        }
                        if (of_get_option('retinalogo')) {
                            $logoimg = of_get_option('retinalogo');
                        }
                        ?>
                        <a href="<?php echo site_url(); ?>" class="logo">
                            <img src="<?php echo $logoimg; ?>" alt="">
                        </a>					
                    </div>	

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <?php
                    if (!is_page_template('template-home.php')) { ?>
                  
                        <!--menu principal-->
                        <div class="nav-collapse navright"> 
                            <?php
                            wp_nav_menu(array(
                                'menu' => 'main-menu',
                                'theme_location' => 'main-menu',
                                'menu_class' => 'navigation',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                            ));
                            ?>
                        </div>
                  

                    </nav> 																


                </div>


            </div>

            <?php
        }
        ?>	
