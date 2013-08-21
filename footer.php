<?php
/**
 * Footer
 */
?>
	 
		<!-- End Template Content -->
		<!-- Footer -->	
		<footer id="footer" class="footer">
			<div class="container">
				<div class="row-fluid">	
					<?php dynamic_sidebar( 'footer-sidebar-left' ); ?>
					<?php dynamic_sidebar( 'footer-sidebar-center1' ); ?>
					<?php dynamic_sidebar( 'footer-sidebar-center2' ); ?>
					<?php dynamic_sidebar( 'footer-sidebar-right' ); ?>
					
					
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
		<!-- GAID -->
		<?php wp_footer(); ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" charset="utf-8">
		<?php if (get_option('dt_gaid')) { ?>
		// Google Analytics
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo get_option('dt_gaid') ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		<?php } ?>

			
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
		//		  auto_join_text_ed: " we ",
		//		  auto_join_text_ing: " we were ",
		//		  auto_join_text_reply: " we replied ",
		//		  auto_join_text_url: " we were checking out ",
				  loading_text: "loading tweets..."
				});
			  });	
		
		</script> 

	</body>
</html>