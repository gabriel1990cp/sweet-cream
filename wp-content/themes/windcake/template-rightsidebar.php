<?php
/*
Template Name: Page with Right Sidebar
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
			
			<div class="contenttext">
			
				<?php
				the_content();
				?>
			
			</div>
			
			<?php
			endwhile;
			
			?>
		
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