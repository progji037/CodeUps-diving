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
          <img src="<?php echo get_theme_file_uri(); ?>/<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv-sp.jpg" alt="" />
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
  <div class="breadcrumb page-breadcrumb">
    <div class="breadcrumb__inner inner">
      <?php
    $breadcrumb_title = get_field('breadcrumb_title'); // ACFのフィールドを取得

    if (!empty($breadcrumb_title)) {
      echo esc_html($breadcrumb_title); // ACFの値があれば表示
    } else {
      // Breadcrumb NavXTが有効な場合のみ表示
      if (function_exists('bcn_display')) {
        bcn_display();
      } else {
        echo '<p class="breadcrumb-default">TOP > キャンペーン</p>'; // 代替テキストを表示
      }
    }
    ?>
    </div>
  </div>

  <!-- キャンペーン -->
  <section class="campaign-section page-campaign">
    <div class="campaign-section__inner inner">
      <!-- tab -->
      <?php
            $terms = get_terms(array(
                'taxonomy' => 'diving_category',
                'hide_empty' => true,
            ));
            $current_category = isset($_GET['category']) ? $_GET['category'] : 'all';
          ?>
      <div class="campaign-section__tab">
        <div class="tab-links">
          <ul class="tab-links__lists">
            <li class="tab-links__list"><a href="?category=all" class="<?php echo ($current_category == 'all') ? 'active' : ''; ?>">ALL</a></li>
            <?php foreach ($terms as $term) : ?>
            <li class="tab-links__list">
              <a href="?category=<?php echo $term->slug; ?>" class="<?php echo ($current_category == $term->slug) ? 'active' : ''; ?>">
                <?php echo $term->name; ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <!-- campaign-cards -->
      <div class="campaign-section__content">
        <!-- campaign-cards -->
        <div class="campaign-section__content">
          <div class="campaign-section-cards">
            <?php
                  $args = array(
                      'post_type'      => 'campaign',
                      'posts_per_page' => 4,
                  );

                  if ($current_category !== 'all') {
                      $args['tax_query'] = array(
                          array(
                              'taxonomy' => 'diving_category',
                              'field'    => 'slug',
                              'terms'    => $current_category,
                          ),
                      );
                  }

                  $query = new WP_Query($args);
                ?>
            <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>

            <!-- キャンペーンカード -->
            <div class="campaign-section-cards__card">
              <div class="campaign-card">
                <div class="campaign-card__image">
                  <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full'); ?>
                  <?php else : ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default.jpg" alt="No Image">
                  <?php endif; ?>
                </div>
                <div class="campaign-card__textbox">
                  <div class="campaign-card__header">
                    <div class="campaign-card__tag">
                      <?php
                          $terms = get_the_terms(get_the_ID(), 'diving_category');
                          if ($terms && !is_wp_error($terms)) {
                              echo esc_html($terms[0]->name);
                          }
                        ?>
                    </div>
                    <div class="campaign-card__head"><?php echo esc_html(get_post_meta(get_the_ID(), 'campaign_category', true)); ?></div>
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__title">
                      <p>全部コミコミ(お一人様)</p>
                    </div>
                    <div class="campaign-card__price">
                      <div class="campaign-card__markdown">¥<?php echo esc_html(get_post_meta(get_the_ID(), 'old_price', true)); ?></div>
                      <div class="campaign-card__reduced-price">¥<?php echo esc_html(get_post_meta(get_the_ID(), 'new_price', true)); ?></div>
                    </div>
                    <div class="campaign-card__detail">
                      <div class="campaign-card__text">
                        <p><?php the_content(); ?></p>
                      </div>
                      <div class="campaign-card__visit">
                        <div class="campaign-card__period">
                          <span><?php echo esc_html(get_post_meta(get_the_ID(), 'period', true)); ?></span>
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
            <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
            <p>該当する投稿がありません。</p>
            <?php endif; ?>>
          </div>
        </div>

        <div class="campaign-section-card__pagination">
          <div class="pagination">
            <?php wp_pagenavi(); ?>
          </div>
        </div>
      </div>
  </section>
</main>

<?php get_footer(); ?>