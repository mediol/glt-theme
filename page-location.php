<?php
/*
Template Name: Location
Template Post Type: post
*/
?>

<?php 
    $page_id = get_the_ID();
    $center_img_id = carbon_get_post_meta(get_the_ID(), 'center_img');
    $center_img_url = wp_get_attachment_image_url( $center_img_id, 'location' );
    $location_accordeon = carbon_get_post_meta( $page_id, 'location_accordeon' );
    $flip_card_1 = carbon_get_post_meta( $page_id, 'card_1_name' );
    $flip_card_2 = carbon_get_post_meta( $page_id, 'card_2_name' );
    $flip_card_3 = carbon_get_post_meta( $page_id, 'card_3_name' );
    $flip_card_4 = carbon_get_post_meta( $page_id, 'card_4_name' );
    $hiw_step_slider = carbon_get_post_meta( $page_id, 'hiw_step_slider' );
    $btn_url = carbon_get_theme_option('btn_url');
    $btn_text = carbon_get_theme_option('btn_text');
?>

<?php get_header('home'); ?>

<main class="main">
        <!-- First section -->
        <section class="location-hero">
            <div class="container">
                <div class="location-hero-text">
                    <p class="location-hero-uptitle">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/plane.svg" alt="plane ico" class="location-hero-uptitle__ico">
                        <?php echo carbon_get_post_meta($page_id, 'lfs_section_up_title') ?>
                    </p>
                    <h1 class="site-title"><?php echo carbon_get_post_meta($page_id, 'lfs_section_title') ?></h1>
                    <p class="subtitle"><?php echo carbon_get_post_meta($page_id, 'lfs_section_sub_title') ?></p>
                </div>
            </div>
        </section>
        <!-- End First section -->

        <!-- Location map -->
        <section class="map">
            <div class="container">
                <div class="map-iframe">
                    <iframe style="border:0; width: 100%; height: 100%;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.457937324889!2d-80.05782468496024!3d26.665832883234582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d790e0510ea9%3A0x9764ada799f38442!2s5303%20S%20Dixie%20Hwy%2C%20West%20Palm%20Beach%2C%20FL%2033405!5e0!3m2!1sen!2sus!4v1644598321566!5m2!1sen!2sus"
                    frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="map-details">
                    <h2><?php echo carbon_get_post_meta($page_id, 'map_section_title') ?></h2>
                    <div class="rate"></div>
                    <p><?php echo carbon_get_post_meta($page_id, 'map_section_sub_title') ?></p>
                    <div class="details-wrap">
                        <ul class="shedule">
                            <li class="shedule-day active"><span>Thu</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Fri</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Sat</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Sun</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Mon</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Tues</span><span>8:00 am - 10:00 pm</span></li>
                            <li class="shedule-day"><span>Wed</span><span>8:00 am - 10:00 pm</span></li>
                        </ul>
                        <div class="map-contact">
                            <a href="https://goo.gl/maps/crWysv36qxjGqeSt6" class="map-address" target="_blank"><?php echo carbon_get_post_meta($page_id, 'map_address') ?></a>
                            <a href="<?php echo carbon_get_post_meta($page_id, 'map_phone_number') ?>" class="map-tel"><?php echo carbon_get_post_meta($page_id, 'map_phone_number') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End location map -->

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
                                                            <div class="sale-price"><span class="old-price"><?php echo $flip_card['old_price'] ?></span> from <span class="new-price"><?php echo $flip_card['regular_price'] ?></span></span></div>
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

        <!-- Book section -->
        <section class="book">
            <div class="container">
                <h2><?php echo carbon_get_post_meta($page_id, 'book_section_title') ?></h2>
                <a href="<?php echo $btn_url; ?>" class="btn-book"><?php echo $btn_text; ?></a>
            </div>
        </section>
        <!-- End Book section -->

        <!-- Testing center -->
        <section class="testing-center">
            <div class="container">
                <div class="center-img">
                    <figure>
                        <img src="<?php echo $center_img_url; ?>" alt="Miami Covid testing center">
                    </figure>
                </div>
                <div class="center-desc">
                    <h2><?php echo carbon_get_post_meta($page_id, 'center_section_title') ?></h2>
                    <p><?php echo carbon_get_post_meta($page_id, 'center_section_desc') ?></p>
                        <a href="<?php echo $btn_url; ?>" class="btn-book"><?php echo $btn_text; ?></a>
                </div>
            </div>
        </section>
        <!-- End Testing center -->

    </main>

<?php get_footer(); ?>