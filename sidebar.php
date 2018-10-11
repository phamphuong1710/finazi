<?php
	// if ( ! is_shop() && !is_product() ){
	// 	if (is_active_sidebar('main-sidebar')) {
	// 		dynamic_sidebar('main-sidebar');
	// 	}
	// 	else{
	// 		_e('Please setting widget sidebar','finazi');
	// 	}
	// }
	// else{
	// 	if (is_active_sidebar('shop-sidebar')) {
	// 		dynamic_sidebar('shop-sidebar');
	// 	}
	// 	else{
	// 		_e('Please setting widget sidebar','finazi');
	// 	}
	// }


if ( ! is_woocommerce() ) {
	if (is_active_sidebar('main-sidebar')) {
		dynamic_sidebar('main-sidebar');
	}
	else{
		_e('Please setting widget sidebar','finazi');
	}
}
else{
	if ( ! is_product() ) {
		if (is_active_sidebar('shop-sidebar')) {
			dynamic_sidebar('shop-sidebar');
		}
		else{
			_e('Please setting widget sidebar','finazi');
		}
	}
}
 ?>
