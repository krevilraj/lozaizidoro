<?php
/**
 * Include file
 */
require_once get_template_directory() . '/inc/customposttype/slider.php';
require_once get_template_directory() . '/inc/sidebar/shop.php';
require_once get_template_directory() . '/inc/customizer/homepage_category.php';
require_once get_template_directory() . '/inc/woocommerce/addtocart/addtocart.php';
require_once get_template_directory() . '/inc/woocommerce/order/newsletter.php';



/**
 * Enqueue scripts and styles.
 */
function lozaizidoro_scripts()
{
  //Bootstrap owl carousel javascript and CSS files
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '4.6.0', true);
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.6.0', 'all');
  wp_enqueue_style('fontawesome-css', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");




  // Flexslider Javascript and CSS files
  wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css', array(), '', 'all');
  wp_enqueue_style('hover-css', get_template_directory_uri() . '/css/ihover.css', array(), '', 'all');

  //owl carousel
  wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '', 'all');
  wp_enqueue_style('owl-carousel-green-css', get_template_directory_uri() . '/css/owl.theme.green.css', array(), '', 'all');
  wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);

  // Js


//  wp_enqueue_script('jquery-slim-js', "https://code.jquery.com/jquery-3.5.1.slim.min.js");
  wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

  // Theme's main stylesheet
  wp_enqueue_style('lozaizidoro-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
//  wp_enqueue_style('lozaizidoro-custom-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/css/custom.css'), 'all');

  wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/responsive.css', array(), '', 'all');

}

add_action('wp_enqueue_scripts', 'lozaizidoro_scripts');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support('custom-logo', array(
  'width' => 362,
  'height' => 105,
  'flex_height' => true,
  'flex_width' => true,
  'class' => 'img-fluid'
));

/*****************Add custom logo class ****************/
add_filter('get_custom_logo', 'add_custom_logo_url');
function add_custom_logo_url()
{
  $custom_logo_id = get_theme_mod('custom_logo');
  $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
    esc_url(site_url()),
    wp_get_attachment_image($custom_logo_id, 'full', false, array(
      'class' => 'img-fluid',
    ))
  );
  return $html;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lozaizidoro_config()
{

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'lozaizidoro_main_menu' => 'Lozaizidoro Main Menu',
      'lozaizidoro_footer_menu' => 'Lozaizidoro Footer Menu',
    )
  );

  // This theme is WooCommerce compatible, so we're adding support to WooCommerce
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 255,
    'single_image_width' => 1024,
    'product_grid' => array(
      'default_rows' => 10,
      'min_rows' => 6,
      'max_rows' => 10,
      'default_columns' => 3,
      'min_columns' => 3,
      'max_columns' => 3,
    )
  ));
//  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');


}

add_action('after_setup_theme', 'lozaizidoro_config', 0);

//Izidoro offer function

