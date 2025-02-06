<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>
</head>

<body>
  <header class="header header--top">
    <div class="header__inner">
      <nav class="header__nav">
        <div class="header__logo">
          <a href="index.html">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-sp.svg" alt="" />
          </a>
        </div>
        <ul class="header__items">
          <li class="header__item">
            <a href="campaign.html">Campaign
              <p>キャンペーン</p>
            </a>
          </li>
          <li class="header__item">
            <a href="about.html">About us
              <p>私たちについて</p>
            </a>
          </li>
          <li class="header__item">
            <a href="information.html">Information
              <p>ダイビング情報</p>
            </a>
          </li>
          <li class="header__item">
            <a href="blog.html">Blog
              <p>ブログ</p>
            </a>
          </li>
          <li class="header__item">
            <a href="voice.html">Voice
              <p>お客様の声</p>
            </a>
          </li>
          <li class="header__item">
            <a href="price.html">Price
              <p>料金一覧</p>
            </a>
          </li>
          <li class="header__item">
            <a href="faq.html">FAQ
              <p>よくある質問</p>
            </a>
          </li>
          <li class="header__item">
            <a href="contact.html">Contact
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
                    <a href="campaign.html">キャンペーン</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=license">ライセンス取得</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=trial">貸切体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=fun">ナイトダイビング</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="about.html">私たちについて</a>
                  </li>
                </ul>
              </div>
              <!-- 左２列目 campaign about-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
                    <a href="information.html">ダイビング情報</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=license">ライセンス講習</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=trial">体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=fun">ファンダイビング</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="blog.html">ブログ</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="site-guide__group site-guide__group--right">
              <!-- 右1列目 voice price-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
                    <a href="voice.html">お客様の声</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="price.html">料金一覧</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=license">ライセンス講習</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=trial">体験ダイビング</a>
                  </li>
                  <li class="site-guide__group-list">
                    <a href="information.html?data-tab=fun">ファンダイビング</a>
                  </li>
                </ul>
              </div>
              <!-- 右２列目 faq-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--top">
                    <a href="faq.html">よくある質問</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--line">
                    <a href="privacy-policy.html">
                      <span>プライバシー<br class="u-mobile" />ポリシー</span>
                    </a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="terms.html">利用規約</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--space">
                    <a href="contact.html">お問い合わせ</a>
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