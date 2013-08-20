<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header"><h1 class="archive_title h2">
							<span><?php _e("Posts By:", "dubstrap"); ?></span> 
							<?php 
								// If google profile field is filled out on author profile, link the author's page to their google+ profile page
								$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
								$google_profile = get_the_author_meta( 'google_profile', $curauth->ID );
								if ( $google_profile ) {
									echo '<a href="' . esc_url( $google_profile ) . '" rel="me">' . $curauth->display_name . '</a>'; 
							?>
							<?php 
								} else {
									echo get_the_author_meta('display_name', $curauth->ID);
								}
							?>
						</h1>
				</div>
			</div>
		
			<?php if ( have_posts() ) : ?>
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
				<?php get_template_part( '404', 'none' ); ?>
			<?php endif; ?>
		</div><!-- /row -->
	</article><!-- article -->
<?php get_footer(); ?>