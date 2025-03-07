<?php get_header(); ?>

<main>

  <section class="fv">
    <div class="fv__wrapper">
      <!-- <div class="fv__inner"> -->
      <div class="fv__title">
        <h1 class="fv__main-title">DIVING</h1>
        <p class="fv__sub-title">into the ocean</p>
      </div>
      <!--  -->
      <div class="fv__loading js-fv-loading fv-loading ">
        <div class="fv-loading__container">
          <div class="fv-loading__split-left">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split1.webp" media="(min-width: 768px)" />
              <!-- 幅768px以上なら表示 -->
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split1.webp" media="(max-width: 767px)" />
              <!-- 幅767px以下なら表示 -->
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split1.webp" alt="左側画像A" class="slide" />
            </picture>
          </div>
          <div class="fv-loading__split-right">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split2.webp" media="(min-width: 768px)" />
              <!-- 幅768px以上なら表示 -->
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-sp-split2.webp" media="(max-width: 767px)" />
              <!-- 幅767px以下なら表示 -->
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv-split2.webp" alt="右側画像A" class="slide" />
            </picture>
          </div>
        </div>
      </div>

      <?php get_template_part('parts/mv_swiper'); ?>
    </div>
  </section>
  <!-- fv -->


  <!-- fv -->

  <section class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title section-title">
        <div class="section-title__main">Campaign</div>
        <h2 class="section-title__sub">キャンペーン</h2>
      </div>
      <!-- swiper -->
      <div class="campaign-card__wrap">

        <div class="campaign__button campaign-button">
          <div class="campaign-button__slide">
            <div class="campaign__button-prev"></div>
            <!-- swiper-button-prev  -->
            <div class="campaign__button-next"></div>
            <!-- swiper-button-next  -->
          </div>
          <div class="swiper campaign__swiper js-top-swiper">
            <div class="swiper-wrapper">
              <!-- slide1 -->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">ライセンス講習</div>
                        <div class="campaign-card__head">ライセンス取得</div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥56,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥46,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide2 -->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">体験ダイビング</div>
                        <div class="campaign-card__head">
                          貸切体験ダイビング
                        </div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥24,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥18,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- slide3-->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign3-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">体験ダイビング</div>
                        <div class="campaign-card__head">ナイトダイビング</div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥10,000</div>
                          <div class="campaign-card__reduced-price">¥8,000</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- slide4-->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign4-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">ファンダイビング</div>
                        <div class="campaign-card__head">
                          貸切ファンダイビング
                        </div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥20,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥16,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- slide5 -->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">ライセンス講習</div>
                        <div class="campaign-card__head">ライセンス取得</div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥56,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥46,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- slide6 -->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">体験ダイビング</div>
                        <div class="campaign-card__head">
                          貸切体験ダイビング
                        </div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥24,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥18,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- slide7-->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign3-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">体験ダイビング</div>
                        <div class="campaign-card__head">ナイトダイビング</div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥10,000</div>
                          <div class="campaign-card__reduced-price">¥8,000</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- slide8-->
              <div class="swiper-slide campaign__slide">
                <div class="campaign__card">
                  <div class="campaign-card">
                    <div class="campaign-card__image">
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign4-sp.jpg" alt="" />
                    </div>
                    <div class="campaign-card__textbox">
                      <div class="campaign-card__header">
                        <div class="campaign-card__tag">ファンダイビング</div>
                        <div class="campaign-card__head">
                          貸切ファンダイビング
                        </div>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaign-card__title">
                          <p>全部コミコミ(お一人様)</p>
                        </div>
                        <div class="campaign-card__price">
                          <div class="campaign-card__markdown">¥20,000</div>
                          <div class="campaign-card__reduced-price">
                            ¥16,000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--  -->
    </div>
    <div class="campaign__link campaign__link--top">
      <a class="button" href="#">
        View more
        <span class="arrow"></span>
      </a>
    </div>
  </section>
  <!--campaign-card  -->

  <section class="about top-about">
    <div class="about__inner inner">
      <div class="about__title section-title">
        <div class="section-title__main">About us</div>
        <h2 class="section-title__sub">私たちについて</h2>
      </div>
      <div class="about__body">
        <div class="about__main">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="about__sub">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-pc.jpg" media="(min-width: 768px)" />
            <!-- 幅768px以上なら表示 -->
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-sp.jpg" media="(max-width: 767px)" />
            <!-- 幅767px以下なら表示 -->
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1-sp.jpg" alt="" />
          </picture>
        </div>
        <div class="about__contentsbox">
          <div class="about__content-title">Dive into <br />the Ocean</div>
          <div class="about__textbox">
            <div class="about__text">
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              </p>
              <p>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              </p>
            </div>
            <div class="about__link">
              <a class="button" href="">
                View more
                <span class="arrow"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.about -->

  <section class="information top-info">
    <div class="information__inner inner">
      <div class="information__header section-title">
        <div class="section-title__main">Information</div>
        <h2 class="section-title__sub">ダイビング情報</h2>
      </div>
      <div class="information__contents">
        <div class="information__image mask-slide">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-ocean3-sp.jpg" alt="" />
          <div class="mask"></div>
        </div>
        <div class="information__textbox">
          <div class="information__head">ライセンス講習</div>
          <div class="information__text">
            <p>
              当店はダイビングライセンス（Cカード）世界最大の教育機関PADI
              <br class="u-desktop" />
              の「正規店」として店舗登録されています。<br />
              正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
            </p>
          </div>
          <div class="information__link">
            <a class="button" href="">
              View more
              <span class="arrow"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- information -->

  <section class="blog top-blog">
    <div class="blog__inner inner">
      <div class="blog__header section-title">
        <div class="section-title__main section-title__main--white">Blog</div>
        <h2 class="section-title__sub section-title__sub--white">ブログ</h2>
      </div>
      <div class="blog__cards cards">
        <!-- 1 -->
        <div class="cards__item">
          <a class="card" href="">
            <div class="card__figure">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean4-sp.jpg" alt="" />
            </div>
            <div class="card__header">
              <div class="card__date">
                <time datetime="2023-11-17">2023.11/17</time>
              </div>
              <div class="card__heading">ライセンス取得</div>
            </div>
            <div class="card__body">
              <div class="card__text">
                <p>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
        </div>
        <!--  -->
        <!-- 2 -->
        <div class="cards__item">
          <a class="card" href="">
            <div class="card__figure">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean5-sp.jpg" alt="" />
            </div>
            <div class="card__header">
              <div class="card__date">
                <time datetime="2023-11-17">2023.11/17</time>
              </div>
              <div class="card__heading">ウミガメと泳ぐ</div>
            </div>
            <div class="card__body">
              <div class="card__text">
                <p>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="cards__item">
          <a class="card" href="">
            <div class="card__figure">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-ocean6-sp.jpg" alt="" />
            </div>
            <div class="card__header">
              <div class="card__date">
                <time datetime="2023-11-17">2023.11/17</time>
              </div>
              <div class="card__heading">カクレクマノミ</div>
            </div>
            <div class="card__body">
              <div class="card__text">
                <p>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- 3 -->
      <!--  -->
      <div class="blog__link">
        <a class="button" href="">
          View more
          <span class="arrow"></span>
        </a>
      </div>
    </div>
    <!-- </div> -->
  </section>
  <!-- blog -->

  <section class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__header section-title">
        <div class="section-title__main">Voice</div>
        <h2 class="section-title__sub">お客様の声</h2>
      </div>
      <div class="voice__cards voice-cards">
        <!-- 1 -->
        <div class="voice-cards__item voice-card">
          <div class="voice-card__header">
            <div class="voice-card__body">
              <div class="voice-card__meta">
                <div class="voice-card__meta-age">20代(女性)</div>
                <div class="voice-card__meta-tag">ライセンス講習</div>
              </div>
              <div class="voice-card__title">
                ここにタイトルが入ります。ここにタイトル
              </div>
            </div>
            <div class="voice-card__image mask-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-card/voice1.jpg" alt="" />
            </div>
          </div>
          <div class="voice-card__text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </div>
        <!-- 1 -->
        <!-- 2 -->
        <div class="voice-cards__item voice-card">
          <div class="voice-card__header">
            <div class="voice-card__body">
              <div class="voice-card__meta">
                <div class="voice-card__meta-age">30代(男性)</div>
                <div class="voice-card__meta-tag">ファンダイビング</div>
              </div>
              <div class="voice-card__title">
                ここにタイトルが入ります。ここにタイトル
              </div>
            </div>
            <div class="voice-card__image mask-slide">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/voice-card/voice2.jpg" alt="" />
            </div>
          </div>
          <div class="voice-card__text">
            <p>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
              ここにテキストが入ります。ここにテキストが入ります。
            </p>
          </div>
        </div>
        <!-- 2 -->
      </div>
      <div class="voice__link">
        <a class="button" href="">
          View more
          <span class="arrow"></span>
        </a>
      </div>
    </div>
  </section>
  <!-- voice -->

  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__header section-title">
        <div class="section-title__main">Price</div>
        <h2 class="section-title__sub">料金一覧</h2>
      </div>
      <div class="price__content">
        <div class="price__image">
          <div class="mask-slide">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg" media="(min-width: 768px)" />
              <!-- 幅768px以上なら表示 -->
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" media="(max-width: 767px)" />
              <!-- 幅767px以下なら表示 -->
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" alt="" />
            </picture>
          </div>
        </div>
        <!-- pictureタグ必要？ -->
        <div class="price__lists">
          <!-- flexとflex wrapをつかう　w%85・15指定 -->
          <div class="price__list">
            <div class="price__list-title">ライセンス講習</div>
            <dl class="price__costs">
              <dt>オープンウォーターダイバーコース</dt>
              <dd>¥50,000</dd>
              <dt>アドバンスドオープンウォーターコース</dt>
              <dd>¥60,000</dd>
              <dt>レスキュー＋EFRコース</dt>
              <dd>¥70,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">体験ダイビング</div>
            <dl class="price__costs">
              <dt>ビーチ体験ダイビング(半日)</dt>
              <dd>¥7,000</dd>
              <dt>ビーチ体験ダイビング(1日)</dt>
              <dd>¥14,000</dd>
              <dt>ボート体験ダイビング(半日)</dt>
              <dd>¥10,000</dd>
              <dt>ボート体験ダイビング(1日)</dt>
              <dd>¥18,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">ファンダイビング</div>
            <dl class="price__costs">
              <dt>ビーチダイビング(2ダイブ)</dt>
              <dd>¥14,000</dd>
              <dt>ボートダイビング(2ダイブ)</dt>
              <dd>¥18,000</dd>
              <dt>スペシャルダイビング(2ダイブ)</dt>
              <dd>¥24,000</dd>
              <dt>ナイトダイビング(1ダイブ)</dt>
              <dd>¥10,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">スペシャルダイビング</div>
            <dl class="price__costs">
              <dt>貸切ダイビング(2ダイブ)</dt>
              <dd>¥24,000</dd>
              <dt>1日ダイビング(3ダイブ)</dt>
              <dd>¥32,000</dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="price__link">
        <a class="button" href="">
          View more
          <span class="arrow"></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /.price -->


  <section class="price top-price">
    <div class="price__inner inner">
      <div class="price__header section-title">
        <div class="section-title__main">Price</div>
        <h2 class="section-title__sub">料金一覧</h2>
      </div>
      <div class="price__content">
        <div class="price__image">
          <div class="mask-slide">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg" media="(min-width: 768px)" />
              <!-- 幅768px以上なら表示 -->
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" media="(max-width: 767px)" />
              <!-- 幅767px以下なら表示 -->
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-ocean3-sp.jpg" alt="" />
            </picture>
          </div>
        </div>
        <!-- pictureタグ必要？ -->
        <div class="price__lists">
          <!-- flexとflex wrapをつかう　w%85・15指定 -->
          <div class="price__list">
            <div class="price__list-title">ライセンス講習</div>
            <dl class="price__costs">
              <dt>オープンウォーターダイバーコース</dt>
              <dd>¥50,000</dd>
              <dt>アドバンスドオープンウォーターコース</dt>
              <dd>¥60,000</dd>
              <dt>レスキュー＋EFRコース</dt>
              <dd>¥70,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">体験ダイビング</div>
            <dl class="price__costs">
              <dt>ビーチ体験ダイビング(半日)</dt>
              <dd>¥7,000</dd>
              <dt>ビーチ体験ダイビング(1日)</dt>
              <dd>¥14,000</dd>
              <dt>ボート体験ダイビング(半日)</dt>
              <dd>¥10,000</dd>
              <dt>ボート体験ダイビング(1日)</dt>
              <dd>¥18,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">ファンダイビング</div>
            <dl class="price__costs">
              <dt>ビーチダイビング(2ダイブ)</dt>
              <dd>¥14,000</dd>
              <dt>ボートダイビング(2ダイブ)</dt>
              <dd>¥18,000</dd>
              <dt>スペシャルダイビング(2ダイブ)</dt>
              <dd>¥24,000</dd>
              <dt>ナイトダイビング(1ダイブ)</dt>
              <dd>¥10,000</dd>
            </dl>
          </div>
          <div class="price__list">
            <div class="price__list-title">スペシャルダイビング</div>
            <dl class="price__costs">
              <dt>貸切ダイビング(2ダイブ)</dt>
              <dd>¥24,000</dd>
              <dt>1日ダイビング(3ダイブ)</dt>
              <dd>¥32,000</dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="price__link">
        <a class="button" href="">
          View more
          <span class="arrow"></span>
        </a>
      </div>
    </div>
  </section>
  <!-- /.price -->

</main>

<?php get_footer(); ?>