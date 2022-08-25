<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// =========== HOME PAGE ===========

Container::make( 'post_meta', __( 'Hero section' ) )
->show_on_page(5)
->set_priority('high')
->add_fields([
    Field::make( 'text', 'section_up_title', 'Section Up Title' ),
    Field::make( 'text', 'section_title', 'Section Title' ),
    Field::make('complex', 'hero_list', 'Facts')
    ->set_width(70)
	->add_fields([
        Field::make( 'image', 'icon', 'Icon' )
            ->set_width(20),
        Field::make( 'rich_text', 'text', 'Text' )
            ->set_rows(1)
            ->set_width(30),
    ])
    ->help_text( 'Please, add the facts all you need.' ),
    Field::make( 'image', 'hero_img', 'Hero background' )
        ->set_width(30),
]);

Container::make( 'post_meta', __( 'Locations section' ) )
->show_on_template( ['front-page.php', 'page-location.php'] )
->add_fields([
    Field::make( 'text', 'loc_section_title', 'Section Title' ),
    Field::make( 'text', 'loc_section_sub_title', 'Section Sub Title' ),
    Field::make('complex', 'location_accordeon', '-- Locations --')
	->add_fields([
        Field::make( 'text', 'location_name', 'Location Name' ),
        Field::make('complex', 'flip_cards', '-- Flip Cards --')
        ->add_fields([
            Field::make( 'text', 'flip_card_name', 'Card Name' )
                ->set_width(20),
            Field::make( 'text', 'flip_card_desc', 'Card description' )
                ->set_width(20),
            Field::make( 'text', 'sale_text', 'Sale text' )
                ->set_width(10),
            Field::make( 'text', 'time_vars', 'Time variants' )
                ->help_text( 'Only for Sale card! Else leave it empty.' )
                ->set_width(10),
            Field::make( 'text', 'old_price', 'Old Price' )
                ->help_text( 'Only for Sale card! Else leave it empty.' )
                ->set_width(10),
            Field::make( 'text', 'regular_price', 'Regular Price' )
                ->help_text( 'From this cost dependet the Sale price' )
                ->set_width(10),
                Field::make('complex', 'payment_buttons', '-- Payment Method Buttons --')
                ->set_width(20)
                ->add_fields([
                    Field::make( 'text', 'payment_bnt_name', 'Button Name' ),
                ]),
            // Field::make( 'text', 'self_pay_text', 'Self Pay Text' )
            //     ->set_width(33.33),
            // Field::make( 'text', 'insurance_text', 'Insurance Text' )
            //     ->set_width(33.33),
            // Field::make( 'text', 'un_insurance_text', 'Uninsurance Text' )
            //     ->set_width(33.33),
            Field::make('complex', 'flip_cards_buttons', '-- Result Time Buttons --')
            ->add_fields([
                Field::make( 'text', 'cost_time', 'Cost Time' )
                    ->set_width(33.33),
                Field::make( 'text', 'cost_price', 'Cost Price' )
                    ->set_width(33.33),
                Field::make( 'text', 'cost_btn_url', 'Cost Link' )
                    ->set_width(33.33),
            ])
        ])
    ])
    ->help_text( 'Please, add the locations all you need.' )
]);

Container::make( 'post_meta', __( 'How It Works' ) )
->show_on_template( ['front-page.php', 'page-location.php'] )
->add_fields([
    Field::make( 'text', 'hiw_section_title', 'Section Title' ),
    Field::make('complex', 'hiw_step_slider', 'Steps')
	->add_fields([
        Field::make( 'image', 'step_img', 'Step Image' )
            ->set_width(20),
        Field::make( 'text', 'step_name', 'Step Name' )
            ->set_width(30),
        Field::make( 'text', 'step_desc', 'Step Description' )
            ->set_width(50),
    ])
    ->help_text( 'Please, add the slides all you need.' )
]);

