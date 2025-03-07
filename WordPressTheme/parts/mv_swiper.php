<div class="swiper fv__swiper js-fv-swiper">
  <div class="swiper-wrapper fv__slide-wrapper js-fv__slide-wrapper">
    <?php
    // カスタム投稿「mv_swiper」からスライドを取得
    $args = array(
        'post_type'      => 'mv_swiper', // カスタム投稿タイプ 'mv_swiper' を取得
        'posts_per_page' => -1,          // すべてのスライドを取得
        'orderby'        => 'date',      // 投稿日順に並び替え
        'order'          => 'DESC'       // 新しい投稿が先に表示される
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // アイキャッチ画像の取得
            $image_pc = get_the_post_thumbnail_url(get_the_ID(), 'full'); // PC用の大きい画像
              // ACFのSP用画像（カスタムフィールドから取得）
            $sp_image_id = get_field('sp_image');
            $image_sp = $sp_image_id ? wp_get_attachment_image_url($sp_image_id, 'full') : $image_pc;
    ?>
    <div class="swiper-slide fv__slide-image">
      <picture>
        <source srcset="<?php echo esc_url($image_pc); ?>" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo esc_url($image_sp); ?>" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo esc_url($image_sp); ?>" alt="<?php the_title(); ?>" />
      </picture>
    </div>
    <?php
        endwhile;
        wp_reset_postdata(); // クエリのリセット
    else :
        echo '<p>スライドがありませんよぉ。</p>';
    endif;
    ?>
  </div>

</div>