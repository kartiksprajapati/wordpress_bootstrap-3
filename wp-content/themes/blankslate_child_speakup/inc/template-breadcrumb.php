<nav aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-chevron pl-0 p-3rounded-3">
		<?php if ( is_home() ): ?>
			<li class="breadcrumb-item">
				<a class="link-body-emphasis" href="<?php echo home_url() ?>">
					<i class="fas fa-home"></i>
					<span class="visually-hidden">Home</span>
				</a>
			</li>
		<?php else: ?>
			<li class="breadcrumb-item">
				<a class="link-body-emphasis" href="<?php echo home_url() ?>">
					<i class="fas fa-home"></i>
					<span class="visually-hidden">Home</span>
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php single_post_title() ?>
			</li>
		<?php endif; ?>

	</ol>
</nav>