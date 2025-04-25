<?php  if ( !is_page('contact') ) :?>
<section class="contact page-common-contact page-common-contact--privacy">
  <div class="contact__wrapper">
    <div class="contact__inner inner">
      <div class="contact__info contact__info--lower">
        <div class="contact__info-box">
          <div class="contact__headline">
            <div class="contact__logo">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-pc.svg" alt="" />
            </div>
          </div>
          <div class="contact__meta-body">
            <div class="contact__meta">
              <p>沖縄県那覇市1-1</p>
              <p>TEL:0120-000-0000</p>
              <p>営業時間:8:30-19:00</p>
              <p>定休日:毎週火曜日</p>
            </div>
            <div class="contact__map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13335.531231451465!2d44.298022889372966!3d33.321879145884246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15577f67a0a74193%3A0x9deda9d2a3b16f2c!2z44Kk44Op44KvIOODkOOCsOODgOODg-ODiQ!5e0!3m2!1sja!2sjp!4v1720057977312!5m2!1sja!2sjp"
                width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__box">
          <div class="contact__box-wrap">
            <div class="contact__title">Contact</div>
            <h2 class="contact__sub-text">
              お問い合わせ
            </h2>
            <div class="contact__text-link">
              <p>ご予約・お問い合わせはコチラ</p>
            </div>
          </div>

          <div class="contact__link">
            <a class="button" href="<?php echo get_contact_url(); ?>">
              Contact us
              <span class="arrow"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- /.contact -->
<div class="scroll-back" id="js-pageTop"><a href="#"></a></div>

<footer class="footer top-footer">
  <div class="footer__wrapper">
    <div class="footer__inner inner">
      <div class="footer__headline">
        <h2 class="footer__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-sp.svg" alt="CodeUps" />
        </h2>
        <div class="footer__sns-icon">
          <div class="footer__sns-facebook">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo-sp.png" alt="" />
            </a>
          </div>
          <div class="footer__sns-instagram">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/InstagramLogo-sp.png" alt="" />
            </a>
          </div>
        </div>
      </div>
      <nav class="footer__menu site-guide">
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
    <div class="footer__copyright">
      Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>