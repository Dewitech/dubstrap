<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
	<div class="container">
			<div class="row-fluid">
				<?php if ( function_exists( 'dewitech_breadcrumbs' ) ) dewitech_breadcrumbs(); ?>
			</div><!--/.row -->
	</div><!--/.container -->
	
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="container">
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; // end of the loop. ?>
		<div class="row">
			<div class="span12">
				<?php comments_template(); ?>
			</div>	
		</div>
	</article>
	
<?php get_footer(); ?>