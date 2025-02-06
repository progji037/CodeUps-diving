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
      <h1 class="main-view__main-title main-view__main-title--capitalize"><?php the_title();?></h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<div class="privacy-policy page-privacy-policy">
  <div class="privacy-policy__inner inner">
    <div class="privacy-policy__content">
      <h2 class="privacy-policy__title"><?php the_title();?></h2>
      <div class="privacy-policy__text">
        <?php
        // ACFカスタムフィールドの内容を出力
        if (function_exists('get_field')) {
          echo get_field('privacy-policy_1');
        }
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>