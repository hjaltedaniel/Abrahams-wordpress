<!--Dette er temaets kategori fil, som kun handler om kategorien "events". Det er denne fil, som præsenterer den side der viser artikler og kategorier indenfor kategorien "events".-->
<?php
//Wordpress funktion som henter headeren fra filen header.php og linker de nødvendige filer.
get_header(); ?>

    <h1>Events</h1>
    <div class="card-deck deck mb-5">
        <?php 
                
    //Her vises listen over kategorier, som hentes som element af kategorien "2".
    $categories = get_categories( array( 'child_of' => 2 ) );
    foreach ( $categories as $category ) {
            echo '<div class="card"><div class="card-img-top">';
            echo the_category_thumbnail([$category->term_id]);
            echo '</div><div class="card-block"><div class="card-img-overlay"><a href="/' . $category->category_nicename . '"><h4 class="card-title text-overlay-first">';
            echo $category->cat_name;
            echo '</a></div></div></div>';
    }?>
    </div>
    <!--Her præsenteres en række cards, som giver mulighed for at navigere til overblikket over dagens, morgendagens, ugens og månedens aktiviteter.-->
    <div class="card-deck deck mb-5">
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../index.php?time=idag">I dag</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../index.php?time=imorgen">I morgen</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../index.php?time=uge">Denne uge</a></h4></div>
            </div>
        </div>
        <div class="card">
            <div class="card-img-top" id="colorblock"></div>
            <div class="card-block">
                <div class="card-img-overlay">
                    <h4 class="card-title text-overlay"><a href="../../index.php?time=maaned">Denne måned</a></h4></div>
            </div>
        </div>
    </div>

    <h2>De 8 næste begivenheder</h2>
    <div class="card-deck deck">
        <?php 
        //Her hentes indlæg og sorteres efter feltet dato.
            $posts = get_posts(array(
	           'post_type'			=> 'post',
	           'posts_per_page'	=> -1,
	           'meta_key'			=> 'dato',
	           'orderby'			=> 'dato',
	           'order'				=> 'ASC'
                ));

            if( $posts ): ?>
            <?php
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    //Variablen date, defineres som værdien af feltet dato.
                    $date = get_field('dato');?>

                <?php
        //Betingelse som filtrerer på baggrund af datoen, og kun viser indlæg hvor variablen date ikke er overskredet med dagens dato.
        if (date(Ymd) <= $date): ?>

                    <style>
                        div#top-<?php the_ID();
                        ?> {
                            background-image: url(<?php the_post_thumbnail_url( 'medium' );
                            ?>);
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

                            <?php endwhile; else: ?>
                                <p>
                                    <?php _e('Her sker der en hel masse og niks. Prøv en anden gang kammerat bladfjeder.'); ?>
                                </p>
    </div>
    <?php endif; ?>

        <?php else: ?>
            <?php endif; ?>

                <?php
//Wordpress funktion som henter footeren fra filen footer.php og linker de nødvendige filer.
get_footer(); ?>
