<?php
/**
 * The sidebar containing the footer widget area.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
	<div id="secondary" class="span4" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar-page'); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
