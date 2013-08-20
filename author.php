<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<article class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header"><h1 class="archive_title h2">
							<span><?php _e("Posts By:", "dubstrap"); ?></span> 
							<?php 
								// If google profile field is filled out on author profile, link the author's page to their google+ profile page
								$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
								$google_profile = get_the_author_meta( 'google_profile', $curauth->ID );
								if ( $google_profile ) {
									echo '<a href="' . esc_url( $google_profile ) . '" rel="me">' . $curauth->display_name . '</a>'; 
							?>
							<?php 
								} else {
									echo get_the_author_meta('display_name', $curauth->ID);
								}
							?>
						</h1>
				</div>
			</div>
		
			<?php
				// declare variable before get_template_part
				$layout = get_option(dt_layout);
			
				// call global $layout from inside the template part
				global $layout;
				get_template_part($layout);
			?>
		</div><!-- /row -->
	</article><!-- article -->
<?php get_footer(); ?>