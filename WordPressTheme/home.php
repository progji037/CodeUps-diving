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
      <?php
        $post_type = get_post_type(); // 現在の投稿タイプを取得
        $post_type_obj = get_post_type_object($post_type);
        ?>
      <h1 class="main-view__main-title">
        <?php
        if ($post_type === 'post') {
            echo 'Blog'; // 投稿タイプが「投稿（post）」なら Blog に変更
        } else {
            echo esc_html($post_type_obj->label); // その他の投稿タイプは通常のラベルを表示
        }
        ?>
      </h1>
    </div>

  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<section class="page-blog blog-section">
  <div class="blog-section__inner inner">
    <div class="blog-section__wrapper">
      <div class="blog-section__main">
        <div class="blog-section__container">
          <div class="blog-section__cards">
            <div class="cards cards--blog">
              <?php
                // 有効な投稿があるかどうかを追跡する変数
                $has_valid_posts = false;

                // 投稿があるかチェック
                if (have_posts()) {
                  // 投稿をループ処理
                  while (have_posts()) {
                    the_post();

                    // 必要なデータが揃っているかチェック
                    $content = get_the_content();
                    $title = get_the_title();

                    // 必要なデータがすべて揃っている場合のみ表示
                    if (!empty($content) && !empty($title)) {
                      $has_valid_posts = true; // 有効な投稿があることを記録
              ?>
              <div class="cards__item">
                <a class="card" href="<?php the_permalink(); ?>">
                  <div class="card__figure card__figure--hover">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage__comp.png" alt="no image" />
                    <?php endif; ?>
                  </div>
                  <div class="card__header card__header--low">
                    <div class="card__date">
                      <?php
                        $blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
                        if ($blog_date) {
                          // `blog_date` が "20231117" のような形式の場合、正しい日付フォーマットに変換
                          $formatted_date = date('Y.m/d', strtotime($blog_date));
                          $datetime_attr = date('c', strtotime($blog_date));
                        } else {
                          // カスタムフィールドが空なら投稿の公開日を使う
                          $formatted_date = get_the_date('Y.m/d');
                          $datetime_attr = get_the_date('c');
                        }
                        ?>
                      <time datetime="<?php echo esc_attr($datetime_attr); ?>">
                        <?php echo esc_html($formatted_date); ?>
                      </time>
                    </div>
                    <div class="card__heading"><?php the_title(); ?></div>
                  </div>
                  <div class="card__body">
                    <div class="card__text">
                      <?php
                        $max_length = 90; // 文字数制限
                        if (mb_strlen(strip_tags($content), 'UTF-8') > $max_length) {
                            $content = mb_substr(strip_tags($content), 0, $max_length, 'UTF-8'); // 超えた分を削除
                        }
                        echo wpautop($content); // 改行を反映して表示
                      ?>
                    </div>
                  </div>
                </a>
              </div>
              <?php
                    }
                  } // while ループの終了

                  // いずれの場合も有効な投稿がなければメッセージを表示
                  if (!$has_valid_posts) {
                    echo '<p>記事がありません。</p>';
                  }
                } else {
                  // 投稿がない場合
                  echo '<p>記事がありません。</p>';
                }
              ?>
            </div>
          </div>
        </div>
        <div class="blog-section__pagination blog-section__pagination--pc">
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
      </div>
      <aside class="blog-section__sidebar">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>