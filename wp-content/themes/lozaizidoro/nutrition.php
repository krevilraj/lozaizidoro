<?php
/**
 * Template Name: Nutrition
 *
 * Team template.
 *
 * @since   1.0.0
 *
 * @package lojaizidoro
 */
?>



<?php
$datas = array();

if (!has_term(33, 'product_cat')) {
  echo get_post_meta(get_the_ID(), 'informacao_nutricional_produto', true);
} else {

  if (have_rows('informacao_nutricional')):?>
    <ul class="clearfix basketbox">
      <?php
      while (have_rows('informacao_nutricional')) : the_row();
        $sub_value = get_sub_field('heading'); ?>
        <li class="animit">
          <a data-fancybox data-src="#<?php echo sanitize_title($sub_value); ?>"
             href="javascript:;"><?php echo $sub_value; ?></a>
        </li>


      <?php
      endwhile; ?>
    </ul>
  <?php

  endif;
  wp_reset_postdata();

  ?>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

  <?php
  $datas = array();
  if (have_rows('informacao_nutricional')):?>
    <div class="basketDetails">
      <?php
      while (have_rows('informacao_nutricional')) : the_row();
        $sub_value = get_sub_field('heading');
        $sub_des = get_sub_field('description'); ?>

        <div style="display: none;" id="<?php echo sanitize_title($sub_value); ?>">
          <?php echo $sub_des; ?>
        </div>

      <?php endwhile; ?>
    </div>
  <?php

  endif;
  wp_reset_postdata();
}
?>

