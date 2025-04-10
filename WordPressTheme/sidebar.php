<aside class="blog-section__sidebar">
	<div class="blog-sidebar__inner">
		<div class="blog-sidebar">
			<div class="blog-sidebar__article">
				<div class="sidebar-article">
					<div class="sidebar-article__head">
						<div class="sidebar-head">
							<div class="sidebar-head__title">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="whale">
								<h2 class="sidebar-head__text">
									人気記事
								</h2>
							</div>
						</div>
					</div>
					<div class="sidebar-article__cards">
						<div class="article-cards">
							<div class="article-cards__item">
								<?php
								  // 投稿の条件を設定
									$args = array(
										'post_type'      => 'post',
										'posts_per_page' => 3,
										'post_status'    => 'publish',
										'orderby'        => 'date',
										'order'          => 'DESC',
									);
									$query = new WP_Query($args);
									if ($query->have_posts()) : ?>
									<?php while ($query->have_posts()) : $query->the_post(); ?>
								<a class="article-card" href="<?php echo esc_url(get_permalink()); ?>">
									<div class="article-card__item">
										<?php if (has_post_thumbnail()) : ?>
												<?php the_post_thumbnail(array(121, 90)); ?>
										<?php else: ?>
												<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/noimage.png" alt="no image" />
										<?php endif; ?>
										<div class="article-card__meta">
											<?php
													$blog_date = get_post_meta(get_the_ID(), 'blog_date', true);
													if ($blog_date) {
															// `blog_date` が "20231117" のような形式の場合、正しい日付フォーマットに変換
															$formatted_date = date('Y.m.d', strtotime($blog_date));
															$datetime_attr = date('c', strtotime($blog_date));
													} else {
															// カスタムフィールドが空なら投稿の公開日を使う
															$formatted_date = get_the_date('Y.m.d');
															$datetime_attr = get_the_date('c');
													}
													?>
													<time datetime="<?php echo esc_attr($datetime_attr); ?>">
													<?php echo esc_html($formatted_date); ?>
											</time>
												<p>
													<?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 14, '', 'UTF-8'); ?>
												</p>
										</div>
									</div>
								</a>
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
				</div>
			</div>
			<div class="blog-sidebar__review">
				<div class="sidebar-review">
					<div class="sidebar-review__head">
						<div class="sidebar-head">
							<div class="sidebar-head__title">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
								<h2 class="sidebar-head__text">
									口コミ
								</h2>
							</div>
						</div>
					</div>
					<?php
					  // 投稿の条件を設定
						$args = array(
						'post_type'      => 'voice',
						'posts_per_page' => 1,
						'post_status'    => 'publish',
						'orderby'        => 'date',
						'order'          => 'DESC',
						);
						 // 投稿を実際に取り出す
						$query = new WP_Query($args);
						if ($query->have_posts()) :
					  while ($query->have_posts()) : $query->the_post(); ?>
					<div class="sidebar-review__voice">
						<?php if (has_post_thumbnail()) {
								the_post_thumbnail(array(294, 218));
							} else { // 「アイキャッチ画像があれば」以外なら
								echo '<img src="' . get_template_directory_uri() . '/images/common/noimage.png" alt="no image" />">';
						} ?>
						<p>
							<?php the_field('voice_age'); ?>
						</p>
						<div class="sidebar-review__title">
							<?php the_title(); ?>
						</div>
					</div>
					<?php
						endwhile;
							wp_reset_postdata();
						else :
							echo '<p>記事がありません。</p>';
						endif;
					?>
					<div class="sidebar-review__link">
						<a class="button" href="<?php echo esc_url( get_post_type_archive_link( 'voice' ) ); ?>">
							View more
							<span class="arrow"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="blog-sidebar__campaign">
				<div class="sidebar-campaign">
					<div class="sidebar-campaign__head">
						<div class="sidebar-head">
							<div class="sidebar-head__title">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
								<h2 class="sidebar-head__text">
									キャンペーン
								</h2>
							</div>
						</div>
					</div>
					<div class="sidebar-campaign__cards">
						<?php
							// 投稿の条件を設定
							$args = array(
							'post_type'      => 'campaign',
							'posts_per_page' => 2,
							'post_status'    => 'publish',
							'orderby'        => 'date',
							'order'          => 'DESC',
							);

							// 投稿を実際に取り出す
							$query = new WP_Query($args);
							if ($query->have_posts()) :
						?>
						<?php while ($query->have_posts()) : $query->the_post(); ?>
						<?php
							$card__image     = SCF::get('campaign-card__image');
							$markdown        = SCF::get('campaign-card__markdown'); // 旧価格
							$reduceprice     = SCF::get('campaign-card__reduced-price'); // 新価格
							?>
						<div class="sidebar-campaign-lists">
							<div class="sidebar-campaign-list__card campaign-card">
								<div class="campaign-card__image campaign-card__image--blog">
									<?php
										// 🔧② アイキャッチ画像ではなく、カスタム画像を表示
										if (!empty($card__image)) {
											echo wp_get_attachment_image($card__image, 'full');
										} else {
											// fallback（noimage）
											echo '<img src="' . get_template_directory_uri() . '/assets/images/common/noimage.png" alt="no image" />">';
										}
									?>
								</div>
								<div class="campaign-card__textbox campaign-card__textbox--blog">
									<div class="campaign-card__header">
										<div class="campaign-card__head campaign-card__head--blog">
											<?php the_title(); ?>
										</div>
									</div>
									<div class="campaign-card__body">
										<div class="campaign-card__title campaign-card__title--blog">
											<p>全部コミコミ(お一人様)</p>
										</div>
										<div class="campaign-card__price campaign-card__price--blog">
											<div class="campaign-card__markdown campaign-card__markdown--blog">
												<?php
														if (!empty($markdown)) {
														echo '¥' . number_format(intval(str_replace(',', '', $markdown)));
														}
													?>
											</div>
											<div class="campaign-card__reduced-price campaign-card__reduced-price--blog">
													<?php
														if (!empty($reduceprice)) {
															echo '¥' . number_format(intval(str_replace(',', '', $reduceprice)));
														}
													?>
										</div>
									</div>
								</div>
							</div>
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
				<div class="sidebar-campaign__link ">
					<a class="button" href="<?php echo esc_url( get_post_type_archive_link( 'campaign' ) ); ?>">
						View more
						<span class="arrow"></span>
					</a>
				</div>
			</div>
			<div class="blog-sidebar__archive">
				<div class="sidebar-archive">
					<div class="sidebar-archive__head">
						<div class="sidebar-head">
							<div class="sidebar-head__title">
								<img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-low-icon-sp.png" alt="">
								<h2 class="sidebar-head__text">
									アーカイブ
								</h2>
							</div>
						</div>
					</div>
					<div class="sidebar-archive__date">
						<div class="archive-date">
							<div class="archive-date__lists">
								<div class="date-lists">
									<a class="date-lists__year js-date-lists__year" href="">2023</a>
									<ul class="date-lists__months js-date-lists__months">
										<li><a class="date-lists__month" href="#">3月</a></li>
										<li><a class="date-lists__month" href="#">2月</a></li>
										<li><a class="date-lists__month" href="#">1月</a></li>
									</ul>
								</div>
							</div>
							<div class="archive-date__lists">
								<div class="date-lists">
									<a class="date-lists__year js-date-lists__year" href="">2022</a>
									<ul class="date-lists__months js-date-lists__months">
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>