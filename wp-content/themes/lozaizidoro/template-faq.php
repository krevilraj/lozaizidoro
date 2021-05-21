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
    <section class="all-header">
      <h1><?php the_title() ?></h1>
    </section>
    <div class="content-area">
      <main class=" default-page1">
        <div class="container">


          <section class="izidoro__faq">
            <h2><i class="fa fa-question-circle"></i>PRODUTOS</h2>
            <?php if (have_rows('produtos_faq')): ?>
              <div class="accordian">
                <div class="panel-group" id="accordion">
                  <?php $i = 0; ?>
                  <?php while (have_rows('produtos_faq')) : the_row();
                    $question = get_sub_field('question');
                    $answer = get_sub_field('answer'); ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#produtos_<?php echo $i; ?>">
                            <?php echo $question; ?>
                          </a>
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#produtos_<?php echo $i; ?>">
                            <i class="indicator fa fa-caret-down  pull-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="produtos_<?php echo $i; ?>" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p> <?php echo $answer; ?></p>
                        </div>
                      </div>
                    </div>
                    <?php $i++; endwhile; ?>

                </div>
              </div>
            <?php endif; ?>
          </section>

          <section class="izidoro__faq">
            <h2><i class="fa fa-question-circle"></i>ENTREGA</h2>
            <?php if (have_rows('entrega_faq')): ?>
              <div class="accordian">
                <div class="panel-group" id="accordion1">
                  <?php $i = 0; ?>
                  <?php while (have_rows('entrega_faq')) : the_row();
                    $question = get_sub_field('question1');
                    $answer = get_sub_field('answer1'); ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#entrega_<?php echo $i; ?>">
                            <?php echo $question; ?>
                          </a>
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#entrega_<?php echo $i; ?>"><i
                                class="indicator fa fa-caret-down  pull-right"></i></a>

                        </h4>
                      </div>
                      <div id="entrega_<?php echo $i; ?>" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p><?php echo $answer; ?></p>
                        </div>
                      </div>
                    </div>
                    <?php $i++; endwhile; ?>

                </div>
              </div>
            <?php endif; ?>
          </section>
          <section class="izidoro__faq">
            <h2><i class="fa fa-question-circle"></i>PAGAMENTOS</h2>
            <?php if (have_rows('entrega_faq')): ?>
              <div class="accordian">
                <div class="panel-group" id="accordion2">
                  <?php $i = 0; ?>
                  <?php while (have_rows('pagamentos_faq')) : the_row();
                    $question = get_sub_field('question2');
                    $answer = get_sub_field('answer2'); ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#pagamentos_<?php echo $i; ?>">
                            <?php echo $question; ?>
                          </a>
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                             href="#pagamentos_<?php echo $i; ?>"><i class="indicator fa fa-caret-down  pull-right"></i></a>
                        </h4>
                      </div>
                      <div id="pagamentos_<?php echo $i; ?>" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p><?php echo $answer; ?></p>
                        </div>
                      </div>
                    </div>
                    <?php $i++; endwhile; ?>

                </div>
              </div>
            <?php endif; ?>
          </section>

        </div>
      </main>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>