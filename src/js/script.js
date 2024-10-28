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
    delay: 3000, // 2.5秒後に次のスライド
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


/* .low-tab-list
-------------------------------------------------------------*/
$(document).ready(function () {
  $('.tab-link__list a').click(function (e) {
    e.preventDefault();
    $('.tab-link__list a').removeClass('is-active');
    $(this).addClass('is-active');
  });
});

/* .pagenation
-------------------------------------------------------------*/
$(document).ready(function () {
  $('.pagination__list a').click(function (e) {
    e.preventDefault();
    $('.pagination__list a').removeClass('is-active');
    $(this).addClass('is-active');
  });
});

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

/* .loading fadeout
-------------------------------------------------------------*/
if (window.location.pathname === '/index.html') {
  $(document).ready(function () {
    var $targetElement = $(".js-fv-loading");
    $("body").css({ height: "100%", overflow: "hidden" });
    setTimeout(function () {
      $("body").css({ height: "", overflow: "" });
      $targetElement.fadeOut();
    }, 3000);
  });
}


/* .archive-pulldown
-------------------------------------------------------------*/

$(document).ready(function () {
  $(".js-low-blog-side__archive-item").hide();

  $(".js-low-blog-side__archive-head").click(function (e) {
    e.preventDefault();

    var $this = $(this);
    var $item = $this.next(".js-low-blog-side__archive-item");

    // クリック時に即座にクラスをトグル
    $this.toggleClass("is-open");

    // スライドトグルアニメーション
    $item.slideToggle(300); // 300ミリ秒でアニメーション
  });
});

/* .page-info タブ切り替え
-------------------------------------------------------------*/
$(document).ready(function () {
  // タブをクリックした時の処理
  $('.info-low__tab-list').on('click', function (e) {
    e.preventDefault(); // リンクのデフォルト動作を無効化

    var index = $(this).index(); // クリックされたタブのインデックス番号を取得

    // 現在表示されているコンテンツを0.3秒でフェードアウト
    $('.info-low__contents.is-active').stop(true, true).fadeOut(300, function () {
      $(this).removeClass('is-active'); // フェードアウト後にアクティブクラスを削除

      // フェードアウトが完了した後、クリックされたタブに対応するコンテンツをフェードイン
      $('.info-low__contents').eq(index)
        .css({ 'display': 'flex', 'opacity': 0 }) // 最初にdisplay: flex と透明度0を適用
        .stop(true, true) // 以前のアニメーションを停止
        .animate({ 'opacity': 1 }, 300) // 0.3秒かけて透明度を上げる（フェードイン）
        .addClass('is-active'); // アクティブクラスを追加
    });

    // すべてのタブからアクティブクラスを削除し、クリックされたタブにアクティブクラスを追加
    $('.info-low__tab-list').removeClass('is-active');
    $(this).addClass('is-active');
  });
});


/* .page-faq アコーディオン
-------------------------------------------------------------*/
$(document).ready(function () {
  $('.low-faq-box__question').click(function () {
    $(this).toggleClass('active');
    $(this).next('.low-faq-box__answer').slideToggle(300, function () {
      $(this).toggleClass('active');
    });
  });
});

/* .モーダル
-------------------------------------------------------------*/
$('.js-gallery-photo__image img').click(function () {
  var imgSrc = $(this).attr('src');  // クリックした画像のsrcを取得
  $('.js-gallery-modal__content').attr('src', imgSrc);  // モーダルの画像にクリックした画像を表示
  $('.js-gallery-modal').fadeIn();  // モーダルを表示
});

// モーダルを閉じる処理
$('.js-gallery-modal__close, .js-gallery-modal').click(function () {
  $('.js-gallery-modal').fadeOut();  // モーダルを非表示
});
