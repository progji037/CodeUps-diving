<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="main-view">
      <div class="main-view__contents">
        <div class="main-view__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-mv-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-mv-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-mv-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="main-view__title ">
          <h1 class="main-view__main-title main-view__main-title--capitalize">
            <?php the_title();?>
          </h1>
        </div>
      </div>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('parts/breadcrumb')?>

  <!-- 料金表 -->
      <section class="page-price price-section">
        <div class="price-section__inner inner">
          <div class="price-lists">
            <div class="price-lists__item">
            <!-- ライセンス講習 -->
              <?php
                // SCFから料金データを取得
                $price_items = SCF::get('price_items1');

                if (!empty($price_items)) :
                ?>
                    <div class="price-list">
                      <div class="price-list__head">
                        <div class="price-list__head-image">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
                        </div>
                        <h3 class="price-list__head-title">
                          ライセンス講習
                        </h3>
                      </div>
                      <div class="price-list__menu">
                            <?php
                              function convert_br_for_device($string, $is_sp = true) {
                                $string = esc_html($string); // XSS対策のためエスケープ

                                if ($is_sp) {
                                    // スマホなら `[br]` を <br class="u-mobile"> に変換
                                    return str_replace('[br]', '<br class="u-mobile">', $string);
                                } else {
                                    // PCなら `[br]` を削除
                                    return str_replace('[br]', '', $string);
                                }
                            }
                          ?>
                        <dl class="price-list__costs">
                            <?php
                            foreach ($price_items as $item) :
                                $menu = isset($item['price_menu1']) ? $item['price_menu1'] : '';
                                $cost = isset($item['price_cost1']) ? $item['price_cost1'] : '';

                                if (!empty($menu) && !empty($cost)) :
                                    $is_sp = wp_is_mobile(); // WordPressのスマホ判定
                                    $menu = convert_br_for_device($menu, $is_sp);
                            ?>
                                <dt><?php echo $menu; ?></dt>
                                <dd>¥<?php echo number_format($cost); ?></dd>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </dl>
                      </div>
                    </div>
                  </div>
              <?php endif; ?>
               <!-- 体験ダイビング -->
            <div class="price-lists__item">
              <?php
                // SCFから料金データを取得
                $price_items = SCF::get('price_items2');

                if (!empty($price_items)) :
                ?>
                    <div class="price-list">
                      <div class="price-list__head">
                        <div class="price-list__head-image">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
                        </div>
                        <h3 class="price-list__head-title">
                        体験ダイビング
                        </h3>
                      </div>
                      <div class="price-list__menu">
                        <dl class="price-list__costs">
                            <?php
                            foreach ($price_items as $item) :
                                $menu = isset($item['price_menu2']) ? $item['price_menu2'] : '';
                                $cost = isset($item['price_cost2']) ? $item['price_cost2'] : '';

                                if (!empty($menu) && !empty($cost)) :
                                    $is_sp = wp_is_mobile(); // WordPressのスマホ判定
                                    $menu = convert_br_for_device($menu, $is_sp);
                            ?>
                                <dt><?php echo $menu; ?></dt>
                                <dd>¥<?php echo number_format($cost); ?></dd>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </dl>
                      </div>
                    </div>
                  </div>
              <?php
              endif;
              ?>

              <!-- ファンダイビング -->
              <?php
                // SCFから料金データを取得
                $price_items = SCF::get('price_items3');

                if (!empty($price_items)) :
                ?>
                  <div class="price-lists__item">
                    <div class="price-list">
                      <div class="price-list__head">
                        <div class="price-list__head-image">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
                        </div>
                        <h3 class="price-list__head-title">
                        ファンダイビング
                        </h3>
                      </div>
                      <div class="price-list__menu">
                        <dl class="price-list__costs">
                          <?php
                              foreach ($price_items as $item) :
                                $menu = isset($item['price_menu3']) ? $item['price_menu3'] : '';
                                $cost = isset($item['price_cost3']) ? $item['price_cost3'] : '';

                                if (!empty($menu) && !empty($cost)) :
                                    $is_sp = wp_is_mobile(); // WordPressのスマホ判定
                                    $menu = convert_br_for_device($menu, $is_sp);
                            ?>
                              <dt><?php echo ($menu); ?></dt>
                              <dd>¥<?php echo number_format($cost); ?></dd>
                          <?php
                              endif;
                          endforeach;
                          ?>
                        </dl>
                      </div>
                    </div>
                  </div>
              <?php
              endif;
              ?>
              <!-- スペシャルダイビング -->
              <?php
                // SCFから料金データを取得
                $price_items = SCF::get('price_items4');

                if (!empty($price_items)) :
                ?>
                  <div class="price-lists__item">
                    <div class="price-list">
                      <div class="price-list__head">
                        <div class="price-list__head-image">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
                        </div>
                        <h3 class="price-list__head-title">
                        スペシャルダイビング
                        </h3>
                      </div>
                      <div class="price-list__menu">
                        <dl class="price-list__costs">
                          <?php
                            foreach ($price_items as $item) :
                              $menu = isset($item['price_menu4']) ? $item['price_menu4'] : '';
                              $cost = isset($item['price_cost4']) ? $item['price_cost4'] : '';

                              if (!empty($menu) && !empty($cost)) :
                                  $is_sp = wp_is_mobile(); // WordPressのスマホ判定
                                  $menu = convert_br_for_device($menu, $is_sp);
                          ?>
                            <dt><?php echo ($menu); ?></dt>
                            <dd>¥<?php echo number_format($cost); ?></dd>
                          <?php
                              endif;
                          endforeach;
                          ?>
                        </dl>
                      </div>
                    </div>
                  </div>
              <?php
              endif;
              ?>
          </div>
        </div>
      </section>


<?php get_footer(); ?>
