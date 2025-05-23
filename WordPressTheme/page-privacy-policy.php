<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-terms-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-terms-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-mv-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title ">
      <h1 class="main-view__main-title">
        Privacy Policy
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<div class="privacy-policy page-privacy-policy">
  <div class="privacy-policy__inner inner">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="privacy-policy__content">
      <h2 class="privacy-policy__title"><?php the_title();?></h2>
      <div class="privacy-policy__text">
        <?php the_content(); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>