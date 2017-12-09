<?php get_header(); ?>
<?php
if ($_GET["time"] == "idag") {
    $time = date(Ymd);
    $headtime = "I dag";
}
else if ($_GET["time"] == "imorgen") {
    $time = date('Ymd', strtotime("+1 day"));
    $headtime = "I morgen";
}
else if ($_GET["time"] == "uge") {
    $time = date('Ymd', strtotime("+1 week"));
    $headtime = "Denne uge";
}
else if ($_GET["time"] == "maaned") {
    $time = date('Ymd', strtotime("+1 month"));
    $headtime = "Denne måned";
}
?>
<h1><?php echo $headtime ?></h1>

<?php 

// get posts
$posts = get_posts(array(
	'post_type'			=> 'post',
	'posts_per_page'	=> -1,
	'meta_key'			=> 'dato',
	'orderby'			=> 'dato',
	'order'				=> 'ASC'
));

if( $posts ): ?>

<div class="row">
<?php 
    if ($_GET["time"] == NULL):?>
               
               <style>
                   .col-12 {
                       height: 85vh;
                   }
                   #jumbologo {
                       margin-left: auto;
                       margin-right: auto;
                       position: relative;
                       display: block;
                       width: 50%;
                       background-color: white;}
                   }
                </style>
                <div class="col-12">
                    <img id="jumbologo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_white_high.svg">
                </div>
<?php else: ?>
<?php endif; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<?php
$date = get_field('dato');
?>

<?php if (date(Ymd) <= $date): ?>

<?php 
    if ($_GET["time"] == "maaned" or $_GET["time"] == "uge"):
        if ($date <= $time): ?>

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
<?php else: ?>
<?php endif; ?>

<?php 
    if ($_GET["time"] == "idag" or $_GET["time"] == "imorgen"):
        if ($date == $time): ?>

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
<?php else: ?>
<?php endif; ?>


<?php 
    if ($_GET["time"] == NULL):?>

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
<?php else: ?>
<?php endif; ?>

<?php endwhile; else: ?>
	<p><?php _e('Her sker der nul og niks. Prøv en anden gang kammerat bladfjeder.'); ?></p>
</div>
<?php endif; ?>

<?php else: ?>
<?php endif; ?>

<?php get_footer(); ?>