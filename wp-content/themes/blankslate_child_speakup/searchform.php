<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
	<div class="input-group">
		<input type="search" class="form-control" placeholder="Search" aria-label="search" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
		<div class="input-group-append">
			<button class="btn btn-secondary" type="button">
				<i class="fa fa-search"></i>
			</button>
		</div>
	</div>
</form>

