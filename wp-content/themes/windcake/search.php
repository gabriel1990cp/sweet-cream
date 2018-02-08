<?php
/*
Search Page
 */

get_header(); ?>


		<?php  ?>

<div class="pagetitle">
			
	<div class="container titleinner">		
		<span class="titlestart">{</span>	
		<div class="maintitle fadeInUp"><?php printf( __( 'Search Results for: %s', 'windcake' ), get_search_query() ); ?></div>
		<span class="titlestart">}</span>		
	</div>	
		
</div>		


<div class="container blog-content">					

	<div class="row-fluid">
	
		<div class="span9">
			
			<?php 
			
			if ( have_posts() ) :
			
			while ( have_posts() ) : the_post(); 
			?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			
				<?php get_template_part( 'blogcontent', get_post_format() ); ?>
			
			</article>
			
			<?php
			endwhile;

			else :
			?>
				<h1 class="page-title"><?php _e( 'Nothing Found', 'windcake' ); ?></h1>
				
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentythirteen' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'twentythirteen' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentythirteen' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>				
				
			<?php
			endif;
			
			?>
		
			<div class="pagination">
				<?php paginate();?>			
			</div>			
		
		</div>
		
		<div class="span3 sidebar">
				<?php if ( is_active_sidebar( 'Blog' ) ) : ?>
					<?php dynamic_sidebar( 'Blog' ); ?>
				<?php else : ?>
				<?php endif; ?>			
		</div>
	
	</div>		

</div>	



<?php get_footer(); ?>