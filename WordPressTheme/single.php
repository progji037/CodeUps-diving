<?php get_header(); ?>

<section class="main-view">
  <div class="main-view__contents">
    <div class="main-view__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-pc.jpg" media="(min-width: 768px)" />
        <!-- 幅768px以上なら表示 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-sp.jpg" media="(max-width: 767px)" />
        <!-- 幅767px以下なら表示 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-blog-img-sp.jpg" alt="" />
      </picture>
    </div>
    <div class="main-view__title ">
      <h1 class="main-view__main-title main-view__main-title--capitalize">blog</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb')?>

<section class="page-blog-detail blog-section">
  <div class="blog-section__inner inner">
    <div class="blog-section__wrapper">
      <div class="blog-section__main">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="blog-section__container">
          <div class="blog-detail">
            <div class="blog-detail__head">
              <div class="blog-detail__head-date">
                <?php the_field('blog_date'); ?>
              </div>
              <h1 class="blog-detail__head-title"><?php the_title(); ?></h1>
            </div>
            <div class="blog-detail__image">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
            </div>
            <div class="blog-detail__contents">
              <p>
                <?php the_content(); ?>
              </p>
              <?php if( get_field('blog_image2') ): ?>
              <img src="<?php the_field('blog_image2'); ?>" />
              <?php endif; ?>
              <p>
                <?php
                      $text2 = get_field('blog_text2');
                      if( $text2 ):
                          echo nl2br($text2);
                      endif;
                    ?>
              </p>
              <ul>
                <li>
                  <?php
                        $list1 = get_field('blog_list-title1');
                        if( $list1 ):
                            echo nl2br($list1);
                        endif;
                      ?>
                </li>
                <li>
                  <?php
                        $list2 = get_field('blog_list-title2');
                        if( $list2 ):
                            echo nl2br($list2);
                        endif;
                      ?>
                </li>
                <li>
                  <?php
                        $list3 = get_field('blog_list-title3');
                        if( $list3 ):
                            echo nl2br($list3);
                        endif;
                      ?>
                </li>
              </ul>
              <p>
                <?php
                      $text3 = get_field('blog_text3');
                      if( $text3 ):
                          echo nl2br($text3);
                      endif;
                    ?>
              </p>
            </div>
          </div>

          <div class="blog-detail__pagination">
            <div class="pagination">
              <div class="pagination__list pagination__list--left">
                <?php
                      $prev_post = get_previous_post(false); // 同一カテゴリを無視
                      if ($prev_post):
                          $prev_url = get_permalink($prev_post->ID);
                          echo '<a href="' . esc_url($prev_url) . '"></a>';
                      endif;
                    ?>
              </div>
              <div class="pagination__list pagination__list--right">
                <?php
                      $next_post = get_next_post(false); // 同一カテゴリを無視
                      if ($next_post):
                          $next_url = get_permalink($next_post->ID);
                          echo '<a href="' . esc_url($next_url) . '"></a>';
                      endif;
                    ?>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>