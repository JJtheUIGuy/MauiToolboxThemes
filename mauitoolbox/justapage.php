<?php
/*
Template Name: Just a page
*/
?>
<?php get_header(); ?>

<!-- Start: homepage -->
<section class="homepage">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php the_content('');?>
			</div>

			<div class="col-sm-4">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Sidebar Ad -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-3278097137645196"
				     data-ad-slot="8545420661"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			<?php get_sidebar(); ?>	
			</div>
		</div>
	</div>
</section>
<!-- End: homepage -->
<?php get_footer(); ?>