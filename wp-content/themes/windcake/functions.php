<?php
if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
    define('OPTIONS_FRAMEWORK_URL', get_template_directory_uri() . '/admin/');

    require_once dirname(__FILE__) . '/admin/options-framework.php';
}

// TGM Plugin Activation => https://github.com/thomasgriffin/TGM-Plugin-Activation
require_once ( get_template_directory() . '/functions/recommend-plugins.php' );
require_once ( get_template_directory() . '/functions/wp_bootstrap_navwalker.php' );
require_once ( get_template_directory() . '/functions/widgets.php' );
require_once ( get_template_directory() . '/functions/widget_areas.php' );
require_once ( get_template_directory() . '/functions/page_meta.php' );
require_once ( get_template_directory() . '/functions/blog-functions.php' );
require_once ( get_template_directory() . '/functions/extra-functions.php' );
require_once ( get_template_directory() . '/functions/pagination.php' );


add_action('after_setup_theme', 'windcake_theme_setup');

function windcake_theme_setup()
{

    load_theme_textdomain('windcake', get_template_directory() . '/lang');

    add_action('wp_enqueue_scripts', 'windcake_load_scripts');

    add_theme_support('post-formats', array('gallery', 'image', 'link', 'quote', 'video', 'audio', 'aside', 'chat', 'status'));

    add_theme_support('automatic-feed-links');

    add_theme_support('post-thumbnails');

    add_image_size('portfolio-thumb', 370, 260, true);

    add_image_size('service-icon', 80, 82, true);

    add_image_size('pricing', 156, 162, true);

    add_image_size('testimonial', 155, 155, true);

    register_nav_menus(
            array(
                'left' => 'Left Menu',
                'right' => 'Right Menu',
                'main-menu' => 'Menu top (principal)'
            )
    );
}

function windcake_load_scripts()
{

    /* CSS */

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 'style', true);
    wp_enqueue_style('bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', 'style', true);
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', 'style', true);
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', 'style', true);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', 'style', true);
    wp_enqueue_style('style', get_stylesheet_uri());
    diamondtheme_colorscheme();
    wp_enqueue_style('custom-tema-css', get_template_directory_uri() . '/css/custom-tema.css', 'style', true);

    wp_enqueue_style('raleway-font', 'http://fonts.googleapis.com/css?family=Lily+Script+One');
    wp_enqueue_style('opensans-font', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');


    // Main Scripts
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '2.3', true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-1.7.min.js', array('jquery'), '1.7', true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '2.1', true);
    wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('flowtype', get_template_directory_uri() . '/js/flowtype.js', array('jquery'), '1.0', true);
    wp_enqueue_script('inview', get_template_directory_uri() . '/js/jquery.inview.js', array('jquery'), '1.0', true);
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery'), '5.3.3', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom-main', get_template_directory_uri() . '/js/custom-main.js', array('jquery'), '1.0', true);

    // Comment replies
    if (is_single() || is_page()) {
        wp_enqueue_script('comment-reply');
    }
}

if (!isset($content_width))
    $content_width = 960;

function windcake_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>

    <li>
        <div id="comment-<?php comment_ID(); ?>" class="comment-list">

            <div class="avatar">
                <?php echo get_avatar($comment, $size = '50'); ?>
            </div>

            <div class="comment-area">
                <span class="comment-author"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></span>  <!-- set name here !-->
                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

                <div class="comment-text">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p><em>Your comment is awaiting moderation.</em></p>
                    <?php endif; ?>

                    <?php comment_text() ?>
                </div>

            </div>
        </div>
        <?php
    }

    add_filter('the_category', 'add_nofollow_cat');

    function add_nofollow_cat($text)
    {
        $text = str_replace('rel="category tag"', "", $text);
        return $text;
    }
    ?>
