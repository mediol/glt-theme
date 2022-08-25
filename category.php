<?php get_header('home'); ?>

<main>
    <div class="container">
        <?php
            $args = array(
                'posts_per_page' => 5
            );
            $q = new WP_Query( $args );
            if( $q->have_posts() ) :
                while( $q->have_posts() ) : $q->the_post();
                    echo '<a href="' . get_permalink() . '"><h2>' . get_the_title() . '</h2></a>';
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
</main>

<?php get_footer(); ?>