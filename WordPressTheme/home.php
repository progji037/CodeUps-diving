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
				<div class="main-view__title ">
					<h1 class="main-view__main-title main-view__main-title--capitalize">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>
		</section>

		<!-- パンくずリスト -->
		<div class="breadcrumb page-breadcrumb">
			<div class="breadcrumb__inner inner">
					<?php
					$breadcrumb_title = get_field('breadcrumb_title'); // ACFのフィールドを取得

					if (!empty($breadcrumb_title)) {
						echo esc_html($breadcrumb_title); // ACFの値があれば表示
					} else {
						// Breadcrumb NavXTが有効な場合のみ表示
						if (function_exists('bcn_display')) {
							bcn_display();
						} else {
							echo '<p class="breadcrumb-default">TOP > Blog</p>'; // 代替テキストを表示
						}
					}
					?>
				</div>
			</div>
		</div>

		<section class="page-blog blog-section">
			<div class="blog-section__inner inner">
				<div class="blog-section__wrapper">
					<div class="blog-section__main">
						<div class="blog-section__container ">
							<div class="blog-section__cards">
								<div class="cards cards--blog">
									<!-- 1 -->
									<div class="cards__item">
										<a class="card" href="blog-detail.html">
											<div class="card__figure card__figure--hover">
												<img src="./assets/images/common/blog-ocean4-sp.jpg" alt="" />
											</div>
											<div class="card__header card__header--low">
												<div class="card__date">
													<time datetime="2023-11-17">2023.11/17</time>
												</div>
												<div class="card__heading">ライセンス取得</div>
											</div>
											<div class="card__body">
												<div class="card__text">
													<p>
														ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
														ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
													</p>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-section__pagination blog-section__pagination--pc">
							<div class="pagination">
								<div class="pagination__list pagination__list--left"><a href="#"></a></div>
								<ul class="pagination__lists">
									<li class="pagination__list"><a href="#" class="is-active">1</a></li>
									<li class="pagination__list"><a href="#">2</a></li>
									<li class="pagination__list"><a href="#">3</a></li>
									<li class="pagination__list"><a href="#">4</a></li>
									<li class="pagination__list pagination__list--pc"><a href="#">5</a></li>
									<li class="pagination__list pagination__list--pc"><a href="#">6</a></li>
								</ul>
								<div class="pagination__list pagination__list--right"><a href="#"></a></div>
							</div>
						</div>
					</div>
					<!-- get_sidebar(); -->
				</div>
			</div>
		</section>

<?php get_footer(); ?>