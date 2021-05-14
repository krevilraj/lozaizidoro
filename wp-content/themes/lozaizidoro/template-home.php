<?php

/*
Template Name: Home Page
*/
get_header();
?>

<!-- home hero section open -->
<section class="slider owl-carousel owl-theme">
  <div class="slider__item"
       style="background-image: url(<?php bloginfo('template_url'); ?>/images/slider.png); background-position: center center; background-repeat: no-repeat; ">
    <div class="slide__info">
      <h1 class="asdf">
        TÃO IRRESISTÍVEL QUE NÃO <br>
        VAIS QUERER FECHAR
      </h1>
      <button type="button" class="slider__btn">PRODUTOS</button>
    </div>
  </div>
</section>
<!-- home hero section end -->
<!-- offer section open -->
<section class="offer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 d-flex justify-content-center align-items-center offer__item">
        <div class="offer__detail order-2 order-md-1 wow fadeInDown" data-wow-duration="1s">
          <h2>PROMOÇÕES</h2>
          <button class="offer__btn">VER PRODUTOS</button>
        </div>
        <div class="offer-image order-1 order-md-2 wow flash" data-wow-duration="4s">
          <img src="<?php bloginfo('template_url'); ?>/images/promocoes.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-center align-items-center offer__item">
        <div class="offer__detail order-2 order-md-1 wow fadeInDown" data-wow-duration="1s">
          <h2>CABAZES</h2>
          <button class="offer__btn">VER PRODUTOS</button>
        </div>
        <div class="offer-image order-1 order-md-2 wow flash" data-wow-duration="4s">
          <img src="<?php bloginfo('template_url'); ?>/images/cabazes.png" class="img-fluid">
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
          <a href="#">
            <div class="item__name"><h2>o takgante</h2></div>
            <div class="food__image">
              <img src="<?php bloginfo('template_url'); ?>/images/food-1.png" alt="img" class="img-fluid">
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
          <a href="#">
            <div class="item__name"><h2>o takgante</h2></div>
            <div class="food__image">
              <img src="<?php bloginfo('template_url'); ?>/images/food-2.png" alt="img" class="img-fluid">
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
          <a href="#">
            <div class="item__name"><h2>o takgante</h2></div>
            <div class="food__image">
              <img src="<?php bloginfo('template_url'); ?>/images/food-3.png" alt="img" class="img-fluid">
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


<?php $slug = array('o-talhante', 'o-charcuteiro', 'o-merceeiro','produtos-veggie','promocoes','cabazes') ?>

<?php
$i = 0;
foreach ($slug as $cat_slug) {
  $catObj = get_term_by('slug', $cat_slug, 'product_cat');
  $catName = $catObj->name;
  ?>
  <?php if ($i % 2 == 0): ?>
    <!-- otalhante product open -->
    <section class="otalhante">
      <div class="container-fluid">
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="otalhante__left__img"></div>
          </div>
          <div class="col-md-9">

            <h2 class="wow bounce" data-wow-duration="4s"><?php echo $catName; ?></h2>
            <div class="row product-list">
              <?php
              $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 3, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
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
                        <button class="product__inner__btn">COMPRAR</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_query(); ?>

            </div>
            <div class="see-more">
              <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- otalhante product end -->

  <?php else: ?>
    <!-- ocharcuteiro product open -->
    <section class="ocharcuteiro">
      <div class="container-fluid">
        <div class="row no-gutters">
          <div class="col-md-9">
            <h2 class="wow bounce" data-wow-duration="4s"><?php echo $catName; ?></h2>
            <div class="row product-list">
              <?php
              $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 3, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
              $loop = new WP_Query($args);

              while ($loop->have_posts()) : $loop->the_post();
                global $product;
                ?>
                <div class="col-md-4">
                  <div class="product wow fadeInDown" data-wow-duration="1s">
                    <div class="product__image">
                      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="" class="img-fluid">
                    </div>
                    <div class="product__detail">
                      <div class="product__name">
                        <h3><a href="<?php the_title()?>"> <?php the_title()?></a></h3>
                      </div>
                      <div class="product__price">
                        <p><?php echo $product->get_price_html(); ?></p>
                      </div>
                      <div class="product__btn">
                        <button class="product__inner__btn">COMPRAR</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_query(); ?>

            </div>
            <div class="see-more">
              <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
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

<!-- otalhante product open -->
<section class="otalhante">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-3">
        <div class="otalhante__left__img"></div>
      </div>
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">otalhante</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- otalhante product end -->

<!-- ocharcuteiro product open -->
<section class="ocharcuteiro">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">ocharcuteiro</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/ochu-pro.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/ochu-pro.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/ochu-pro.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
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


<!-- otalhante product open -->
<section class="otalhante omerceeiro">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-3">
        <div class="otalhante__left__img"></div>
      </div>
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">omerceeiro</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/mercee.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/mercee.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/mercee.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- otalhante product end -->
<!-- ocharcuteiro product open -->
<section class="ocharcuteiro produtos__veggie">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">produtos veggie</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/prod.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/prod.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/prod.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="ocharcuteiro__right__iamge"></div>
      </div>
    </div>
  </div>
</section>
<!-- ocharcuteiro product end -->

<!-- otalhante product open -->
<section class="otalhante promocoes_home">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-3">
        <div class="otalhante__left__img"></div>

      </div>
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">PROMOÇÕES</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/otalhante-1.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- otalhante product end -->
<!-- ocharcuteiro product open -->
<section class="ocharcuteiro cabazes__h">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-9">
        <h2 class="wow bounce" data-wow-duration="4s">CABAZES</h2>
        <div class="row product-list">
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/sd.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/sd.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product wow fadeInDown" data-wow-duration="1s">
              <div class="product__image">
                <img src="<?php bloginfo('template_url'); ?>/images/sd.png" alt="" class="img-fluid">
              </div>
              <div class="product__detail">
                <div class="product__name">
                  <h3>NOME PRODUTO</h3>
                </div>
                <div class="product__price">
                  <p>0,00€</p>
                </div>
                <div class="product__btn">
                  <button class="product__inner__btn">COMPRAR</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="see-more">
          <a href="#">todos os PRODUTOS <i class="fa fa-long-arrow-right"></i></a>
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
<?php get_footer() ?>
