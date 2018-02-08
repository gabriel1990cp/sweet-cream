<?php
/**
 * Functions which are required by theme
 */

 
function new_excerpt_more( $more ) {
	return '<div><a href="'.get_permalink().'" class="bloglink">Continue Reading<i class="icon-long-arrow-right"></i></a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

 
	function gallery_slideshow($current_post)
	{
		//search for the first gallery shortcode
		preg_match("!\[gallery.+?\]!", $current_post->post_content, $match_gallery);

		if(!empty($match_gallery))
		{
			$gallery = $match_gallery[0];

			if(strpos($gallery, 'style') === false) $gallery = str_replace("]", " style='big_thumb' size='blog-big']", $gallery);
			//output the gallery
            echo '<div class="flexslider slider2">';
			echo do_shortcode($gallery);
            echo '</div>';
		}
	}
	
	//remove the first gallery shortcode from the content
	function gallery_slideshow_filter($content) {
		//search for the first gallery shortcode
		preg_match("!\[gallery.+?\]!", $content, $match_gallery);

		if(!empty($match_gallery))
		{			
			$content = str_replace($match_gallery[0], "", $content);
		}

		return $content;
	}
	add_filter( 'the_content', 'gallery_slideshow_filter' );

// Modified Gallery Shortcode

add_filter("post_gallery", "wpse56909_post_gallery",10,2);
function wpse56909_post_gallery($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 1,
        'size'       => 'gallery-thumb',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
   
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->";
    $gallery_div = "<ul class='slides'>";
    $output = $gallery_div;

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		
        $output .= "<li>";
        $output .= wp_get_attachment_image($id, 'full');
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</li>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '';
    }

    $output .= "</ul>";

    return $output;
}	

add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='replylink", $class);
    return $class;
}	


// Customize the search form
function style_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . home_url() . '/" >
            <label for="s"></label>
            <div class="searchbox">';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="" name="s" id="s"/>';
    }
    $form .= '<button type="submit" id="searchsubmit" class="fa fa-search fa-lg" ></button>
            </div>
            </form>';
    return $form;
}
add_filter('get_search_form', 'style_search_form');


?>