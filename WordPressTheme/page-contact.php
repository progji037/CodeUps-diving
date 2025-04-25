<?php get_header(); ?>

<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pcx2.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pcx2.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pcx2.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title ">
      <h1 class="main-view__main-title main-view__main-title--capitalize">
        <?php the_field('mv_title'); ?>
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<!-- contact -->
<section class="contact-section page-low-contact">
  <div class="contact-section__inner inner">
    <?php echo do_shortcode('[contact-form-7 id="dbe1134" title="お問い合わせ"]'); ?>
  </div>
</section>

<?php get_footer(); ?>