<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php
			$args_slider       = array(
				'tag'            => 'carrousel',
				'orderby'        => 'post_date',
				'order'          => 'DESC',
			);
			$wp_slider_query = new WP_Query( $args_slider );
		?>
		<?php if ( $wp_slider_query->have_posts() ) : ?>
			<?php
				while ( $wp_slider_query->have_posts() ) :
				$wp_slider_query->the_post();
			?>
				<div class="swiper-slide">
					<?php the_post_thumbnail( 'full' ); ?>
					<div class="title">
						<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
					</div>
					
				</div>	
			<?php
	endwhile;
		?>
		<?php else : ?>
			<p><?php _e( 'Aucun contenu disponible' ); ?></p>
		<?php endif; ?>
	</div>
	<div class="swiper-pagination"></div>

	<!-- If we need navigation buttons -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>

	<!-- If we need scrollbar -->
</div>
<?php wp_reset_postdata(); ?>


<script>
var mySwiper = new Swiper('.swiper-container', {
  direction: 'horizontal',
	cssWidthAndHeight: true,
  loop: true,

  
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  
})
</script>
