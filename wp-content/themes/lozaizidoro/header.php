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
<header class="header top-sec fixed-top" id="header">
  <div class="header__menu">
    <div class="hamburger">
      <span class="fa fa-bars"></span>
    </div>
    <nav class="sidebar">
      <div class="side-logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo" class="img-fluid "></div>
      <ul>
        <li><a href="#">Menu -1</a></li>
        <li><a href="#">menu -2</a></li>
        <li><a href="#">menu -3</a></li>
        <li><a href="#">menu -4</a></li>
      </ul>
    </nav>
  </div>
  <a href="#" class="header__logo"> <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo" class="img-fluid "></a>
  <div class="header__right">
    <div class="header__user"><i class="fa fa-user-o"></i></div>
    <div class="header__cart">
      <a href="#">
        <i class="fa fa-shopping-cart"></i>
        <span class="badge">3</span>
      </a>
    </div>
    <div class="search-container searchbox__header">
      <label for="search" class="fa fa-search"></label>
      <input type="search" name="" placeholder="Search" id="search">
    </div>
  </div>
</header>
<!-- end header -->