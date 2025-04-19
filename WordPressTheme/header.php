<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="format-detection" content="telephone=no" />
  <!-- <meta name="robots" content="noindex" /> -->
  <?php wp_head(); ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-4TJHF50E4V"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-4TJHF50E4V');
  </script>
</head>

<body>
  <header class="header header--top">
    <div class="header__inner">
      <nav class="header__nav">
        <div class="header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-sp.svg" alt="" />
          </a>
        </div>
        <ul class="header__items">
          <li class="header__item">
            <a href="<?php echo get_campaign_url(); ?>">Campaign
              <p>キャンペーン</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_about_url(); ?>">About us
              <p>私たちについて</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_information_url(); ?>">Information
              <p>ダイビング情報</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_blog_url(); ?>">Blog
              <p>ブログ</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_voice_url(); ?>">Voice
              <p>お客様の声</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_price_url(); ?>">Price
              <p>料金一覧</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_faq_url(); ?>">FAQ
              <p>よくある質問</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo get_contact_url(); ?>">Contact
              <p>お問い合わせ</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header__drawer drawer-bar">
      <span></span>
      <span></span>
      <span></span>
    </div>


    <div class="header__drawer header-drawer">
      <div class="header-drawer__head"></div>
      <div class="header-drawer__menu">
        <nav class="header-drawer__guide site-guide">
          <div class="site-guide__wrapper">
            <div class="site-guide__group">
              <!-- 左１列目 campaign about-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
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
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="<?php echo get_about_url(); ?>">私たちについて</a>
                  </li>
                </ul>
              </div>
              <!-- 左２列目 campaign about-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
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
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="<?php echo get_blog_url(); ?>">ブログ</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="site-guide__group site-guide__group--right">
              <!-- 右1列目 voice price-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
                    <a href="<?php echo get_voice_url(); ?>">お客様の声</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
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
                  <li class="site-guide__group-list site-guide__list--top">
                    <a href="<?php echo get_faq_url(); ?>">よくある質問</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--line">
                    <a href="<?php echo get_custom_privacy_policy_url(); ?>">
                      <span>プライバシー<br class="u-mobile" />ポリシー</span>
                    </a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="<?php echo get_terms_url(); ?>">利用規約</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="<?php echo get_contact_url(); ?>">お問い合わせ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- drawer-menu -->