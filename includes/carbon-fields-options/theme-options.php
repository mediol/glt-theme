<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __('Theme options', 'crb') )
->add_tab( __('Site settings'), [
	Field::make( 'text', 'btn_url', 'Button Url' )
        ->set_width(25),
	Field::make( 'text', 'btn_text', 'Button Text' )
        ->set_width(25),
	Field::make( 'text', 'phone_number_href', 'Phone number without spaces' )
        ->set_width(25),
	Field::make( 'text', 'phone_number', 'Phone number any formats' )
        ->set_width(25),
        Field::make( 'image', 'social_logo_ig', 'Social Logo')
        ->set_width(15),
	Field::make( 'text', 'insta_url', 'Instagram Url' )
        ->set_width(35),
        Field::make( 'image', 'social_logo_fb', 'Social Logo')
        ->set_width(15),
	Field::make( 'text', 'fb_url', 'Facebook Url' )
        ->set_width(35),
        Field::make( 'image', 'social_logo_ld', 'Social Logo')
        ->set_width(15),
	Field::make( 'text', 'ld_url', 'LinkedIn Url' )
        ->set_width(35),
        Field::make( 'image', 'social_logo_g', 'Social Logo')
        ->set_width(15),
	Field::make( 'text', 'g_url', 'Google Url' )
        ->set_width(35),
        Field::make( 'header_scripts', 'google_tag_manager', 'Google Tag Manager' )
        ->set_width(50),
        Field::make( 'header_scripts', 'google_analytics', 'Google Analytics' )
        ->set_width(50),
])
->add_tab( __('Thank page'), [
	Field::make( 'rich_text', 'req_text', 'Required text' )
        ->set_width(50),
	Field::make( 'rich_text', 'booking_info', 'Booking info' )
        ->set_width(50),
	Field::make( 'text', 'req_btn_text', 'Button text' )
        ->set_width(50),
	Field::make( 'text', 'req_btn_link', 'Button link' )
        ->set_width(50),
	Field::make( 'text', 'clinic_address', 'Clinic address' )
        ->set_width(50),
	Field::make( 'text', 'clinic_address_link', 'Clinic address link' )
        ->set_width(50),
	Field::make( 'text', 'clinic_phone', 'Clinic phone' )
        ->set_width(50),
	Field::make( 'text', 'clinic_phone_link', 'Clinic phone link' )
        ->set_width(50),
]);