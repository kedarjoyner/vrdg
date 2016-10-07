<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );

?>

<?php if ( $heading ): ?>
  <h2><?php echo $heading; ?></h2>
<?php endif; ?>

<?php /* the_content(); */ ?>

<?php if( have_rows('presenter') ): ?>

	<div class="presenter-wrap">

	<?php while( have_rows('presenter') ): the_row();

		// vars
		$name = get_sub_field('name');
		$image = get_sub_field('image');
		$url = $image['url'];
		$size = 'medium';
		$large = $image['sizes'][$size];
		$description = get_sub_field('description');

		?>

			<?php if( $name ): ?>
				<h4><?php echo $name; ?></h4>
			<?php endif; ?>

			<?php if( $image ): ?>
				<img src="<?php echo $large ?>" alt="<?php echo $image['alt'] ?>" />
			<?php endif; ?>

			<?php if( $description ): ?>
				<p><?php echo $description; ?></p>
			<?php endif; ?>


	<?php endwhile; ?>

</div>

<?php endif; ?>
