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
        price
      </h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<!-- 料金表 -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<section class="page-price price-section">
  <div class="price-section__inner inner">
    <div class="price-lists">
      <?php
      // 表示用関数を定義
      function convert_br_for_device($string) {
        $string = esc_html($string);
        if (wp_is_mobile()) {
          return str_replace('[br]', '<br class="u-mobile">', $string);
        } else {
          return str_replace('[br]', '', $string);
        }
      }
      ?>

      <!-- 料金一覧 / ファンダイビング -->
      <?php if (SCF::get('price_title1')) : ?>
      <div class="price-lists__item">
        <div class="price-list">
          <div class="price-list__head">
            <div class="price-list__head-image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
            </div>
            <h3 class="price-list__head-title">
              <?php echo esc_html(SCF::get('price_title1')); ?>
            </h3>
          </div>
          <div class="price-list__menu">
            <dl class="price-list__costs">
              <?php
              $price_items1 = SCF::get('price_items1');
              if ($price_items1) :
                foreach ($price_items1 as $item) :
                  $menu = isset($item['price_menu1']) ? $item['price_menu1'] : '';
                  $cost = isset($item['price_cost1']) ? $item['price_cost1'] : '';
                  if ($menu && $cost) :
              ?>
              <dt><?php echo convert_br_for_device($menu); ?></dt>
              <dd>¥<?php echo number_format((int)$cost); ?></dd>
              <?php
                  endif;
                endforeach;
              endif;
              ?>
            </dl>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- 料金一覧 / 体験ダイビング -->
      <?php if (SCF::get('price_title2')) : ?>
      <div class="price-lists__item">
        <div class="price-list">
          <div class="price-list__head">
            <div class="price-list__head-image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
            </div>
            <h3 class="price-list__head-title">
              <?php echo esc_html(SCF::get('price_title2')); ?>
            </h3>
          </div>
          <div class="price-list__menu">
            <dl class="price-list__costs">
              <?php
              $price_items2 = SCF::get('price_items2');
              if ($price_items2) :
                foreach ($price_items2 as $item) :
                  $menu = isset($item['price_menu2']) ? $item['price_menu2'] : '';
                  $cost = isset($item['price_cost2']) ? $item['price_cost2'] : '';
                  if ($menu && $cost) :
              ?>
              <dt><?php echo convert_br_for_device($menu); ?></dt>
              <dd>¥<?php echo number_format((int)$cost); ?></dd>
              <?php
                  endif;
                endforeach;
              endif;
              ?>
            </dl>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- 料金一覧 / ファンダイビング -->
      <?php if (SCF::get('price_title3')) : ?>
      <div class="price-lists__item">
        <div class="price-list">
          <div class="price-list__head">
            <div class="price-list__head-image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
            </div>
            <h3 class="price-list__head-title">
              <?php echo esc_html(SCF::get('price_title3')); ?>
            </h3>
          </div>
          <div class="price-list__menu">
            <dl class="price-list__costs">
              <?php
              $price_items3 = SCF::get('price_items3');
              if ($price_items3) :
                foreach ($price_items3 as $item) :
                  $menu = isset($item['price_menu3']) ? $item['price_menu3'] : '';
                  $cost = isset($item['price_cost3']) ? $item['price_cost3'] : '';
                  if ($menu && $cost) :
              ?>
              <dt><?php echo convert_br_for_device($menu); ?></dt>
              <dd>¥<?php echo number_format((int)$cost); ?></dd>
              <?php
                  endif;
                endforeach;
              endif;
              ?>
            </dl>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- 料金一覧 / スペシャルダイビング -->
      <?php if (SCF::get('price_title4')) : ?>
      <div class="price-lists__item">
        <div class="price-list">
          <div class="price-list__head">
            <div class="price-list__head-image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-price-whale.svg" alt="クジラのアイコン">
            </div>
            <h3 class="price-list__head-title">
              <?php echo esc_html(SCF::get('price_title4')); ?>
            </h3>
          </div>
          <div class="price-list__menu">
            <dl class="price-list__costs">
              <?php
              $price_items4 = SCF::get('price_items4');
              if ($price_items4) :
                foreach ($price_items4 as $item) :
                  $menu = isset($item['price_menu4']) ? $item['price_menu4'] : '';
                  $cost = isset($item['price_cost4']) ? $item['price_cost4'] : '';
                  if ($menu && $cost) :
              ?>
              <dt><?php echo convert_br_for_device($menu); ?></dt>
              <dd>¥<?php echo number_format((int)$cost); ?></dd>
              <?php
                  endif;
                endforeach;
              endif;
              ?>
            </dl>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>