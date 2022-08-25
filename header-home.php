<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
  <?php wp_body_open(); ?>
  <div class="wrapper">

    <!--------------------------Header-------------------------------------->
    <header id="main-header" class="main-header">
      <div class="side-menu">
        <div class="side-menu-container">
          <?php
              wp_nav_menu( [
                  'theme_location'  => 'sidebar_menu',
                  'container'       => null,
                  'menu_class'      => 'list-load',
              ] );
          ?>
        </div>
        <div class="menu-social">
          <div class="social-media">
            <?php if ($GLOBALS['alliance_stat']['instagram_url']) : ?>
              <a href="<?php echo $GLOBALS['alliance_stat']['instagram_url']; ?>" class="facebook" target="_blank"></a>
            <?php endif ?>
            <?php if ($GLOBALS['alliance_stat']['facebook_url']) : ?>
              <a href="<?php echo $GLOBALS['alliance_stat']['facebook_url']; ?>" class="instagram" target="_blank"></a>
            <?php endif ?>
          </div>
          <a href="tel:<?php echo $GLOBALS['alliance_stat']['phone_number_href']; ?>" class="tel"><?php echo $GLOBALS['alliance_stat']['phone_number']; ?></a>
        </div>
      </div>

      <div id="header" class="header">
        <?php echo get_custom_logo(); ?>

        <div class="menu-button">
          <div class="burger-box">
            <div class="menu-icon-container">
              <a href="#" class="menu-icon js-menu-toggle closed">
                <span class="menu-icon-box">
                  <span class="menu-icon-line menu-icon-line--1"></span>
                  <span class="menu-icon-line menu-icon-line--2"></span>
                  <span class="menu-icon-line menu-icon-line--3"></span>
                </span>
              </a>
            </div>
          </div>
        </div>
        
        <div class="right-section-header">
          <div class="find-by-zip"></div>
          <a href="tel:<?php echo $GLOBALS['alliance_stat']['phone_number_href']; ?>" class="tel"><?php echo $GLOBALS['alliance_stat']['phone_number']; ?></a>
        </div>
    </header>
    <!--------------------------End-Header------------------------------------>