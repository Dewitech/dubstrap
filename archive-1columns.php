		<div class="span8">			
			<?php if ( have_posts() ) : ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="content">
							<header>
								
								<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<p class="meta"><?php _e("Posted", "dubstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php the_date(); ?></time> <?php _e("by", "dubstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "dubstrap"); ?> <?php the_category(', '); ?>.</p>
							
							</header> <!-- end article header -->
						
							<section class="post_content">
							
								<?php the_post_thumbnail( 'dubstrap-featured' ); ?>
							
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