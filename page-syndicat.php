
<?php
/*
 * Template Name: Page de syndicat
 * description: >-
Page de syndicat pour faire un sous-site
 */
get_header();
?>
<div id="home">
  <div>
    <?php
if (!get_query_var('page')) {
    ?>
    <?php get_template_part('template-parts/syndicat/manchette');?>
    <?php
}
?>
    <?php get_template_part('template-parts/syndicat/posts-list');?>
	</div>

	<?php get_template_part('template-parts/syndicat/sidebar');?>




<?php get_footer();?>
