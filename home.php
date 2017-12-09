<?php get_header(); ?>

    <div class="row">
        <div class="col-sm-8">
            <h1>Nyheder</h1>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><em><?php the_time('j. F Y'); ?></em></p>
                <p><?php the_excerpt(); ?></p>
                <hr>

                <?php endwhile; else: ?>
                    <p>
                        <?php _e('Sorry, there are no posts.'); ?>
                    </p>
                    <?php endif; ?>

        </div>
        <div class="col-sm-4">

            <?php get_sidebar(); ?>

        </div>
    </div>
    
    <div class="row">
            <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front page area 2') ) :
      endif; ?>
        </div>

    <?php get_footer(); ?>
