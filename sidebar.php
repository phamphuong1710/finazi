<?php 
 	if (is_active_sidebar('main-sidebar')) {
 		dynamic_sidebar('main-sidebar');
 	}
 	else{
 		_e('Please setting widget sidebar','finazi');
 	}
 ?>