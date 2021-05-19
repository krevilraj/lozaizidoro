<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lozaizidoro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="profile" href="https://gmpg.org/xfn/11"/>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- open header -->
<header
    class="header top-sec fixed-top <?php if (is_home() || is_front_page()) : ?> home<?php else: ?> navcolor<?php endif; ?>"
    id="header">
  <div class="header__menu">
    <div class="hamburger">
      <span class="fa fa-bars"></span>
    </div>
    <nav class="sidebar">
      <div class="side-logo">
        <?php if (has_custom_logo()): ?>
          <?php the_custom_logo(); ?>
        <?php else: ?>
          <p class="site-title"><?php bloginfo('title'); ?></p>
          <span><?php bloginfo('description'); ?></span>
        <?php endif; ?>
      </div>
      <?php
      wp_nav_menu(array(
          'menu' => 'mainmenu',
          'container' => 'ul',
          'container_class' => '',
          'menu_class' => '',
          'theme_location' => 'lozaizidoro_main_menu')
      );
      ?>

    </nav>
  </div>
  <div class="header__logo">
    <?php if (has_custom_logo()): ?>
      <?php the_custom_logo(); ?>
    <?php else: ?>
      <p class="site-title"><?php bloginfo('title'); ?></p>
      <span><?php bloginfo('description'); ?></span>
    <?php endif; ?>
  </div>

  <div class="header__right">
    <div class="header__user">
      <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>"><i
            class="fa fa-user-o"></i></a>

      <ul class="account-dropdown">
        <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>">A minha conta</a>
        </li>
        <li><?php if (is_user_logged_in()) : ?>
            <a href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))) ?>">Logout</a>


          <?php endif; ?></li>
      </ul>
    </div>

    <div class="header__cart cart-mini">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
      </a>
      <div class="mini-wrapper">
        <div class="widget_shopping_cart_content">

          <?php woocommerce_mini_cart(); ?>
        </div>
      </div>
    </div>
    <div class="search-container searchbox__header">
      <label for="search" class="fa fa-search"></label>
      <input type="search" name="" placeholder="Search" id="search">
    </div>
  </div>
</header>
<!-- end header -->