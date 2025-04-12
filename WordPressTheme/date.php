<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
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
    <div class="main-view__title">
      <h1 class="main-view__main-title main-view__main-title--capitalize">
        Blog
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<section class="page-blog blog-section">
  <div class="blog-section__inner inner">
    <div class="blog-section__wrapper">
      <div class="blog-section__contents">
        <div class="blog-section__articles">
          <?php
          // 標準のWordPressループを使用（公開日ベース）
          if (have_posts()) : ?>
          <div class="blog-cards">
            <?php while (have_posts()) : the_post(); ?>
            <article class="blog-cards__item blog-card">
              <a href="<?php the_permalink(); ?>" class="blog-card__link">
                <div class="blog-card__image">
                  <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full'); ?>
                  <?php else : ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.png" alt="no image" />
                  <?php endif; ?>
                </div>
                <div class="blog-card__body">
                  <div class="blog-card__meta">
                    <time datetime="<?php echo get_the_date('c'); ?>" class="blog-card__date">
                      <?php echo get_the_date('Y.m.d'); ?>
                    </time>
                  </div>
                  <h3 class="blog-card__title"><?php the_title(); ?></h3>
                  <div class="blog-card__text">
                    <?php
                        // 投稿の本文を取得して文字数制限
                        $content = get_the_content();
                        $max_length = 90; // 文字数制限

                        // 文字数が制限を超えていたら、制限内の部分だけ表示
                        if (mb_strlen(strip_tags($content), 'UTF-8') > $max_length) {
                          $content = mb_substr(strip_tags($content), 0, $max_length, 'UTF-8') . '...';
                        }

                        echo wpautop($content); // 改行を反映して表示
                        ?>
                  </div>
                </div>
              </a>
            </article>
            <?php endwhile; ?>
          </div>

          <!-- ページネーション -->
          <div class="blog-section__pagination">
            <div class="pagination">
              <?php
                if (function_exists('wp_pagenavi')) {
                  wp_pagenavi();
                } else {
                  the_posts_pagination(array(
                    'prev_text' => '前へ',
                    'next_text' => '次へ'
                  ));
                }
                ?>
            </div>
          </div>
          <?php else : ?>
          <p>この期間の投稿はありません。</p>
          <?php endif; ?>
        </div>
      </div>

      <?php get_sidebar(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>