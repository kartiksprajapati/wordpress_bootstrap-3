<?php get_header(); ?>

<div class="container">
    <p class="text-center text-2xl mb-4">Showing Posts From</p>
    <h1 class="h2 mb-16 text-center text-primary" itemprop="name"><?php single_term_title() ?></h1>
    <h6 class="text-center text-secondary" itemprop="description">
		<?php if ('' != get_the_archive_description()) {
			echo esc_html(get_the_archive_description());
		} ?>
    </h6>
</div>

<div class="container">
	<?php if (have_posts()) :
		while (have_posts()) :
			the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
					<?php if (is_singular()) {
						echo '<h1 class="entry-title" itemprop="headline">';
					} else {
						echo '<h2 class="entry-title">';
					} ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					<?php if (is_singular()) {
						echo '</h1>';
					} else {
						echo '</h2>';
					} ?>
					<?php edit_post_link(); ?>
					<?php if (!is_search()) { ?>
                        <div class="entry-meta">
                            <span class="author vcard" <?php if (is_single()) {
								echo ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">';
							} else {
								echo '><span>';
							} ?><?php the_author_posts_link(); ?></span></span>
                            <span class="meta-sep"> | </span>
                            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>" title="<?php echo esc_attr(get_the_date()); ?>" <?php if (is_single()) {
								echo 'itemprop="datePublished" pubdate';
							} ?>><?php echo get_the_date(); ?></time>
							<?php if (is_single()) {
								echo '<meta itemprop="dateModified" content="' . esc_attr(get_the_modified_date()) . '">';
							} ?>
                        </div>
					<?php } ?>
                </header>
				<?php get_template_part('entry', (is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content')); ?>
				<?php if (is_singular()) {
					get_template_part('entry-footer');
				} ?>
            </article>
		<?php endwhile;
	endif; ?>
	<?php get_template_part('nav', 'below'); ?>
</div>

<?php get_footer(); ?>
