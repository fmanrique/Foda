<?php 
	$services = get_services();

?>
<div class="clearfooter hidden-xs"></div>
</div>
	<div class="visible-xs" id="copyright" style="width: 100%; text-align: center; position: absolute">
		Copyright &copy; 2015 by fodastudio
	</div>
	<!-- FOOTER --> 

	<div id="footer" class="hidden-xs">
	
		<?php if (count($services) > 0) : ?>
		<div class="col-sm-3 col-xs-4" style="margin: 0px; padding: 0; width: 134px;">
			<div class="col_title"><p class="txt_title" style="padding-top: 22px;">Services</p></div>
		</div>
		
		<div class="container col-sm-10 col-xs-7" style="margin-left: 0px; padding: 0px; margin: 0px;">

			<div style="margin-left: 0px; padding-left:0px; width: 100%; float: left">
				<div class="row" style="padding-left: 0px; padding-right: 0px; margin-right: 0px; padding-top: 22px; margin-left: 0px; width: 100%">
					<?php foreach ($services as $key => $service) {?>
					<div class="col-xs-6 footer-col-B">
						<h1 style="margin: 0; padding: 0; padding-bottom: 4px"><?php echo $service['title']; ?></h1>
					</div>
					<?php } ?>
				</div><!--/row-->
			</div><!--/.col-xs-12.col-sm-9-->
			
			<div class="clear"></div>
		</div><!--/.container-->	
		<?php endif; ?>
	</div>
	
	<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/js/main.js'></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		  $('[data-toggle="offcanvas"]').click(function () {
		    $('.row-offcanvas').toggleClass('active')
		  });
		});
	</script>
</body>
</html>