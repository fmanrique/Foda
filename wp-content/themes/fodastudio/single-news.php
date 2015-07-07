<?php
	//add_action('wp_head', 'projects_script_header'); 
	get_header();
?>

<!-- END BIGSKILLET -->


	<?php if (have_posts()): ?>


	<div class="container" style="margin: 0px; padding: 0">
		<div class="col-sm-12" style="margin: 0px; padding: 0">
			<div class="row" style="margin: 0px; padding: 0">
				<div class="col_promotxt txt_dark hidden-xs" style="padding: 40px 0px 40px 115px;  margin: 20px 0px 10px 0px;">
					<p><?php echo the_title(); ?></p>
				</div>
				<div class="col_promotxt_xs txt_dark hidden-lg hidden-md hidden-sm" style="padding: 10px 10px 10px 10px;  margin: 20px 0px 0px 0px;">
					<p><?php echo the_title(); ?></p>
				</div>
			</div>	
		</div>
	</div>	

	<div class="container" style="margin: 0px; padding: 0">
		<div class="col-sm-8" style="margin: 0px; padding: 0">
			<?php while (have_posts()) : the_post();  ?>
			<?php $new = get_new($post->ID); ?>

			
			<div class="row" style="margin: 0px; padding: 0">
				<div class="col-sm-2 col-xs-3" style="margin: 0px; padding: 0; width: 100px;">
					<div class="col_title"><p class="txt_title">News</p></div>
				</div>
				<div class="col-sm-9 col-xs-8">
					<img style="margin-bottom:12px" src="<?php echo $new['image']['url']; ?>" style="max-width: 476px" class="img-responsive" />
					<p><span class="txt_date"><?php $date = date_create($new['newsdate']); echo date_format($date, 'm.d.y'); ?></span></p>
					<?php echo $new['details']; ?>
				</div>
			</div>	
			<?php endwhile; ?>

		</div>
		<div class="col-sm-2">
			<div class="row hidden-xs">
				<div class="col_content txt_grey">
		            <div class="twitter_box">Tweets</div>
	            </div>
			</div><!--/row-->
		</div>
		
	</div>


	<?php endif; ?>	
	

<?php get_footer(); ?>