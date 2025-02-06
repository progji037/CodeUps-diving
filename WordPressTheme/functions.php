<?php

// テーマでCSSとJSを読み込む関数
function my_theme_enqueue_scripts() {
    // Google Fontsの事前接続 (preconnect) を必要とするリソース
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap',
        [],
        null
    );

    // SwiperのCSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.0.0'
    );

    // テーマ独自のスタイル
    wp_enqueue_style(
        'theme-style',
        get_theme_file_uri('/assets/css/style.css'),
        [],
        filemtime(get_theme_file_path('/assets/css/style.css')) // キャッシュ対策のためファイル更新時間をバージョンとして指定
    );

    // jQuery (古いバージョンを読み込む)
    wp_enqueue_script(
        'jquery-1.8.3',
        '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js',
        [],
        '1.8.3',
        true
    );

    // jQueryプラグイン（easing）
    wp_enqueue_script(
        'jquery-easing',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js',
        ['jquery-1.8.3'], // 依存関係としてjQueryを指定
        '1.4.1',
        true
    );

    // jQueryプラグイン（inview）
    wp_enqueue_script(
        'jquery-inview',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js',
        ['jquery-1.8.3'], // 依存関係としてjQueryを指定
        '1.0.0',
        true
    );

    // SwiperのJS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.0.0',
        true
    );

    // テーマ独自のスクリプト
    wp_enqueue_script(
        'theme-script',
        get_theme_file_uri('/assets/js/script.js'),
        [],
        filemtime(get_theme_file_path('/assets/js/script.js')), // キャッシュ対策のためファイル更新時間をバージョンとして指定
        true
    );
}

// フックに関数を登録
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// 外部リソース用に rel="preconnect" を追加する関数
function add_rel_preconnect( $html, $handle, $href, $media ) {
    // rel="preconnect" を追加したいハンドル名をリスト化
    $preconnect_handles = [
        'google-fonts',  // Google Fonts
        'swiper-css',    // SwiperのCSS
    ];

    // 対象のハンドルの場合にのみ preconnect を追加
    if ( in_array( $handle, $preconnect_handles, true ) ) {
        // preconnect 用のHTMLを挿入
        $preconnect_html = <<<EOT
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
EOT;
        // preconnect のHTMLを元のHTMLに追加
        $html = $preconnect_html . $html;
    }

    return $html;
}

// WordPressのstyle_loader_tagフィルタにフックする
add_filter( 'style_loader_tag', 'add_rel_preconnect', 10, 4 );


function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

//アーカイブの表示件数変更
function change_posts_per_page($query)
{
    if (is_admin() || ! $query->is_main_query())
        return;
    if ($query->is_archive(array('works', 'recruit'))) { //カスタム投稿タイプを指定('〇〇')←適用させたいスラッグ
        $query->set('posts_per_page', '9'); //表示件数を指定
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

/*breadcrumb settings
-----------------------*/
add_filter('bcn_after_fill', function($breadcrumb_trail) {
    foreach ($breadcrumb_trail->breadcrumbs as $breadcrumb) {
        // `get_type()` でタイプを取得し、最初の要素が 'page' か確認
        if (in_array('page', $breadcrumb->get_types(), true) && $breadcrumb->get_id() == 76) {
            $breadcrumb->set_title('私たちについて');
        }
    }
    return $breadcrumb_trail;
});