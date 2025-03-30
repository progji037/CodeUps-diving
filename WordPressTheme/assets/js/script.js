"use strict";

jQuery(function ($) {
  // DOMの準備完了後に実行

  // リサイズイベント（一度だけ定義）
  $(window).on("resize", function () {
    if ($(window).width() > 767) {
      $(".header__drawer").removeClass("active");
      $(".header-drawer").removeClass("open");
      $("body").css({ height: "", overflow: "" });
    }
  });

  // ドロワーメニュー（1つにまとめる）
  $(".header__drawer").on("click", function () {
    $(this).toggleClass("active");
    $(".header-drawer").toggleClass("open");

    if ($("body").css("overflow") === "hidden") {
      $("body").css({ height: "", overflow: "" });
    } else {
      $("body").css({ height: "100%", overflow: "hidden" });
    }
  });

  // Swiper - fv
  var fv__swiper = new Swiper(".js-fv-swiper", {
    slidesPerView: 1,
    loop: true,
    effect: "fade",
    speed: 3000,
    autoplay: { delay: 3000 }
  });

  // Swiper - campaign
  var campaign__swiper = new Swiper(".js-top-swiper", {
    slidesPerView: "auto",
    spaceBetween: 24,
    loop: true,
    speed: 2000,
    autoplay: { delay: 1500 },
    navigation: {
      nextEl: ".campaign__button-next",
      prevEl: ".campaign__button-prev"
    },
    breakpoints: {
      767: {
        spaceBetween: 40
      }
    }
  });

  // トップに戻るボタン
  var pageTop = $("#js-pageTop").hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });
  pageTop.click(function () {
    $("body,html").animate({ scrollTop: 0 }, 50);
    return false;
  });

  // スクロールベースのマスクアニメーション
  $(document).ready(function() {
    var box = $(".mask-slide");
    var speed = 700;
    var animated = [];

    // 各要素の初期化
    box.each(function(index) {
      // マスク要素がなければ追加
      if ($(this).find(".mask").length === 0) {
        $(this).append('<div class="mask"></div>');
      }

      var mask = $(this).find(".mask");
      var image = $(this).find("img");

      // 初期状態設定
      image.css("opacity", "0");
      mask.css("width", "0%");

      // アニメーション状態を記録
      animated.push(false);
    });

    // スクロールイベントでチェック
    $(window).on('scroll', function() {
      box.each(function(index) {
        if (animated[index]) return; // 既にアニメーション済みならスキップ

        var $this = $(this);
        var windowHeight = $(window).height();
        var scrollTop = $(window).scrollTop();
        var offsetTop = $this.offset().top;

        // 要素が画面内に入ったかチェック
        if (offsetTop < (scrollTop + windowHeight * 0.8) && offsetTop + $this.height() > scrollTop) {
          var mask = $this.find(".mask");
          var image = $this.find("img");

          // アニメーション開始
          mask.delay(200).animate({ width: "100%" }, speed, function() {
            image.css("opacity", "1");
            $(this).css({ left: "0", right: "auto" });
            $(this).animate({ width: "0%" }, speed);
          });

          // アニメーション済みとマーク
          animated[index] = true;
        }
      });
    });

    // 初回チェック（ページ読み込み時に表示されている要素用）
    $(window).trigger('scroll');

    // リサイズ時にも再チェック
    $(window).on('resize', function() {
      $(window).trigger('scroll');
    });
  });

  // ローディングアニメーション
  var leftSlides = $(".fv-loading__split-left .slide");
  var rightSlides = $(".fv-loading__split-right .slide");
  var totalSlides = leftSlides.length;
  var currentIndex = 0;
  $(leftSlides[currentIndex]).addClass("active");
  $(rightSlides[currentIndex]).addClass("active");

  // ローディング時のスクロールロック
  if (window.location.pathname === '/index.html') {
    $("html, body").css({ height: "100%", overflow: "hidden" });
    setTimeout(function () {
      $("html, body").css({ height: "", overflow: "" });
    }, 3000);
  }

  // アーカイブ・プルダウン
  $(".js-date-lists__months").hide();
  $(".js-date-lists__year").click(function (e) {
    e.preventDefault();
    var $this = $(this);
    var $item = $this.next(".js-date-lists__months");
    $this.toggleClass("is-open");
    $item.slideToggle(300);
  });

  // タブ切り替え
  var urlParams = new URLSearchParams(window.location.search);
  var tabParam = urlParams.get('data-tab');

  function setDefaultTab() {
    $('.js-info-section-link').removeClass('is-active');
    $('.js-info-section-article__contents').hide();
    var firstTab = $('.js-info-section-link').first();
    var firstContent = $('.js-info-section-article__contents').first();
    firstTab.addClass('is-active');
    firstContent.fadeIn(400);
  }

  if (tabParam) {
    var targetTab = $('.js-info-section-link[data-tab="' + tabParam + '"]');
    var targetContent = $('.js-info-section-article__contents[data-tab="' + tabParam + '"]');
    if (targetTab.length && targetContent.length) {
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();
      targetTab.addClass('is-active');
      targetContent.fadeIn(400);
    } else {
      setDefaultTab();
    }
  } else {
    setDefaultTab();
  }

  $('.js-info-section-link').click(function (e) {
    e.preventDefault();
    var tabValue = $(this).data('tab');
    var newUrl = window.location.pathname + "?data-tab=" + tabValue;
    window.history.pushState(null, '', newUrl);

    $('.js-info-section-link').removeClass('is-active');
    $('.js-info-section-article__contents').hide();
    $(this).addClass('is-active');
    $('.js-info-section-article__contents[data-tab="' + tabValue + '"]').fadeIn(400);
  });

  // FAQ アコーディオン
  $('.js-faq-list__question').click(function () {
    $(this).toggleClass('active');
    $(this).next('.js-faq-list__answer').slideToggle(300, function () {
      $(this).toggleClass('active');
    });
  });

  // モーダル表示
  $('.js-gallery-section-grid__image img').click(function () {
    var imgSrc = $(this).attr('src');
    $('.js-gallery-section-modal__content').attr('src', imgSrc);
    $('.gallery-section-modal').fadeIn();
    $('body').css('overflow-y', 'hidden');
  });

  $('.js-gallery-section-modal__close, .js-gallery-section-modal').click(function () {
    $('.js-gallery-section-modal').fadeOut();
    $('body').css('overflow-y', 'visible');
  });

  // Contact Form 7 完了後遷移
  document.addEventListener('wpcf7mailsent', function () {
    location.href = '/thanks/';
  }, false);
});
