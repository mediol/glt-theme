<?php
/*
Template Name: Thank page
*/
?>

<?php get_header(); ?>

    <div class="thank__logo">
        <?php echo get_custom_logo(); ?>
    </div>
    <main>
        <div class="container">
            <div class="page__wrap">

                <div class="page__content">

                    <h1 class="page__title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>

                </div>

                <div class="thank__info">
                    <div class="required_block">
                        <?php echo carbon_get_theme_option('req_text') ?>
                        <a href="<?php echo carbon_get_theme_option('req_btn_link') ?>" class="req_btn"><?php echo carbon_get_theme_option('req_btn_text') ?></a>
                    </div>
    
                    <div class="book_info">
                        <p><?php echo carbon_get_theme_option('booking_info') ?></p>
                        <a href="<?php echo carbon_get_theme_option('clinic_address_link') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/map-marker-white.svg ?>" alt=""> <?php echo carbon_get_theme_option('clinic_address') ?></a>
                        <a href="tel:<?php echo carbon_get_theme_option('clinic_phone_link') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-ico.svg ?>" alt=""> <?php echo carbon_get_theme_option('clinic_phone') ?></a>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>