Container::make( 'post_meta', __( 'Find Your Location' ) )
->show_on_page(5)
->add_fields([
    Field::make( 'text', 'fyl_section_title', 'Section Title' )
    ->set_width(20),
    Field::make( 'textarea', 'fyl_section_desc', 'Section Description' )
    ->set_width(30),
    Field::make('complex', 'fyl_location_list', 'Location List')
    ->set_width(50)
	->add_fields([
        Field::make( 'text', 'fyl_location_address', 'Location address' ),
    ])
    ->help_text( 'Please, add the location addresses all you need.' ),
	Field::make( 'checkbox', 'crb_show_section', 'Show section' ),
]);

Container::make( 'post_meta', __( 'Frequently Asked Questions' ) )
->show_on_page(5)
->add_fields([
    Field::make( 'text', 'faq_section_title', 'Section Title' )
    ->set_width(30),
    Field::make('complex', 'faq_question_list', 'Question List')
    ->set_width(70)
	->add_fields([
        Field::make( 'text', 'faq_question', 'Question' )
            ->set_width(14),
        Field::make( 'rich_text', 'faq_answer', 'Answer' )
            ->set_width(60),
    ])
    ->help_text( 'Please, add the questions all you need.' )
]);

// =========== LOCATION PAGE ===========

Container::make( 'post_meta', __( 'Location First Section' ) )
->set_priority('high')
->show_on_template( 'page-location.php' )
->add_fields([
    Field::make( 'text', 'lfs_section_up_title', 'Section Up Title' )
    ->set_width(30),
    Field::make( 'text', 'lfs_section_title', 'Section Title' )
    ->set_width(30),
    Field::make( 'text', 'lfs_section_sub_title', 'Section Sub Title' )
    ->set_width(40),
]);

Container::make( 'post_meta', __( 'Map Section' ) )
->show_on_template( 'page-location.php' )
->add_fields([
    Field::make( 'text', 'map_section_title', 'Section Title' )
    ->set_width(25),
    Field::make( 'text', 'map_section_sub_title', 'Section Sub Title' )
    ->set_width(75),
    Field::make( 'text', 'map_address', 'address' )
    ->set_width(50),
    Field::make( 'text', 'map_phone_number', 'Phone number' )
    ->set_width(50),
    // Field::make( 'time', 'thu_am', 'thu am' )
    //     ->set_width(14),
    // Field::make( 'time', 'fri_am', 'fri am' )
    //     ->set_width(14),
    // Field::make( 'time', 'sat_am', 'sat am' )
    //     ->set_width(14),
    // Field::make( 'time', 'sun_am', 'sun am' )
    //     ->set_width(14),
    // Field::make( 'time', 'mon_am', 'mon am' )
    //     ->set_width(14),
    // Field::make( 'time', 'tues_am', 'tues am' )
    //     ->set_width(14),
    // Field::make( 'time', 'wed_am', 'wed am' )
    //     ->set_width(14),
    // Field::make( 'time', 'thu_pm', 'thu pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'fri_pm', 'fri pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'sat_pm', 'sat pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'sun_pm', 'sun pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'mon_pm', 'mon pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'tues_pm', 'tues pm' )
    //     ->set_width(14),
    // Field::make( 'time', 'wed_pm', 'wed pm' )
    //     ->set_width(14),
]);

Container::make( 'post_meta', __( 'Book Section' ) )
->show_on_template( 'page-location.php' )
->add_fields([
    Field::make( 'text', 'book_section_title', 'Section Title' ),
]);

Container::make( 'post_meta', __( 'Testing' ) )
->show_on_template( 'page-location.php' )
->add_fields([
    Field::make( 'image', 'center_img', 'Image' )
    ->set_width(15),
    Field::make( 'text', 'center_section_title', 'Section Title' )
    ->set_width(35),
    Field::make( 'rich_text', 'center_section_desc', 'Section Description' )
    ->set_width(50),
]);

// =========== PAGE CONTACT US ===========

// Container::make( 'post_meta', __( 'Map Coordinate' ) )
// ->show_on_template( ['page-location.php', 'page-contact'] )
// ->add_fields([
//     Field::make( 'text', 'site_map_coordinates', 'Map Coordinate' ),
// ]);