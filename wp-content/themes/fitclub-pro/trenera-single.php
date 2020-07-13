<?php
 /* Template Name: Trenera-single */
?>

<?php get_header(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112911160-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112911160-1');
</script>

<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/owl.theme.default.css">

	<?php do_action( 'fitclub_before_body_content' );

	$fitclub_layout = fitclub_layout_class();
	?>

	<div id="content" class="site-content">
		<main id="main" class="clearfix <?php echo esc_attr($fitclub_layout); ?>">
			<div class="tg-container">
				<div id="primary" class="content-area">

					<div class="trener-content">
						<div class="trener-content__left">
							<div class="trener-content__left-main-img owl-carousel" data-slider-id="1" id="owl-1">
								<?php if(get_field('slider')){
									foreach (get_field('slider') as $item) { ?>
										<img src="<?= $item['big_photo'] ?>">
									<?php }
								 } ?>
							</div>
							<div class="trener-content__left-subimages owl-thumbs" data-slider-id="1">
								<?php if(get_field('slider')){
									foreach (get_field('slider') as $item) { ?>
										<img class="owl-thumb-item" src="<?= $item['thumb'] ?>">
								<?php	}
								 } ?>
							</div>
						</div>
						<div class="trener-content__right">
							<h2 class="trener-content__right-title"><?php the_field('trener_title'); ?></h2>
							<span class="trener-content__right-subtitle"><?php the_field('trener_subtitle'); ?></span>
							<?php the_field('trener_desc'); ?>
						</div>
					</div>

					<?php if ( have_posts() ) :

							while ( have_posts() ) : the_post();

								// the_content();

							endwhile;

					endif; ?>
				</div><!-- #primary -->
				<?php fitclub_sidebar_select(); ?>
			</div>
		</main>
	</div>

	<style>
	@import url('https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext');

	.trener-content {
		display: flex;
		align-items: flex-start;
		justify-content: space-between;
	}

	.trener-content__left {
		max-width: 420px;
	}

	.trener-content__left-main-img {
		margin-bottom: 15px;
	}

	.trener-content__left-subimages {
		display: flex;
		align-items: center;
		flex-wrap: wrap;
	}

	.trener-content__left-subimages img {
		margin-right: 20px;
		margin-bottom: 10px;
		display: block;
		cursor: pointer;
	}

	.trener-content__left-subimages img:nth-child(4n) {
		margin-right: 0;
	}

	.trener-content__right-title {
		margin-bottom: 5px;
		font-family: Fira Sans;
		font-style: normal;
		font-weight: bold;
		font-size: 18px;
		line-height: 22px;/* identical to box height */
		letter-spacing: 0.01em;
		text-transform: uppercase;
	}

	.trener-content__right-subtitle {
		font-family: Fira Sans;
		font-style: normal;
		font-weight: normal;
		font-size: 15px;
		line-height: 18px;
		display: block;
		margin-bottom: 25px;
		text-transform: uppercase;
	}

	.trener-content__right {
		width: 370px;
	}

	.trener-content__right p {
		font-family: Fira Sans;
		font-style: normal;
		font-size: 16px;
		line-height: 19px;/* identical to box height */
		letter-spacing: 0.01em;
	}

	.owl-dots {
		display: none;
	}

	.trener-content__left-subimages img.active {
		border-bottom: 4px solid #9ecc01;
	}
	  
	  .owl-thumb-item {
			width: 90px;
			height: 80px;
			object-fit: cover;
		  }
	  
	  .owl-carousel .owl-item img {
			width: 420px;
			height: 567px;
			object-fit: cover;
		  }

	@media(max-width: 1200px) {
		.trener-content {
			flex-direction: column;
		}

		.trener-content__left {
			/*max-width: 100%;*/
			margin-bottom: 30px;
		}

		.trener-content__right {
			max-width: 100%;
		}
	}
	</style>

	<?php do_action( 'fitclub_after_body_content' ); ?>

<?php get_footer(); ?>