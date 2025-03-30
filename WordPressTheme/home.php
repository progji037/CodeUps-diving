<?php get_header(); ?>


	<!-- 下層ページのメインビュー -->
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
				<div class="main-view__title">
							<?php
							$post_type = get_post_type(); // 現在の投稿タイプを取得
							$post_type_obj = get_post_type_object($post_type);
							?>
						<h1 class="main-view__main-title">
								<?php
								if ($post_type === 'post') {
										echo 'Blog'; // 投稿タイプが「投稿（post）」なら Blog に変更
								} else {
										echo esc_html($post_type_obj->label); // その他の投稿タイプは通常のラベルを表示
								}
								?>
						</h1>
				</div>

			</div>
		</section>

		<!-- パンくずリスト -->
		<?php get_template_part('parts/breadcrumb')?>

		<section class="page-blog blog-section">
			<div class="blog-section__inner inner">
				<div class="blog-section__wrapper">
					<div class="blog-section__main">
						<div class="blog-section__container">
							<div class="blog-section__cards">
									<div class="cards cards--blog">
											<?php
													// 現在のページ番号を取得
													$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
													// 標準の投稿（Post）の記事を取得
													$args = array(
															'post_type'      => 'post', // 標準の投稿タイプ
															'posts_per_page' => 10, // 表示する記事数
															'post_status'    => 'publish', // 公開済みの投稿のみ
															'paged'          => $paged // 現在のページ番号を指定
													);
													$blog_query = new WP_Query($args);

													if ($blog_query->have_posts()) :
															while ($blog_query->have_posts()) : $blog_query->the_post();
											?>
											<div class="cards__item">
													<a class="card" href="<?php the_permalink(); ?>">
															<div class="card__figure card__figure--hover">
																	<?php if (has_post_thumbnail()) : ?>
																			<?php the_post_thumbnail('full'); ?>
																	<?php else: ?>
																			<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage__comp.png" alt="no image" />
																	<?php endif; ?>
															</div>
															<div class="card__header card__header--low">
																	<div class="card__date">
																	<?php
																			$blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
																			if ($blog_date) {
																					// `blog_date` が "20231117" のような形式の場合、正しい日付フォーマットに変換
																					$formatted_date = date('Y.m/d', strtotime($blog_date));
																					$datetime_attr = date('c', strtotime($blog_date));
																			} else {
																					// カスタムフィールドが空なら投稿の公開日を使う
																					$formatted_date = get_the_date('Y.m/d');
																					$datetime_attr = get_the_date('c');
																			}
																			?>
																			<time datetime="<?php echo esc_attr($datetime_attr); ?>">
																					<?php echo esc_html($formatted_date); ?>
																			</time>
																	</div>
																	<div class="card__heading"><?php the_title(); ?></div>
															</div>
															<div class="card__body">
																<div class="card__text">
																		<?php
																			$content = get_the_content(); // 投稿の本文を取得
																			$max_length = 90; // 文字数制限

																			// 文字数が制限を超えていたら、制限内の部分だけ表示
																			if (mb_strlen(strip_tags($content), 'UTF-8') > $max_length) {
																					$content = mb_substr(strip_tags($content), 0, $max_length, 'UTF-8'); // 超えた分を削除
																			}

																			echo wpautop($content); // 改行を反映して表示
																		?>
																</div>
															</div>
													</a>
											</div>
											<?php
														endwhile;
														wp_reset_postdata();
												else :
														echo '<p>記事がありません。</p>';
												endif;
											?>
									</div>
							</div>
						</div>
						<div class="blog-section__pagination blog-section__pagination--pc">
							<div class="pagination">
								<?php
								if (function_exists('wp_pagenavi')) {
									wp_pagenavi(array(
										'query' => $blog_query
									));
								}
								?>
							</div>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>

<?php get_footer(); ?>