<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
			<div class="span12">
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dubstrap' ), get_search_query() ); ?></h1>
					</header>
			</div>
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="span4 item-cat">
						<header>
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta"><?php _e("Posted", "dubstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "dubstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "dubstrap"); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
						<?php if ( has_post_thumbnail() ) : 
						the_post_thumbnail( 'dubstrap-featured' );
						else :
							the_excerpt();
						endif; 
						?>
						</section> <!-- end article section -->
						
						<footer>
					
						</footer> <!-- end article footer -->
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( '404'); ?>
			<?php endif; ?>
			
		</div><!-- .row -->
		<?php page_navi(); ?>
	</article><!-- article -->
<?php get_footer(); ?>