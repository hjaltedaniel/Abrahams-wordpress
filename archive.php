<?php get_header(); ?>
<h1><?php single_cat_title()?></h1>
<div class="row">
<?php  
$category = get_the_category();
// get posts
$posts = get_posts(array(
	'post_type'			=> 'post',
	'posts_per_page'	=> -1,
    'category'          => $category[0]->term_id,
	'meta_key'			=> 'dato',
	'orderby'			=> 'dato',
	'order'				=> 'ASC'
));

if( $posts ): ?>
<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    $date = get_field('dato');
?>

<?php if (date(Ymd) <= $date): ?>

               <style>
                   div#top-<?php the_ID();?> {
                       background-image: url(<?php the_post_thumbnail_url( 'medium' );?>);
                       background-size: cover;
                   }
                </style>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                   <div class="card-img-top" id="top-<?php the_ID();?>"></div>
                    <div class="card-block">
                        <a href="<?php the_permalink(); ?>"><h4 class="card-title"><?php the_title(); ?></h4></a>
                        <p class="card-text"><small class="text-muted"><?php echo date("l j. F Y", strtotime($date)); ?></small></p>
                    </div>
                </div>
            </div>

    <?php else: ?>
    <?php endif; ?>
    
<?php endwhile; else: ?>
	<p><?php _e('Her sker der en hel masse og niks. Prøv en anden gang kammerat bladfjeder.'); ?></p>
</div>
<?php endif; ?>

<?php else: ?>
<?php endif; ?>

<?php get_footer(); ?>