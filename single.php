<?php 
get_header(); 
$date = get_field('dato');
$timestamp = get_field('timestamp_h') . ":" . get_field('timestamp_m');
$venue = get_field('stednavn') . "<br>" . get_field('stedadresse')  . "<br>" . get_field('sted_postnr') ;
$fb_event = get_field('fb_event');
?>

<div class="container">

            <?php if ( have_posts() && date(Ymd) <= $date ) : while ( have_posts() ) : the_post(); ?>
                <h1 class="my-4"><?php the_title(); ?>  <small><?php $category = get_the_category(); echo $category[0]->cat_name;?></small></h1>
                
                <style>
                   div#post-img {
                       background-image: url(<?php the_post_thumbnail_url();?>);
                       background-size: cover;
                       background-position: center;
                       height: 600px;
                   }
                </style>
                
                <div class="row bg-light">
                        <div class="col-md-8">
                            <div class="img-fluid" id="post-img" alt=""></div>
                        </div>

                        <div class="col-md-4">
                            <h3 class="my-3">Beskrivelse</h3>
                            <p><?php the_content(); ?></p>
                            <p><?php
                                echo date("l j. F Y", strtotime($date));
                                echo "<br>Kl. " . $timestamp . "<br><br>";  
                                echo $venue;
                               ?></p>
                               <?php echo "<p><a target='_blank' href='https://www.facebook.com/events/" . $fb_event . "'><button type='button' class='btn btn-primary'><i class='fa fa-facebook'></i> Klik her for Facebook-event</button></a></p>";
                            ?>
                              <br>
                               <?php
                            if(strlen($venue) > 8) {
                            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2266.1846836923755!2d10.381813615916482!3d55.389683380457804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464cdff671842557%3A0x8da2e7ba67981d1a!2s' . get_field("stedadresse") . '+' . get_field("sted_postnr") . '!5e0!3m2!1sda!2sdk!4v1512478009943" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';
                            };
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="card-deck deck mb-5">
        <?php 
    $categories = get_categories( array( 'child_of' => 2 ) );
    foreach ( $categories as $category ) {
            echo '<div class="card"><div class="card-img-top">';
            echo the_category_thumbnail([$category->term_id]);
            echo '</div><div class="card-block"><div class="card-img-overlay"><a href="../../../../category/events/' . $category->category_nicename . '"><h4 class="card-title text-overlay">';
            echo $category->cat_name;
            echo '</a></div></div></div>';
    }?>
    </div>
    <div class="card-deck deck mb-5">
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../../../index.php?time=idag">I dag</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../../../index.php?time=imorgen">I morgen</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../../../index.php?time=uge">Denne uge</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../../../index.php?time=maaned">Denne måned</a></h4></div>
            </div>
        </div>
    </div>
                    <h3 class="my-4">Relaterede begivenheder</h3>

                    <div class="row">
<?php
// Default arguments
$exclude_post   = $post->ID;
$args = array(
	'posts_per_page'    => 5,
    'post__not_in'      => array($exclude_post),
    'meta_key'			=> 'dato',
	'orderby'			=> 'dato',
    'order'				=> 'asc'// We don't ned pagination so this speeds up the query
);

// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
$cats_ids = array();  
foreach( $cats as $wpex_related_cat ) {
	$cats_ids[] = $wpex_related_cat->term_id; 
}
if ( ! empty( $cats_ids ) ) {
	$args['category__in'] = $cats_ids;
}

// Query posts
$wpex_query = new wp_query( $args );

// Loop through posts
foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); 
                                    
            $date = get_field('dato');?>
            <?php if (date(Ymd) <= $date): ?>
	
                <style>
                   div#top-<?php the_ID();?> {
                       background-image: url(<?php the_post_thumbnail_url( 'medium' );?>);
                       background-size: cover;
                   }
                </style>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="<?php the_permalink(); ?>">
                <div class="card">
                   <div class="card-img-top" id="top-<?php the_ID();?>"></div>
                    <div class="card-block">
                        <h4 class="card-title"><?php the_title(); ?></h4>
                        <p class="card-text"><small class="text-muted"><?php echo date("l j. F Y", strtotime($date)); ?></small></p>
                    </div>
                </div>
                </a>
            </div>
            
                <?php else: ?>
                <?php endif; ?>

<?php
// End loop
endforeach;

// Reset post data
wp_reset_postdata(); ?>
                    <hr>

                    <?php endwhile; else: ?>
                        <p>
                            <?php _e('Sorry, this page does not exist.'); ?>
                        </p>
                        <?php endif; ?>

        </div>

    <?php get_footer(); ?>
