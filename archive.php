<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Posts Category:", "dubstrap"); ?></span> <?php single_cat_title(); ?>
						</h1>
						<?php if ( category_description() ) : // Show an optional category description ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Posts Tag:", "dubstrap"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Daily Archives", "dubstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Monthly Archives", "dubstrap"); ?>:</span> <?php the_time('F Y'); ?>
						</h1>
					<?php } elseif (is_year()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Yearly Archives", "dubstrap"); ?>:</span> <?php the_time('Y'); ?>
						</h1>
					<?php } ?>
				</div>
			</div>
		<?php get_template_part( 'archive-3columns'); ?>
		</div><!-- /row -->
	</article><!-- #primary -->
<?php get_footer(); ?>