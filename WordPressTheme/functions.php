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
    if ($query->is_archive(array('works', 'recruit', 'campaign'))) { //カスタム投稿タイプを指定('〇〇')←適用させたいスラッグ
        $query->set('posts_per_page', '9'); //表示件数を指定
    }
}
add_action('pre_get_posts', 'change_posts_per_page');


/*カスタム投稿 */
// カスタム投稿タイプの登録
function create_custom_post_type() {
    // カスタム投稿タイプのラベル
    $labels = array(
        'name'               => __( 'swiper' ),
        'singular_name'      => __( 'swipe' ),
        'add_new'            => __( '新しいスライドを追加' ),
        'add_new_item'       => __( '新しいスライドを追加' ),
        'edit_item'          => __( 'スライドを編集' ),
        'new_item'           => __( '新しいスライド' ),
        'view_item'          => __( 'スライドを見る' ),
        'search_items'       => __( 'スライドを検索' ),
        'not_found'          => __( 'スライドが見つかりません' ),
        'not_found_in_trash' => __( 'ゴミ箱にスライドがありません' ),
        'menu_name'          => __( 'swiper' ),
    );


    // カスタム投稿タイプの設定
    $args = array(
        'labels'             => $labels,
        'description'        => 'Description of Custom Post Type',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'mv_swiper' ), // パーマリンクのスラッグ
        'capability_type'    => 'post',
        'has_archive'        => false, // アーカイブページは不要
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor','thumbnail'),
    );

    // カスタム投稿タイプの登録
    register_post_type( 'mv_swiper', $args );
}

// initフックでカスタム投稿タイプの登録関数を呼び出す
add_action( 'init', 'create_custom_post_type' );

// 翻訳を強制的にロードする
add_action('after_setup_theme', function() {
    load_theme_textdomain('smart-custom-fields', get_template_directory() . '/languages');
});

// 投稿をブログへ変更
function Change_menulabel() {
    global $menu;
        global $submenu;
        $name = 'ブログ';
        $menu[5][0] = $name;
        $submenu['edit.php'][5][0] = $name.'一覧';
        $submenu['edit.php'][10][0] = '新規'.$name.'投稿';
        }
        function Change_objectlabel() {
            global $wp_post_types;
            $name = 'ブログ';
            $labels = &$wp_post_types['post']->labels;
            $labels->name = $name;
            $labels->singular_name = $name;
            $labels->add_new = _x('追加', $name);
            $labels->add_new_item = $name.'の新規追加';
            $labels->edit_item = $name.'の編集';
            $labels->new_item = '新規'.$name;
            $labels->view_item = $name.'を表示';
            $labels->search_items = $name.'を検索';
            $labels->not_found = $name.'が見つかりませんでした';
            $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
        }
        add_action( 'init', 'Change_objectlabel' );
        add_action( 'admin_menu', 'Change_menulabel' );


// Contact Form 7 の自動pタグを無効化
    add_filter('wpcf7_autop_or_not', '__return_false');



//cf7 campaign タクソノミーの取得設定
add_filter('wpcf7_form_tag', 'add_campaign_taxonomy_terms_to_select', 10, 2);

function add_campaign_taxonomy_terms_to_select($tag, $unused) {
  // 指定した select 名以外はスルー
  if ($tag['name'] !== 'campaign-category') {
    return $tag;
  }

  // タクソノミー campaign_tab の全タームを取得
  $terms = get_terms([
    'taxonomy' => 'campaign_tab',
    'hide_empty' => true,
  ]);

  if (is_wp_error($terms) || empty($terms)) {
    return $tag;
  }

  $options = [];

  foreach ($terms as $term) {
    $options[] = esc_html($term->name);
  }

  // CF7用に各値をセット
  $tag['raw_values'] = $options;
  $tag['values'] = $options;
  $tag['labels'] = $options;

  return $tag;
}

// [br_sp] でスマホのみ改行
function shortcode_br_sp() {
    return '<br class="u-mobile">';
  }
  add_shortcode('br_sp', 'shortcode_br_sp');
