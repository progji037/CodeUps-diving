<?php get_header(); ?>

<section class="fv">
  <div class="fv__wrapper">
    <!-- <div class="fv__inner"> -->
    <div class="fv__title">
      <h1 class="fv__main-title">DIVING</h1>
      <p class="fv__sub-title">into the ocean</p>
    </div>
    <!--  -->
    <div class="fv__loading js-fv-loading fv-loading ">
      <div class="fv-loading__container">
        <div class="fv-loading__split-left">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split1.webp" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split1.webp" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split1.webp" alt="左側画像A" class="slide" />
          </picture>
        </div>
        <div class="fv-loading__split-right">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split2.webp" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split2.webp" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split2.webp" alt="右側画像A" class="slide" />
          </picture>
        </div>
      </div>
    </div>

    <div class="swiper fv__swiper js-fv-swiper">
      <div class="swiper-wrapper fv__slide-wrapper js-fv__slide-wrapper">
        <?php
          $i = 1;
          $has_slides = false;

          // 画像が存在する限りループを続ける
          while ($i <= 4) { // 最大4枚まで対応（必要に応じて調整）
            $image_pc = get_field('swiper_' . $i . 'pc');
            $image_sp = get_field('swiper_' . $i . 'sp');

            // どちらの画像も存在しない場合はループを終了
            if (!$image_pc && !$image_sp) {
              // 最初のスライドでなければループを終了
              if ($i > 1) {
                break;
              }
            } else {
              $has_slides = true;

              // 片方の画像が未登録の場合、もう一方を代用
              if (!$image_sp && $image_pc) {
                $image_sp = $image_pc; // SP画像がなければPC画像を使用
              } elseif (!$image_pc && $image_sp) {
                $image_pc = $image_sp; // PC画像がなければSP画像を使用
              }

              // 画像URLを取得
              $pc_url = is_array($image_pc) ? $image_pc['url'] : $image_pc;
              $sp_url = is_array($image_sp) ? $image_sp['url'] : $image_sp;
              $alt_text = is_array($image_pc) && isset($image_pc['alt']) ? $image_pc['alt'] :
                         (is_array($image_sp) && isset($image_sp['alt']) ? $image_sp['alt'] : '');
              ?>
        <!-- <?php echo $i; ?> -->
        <div class="swiper-slide fv__slide-image">
          <picture>
            <source srcset="<?php echo esc_url($pc_url); ?>" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo esc_url($sp_url); ?>" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo esc_url($sp_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
          </picture>
        </div>
        <?php
            }
            $i++;
          }

          // スライドが1つもない場合はデフォルト画像を表示
          if (!$has_slides) {
          ?>
        <!-- 1 -->
        <div class="swiper-slide fv__slide-image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp.jpg" alt="" />
          </picture>
        </div>
        <?php
          }
          ?>
      </div>
    </div>
  </div>
</section>
<!-- fv -->

