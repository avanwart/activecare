<?php 
/*
Use this page if you want to create a custom homepage for 
your site. WordPress will look for home.php before index.php. If
you end up using a custom home.php page you can also use the 
blog.php page to display your blog posts. Simply rename or delete
this page template and the latest blog posts(index.php) will be the
homepage of your website. 
*/
?>
<?php get_header(); ?>

<div id="banner" class="home-page">
	<div class="container">
		<div id="inner-content" class="wrap clearfix">
			<div class="jumbotron">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<h1>Hello, world!</h1>
							<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
							<p><a class="btn btn-primary btn-lg">Learn more</a></p>
						</div>
						<div class="col-lg-5">
							<p><img src="<?php echo get_template_directory_uri(); ?>/library/images/flat.png"></p>
						</div>
					</div><!-- end .row-->
				</div> <!-- end .container-->
			</div> <!-- end .jumbotron-->
		</div> <!-- end #inner-content -->
	</div> <!-- end .container-->
</div> <!-- end #banner-->

<div class="container home-three">
	<div class="row">
		<div class="col-lg-4">
			<img class="img-circle" src="http://placehold.it/140x140">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle" src="http://placehold.it/140x140">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img class="img-circle" src="http://placehold.it/140x140">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			<p><a class="btn btn-success" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
		</div><!-- /.col-lg-4 -->
	</div> <!-- end .row-->
</div> <!-- end .container-->

<?php get_footer(); ?>
