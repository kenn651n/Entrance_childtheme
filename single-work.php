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


    <article class="single_produkt_work">

    <video controls autoplay loop playsinline muted class="work-video" src="" type="video/mov"></video>


        <div class="produkt_info">
<div id="pil-wrapper">
                <div class="pil-tekst"><h2 class="work-client"></h2></div>
                <div class="pil-tekst"> <p class="pil">→</p></div>
                <div class="pil-tekst"><p class="work-title info"></p></div>
            </div>
            <div id="info-container">
                <div id="info-left">
            <p class="work-instruktor">Director</p>
            <p class="work-director info"></p>

            <p class="arstal">Årstal</p>
            <p class="work-year info"></p>
            </div>
<div id="info-right">
            <p class="work-beskrivelse">About</p>
            <p class="work-description"></p>
            </div>
            </div>
        </div>

    </article>


</div><!-- #primary -->

<style>
    div#content.site-content {
  display: inline-block;
}
</style>

<script>
    let work; //laver variabel 'produkt'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/work/" + <?php echo get_the_ID()?>; //laver konstant 'dburl' som er lig med det produkt som er klikket på
        async function getJson() {
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        work = await data.json(); //variablen 'produkt' henter json-dataen 
        visWork(); //kalder funktionen visProdukt
    }

    function visWork() {
        document.querySelector(".work-video").src = work.movie.guid; //indsætter kontakt i .kontakt
        document.querySelector(".work-client").innerHTML = work.client; //indsætter titlen i .produkt_navn
        document.querySelector(".pil").innerHTML //indsætter beskrivelse i .beskrivelse

        document.querySelector(".work-title").innerHTML = work.movietitle; //indsætter billedet i .produkt_billede
        document.querySelector(".work-instruktor").innerHTML //indsætter beskrivelse i .beskrivelse
        document.querySelector(".work-director").innerHTML = work.director; //indsætter år i .beskrivelse
        document.querySelector(".arstal").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".work-year").innerHTML = work.year; //indsætter år i .beskrivelse
        document.querySelector(".work-beskrivelse").innerHTML //indsætter år i .beskrivelse
        document.querySelector(".work-description").innerHTML = work.description; //indsætter programmer i .beskrivelse
        console.log(work);
        console.log(dburl);


    }

    getJson(); //henter JSON data

</script>


<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>