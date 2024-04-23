<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blankslate_Child_Speakup
 */

$primary_menu_name = 'main-menu';
$primary_menu_items = wp_get_nav_menu_items($primary_menu_name);
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <style>
        body {
            background-color: <?= get_theme_mod('background_color', '#fff') ?>;
        }
    </style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e('Skip to content', 'blankslate_child_speakup'); ?></a>

		<header id="masthead" class="site-header">
			<!-- Top Bar -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-auto bg-primary">
						<span class="align-middle fw-medium text-white">BREAKING NEWS</span>
					</div>
					<div class="col bg-white">
						<marquee class="">
							<?php
                            $args = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 5,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                            ];

                            $marqueeNews = new WP_Query($args);
                            if($marqueeNews->have_posts()) {
                                while ($marqueeNews->have_posts()) {
	                                $marqueeNews->the_post();
	                                if ($marqueeNews->current_post == $marqueeNews->post_count - 1) {
                                        echo '<a class="text-decoration-none text-dark" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                                    } else {
                                        echo '<a class="text-decoration-none text-dark" href="' . get_the_permalink() . '">' . get_the_title() . '</a> | ';
                                    }
                                }
                            }

                            wp_reset_postdata();
                            ?>
						</marquee>
					</div>
				</div>
			</div>
			<!-- End Top Bar -->


            <!-- Navigation -->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container">
                    <!-- Brand/logo -->
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
							echo '<img class="img-fluid custom-logo" src="' . get_custom_logo_url() . '" alt="' . get_bloginfo( 'name' ) . '">';
						} else {
							echo '<img src="' . esc_url( get_template_directory_uri() . '/images/logo.png' ) . '" alt="' . get_bloginfo( 'name' ) . '">';
						} ?>
                    </a>

                    <!-- Navbar toggler button for small screens -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar menu items -->
					<?php
					wp_nav_menu( array(
						'theme_location' => 'main-menu',
						'container'      => 'div',
						'container_id'   => 'navbarNav',
						'container_class'=> 'collapse navbar-collapse',
						'menu_class'     => 'navbar-nav ms-auto',
						'fallback_cb'    => '__return_false',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'          => 2,
						'walker'         => new WP_Bootstrap_Navwalker(),
					) );
					?>
                </div>
            </nav>
            <!-- End Navigation -->

			<!-- Branding -->
            <div class="container my-2">
                <div class="row align-items-center ">
                    <div class="col-md-6"> <!-- Title and description alignment -->
                        <h1>
                            <a class="text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>"
                               rel="home"><?php bloginfo('name'); ?></a>
                        </h1>
                        <p class="text-secondary"><?php bloginfo('description'); ?></p>
                    </div>
                    <div class="col-md-6 "> <!-- Logo alignment -->
                        <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri() . '/images/banner.png' ?>">
                    </div>
                </div>
            </div>
			<!-- End Branding -->
		</header>