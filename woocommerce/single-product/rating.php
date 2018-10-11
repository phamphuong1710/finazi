<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$availability = $product->get_availability();
$class        = $availability['class'];
// echo "<pre>";
// var_dump(wc_get_product_ids_on_sale());
// var_dump($product->is_in_stock());
// var_dump(wc_get_product_stock_status_options());die();

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html( $average, $rating_count ); ?>
		<?php if ( comments_open() ) : ?>
			<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s Review(s)', '%s Review(s)', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '&#32;</span>' ); ?></a>
			<a href="<?php echo comments_link(); ?>"><?php echo esc_html_e('Add your Reviews', 'finazi'); ?></a>
	<?php endif ?>

	</div>

<?php endif; ?>
