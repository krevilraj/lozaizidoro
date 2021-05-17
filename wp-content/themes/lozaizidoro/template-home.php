<?php

/*
Template Name: Home Page
*/
get_header();
?>

<!-- home hero section open -->
<section class="slider owl-carousel owl-theme">

  <?php $loop = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => -1)); ?>
  <?php while ($loop->have_posts()) : $loop->the_post(); ?>

    <div class="slider__item"
         style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); background-position: center center; background-repeat: no-repeat; ">
      <div class="slide__info">
        <?php the_content() ?>
        <a href="<?php echo get_field('link') ?>"></a>
        <button type="button" class="slider__btn">PRODUTOS</button>
      </div>
    </div>

  <?php endwhile;
  wp_reset_query(); ?>


</section>
<!-- home hero section end -->
<!-- offer section open -->
<section class="offer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 d-flex justify-content-center align-items-center offer__item">
        <div class="offer__detail order-2 order-md-1 wow fadeInDown" data-wow-duration="1s">

          <h2><?php echo get_theme_mod('offer_title_setting'); ?> </h2>

          <button class="offer__btn"><a href="<?php echo get_theme_mod('offer_link_setting_control'); ?> ">VER
              PRODUTOS</a></button>
          <!--  show pen for edit  -->
          <span id="first_offer_edit"></span>
        </div>
        <div class="offer-image order-1 order-md-2 wow flash" data-wow-duration="4s">
          <img src="<?php echo get_theme_mod('first_offer_image'); ?> " class="img-fluid">
        </div>

      </div>

      <div class="col-md-6 d-flex justify-content-center align-items-center offer__item">
        <div class="offer__detail order-2 order-md-1 wow fadeInDown" data-wow-duration="1s">
          <h2><?php echo get_theme_mod('second_offer_title_setting'); ?> </h2>
          <button class="offer__btn"><a href="<?php echo get_theme_mod('second_offer_link_setting'); ?>">VER
              PRODUTOS</a></button>

        </div>

        <div class="offer-image order-1 order-md-2 wow flash" data-wow-duration="4s">
          <!--  show pen for edit  -->
          <span id="second_offer_edit"></span>
          <img src="<?php echo get_theme_mod('second_offer_image'); ?>" class="img-fluid">

        </div>
      </div>
    </div>
  </div>
</section>
<!-- offer section end -->
<!-- three food open -->
<section class="three-food">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-4">
        <!-- normal -->
        <div class="ih-item square effect4">
          <a href="<?php echo get_theme_mod('li_category_link1'); ?>">
            <div class="item__name"><h2><?php echo get_theme_mod('li_category_title1'); ?></h2></div>
            <div class="food__image">
              <img src="<?php echo get_theme_mod('li_category_image1'); ?>" alt="img" class="img-fluid">
            </div>
            <div class="info">
              <button class="product__btn">VER PRODUTOS</button>
            </div>
          </a>
        </div>
        <!-- end normal -->
      </div>
      <div class="col-md-4">
        <!-- normal -->
        <div class="ih-item square effect4">
          <a href="<?php echo get_theme_mod('li_category_link2'); ?>">
            <div class="item__name"><h2><?php echo get_theme_mod('li_category_title2'); ?></h2></div>
            <div class="food__image">
              <img src="<?php echo get_theme_mod('li_category_image2'); ?>" alt="img" class="img-fluid">
            </div>
            <div class="info">
              <button class="product__btn">VER PRODUTOS</button>
            </div>
          </a>
        </div>
        <!-- end normal -->
      </div>
      <div class="col-md-4">
        <!-- normal -->
        <div class="ih-item square effect4">
          <a href="<?php echo get_theme_mod('li_category_link3'); ?>">
            <div class="item__name"><h2><?php echo get_theme_mod('li_category_title3'); ?></h2></div>
            <div class="food__image">
              <img src="<?php echo get_theme_mod('li_category_image3'); ?>" alt="img" class="img-fluid">
            </div>
            <div class="info">
              <button class="product__btn">VER PRODUTOS</button>
            </div>
          </a>
        </div>
        <!-- end normal -->
      </div>
    </div>
  </div>
</section>
<!-- three food close  -->


<?php $slug = array('o-talhante', 'o-charcuteiro', 'o-merceeiro', 'produtos-veggie', 'promocoes', 'cabazes') ?>

