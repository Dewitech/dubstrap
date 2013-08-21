<?php
/**
 * The template for displaying posts in the Aside post format.
 */
?>
		<header class="page-title">
			<h3><?php the_title();?></h3>
			<ul class="meta">
				<li><i class="icon-user"></i> <?php the_author_posts_link(); ?></li>
				<li><i class="icon-calendar-empty"></i> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F j, Y'); ?></time></li>
				<li><i class="icon-folder-open-alt"></i><?php the_category(', '); ?>.</li>
			</ul>
		</header>
        <div class="row content">
			<div class="span8">
				<?php the_content();?>	
			</div>
			
			<div class="span4">
				<?php get_sidebar();?>
			</div>
		</div>
