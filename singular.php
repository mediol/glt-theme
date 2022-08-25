<?php get_header('home'); ?>

    <main>
        <div class="container">
            <div class="page__wrap">
                <h1 class="page__title"><?php the_title() ?></h1>

                <div class="page__content">

                    <?php the_content(); ?>

                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>