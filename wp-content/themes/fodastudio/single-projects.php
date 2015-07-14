<?php
	add_action('wp_head', 'projects_script_header'); 

	get_header();


	// Get the content
	$project = get_project($post->ID);

?>
	<!-- Main Content -->
<div id="maincontent" style="margin-top: 36px">
	<div class="hidden-lg hidden-md hidden-sm" style="margin-top: 10px; height:0px; width:100%"></div>
	<div class="container" style="margin: 0px; padding: 0; width: 100%">
		<div style="margin: 0px; padding: 0; float: left">
			<div class="col-sm-2 col-xs-4" style="margin: 0px; padding: 0px; width: 134px;">
				<div class="col_title"><p class="txt_title"><?php echo $project['principalservice']->post_title; ?></p></div>
			</div>
		</div>
		<div class="col-sm-10 col-xs-7">
			<div class="row" style="padding-left: 0px; padding-top: 0px; padding-right: 0px; margin-right: 0px; margin-top: 0px">
				<div class="col-xs-12 col-sm-6 col-container">
					<div class="col-xs-12 col-B">
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
				
					<div class="col-xs-12 col-B">
						<p class="txt_title txt_dark">Brief</p>
						<?php echo $project['brief']; ?>
					</div>
				</div>
				<div class="col-sm-6 col-container-C">
					<div class="col-xs-12 col-B">
						<p class="txt_title txt_dark">Services</p>
						<?php echo $project['services']; ?>
					</div>
				
					<div class="col-xs-12" style="padding: 0px 12px 0px 12px; width: 200px">
						<p class="txt_title txt_dark">Team</p>
						<?php echo $project['team']; ?>
					</div>
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
</div>

	<script type="text/javascript">
		$(document).ready(function () {
		 	$('.btn-projects').addClass("active");

		 	$('.navbar-projects').addClass("active");
		 	
		 	
		});
	</script>
	


<?php get_footer(); ?>