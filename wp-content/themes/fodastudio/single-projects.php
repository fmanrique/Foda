<?php
	add_action('wp_head', 'projects_script_header'); 

	get_header();


	// Get the content
	$project = get_project($post->ID);

?>
	<!-- Main Content -->

	<div class="container" style="margin: 0px; padding: 0; padding-top: 60px">
		<div class="row" style="margin: 0px; padding: 0">
			<div style="float: left; margin: 0px; padding: 0">
				<div class="col_title"><p class="txt_title"><?php echo $project['principalservice']->post_title; ?></p></div>
			</div>
			<div class="col-lg-10 col-xs-7 col-sm-10" style="margin: 0px; padding: 0">
				<div class="col-xs-12 col-lg-3 col-sm-6" style="padding: 0px 10px 0px 10px;">
					<p class="txt_title"><?php echo $project['title']; ?></p>
					<?php 
						$descriptions = explode("</p>", $project['description']);
						$description_more = '';
						
						if ( count($descriptions) > 0 ) {
							foreach($descriptions as $key => $description) {
								if ($key > 0) {
									$description_more .= $description . '</p>';
								}
							}

							echo $descriptions[0] . '</p><div id="col_content_extratxt" style="display:none;">' . $description_more . '</p></div>';

						}
					?>
					<p id="col_content_extratxt_expand" class="txt_dark"><a href="#">Read More</a></p>
					<p id="col_content_extratxt_collapse" style="display:none;"><a href="#">Close</a></p>
				</div>

				<div class="col-xs-12 col-lg-3 col-sm-6" style="padding: 0px 10px 0px 10px;">
					<p class="txt_title txt_dark">Brief</p>
					<?php echo $project['brief']; ?>
				</div>

				<div class="col-xs-12 col-lg-3 col-sm-6" style="padding: 0px 10px 0px 10px;">
					<p class="txt_title txt_dark">Services</p>
					<?php echo $project['services']; ?>
				</div>
				<div class="col-xs-12 col-lg-3 col-sm-6" style="padding: 0px 10px 0px 10px;">
					<p class="txt_title txt_dark">Team</p>
					<?php echo $project['team']; ?>
				</div>
			</div>
		</div>

	</div>

	<div class="row" style="padding: 0; margin: 0; padding-top: 80px">
		<?php if (count($project['gallery']) > 0) { ?>
	
		<?php foreach($project['gallery'] as $key => $gallery)  { ?>
		<p><img src="<?php echo $gallery['projects_gallery_image']['url']; ?>" alt="<?php echo $gallery['projects_gallery_title']; ?>" style="width: 100%" /></p>
		<?php } ?>
	
		<?php } ?>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
		 	$('.btn-projects').addClass("active");

		 	$('.navbar-projects').addClass("active");
		 	
		 	
		});
	</script>
	


<?php get_footer(); ?>