<?php
/*
Template Name: Blog Page
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
			query_posts(array(
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