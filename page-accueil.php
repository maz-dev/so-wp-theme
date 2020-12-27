<?php
  get_header();
?>
<div id="home">
  <div>
    <?php 
      if(!get_query_var( 'page' )) {
    ?>
    <?php get_template_part( 'template-parts/slider' ); ?>
    <?php get_template_part( 'template-parts/manchette' ); ?>
    <?php 
      }
    ?>
    <?php get_template_part( 'template-parts/posts-list' ); ?>
	</div>

	<?php get_template_part( 'template-parts/sidebar' ); ?>




<?php get_footer(); ?>
