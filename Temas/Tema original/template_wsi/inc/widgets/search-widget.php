<?php
add_filter( 'get_search_form', 'rdtheme_search_form' );
function rdtheme_search_form(){
	$output =  '
	<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="custom-search-input">
			<div class="input-group col-md-12">
			<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Pesquisar...', 'seoengine' ) . '" value="' . get_search_query() . '" name="s" />
				<span class="input-group-btn">
					<button class="btn" type="submit" title="Pesquisar...">
						<i class="fa fa-search " aria-hidden="true"></i>
					</button>
				</span>
			</div>
		</div>
	</form>
	';
	return $output;
}