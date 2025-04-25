<?php if (function_exists('bcn_display')): ?>
<div class="breadcrumb page-breadcrumb">
  <div class="breadcrumb__inner inner">
    <nav class="breadcrumb-wrapper" aria-label="パンくずリスト">
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