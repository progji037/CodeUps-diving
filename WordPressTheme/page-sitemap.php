<?php get_header(); ?>

    <!-- 下層ページのメインビュー -->
    <section class="main-view">
      <div class="main-view__contents">
        <div class="main-view__image">
          <picture>
            <source srcset="/assets/images/common/page-terms-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="/assets/images/common/page-terms-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="./assets/images/common/page-price-mv-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="main-view__title ">
          <h1 class="main-view__main-title main-view__main-title--uppercase">
            <span>site</span>
            map
          </h1>
        </div>
      </div>
    </section>

    <!-- パンくずリスト -->
    <div class="breadcrumb page-breadcrumb">
      <div class="breadcrumb__inner inner">
        <div class="breadcrumb__page">
          <a class="breadcrumb__page-link" href="index.html">
            TOP
          </a>
          <div class="breadcrumb__page-detail">
            <div class="breadcrumb__page-arrow">
              <img src="./assets/images/common/breadcrumb-arrow.png" alt="">
            </div>
            <div class="breadcrumb__page-text">サイトマップ</div>
          </div>
        </div>
      </div>
    </div>

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
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="bout.html">私たちについて</a>
                  </li>
                </ul>
              </div>
              <!-- 左２列目 campaign about-->
              <div class="site-guide__group-box site-guide__group-box--head">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
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
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="blog.html">ブログ</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="site-guide__group site-guide__group--map ">
              <!-- 右1列目 voice price-->
              <div class="site-guide__group-box">
                <ul class="site-guide__group-lists">
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="voice.html">お客様の声</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
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
                  <li class="site-guide__group-list site-guide__list--topblk">
                    <a href="faq.html">よくある質問</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--lineblk">
                    <a href="privacy-policy.html">
                      <span>プライバシー<br class="u-mobile" />ポリシー</span>
                    </a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="terms.html">利用規約</a>
                  </li>
                  <li class="site-guide__group-list site-guide__list--spaceblk">
                    <a href="contact.html">お問い合わせ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



<?php get_footer(); ?>