<?php
	add_action('wp_head', 'index_script_header'); 

	get_header();

	$news = get_news(4);
	$sliders = get_sliders();

	/*echo "<pre>";
	print_r($sliders);
	echo "</pre>";

	die;*/
?>
	<!-- END BIGSKILLET -->
	<!-- Main Content -->

	<div id="maincontent">
		<div class="home_image_block">
			<!-- SLIDESHOW -->
			<div id="slideshow">
				 <img src="http://www.fodastudio.com/images/slideshowspacer2.jpg" style="position: relative;" width="100%" class="home_image_block_img img-responsive" />
				 <div class="hidden-xs">
					 <div id="slideshow_back">
							<div class="slideshow_relative">
								<div class="distance"></div>
								<div class="arrow_container"><a href="#" class="slideshow_button" id="slideshow_back_button"><img id="arrow_backward" src="http://www.fodastudio.com/images/arrow_backward_light.png" class="img-responsive" /></a></div>
								<div class="clear"></div>
							</div>
					 </div>
					 <div id="slideshow_forward">
							<div class="slideshow_relative">
								<div class="distance"></div>
								<div class="arrow_container"><a href="#" class="slideshow_button" id="slideshow_forward_button"><img id="arrow_forward" src="http://www.fodastudio.com/images/arrow_forward_light.png" class="img-responsive" style="max-width: 124px; max-height: 124px;" /></a></div>
								<div class="clear"></div>
							</div>
					 </div>
				 </div>
				 
				 <div id="slideshow_proper">
				 	<style>
				 	<?php foreach($sliders as $key => $slider) : ?>
						a.txt_dark_custom<?php echo $key; ?>:active {
							color: <?php echo $slider['header_color'] == "" ? "#000000" : $slider['header_color']; ?> !important; 
						}

						a.txt_dark_custom<?php echo $key; ?>:visited {
							color: <?php echo $slider['header_color'] == "" ? "#000000" : $slider['header_color']; ?> !important; 
						}

						a.txt_dark_custom<?php echo $key; ?>:hover {
							color: <?php echo $slider['header_color_hover'] == "" ? "#00AEEF" : $slider['header_color_hover']; ?> !important;
						}
					<?php endforeach; ?>
					</style>

					<?php foreach($sliders as $key => $slider) : ?>
					
					<div class=" <?php echo ($key == 0) ? 'active' : 'notactive' ?>">

						<a href="<?php echo $slider['url']; ?>">
							<div class="home_slide" style="background-image: url(<?php echo $slider['image']['url']; ?>);"></div>
						</a>
						<!-- CATEGORIES LIGHT/DARK IF STATEMENT-->
						<p class="txt_dark hidden-xs slider_title" style="display: none; z-index: 10000; top: 30px; padding-top: 0px; padding-left: 2px"><a href="<?php echo $slider['url']; ?>" class="txt_dark2 txt_dark_custom<?php echo $key; ?>"><?php echo $slider['header_title']; ?> <span class="ss-link txt_dark_custom<?php echo $key; ?>"><?php echo $slider['header_subtitle']; ?></span></a></p>
						<div class="visible-xs">
							<a href="<?php echo $slider['url']; ?>" class="txt_dark2" style="z-index: 1000; font-size: 18px; padding-top: 42px; position: absolute; padding-left: 12px"><?php echo $slider['header_title']; ?> <span class="ss-link" style="font-size: 10px"><?php echo $slider['header_subtitle']; ?></span></a>
						</div>
						
					</div>

					<?php endforeach; ?>
					
				</div>

			</div>
			<!-- END OF SLIDESHOW -->
		</div>
	</div>

	<?php if (count($news) > 0) : ?>
	<?php 
		/*echo "<pre>";
		print_r($news);
		echo "</pre>";
		die;*/
	?>

	<div class="container hidden-xs" style="margin: 0px; padding: 0; width: 100%">
		<div style="margin: 0px; padding: 0">
			<div class="col-sm-2 col-xs-3" style="margin: 0px; padding: 0; width: 134px;">
				<div class="col_title"><p class="txt_title">News</p></div>
			</div>
			<div class="col-sm-10 col-xs-8">
				<div class="row" style="padding-left: 0px; padding-right: 0px; margin-right: 0px">
					<?php foreach ($news as $key => $new) :?>
					<?php 
						$new_detail = '';
						if (strlen($new['details']) > 800) { 
							$details = explode('</p>', $new['details']);

							for($i = 0; $i<=count($details); $i++) {
								if (strlen($new_detail) + strlen($details[$i]) <= 800) {
									$new_detail = $new_detail.$details[$i].'</p>';
								} else {
									$i = count($details) + 1;
								}
							}

							if (strlen($new_detail) == 0) {
								$new_detail = $new_detail.$details[0].'</p>';
							}
						} else {
							$new_detail = $new['details'];
						}
					?>
					<div class="col-xs-12 col-sm-6" style="padding: 0px 12px 0px 12px; width: 250px;">
						<p class="txt_title"><?php echo $new['title']; ?></p>
						<p class="txt_dark"><?php echo $new_detail; ?></p>
						<p class="txt_dark"><a href="/news">See All News Items</a></p>
					</div>
					<?php endforeach; ?>
				</div><!--/row-->
			</div>
		</div>
	</div>
	<?php endif; ?>

	<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName('script')[0];
	a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0004/9518.js";
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			h=$(window).height();
			w=$(window).width();
			if (w < 768 ) {
				$('#copyright').css('top',h-30)
				h -= 80;
			}
			$('.home_slide').width(w).height(h);
			$('#maincontent').height(h+40);

			row_pos = Math.floor($('.home_slide').height() / 2) - 62;
			if (row_pos <= 0) {
				row_pos = '50%';
			} else {
				row_pos = row_pos+"px";
			}

		 	$('.slideshow_relative').css({ 'top': row_pos });
		 	$('.slideshow_relative').show();

		 	$('.btn-foda').addClass("active");

		 	$('.slider_title').delay( 500 ).fadeIn( 400 );
		});

		$( window ).resize(function() {
		  	h=$(window).height();
			w=$(window).width();

			if (w < 768 ) {
				$('#copyright').css('top',h-30)
				h -= 80;
			}
			$('.home_slide').width(w).height(h);
			$('#maincontent').height(h+40);

			row_pos = Math.floor($('.home_slide').height() / 2) - 62;
			if (row_pos <= 0) {
				row_pos = '50%';
			} else {
				row_pos = row_pos+"px";
			}

		 	$('.slideshow_relative').css({ 'top': row_pos });
		 	$('.slideshow_relative').show();

		 	$('.btn-foda').addClass("active");
		});
	</script>

<?php get_footer(); ?>



<?php 
function index_script_header(){ ?>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/jquery.touchwipe.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slideshow.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/page_visit.js"></script>
<?php 
} 