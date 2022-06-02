<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>


    <article class="single_produkt">



        <div class="produkt_info_single-director">
            <div>
            <h2 class="director-directorname"></h2>
            <p class="director-beskrivelse">About</p>
            <p class="director-description"></p>
            </div>
            <div></div>
            </div>

            <div id="visuals">
                <video controls class="film1" src="" type="video/mov" ></video>
                <video controls class="film2" src="" type="video/mov" ></video>
                <video controls class="film3" src="" type="video/mov" ></video>
            </div>


       

        </div>

    </article>


</div><!-- #primary -->

<script>
    let director; //laver variabel 'produkt'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/director/" + <?php echo get_the_ID()?>; //laver konstant 'dburl' som er lig med det produkt som er klikket på
        async function getJson() {
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        director = await data.json(); //variablen 'produkt' henter json-dataen 
        visdirector(); //kalder funktionen visProdukt
    }

    function visdirector() {
        document.querySelector(".director-directorname").innerHTML = director.directorname; //indsætter titlen i .produkt_navn
        document.querySelector(".director-beskrivelse").innerHTML //indsætter billedet i .produkt_billede
        document.querySelector(".director-description").innerHTML = director.description; //indsætter billedet i .produkt_billede

        document.querySelector(".film1").src = director.film1.guid; //indsætter kontakt i .kontakt
        document.querySelector(".film2").src = director.film2.guid; //indsætter kontakt i .kontakt
        document.querySelector(".film3").src = director.film3.guid; //indsætter kontakt i .kontakt



        console.log(director);
        console.log(dburl);


    }

    getJson(); //henter JSON data

    document.querySelector(".film1").addEventListener("mouseover", function() {
	this.play();
});

document.querySelector(".film1").addEventListener("mouseleave", function() {
	this.pause();
});

document.querySelector(".film2").addEventListener("mouseover", function() {
	this.play();
});

document.querySelector(".film2").addEventListener("mouseleave", function() {
	this.pause();
});

document.querySelector(".film3").addEventListener("mouseover", function() {
	this.play();
});

document.querySelector(".film3").addEventListener("mouseleave", function() {
	this.pause();
});
</script>


<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>