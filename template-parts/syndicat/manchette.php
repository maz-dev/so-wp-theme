<?php
$args_manchette     = array(
	'tag'            => 'manchette-staa',
	'posts_per_page' => 3,
	'orderby'        => 'post_date',
	'order'          => 'DESC',
);
$wp_manchette_query = new WP_Query( $args_manchette );
?>
<div class="manchettes-zone">
  <?php if ( $wp_manchette_query->have_posts() ) : ?>
		<?php
		while ( $wp_manchette_query->have_posts() ) :
			$wp_manchette_query->the_post();
			?>
	  <div class="manchette">
		<div class="manchette-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>
		<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
		<div class="manchette-text">
			<i>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
				</svg>
				<?php 
					$postcat = get_the_category( $post->ID );
					$postcatLength = count($postcat);
					if($postcatLength == 1) {
						echo($postcat[0]->name);
					}
					else {
						for ($i=0; $i<$postcatLength; $i++) {
							if($i == $postcatLength - 1) {
								echo($postcat[$i]->name);
							} else {
								echo($postcat[$i]->name .", ");
							}
						}	
					}
				 ?>
			</i>
			<br>
			<i>
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
				</svg>
				Posté le 
				<?php echo get_the_date(); ?> 
			</i>	
			<?php the_excerpt(); ?>
		  
		</div>
	  </div>     
			<?php
	endwhile;
		?>
</div>

<?php else : ?>
	<p><?php _e( 'Aucun contenu disponible' ); ?></p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
