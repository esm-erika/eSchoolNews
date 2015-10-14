<?php

function any_ptype_on_cat($request) {
	if ( isset($request['category_name']) )
		$request['post_type'] = 'any';

	return $request;
}
add_filter('request', 'any_ptype_on_cat');

?>