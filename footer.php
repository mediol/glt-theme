        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <?php if ( is_active_sidebar( 'foot_sidebar_one', 'foot_sidebar_two', 'foot_sidebar_three', 'foot_sidebar_four' ) ) : ?>
                    <div class="sidebars_row">
                        <?php echo get_custom_logo(); ?>
                        <?php dynamic_sidebar( 'foot_sidebar_one' ); ?>
                        <?php dynamic_sidebar( 'foot_sidebar_two' ); ?>
                        <?php dynamic_sidebar( 'foot_sidebar_three' ); ?>
                        <div class="social foot_widget">
                            <h3 class="widget_title">Follow us</h3>
                            <ul class="social_list">
                                <?php if ($GLOBALS['alliance_stat']['instagram_url']) : ?>
                                    <li class="social_link">
                                        <a href="<?php echo $GLOBALS['alliance_stat']['instagram_url']; ?>" class="facebook" target="_blank">
                                            <img src="<?php echo wp_get_attachment_image_url($GLOBALS['alliance_stat']['social_logo_ig']); ?>" alt="">
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($GLOBALS['alliance_stat']['facebook_url']) : ?>
                                    <li class="social_link">
                                        <a href="<?php echo $GLOBALS['alliance_stat']['facebook_url']; ?>" class="instagram" target="_blank">
                                            <img src="<?php echo wp_get_attachment_image_url($GLOBALS['alliance_stat']['social_logo_fb']); ?>" alt="">
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($GLOBALS['alliance_stat']['linkedin_url']) : ?>
                                    <li class="social_link">
                                        <a href="<?php echo $GLOBALS['alliance_stat']['linkedin_url']; ?>" class="linkedin" target="_blank">
                                            <img src="<?php echo wp_get_attachment_image_url($GLOBALS['alliance_stat']['social_logo_ld']); ?>" alt="">
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($GLOBALS['alliance_stat']['google_url']) : ?>
                                    <li class="social_link">
                                        <a href="<?php echo $GLOBALS['alliance_stat']['google_url']; ?>" class="giigle_plus" target="_blank">
                                            <img src="<?php echo wp_get_attachment_image_url($GLOBALS['alliance_stat']['social_logo_g']); ?>" alt="">
                                        </a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="footer-wrap">
                    <p class="copyright">Copyright &copy; <?php echo date('Y'); ?> | All Rights Reserved by Alliance Stat Lab Inc.</p>
                    <p class="dev-name">
                        <span>Designed and<br>maintained by</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ursa_footer.png" alt="ursa digital logo">
                    </p>
                </div>
            </div>
        </footer>
        <!-- End footer -->
    </div>

    <?php wp_footer(); ?>

        <script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "lLVqH8jJcm");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script>
        <noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
