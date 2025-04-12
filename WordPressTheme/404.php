<?php get_header(); ?>

<!-- パンくずリスト -->
<section class="error page-error">
  <?php get_template_part('parts/breadcrumb')?>
  <!-- error -->

  <div class="error__container">
    <div class="error__inner inner">
      <h2 class="error__title">404</h2>
      <div class="error__text">申し訳ありません。<br />お探しのページが見つかりません。</div>
      <div class="error__link">
        <a class="button button--white" href="<?php echo esc_url(home_url('/')); ?>">
          Page TOP
          <span class="arrow arrow--white"></span>
        </a>
      </div>
    </div>
  </div>

</section>


<?php get_footer(); ?>