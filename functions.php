<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
 	'/deprecated.php',                      // Load deprecated functions.
    '/moshi.php',
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

//remove_action ('woocommerce_single_product_summary' , 'woocommerce_template_single_add_to_cart', 30);
remove_action ('woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40);

add_filter ('woocommerce_product_single_add_to_cart_text','woocommerce_custom_add_to_cart_text');
function woocommerce_custom_add_to_cart_text(){
	return __('Order the skip bin','woocommerce');
}
remove_filter('get_the_excerpt','wp_trim_excerpt');

/*add_action('woocommerce_add_to_cart', 'home_add_to_cart');
 function home_add_to_cart() {
    global $woocommerce;

    $product_id = 362;

    $found = false;

    //check if product already in cart
    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            if ( $_product->id == $product_id )
                $found = true;
        }
        // if product not found, add it
        if ( ! $found )
            WC()->cart->add_to_cart( 362 ,367);
    } else {
        // if no products in cart, add it
        WC()->cart->add_to_cart( 362,369);
    }
} */


add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'PROCEED TO PAYMENT', 'woocommerce' ); 
}

add_filter('woocommerce_billing_fields','ced_remove_billing_fields');
function ced_remove_billing_fields($fields){
    unset($fields['billing_last_name']);
    return $fields;
}

add_filter('woocommerce_checkout_fields','ced_rename_checkout_fields');
function ced_rename_checkout_fields($fields){
    $fields['billing']['billing_first_name']['placeholder']='Full Name';
    $fields['billing']['billing_first_name']['label']='Your Name';
    return $fields;
}

add_filter('woocommerce_checkout_fields','remove_company_name');
function remove_company_name($fields){
    unset($fields['billing']['billing_company']);
    return $fields;
}

add_filter('default_checkout_billing_country','change_default_checkout_country');

function change_default_checkout_country(){
    return 'LB';
}

//Reposition Checkout Addons to under Order Notes
function sv_wc_checkout_addons_change_position(){
    return 'woocommerce_before_order_notes';
}
add_filter('wc_checkout_add_ons_position','sv_wc_checkout_addons_change_position');