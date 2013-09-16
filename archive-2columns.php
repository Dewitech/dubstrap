<?php if ( have_posts() ) : ?>
	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="span6 item-cat2">
				<header>
					
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
					<ul class="meta">
						<li><i class="icon-user"></i> <?php the_author_posts_link(); ?></li>
						<li><i class="icon-calendar-empty"></i> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F j, Y'); ?></time></li>
						<li><i class="icon-folder-open-alt"></i><?php the_category(', '); ?>.</li>
					</ul>
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
	<div class="span12">
		<?php page_navi(); ?>
	</div>
<?php else : ?>
	<?php get_template_part( '404', 'none' ); ?>
<?php endif; ?>


