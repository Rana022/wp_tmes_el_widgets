<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ECommerce
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/006c40c8a2.js" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- topbar and manubar -->
  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span><?php echo get_theme_mod('header_contact_field')?></a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span><?php echo get_theme_mod('header_email_field')?></a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="<?php echo get_theme_mod('social_link1')?>"><span class="<?php echo get_theme_mod('social_icon_field1')?>"></span></a>
              <a href="<?php echo get_theme_mod('social_link2')?>"><span class="<?php echo get_theme_mod('social_icon_field2')?>"></span></a>
              <a href="<?php echo get_theme_mod('social_link3')?>"><span class="<?php echo get_theme_mod('social_icon_field3')?>"></span></a>
              <a href="<?php echo get_theme_mod('social_link4')?>"><span class="<?php echo get_theme_mod('social_icon_field4')?>"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
          'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'navbarSupport',
          'menu_class'      => 'navbar-nav ml-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
				)
			);
			?>
      </div> <!-- .container -->
    </nav>
  </header>