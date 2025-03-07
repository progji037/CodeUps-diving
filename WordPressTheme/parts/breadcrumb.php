<div class="breadcrumb page-breadcrumb">
  <div class="breadcrumb__inner inner">
    <div class="breadcrumb-wrapper">
      <?php
  $breadcrumb_title = get_field('breadcrumb_title'); // ACFのフィールドを取得

  if (!empty($breadcrumb_title)) {
    echo esc_html($breadcrumb_title); // ACFの値があれば表示
  } else {
    // Breadcrumb NavXTが有効な場合のみ表示
    if (function_exists('bcn_display')) {
      bcn_display();
    } else {
      echo '<p class="breadcrumb-default">TOP ><?php the_title();?></p>'; // 代替テキストを表示
      }
      }
      ?>
    </div>

  </div>
</div>