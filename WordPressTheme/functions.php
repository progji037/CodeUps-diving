<?php

// テーマでCSSとJSを読み込む関数
function my_theme_enqueue_scripts() {
    // Google Fontsの事前接続 (preconnect)
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
        filemtime(get_theme_file_path('/assets/css/style.css'))
    );

    // WordPress同梱のjQueryを使用
    wp_enqueue_script('jquery');

    // jQueryプラグイン（easing）
    wp_enqueue_script(
        'jquery-easing',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js',
        ['jquery'],
        '1.4.1',
        true
    );

    // jQueryプラグイン（inview）
    wp_enqueue_script(
        'jquery-inview',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js', // httpsを使用
        ['jquery'],
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
      ['jquery', 'jquery-inview'], // ← ✅ inviewを追加！
      filemtime(get_theme_file_path('/assets/js/script.js')),
      true
  );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// 外部リソース用に rel="preconnect" を追加する関数
function add_rel_preconnect( $html, $handle, $href, $media ) {
    $preconnect_handles = ['google-fonts', 'swiper-css'];
    if ( in_array( $handle, $preconnect_handles, true ) ) {
        $preconnect_html = <<<EOT
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
EOT;
        $html = $preconnect_html . $html;
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preconnect', 10, 4 );

function my_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support(
        'html5',
        ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']
    );
}
add_action( 'after_setup_theme', 'my_setup' );

function change_posts_per_page($query) {
    if (is_admin() || ! $query->is_main_query()) return;

   // キャンペーンアーカイブページの表示件数を設定
    if ($query->is_post_type_archive('campaign')) {
        $query->set('posts_per_page', 4);
    }

		  // キャンペーンカテゴリーのタクソノミーページの表示件数も同じに設定
    if ($query->is_tax('campaign_category')) {
        $query->set('posts_per_page', 4);
    }

    // ボイスアーカイブページの表示件数を設定
    if ($query->is_post_type_archive('voice')) {
        $query->set('posts_per_page', 6);
    }

    // ブログアーカイブページの表示件数を設定
    if ($query->is_home()) {
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'change_posts_per_page');


function Change_menulabel() {
    global $menu, $submenu;
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

add_filter('wpcf7_autop_or_not', '__return_false');

// 共通ナビゲーション用リンク関数
function get_campaign_url() { return esc_url( home_url( '/campaign/' ) ); }
function get_about_url() { return esc_url( home_url( '/about/' ) ); }
function get_information_url() { return esc_url( home_url( '/information/' ) ); }
function get_information_license_url() { return esc_url( home_url( '/information/?data-tab=license' ) ); }
function get_information_trial_url() { return esc_url( home_url( '/information/?data-tab=trial' ) ); }
function get_information_fun_url() { return esc_url( home_url( '/information/?data-tab=fun' ) ); }
function get_blog_url() { return esc_url( home_url( '/blog/' ) ); }
function get_voice_url() { return esc_url( home_url( '/voice/' ) ); }
function get_price_url() { return esc_url( home_url( '/price/' ) ); }
function get_faq_url() { return esc_url( home_url( '/faq/' ) ); }
function get_contact_url() { return esc_url( home_url( '/contact/' ) ); }
function get_custom_privacy_policy_url() { return esc_url( home_url( '/privacy-policy/' ) ); }
function get_terms_url() { return esc_url( home_url( '/terms/' ) ); }


// ログイン画面の背景カスタマイズ
function custom_login_background() { ?>
<style>
body.login {
  background: url(<?php echo get_stylesheet_directory_uri();
  ?>/assets/images/common/login-back.webp) no-repeat center center;
  background-size: cover;
}
</style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_background');

// ログインロゴのカスタマイズ
function custom_login_logo() { ?>
<style>
body.login div#login h1 a {
  background-image: url(<?php echo get_stylesheet_directory_uri();
  ?>/assets/images/common/login-logo.webp);
  width: 200px;
  height: 200px;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

/* ログインフォーム全体の位置を上げる */
body.login div#login {
  padding-top: 1%;
  /* デフォルトは8%程度なので、これを小さくすることで上に移動 */
}

/* 必要に応じてロゴの高さも調整 */
body.login div#login h1 {
  margin-bottom: 10px;
  /* ロゴとフォームの間隔も調整可能 */
}
</style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

/**
 * アーカイブタイトルからプレフィックス（「年:」「月:」など）を削除
 */
function remove_archive_title_prefix( $title ) {
    // タイトルからプレフィックスを削除
    if ( is_date() ) {
			// 日付アーカイブの場合
			if ( is_year() ) {
				// 年別アーカイブの場合
				$title = get_the_date( 'Y年' );
			} elseif ( is_month() ) {
				// 月別アーカイブの場合
				$title = get_the_date( 'Y年n月' );
			} elseif ( is_day() ) {
				// 日別アーカイブの場合
				$title = get_the_date( 'Y年n月j日' );
			}
    } else {
			// 日付アーカイブ以外の場合（カテゴリー、タグなど）
			// プレフィックスを削除（「カテゴリー:」「タグ:」など）
			$title = preg_replace( '/.+?: /i', '', $title );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'remove_archive_title_prefix' );

// ダッシュボードにアイコン付きショートカットを追加
function add_custom_dashboard_links_with_icons() {
	wp_add_dashboard_widget(
			'custom_dashboard_links_widget',
			'ショートカットメニュー',
			'custom_dashboard_links_widget_content_with_icons'
	);
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_links_with_icons');

// アイコン付きウィジェット中身
function custom_dashboard_links_widget_content_with_icons() {
	?>
<style>
.custom-shortcut-list li {
  margin-bottom: 8px;
}

.custom-shortcut-list li a {
  text-decoration: none;
  font-size: 15px;
}

.custom-shortcut-list li .dashicons {
  margin-right: 6px;
  vertical-align: middle;
}
</style>
<ul class="custom-shortcut-list">
  <li><a href="<?php echo admin_url('edit.php'); ?>"><span class="dashicons dashicons-admin-post"></span>ブログ（投稿）一覧</a></li>
  <li><a href="<?php echo admin_url('edit.php?post_type=campaign'); ?>"><span class="dashicons dashicons-megaphone"></span>キャンペーン一覧</a></li>
  <li><a href="<?php echo admin_url('edit.php?post_type=voice'); ?>"><span class="dashicons dashicons-format-chat"></span>お客様の声一覧</a></li>
  <li><a href="<?php echo admin_url('upload.php'); ?>"><span class="dashicons dashicons-format-image"></span>メディア一覧</a></li>
  <li><a href="<?php echo admin_url('edit.php?post_type=page'); ?>"><span class="dashicons dashicons-admin-page"></span>固定ページ一覧</a></li>
</ul>
<?php
}