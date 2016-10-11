<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
// add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );


/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */



 function register_my_menu() {
  register_nav_menu('custom-menu',__( 'Custom Menu' ));
}
add_action( 'init', 'register_my_menu' );




// function show_attr() {
//     global $product;
//     $attributes = $product->get_attributes();
//     echo '<div class="attributes">';
//     $product->list_attributes();
//     echo '</div>';
// }
// add_action('woocommerce_after_shop_loop_item_title', 'show_attr');

//
//
// function remove_attribute ( $attributes ) {
//   if( is_shop() ){
//     if( isset( $attributes['pa_crc-credits'] ) ){
//       unset( $attributes['pa_crc-credits'] );
//     }
//   }
//   $product-> list_attributes();
// }
//
// add_filter('woocommerce_after_shop_loop_item_title', 'remove_attributes');


 /**
  * Remove woocommerce footer credits and add custom
  */

add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 30);
}

function custom_storefront_credit() {
  ?>
    <div class="site-info">
      <p>&copy; <?php echo date('Y'); ?> VR Development Group. All Rights Reserved.</p>
      </div><!-- site-info -->
  <?php
}



/**
 * Remove reviews tab
 */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}


/**
 * Hook in each tabs callback function after single content.
 */

add_action( 'woocommerce_after_single_product_summary', 'woocommerce_product_description_tab' );
//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_product_additional_information_tab', 0  );
// add_action( 'woocommerce_after_single_product_summary', 'comments_template' );


/**
 * Rename Description and Additional Info tabs
 */

// Change Product Description Heading
 add_filter('woocommerce_product_description_heading',
 'change_description_heading');

 function change_description_heading() {
     return 'Presenter(s):';
 }

//Change Additional Information Heading
 add_filter('woocommerce_product_additional_information_heading', 'change_info_heading');
 function change_info_heading(){
   return 'Details:';
 }



/**
 * Remove my-account and search from footer
 */

add_filter( 'storefront_handheld_footer_bar_links', 'jk_remove_handheld_footer_links' );
function jk_remove_handheld_footer_links( $links ) {
	unset( $links['my-account'] );
	unset( $links['search'] );
	return $links;
}

/**
 * Show product attributes above "Add to Cart" on single products
 */


function isa_woocommerce_all_pa(){
    global $product;
    $attributes = $product->get_attributes();

    if ( ! $attributes ) {
        return;
    }

    $out = '<div class="attributes"><ul class="custom-attributes">';

    foreach ( $attributes as $attribute ) {


        // skip variations
        if ( $attribute['is_variation'] ) {
        continue;
        }


        if ( $attribute['is_taxonomy'] ) {

            $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );

            // get the taxonomy
            $tax = $terms[0]->taxonomy;

            // get the tax object
            $tax_object = get_taxonomy($tax);

            // get tax label
            if ( isset ($tax_object->labels->name) ) {
                $tax_label = $tax_object->labels->name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
            }

            foreach ( $terms as $term ) {

                $out .= '<li class="' . esc_attr( $attribute['name'] ) . ' ' . esc_attr( $term->slug ) . '">';
                $out .= '<span class="attribute-label">' . $tax_label . ': </span> ';
                $out .= '<span class="attribute-value">' . $term->name . '</span></li>';

            }

        } else {

            $out .= '<li class="' . sanitize_title($attribute['name']) . ' ' . sanitize_title($attribute['value']) . '">';
            $out .= '<span class="attribute-label">' . $attribute['name'] . ': </span> ';
            $out .= '<span class="attribute-value">' . $attribute['value'] . '</span></li>';
        }
    }

    $out .= '</ul></div>';

    echo $out;
}
add_action('woocommerce_single_product_summary', 'isa_woocommerce_all_pa', 25);

/**
 * Show custom attributes on shop page
 */

add_action('woocommerce_after_shop_loop_item_title', 'isa_woocommerce_all_pa');


/**
 * Customize breadcrumbs
 */

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );
function jk_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Appartment'
	$defaults['home'] = 'Upcoming Webinars';
	return $defaults;
}
