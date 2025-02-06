<?php get_header(); ?>

<main>
  <section class="main-view">
    <div class="main-view__contents">
      <div class="main-view__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/information-pc.jpg" media="(min-width: 768px)" />
          <!-- 幅768px以上なら表示 -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/information-sp.jpg" media="(max-width: 767px)" />
          <!-- 幅767px以下なら表示 -->
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-aboutus-img-sp.jpg" alt="" />
        </picture>
      </div>
      <div class="main-view__title ">
        <h1 class="main-view__main-title main-view__main-title--capitalize">information</h1>
      </div>
    </div>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('parts/breadcrumb')?>

  <!-- information -->
  <section class="info-section page-info">
    <div class="info-section__inner inner">
      <!--  -->
      <div class="info-section-container js-info-section-container">
        <div class="info-section__tab js-info-section__tab">
          <ul class="info-section-tab">
            <li class="info-section-tab__list">
              <a href="#" class="info-section-link js-info-section-link" data-tab="license">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-low-icon1.png" alt="">
                <p>ライセンス<br class="u-mobile" />講習</p>
              </a>
            </li>
            <li class="info-section-tab__list">
              <a href="#" class="info-section-link js-info-section-link" data-tab="fun">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-low-icon2.png" alt="">
                <p>ファン<br class="u-mobile" />ダイビング</p>
              </a>
            </li>
            <li class="info-section-tab__list">
              <a href="#" class="info-section-link js-info-section-link" data-tab="trial">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-low-icon3.png" alt="">
                <p>体験<br class="u-mobile" />ダイビング</p>
              </a>
            </li>
          </ul>
        </div>
        <!--  -->
        <div class="info-section__article">
          <div class="info-section-article">
            <div class="info-section-article__contents js-info-section-article__contents" data-tab="license">
              <div class="info-section-article__contents-box">
                <h2 class="info-section-article__contents-title">ライセンス講習</h2>
                <p class="info-section-article__contents-text">
                  泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
              </div>
              <div class="info-section-article__contents-image">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license1-pc.jpg" media="(min-width: 768px)" />
                  <!-- 幅768px以上なら表示 -->
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license1-sp.jpg" media="(max-width: 767px)" />
                  <!-- 幅767px以下なら表示 -->
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license1-sp.jpg" alt="" />
                </picture>
              </div>
            </div>
            <div class="info-section-article__contents js-info-section-article__contents" data-tab="fun">
              <div class="info-section-article__contents-box">
                <h2 class="info-section-article__contents-title">ファンダイビング</h2>
                <p class="info-section-article__contents-text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="info-section-article__contents-image">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license2-pc.jpg" media="(min-width: 768px)" />
                  <!-- 幅768px以上なら表示 -->
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license2-sp.jpg" media="(max-width: 767px)" />
                  <!-- 幅767px以下なら表示 -->
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license2-sp.jpg" alt="" />
                </picture>
              </div>
            </div>
            <div class="info-section-article__contents js-info-section-article__contents" data-tab="trial">
              <div class="info-section-article__contents-box">
                <h2 class="info-section-article__contents-title">ライセンス講習</h2>
                <p class="info-section-article__contents-text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="info-section-article__contents-image">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license3-pc.jpg" media="(min-width: 768px)" />
                  <!-- 幅768px以上なら表示 -->
                  <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license3-sp.jpg" media="(max-width: 767px)" />
                  <!-- 幅767px以下なら表示 -->
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/info-license3-sp.jpg" alt="" />
                </picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>


<?php get_footer(); ?>