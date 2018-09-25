<!DOCTYPE html>
<html lang="en">
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>Finazi</title>
	<link rel="pingback" href="<?php bloginfo('pingback_url') ;?>">
	<?php wp_head() ?>
</head>
<body <?php body_class() ;?>>
	
	<header>
		<div class="info-contact">
			<div class="container">
				<div class="top_menu">
					<div class="language">
						<select name="language" >
							<option value="1">English</option>
							<option value="2">Cuba</option>
						</select>
					</div>
				
					<div class="topbar-right">
						<div class="info">
							<ul>
								<li><a href="tel:01234556"><img src="<?php echo get_template_directory_uri().'/image/icon_phone.png' ?>" alt="Icon Phone">  +212 386 5575</a></li>
								<li><a href="mailto:finazi@haintheme.com"><img src="<?php echo get_template_directory_uri().'/image/icon_email.png' ?>" alt="Icon Phone">  Support@ConsultWP.com</a></li>
								<li><img src="<?php echo get_template_directory_uri().'/image/icon_location.png' ?>" alt="Icon Phone">  1010 Avenue of the Moon, New York, NY 10018 US.</li>
							</ul>
						</div>
						<div class="consult">
							<div class="consult-phone">
								<p >Free Consult</p>
							</div>
						</div>
					</div>
					
				</div>
				<button id="topbar-toggle" class="ion-ios-arrow-down"></button>

			</div>
		</div>
		<div class=" header">
			<div class="container">				
				<?php finazi_logo(); ?>

				<!-- <div class="main-menu"> -->
					<div class="collapse-button ion-android-menu"></div>
					<?php finazi_menu('primary-menu'); ?>	
					<div class="action">
						<div class="cart">
							<a href="" class="shopping-cart-icon fa fa-shopping-cart"><sup>0</sup></a>
						</div>
						<button class="search-button-icon"></button>
					</div>
				<!-- </div> -->
				<div class="form-search-header">
					<form action="<?php echo home_url() ?>" class="form_search_header">
						<input type="text" placeholder="To Search start typing..." name="s" class="header_form_search">
					</form>
					<span class="close-form-search"></span>
				</div>
			</div>
		</div>
		<nav class="breadcrumb-page">
			<div class="container">
				<div class="bread">
					<?php finazi_breadcrumbs() ?>	
				</div>	
			</div>
		</nav>
	</header>
	