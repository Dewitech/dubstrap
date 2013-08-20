<?php
/**
 * Footer
 */
?>
	 
		<!-- End Template Content -->
		<!-- Footer -->	
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">	
					<?php dynamic_sidebar( 'footer-sidebar-left' ); ?>
					<?php dynamic_sidebar( 'footer-sidebar-center1' ); ?>
					<?php if ( ! dynamic_sidebar( 'footer-sidebar-center2' ) ) : ?>
					<div class="span3 widget-contact">
						<h4>CONTACT</h4>	
						<ul class="nav nav-list listy">
							<li><i class="icon-map-marker"></i><?php echo get_option('dt_addr'); ?></li>
							<li><i class="icon-envelope"></i> <a href="mailto:<?php echo get_option('dt_footmail'); ?>"><?php echo get_option('dt_footmail'); ?></a></li>
							<li><i class="icon-phone-sign"></i> <?php echo get_option('dt_footphone'); ?></li>
						</ul>
					</div>
					<?php endif; // end sidebar widget area ?>
					
					
					<?php if ( ! dynamic_sidebar( 'footer-sidebar-right' ) ) : ?>
					<div class="span3 widget-flickr">
						<h4>FLICKR</h4>				
						<div id="flickr_badge_wrapper" class="clearfix">
							<script src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=Random&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('dt_flickrstr') ?>"></script>
						</div>
					</div>
					<?php endif; // end sidebar widget area ?>
					
					
				</div>
			</div><!-- /.container -->
			
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="span12">
							<div class="footer-copyright">&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?> | <?php echo get_option('dt_footcopy'); ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</footer>	
		
		<?php wp_footer(); ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" charset="utf-8">
		/*	jQuery(document).ready(new function() {

				jQuery("#map").gMap({
					controls: false,
					scrollwheel: true,
					maptype: '<?php echo get_option('dt_maptype') ?>',
					address: '<?php echo get_option('dt_mapaddr') ?>, <?php echo get_option('dt_mapprov') ?>,<?php echo get_option('dt_mapcountry') ?>',
					markers: [
						{
							address: '<?php echo get_option('dt_mapaddr') ?>, <?php echo get_option('dt_mapprov') ?>,<?php echo get_option('dt_mapcountry') ?>',
							html: '<?php echo get_option('dt_mapaddr') ?>, <?php echo get_option('dt_mapprov') ?>,<?php echo get_option('dt_mapcountry') ?>',
							popup: true
						}
							],
					address: '<?php echo get_option('dt_mapaddr') ?>, <?php echo get_option('dt_mapprov') ?>,<?php echo get_option('dt_mapcountry') ?>',
					zoom: <?php echo get_option('dt_mapzoom') ?>
				});
				
			});
		*/
		// Twitter Setting
			  jQuery(function($){
				$(".timeline").tweet({
				  join_text: "auto",
				  modpath: "<?php bloginfo( 'url' ); ?>/wp-content/themes/dubstrap/includes/twitter/twitter.php", 
				  username: "<?php echo get_option("dt_soctwit") ?>",
				  avatar_size: 48,
				  count: 1,
				  auto_join_text_default: " we said, ",
				  auto_join_text_ed: " we ",
				  auto_join_text_ing: " we were ",
				  auto_join_text_reply: " we replied ",
				  auto_join_text_url: " we were checking out ",
				  loading_text: "loading tweets..."
				});
			  });	

		</script> 

	</body>
</html>