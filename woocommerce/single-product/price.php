<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
 * @version 3.0.0
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

?>
<p class="price"><?php echo $product->get_price_html(); ?></p>

<div class="product-stock">
	<p class="stock <?php echo esc_attr( $availability['class'] ); ?>"><?php echo wp_kses_post( $availability["availability"] ); ?></p>
	<p><?php echo ( $product->is_in_stock() ) ? esc_html( 'Availalbe: In Stock' ) : esc_html('Availalbe: Out Of Stock') ?></p>
</div>