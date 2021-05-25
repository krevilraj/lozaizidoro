<?php
/*
Template Name: Contact
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
            <div class="row">
                <div class="col-md-6">
                    <div class="contact__info">
                        <h2>Contact Info</h2>

                        <div class="address__number">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="address__number__number">
                               <p>
                                   +35 111 122 111 <br/>
                                   +35 111 000 222
                               </p>
                            </div>
                        </div>

                        <div class="address__email">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="contact__email__email">
                                <p>
                                   info@domain.pt
                                </p>
                            </div>
                        </div>

                        <div class="address__address">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact__address__address">
                                <p>
                                    address here
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-6 contact__form__sec">
                    <h2>Contact Form</h2>

                     <?php echo do_shortcode(' [contact-form-7 id="495" title="Contact Page"] '); ?>
                </div>
            </div>
        </div>
      </main>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>