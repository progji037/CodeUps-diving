<div class="voice-section__tab">
  <div class="tab-links">
    <ul class="tab-links__lists">
      <!-- ALL タブ（すべて表示用） -->
      <li class="tab-links__list">
        <a href="<?php echo get_term_link(get_queried_object()); ?>" class="tab-link <?php echo empty($_GET['tab']) ? 'active' : ''; ?>">
          ALL
        </a>
      </li>

      <?php
            // タクソノミー「campaign_tab」の一覧を取得
            $terms = get_terms(array(
                'taxonomy'   => 'voice_tab',
                'hide_empty' => true,
            ));

            foreach ($terms as $term):
                $icovoice_tab = get_field('tab_icon', $term); // ACFのアイコンフィールド（ある場合）
                $tab_url = add_query_arg('tab', $term->slug, get_term_link(get_queried_object()));
                $active_class = (isset($_GET['tab']) && $_GET['tab'] === $term->slug) ? 'active' : '';
            ?>
      <li class="tab-links__list">
        <a href="<?php echo esc_url($tab_url); ?>" class="tab-link <?php echo esc_attr($active_class); ?>">
          <?php if ($icon): ?>
          <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($term->name); ?>">
          <?php endif; ?>
          <?php echo esc_html($term->name); ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>