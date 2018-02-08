<?php
/**
 * Define sidebars for use in this theme
 */

if ( function_exists('register_sidebar') )
{
	
	register_sidebar( array(
    'name' => __( 'Blog','icon'),
    'id' => 'blog', 
    'before_widget' => '<div class="block %2$s" id="%1$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="sidebartitle">',
    'after_title' => '</div>',
    ) );	

	register_sidebar( array(
    'name' => __( 'HomePage','icon'),
    'id' => 'homepage', 
	'description'   => 'Drag widgets with name starting with "HomePage" in this widget area.',
    'before_widget' => '<div class="block %2$s" id="%1$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="titlestart">{</span><h1 class="fadeInUp">',
    'after_title' => '</h1><span class="titlestart">}</span>',
    ) );	
}

?>