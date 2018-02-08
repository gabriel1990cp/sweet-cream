<?php
/*
Display single blog post.
*/
?>
<?php get_header(); ?>
<div class="pagetitle">
			
	<div class="container titleinner">		
		<span class="titlestart">{</span>	
		<div class="maintitle fadeInUp"><?php the_title(); ?></div>
		<span class="titlestart">}</span>		
	</div>	
		
</div>

<div class="container blog-content">					

	<div class="row-fluid">
	
		<div class="span9">
	
			<?php 
			while ( have_posts() ) : the_post(); 
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php comments_template( '', true ); ?>
			<?php paginate_comments_links();?>	
			
			</article>
			
			<?php endwhile;?>

		
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