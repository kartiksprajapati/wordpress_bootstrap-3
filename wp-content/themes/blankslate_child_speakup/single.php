<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blankslate_Child_Speakup
 */

get_header();
?>

    <main id="primary" class="site-main">

		<?php
		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				?>

                <div class="container py-2 ">
                    <div class="post-navigation d-flex justify-content-between">
                        <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'blankslate-child-speakup' ) . '</span> %title' ); ?></div>
                        <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'blankslate-child-speakup' ) . '</span>' ); ?></div>
                    </div>
                </div>

				<div class="container py-2">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
                </div>

			<?php
			endwhile; // End of the loop.

		} else {

			get_template_part( 'template-parts/content', 'none' );

		}
		?>

    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
