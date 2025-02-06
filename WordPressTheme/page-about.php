<?php get_header(); ?>
<main>
  <!-- 下層ページのメインビュー -->
  <section class="main-view">
    <div class="main-view__contents">
      <div class="main-view__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-pc.jpg" media="(min-width: 768px)" />
          <!-- 幅768px以上なら表示 -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-sp.jpg" media="(max-width: 767px)" />
          <!-- 幅767px以下なら表示 -->
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-sp.jpg" alt="" />
        </picture>
      </div>
      <div class="main-view__title">
        <h1 class="main-view__main-title"><?php the_title();?></h1>
      </div>
    </div>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb')?>

  <section class="about-section page-about">
    <div class="about-section__inner inner">
      <div class="about-section__body">
        <div class="about-section__main">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="about-section__sub">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-pc.jpg" alt="">
        </div>
        <div class="about-section__content-title">Dive into <br />the Ocean</div>
        <div class="about-section__text">
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
          </p>
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /.about -->

  <section class="gallery-section page-galley">
    <div class="gallery-section__inner inner">
      <div class="gallery-section__title section-title">
        <div class="section-title__main">Gallery</div>
        <h2 class="section-title__sub">フォト</h2>
      </div>
      <div class="gallery-section__grid">
        <div class="gallery-section-grid">
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery1.jpg" alt="#"></div>
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery2.jpg" alt="#"></div>
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery3.jpg" alt="#"></div>
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery4.jpg" alt="#"></div>
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery5.jpg" alt="#"></div>
          <div class="gallery-section-grid__image js-gallery-section-grid__image"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/gallery6.jpg" alt="#"></div>
        </div>
      </div>
    </div>
    <!-- modal -->
    <div class="gallery-section-modal js-gallery-section-modal">
      <span class="gallery-section-modal__close js-gallery-section-modal__close">&times;</span>
      <img class="gallery-section-modal__content js-gallery-section-modal__content" src="dammy.jpg" alt="dammy">
    </div>
  </section>

</main>


<?php get_footer(); ?>