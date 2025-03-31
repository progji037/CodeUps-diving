"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  $(".header__drawer").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(".header-drawer").removeClass("open");
    } else {
      $(this).addClass("active");
      $(".header-drawer").addClass("open");
    }
    // ウィンドウのリサイズを監視し、幅が768px以上の場合はドロワーメニューを閉じる
    $(window).on("resize", function () {
      if ($(window).width() > 767) {
        $(".drawer-bar").removeClass("active");
        $(".header-drawer").removeClass("open");
      }
    });
  });

  /* .ドロワーの後ろがスクロールされない
  -------------------------------------------------------------*/
  // ハンバーガーメニューボタンがクリックされたときのイベントハンドラを設定
  $(".header__drawer").click(function () {
    // 現在のbodyタグのoverflowスタイルを確認
    if ($("body").css("overflow") === "hidden") {
      // もしoverflowがhiddenなら、bodyのスタイルを元に戻す
      $("body").css({
        height: "",
        overflow: ""
      });
    } else {
      // そうでなければ、bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
      $("body").css({
        height: "100%",
        overflow: "hidden"
      });
    }
  });

  /* .fv
  -------------------------------------------------------------*/
  if (typeof Swiper !== 'undefined') {
    var fv__swiper = new Swiper(".js-fv-swiper", {
      slidesPerView: 1,
      loop: true,
      effect: "fade",
      speed: 3000,
      autoplay: {
        // 自動再生
        delay: 3000 // 3秒後に次のスライド
      }
    });

    /* .campaign
    -------------------------------------------------------------*/
    var campaign__swiper = new Swiper(".js-top-swiper", {
      slidesPerView: "auto",
      spaceBetween: 24,
      loop: true,
      speed: 2000,
      autoplay: {
        // 自動再生
        delay: 1500 // 1.5秒後に次のスライド
      },
      navigation: {
        nextEl: ".campaign__button-next",
        prevEl: ".campaign__button-prev"
      },
      breakpoints: {
        //ブレークポイント
        767: {
          //横幅が767px以上の場合
          spaceBetween: 40
        }
      }
    });
  }

  /* .top-scroll
  -------------------------------------------------------------*/
  var pageTop = $("#js-pageTop").hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });

  pageTop.click(function () {
    $("body,html").animate({
      scrollTop: 0
    }, 50);
    return false;
  });

  //mask-slide

  // マスクスライドアニメーション（スクロールイベント使用）
  console.log("マスクアニメーション初期化開始");

  var box = $(".mask-slide");
  console.log("マスクスライド要素の数:", box.length);

  var speed = 700;
  var animatedElements = [];

  box.each(function (index) {
    var $this = $(this);
    console.log("マスクスライド要素", index, "を処理中");

    // マスク要素がすでに存在するか確認し、なければ追加
    if ($this.find(".mask").length === 0) {
      $this.append('<div class="mask"></div>');
    }

    var mask = $this.find(".mask");
    var image = $this.find("img");

    console.log("マスク要素:", mask.length);
    console.log("画像要素:", image.length);

    // 初期スタイル設定
    image.css("opacity", "0");
    mask.css({
      "width": "0%",
      "position": "absolute",
      "top": "0",
      "right": "0",
      "bottom": "0",
      "background-color": "#333" // マスクの色を設定
    });

    // 要素の情報を保存
    animatedElements.push({
      element: $this,
      mask: mask,
      image: image,
      animated: false
    });
  });

  // スクロールイベントでアニメーション制御
  $(window).on('scroll', function() {
    var windowHeight = $(window).height();
    var scrollTop = $(window).scrollTop();

    $.each(animatedElements, function(index, item) {
      if (item.animated) return;

      var elementTop = item.element.offset().top;
      var elementVisible = 150; // 要素がどれだけ見えたらアニメーションを開始するか

      if (elementTop < (scrollTop + windowHeight - elementVisible)) {
        console.log("要素", index, "が表示範囲に入りました");

        item.mask.delay(200).animate({
          width: "100%"
        }, speed, function() {
          console.log("最初のアニメーション完了");
          item.image.css("opacity", "1");
          item.mask.css({
            left: "0",
            right: "auto"
          });
          item.mask.animate({
            width: "0%"
          }, speed, function() {
            console.log("2番目のアニメーション完了");
          });
        });

        item.animated = true;
      }
    });
  });

  // 初期チェック（ページ読み込み時に表示されている要素用）
  $(window).trigger('scroll');

  /* .loading
  -------------------------------------------------------------*/
  // loading animation
  var leftSlides = $(".fv-loading__split-left .slide");
  var rightSlides = $(".fv-loading__split-right .slide");
  var totalSlides = leftSlides.length;
  var currentIndex = 0;

  // 最初のスライドを表示
  $(leftSlides[currentIndex]).addClass("active");
  $(rightSlides[currentIndex]).addClass("active");

  /* .loading scroll lock
  -------------------------------------------------------------*/
  if (window.location.pathname === '/index.html') {
    // bodyとhtmlのスクロール制御
    $("html, body").css({
      height: "100%",
      overflow: "hidden"
    });

    // ローディングアニメーションの完了後にスクロール解除
    setTimeout(function () {
      $("html, body").css({
        height: "",
        overflow: ""
      });
    }, 3000); // 適切なタイミングに合わせて調整
  }

  /* .archive-pulldown
  -------------------------------------------------------------*/
  $(".js-date-lists__months").hide();
  $(".js-date-lists__year").click(function (e) {
    e.preventDefault();
    var $this = $(this);
    var $item = $this.next(".js-date-lists__months");

    // クリック時に即座にクラスをトグル
    $this.toggleClass("is-open");

    // スライドトグルアニメーション
    $item.slideToggle(300); // 300ミリ秒でアニメーション
  });

  /* .page-info タブ切り替え
  -------------------------------------------------------------*/
  // クエリパラメータからtabの値を取得
  var urlParams = new URLSearchParams(window.location.search);
  var tabParam = urlParams.get('data-tab');

  // 初期化: クエリパラメータがある場合は該当タブをアクティブにする
  if (tabParam) {
    var targetTab = $(".js-info-section-link[data-tab=\"" + tabParam + "\"]");
    var targetContent = $(".js-info-section-article__contents[data-tab=\"" + tabParam + "\"]");
    if (targetTab.length && targetContent.length) {
      // すべてのタブとコンテンツをリセット
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      // 該当タブとコンテンツをアクティブにする
      targetTab.addClass('is-active');
      targetContent.fadeIn(400); // フェードイン
    } else {
      setDefaultTab(); // 存在しない場合はデフォルトタブを設定
    }
  } else {
    setDefaultTab(); // クエリパラメータがない場合もデフォルトタブを設定
  }

  // タブクリック時の処理
  $('.js-info-section-link').click(function (e) {
    e.preventDefault(); // デフォルトのリンク挙動を防ぐ

    // data-tabの値を取得
    var tabValue = $(this).data('tab');

    // URLのクエリパラメータを更新
    var newUrl = window.location.pathname + "?data-tab=" + tabValue;
    window.history.pushState(null, '', newUrl);

    // すべてのタブとコンテンツをリセット
    $('.js-info-section-link').removeClass('is-active');
    $('.js-info-section-article__contents').hide();

    // クリックされたタブと対応するコンテンツをアクティブにする
    $(this).addClass('is-active');
    $(".js-info-section-article__contents[data-tab=\"" + tabValue + "\"]").fadeIn(400); // フェードイン
  });

  // デフォルトタブを設定する関数
  function setDefaultTab() {
    // すべてリセットしてからデフォルトを設定
    $('.js-info-section-link').removeClass('is-active');
    $('.js-info-section-article__contents').hide();
    var firstTab = $('.js-info-section-link').first();
    var firstContent = $('.js-info-section-article__contents').first();
    firstTab.addClass('is-active');
    firstContent.fadeIn(400); // フェードイン
  }

  /* .page-faq アコーディオン
  -------------------------------------------------------------*/
  $('.js-faq-list__question').click(function () {
    $(this).toggleClass('active');
    $(this).next('.js-faq-list__answer').slideToggle(300, function () {
      $(this).toggleClass('active');
    });
  });

  /* .モーダル
  -------------------------------------------------------------*/
  $('.js-gallery-section-grid__image img').click(function () {
    var imgSrc = $(this).attr('src'); // クリックした画像のsrcを取得
    $('.js-gallery-section-modal__content').attr('src', imgSrc); // モーダルの画像にクリックした画像を表示
    $('.gallery-section-modal').fadeIn(); // モーダルを表示
    $('body').css('overflow-y', 'hidden'); // 本文の縦スクロールを無効
  });

  // モーダルを閉じる処理
  $('.js-gallery-section-modal__close, .js-gallery-section-modal').click(function () {
    $('.js-gallery-section-modal').fadeOut(); // モーダルを非表示
    $('body').css('overflow-y', 'visible'); // 本文の縦スクロールを有効
  });
});

// Contact Form 7の送信完了後のリダイレクト
// これはjQueryに依存しないのでjQueryラッパーの外に置く
document.addEventListener('wpcf7mailsent', function (event) {
  location.href = '/thanks/'; // ← 完了ページのURLに変更してください
}, false);
