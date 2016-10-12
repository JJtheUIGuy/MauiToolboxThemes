<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- (Extrenal) Default Maui Style Sheets =========== -->
	<?php wp_head(); ?>
	</head>
		<body>
			<!-- Start: head-banner -->
			<section class="head-banner">
				<div class="container">
					<div class="row">
						 <div class="col-sm-12">
						 	<a href="#">
						 		<img src="http://dummyimage.com/200x100/f00/fff" class="img-responsive">
						 	</a>
						 </div>
					</div>
				</div>
			</section>
			<!-- End: head-banner -->
			<nav>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">

							<nav class="navbar navbar-default" role="navigation">
							    <div class="container-fluid">
							        <!-- Brand and toggle get grouped for better mobile display -->
							        <div class="navbar-header">
							            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							                <span class="sr-only">Toggle navigation</span>
							                <span class="icon-bar"></span>
							                <span class="icon-bar"></span>
							                <span class="icon-bar"></span>
							            </button>
							        </div>
							        <!-- Collect the nav links, forms, and other content for toggling -->
							        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							        	<?php /* Primary navigation */
										wp_nav_menu( array(
										  'menu' => 'mainmenu',
										  'depth' => 2,
										  'container' => false,
										  'menu_class' => 'nav navbar-nav',
										  //Process nav menu using our custom nav walker
										  'walker' => new wp_bootstrap_navwalker())
										);
										?>
									</div>
								</div><!-- /.navbar-collapse -->
							</nav>
						</div>
					</div>
				</div>
			</nav>
