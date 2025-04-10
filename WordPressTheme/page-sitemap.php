<?php get_header(); ?>

    <!-- 下層ページのメインビュー -->
    <section class="main-view">
      <div class="main-view__contents">
        <div class="main-view__image">
        <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-terms-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-terms-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-mv-sp.jpg" alt="" />
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

    <!-- sitemap -->
    <section class="sitemap page-sitemap">
      <div class="sitemap__inner">
        <div class="site-guide">
          <div class="site-guide__wrapper site-guide__wrapper--black">
            <div class="site-guide__group site-guide__group--map">
              <!-- 左１列目 campaign about-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="<?php echo get_campaign_url(); ?>">キャンペーン</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_license_url(); ?>">ライセンス取得</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_trial_url(); ?>">貸切体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_fun_url(); ?>">ナイトダイビング</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="<?php echo get_about_url(); ?>">私たちについて</a>
                  </li>
                </ul>
              </div>
              <!-- 左２列目 campaign about-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="<?php echo get_information_url(); ?>">ダイビング情報</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_license_url(); ?>">ライセンス講習</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_trial_url(); ?>">体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_fun_url(); ?>">ファンダイビング</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="<?php echo get_blog_url(); ?>">ブログ</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="site-guide__group site-guide__group--map ">
              <!-- 右1列目 voice price-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="<?php echo get_voice_url(); ?>">お客様の声</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="<?php echo get_price_url(); ?>">料金一覧</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_license_url(); ?>">ライセンス講習</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_trial_url(); ?>">体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="<?php echo get_information_fun_url(); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </div>
              <!-- 右２列目 faq-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="<?php echo get_faq_url(); ?>">よくある質問</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--lineblk">
                    <a href="<?php echo get_custom_privacy_policy_url(); ?>">
                      <span>プライバシー<br class="u-mobile" />ポリシー</span>
                    </a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="<?php echo get_terms_url(); ?>">利用規約</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="<?php echo get_contact_url(); ?>">お問い合わせ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>