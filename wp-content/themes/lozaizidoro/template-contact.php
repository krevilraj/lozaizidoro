<?php
/*
Template Name: Faq
*/

get_header();
?>


<?php
// If there are any posts
if (have_posts()):

  // Load posts loop
  while (have_posts()): the_post();
    ?>
    <section class="all-header__faq">
      <h1><?php the_title() ?></h1>
    </section>
    <div class="content-area__faq">
      <main class=" default-page1">
        <div class="container">

        </div>
      </main>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>