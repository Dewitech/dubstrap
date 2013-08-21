		<div class="span8">			
			<?php if ( have_posts() ) : ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="content">
							<header>
								
								<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								
								<ul class="meta">
									<li><i class="icon-user"></i> <?php the_author_posts_link(); ?></li>
									<li><i class="icon-calendar-empty"></i> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F j, Y'); ?></time></li>
									<li><i class="icon-folder-open-alt"></i><?php the_category(', '); ?>.</li>
								</ul>
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