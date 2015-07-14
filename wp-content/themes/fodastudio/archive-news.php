<?php
	//add_action('wp_head', 'projects_script_header'); 
	get_header();
	$news = get_news();
?>

<!-- END BIGSKILLET -->
	<!-- Main Content -->

<div id="maincontent">
	<?php if (have_posts()): ?>
	<div class="container" style="margin: 0px; padding: 0">
		<div class="col-sm-12" style="margin: 0px; padding: 0">
			<div class="row" style="margin: 0px; padding: 0">
				<div class="col_promotxt txt_dark hidden-xs" style="padding: 36px 0px 40px 146px;  margin: 0px">
					<p><?php echo the_title(); ?></p>
				</div>
				<div class="col_promotxt_xs txt_dark hidden-lg hidden-md hidden-sm" style="padding: 42px 10px 20px 146px;  margin: 0px">
					<p><?php echo the_title(); ?></p>
				</div>
			</div>	
		</div>
	</div>	

	<div class="container" style="margin: 0px; padding: 0">
		<div class="col-sm-11" style="margin: 0px; padding: 0">
			<?php $new = get_new($post->ID); ?>
			<?php foreach($news as $key => $new): ?>

			<?php if ($key == 0) : ?>
			<div class="row" style="margin: 0px; padding: 0; padding-bottom: 20px">
				<div class="col-sm-3 col-xs-4" style="margin: 0px; padding: 0px; width: 134px;">
					<div class="col_title"><p class="txt_title">News</p></div>
				</div>
				<div class="col-sm-9 col-xs-7 col-container" style="margin: 0px; padding: 0px 0px 0px 12px; ">
					<img style="margin-bottom:12px" src="<?php echo $new['image']['url']; ?>" style="max-width: 500px" class="img-responsive" />
					<p class="txt_title"><span class="txt_date"><?php $date = date_create($new['newsdate']); echo date_format($date, 'm.d.y'); ?></span></p>
					<?php echo $new['details']; ?>
				</div>
			</div>	
			<?php else: ?>
			<div class="row" style="margin: 0px; padding: 0; padding-bottom: 20px">
				<div class="col-sm-3 col-xs-4" style="margin: 0px; padding: 0px;  width: 134px;">
					<div class="col_title"><p class="txt_title"><span class="txt_date"><?php $date = date_create($new['newsdate']); echo date_format($date, 'm.d.y'); ?></span></p></div>
				</div>
				<div class="col-sm-9 col-xs-7 col-container" style="margin: 0px; padding: 0px 0px 0px 12px; ">
					<img style="margin-bottom:12px" src="<?php echo $new['image']['url']; ?>" style="max-width: 500px" class="img-responsive" />
					<p><span class="txt_title"><?php echo the_title(); ?></span></p>
					<?php echo $new['details']; ?>
				</div>
				<div class="clear"></div>
			</div>	
			<?php endif; ?>
			
			<?php endforeach; ?>

		</div>
		<div class="col-sm-1 hidden-xs" style="float: left; position: absolute; left: 617px">
			<div class="row hidden-xs">
				<div class="col_content txt_grey">
		            <div class="twitter_box">Tweets</div>
	            </div>
			</div><!--/row-->
		</div>
		
	</div>
	<?php endif; ?>	
</div>

	

<?php get_footer(); ?>