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
						<div class="span6">
							<div class="footer-copyright">&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?> | <?php echo get_option('dt_footcopy'); ?>
							</div>
						</div>
						<div class="span6">
							<ul class="social-icons pull-right">
								<?php if (get_option('dt_facebook')) { ?>
											<li><a href="http://facebook.com/<?php echo get_option('dt_facebook') ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" rel="tooltip"><i class="icon-facebook"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_twitter')) { ?>
											<li><a href="http://twitter.com/<?php echo get_option('dt_twitter') ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter" rel="tooltip"><i class="icon-twitter"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_gplus')) { ?>
											<li><a href="<?php echo get_option('dt_gplus') ?>" rel="me" target="_blank"><i class="icon-google-plus"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_github')) { ?>
											<li><a href="http://github.com/<?php echo get_option('dt_github') ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Github" rel="tooltip"><i class="icon-github-alt"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_linkedin')) { ?>
											<li><a href="<?php echo get_option('dt_linkedin') ?>" target="_blank"><i class="icon-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin" rel="tooltip"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_youtube')) { ?>
											<li><a href="http://youtube.com/user/<?php echo get_option('dt_youtube') ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube" rel="tooltip"><i class="icon-youtube"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_pinterest')) { ?>
											<li><a href="http://pinterest.com/<?php echo get_option('dt_pinterest') ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest" rel="tooltip"><i class="icon-pinterest"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_tumblr')) { ?>
											<li><a href="<?php echo get_option('dt_tumblr') ?>" target="_blank"><i class="icon-tumblr" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tumblr" rel="tooltip"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_instagram')) { ?>
											<li><a href="<?php echo get_option('dt_instagram') ?>" target="_blank"><i class="icon-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram" rel="tooltip"></i></a></li>
								<?php } ?>
								<?php if (get_option('dt_foursquare')) { ?>
											<li><a href="<?php echo get_option('dt_foursquare') ?>" target="_blank"><i class="icon-foursquare" data-toggle="tooltip" data-placement="top" title="" data-original-title="Foursquare" rel="tooltip"></i></a></li>
								<?php } ?>
								<?php if (get_option('stackexchange')) { ?>
											<li><a href="<?php echo get_option('stackexchange') ?>" target="_blank"><i class="icon-stackexchange" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stackexchange" rel="tooltip"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</footer>	
		<!-- GAID -->
		<?php wp_footer(); ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
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
				  username: "<?php echo get_option("dt_twitter") ?>",
				  avatar_size: 48,
				  count: 1,
		//		  auto_join_text_default: " we said, ",
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