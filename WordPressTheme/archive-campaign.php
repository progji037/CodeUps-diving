<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title">
      <?php
            $post_type = get_post_type(); // 現在の投稿タイプを取得
            $post_type_obj = get_post_type_object($post_type);
            ?>
      <h1 class="main-view__main-title">
        <?php echo esc_html($post_type_obj->label);?>
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<!-- キャンペーン -->
<section class="campaign-section page-campaign">
  <div class="campaign-section__inner inner">
    <!-- tab -->
    <div class="campaign-section__tab">
      <div class="tab-links">
        <ul class="tab-links__lists">
          <!-- ALL タブ（すべて表示用） -->
          <li class="tab-links__list">
            <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="tab-link <?php echo is_post_type_archive('campaign') ? 'active' : ''; ?>">
              ALL
            </a>
          </li>
          <?php
            $terms = get_terms(array(
                'taxonomy'   => 'campaign_category',
                'hide_empty' => true,
            ));
            foreach ($terms as $term):
            // タクソノミーページへの直接リンクを生成
            $term_link = get_term_link($term);
            ?>
          <li class="tab-links__list">
            <a href="<?php echo esc_url($term_link); ?>" class="tab-link">
              <?php echo esc_html($term->name); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- campaign-cards -->
    <div class="campaign-section__content">
      <div class="campaign-section-cards">
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();

            // ACFを使用してカスタムフィールドの取得
            $markdown = get_field('campaign-card__markdown');
            $reduceprice = get_field('campaign-card__reduced-price');
            $card__period = get_field('campaign-card__period');

            // すべてのカスタムフィールドが入力されているかチェック
            if (!empty($markdown) && !empty($reduceprice) && !empty($card__period)) {
              // すべてのフィールドが入力されている場合のみ表示
              ?>
        <div class="campaign-section-cards__card">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <?php
                if (has_post_thumbnail()) {
                  // アイキャッチ画像を表示
                  the_post_thumbnail('full');
                } else {
                  // アイキャッチ画像がない場合はデフォルト画像を表示
                  echo '<img src="' . get_theme_file_uri() . '/assets/images/common/noimage__comp.png" alt="no image" />';
                }
              ?>
            </div>
            <div class="campaign-card__textbox">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <?php
                        // 投稿IDから、その投稿に紐づくキャンペーンカテゴリーを取得
                        $terms = get_the_terms(get_the_ID(), 'campaign_category');

                        if (!empty($terms) && !is_wp_error($terms)) {
                          // 複数ある場合は最初の一つだけ出す
                          $term = array_shift($terms);
                          echo esc_html($term->name);
                      }
                        ?>
                </div>
                <div class="campaign-card__head">
                  <?php echo get_the_title(); ?>
                </div>
              </div>
              <div class="campaign-card__body">
                <div class="campaign-card__title">
                  <p>全部コミコミ(お一人様)</p>
                </div>
                <div class="campaign-card__price">
                  <div class="campaign-card__markdown">
                    ¥<?php echo number_format(intval(str_replace(',', '', $markdown))); ?>
                  </div>
                  <div class="campaign-card__reduced-price">
                    ¥<?php echo number_format(intval(str_replace(',', '', $reduceprice))); ?>
                  </div>
                </div>
                <div class="campaign-card__detail">
                  <div class="campaign-card__text">
                    <p>
                      <?php the_content(); ?>
                    </p>
                  </div>
                  <div class="campaign-card__visit">
                    <div class="campaign-card__period">
                      <span>
                        <?php echo esc_html($card__period)?>
                      </span>
                      <p>ご予約・お問い合わせはコチラ</p>
                    </div>
                    <div class="campaign__link campaign__link--blog">
                      <a class="button" href="<?php echo get_contact_url(); ?>">
                        Contact us
                        <span class="arrow"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            } else {
              // 1つでもフィールドが入力されていない場合は何も表示しない
              // ここでは何も出力しないことで、後で「投稿がありません」を表示するための準備をします
              $has_valid_posts = false;
            }
            endwhile;
            // 有効な投稿があるかどうかをチェック
            if (isset($has_valid_posts) && $has_valid_posts === false) {
              echo '<p>キャンペーンはありません。</p>';
            }
          else;
            ?>
        <p>キャンペーンはありません。</p>
        <?php
          endif;
        ?>
      </div>
    </div>
    <div class="campaign-section-card__pagination">
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