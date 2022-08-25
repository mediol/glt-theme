<?php
/*
Template Name: Home page
*/
?>

<?php 
    $page_id = get_the_ID();
    $hero_img_id = carbon_get_post_meta($page_id, 'hero_img');
    $hero_img_url = wp_get_attachment_image_srcset( $hero_img_id, 'full' );
    $hero_list = carbon_get_post_meta( $page_id, 'hero_list' );
    $location_accordeon = carbon_get_post_meta( $page_id, 'location_accordeon' );
    // $flip_cards = $elem['flip_cards'];
    // $flip_cards_buttons = carbon_get_post_meta( $page_id, 'flip_cards_buttons' );
    $hiw_step_slider = carbon_get_post_meta( $page_id, 'hiw_step_slider' );
    $fyl_location_list = carbon_get_post_meta( $page_id, 'fyl_location_list' );
	$checkbox = carbon_get_post_meta( $page_id, 'crb_show_section' );
    $faq_question_list = carbon_get_post_meta( $page_id, 'faq_question_list' );
    $btn_url = carbon_get_theme_option('btn_url');
    $btn_text = carbon_get_theme_option('btn_text');
?>

<?php get_header('home'); ?>

    <main class="main">
        <!-- First section -->
        <section class="hero">
            <div class="container-fluid">
                <div class="hero-text">
                    <div class="hero-text__wrap">
                        <p class="hero-uptitle">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/plane.svg" alt="plane ico" class="hero-uptitle__ico">
                            <?php echo carbon_get_post_meta($page_id, 'section_up_title') ?>
                        </p>
                        <h1 class="site-title"><?php echo carbon_get_post_meta($page_id, 'section_title') ?></h1>
                        <?php if ( ! empty( $hero_list ) ): ?>
                            <ul class="hero-list">
                                <?php foreach ( $hero_list as $elem ): ?>
                                    <li>
                                        <div class="hero-list__ico"><img src="<?php echo wp_get_attachment_image_url($elem['icon']); ?>" alt=""></div>
                                        <p><?php echo $elem['text'] ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a id="myBtn" class="btn-book" ><?php echo $btn_text; ?></a>
                    </div>
                </div>
            </div>
            <div class="hero-img">
                <figure>
                    <img src="<?php echo $hero_img_url; ?>" alt="hero img" srcset="<?php echo $hero_img_url; ?>" sizes="<?php echo wp_get_attachment_image_sizes( $hero_img_url ) ?>">
                </figure>
                <!-- <button class="btn">Shedule now &uarr;</button> -->
            </div>
        </section>
        <!-- End first section -->

        <!-- Covid-19 testing options -->
        <section id="locations" class="options">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo carbon_get_post_meta($page_id, 'loc_section_title') ?></h2>
                    <p><?php echo carbon_get_post_meta($page_id, 'loc_section_sub_title') ?></p>
                </div>
                <?php if ( ! empty( $location_accordeon ) ): ?>
                    <div class="options-accordeon">
                        <?php foreach ( $location_accordeon as $location ): ?>
                            <details class="accordeon-item" open>
                                <summary><?php echo $location['location_name'] ?></summary>
                                <!--Flipping Carg With Covid Option-->
                                <div class="covid-options-container">
                                    <?php foreach ( $location['flip_cards'] as $flip_card ): ?>
                                        <div class="flip-card">
                                            <div class="flip-container sale approved">
                                                <div class="front">
                                                    <div class="left-section">
                                                        <h3><?php echo $flip_card['flip_card_name'] ?></h3>
                                                        <p><?php echo $flip_card ['time_vars'] ?></p>
                                                        <span><?php echo $flip_card['flip_card_desc'] ?></span>
                                                    </div>
                                                    <div class="right-section">
                                                        <div class="price">
                                                            <div class="sale-price"><span class="old-price"><?php echo $flip_card['old_price'] ?></span> <span class="new-price"><?php echo $flip_card['regular_price'] ?></span></span></div>
                                                            <div class="regular-price"><?php echo $flip_card['regular_price'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="back">
                                                    <span class="back-arr">&larr;</span>
                                                    <h3>Choose your payment method:</h3>
                                                    <div class="time">
                                                        <?php foreach ( $flip_card['payment_buttons'] as $payment_btn ): ?>
                                                            <a class="pay-method"><?php echo $payment_btn ['payment_bnt_name'] ?></a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="step-two hide">
                                                    <h3>Choose your result time:</h3>
                                                    <div class="time">
                                                        <?php foreach ( $flip_card['flip_cards_buttons'] as $flip_card_btn ): ?>
                                                            <a href="<?php echo $flip_card_btn['cost_btn_url'] ?>" class="pay-to-time first-cost"><?php echo $flip_card_btn['cost_time'] ?>
                                                                <br><span><?php echo $flip_card_btn['cost_price'] ?></span>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </details>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- End Covid-19 testing options -->

        <!-- How it works -->
        <section class="how-it-works">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo carbon_get_post_meta($page_id, 'hiw_section_title') ?></h2>
                </div>
                <?php if ( ! empty( $hiw_step_slider ) ): ?>
                    <div class="steps">
                        <?php foreach ( $hiw_step_slider as $key => $elem ): ?>
                            <div class="step-item">
                                <figure>
                                    <div class="counter">
                                        <span><?php echo $key+1; ?></span>
                                    </div>
                                    <img src="<?php echo wp_get_attachment_image_url($elem['step_img'], 'slider'); ?>" alt="step photo" class="step-photo">
                                </figure>
                                <div class="step-desc">
                                    <h3><?php echo $elem['step_name'] ?></h3>
                                    <p><?php echo $elem['step_desc'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <a href="<?php echo $btn_url; ?>" class="btn-book"><?php echo $btn_text; ?></a>
            </div>
        </section>
        <!-- End how it works -->

        <!-- Find your locations -->
		<?php if ( $checkbox ) : ?>
			<section class="location">
				<div class="container">
					<h2><?php echo carbon_get_post_meta($page_id, 'fyl_section_title') ?></h2>
					<div class="location-wrap">
						<p><?php echo carbon_get_post_meta($page_id, 'fyl_section_desc') ?></p>
						<?php if ( ! empty( $fyl_location_list ) ): ?>
							<ul class="location-list">
								<?php foreach ( $fyl_location_list as $elem ): ?>
									<li class="location-item"><?php echo $elem['fyl_location_address'] ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					<a href="<?php echo $btn_url; ?>" class="btn-book"><?php echo $btn_text; ?></a>
				</div>
			</section>
 		<?php endif; ?>
        <!-- End Find your locations -->

        <!-- Frequently Asked Questions -->
        <section class="faq">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo carbon_get_post_meta($page_id, 'faq_section_title') ?></h2>
                </div>
                <?php if ( ! empty( $faq_question_list ) ): ?>
                    <div class="faq-accordeon">
                        <?php foreach ( $faq_question_list as $elem ): ?>
                            <details class="accordeon-item">
                                <summary><?php echo $elem['faq_question'] ?></summary>
                                <?php echo $elem['faq_answer'] ?>
                            </details>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- End Frequently Asked Questions -->
    </main>

<?php get_footer(); ?>