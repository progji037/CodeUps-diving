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
        FAQ
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
        $has_valid_faqs = false; // 有効なFAQがあるかどうかを追跡

        if (!empty($faq_lists)) {
          foreach ($faq_lists as $faq) {
            // 質問と回答の両方が入力されているかチェック
            if (!empty($faq['faq_question']) && !empty($faq['faq_answer'])) {
              $has_valid_faqs = true; // 有効なFAQがあることを記録
      ?>
      <div class="faq-lists__item">
        <div class="faq-list">
          <div class="faq-list__question js-faq-list__question">
            <div class="faq-list__question-text">
              <?php echo nl2br(esc_html($faq['faq_question'])); ?>
            </div>
          </div>
          <div class="faq-list__answer js-faq-list__answer">
            <div class="faq-list__answer-text">
              <?php echo nl2br(esc_html($faq['faq_answer'])); ?>
            </div>
          </div>
        </div>
      </div>
      <?php
            }
          }
        }

        // 有効なFAQがない場合
        if (!$has_valid_faqs) {
          echo '<p>投稿がありません。</p>';
        }
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>