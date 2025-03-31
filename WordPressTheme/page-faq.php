<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="main-view">
      <div class="main-view__contents">
        <div class="main-view__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-faq-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-faq-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-faq-pc.jpg" alt="" />
          </picture>
        </div>
        <div class="main-view__title ">
          <h1 class="main-view__main-title">
            <?php the_field('mv_title'); ?>
          </h1>
        </div>
      </div>
    </section>

    <!-- パンくずリスト -->
    <?php get_template_part('parts/breadcrumb')?>

    <!-- faq -->
    <section class="faq-section page-faq">
      <div class="faq-section__inner inner">
        <div class="faq-lists">
          <?php
            $faq_lists = SCF::get('faq_list');
            if (!empty($faq_lists)) : ?>
              <?php foreach ($faq_lists as $faq) : ?>
              <div class="faq-lists__item">
                <div class="faq-list">
                  <div class="faq-list__question js-faq-list__question">
                    <div class="faq-list__question-text">
                      <?php echo  esc_html($faq['faq_question'])?>
                      <!-- ここに質問が入ります。 -->
                    </div>
                  </div>
                  <div class="faq-list__answer js-faq-list__answer">
                    <div class="faq-list__answer-text">
                        <?php
                        // テキストエリアの値を取得
                        $answer = esc_html($faq['faq_answer']);

                        // 改行を <br> に変換（基本処理）
                        $answer = nl2br($answer);

                        // 【✅ 見出し】 を <h3> に変換
                        $answer = preg_replace('/【(.*?)】/', '<h3>✅ $1</h3>', $answer);

                        // 「・」を <li> に変換し、<ul> で囲む
                        $answer = preg_replace('/・(.*?)<br\s*\/?>/', '<li>$1</li>', $answer);
                        $answer = preg_replace('/(<li>.*<\/li>)+/', '<ul>$0</ul>', $answer);

                        echo $answer;
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>



<?php get_footer(); ?>