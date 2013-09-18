<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
		<header class="page-title">
			<h2><?php the_title();?></h2>
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

