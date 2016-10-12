<?php get_header(); ?>
<!-- Start: postpage -->
<section class="postpage">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<section id="content" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
				<?php endwhile; endif; ?>
				<footer class="footer">
				</footer>
				</section>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!-- End: postpage -->
<?php get_footer(); ?>