<div class="blog-sidebar">
  <div class="blog-sidebar__inner">
    <div class="blog-sidebar__container">
      <div class="blog-sidebar__article">
        <div class="sidebar-article">
          <div class="sidebar-article__head">
            <div class="sidebar-head">
              <div class="sidebar-head__title">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="whale">
                <h2 class="sidebar-head__text">
                  人気記事
                </h2>
              </div>
            </div>
          </div>
          <div class="sidebar-article__cards">
            <div class="article-cards">
              <div class="article-cards__item">
                <?php
                  // 投稿の条件を設定（初期値と同じなので変更なし）
                  $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                  );
                  $query = new WP_Query($args);
                  $has_valid_posts = false; // 有効な投稿があるかどうかを追跡

                  if ($query->have_posts()) {
                    while ($query->have_posts()) {
                      $query->the_post();
                      // 必要なデータが揃っているかチェック
                      $content = get_the_content();
                      $title = get_the_title();

                      if (!empty($content) && !empty($title)) {
                        $has_valid_posts = true; // 有効な投稿があることを記録
                ?>
                <a class="article-card" href="<?php echo esc_url(get_permalink()); ?>">
                  <div class="article-card__item">
                    <div class="article-card__image">
                      <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(array(121, 90)); ?>
                      <?php else: ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage__comp.png" alt="no image" />
                      <?php endif; ?>
                    </div>
                    <div class="article-card__meta">
                      <?php
                        $blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
                        if ($blog_date) {
                          $formatted_date = date('Y.m.d', strtotime($blog_date));
                          $datetime_attr = date('c', strtotime($blog_date));
                        } else {
                          $formatted_date = get_the_date('Y.m.d');
                          $datetime_attr = get_the_date('c');
                        }
                      ?>
                      <time datetime="<?php echo esc_attr($datetime_attr); ?>">
                        <?php echo esc_html($formatted_date); ?>
                      </time>
                      <p>
                        <?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 14, '', 'UTF-8'); ?>
                      </p>
                    </div>
                  </div>
                </a>
                <?php
                      }
                    }
                    wp_reset_postdata();

                    // 有効な投稿がない場合
                    if (!$has_valid_posts) {
                      echo '<p>記事がありません。</p>';
                    }
                  } else {
                    echo '<p>記事がありません。</p>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-sidebar__review">
        <div class="sidebar-review">
          <div class="sidebar-review__head">
            <div class="sidebar-head">
              <div class="sidebar-head__title">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
                <h2 class="sidebar-head__text">
                  口コミ
                </h2>
              </div>
            </div>
          </div>
          <?php
              // 投稿の条件を設定（初期値と同じなので変更なし）
              $args = array(
              'post_type'      => 'voice',
              'posts_per_page' => 1,
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'          => 'DESC',
              );
              // 投稿を実際に取り出す
              $query = new WP_Query($args);
              $has_valid_posts = false; // 有効な投稿があるかどうかを追跡

              if ($query->have_posts()) {
                while ($query->have_posts()) {
                  $query->the_post();
                  // 必要なデータが揃っているかチェック
                  $voice_age = get_field('voice_age');
                  $content = get_the_content();
                  $title = get_the_title();

                  if (!empty($voice_age) && !empty($content) && !empty($title)) {
                    $has_valid_posts = true; // 有効な投稿があることを記録
          ?>
          <div class="sidebar-review__voice">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(array(294, 218)); ?>
            <?php else: ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimage__comp.png" alt="no image" />
            <?php endif; ?>
            <p>
              <?php the_field('voice_age'); ?>
            </p>
            <div class="sidebar-review__title">
              <?php the_title(); ?>
            </div>
          </div>
          <?php
                  }
                }
                wp_reset_postdata();

                // 有効な投稿がない場合
                if (!$has_valid_posts) {
                  echo '<p>記事がありません。</p>';
                }
              } else {
                echo '<p>記事がありません。</p>';
              }
          ?>
          <div class="sidebar-review__link">
            <a class="button" href="<?php echo esc_url( get_post_type_archive_link( 'voice' ) ); ?>">
              View more
              <span class="arrow"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="blog-sidebar__campaign">
        <div class="sidebar-campaign">
          <div class="sidebar-campaign__head">
            <div class="sidebar-head">
              <div class="sidebar-head__title">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
                <h2 class="sidebar-head__text">
                  キャンペーン
                </h2>
              </div>
            </div>
          </div>
          <?php
              // 投稿の条件を設定（初期値と同じなので変更なし）
              $args = array(
              'post_type'      => 'campaign',
              'posts_per_page' => 2,
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'          => 'DESC',
              );

              // 投稿を実際に取り出す
              $query = new WP_Query($args);
              $has_valid_posts = false; // 有効な投稿があるかどうかを追跡

              if ($query->have_posts()) {
                while ($query->have_posts()) {
                  $query->the_post();
                  // 必要なデータが揃っているかチェック
                  $markdown = get_field('campaign-card__markdown');
                  $reduceprice = get_field('campaign-card__reduced-price');
                  $content = get_the_content();
                  $title = get_the_title();

                  if (!empty($markdown) && !empty($reduceprice) && !empty($content) && !empty($title)) {
                    $has_valid_posts = true; // 有効な投稿があることを記録
              ?>
          <div class="sidebar-campaign__cards">
            <div class="sidebar-campaign-lists">
              <div class="sidebar-campaign-list__card campaign-card">
                <div class="campaign-card__image campaign-card__image--blog">
                  <?php
                    if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                    } else {
                    echo '<img src="' . get_theme_file_uri() . '/assets/images/common/noimage__comp.png" alt="no image" />';
                    }
                    ?>
                </div>
                <div class="campaign-card__textbox campaign-card__textbox--blog">
                  <div class="campaign-card__header">
                    <div class="campaign-card__head campaign-card__head--blog">
                      <?php the_title(); ?>
                    </div>
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaign-card__title campaign-card__title--blog">
                      <p>全部コミコミ(お一人様)</p>
                    </div>
                    <div class="campaign-card__price campaign-card__price--blog">
                      <div class="campaign-card__markdown campaign-card__markdown--blog">
                        <?php
                          if (!empty($markdown)) {
                            echo '¥' . number_format(intval(str_replace(',', '', $markdown)));
                          }
                        ?>
                      </div>
                      <div class="campaign-card__reduced-price campaign-card__reduced-price--blog">
                        <?php
                          if (!empty($reduceprice)) {
                            echo '¥' . number_format(intval(str_replace(',', '', $reduceprice)));
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
                  }
                }
                wp_reset_postdata();

                // 有効な投稿がない場合
                if (!$has_valid_posts) {
                  echo '<p>記事がありません。</p>';
                }
              } else {
                echo '<p>記事がありません。</p>';
              }
              ?>
          <div class="sidebar-campaign__link ">
            <a class="button" href="<?php echo esc_url( get_post_type_archive_link( 'campaign' ) ); ?>">
              View more
              <span class="arrow"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="blog-sidebar__archive">
        <div class="sidebar-archive">
          <div class="sidebar-archive__head">
            <div class="sidebar-head">
              <div class="sidebar-head__title">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
                <h2 class="sidebar-head__text">
                  アーカイブ
                </h2>
              </div>
            </div>
          </div>
          <div class="sidebar-archive__date">
            <div class="archive-date">
              <?php
                  global $wpdb;
                  // 公開された投稿がある年を取得
                  $years = $wpdb->get_col("
                  SELECT DISTINCT YEAR(post_date)
                  FROM $wpdb->posts
                  WHERE post_status = 'publish'
                  AND post_type = 'post'
                  ORDER BY post_date DESC
                  ");
                  // 各年のアーカイブを表示
                  foreach ($years as $year) :
                  ?>
              <div class="archive-date__lists">
                <div class="date-lists">
                  <a class="date-lists__year js-date-lists__year" href="<?php echo get_year_link($year); ?>"><?php echo $year; ?></a>
                  <ul class="date-lists__months js-date-lists__months">
                    <?php
                      // その年の月を取得
                      $months = $wpdb->get_results("
                      SELECT DISTINCT MONTH(post_date) as month
                      FROM $wpdb->posts
                      WHERE post_status = 'publish'
                      AND post_type = 'post'
                      AND YEAR(post_date) = '$year'
                      ORDER BY month DESC
                      ");
                      // 各月のアーカイブを表示
                      foreach ($months as $month) :
                      $month_num = $month->month;
                      // 月の名前（例：1月、2月）を取得
                      $month_name = date_i18n('n月', mktime(0, 0, 0, $month_num, 1, $year));
                      ?>
                    <li><a class="date-lists__month" href="<?php echo get_month_link($year, $month_num); ?>"><?php echo $month_name; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>