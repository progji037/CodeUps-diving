<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-voice-mv.-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-voice-mv.-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-voice-mv.-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title">
      <?php
        $post_type = get_post_type(); // 現在の投稿タイプを取得
        $post_type_obj = get_post_type_object($post_type);
      ?>
      <h1 class="main-view__main-title">
        Voice
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<!-- voice -->
<section class="voice-section page-voice">
  <div class="voice-section__inner inner">
    <div class="voice-section__tab">
      <div class="tab-links">
        <ul class="tab-links__lists">
          <!-- ALL タブ（アーカイブページへのリンク） -->
          <li class="tab-links__list">
            <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="tab-link <?php echo is_post_type_archive('voice') ? 'active' : ''; ?>">
              ALL
            </a>
          </li>
          <?php
          // voice_category タクソノミーの一覧を取得（CPT UIで作成したタクソノミー）
          $terms = get_terms(array(
            'taxonomy'   => 'voice_category',
            'hide_empty' => true,
          ));

          foreach ($terms as $term):
          ?>
          <li class="tab-links__list">
            <a href="<?php echo get_term_link($term, 'voice_category'); ?>" class="tab-link">
              <?php echo esc_html($term->name); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="voice-section__container">
      <div class="voice-cards">
        <?php
        // 有効な投稿があるかどうかを追跡する変数
        $has_valid_posts = false;

        if (have_posts()) :
          while (have_posts()) : the_post();

            // 必要なデータが揃っているかチェック
            $user_info = get_field('ユーザー区分');
            $voice_gender = $user_info ? $user_info['voice_gender'] : '';
            $voice_age = $user_info ? $user_info['voice_age'] : '';
            $content = get_the_content();
            $has_terms = get_the_terms(get_the_ID(), 'voice_category');

            // 基本的なデータがある場合は表示（非公開でもOK）
            if (!empty($voice_gender) && !empty($voice_age) &&
                !empty($content) && !empty($has_terms) && !is_wp_error($has_terms)) {
              $has_valid_posts = true; // 有効な投稿があることを記録
        ?>
        <div class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__header">
              <div class="voice-card__body">
                <div class="voice-card__meta">
                  <div class="voice-card__meta-age">
                    <?php echo esc_html($voice_age) . '(' . esc_html($voice_gender) . ')'; ?>
                  </div>
                  <div class="voice-card__meta-tag">
                    <?php
                      // 投稿IDから、その投稿に紐づくカテゴリーを取得
                      $terms = get_the_terms(get_the_ID(), 'voice_category');

                      if (!empty($terms) && !is_wp_error($terms)) {
                        // 複数ある場合は最初の一つだけ出す
                        $term = array_shift($terms);
                        echo esc_html($term->name);
                      }
                      ?>
                  </div>
                </div>
                <div class="voice-card__title">
                  <?php the_title(); ?>
                </div>
              </div>
              <div class="voice-card__image mask-slide">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
                <?php else: ?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/noimage__comp.png" alt="No Image">
                <?php endif; ?>
              </div>
            </div>
            <div class="voice-card__text">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php
            }
          endwhile;
        endif;

        // 投稿がない、または有効な投稿がない場合
        if (!have_posts() || !$has_valid_posts) {
          echo '<p>お客様の声はまだ投稿されていません。</p>';
        }
        ?>
      </div>
    </div>

    <div class="voice-section__pagination">
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
</section>

<?php get_footer(); ?>