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
			<h2><?php the_title();?></h2>
			<ul class="meta">
				<li><i class="icon-user"></i> <?php the_author_posts_link(); ?></li>
				<li><i class="icon-calendar-empty"></i> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F j, Y'); ?></time></li>
			</ul>
		</header>
        <div class="row content">
				<?php the_content();?>
	<?php endwhile; // end of the loop. ?>
	<?php wp_link_pages( $args ); ?>			
		</div>
	</article>
<?php get_footer(); ?>