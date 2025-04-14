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

    if ($query->is_archive(['campaign'])) {
        $query->set('posts_per_page', '10');
    }

    // ブログアーカイブページの表示件数を設定
    if ($query->is_home()) {
        $query->set('posts_per_page', '10'); // 元のカスタムクエリと同じ10件に設定
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

function register_campaign_post_type() {
    register_post_type('campaign', [
        'label' => 'Campaign',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'campaign'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-megaphone'
    ]);
}

function create_custom_post_type() {
    $labels = [
        'name' => __( 'swiper' ),
        'singular_name' => __( 'swipe' ),
        'add_new' => __( '新しいスライドを追加' ),
        'add_new_item' => __( '新しいスライドを追加' ),
        'edit_item' => __( 'スライドを編集' ),
        'new_item' => __( '新しいスライド' ),
        'view_item' => __( 'スライドを見る' ),
        'search_items' => __( 'スライドを検索' ),
        'not_found' => __( 'スライドが見つかりません' ),
        'not_found_in_trash' => __( 'ゴミ箱にスライドがありません' ),
        'menu_name' => __( 'swiper' ),
    ];
    $args = [
        'labels' => $labels,
        'description' => 'Description of Custom Post Type',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'mv_swiper'],
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_position' => 6,
        'supports' => ['title', 'editor','thumbnail'],
        'menu_icon' => 'dashicons-images-alt2'
    ];
    register_post_type( 'mv_swiper', $args );
}
add_action( 'init', 'create_custom_post_type' );

add_action('after_setup_theme', function() {
    load_theme_textdomain('smart-custom-fields', get_template_directory() . '/languages');
});

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

add_filter('wpcf7_form_tag', 'add_campaign_taxonomy_terms_to_select', 10, 2);
function add_campaign_taxonomy_terms_to_select($tag, $unused) {
    if ($tag['name'] !== 'campaign-category') return $tag;
    $terms = get_terms([
        'taxonomy' => 'campaign_tab',
        'hide_empty' => true,
    ]);
    if (is_wp_error($terms) || empty($terms)) return $tag;
    $options = [];
    foreach ($terms as $term) {
        $options[] = esc_html($term->name);
    }
    $tag['raw_values'] = $options;
    $tag['values'] = $options;
    $tag['labels'] = $options;
    return $tag;
}

function shortcode_br_sp() {
    return '<br class="u-mobile">';
}
add_shortcode('br_sp', 'shortcode_br_sp');

function custom_campaign_rewrite_rules() {
    add_rewrite_rule('campaign/page/([0-9]+)/?$', 'index.php?post_type=campaign&paged=$matches[1]', 'top');
}
add_action('init', 'custom_campaign_rewrite_rules');

function custom_campaign_tab_rewrite_rules() {
    add_rewrite_rule('campaign/tab/([^/]+)/page/([0-9]+)/?$', 'index.php?post_type=campaign&campaign_tab=$matches[1]&paged=$matches[2]', 'top');
}
add_action('init', 'custom_campaign_tab_rewrite_rules');

// キャンペーンアーカイブページのタブフィルタリング
function campaign_tab_filtering($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('campaign')) {
        // デフォルトの表示件数を設定
        $query->set('posts_per_page', 4);

        // タブでのフィルタリング（'all' のときは絞らない）
        if (isset($_GET['tab']) && $_GET['tab'] !== 'all') {
            $current_tab = sanitize_text_field($_GET['tab']);
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'campaign_tab',
                    'field'    => 'slug',
                    'terms'    => $current_tab,
                )
            ));
        }
    }
}
add_action('pre_get_posts', 'campaign_tab_filtering');

// Voiceアーカイブページのタブフィルタリング
function voice_tab_filtering($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('voice')) {
        // デフォルトの表示件数を設定
        $query->set('posts_per_page', 6); // archive-voice.phpと同じ表示件数に設定

        // タブでのフィルタリング
        if (isset($_GET['tab']) && !empty($_GET['tab'])) {
            $current_tab = sanitize_text_field($_GET['tab']);
            $query->set('tax_query', array(
                array(
									'taxonomy' => 'voice_tab',
									'field'    => 'slug',
									'terms'    => $current_tab,
                )
            ));
        }
    }
}
add_action('pre_get_posts', 'voice_tab_filtering');

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