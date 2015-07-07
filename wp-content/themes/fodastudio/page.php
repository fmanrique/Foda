<?php
	get_header();

	?>
	<div class="visible-xs" style="margin-bottom: 0px; height: 10px">&nbsp;</div>
	<?php

	if (have_posts()): while (have_posts()) : the_post(); 

?>

<!-- END BIGSKILLET -->
    <div id="fakeheader" class="background_white"></div>
    <!-- Main Content -->
    
    <?php the_content(); ?>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
