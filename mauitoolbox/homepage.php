<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<!-- Start: homepage -->
<section class="homepage">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-md-9">
						<?php
						$args = array();
						$myposts = get_posts( $args );
						foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<a class="post-title-styles" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
							<?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
						</a>
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>

					<div class="col-sm-3">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End: homepage -->
<?php get_footer(); ?>