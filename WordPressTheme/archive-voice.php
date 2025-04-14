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
        <?php echo esc_html($post_type_obj->label);?>
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
        <?php
              global $wp; // 現在のページURLを取得

              $terms = get_terms(array(
                  'taxonomy'   => 'voice_tab',
                  'hide_empty' => true,
              ));
            ?>
        <ul class="tab-links__lists">
          <!-- ALL タブ（すべて表示用） -->
          <li class="tab-links__list">
            <a href="<?php echo esc_url(home_url($wp->request)); ?>" class="tab-link <?php echo empty($_GET['tab']) ? 'active' : ''; ?>">
              ALL
            </a>
          </li>

          <?php foreach ($terms as $term):
                    $tab_url = esc_url(add_query_arg('tab', $term->slug, home_url($wp->request)));
                    $active_class = (isset($_GET['tab']) && $_GET['tab'] === $term->slug) ? 'active' : '';
                ?>
          <li class="tab-links__list">
            <a href="<?php echo $tab_url; ?>" class="tab-link <?php echo esc_attr($active_class); ?>">
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
            // タブで選択されたタームスラッグを取得
              $selected_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : '';
              // 現在のページ番号を取得
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                  'post_type'      => 'voice',   // カスタム投稿タイプのスラッグ
                  'posts_per_page' => '6',        // 表示件数（-1 = 全件表示）
                  'post_status'    => 'publish', // 公開済みの投稿のみ取得
                  'orderby'        => 'date',    // 並び替えの基準（投稿日）
                  'order'          => 'DESC',    // 並び順（DESC = 新しい順 / ASC = 古い順）
                  'paged'          => $paged,    // 現在のページ番号を指定
                );
                // タブ（タクソノミー）による絞り込みがある場合
                if (!empty($selected_tab)) {
                  $args['tax_query'] = array(
                    array(
                      'taxonomy' => 'voice_tab',
                      'field'    => 'slug',
                      'terms'    => $selected_tab,
                    ),
                  );
                }
             $query = new WP_Query($args);
             if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__header">
              <div class="voice-card__body">
                <div class="voice-card__meta">
                  <div class="voice-card__meta-age">
                    <?php the_field('voice_age'); ?>
                  </div>
                  <div class="voice-card__meta-tag">
                    <?php the_field('voice_tag'); ?>
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
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // メインクエリへ戻す ?>
        <?php else : ?>
        <p>お客様の声はまだ投稿されていません。</p>
        <?php endif; ?>
      </div>
    </div>

    <div class="voice-section__pagination">
      <div class="pagination">
        <?php
            if (function_exists('wp_pagenavi')) {
              // WP-PageNaviのクエリを設定
              wp_pagenavi(array(
                'query' => $query
              ));
            }
            ?>
      </div>
    </div>
  </div>
  </div>
</section>

<?php get_footer(); ?>