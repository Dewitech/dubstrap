<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
		<div class="span8">
			<div class="page-header">
			<?php if (is_category()) { ?>
				<h1 class="archive_title h2">
					<span><?php _e("Posts Category:", "dubstrap"); ?></span> <?php single_cat_title(); ?>
				</h1>
			<?php } elseif (is_tag()) { ?> 
				<h1 class="archive_title h2">
					<span><?php _e("Posts Tag:", "dubstrap"); ?></span> <?php single_tag_title(); ?>
				</h1>
			<?php } elseif (is_day()) { ?>
				<h1 class="archive_title h2">
					<span><?php _e("Daily Archives:", "dubstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
				</h1>
			<?php } elseif (is_month()) { ?>
				<h1 class="archive_title h2">
					<span><?php _e("Monthly Archives:", "dubstrap"); ?>:</span> <?php the_time('F Y'); ?>
				</h1>
			<?php } elseif (is_year()) { ?>
				<h1 class="archive_title h2">
					<span><?php _e("Yearly Archives:", "dubstrap"); ?>:</span> <?php the_time('Y'); ?>
				</h1>
			<?php } ?>
			</div>
		
			<?php if ( have_posts() ) : ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="content">
							<header>
								
								<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
							
							</header> <!-- end article header -->
						
							<section class="post_content">
							
								<?php the_post_thumbnail( 'dubstrap-thumb-300' ); ?>
							
								<?php the_excerpt(); ?>
						
							</section> <!-- end article section -->
							
							<footer>
						
							</footer> <!-- end article footer -->
					</div>
				<?php endwhile; ?>

				<?php page_navi(); ?>

			<?php else : ?>
				<?php get_template_part( '404', 'none' ); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
		</div><!-- /row -->
	</article><!-- #primary -->
<?php get_footer(); ?>