<section class="campaign top-campaign">
  <div class="campaign__inner inner">
    <div class="campaign__title section-title">
      <div class="section-title__main">Campaign</div>
      <h2 class="section-title__sub">キャンペーン</h2>
    </div>
    <!-- swiper -->
    <div class="campaign-card__wrap">
      <div class="campaign__button campaign-button">
        <div class="campaign-button__slide">
          <div class="campaign__button-prev"></div>
          <!-- swiper-button-prev  -->
          <div class="campaign__button-next"></div>
          <!-- swiper-button-next  -->
        </div>
        <div class="swiper campaign__swiper js-top-swiper">
          <div class="swiper-wrapper">
            <?php
              // キャンペーン投稿を取得するクエリ
              $args = array(
                'post_type'      => 'campaign',
                'posts_per_page' => 8, // スライダーに表示する最大数
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
              );

              $campaign_query = new WP_Query($args);

              // 投稿がある場合
              if ($campaign_query->have_posts()) :
                while ($campaign_query->have_posts()) : $campaign_query->the_post();

                // ACFからカスタムフィールドの取得
                $card_tag = get_field('campaign-card__tag');
                $card_head = get_field('campaign-card__head');
                $markdown = get_field('campaign-card__markdown');
                $reduceprice = get_field('campaign-card__reduced-price');
            ?>
            <!-- 動的に生成されるスライド -->
            <div class="swiper-slide campaign__slide">
              <div class="campaign__card">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <?php
                      $post_id = get_the_ID();

                      if (has_post_thumbnail($post_id)) {
                        // 投稿IDを明示的に指定してアイキャッチ画像を取得
                        echo get_the_post_thumbnail($post_id, 'full');
                      } else {
                        // ACFから画像フィールドを取得（投稿IDを明示的に指定）
                        $image = get_field('campaign_image', $post_id);

                        if ($image) {
                          // ACFの画像フィールドから画像を表示
                          echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
                        } else {
                          // デフォルト画像
                          echo '<img src="' . get_theme_file_uri() . '/assets/images/common/noimage__comp.png" alt="no image" />';
                        }
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
                        <?php echo !empty($card_head) ? esc_html($card_head) : get_the_title(); ?>
                      </div>
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__title">
                        <p>全部コミコミ(お一人様)</p>
                      </div>
                      <div class="campaign-card__price">
                        <div class="campaign-card__markdown">
                          ¥<?php echo !empty($markdown) ? number_format(intval(str_replace(',', '', $markdown))) : '0'; ?>
                        </div>
                        <div class="campaign-card__reduced-price">
                          ¥<?php echo !empty($reduceprice) ? number_format(intval(str_replace(',', '', $reduceprice))) : '0'; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata(); // クエリのリセット
              else :
                // 投稿がない場合、デフォルトのスライドを表示
              ?>
            <!-- デフォルトスライド1 -->
            <div class="swiper-slide campaign__slide">
              <div class="campaign__card">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1-sp.jpg" alt="" />
                  </div>
                  <div class="campaign-card__textbox">
                    <div class="campaign-card__header">
                      <div class="campaign-card__tag">ライセンス講習</div>
                      <div class="campaign-card__head">ライセンス取得</div>
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__title">
                        <p>全部コミコミ(お一人様)</p>
                      </div>
                      <div class="campaign-card__price">
                        <div class="campaign-card__markdown">¥56,000</div>
                        <div class="campaign-card__reduced-price">
                          ¥46,000
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- デフォルトスライド2 -->
            <div class="swiper-slide campaign__slide">
              <div class="campaign__card">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2-sp.jpg" alt="" />
                  </div>
                  <div class="campaign-card__textbox">
                    <div class="campaign-card__header">
                      <div class="campaign-card__tag">体験ダイビング</div>
                      <div class="campaign-card__head">
                        貸切体験ダイビング
                      </div>
                    </div>
                    <div class="campaign-card__body">
                      <div class="campaign-card__title">
                        <p>全部コミコミ(お一人様)</p>
                      </div>
                      <div class="campaign-card__price">
                        <div class="campaign-card__markdown">¥24,000</div>
                        <div class="campaign-card__reduced-price">
                          ¥18,000
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="campaign__link campaign__link--top">
    <a class="button" href="<?php echo get_campaign_url(); ?>">
      View more
      <span class="arrow"></span>
    </a>
  </div>
</section>

<!--campaign-card  -->

<section class="about top-about">
  <div class="about__inner inner">
    <div class="about__title section-title">
      <div class="section-title__main">About us</div>
      <h2 class="section-title__sub">私たちについて</h2>
    </div>
    <div class="about__body">
      <div class="about__main">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-pc.jpg" media="(min-width: 768px)" />
          <!-- 幅768px以上なら表示 -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" media="(max-width: 767px)" />
          <!-- 幅767px以下なら表示 -->
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" alt="" />
        </picture>
      </div>
      <div class="about__sub">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-pc.jpg" media="(min-width: 768px)" />
          <!-- 幅768px以上なら表示 -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-sp.jpg" media="(max-width: 767px)" />
          <!-- 幅767px以下なら表示 -->
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-sp.jpg" alt="" />
        </picture>
      </div>
      <div class="about__contentsbox">
        <div class="about__content-title">Dive into <br />the Ocean</div>
        <div class="about__textbox">
          <div class="about__text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
          <div class="about__link">
            <a class="button" href="<?php echo get_about_url(); ?>">
              View more
              <span class="arrow"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.about -->

<section class="information top-info">
  <div class="information__inner inner">
    <div class="information__header section-title">
      <div class="section-title__main">Information</div>
      <h2 class="section-title__sub">ダイビング情報</h2>
    </div>
    <div class="information__contents">
      <div class="information__image mask-slide">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-ocean3-sp.jpg" alt="" />
      </div>
      <div class="information__textbox">
        <div class="information__head">ライセンス講習</div>
        <div class="information__text">
          <p>
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADI
            <br class="u-desktop" />
            の「正規店」として店舗登録されています。<br />
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
        </div>
        <div class="information__link">
          <a class="button" href="<?php echo get_information_url(); ?>">
            View more
            <span class="arrow"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- information -->

<section class="blog top-blog">
  <div class="blog__inner inner">
    <div class="blog__header section-title">
      <div class="section-title__main section-title__main--white">Blog</div>
      <h2 class="section-title__sub section-title__sub--white">ブログ</h2>
    </div>
    <div class="blog__cards cards">
      <?php
        // ブログ記事を取得するクエリ
        $args = array(
            'post_type'      => 'post', // 標準の投稿タイプ
            'posts_per_page' => 3,      // 表示する記事数（3つのカードを表示）
            'post_status'    => 'publish', // 公開済みの投稿のみ
            'orderby'        => 'date',
            'order'          => 'DESC'  // 最新の記事から表示
        );

        $blog_query = new WP_Query($args);

        // 投稿がある場合
        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post();

          // カスタムフィールドから日付を取得（ない場合は投稿日を使用）
          $blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
          if ($blog_date) {
              // カスタムフィールドの日付を整形
              $formatted_date = date('Y.m/d', strtotime($blog_date));
              $datetime_attr = date('c', strtotime($blog_date));
          } else {
              // 投稿日を使用
              $formatted_date = get_the_date('Y.m/d');
              $datetime_attr = get_the_date('c');
          }
        ?>
      <div class="cards__item">
        <a class="card" href="<?php the_permalink(); ?>">
          <div class="card__figure">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full'); ?>
            <?php else: ?>
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage__comp.png" alt="no image" />
            <?php endif; ?>
          </div>
          <div class="card__header">
            <div class="card__date">
              <time datetime="<?php echo esc_attr($datetime_attr); ?>">
                <?php echo esc_html($formatted_date); ?>
              </time>
            </div>
            <div class="card__heading"><?php the_title(); ?></div>
          </div>
          <div class="card__body">
            <div class="card__text">
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
      </div>
      <?php
            endwhile;
            wp_reset_postdata(); // クエリのリセット
        else :
            // 投稿がない場合、デフォルトのカードを表示
        ?>
      <!-- デフォルトカード1 -->
      <div class="cards__item">
        <a class="card" href="<?php the_permalink(); ?>">
          <div class="card__figure">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean4-sp.jpg" alt="" />
          </div>
          <div class="card__header">
            <div class="card__date">
              <time datetime="2023-11-17">2023.11/17</time>
            </div>
            <div class="card__heading">ライセンス取得</div>
          </div>
          <div class="card__body">
            <div class="card__text">
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </div>
        </a>
      </div>
      <!-- デフォルトカード2 -->
      <div class="cards__item">
        <a class="card" href="<?php the_permalink(); ?>">
          <div class="card__figure">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean5-sp.jpg" alt="" />
          </div>
          <div class="card__header">
            <div class="card__date">
              <time datetime="2023-11-17">2023.11/17</time>
            </div>
            <div class="card__heading">ウミガメと泳ぐ</div>
          </div>
          <div class="card__body">
            <div class="card__text">
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </div>
        </a>
      </div>
      <!-- デフォルトカード3 -->
      <div class="cards__item">
        <a class="card" href="<?php the_permalink(); ?>">
          <div class="card__figure">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean6-sp.jpg" alt="" />
          </div>
          <div class="card__header">
            <div class="card__date">
              <time datetime="2023-11-17">2023.11/17</time>
            </div>
            <div class="card__heading">カクレクマノミ</div>
          </div>
          <div class="card__body">
            <div class="card__text">
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
              </p>
            </div>
          </div>
        </a>
      </div>
      <?php endif; ?>
    </div>
    <div class="blog__link">
      <a class="button" href="<?php echo get_blog_url(); ?>">
        View more
        <span class="arrow"></span>
      </a>
    </div>
  </div>
</section>

<!-- blog -->

<section class="voice top-voice">
  <div class="voice__inner inner">
    <div class="voice__header section-title">
      <div class="section-title__main">Voice</div>
      <h2 class="section-title__sub">お客様の声</h2>
    </div>
    <div class="voice__cards voice-cards">
      <?php
        // お客様の声を取得するクエリ
        $args = array(
          'post_type'      => 'voice',  // voiceカスタム投稿タイプ
          'posts_per_page' => 2,        // 表示する投稿数（2つのカードを表示）
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC'    // 最新の投稿から表示
        );

        $voice_query = new WP_Query($args);

        // 投稿がある場合
        if ($voice_query->have_posts()) :
          while ($voice_query->have_posts()) : $voice_query->the_post();

            // カスタムフィールドから情報を取得
            $age_gender = get_field('voice_age');
            $tag = get_field('voice_tag');
            $title = get_field('voice_title') ? get_field('voice_title') : get_the_title();
            $content = get_field('voice_content') ? get_field('voice_content') : get_the_content();
        ?>
      <div class="voice-cards__item voice-card">
        <div class="voice-card__header">
          <div class="voice-card__body">
            <div class="voice-card__meta">
              <div class="voice-card__meta-age"><?php echo esc_html($age_gender); ?></div>
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
              <?php echo esc_html($title); ?>
            </div>
          </div>
          <div class="voice-card__image mask-slide">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full'); ?>
            <?php else : ?>
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-card/voice1.jpg" alt="" />
            <?php endif; ?>
          </div>
        </div>
        <div class="voice-card__text">
          <?php
              // 投稿の本文を取得して文字数制限
              $content = get_the_content();
              $max_length = 170; // 文字数制限を170字に設定
              // 文字数が制限を超えていたら、制限内の部分だけ表示
              if (mb_strlen(strip_tags($content), 'UTF-8') > $max_length) {
              $content = mb_substr(strip_tags($content), 0, $max_length, 'UTF-8') . '...';
              }
              echo wpautop($content); // 改行を反映して表示
            ?>
        </div>
      </div>
      <?php
          endwhile;
          wp_reset_postdata(); // クエリのリセット
        else :
          // 投稿がない場合、デフォルトのカードを表示（既存のコードをそのまま使用）
        ?>
      <!-- 1 -->
      <div class="voice-cards__item voice-card">
        <div class="voice-card__header">
          <div class="voice-card__body">
            <div class="voice-card__meta">
              <div class="voice-card__meta-age">20代(女性)</div>
              <div class="voice-card__meta-tag">ライセンス講習</div>
            </div>
            <div class="voice-card__title">
              ここにタイトルが入ります。ここにタイトル
            </div>
          </div>
          <div class="voice-card__image mask-slide">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-card/voice1.jpg" alt="" />
          </div>
        </div>
        <div class="voice-card__text">
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
            ここにテキストが入ります。ここにテキストが入ります。
          </p>
        </div>
      </div>
      <!-- 2 -->
      <div class="voice-cards__item voice-card">
        <div class="voice-card__header">
          <div class="voice-card__body">
            <div class="voice-card__meta">
              <div class="voice-card__meta-age">30代(男性)</div>
              <div class="voice-card__meta-tag">ファンダイビング</div>
            </div>
            <div class="voice-card__title">
              ここにタイトルが入ります。ここにタイトル
            </div>
          </div>
          <div class="voice-card__image mask-slide">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-card/voice2.jpg" alt="" />
          </div>
        </div>
        <div class="voice-card__text">
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
            ここにテキストが入ります。ここにテキストが入ります。
          </p>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="voice__link">
      <a class="button" href="<?php echo get_voice_url(); ?>">
        View more
        <span class="arrow"></span>
      </a>
    </div>
  </div>
</section>
<!-- voice -->

<section class="price top-price">
  <div class="price__inner inner">
    <div class="price__header section-title">
      <div class="section-title__main">Price</div>
      <h2 class="section-title__sub">料金一覧</h2>
    </div>
    <div class="price__content">
      <div class="price__image">
        <picture class="mask-slide">
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg" media="(min-width: 768px)" />
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" media="(max-width: 767px)" />
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" alt="" />
        </picture>
      </div>

      <div class="price__lists">
        <?php
          // front-page.php用のカスタム関数 - SP表示でも改行しない
          function convert_br_for_frontpage($string) {
            $string = esc_html($string); // XSS対策のためエスケープ
            // front-pageでは常に [br] を削除（SP表示でも改行しない）
            return str_replace('[br]', '', $string);
          }

          // 料金ページのIDを取得
          $price_page = get_page_by_path('price');
          $price_page_id = $price_page ? $price_page->ID : null;

          if ($price_page_id) {
            // 料金カテゴリーの配列
            $price_categories = [
              ['title' => 'ライセンス講習', 'field' => 'price_items1', 'menu' => 'price_menu1', 'cost' => 'price_cost1'],
              ['title' => '体験ダイビング', 'field' => 'price_items2', 'menu' => 'price_menu2', 'cost' => 'price_cost2'],
              ['title' => 'ファンダイビング', 'field' => 'price_items3', 'menu' => 'price_menu3', 'cost' => 'price_cost3'],
              ['title' => 'スペシャルダイビング', 'field' => 'price_items4', 'menu' => 'price_menu4', 'cost' => 'price_cost4']
            ];

            // 各カテゴリーの料金データを出力
            foreach ($price_categories as $category) {
              // SCFから料金データを取得
              $price_items = SCF::get($category['field'], $price_page_id);

              if (!empty($price_items)) {
                echo '<div class="price__list">';
                echo '<div class="price__list-title">' . esc_html($category['title']) . '</div>';
                echo '<dl class="price__costs">';

                foreach ($price_items as $item) {
                  $menu = isset($item[$category['menu']]) ? $item[$category['menu']] : '';
                  $cost = isset($item[$category['cost']]) ? $item[$category['cost']] : '';

                  if (!empty($menu) && !empty($cost)) {
                    // front-page専用の処理を使用（常に改行なし）
                    $menu = convert_br_for_frontpage($menu);
                    echo '<dt>' . $menu . '</dt>';
                    echo '<dd>¥' . number_format($cost) . '</dd>';
                  }
                }
                echo '</dl>';
                echo '</div>';
              }
            }
          }
          ?>
      </div>
    </div>
    <div class="price__link">
      <a class="button" href="<?php echo get_price_url(); ?>">
        View more
        <span class="arrow"></span>
      </a>
    </div>
  </div>
</section>
<!-- /.price -->

<?php get_footer(); ?>