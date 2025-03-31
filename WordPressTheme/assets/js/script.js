"use strict";  // 厳格モードを有効化し、JavaScriptのエラーチェックを強化

jQuery(function ($) {
  // WordPressでのjQuery使用のための基本構文
  // この中では「$」がjQueryオブジェクトとして使用可能

  // ===== ドロワーメニュー機能 =====
  // ハンバーガーメニューをクリックした時の動作
  $(".header__drawer").on("click", function () {
    // クリックされた要素に「active」クラスがあるかチェック
    if ($(this).hasClass("active")) {
      // activeクラスがある場合は削除（閉じる動作）
      $(this).removeClass("active");
      $(".header-drawer").removeClass("open");
    } else {
      // activeクラスがない場合は追加（開く動作）
      $(this).addClass("active");
      $(".header-drawer").addClass("open");
    }

    // ウィンドウのリサイズ監視
    // 画面幅が768px以上になったらドロワーメニューを閉じる
    $(window).on("resize", function () {
      if ($(window).width() > 767) {
        $(".drawer-bar").removeClass("active");
        $(".header-drawer").removeClass("open");
      }
    });
  });

  // ===== ドロワーメニュー表示時のスクロール制御 =====
  // ドロワーメニュー表示中は背景のスクロールを無効化
  $(".header__drawer").click(function () {
    // bodyのoverflow状態をチェック
    if ($("body").css("overflow") === "hidden") {
      // すでにhiddenなら元に戻す（スクロール可能に）
      $("body").css({
        height: "",
        overflow: ""
      });
    } else {
      // そうでなければスクロールを無効化
      $("body").css({
        height: "100%",
        overflow: "hidden"
      });
    }
  });

  // ===== メインビジュアルのスライダー設定 =====
  // Swiperライブラリを使用したスライダー
  if ($(".js-fv-swiper").length) {  // 要素が存在する場合のみ実行
    var fv__swiper = new Swiper(".js-fv-swiper", {
      slidesPerView: 1,  // 一度に表示するスライド数
      loop: true,        // 無限ループ
      effect: "fade",    // フェード効果
      speed: 3000,       // トランジション速度
      autoplay: {
        delay: 3000      // 3秒ごとに自動切り替え
      }
    });
  }

  // ===== キャンペーンセクションのスライダー設定 =====
  if ($(".js-top-swiper").length) {
    var campaign__swiper = new Swiper(".js-top-swiper", {
      slidesPerView: "auto",  // 自動的にスライド数を調整
      spaceBetween: 24,       // スライド間のスペース（SP用）
      loop: true,
      speed: 2000,
      autoplay: {
        delay: 1500           // 1.5秒ごとに自動切り替え
      },
      navigation: {
        // 前後の矢印ボタン
        nextEl: ".campaign__button-next",
        prevEl: ".campaign__button-prev"
      },
      breakpoints: {
        // レスポンシブ設定
        767: {
          // 767px以上の画面幅でのスライド間スペース
          spaceBetween: 40
        }
      }
    });
  }

  // ===== トップへ戻るボタン =====
  var pageTop = $("#js-pageTop").hide();  // 初期状態では非表示

  // スクロール位置に応じてボタンの表示/非表示を切り替え
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {  // 100px以上スクロールしたら
      pageTop.fadeIn();               // ボタンをフェードイン
    } else {
      pageTop.fadeOut();              // それ以外はフェードアウト
    }
  });

  // ボタンクリック時にページトップへスクロール
  pageTop.click(function () {
    $("body,html").animate({
      scrollTop: 0
    }, 50);  // 50msでトップへスクロール
    return false;  // デフォルトのクリックイベントをキャンセル
  });

  // ===== マスクスライドアニメーション - シンプル版 =====
  jQuery(function($) {
    console.log("マスクスライドアニメーション - シンプル版を開始");

    // マスクスライド要素を取得
    var maskSlides = $(".mask-slide");
    console.log("マスクスライド要素数:", maskSlides.length);

    if (maskSlides.length > 0) {
      // 各要素の初期化
      maskSlides.each(function(index) {
        var $this = $(this);

        // マスク要素がなければ追加
        if ($this.find('.mask').length === 0) {
          $this.append('<div class="mask"></div>');
        }

        var mask = $this.find(".mask");
        var image = $this.find("img");

        // 初期状態設定
        image.css("opacity", "0");
        mask.css({
          width: "0%",
          right: "0",
          left: "auto"
        });

        // データ属性を追加
        $this.attr('data-mask-id', index);

        // アニメーション済みフラグ
        $this.data('animated', false);

        console.log("マスクスライド要素を初期化:", index);
      });

      // スクロールイベントを監視
      $(window).on('scroll', function() {
        checkMaskElements();
      });

      // ページ読み込み時にも実行
      $(window).on('load', function() {
        setTimeout(checkMaskElements, 500);
      });

      // 初回実行
      setTimeout(checkMaskElements, 500);
    }

    // 要素が画面内に入ったかチェックする関数
    function checkMaskElements() {
      maskSlides.each(function() {
        var $this = $(this);

        // すでにアニメーション済みならスキップ
        if ($this.data('animated') === true) {
          return;
        }

        // 要素が画面内に入ったかチェック
        if (isInViewport($this)) {
          console.log("要素がビューポートに入りました:", $this.attr('data-mask-id'));

          // アニメーション済みフラグを設定
          $this.data('animated', true);

          // アニメーション実行
          animateMask($this);
        }
      });
    }

    // 要素が画面内にあるかチェックする関数
    function isInViewport(element) {
      var rect = element[0].getBoundingClientRect();
      var windowHeight = window.innerHeight || document.documentElement.clientHeight;

      // 要素の上端が画面内にあるか、下端が画面内にあるか
      return (
        (rect.top >= 0 && rect.top <= windowHeight) ||
        (rect.bottom >= 0 && rect.bottom <= windowHeight) ||
        (rect.top < 0 && rect.bottom > windowHeight)
      );
    }

    // マスクアニメーションを実行する関数
    function animateMask(element) {
      var mask = element.find(".mask");
      var image = element.find("img");
      var speed = 700;

      console.log("マスクアニメーション開始:", element.attr('data-mask-id'));

      // マスクを右から左へスライド
      mask.delay(200).animate({
        width: "100%"
      }, speed, function() {
        console.log("マスク拡大完了");

        // 画像を表示
        image.css("opacity", "1");

        // マスクの位置を変更
        $(this).css({
          left: "0",
          right: "auto"
        });

        // マスクを左から右へスライドアウト
        $(this).animate({
          width: "0%"
        }, speed, function() {
          console.log("アニメーション完了");
        });
      });
    }
  });

  // ===== ローディングアニメーション =====
  if ($(".fv-loading__split-left").length) {
    var leftSlides = $(".fv-loading__split-left .slide");
    var rightSlides = $(".fv-loading__split-right .slide");
    var totalSlides = leftSlides.length;
    var currentIndex = 0;

    // 最初のスライドをアクティブに
    $(leftSlides[currentIndex]).addClass("active");
    $(rightSlides[currentIndex]).addClass("active");
  }

  // ===== ページ読み込み時のスクロールロック（ホームページのみ） =====
  if ($("body").hasClass("home")) {  // WordPressのホームページでのみ実行
    // スクロールを一時的に無効化
    $("html, body").css({
      height: "100%",
      overflow: "hidden"
    });

    // 3秒後にスクロールを有効化（ローディングアニメーション終了後）
    setTimeout(function () {
      $("html, body").css({
        height: "",
        overflow: ""
      });
    }, 3000);
  }

  // ===== アーカイブページのプルダウンメニュー =====
  // 月別アーカイブの表示/非表示
  $(".js-date-lists__months").hide();  // 初期状態では月リストを非表示

  // 年をクリックしたときの動作
  $(".js-date-lists__year").click(function (e) {
    e.preventDefault();  // デフォルトのリンク動作をキャンセル
    var $this = $(this);
    var $item = $this.next(".js-date-lists__months");

    // 開閉状態を示すクラスをトグル
    $this.toggleClass("is-open");
    // 月リストをスライドで表示/非表示
    $item.slideToggle(300);
  });

  // ===== 情報ページのタブ切り替え機能 =====
  if ($(".js-info-section-link").length) {
    // URLからクエリパラメータを取得
    var urlParams = new URLSearchParams(window.location.search);
    var tabParam = urlParams.get('data-tab');  // 'data-tab'パラメータの値を取得

    // クエリパラメータに基づいてタブを初期化
    if (tabParam) {
      var targetTab = $(".js-info-section-link[data-tab=\"" + tabParam + "\"]");
      var targetContent = $(".js-info-section-article__contents[data-tab=\"" + tabParam + "\"]");

      if (targetTab.length && targetContent.length) {
        // すべてのタブとコンテンツをリセット
        $('.js-info-section-link').removeClass('is-active');
        $('.js-info-section-article__contents').hide();

        // 指定されたタブとコンテンツをアクティブに
        targetTab.addClass('is-active');
        targetContent.fadeIn(400);  // フェードインで表示
      } else {
        setDefaultTab();  // 指定されたタブが存在しない場合はデフォルトタブを表示
      }
    } else {
      setDefaultTab();  // パラメータがない場合もデフォルトタブを表示
    }

    // タブクリック時の処理
    $('.js-info-section-link').click(function (e) {
      e.preventDefault();
      var tabValue = $(this).data('tab');  // クリックされたタブのdata-tab属性値

      // URLのクエリパラメータを更新（ページ遷移なし）
      var newUrl = window.location.pathname + "?data-tab=" + tabValue;
      window.history.pushState(null, '', newUrl);

      // すべてのタブとコンテンツをリセット
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      // クリックされたタブと対応するコンテンツをアクティブに
      $(this).addClass('is-active');
      $(".js-info-section-article__contents[data-tab=\"" + tabValue + "\"]").fadeIn(400);
    });

    // デフォルトタブを設定する関数
    function setDefaultTab() {
      // すべてのタブとコンテンツをリセット
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      // 最初のタブとコンテンツをアクティブに
      var firstTab = $('.js-info-section-link').first();
      var firstContent = $('.js-info-section-article__contents').first();
      firstTab.addClass('is-active');
      firstContent.fadeIn(400);
    }
  }

  // ===== FAQページのアコーディオン機能 =====
  $('.js-faq-list__question').click(function () {
    // 質問要素のアクティブ状態をトグル
    $(this).toggleClass('active');

    // 回答要素をスライドで表示/非表示
    $(this).next('.js-faq-list__answer').slideToggle(300, function () {
      // アニメーション完了後に回答要素のアクティブ状態もトグル
      $(this).toggleClass('active');
    });
  });

  // ===== ギャラリーモーダル機能 =====
  // 画像クリック時にモーダルで拡大表示
  $('.js-gallery-section-grid__image img').click(function () {
    var imgSrc = $(this).attr('src');  // クリックされた画像のソースを取得

    // モーダル内の画像に同じソースを設定
    $('.js-gallery-section-modal__content').attr('src', imgSrc);

    // モーダルを表示
    $('.gallery-section-modal').fadeIn();

    // 背景スクロールを無効化
    $('body').css('overflow-y', 'hidden');
  });

  // モーダルを閉じる処理
  $('.js-gallery-section-modal__close, .js-gallery-section-modal').click(function () {
    // モーダルを非表示
    $('.js-gallery-section-modal').fadeOut();

    // 背景スクロールを有効化
    $('body').css('overflow-y', 'visible');
  });

  // ===== Contact Form 7の送信完了時のリダイレクト =====
  // フォーム送信成功時に特定ページへリダイレクト
  $(document).on('wpcf7mailsent', function (event) {
    location.href = '/thanks/';  // お問い合わせ完了ページへ移動
  });
});
