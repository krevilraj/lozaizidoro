<footer class="footer">
  <p><a href="/politica-de-privacidade">Política de Privacidade </a>| <a href="/condicoes-gerais-de-utilizacao">Condições
      Gerais</a> © <?php echo date('Y') ?> <a href="#">digital
      connection</a></p>
</footer>

<section class="delivery_time" id="delivery_time">

  <h1>Delivery time</h1>
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
