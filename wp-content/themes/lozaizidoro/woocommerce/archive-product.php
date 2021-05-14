<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>

  <section class="cat-banner">
    <?php $category = get_queried_object();?>
    <img src="<?php the_field('banner_image', 'product_cat_' . $category->term_id); ?>" alt="" class="img-fluid">
    <h1><?php the_field('banner_title', 'product_cat_' . $category->term_id); ?></h1>
    <p><?php the_field('banner_description', 'product_cat_' . $category->term_id); ?></p>
  </section>


  <div class="product-section search-side-product">
    <header class="woocommerce-products-header">
      <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title text-center"><?php woocommerce_page_title(); ?></h1>
      <?php endif; ?>

      <?php
      /**
       * Hook: woocommerce_archive_description.
       *
       * @hooked woocommerce_taxonomy_archive_description - 10
       * @hooked woocommerce_product_archive_description - 10
       */
      do_action('woocommerce_archive_description');
      ?>
    </header>
    <div class="container-fluid">
      <div class="row cat_list">

        <div class="col-lg-3 push-lg-9 col-md-4 push-md-8 col-sm-5 push-sm-7 col-12">
          <div class="product-page-category">


            <?php dynamic_sidebar('sidebar-1'); ?>


          </div>
        </div>
        <!--col-lg-9 pull-lg-3 col-md-8 pull-md-4 col-sm-7 pull-sm-5 col-12 shop-product-list 			 -->
        <div
            class=" col-lg-9 pull-lg-3 col-md-8 pull-md-4 col-sm-7 pull-sm-5 col-12 shop-product-list category-product">
          <div class="sorting">
            <?php
            if (woocommerce_product_loop()) {
              do_action('woocommerce_before_shop_loop');
            }
            ?>
          </div>
          <?php
          if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
// 							do_action( 'woocommerce_before_shop_loop' );

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
              while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');
              }
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
          } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action('woocommerce_no_products_found');
          }
          ?>
        </div>
      </div>
    </div>
  </div><!--product-content-section-->


<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer('shop');