<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-success-pcx2.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-success-spx2.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-success-spx2.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title ">
      <h1 class="main-view__main-title main-view__main-title--capitalize">contact</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<!-- thanks -->
<section class="contact-success page-contact-success">
  <div class="contact-success__inner inner">
    <div class="contact-success__head">
      <p>お問い合わせ内容を送信完了しました。</p>
    </div>
    <div class="contact-success__text">
      <p>このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。</p>
      <p>お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。</p>
      <p>また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。</p>
    </div>
  </div>
</section>

<?php get_footer(); ?>