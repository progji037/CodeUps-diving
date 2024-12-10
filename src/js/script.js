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
});

/* .ドロワーの後ろがスクロールされない
-------------------------------------------------------------*/
$(function () {
  // ハンバーガーメニューボタンがクリックされたときのイベントハンドラを設定
  $(".header__drawer").click(function () {
    // 現在のbodyタグのoverflowスタイルを確認
    if ($("body").css("overflow") === "hidden") {
      // もしoverflowがhiddenなら、bodyのスタイルを元に戻す
      $("body").css({ height: "", overflow: "" });
    } else {
      // そうでなければ、bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
      $("body").css({ height: "100%", overflow: "hidden" });
    }
  });
});

/* .fv
-------------------------------------------------------------*/
const fv__swiper = new Swiper(".js-fv-swiper", {
  slidesPerView: 1,
  loop: true,
  effect: "fade",
  speed: 3000,
  autoplay: {
    // 自動再生
    delay: 3000, // 3秒後に次のスライド
  },
});

/* .campaign
-------------------------------------------------------------*/

const campaign__swiper = new Swiper(".js-top-swiper", {
  slidesPerView: "auto",
  spaceBetween: 24,
  loop: true,
  speed: 2000,
  autoplay: {
    // 自動再生
    delay: 1500, // 1.5秒後に次のスライド
  },
  navigation: {
    nextEl: ".campaign__button-next",
    prevEl: ".campaign__button-prev",
  },
  breakpoints: {
    //ブレークポイント
    767: {
      //横幅が767px以上の場合
      spaceBetween: 40,
    },
  },
});


/* .tab-list
-------------------------------------------------------------*/
// $(document).ready(function () {
//   $('.tab-links__list a').click(function (e) {
//     e.preventDefault();
//     $('.tab-links__list a').removeClass('is-active');
//     $(this).addClass('is-active');
//   });
// });

/* .pagenation
-------------------------------------------------------------*/
$(document).ready(function () {
  $('.pagination__list a').click(function (e) {
    e.preventDefault();
    $('.pagination__list a').removeClass('is-active');
    $(this).addClass('is-active');
  });
});
// wordpress化の時に見直す。
// jsでなくwordpress化できりかえできるようにするってこと？

/* .top-scroll
-------------------------------------------------------------*/
$(function () {
  const pageTop = $("#js-pageTop").hide();

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });
  opacity: 1,
    pageTop.click(function () {
      $("body,html").animate(
        {
          scrollTop: 0,
        },
        50,
      );
      return false;
    });
});

//要素の取得とスピードの設定
var box = $(".mask-slide"),
  speed = 700;

//.maskの付いた全ての要素に対して下記の処理を行う
box.each(function () {
  $(this).append('<div class="mask"></div>');
  var mask = $(this).find($(".mask")),
    image = $(this).find("img");
  var counter = 0;

  image.css("opacity", "0");
  mask.css("width", "0%");
  //inviewを使って背景色が画面に現れたら処理をする
  mask.on("inview", function () {
    if (counter == 0) {
      $(this)
        .delay(200)
        .animate({ width: "100%" }, speed, function () {
          image.css("opacity", "1");
          $(this).css({ left: "0", right: "auto" });
          $(this).animate({ width: "0%" }, speed);
        });
      counter = 1;
    }
  });
});

/* .loading
-------------------------------------------------------------*/
// loading animation
$(document).ready(function () {
  const leftSlides = $(".fv-loading__split-left .slide");
  const rightSlides = $(".fv-loading__split-right .slide");
  const totalSlides = leftSlides.length;
  let currentIndex = 0;

  // 最初のスライドを表示
  $(leftSlides[currentIndex]).addClass("active");
  $(rightSlides[currentIndex]).addClass("active");
});

/* .loading scroll lock
-------------------------------------------------------------*/
if (window.location.pathname === '/index.html') {
  $(document).ready(function () {
    // bodyとhtmlのスクロール制御
    $("html, body").css({ height: "100%", overflow: "hidden" });

    // ローディングアニメーションの完了後にスクロール解除
    setTimeout(function () {
      $("html, body").css({ height: "", overflow: "" });
    }, 3000); // 適切なタイミングに合わせて調整
  });
}


/* .archive-pulldown
-------------------------------------------------------------*/

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
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('data-tab');

    // 初期化: クエリパラメータがある場合は該当タブをアクティブにする
    if (tabParam) {
      const targetTab = $(`.js-info-section-link[data-tab="${tabParam}"]`);
      const targetContent = $(`.js-info-section-article__contents[data-tab="${tabParam}"]`);

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
      const tabValue = $(this).data('tab');

      // URLのクエリパラメータを更新
      const newUrl = `${window.location.pathname}?data-tab=${tabValue}`;
      window.history.pushState(null, '', newUrl);

      // すべてのタブとコンテンツをリセット
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      // クリックされたタブと対応するコンテンツをアクティブにする
      $(this).addClass('is-active');
      $(`.js-info-section-article__contents[data-tab="${tabValue}"]`).fadeIn(400); // フェードイン
    });

    // デフォルトタブを設定する関数
    function setDefaultTab() {
      // すべてリセットしてからデフォルトを設定
      $('.js-info-section-link').removeClass('is-active');
      $('.js-info-section-article__contents').hide();

      const firstTab = $('.js-info-section-link').first();
      const firstContent = $('.js-info-section-article__contents').first();

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
  var imgSrc = $(this).attr('src');  // クリックした画像のsrcを取得
  $('.js-gallery-section-modal__content').attr('src', imgSrc);  // モーダルの画像にクリックした画像を表示
  $('.gallery-section-modal').fadeIn();  // モーダルを表示
  $('body').css('overflow-y', 'hidden');  // 本文の縦スクロールを無効
});

// モーダルを閉じる処理
$('.js-gallery-section-modal__close, .js-gallery-section-modal').click(function () {
  $('.js-gallery-section-modal').fadeOut();  // モーダルを非表示
  $('body').css('overflow-y', 'visible');  // 本文の縦スクロールを有効
});