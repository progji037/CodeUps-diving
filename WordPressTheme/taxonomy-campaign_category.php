<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-pc.jpg" media="(min-width: 768px)" />
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-sp.jpg" media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title">
      <h1 class="main-view__main-title">Campaign</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<section class="campaign-section page-campaign">
  <div class="campaign-section__inner inner">
    <!-- tab -->
    <div class="campaign-section__tab">
      <div class="tab-links">
        <ul class="tab-links__lists">
          <!-- ALL タブ（キャンペーンアーカイブページへのリンク） -->
          <li class="tab-links__list">
            <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="tab-link">
              ALL
            </a>
          </li>
          <?php
              // タクソノミー「campaign_category」の一覧を取得
              $terms = get_terms(array(
                  'taxonomy'   => 'campaign_category',
                  'hide_empty' => true,
              ));
               // 現在表示中のタームを取得
              $current_term = get_queried_object();
              foreach ($terms as $term):
              // 現在のタームと一致する場合はactiveクラスを追加
              $active_class = ($current_term->term_id == $term->term_id) ? 'active' : '';
            ?>
          <li class="tab-links__list">
            <a href="<?php echo get_term_link($term); ?>" class="tab-link <?php echo esc_attr($active_class); ?>">
              <?php echo esc_html($term->name); ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="campaign-section__content">
      <div class="campaign-section-cards">
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
            // ACFを使用してカスタムフィールドの取得
            $markdown        = get_field('campaign-card__markdown');
            $reduceprice     = get_field('campaign-card__reduced-price');
            $card__period    = get_field('campaign-card__period');
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
                    // 投稿IDから、その投稿に紐づくカテゴリーを取得
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
          endwhile;
          else:
        ?>
        <p>該当するキャンペーンはありません。</p>
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