function li__customize_register($wp_customize)
{

// Create our panels

  $wp_customize->add_panel('izidoro_offer_panel', array(
    'title' => __('Izidoro Offer Section', 'lojaizidoro'),
  ));

// Create our sections

  $wp_customize->add_section('first_offer_section', array(
    'title' => __('First Offer', 'lojaizidoro'),
    'panel' => 'izidoro_offer_panel',
  ));

// Create title offer 1

  $wp_customize->add_setting('offer_title_setting', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('offer_title_setting_control', array(
    'label' => __('Offer Title', 'lojaizidoro'),
    'section' => 'first_offer_section',
    'settings' => 'offer_title_setting',
    'type' => 'text',
  ));

  // Create link

  $wp_customize->add_setting('offer_link_setting', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('offer_link_setting_control', array(
    'label' => __('Offer Link', 'lojaizidoro'),
    'description' => __('Please put the link here', 'lojaizidoro'),
    'section' => 'first_offer_section',
    'settings' => 'offer_link_setting',
    'type' => 'url',
  ));

  // Create image

  $wp_customize->add_setting('first_offer_image', array(
    'default' => get_theme_file_uri('img/footer_banner.png'), // Add Default Image URL
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'first_offer_image_control', array(
    'label' => 'Upload offer image',
    'section' => 'first_offer_section',
    'settings' => 'first_offer_image',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  // it disply pen tool for edit
  $wp_customize->selective_refresh->add_partial('first_offer_image', array(
    'selector' => 'span#first_offer_edit',
  ));


  // Create second offer section

  $wp_customize->add_section('second_offer_section', array(
    'title' => __('Second Offer', 'lojaizidoro'),
    'panel' => 'izidoro_offer_panel',
  ));

// Create title

  $wp_customize->add_setting('second_offer_title_setting', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('second_offer_title_setting_control', array(
    'label' => __('Second Offer Title', 'lojaizidoro'),
    'section' => 'second_offer_section',
    'settings' => 'second_offer_title_setting',
    'type' => 'text',
  ));

  // Create our link

  $wp_customize->add_setting('second_offer_link_setting', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('second_offer_link_setting_control', array(
    'label' => __('Second Offer Link', 'lojaizidoro'),
    'section' => 'second_offer_section',
    'settings' => 'second_offer_link_setting',
    'type' => 'text',
  ));

  // Create second image

  $wp_customize->add_setting('second_offer_image', array(
    'default' => get_theme_file_uri('img/footer_banner.png'), // Add Default Image URL
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'second_offer_image_control', array(
    'label' => 'Upload offer image',
    'section' => 'second_offer_section',
    'settings' => 'second_offer_image',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  // it disply pen tool for edit
  $wp_customize->selective_refresh->add_partial('second_offer_title_setting', array(
    'selector' => 'span#second_offer_edit',
  ));


}

add_action('customize_register', 'li__customize_register');

// Remove the additional information tab
function woo_remove_product_tabs($tabs)
{
  unset($tabs['reviews']);
  unset($tabs['additional_information']);
  return $tabs;
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);


// Rename a default WooCommerce tab
add_filter('woocommerce_product_tabs', 'li_change_description_text', 98, 1);

function li_change_description_text($tabs)
{

  if (isset($tabs['description'])) {
    $tabs['description']['title'] = 'INGREDIENTES';
  }

  return $tabs;
}


/**
 * Add custom tab
 */
function li_my_simple_custom_product_tab($tabs)
{

  $tabs['my_custom_tab'] = array(
    'title' => __('INFORMA????O NUTRICIONAL', 'lojaizidoro'),
    'callback' => 'li_my_simple_custom_tab_content',
    'priority' => 50,
  );
  $tabs['my_custom_tab1'] = array(
    'title' => __('MODO DE PREPARA????O', 'lojaizidoro'),
    'callback' => 'li_my_simple_custom_tab_content1',
    'priority' => 50,
  );
  $tabs['my_custom_tab2'] = array(
    'title' => __('CONSERVA????O', 'lojaizidoro'),
    'callback' => 'li_my_simple_custom_tab_content2',
    'priority' => 50,
  );
  $tabs['my_custom_tab3'] = array(
    'title' => __('OUTROS', 'lojaizidoro'),
    'callback' => 'li_my_simple_custom_tab_content3',
    'priority' => 50,
  );


  return $tabs;

}

add_filter('woocommerce_product_tabs', 'li_my_simple_custom_product_tab');

/**
 * Function that displays output for the shipping tab.
 */
function li_my_simple_custom_tab_content($slug, $tab)
{

  ?>
  <div style="text-align:left">
    <p><?php include('nutrition.php'); ?></p>
  </div>
  <?php

}

function li_my_simple_custom_tab_content1($slug, $tab)
{

  ?>
  <div style="text-align:left">
    <?php if(get_post_meta(get_the_ID(), 'modo_de_preparacao', true)=="" ):?>
      <style>
          #tab-title-my_custom_tab1{
              display:none;
          }
      </style>
    <?php endif;?>
    <p><?php echo wpautop(get_post_meta(get_the_ID(), 'modo_de_preparacao', true)); ?></p>
  </div>
  <?php

}

function li_my_simple_custom_tab_content2($slug, $tab)
{

  ?>
  <div style="text-align:left">
    <?php if(get_post_meta(get_the_ID(), 'conservacao', true)=="" ):?>
      <style>
          #tab-title-my_custom_tab2{
              display:none;
          }
      </style>
    <?php endif;?>
    <p><?php echo wpautop(get_post_meta(get_the_ID(), 'conservacao', true)); ?></p>
  </div>
  <?php

}

function li_my_simple_custom_tab_content3($slug, $tab)
{

  ?>
  <div style="text-align:left">
    <?php if(get_post_meta(get_the_ID(), 'outros', true)=="" ):?>
      <style>
          #tab-title-my_custom_tab3{
              display:none;
          }
      </style>
    <?php endif;?>
    <p><?php echo wpautop(get_post_meta(get_the_ID(), 'outros', true)); ?></p>
  </div>
  <?php

}

// single page add to cart text change
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');
function woocommerce_custom_single_add_to_cart_text()
{
  return __('ADICIONAR', 'woocommerce');
}


// change order of short description
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
//remove sale on product page
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);


add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);


/**
 * Change related product text
 */
function li_add_subtitle_in_single_page()
{
  global $product;

  echo "<p>" . get_post_meta(get_the_ID(), 'subtitle', true) . "</p>";
}

add_action('woocommerce_single_product_summary', 'li_add_subtitle_in_single_page', 6);

function li_add_icons_in_single_page()
{
  global $product;
  if (have_rows('icons')):?>
    <div class="product-icon-wrapper row">


      <?php
      while (have_rows('icons')) : the_row();
        $sub_value = get_sub_field('icon_image'); ?>


        <div class="col-md-3 col-4">
          <div class="product-icon">
            <img src="<?php echo $sub_value; ?>" alt="" class="img-fluid top-logo">
          </div>
        </div>


      <?php
      endwhile; ?>
    </div>
  <?php

  endif;
}

add_action('woocommerce_single_product_summary', 'li_add_icons_in_single_page', 41);

/**
 * Change related product text
 */
function li_change_related_product_text($translated)
{
  $translated = str_replace('Related products', 'PRODUTOS RELACIONADOS', $translated);
  $translated = str_replace('Select options', 'COMPRAR', $translated);
  $translated = str_replace('Add to cart', 'COMPRAR', $translated);
  return $translated;
}

add_filter('gettext', 'li_change_related_product_text');


add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_bubble', 20 );
function add_percentage_to_sale_bubble( $html ) {
  global $product;
  $output="";
  if ($product->is_type('simple')) { //if simple product
    $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 ).'%';
    $disc_amt = round( ( ( $product->regular_price - $product->sale_price ) )  ).'';
    $output =' <span class="onsale"> Poupe '.$disc_amt.'???</span>';
  } else { //if variable product
//    $percentage = get_variable_sale_percentage( $product );
  }


  return $output;
}

function get_variable_sale_percentage( $product ) {
  //get variables
  $variation_min_regular_price    = $product->get_variation_regular_price('min', true);
  $variation_max_regular_price    = $product->get_variation_regular_price('max', true);
  $variation_min_sale_price       = $product->get_variation_sale_price('min', true);
  $variation_max_sale_price       = $product->get_variation_sale_price('max', true);


  //get highest and lowest percentages
  $lower_percentage   = round( ( ( $variation_min_regular_price - $variation_min_sale_price ) / $variation_min_regular_price ) * 100 );
  $higher_percentage  = round( ( ( $variation_max_regular_price - $variation_max_sale_price ) / $variation_max_regular_price ) * 100 );

  //sort array
  $percentages = array($lower_percentage, $higher_percentage);
  sort($percentages);

  if ($percentages[0] != $percentages[1] && $percentages[0]) {
    return $percentages[0].'% - '.$percentages[1].'%';
  } else {
    return $percentages[1].'%';
  }
}


// Display Privacy Checkbox on WooCommerce Registration Page
add_action( 'woocommerce_register_form', 'wpglorify_add_registration_privacy_policy', 11 );

function wpglorify_add_registration_privacy_policy() {

  woocommerce_form_field( 'privacy_policy_reg', array(
    'type'          => 'checkbox',
    'class'         => array('form-row privacy'),
    'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required'      => true,
    'label'         => 'I have read and accept the <a href="/politica-de-privacidade/"> Privacy Policy</a>.',
  ));

}

// Show error if the user does not tick
add_filter( 'woocommerce_registration_errors', 'wpglorify_validate_privacy_registration', 10, 3 );

function wpglorify_validate_privacy_registration( $errors, $username, $email ) {
  if ( ! (int) isset( $_POST['privacy_policy_reg'] ) ) {
    $errors->add( 'privacy_policy_reg_error', __( '?? necess??rio consentimento da Pol??tica de Privacidade!', 'woocommerce' ) );
  }
  return $errors;
}

//Add to cart to view product

add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_replace_add_to_cart_button', 10, 2 );
function ts_replace_add_to_cart_button( $button, $product ) {
  if (is_product_category() || is_shop()) {
    $button_text = __("Ver Produto", "woocommerce");
    $button_link = $product->get_permalink();

    $button = '<a href="' . $button_link . '">
                          <button class="product__inner__btn">Ver Produto</button>
                        </a>';
    return $button;
  }
}

//order minium amount

add_action( 'woocommerce_check_cart_items', 'required_min_cart_subtotal_amount' );
function required_min_cart_subtotal_amount() {

  // HERE Set minimum cart total amount
  $minimum_amount = 10;

  // Total (before taxes and shipping charges)
  $cart_subtotal = WC()->cart->subtotal;

  // Add an error notice is cart total is less than the minimum required
  if( $cart_subtotal < $minimum_amount  ) {
    // Display an error message
    wc_add_notice( '<strong>' . sprintf( __("A encomenda minima e %s."), wc_price($minimum_amount) ) . '<strong>', 'error' );
  }
}
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
  return array(
    'width' => 150,
    'height' => 150,
    'crop' => 0,
  );
} );
//force shop to show 3 column
add_filter('loop_shop_columns',function(){return 3;});



// newsletter css register

function letter_stylesheets(){
    wp_register_style('newsletter', get_template_directory_uri().'/inc/template/newsletter/newsletter.css',array(),1,'all');
    wp_enqueue_style('newsletter');
}
add_action('wp_enqueue_scripts','letter_stylesheets');