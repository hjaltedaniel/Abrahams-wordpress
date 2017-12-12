<!--Dette er templatets sideskabelon, som viser alle sider.-->
<?php
//Wordpress funktion som henter headeren fra filen header.php og linker de nødvendige filer.
get_header(); ?>

    <div class="container trans">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="my-4"><?php the_title(); ?></h1>
            <p>
                <?php the_content(); ?>
            </p>

            <?php endwhile; else: ?>
                <p>
                    <?php _e('Sorry, this page does not exist.'); ?>
                </p>
                <?php endif; ?>
    </div>

    <?php get_footer(); ?>
