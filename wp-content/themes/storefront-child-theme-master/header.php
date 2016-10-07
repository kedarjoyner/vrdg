<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- <div id="page" class="hfeed site"> -->
<header class="header-wrap">
		<div class="logo-wrap">
		<a href="https://www.vrdevelopmentgroup.com/index.aspx"><img class="nav-logo" src="<?php echo 		get_stylesheet_directory_uri();?>/assets/img/logo.png" alt="VR Development Group logo" /></a>
		</div>

	<nav class="custom-nav-wrap">
		<?php wp_nav_menu( array( 'menu' => 'Custom Menu', 'menu_class' => 'custom-menu-items', 'container_class' => "custom-menu-wrap", 'theme_location' => 'custom-menu',  ) ); ?>

		<div class="hamburger" id="toggle">
		 <span class="top"></span>
		 <span class="middle"></span>
		 <span class="bottom"></span>
	</div>
	</nav>
</header>
	<?php
	/* do_action( 'storefront_before_header' ); */ ?>

	<!-- <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		<div class="col-full"> -->

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_site_branding                    - 20
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_product_search                   - 40
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_header_cart                      - 60
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			/*do_action( 'storefront_header' ); */ ?>

		<!-- </div>
	</header> --> <!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	/*do_action( 'storefront_before_content' ); */ ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		 do_action( 'storefront_content_top' );
