<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpress-boilerplate
 */

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- selectivizr -->
    <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/selectivizr-min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <!--[if lt IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div id="page" class="site">
  	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'wordpress-boilerplate' ); ?></a>

  	<header id="masthead" class="site-header" role="banner">
      <div class="wrapper">
  		  <h1 class="site-logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.svg" alt="" />
          </a>
        </h1>

        <div class="search-form">
          <?php get_search_form(); ?>
        </div>

        <?php
    		$description = get_bloginfo( 'description', 'display' );
    		if ( $description || is_customize_preview() ) : ?>
    			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
    		<?php
    		endif; ?>
      </div><!-- .wrapper -->

  		<nav id="site-navigation" class="main-navigation" role="navigation">
        <div class="wrapper">
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </div><!-- .wrapper -->
  		</nav><!-- #site-navigation -->
  	</header><!-- #masthead -->

  	<div id="content" class="site-content">
      <div class="wrapper">
