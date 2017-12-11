<!--Dette er temaets archive fil. Det er denne, som er udgangspunktet for præsentation af de enkelte kategorisider.-->
<?php
//Wordpress funktion som henter headeren fra filen header.php og linker de nødvendige filer.
get_header(); ?>
<!--Her præsenteres titlen på den kategori, som siden viser gennem en Wordpress funktion.-->
<h1><?php single_cat_title()?></h1>
<div class="row">
<?php  
// Her hentes indlæg fra databasen, og sorteres efter feltet "dato"
$category = get_the_category();
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

<?php 
// Denne betingelse sikrer at der kun vises indlæg, hvis dato ikke er overskredet. Reelt betyder det at begivenhder som er overstået ikke vises.
if (date(Ymd) <= $date): ?>

<!--Selve præsentationen af det enkelte indlæg.-->
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
<!--Hvis der ikke er nogle relevante indlæg vises dette.-->
<?php endwhile; else: ?>
	<p><?php _e('Her sker der en hel masse og niks. Prøv en anden gang kammerat bladfjeder.'); ?></p>
</div>
<?php endif; ?>

<?php else: ?>
<?php endif; ?>

<?php
//Wordpress funktion som henter footeren fra filen footer.php og linker de nødvendige filer.
get_footer(); ?>