<?php
$i = 0;
foreach ($slug as $cat_slug) {
  $catObj = get_term_by('slug', $cat_slug, 'product_cat');
  $catName = $catObj->name;
  $category_link = get_category_link( $catObj->term_id );
  ?>
  <?php if ($i % 2 == 0): ?>
    <!-- otalhante product open -->
    <section class="otalhante"
             style="background-color:<?php the_field('background_color', 'product_cat_' . $catObj->term_id); ?>">
      <div class="container-fluid">
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="otalhante__left__img"></div>
          </div>
          <div class="col-md-9">
            <?php
            $changed_cat_name = $catName;
            if ($catName[0] == "o" || $catName[0] == "O") {
              $str1 = substr($catName, 1);
              $changed_cat_name = '<span>O' . '</span>' . trim($str1);
            }
            ?>
            <h2 class="wow bounce" data-wow-duration="4s"><span id="txt-<?php echo $catObj->slug; ?>"
                                                                style="color:<?php the_field('text_color', 'product_cat_' . $catObj->term_id); ?>"><?php echo $changed_cat_name; ?></span>
            </h2>
            <style>
                #txt-<?php echo $catObj->slug;?> span {
                    border-bottom: 7px solid<?php the_field('text_color', 'product_cat_' . $catObj->term_id); ?>
                }
            </style>
            <div class="row product-list">
              <?php
              $meta_query = WC()->query->get_meta_query();
              $tax_query = WC()->query->get_tax_query();
              $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
              );
              $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 3,'tax_query' => $tax_query, 'meta_query' => $meta_query, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
              $loop = new WP_Query($args);

              while ($loop->have_posts()) : $loop->the_post();
                global $product;
                ?>
                <div class="col-md-4">
                  <div class="product wow fadeInDown" data-wow-duration="1s">
                    <div class="product__image">
                      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>"
                           alt="<?php the_title() ?>" class="img-fluid">
                    </div>
                    <div class="product__detail">
                      <div class="product__name">
                        <h3><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></h3>
                      </div>
                      <div class="product__price">
                        <p><?php echo $product->get_price_html(); ?></p>
                      </div>
                      <div class="product__btn">
                        <a href="<?php echo $product->add_to_cart_url() ?>"
                           value="<?php echo esc_attr($product->get_id()); ?>"
                           class="product__inner__btn ajax_add_to_cart add_to_cart_button"
                           data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>"
                           aria-label="Add “<?php the_title_attribute() ?>” to your cart">
                          <button class="product__inner__btn">COMPRAR</button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_query(); ?>

            </div>
            <div class="see-more">
              <a href="<?php echo $category_link;?>">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- otalhante product end -->

  <?php else: ?>
    <!-- ocharcuteiro product open -->
    <section class="ocharcuteiro"
             style="background-color:<?php the_field('background_color', 'product_cat_' . $catObj->term_id); ?>">
      <div class="container-fluid">
        <div class="row no-gutters">
          <div class="col-md-9">

            <?php
            $changed_cat_name = $catName;
            if ($catName[0] == "o" || $catName[0] == "O") {
              $str1 = substr($catName, 1);
              $changed_cat_name = '<span>O' . '</span>' . trim($str1);
            }
            ?>

            <h2 class="wow bounce" data-wow-duration="4s">
              <span id="txt-<?php echo $catObj->slug; ?>"
                    style="color:<?php the_field('text_color', 'product_cat_' . $catObj->term_id); ?>"><?php echo $changed_cat_name; ?></span>
            </h2>
            <style>
                #txt-<?php echo $catObj->slug;?> span {
                    border-bottom: 7px solid<?php the_field('text_color', 'product_cat_' . $catObj->term_id); ?>
                }
            </style>
            <div class="row product-list">
              <?php
              $meta_query = WC()->query->get_meta_query();
              $tax_query = WC()->query->get_tax_query();
              $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
              );
              $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 3, 'tax_query' => $tax_query, 'meta_query' => $meta_query, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
              $loop = new WP_Query($args);

              while ($loop->have_posts()) : $loop->the_post();
                global $product;
                ?>
                <div class="col-md-4">
                  <div class="product wow fadeInDown" data-wow-duration="1s">
                    <div class="product__image">
                      <a href="<?php echo the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt=""
                             class="img-fluid">
                      </a>
                    </div>
                    <div class="product__detail">
                      <div class="product__name">
                        <h3><a href="<?php the_permalink() ?>"> <?php the_title() ?></a></h3>
                      </div>
                      <div class="product__price">
                        <p><?php echo $product->get_price_html(); ?></p>
                      </div>
                      <div class="product__btn">
                        <?php
                        if ($product->is_type('variable')):
                          ?>

                          <a href="<?php the_permalink(); ?>">
                            <button class="product__inner__btn">COMPRAR</button>
                          </a>
                        <?php else: ?>
                          <a href="<?php echo $product->add_to_cart_url() ?>"
                             value="<?php echo esc_attr($product->get_id()); ?>"
                             class="product__inner__btn ajax_add_to_cart add_to_cart_button"
                             data-product_id="<?php echo get_the_ID(); ?>"
                             data-product_sku="<?php echo esc_attr($sku) ?>"
                             aria-label="Add “<?php the_title_attribute() ?>” to your cart">
                            <button class="product__inner__btn">COMPRAR</button>
                          </a>

                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_query(); ?>

            </div>
            <div class="see-more">
              <a href="<?php echo $category_link;?>">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
            </div>

          </div>
          <div class="col-md-3">
            <div class="ocharcuteiro__right__iamge">
            </div>
            <!-- <img src="<?php bloginfo('template_url'); ?>/images/ocharcuteiro-img.png" alt="" class="img-fluid"> -->
          </div>
        </div>
      </div>
    </section>
    <!-- ocharcuteiro product end -->

  <?php endif; ?>


  <?php
  $i++;
}
?>

<?php get_footer() ?>
