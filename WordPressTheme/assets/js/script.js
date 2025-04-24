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
  $(function () {
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
  });

  /* ヘッダーアニメーション制御
  -------------------------------------------------------------*/
  $(document).ready(function () {
    // トップページかどうかを確認する関数
    function isTopPage() {
      return $('body').hasClass('home') || window.location.pathname === '/' || window.location.pathname === '/index.html' || window.location.pathname.endsWith('index.php');
    }

    // 下層ページの場合はヘッダーからアニメーションクラスを削除
    if (!isTopPage()) {
      $('header').removeClass('header--top');
    }
  });

  /* .fv
  -------------------------------------------------------------*/
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

  /* .top-scroll
  -------------------------------------------------------------*/
  $(function () {
    var pageTop = $("#js-pageTop").hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        pageTop.fadeIn();
      } else {
        pageTop.fadeOut();
      }
    });
    opacity: 1, pageTop.click(function () {
      $("body,html").animate({
        scrollTop: 0
      }, 50);
      return false;
    });
  });

  /* マスクスライドアニメーション
  -------------------------------------------------------------*/
  // マスクスライドアニメーション
  var box = $(".mask-slide");
  var speed = 700;
  box.each(function () {
    $(this).append('<div class="mask"></div>');
    var mask = $(this).find($(".mask"));
    var image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    mask.css("width", "0%");

    // アニメーション関数
    function runAnimation() {
      if (counter === 0) {
        mask.delay(200).animate({
          width: "100%"
        }, speed, function () {
          image.css("opacity", "1");
          $(this).css({
            left: "0",
            right: "auto"
          });
          $(this).animate({
            width: "0%"
          }, speed);
        });
        counter = 1;
      }
    }

    // Intersection Observer を使用
    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            runAnimation();
            observer.disconnect();
          }
        });
      }, {
        threshold: 0.1
      });
      observer.observe(mask[0]);
    } else {
      // フォールバック: 手動でアニメーションを実行
      setTimeout(runAnimation, 1000);
    }
  });
  /* トップページローディングアニメーション制御
  -------------------------------------------------------------*/
  $(document).ready(function () {
    // トップページかどうかを確認する関数
    function isTopPage() {
      return $('body').hasClass('home') || window.location.pathname === '/' || window.location.pathname === '/index.html' || window.location.pathname.endsWith('index.php');
    }

    // トップページでない場合は即座にローディング要素を非表示にする
    if (!isTopPage()) {
      $(".fv-loading").css({
        'display': 'none',
        'visibility': 'hidden',
        'opacity': '0',
        'animation': 'none'
      });
      return;
    }

    // トップページの場合、ローカルストレージをチェック
    var hasVisited = localStorage.getItem('hasVisitedBefore');
    if (!hasVisited) {
      // 初回訪問の場合、ローディングアニメーションを表示
      $("html, body").css({
        height: "100%",
        overflow: "hidden"
      });

      // ローディング要素を表示（CSSアニメーションが適用される）
      $(".fv-loading").css({
        'display': 'block',
        'visibility': 'visible',
        'opacity': '1',
        'animation': 'out 3s forwards'
      });

      // FVテキストにアニメーションクラスを追加
      $(".fv__title").css({
        'animation': 'fadeInOut 3s forwards'
      });

      // ヘッダーにアニメーションクラスを追加（トップページ用）
      $('header').addClass('header--top');

      // ローディングアニメーションの初期化
      var leftSlides = $(".fv-loading__split-left .slide");
      var rightSlides = $(".fv-loading__split-right .slide");
      if (leftSlides.length && rightSlides.length) {
        $(leftSlides[0]).addClass("active");
        $(rightSlides[0]).addClass("active");
      }

      // CSSアニメーションの完了後にスクロール解除（3秒後）
      setTimeout(function () {
        $("html, body").css({
          height: "",
          overflow: ""
        });

        // 訪問履歴をローカルストレージに保存
        localStorage.setItem('hasVisitedBefore', 'true');
      }, 3000);
    } else {
      // 2回目以降の訪問ではローディング要素を非表示
      $(".fv-loading").css({
        'display': 'none',
        'visibility': 'hidden',
        'opacity': '0',
        'animation': 'none'
      });

      // FVテキストのアニメーションを無効化し、最終状態を適用
      $(".fv__title").css({
        'animation': 'none',
        'opacity': '1',
        'color': '#ffffff'
      });

      // ヘッダーのアニメーションも無効化（必要に応じて）
      $('header').removeClass('header--top');
      $('header').css({
        'opacity': '1',
        'animation': 'none'
      });
    }
  });

  /* ヘッダーアニメーション制御
  -------------------------------------------------------------*/
  $(document).ready(function () {
    // トップページかどうかを確認する関数
    function isTopPage() {
      return $('body').hasClass('home') || window.location.pathname === '/' || window.location.pathname === '/index.html' || window.location.pathname.endsWith('index.php');
    }

    // 下層ページの場合はヘッダーからアニメーションクラスを削除
    if (!isTopPage()) {
      $('header').removeClass('header--top');
    }
    // トップページの場合は、ローカルストレージをチェックして2回目以降の訪問ではアニメーションを無効化
    else {
      var hasVisited = localStorage.getItem('hasVisitedBefore');
      if (hasVisited) {
        $('header').removeClass('header--top');
        $('header').css({
          'opacity': '1',
          'animation': 'none'
        });
      }
    }
  }); /* .archive-pulldown  -------------------------------------------------------------*/

  $(document).ready(function () {
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
  });

  /* .page-info タブ切り替え
  -------------------------------------------------------------*/
  // $(document).ready(function () {
  $(document).ready(function () {
    // クエリパラメータからtabの値を取得
    var urlParams = new URLSearchParams(window.location.search);
    var tabParam = urlParams.get('data-tab');

    // 初期化: クエリパラメータがある場合は該当タブをアクティブにする
    if (tabParam) {
      var targetTab = $(".js-info-section-link[data-tab=\"".concat(tabParam, "\"]"));
      var targetContent = $(".js-info-section-article__contents[data-tab=\"".concat(tabParam, "\"]"));
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
      var newUrl = "".concat(window.location.pathname, "?data-tab=").concat(tabValue);
      window.history.pushState(null, '', newUrl);

      // すべてのタブとコンテンツをリセット
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      // クリックされたタブと対応するコンテンツをアクティブにする
      $(this).addClass('is-active');
      $(".js-info-section-article__contents[data-tab=\"".concat(tabValue, "\"]")).fadeIn(400); // フェードイン
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
  });

  /* .page-faq アコーディオン
  -------------------------------------------------------------*/
  $(document).ready(function () {
    $('.js-faq-list__question').click(function () {
      $(this).toggleClass('active');
      $(this).next('.js-faq-list__answer').slideToggle(300, function () {
        $(this).toggleClass('active');
      });
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

  document.addEventListener('wpcf7mailsent', function (event) {
    location.href = '/thanks/'; // ← 完了ページのURLに変更してください
  }, false);
});