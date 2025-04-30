<?php if (function_exists('bcn_display')): ?>
<div class="breadcrumb page-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php
				// 404ページかどうかを確認
				$is_404 = is_404();
				$wrapper_class = $is_404 ?
				'breadcrumb-wrapper breadcrumb-wrapper--white' : 'breadcrumb-wrapper';
				?>
    <nav class="<?php echo esc_attr($wrapper_class); ?>" aria-label="パンくずリスト">
      <?php
				ob_start();
				bcn_display(); // パンくずHTMLを一時的に取得
				$breadcrumb = ob_get_clean();

				global $post;
			echo $breadcrumb;
			?>
    </nav>
  </div>
</div>
<?php endif; ?>