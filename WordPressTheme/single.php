<?php get_header(); ?>

<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title ">
      <h1 class="main-view__main-title main-view__main-title--capitalize">blog</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<section class="page-blog-detail blog-section">
  <div class="blog-section__inner inner">
    <div class="blog-section__wrapper">
      <div class="blog-section__main">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="blog-section__container">
          <div class="blog-detail">
            <div class="blog-detail__head">
              <div class="blog-detail__head-date">
                <?php echo get_the_date('Y.m.d'); ?>
              </div>
              <h1 class="blog-detail__head-title"><?php the_title(); ?></h1>
            </div>
            <div class="blog-detail__image">
              <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              <?php endif; ?>
            </div>
            <div class="blog-detail__contents">
              <?php the_content(); ?>
            </div>
          </div>

          <div class="blog-detail__pagination">
            <div class="pagination">
              <div class="pagination__list pagination__list--left">
                <?php
                  $prev_post = get_previous_post(false); // 同一カテゴリを無視
                  if ($prev_post):
                      $prev_url = get_permalink($prev_post->ID);
                      // 前の記事へのリンク - アイコンのみ表示だがaria-labelでアクセシビリティ対応
                      echo '<a href="' . esc_url($prev_url) . '" aria-label="前の記事: ' . esc_attr($prev_post->post_title) . '"></a>';
                  endif;
                ?>
              </div>
              <div class="pagination__list pagination__list--right">
                <?php
                  $next_post = get_next_post(false); // 同一カテゴリを無視
                  if ($next_post):
                      $next_url = get_permalink($next_post->ID);
                      // 次の記事へのリンク - アイコンのみ表示だがaria-labelでアクセシビリティ対応
                      echo '<a href="' . esc_url($next_url) . '" aria-label="次の記事: ' . esc_attr($next_post->post_title) . '"></a>';
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <aside class="blog-section__sidebar">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>