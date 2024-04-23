<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blankslate_Child_Speakup
 */

get_header();
?>
    <main id="primary" class="site-main py-4">
        <div class="container pb-4">
            <?php echo do_shortcode('[metaslider id="39"]') ?>
        </div>


        <div class="container">
			<?php get_template_part( 'inc/template-hero' ) ?>
			<?php get_template_part( 'inc/template-breadcrumb' ) ?>
        </div>

        <?php get_template_part('custom-sidebar') ?>

        <div class="container">
            <section class="bsb-service-7 py-5 py-xl-8">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                            <h3 class="fs-5 mb-2 text-center">Services</h3>
                            <h2 class="display-5 mb-5 mb-xl-9 text-center">We offer premier services where excellence meets affordability.</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid ">
                                <div class="row">
                                    <?php
                                        $services = new WP_Query([
                                            'post_type' => 'services',
                                            'order' => 'asc',
                                            'posts_per_page' => 3
                                        ]);

                                        if($services->have_posts()): while($services->have_posts()): $services->the_post();
                                    ?>
                                            <div class="col-12 col-md-4 p-0">
                                                <div class="card border-0 bg-transparent">
                                                    <div class="card-body text-center p-5">
                                                        <i class="fas fa-<?= get_field('icon_name') ?> fa-3x text-primary-emphasis mb-4"></i>
                                                        <h4 class="fw-bold text-uppercase mb-4"><?= the_title() ?></h4>
                                                        <p class="mb-4 text-secondary"><?php echo the_content() ?></p>
                                                        <a href="<?= get_permalink() ?>" class="fw-bold text-decoration-none link-primary">
                                                            Learn More
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; endif; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container">
            <h3 class="fs-5 mb-2 text-center ">Media Partners</h3>
		    <?php echo do_shortcode('[sp_wpcarousel id="32"]'); ?>
        </div>

    </main><!-- #main -->
<?php
get_sidebar();
get_footer();
