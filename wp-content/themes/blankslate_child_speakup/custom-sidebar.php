<div class="container">
	<div class="row mb-2">
		<div class="col-md-9">
			<h4 class="text-primary-emphasis py-2">Upcoming sessions</h4>

			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args  = [
				'post_type'      => 'post',
				'posts_per_page' => 4,
				'paged'          => $paged,
			];

			$query = new WP_Query( $args );
			if ( $query->have_posts() ): ?>
				<div class="row">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-6 d-flex ">
							<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
								<div class="col-auto d-none d-lg-block">
									<img src="<?= get_the_post_thumbnail_url() ?>" alt="thumbnail"
									     class="img-fluid"
									>
								</div>
								<div class="col p-4 d-flex flex-column position-static">
									<strong class="d-inline-block mb-2 text-primary-emphasis"><?= get_the_category( $query->post->ID )[0]->name ?></strong>
									<h3 class="mb-0"><?= the_title() ?></h3>
									<div class="mb-1 text-body-secondary"><?= get_the_date() ?></div>
									<p class="card-text mb-auto">
										<?php echo truncate_text(get_the_excerpt(), 30) ?>
									</p>
									<a href="<?= get_permalink() ?>"
									   class="icon-link gap-1 icon-link-hover stretched-link">
										Continue reading
										<i class="fas fa-chevron-right"></i>
									</a>
								</div>

							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php
				$total_pages = $query->max_num_pages;

				if ( $total_pages > 1 ) {

					$current_page = max( 1, get_query_var( 'paged' ) );

					echo paginate_links( array(
						'base'      => get_pagenum_link( 1 ) . '%_%',
						'format'    => '/page/%#%',
						'current'   => $current_page,
						'total'     => $total_pages,
						'prev_text' => __( '« prev' ),
						'next_text' => __( 'next »' ),
					) );
				}
				?>


			<?php else: ?>
				<div>No Posts Found</div>
			<?php endif;
			wp_reset_postdata(); ?>
		</div>
		<div class="col-md-3">
			<!--  Search Form -->
			<?php get_search_form() ?>

			<!-- Categories with POst Count badge -->
			<h4 class="text-primary-emphasis py-2">Categories</h4>
			<ul class="list-group">
				<?php
				$categories = get_categories();
				foreach ( $categories as $category ) {
					echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
					echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
					echo '<span class="badge bg-primary rounded-pill">' . $category->count . '</span>';
					echo '</li>';
				}
				?>
			</ul>

			<!-- Tags with Post Count badge -->
			<!--                    <h4 class="text-primary-emphasis py-2">Tags</h4>-->
			<!--                    <ul class="list-group">-->
			<!--                        --><?php
			//                        $tags = get_tags();
			//                        foreach ( $tags as $tag ) {
			//                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
			//                            echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a>';
			//                            echo '<span class="badge bg-primary rounded-pill">' . $tag->count . '</span>';
			//                            echo '</li>';
			//                        }
			//                        ?>
			<!--                    </ul>-->

			<!-- Archives  -->
			<h4 class="text-primary-emphasis py-2">Archives</h4>
			<ul class="list-group">
				<?php
				$archives = wp_get_archives( array(
					'type'            => 'monthly',
					'format'          => 'custom',
					'before'          => '<li class="list-group-item d-flex justify-content-between align-items-center">',
					'after'           => '</li>',
					'show_post_count' => true,
				) );
				?>
			</ul>
		</div>
	</div>
</div>