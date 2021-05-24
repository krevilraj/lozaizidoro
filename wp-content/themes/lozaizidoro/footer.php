<footer class="footer">
  <p><a href="/politica-de-privacidade">Política de Privacidade </a>| <a href="/condicoes-gerais-de-utilizacao">Condições
      Gerais</a> © <?php echo date('Y') ?> <a href="#">digital
      connection</a></p>
</footer>

<section class="delivery_time" id="delivery_time">
  <div class="container">
    <div class="row">
      <div class="col-md-4 items">
        <div class="d-flex align-items-center">
          <div class="img-wrapper"><img src="<?php bloginfo('template_url'); ?>/images/entregas-02.png" alt=""
                                        class="mr-3 img-fluid"></div>
          <h5>Portes gratuitos pares encomendas a partir de 25€</h5>
        </div>
      </div>
      <div class="col-md-4 items">
        <div class="d-flex align-items-center">
          <div class="img-wrapper"><img src="<?php bloginfo('template_url'); ?>/images/entregas-02.png" alt=""
                                        class="mr-3 img-fluid"></div>
          <h5>Encomendas mínimas de 10€</h5>
        </div>
      </div>
      <div class="col-md-4 items">
        <div class="d-flex align-items-center">
          <div class="img-wrapper"><img src="<?php bloginfo('template_url'); ?>/images/entregas-02.png" alt=""
                                        class="mr-3 img-fluid"></div>
          <h5>Entregas na região de Lisboa</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
    .delivery_time {
        background: red;
        padding: 50px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        transform: translateY(100%);
        transition: all .5s ease;
    }
    .delivery_time .img-wrapper{
       max-width:160px;
    }

    .fadein {
        transition: all .5s ease;
        transform: translateY(0);
    }
</style>

<?php wp_footer(); ?>
<script>
  $(window).bind('mousewheel', function (event) {
    if (event.originalEvent.wheelDelta >= 0) {
      $("#delivery_time").addClass('fadein');
    } else {

      $("#delivery_time").removeClass('fadein');

    }
  });
</script>

</body>
</html>
