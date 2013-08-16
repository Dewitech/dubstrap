<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
		<header class="page-title">
			<h3><?php the_title();?></h3>
		</header>
        <div class="row content">
			<?php the_content();?>			
		</div>
