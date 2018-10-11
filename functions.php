<?php 
	if (!isset($content_width)) {
		$content_width=900;
	}
	if (!function_exists('finazi_setup')) {
		function finazi_setup()
		{
			load_theme_textdomain('finazi');
			add_theme_support('automatic_feed_links');
			add_theme_support('title-tag');
			add_theme_support('post-thumbnails');
			// add_theme_support( 'wc-product-gallery-zoom' );
			// add_theme_support( 'wc-product-gallery-lightbox' );
			// add_theme_support( 'wc-product-gallery-slider' );
			add_theme_support('post-formats',[
												'aside',
												'image',
												'video',
												'gallery',
												'chat',
												'quote',
												'audio',
												'link',
												'status'
											]);	
			add_theme_support('html5',[
									'search-form',
									'comment-form',
									'comment-list',
									'gallery',
									'caption'
									]);
			register_nav_menu('primary-menu',__('Primary menu','finazi'));
		}

	}
	add_action('after_setup_theme','finazi_setup');

	function finazi_widgets_init(){
		register_sidebar([
							'name'=> __('Main sidebar','finazi'),
							'id'=>__('main-sidebar','finazi'),
							'class'=>'main-sidebar',
							'before_title'=>'<h2 class="widgettitle">',
							'after_title' => '<h2>'
							]);
		register_sidebar([
							'name' => __('Footer sidebar','finazi'),
							'id' =>__('footer-sidebar','finazi'),
							'class' => 'footer-sidebar', 
							'before_widget' => '<div class="col-md-3" id="%1$s"><aside class="%1$s">',
							'after_widget' =>'</aside></div>',
							'before_title' =>'<h2 class="title">',
							'after_title' => '</h2>'
							]);
		register_sidebar([
							'name' => __('Shop sidebar','finazi'),
							'id' =>__('shop-sidebar','finazi'),
							'class' => 'main-sidebar', 
							'before_widget' => '<aside class="%2$s" id="%1$s">',
							'after_widget' =>'</aside>',
							'before_title' =>'<h2 class="widgettitle">',
							'after_title' => '</h2>'
							]);
	}
	add_action('widgets_init','finazi_widgets_init');
	function finazi_style(){
		wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/css/bootstrap.min.css','all');
		wp_enqueue_style('slick-css',get_template_directory_uri().'/css/slick.css','all');
		wp_enqueue_style('slick-theme-css',get_template_directory_uri().'/css/slick-theme.css','all');
		wp_enqueue_style('opensans-font','https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i','all');
		wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css','all');
		wp_enqueue_style('font-material','https://fonts.googleapis.com/icon?family=Material+Icons','all');
		wp_enqueue_style('font-sourcesanspro','https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i','all');
		wp_enqueue_style('finazi-css',get_template_directory_uri().'/style.css','all');
		wp_enqueue_style('woocommerce-css',get_template_directory_uri().'/css/woocommerce.css','all');
		wp_enqueue_style('finazi-responsive',get_template_directory_uri().'/css/responsive.css','all');
		wp_register_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap-js');
		wp_register_script('slick-js',get_template_directory_uri().'/js/slick.min.js', array('jquery'), null, true);
		wp_enqueue_script('slick-js');
		wp_register_script('finazi-js',get_template_directory_uri().'/js/finazi.js', array('jquery'), null, true);
		wp_enqueue_script('finazi-js');

	}
	add_action('wp_enqueue_scripts','finazi_style');
	function finazi_customize_register($wp_customize){
		$wp_customize->add_section("footer", array(
													 'title' => __("Footer", "finazi"),
													 'priority' => 130,
													 'description' => __( 'Description Custom logo here' ),
													 ));
		 $wp_customize->add_setting("footer_logo", array(
															 'transport' => 'postMessage',
															 )); 
		$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'footer_logo',array(
															 'label' => __('Footer Logo', 'finazi'),
															 'section' => 'footer',
															 'settings' => 'footer_logo',
															 )));
		$wp_customize->add_setting("copy_right",array('	
														default' => '' ,
														'transport' => 'postMessage',
														));


		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize,'copy_right',array(
															 'label' => __('copy_right', 'finazi'),
															 'section' => 'footer',
															 'settings' => 'copy_right',
															 'type' => 'text'
															 )));
	}
	add_action('customize_register','finazi_customize_register');
	function finazi_logo_setup(){
			add_theme_support('custom-logo',[
												'width' => 190,
												'hight' => 65,
												'flex-hight' => true,
												'flex-width'  =>true,
												'default-image' =>get_template_directory_uri().'/image/logo.png'
			]);
	}
	add_action('after_setup_theme','finazi_logo_setup');
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	if (!function_exists('finazi_logo')) {
		function finazi_logo() {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			if($custom_logo_id){
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$image_src=$image[0];
			}
			else{
				$image_src=get_template_directory_uri().'/image/logo.png';

			}
			?>
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo $image_src; ?>" alt="Logo"></a>
			</div>

		<?php }
	}
	if (!function_exists('finazi_menu')) {
		function finazi_menu($slug){
			$menu=[
					'theme_location' => $slug,
					'container' => 'nav',
					'container_class' => 'navigation-menu',
					'container_id' => 'navbar',
					'menu_class' => 'menu'
			];
		wp_nav_menu($menu);
		}
		
	}
	if (! function_exists('finazi_breadcrumbs')) {
		function finazi_breadcrumbs(){
			$home = get_bloginfo('url');
			if ( ! is_woocommerce() ) {
				if (is_home()) { 
					$title="Home"; ?>
					<h1><?php echo strtoupper($title) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>">Home</a></li>
						<li class="item active">Blog ss</li>
					</ul>
					<?php
				}
				elseif (is_category()) {
					$array=get_the_category();
					// echo "<pre>";
					// var_dump($array);
					$title=$array[0]->name;?>
	<!-- 				<h1><?php echo esc_html_e( 'ARCHIVE', 'finazi' ) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>"><?php esc_html_e( 'Home' , 'finazi' ) ?></a></li>
						<li class="item active"><?php esc_html_e( $title ) ?></li>
					</ul> -->
					<?
				}
				elseif (is_tag()) {
					$title=single_tag_title(); ?>
					<h1><?php echo esc_html_e( 'ARCHIVE', 'finazi' ) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>"><?php esc_html_e( 'Home' , 'finazi' ) ?></a></li>
						<li class="item active"><?php esc_html_e( $title ) ?></li>
					</ul><?php
				}
				elseif(is_day()){
					$title=the_time('F jS, Y'); ?>
					<h1><?php echo esc_html_e( 'ARCHIVE', 'finazi' ) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>"><?php esc_html_e( 'Home' , 'finazi' ) ?></a></li>
						<li class="item active"><?php esc_html_e( $title ) ?></li>
					</ul><?php
				}
				elseif(is_month()){
					$title=single_month_title('',false); ?>
					<h1><?php echo esc_html_e( 'ARCHIVE', 'finazi' ) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>"><?php esc_html_e( 'Home' , 'finazi' ) ?></a></li>
						<li class="item active"><?php esc_html_e( $title ) ?></li>
					</ul><?php
				}
				elseif (is_year()) {
					$title= the_time('Y'); ?>
					<h1><?php echo esc_html_e( 'ARCHIVE', 'finazi' ) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>"><?php esc_html_e( 'Home' , 'finazi' ) ?></a></li>
						<li class="item active"><?php esc_html_e( $title ) ?></li>
					</ul><?php
				}
				elseif (is_single()) {
					$title=get_the_title();
					$cat_id=get_the_category();
					// echo "<pre>";
					// echo single_cat_title('');
					// var_dump($cat_id[0]);
					// var_dump(wp_get_post_categories( get_the_ID() ));
					// var_dump($cat_id[0]->term_id);
					// echo get_category_link($cat_id[0]->term_id);
					// die();
					// var_dump($cat_id[0]->name);
					?>
					<h1><?php echo $title ?></h1>
						<ul>
							<li class="item"><a href="<?php echo $home ?>">Home</a></li>
					<?php
					if (has_category()) {
						$cat=get_the_category();
						// var_dump(get_category_link($cat_id));
						// echo  get_category_link( get_cat_ID( single_cat_title('',false) ) ); 
						// die();
						echo '<li class="item"><a href="'.get_category_link($cat_id[0]->term_id).'">'.$cat[0]->name.'</a></li>';
						
					} ?>

						<li class="item active"><?php echo $title ?></li>
					</ul><?php
				}
					
				elseif (is_page()) {
					$title=get_the_title();?>
					<h1><?php echo strtoupper($title) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>">Home</a></li>
						<li class="item active"><?php echo $title ?></li>
					</ul><?php
				}

				elseif (is_author()) {
					$title = get_the_author();?>
					<h1><?php echo strtoupper($title) ?></h1>
					<ul>
						<li class="item"><a href="<?php echo $home ?>">Home</a></li>
						<li class="item active">$title</li>
					</ul><?php

				}
				elseif (is_search()) {?>
					<h1>SEARCH RESULTS</h1>
						<ul>
							<li class="item"><a href="<?php echo $home ?>">Home</a></li>
							<li class="item active"> <?php printf(__('Searching for: %1$s','finazi'),get_search_query()) ?></li>
						</ul><?php

				}
			}
			else{
				if ( is_shop() ) { ?>
				<h1><?php echo esc_html_e( 'SHOP', 'finazi' ) ?></h1>
			<?php
				woocommerce_breadcrumb(); 
				}
				if ( is_product() ) { ?>
					<h1><?php echo esc_html_e( 'SHOP (DETAIL)', 'finazi' ) ?></h1><?php
					woocommerce_breadcrumb();
				}
				if ( is_product_category() ) { ?>
					<h1><?php echo esc_html_e( 'SHOP CATEGORY', 'finazi' ) ?></h1><?php
					woocommerce_breadcrumb();
				}
			}
		}
	}
	if (! function_exists('finazi_thumbnail')) {
		function finazi_thumbnail(){
			 if (   has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
				 <figure class="post-thumbnail"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php
			endif;
		}	
	}
	if (! function_exists("finazi_entry_title")) {
		function finazi_entry_title(){
			echo '<h2><a href="'.get_the_permalink().'" class="blog-post-name">'.get_the_title().'</a></h2>';
		}
	}
	if(! function_exists('finazi_date_post')){
		function finazi_date_post()
		{
			echo the_time('d');
		}
	}
	if(! function_exists('finazi_month_post')){
		function finazi_month_post()
		{
			echo '<span class="blog-post-month-text">'.the_time('M').'</span>';
		}
	}
	if(! function_exists('finazi_year_post')){
		function finazi_year_post()
		{
			echo '<span class="blog-post-year-text">'.the_time('Y').'</span>';
		}
	}
	if (!function_exists('finazi_entry_content')) {
		function finazi_entry_content(){
			if (!is_single()) {
				the_excerpt();
			}
			else{
				the_content();
			}
		}
	}
	if (!function_exists('finazi_number_comment')) {
		function finazi_number_comment(){
			if (comments_open()) {
				// echo '<p class="reply">';
							comments_popup_link(__('0', 'finazi'),
												 __('1', 'finazi'),
												__('% ', 'finazi'),
												 __('Read', 'finazi'));
						// echo '</p>';
			}
		}
	}
	if (!function_exists('finazi_author_post')) {
		function finazi_author_post($value='')
		{
			echo get_the_author_posts_link();
		}
	}
	if (!function_exists('finazi_category_post')) {
		function finazi_category_post(){
			echo the_category( ', ' );
		}
	}
	function finazi_readmore(){
	  	return '<div class="wrap-btn-readmore"><a class="blog-btn-read-more ion-ios-list-outline" href="'. get_permalink( get_the_ID() ) . '">' . __('READ MORE', 'finazi') . '</a></div>';
	}
	add_filter( 'excerpt_more', 'finazi_readmore' );
	function post_navigation(){
		$next= get_next_post();
		$pre= get_previous_post();
		
		// echo "<pre>";
		// var_dump($next);
		// var_dump($pre);
		// echo "</pre>";
		?>
		
		<div class="blog-related-post flw">
			<?php if (!is_string($pre)) {?>
				<div class="prev-post">
					<div class="control-post-img">
						<?php echo get_the_post_thumbnail($pre->ID); ?>
					</div>
					<div class="control-post-desc">
						<h3 class="control-post-name"><a href="<?php echo $pre->guid; ?>" rel="prev"><?php echo $pre->post_title ?></a></h3>
						<a href="<?php echo $pre->guid; ?>" class="control-post-btn">Previous</a>
					</div>
				</div>
			<?php }  ?>
			
			<?php 
				if (!is_string($next)) {?>
					<div class="next-post">

						<div class="control-post-img">
							<?php echo get_the_post_thumbnail($next->ID); ?>
						</div>
						<div class="control-post-desc">
							<h3 class="control-post-name"><a href="<?php echo $next->guid; ?>" rel="next"><?php echo $next->post_title ?></a></h3>
							<a href="<?php echo $next->guid; ?>" class="control-post-btn">Next</a>
						</div>
					</div>
				
			<?php	}
				 
		echo "</div>";
	}




	// var_dump( $product );
	add_filter( 'woocommerce_get_price_html', 'finazi_price_html',100,2 );
	function finazi_price_html( $price, $product ){
		return str_replace( '<ins>', '<span class="del-img">', $price );
	}

	// add_filter('woocommerce_single_product_image_thumbnail_html',)

	remove_action("woocommerce_single_product_summary", "woocommerce_template_single_price",10);
	add_action("woocommerce_single_product_summary",'woocommerce_finazi_price',10);
	function woocommerce_finazi_price()
	{
		
		// echo "<pre>";
		global $product;
		$availability = $product->get_availability()
		// var_dump($product);
		// 	echo $product->get_price();
		// 	echo $product->get_regular_price();
		// 	echo $product->get_sale_price();
		// woocommerce_template_single_price();
		?>

		<p class="price">
		<?php

			if ( $product->is_on_sale() ) {
			?>
				<span class="del-img"><?php echo get_woocommerce_currency_symbol().$product->get_sale_price(); ?></span>

					<span class="sale-price">
						<?php 
							echo get_woocommerce_currency_symbol();
							echo esc_html( $product->get_regular_price() ); 
						?>
					</span>


			<?php
			}
			else{
			?>
				<span class="del-img">
					
				<?php 
					echo get_woocommerce_currency_symbol();
					echo esc_html( $product->get_regular_price() ); 
				?>
				</span>
			<?php
			}
		 ?>
		</p>
		<div class="product-stock">
			<p class="stock <?php echo esc_attr( $availability['class'] ); ?>"><?php echo wp_kses_post( $availability["availability"] ); ?></p>
			<p><?php echo ( $product->is_in_stock() ) ? esc_html( 'Availalbe: In Stock' ) : esc_html('Availalbe: Out Of Stock') ?></p>
		</div>
		<?php
	}
	add_action( 'init', 'woocommerce_clear_cart_url' );
	function woocommerce_clear_cart_url() {
		global $woocommerce;
		if ( isset( $_GET['empty-cart'] ) ) {
		    $woocommerce->cart->empty_cart();
		}
	}

	add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',15);
	function finazi_share(){
		?>
		<div class="share_with">
			<?php echo esc_html_e('SHARE: ','finazi') ?>
			<ul>
				<li><a href="#" class="fa fa-facebook"></a></li>
				<li><a href="#" class="fa fa-twitter"></a></li>
				<li><a href="#" class="fa fa-google-plus"></a></li>
				<li><a href="#" class="fa fa-linkedin"></a></li>
			</ul>
		</div><?php
	}
	add_action( 'woocommerce_single_product_summary', 'finazi_share', 55 );


?>