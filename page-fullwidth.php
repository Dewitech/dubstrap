<?php
/**
 * Template Name: FullWidth
 */
get_header(); 

?>
	<?php while ( have_posts() ) : the_post(); ?>
	
		<div class="container">
			<div class="row-fluid">
				<?php if ( function_exists( 'dewitech_breadcrumbs' ) ) dewitech_breadcrumbs(); ?>
			</div><!--/.row -->
		</div><!--/.container -->
   
	<article class="container">
		<header class="page-title">
			<h3><?php the_title();?></h3>
		</header>
        <div class="row content">
				<?php the_content();?>
	<?php endwhile; // end of the loop. ?>
	<?php wp_link_pages( $args ); ?>			
		</div>
	</article>
<?php get_footer(); ?>