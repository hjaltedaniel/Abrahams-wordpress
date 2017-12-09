<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front page area 1') ) :
      endif; ?>
        </div>
        <div class="row">
            <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front page area 2') ) :
      endif; ?>
        </div>
        <div class="row">
            <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front page area 3') ) :
      endif; ?>
        </div>

        <?php endwhile; else: ?>
            <p>
                <?php _e('Sorry, no posts matched your criteria.'); ?>
            </p>
            <?php endif; ?>

                <?php get_footer(); ?>
