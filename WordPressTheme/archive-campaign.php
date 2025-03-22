<?php get_header(); ?>

  <main>
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
                <a href="<?php echo get_post_type_archive_link('campaign'); ?>"
                  class="tab-link <?php echo empty($_GET['tab']) ? 'active' : ''; ?>">
                    ALL
                </a>
              </li>

              <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'campaign_tab',
                    'hide_empty' => true,
                ));

                foreach ($terms as $term):
                $tab_url = add_query_arg('tab', $term->slug, get_post_type_archive_link('campaign'));
                $active_class = (isset($_GET['tab']) && $_GET['tab'] === $term->slug) ? 'active' : '';
              ?>
              <li class="tab-links__list">
                <a href="<?php echo esc_url($tab_url); ?>" class="tab-link <?php echo esc_attr($active_class); ?>">
                  <?php echo esc_html($term->name); ?>
                </a>
              </li>
                  <?php endforeach; ?>
              </ul>
          </div>
        </div>

        <!-- campaign-cards -->
        <div class="campaign-section__content">
          <div class="campaign-section-cards ">
                <?php
                      // GETパラメータからタブ情報を取得
                      $current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : '';

                      // WP_Query の設定
                      $args = array(
                          'post_type'      => 'campaign',
                          'posts_per_page' => -1,
                          'order'          => 'DESC',
                          'tax_query'      => array(),
                      );

                      // タブ（campaign_tab）でフィルタリング
                      if (!empty($current_tab)) {
                          $args['tax_query'][] = array(
                              'taxonomy' => 'campaign_tab',
                              'field'    => 'slug',
                              'terms'    => $current_tab,
                          );
                      }

                      // クエリ実行
                      $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();

                          // 記事が所属するタクソノミーのスラッグを取得し、class に追加
                        $terms = get_the_terms(get_the_ID(), 'campaign_tab');
                        $term_classes = '';
                        if ($terms) {
                            foreach ($terms as $term) {
                                $term_classes .= ' tab-' . esc_attr($term->slug);
                            }
                        }

                        $card__image     = SCF::get('campaign-card__image');
                        $card__tag       = SCF::get('campaign-card__tag');
                        $card__head      = SCF::get('campaign-card__head');
                        $markdown        = SCF::get('campaign-card__markdown'); // 旧価格
                        $reduceprice     = SCF::get('campaign-card__reduced-price'); // 新価格
                        $card__text      = SCF::get('campaign-card__text');
                        $card__period    = SCF::get('campaign-card__period');
                ?>
              <div class="campaign-section-cards__card">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                  <?php
                    if (!empty($card__image)) {
                        echo wp_get_attachment_image($card__image, 'full'); // 画像を出力（サイズは 'full'）
                    }
                    ?>
                  </div>
                  <div class="campaign-card__textbox">
                    <div class="campaign-card__header">
                      <div class="campaign-card__tag">
                        <?php echo esc_html($card__tag); ?>
                      </div>
                      <div class="campaign-card__head">
                        <?php echo esc_html($card__head) ?>
                    </div>
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__title">
                        <p>全部コミコミ(お一人様)</p>
                      </div>
                      <div class="campaign-card__price">
                        <div class="campaign-card__markdown">¥<?php echo number_format(intval(str_replace(',', '', $markdown))); ?></div>
                        <div class="campaign-card__reduced-price"><?php echo number_format(intval(str_replace(',', '', $reduceprice))); ?></div>
                      </div>
                      <div class="campaign-card__detail">
                        <div class="campaign-card__text">
                          <p>
                            <?php echo nl2br(esc_html($card__text)); ?>
                          </p>
                        </div>
                        <div class="campaign-card__visit">
                          <div class="campaign-card__period">
                            <span>
                              <?php  echo esc_html($card__period)?>
                            </span>
                            <p>ご予約・お問い合わせはコチラ</p>
                          </div>
                          <div class="campaign__link campaign__link--blog">
                            <a class="button" href="<?php the_permalink(); ?>">
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
                    wp_reset_postdata(); // ループ後は必ずリセット
                  endif;
                  ?>
          </div>
        </div>
        <div class="campaign-section-card__pagination">
          <div class="pagination">
            <div class="pagination__list pagination__list--left"><a href="#"></a></div>
            <ul class="pagination__lists">
              <li class="pagination__list"><a href="#" class="is-active">1</a></li>
              <li class="pagination__list"><a href="#">2</a></li>
              <li class="pagination__list"><a href="#">3</a></li>
              <li class="pagination__list"><a href="#">4</a></li>
              <li class="pagination__list pagination__list--pc"><a href="#">5</a></li>
              <li class="pagination__list pagination__list--pc"><a href="#">6</a></li>
            </ul>
            <div class="pagination__list pagination__list--right"><a href="#"></a></div>
          </div>
        </div>
        <div class="campaign-section-card__pagination">
          <?php wp_pagenavi(); ?>
      </div>
    </section>

<?php get_footer() ?>