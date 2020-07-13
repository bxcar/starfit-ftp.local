<?php
/* Template Name: karty-custom */
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

	<?php do_action( 'fitclub_before_body_content' );

	$fitclub_layout = fitclub_layout_class();
	?>

	<div id="content" class="site-content">
		<main id="main" class="clearfix <?php echo esc_attr($fitclub_layout); ?>">
			<div class="tg-container">
				<div id="primary" class="content-area">

<?php if(get_field('cards')) {
	foreach (get_field('cards') as $item) {
	    if(!empty($item['img'])) { ?>
            <div class="card-tile">
                <img src="<?= $item['img'] ?>">
                <div class="card-tile__content">
                    <span class="card-tile__title"><?= $item['title'] ?></span>
                    <span class="card-tile__subtitle"><?= $item['shedule1'] ?></span>
                    <span class="card-tile__subtitle"><?= $item['shedule2'] ?></span>
                    <span class="card-tile__price"><?= $item['price'] ?></span>
                    <span class="card-tile__bottom-text"><?= $item['bottom_text'] ?></span>
                </div>
            </div>
        <?php } else { ?>
            <div class="card-tile card-title-without-image">
                <div class="card-tile__content">
                    <?php if(empty($item['bottom_text'])) { ?>
                        <span style="margin-bottom: 20px;" class="card-tile__title"><?= $item['title'] ?></span>
                    <?php } else { ?>
                        <span class="card-tile__title"><?= $item['title'] ?></span>
                    <?php } ?>
                    <span class="card-tile__bottom-text"><?= $item['bottom_text'] ?></span>
                    <span class="card-tile__subtitle"><?= $item['shedule1'] ?></span>
                    <span class="card-tile__subtitle"><?= $item['shedule2'] ?></span>
                    <span class="card-tile__price"><?= $item['price'] ?></span>
                </div>
            </div>
        <?php } ?>
	<?php }
} ?>
<?php if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			the_content();

		endwhile;

endif; ?>
				</div><!-- #primary -->
				<?php fitclub_sidebar_select(); ?>
			</div>
		</main>
	</div>

	<style>
	.card-tile {
		display: flex;
		align-items: flex-start;
	}

	.card-tile img {
		width: 45%;
	}

	.card-tile__content {
		width: 55%;
	}

    .card-tile.card-title-without-image .card-tile__content {
        width: 100%;
    }

	.card-tile__content span {
		display: block;
		font-weight: bold;
		text-align: center;
	}

	.card-tile__title {
		font-size: 28px;
		margin-bottom: 20px;
	}

    .card-tile.card-title-without-image .card-tile__title {
        margin-bottom: 0;
        font-size: 32px;
        line-height: 32px;
    }

	.card-tile__subtitle {
		font-size: 22px;
	}

    .card-tile.card-title-without-image .card-tile__subtitle {
        line-height: 24px;
    }

    .card-tile__price {
		font-size: 28px;
		margin-bottom: 20px;
		margin-top: 10px;
	}

	.card-tile__bottom-text {
		font-size: 22px;
		color: #7f7f7f;
	}

    .card-tile.card-title-without-image .card-tile__bottom-text {
        margin-bottom: 5px;
        color: #333;
    }

	.card-tile {
		padding-bottom: 30px;
		border-bottom: 3px solid #8c8c89;
		margin-bottom: 30px;
	}

    .card-tile:last-child {
        border-bottom: none;
    }
	</style>

	<?php do_action( 'fitclub_after_body_content' ); ?>

<?php get_footer(); ?>
