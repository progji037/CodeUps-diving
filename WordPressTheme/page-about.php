<?php get_header(); ?>

<main>
  <!-- 下層ページのメインビュー -->
  <section class="main-view">
    <div class="main-view__contents">
      <div class="main-view__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-pc.jpg" media="(min-width: 768px)" />
          <!-- 幅768px以上なら表示 -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-sp.jpg" media="(max-width: 767px)" />
          <!-- 幅767px以下なら表示 -->
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-sp.jpg" alt="" />
        </picture>
      </div>
      <div class="main-view__title">
        <h1 class="main-view__main-title">
          About Us
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
        echo '<p class="breadcrumb-default">TOP > About</p>'; // 代替テキストを表示
      }
    }
    ?>
    </div>
  </div>



  <section class="about-section page-about">
    <div class="about-section__inner inner">
      <div class="about-section__body">
        <div class="about-section__main">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="about-section__sub">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-pc.jpg" alt="">
        </div>
        <div class="about-section__content-title">Dive into <br />the Ocean</div>
        <div class="about-section__text">
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
          </p>
          <p>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /.about -->

  <section class="gallery-section page-galley">
    <div class="gallery-section__inner inner">
      <div class="gallery-section__title section-title">
        <div class="section-title__main">Gallery</div>
        <h2 class="section-title__sub">フォト</h2>
      </div>
      <div class="gallery-section__grid">
        <div class="gallery-section-grid">
          <?php
                    // SCFのリピーターグループのデータを取得（グループ名: gallery）
                    $fields = SCF::get('gallery');
                    if (!empty($fields)) : // フィールドが空でない場合
                        $count = 0;
                    foreach ($fields as $val) :

                    // 画像のIDを取得（フィールド名: galleryImage1）
                    $image_id = $val['galleryImage'];

                    // 画像が設定されている場合
                    if (!empty($image_id)) {
                        // 画像のURLを取得（'full' にするとオリジナルサイズを取得）
                        $image = wp_get_attachment_image_src($image_id, 'full');

                    // 画像が取得できた場合
                    if ($image) {
                        $count++;
                        $is_large = ($count % 6 == 1 || $count % 6 == 0);
                  ?>
          <div class="gallery-section-grid__image js-gallery-section-grid__image <?php echo $is_large ? 'large-image' : ''; ?>">
            <img src="<?php echo esc_url($image[0]); ?>" alt="">
          </div>
          <?php
                        }
                    }
                    endforeach;
                  endif;
                ?>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- modal -->
    <div class="gallery-section-modal js-gallery-section-modal">
      <span class="gallery-section-modal__close js-gallery-section-modal__close">&times;</span>
      <img class="gallery-section-modal__content js-gallery-section-modal__content" src="dammy.jpg" alt="dammy">
    </div>
  </section>
</main>


<?php get_footer(); ?>