<?php

function dt_carousel() {
	register_widget( 'dt_carousel' );
}
add_action( 'widgets_init', 'dt_carousel' );

class dt_carousel extends WP_Widget
{
    function dt_carousel() 
    {
		$widget_ops = array( 
            'classname' => 'dt_carousel', 
            'description' => __( 'This widget show latest portfolio, from portfolio custom post type.', 'dewitech' )
        );

		$control_ops = array( 'id_base' => 'dt_carousel' );

		$this->WP_Widget( 'dt_carousel', __( 'DT Carousel', 'dewitech' ), $widget_ops, $control_ops );   
	}
	
	function form( $instance )
	{
		global $icons_name;   

		$instance = wp_parse_args( (array) $instance ); ?>
		
		<p>
			<label>
				This widget show latest portfolio, from portfolio custom post type.
			</label>
        </p>    
   
		<?php
	}
	
	function widget( $args, $instance )
	{
		extract($args);
		$post = isset($post);
		echo $before_widget;

		?>
		
		<!-- Begin Carousel Slider --> 
		<section class="widget carousel-widget" id="slider-widget">
			<div class="widget-header">
				<h3 class="widget-heading">What's New</h3>
			</div>
			<div class="widget-content carousel slide" id="carousel-widget">
				<!-- Begin Carousel Inner -->
				<div class="carousel-inner">
					<!-- Begin Slide Section / Carousel Item -->
					<div class="slide-section active item">
						<?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 3 );
							$loop = new WP_Query( $args );
							
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_id = get_post_thumbnail_id($post['ID']);
							$url = wp_get_attachment_url( $post_id );
						?>										
						<div class="slide-item media">
							<a class="pull-left media-thumbnail" href="<?php echo $url; ?>">
								<img class="media-object" src="<?php echo $url; ?>" alt="thumbnail" />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
								<p>
									<?php the_excerpt() ?>
								</p> 
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<!-- End Slide Section / Carousel Item -->
					<div class="slide-section item">
						<?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 3, 'offset' => 3 );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_id = get_post_thumbnail_id($post['ID']);
							$url = wp_get_attachment_url( $post_id );
						?>										
						<div class="slide-item media">
							<a class="pull-left media-thumbnail" href="<?php echo $url; ?>">
								<img class="media-object" src="<?php echo $url; ?>" alt="thumbnail" />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
								<p>
									<?php the_excerpt() ?>
								</p> 
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<!-- End Slide Section / Carousel Item -->
					<div class="slide-section item">
						<?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 3, 'offset' => 6);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_id = get_post_thumbnail_id($post['ID']);
							$url = wp_get_attachment_url( $post_id );
						?>										
						<div class="slide-item media">
							<a class="pull-left media-thumbnail" href="<?php echo $url; ?>">
								<img class="media-object" src="<?php echo $url; ?>" alt="thumbnail" />
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
								<p>
									<?php the_excerpt() ?>
								</p> 
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<!-- End Slide Section / Carousel Item -->

				</div>
				<!-- End Carousel Inner -->
			
			</div>
		</section>
		<!-- End Carousel Slider -->
			
			
			
			
			
		<?php

		echo $after_widget;
	}
    function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
}     
?>