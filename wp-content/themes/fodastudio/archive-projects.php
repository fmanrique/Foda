<?php
	add_action('wp_head', 'projects_script_header'); 
	get_header();
?>

<!-- END BIGSKILLET -->
	<div class="container" style="margin: 0px; padding: 0px 0px 0px 134px">
		<div class="col-sm-12" style="margin: 0px; padding: 0">
			<div class="row" style="margin: 0px; padding: 0">
				<div class="col_promotxt txt_dark hidden-xs" style="padding: 40px 0px 40px 12px;  margin: 0px">
					<p>No ‘brand’ is designed. Brands are discovered, <br />
					expressed or developed. Like promises, they <br />
					must be unambiguous and honestly shared.</p>
				</div>
				<div class="col_promotxt_xs txt_dark hidden-lg hidden-md hidden-sm" style="padding: 20px 10px 20px 12px;  margin: 0px;">
					<p>No ‘brand’ is designed. Brands are discovered, expressed or developed.  Like promises, they must be unambiguous and honestly shared.</p>
				</div>
			</div>	
		</div>
	</div>	
	<!-- Main Content -->

	<div class="container" style="margin: 0px; padding: 0px 0px 0px 134px">
		<div class="col-sm-12" style="margin: 0px; padding: 0">
			<div class="clearfix" style="margin: 0px; padding: 0" >
				<div id="project-thumbs" class="col-sm-12 col-xs-10 clearfix" style="margin: 0px; padding: 0;">
					<ul>
						<?php while (have_posts()) : the_post();  ?>

						<?php $project = get_project($post->ID); ?>

						<li><a href="<?php echo $project['permalink']; ?>"><span><?php echo $project['title']; ?></span><img class="lazy img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/lazy.png" data-original="<?php echo $project['image']['url']; ?>" alt=""></a></li>

						<?php endwhile; ?>
					</ul>
				</div>
			</div>	
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
		 	$('.btn-projects').addClass("active");
		 	$('.navbar-projects').addClass("active");
		});
	</script>

<?php get_footer(); ?>