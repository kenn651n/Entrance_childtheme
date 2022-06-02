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
        <div class="produkt_info_singleclient">

            <h2 class="clientnamesingle"></h2>

            <div class="info-container">
            
                <div id="info-left">
                    <p class="client-instruktor">Director</p>
                    <p class="client-director"></p>
                </div>
                <div id="info-right">
                    <p class="client-beskrivelse">About</p>
                    <p class="client-description"></p>
                </div>
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
    let client; //laver variabel 'produkt'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/client/" + <?php echo get_the_ID()?>; //laver konstant 'dburl' som er lig med det produkt som er klikket på
        async function getJson() {
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        client = await data.json(); //variablen 'produkt' henter json-dataen 
        visClient(); //kalder funktionen visProdukt
    }

    function visClient() {
        document.querySelector(".clientnamesingle").innerHTML = client.clientname; 
        document.querySelector(".client-instruktor").innerHTML //indsætter beskrivelse i .beskrivelse
        document.querySelector(".client-director").innerHTML = client.directors; //indsætter år 
        document.querySelector(".client-beskrivelse").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".client-description").innerHTML = client.description; //indsætter programmer i .beskrivelse
        document.querySelector(".film1").src = client.film1.guid; //indsætter kontakt i .kontakt
        document.querySelector(".film2").src = client.film2.guid; //indsætter kontakt i .kontakt
        document.querySelector(".film3").src = client.film3.guid; //indsætter kontakt i .kontakt

        console.log(client);
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
</script>


<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>