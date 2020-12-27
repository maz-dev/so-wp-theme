<div id="sidebar">


  <div id="sidebar-contact">
		<button><a href="/contact">Nous contacter / Se syndiquer</a></button>
  </div>

	<hr />
  <div id="sidebar-campagne">
		<h5>CAMPAGNE</h5>
		<?php
			$args_campagne       = array(
				'category_name'       => 'campagne',
				'orderby'        => 'post_date',
				'order'          => 'DESC',
			);
			$the_query = new WP_Query( $args_campagne );
		if ( $the_query->have_posts() ) :
			?>
		<ul id="sidebar-campagne-list">
			<?php
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				?>
			<li>
				<?php 
					$value = get_field( "vignette" );
					if($value) {
					?>
								<a href="<?php the_permalink(); ?>">
						<?php
						echo('<img src="'. $value["url"].'" />');
						?>
						<a>
					<?php
					}		
				?>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Aucun contenu disponible' ); ?></p>
		<?php endif; ?>
  </div>

		<div class="syndicats-sidebar">
	  <h5>NOS SYNDICATS</h5>

		<?php
			wp_nav_menu( array( 
					'theme_location' => 'syndicats-menu', 
					'container_class' => 'syndicats-sidebar-list' ) ); 
			?>
		
	</div>
  </div>
</div>
