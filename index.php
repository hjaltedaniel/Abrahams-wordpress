<!--Dette er temaets index fil. Det er denne, som er udgangspunktet for hele temaets præsentation af data.-->
<?php
//Wordpress funktion som henter headeren fra filen header.php og linker de nødvendige filer.
get_header(); ?>

<?php
//Her hentes de enkelte indlæg fra databasen, hvis der vel at mærke er indlæg på databasen.
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<!--Præsentation af de enkelte indlæg med titel og indhold.-->

	<h1><?php the_title(); ?></h1>	
	<?php the_content(); ?>

<?php 
//Hvis der er ingen indlæg er i databasen, vises nedenstående.
endwhile; else: ?>
	<p><?php _e('Her sker der nul og niks. Prøv en anden gang kammerat bladfjeder.'); ?></p>
<?php endif; ?>

<?php
//Wordpress funktion som henter footeren fra filen footer.php og linker de nødvendige filer.
get_footer(); ?>