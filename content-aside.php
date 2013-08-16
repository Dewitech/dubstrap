<?php
/**
 * The template for displaying posts in the Aside post format.
 */
?>
		<header class="page-title">
			<h3><?php the_title();?></h3>
		</header>
        <div class="row content">
			<div class="span8">
				<?php the_content();?>	
			</div>
			
			<div class="span4">
				<?php get_sidebar();?>
			</div>
		</div>
