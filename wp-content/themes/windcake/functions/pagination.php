<?php
/**
 * Custom pagination function
*/

function diamondtheme_pagination($pages = '', $range = 4) {
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
	 
     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }  
 
     if(1 != $pages) {
		echo "<div class='pages'><span>Pages : </span>";
         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current outer\"><span class=\"inner\">".$i."</span></span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\"><span class=\"inner\">".$i."</span></a>";
             }
         }
		echo "</div>";		 
     }
}


function paginate() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
	$pagination = array(
		'base' => esc_url(add_query_arg('page','%#%')),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'list',
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;'
		);
	
	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	
	echo paginate_links( $pagination );
}

add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');
/**
 * Add prev and next links to a numbered link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; # exit early

    $args['next_or_number'] = 'number'; # keep numbering for the main part
    if (!$more)
        return $args; # exit early

    if($page-1) # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
        ;

    if ($page<$numpages) # there is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after']
        ;

    return $args;
}
?>