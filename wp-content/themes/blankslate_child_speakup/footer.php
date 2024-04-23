<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blankslate_Child_Speakup
 */

?>
<div class="container border-top pt-4">
    <footer class="mt-2">
        <div class="row px-5 px-sm-0">
            <div class="col-md-5 mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
					<?php the_custom_logo() ?>
                </a>
                <div class="pt-2">
                    <h4 class="text-primary"><?php bloginfo('name') ?></h4>
                    <p class="text-secondary"><?php bloginfo('description') ?></p>
                </div>
            </div>

            <div class="col-6 col-md-2 mb-3 offset-md-1">
                <h5>Pages</h5>
                <ul class="nav flex-column">
			        <?php
			        $pages = get_pages();
			        foreach ($pages as $page) {
				        echo '<li class="nav-item mb-2"><a href="' . get_page_link($page->ID) . '" class="nav-link p-0 text-body-secondary">' . $page->post_title . '</a></li>';
			        }
			        ?>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Categories</h5>
                <ul class="nav flex-column">
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        echo '<li class="nav-item mb-2"><a href="' . get_category_link($category->term_id) . '" class="nav-link p-0 text-body-secondary">' . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Latest Sessions</h5>
                <ul class="nav flex-column">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $sessions = new WP_Query($args);
                    if ($sessions->have_posts()) {
                        while ($sessions->have_posts()) {
                            $sessions->the_post();
                            echo '<li class="nav-item mb-2"><a href="' . get_the_permalink() . '" class="nav-link p-0 text-body-secondary">' . get_the_title() . '</a></li>';
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between py-4 mt-4 border-top">
            <p>© <?= date('Y') ?> <span class="text-primary"><?php bloginfo('name') ?>, Inc</span>. All rights reserved.</p>
	        <?php dynamic_sidebar('footer-social-media'); ?>
        </div>
    </footer>
</div>

</div>

<?php wp_footer(); ?>

</body>
</html>
