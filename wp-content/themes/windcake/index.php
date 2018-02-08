<?php get_header(); ?>

<div class="pagetitle">
			
	<div class="container titleinner">		
		<span class="titlestart">{</span>	
		<div class="maintitle fadeInUp">Blog Roll</div>
		<span class="titlestart">}</span>		
	</div>	
		
</div>

<div class="container blog-content">					

	<div class="row-fluid">
	
		<div class="span12">
	
			<?php query_posts(array(
			'paged' => $paged,
			'ignore_sticky_posts' => 0,
			));
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			<?php get_template_part( 'blogcontent', get_post_format() ); ?>
			
			</article>
			
			<?php endwhile;?>

			<?php else : ?>
			<?php endif; ?>
		
			<div class="pagination">
				<div class="previous"><?php previous_posts_link( __( 'Previous','windcake' ) ); ?></div>
					<?php diamondtheme_pagination();?>
				<div class="next"><?php next_posts_link( __( 'Next','windcake' ) ); ?></div>				
			</div>	
		
		</div>

	
	</div>		

</div>	
			

<?php get_footer(); ?>