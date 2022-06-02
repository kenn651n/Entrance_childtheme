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


<template>
    <article class="produkt_article">
        <div class="work-div">
       <div><video class="work-movies" src="" alt=""></div>
        <div class="overlay">
                <p class="works-client"></p>
                <p class="works-movietitle"></p>
                <p class="works-director"></p>
</div>
         
        </div>
    </article>
</template>




	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

		<div class="galleri_container">
        <div>
        </div>

        <div class="introduktion">
            <section class="produkt_container_work">
            </section>
        </div>

    </div>
   

	</div><!-- #primary -->

<style>
    div#content.site-content {
  display: inline-block;
}
</style>

	<script>
    window.addEventListener("load", visWorks); //lader siden loade før javascipt startes

    let works; //laver variabel 'produkter'
    //let genre; //laver variabel 'genre'
    let filterwork = "alle"; //laver variabel 'filterprodukt' som er lig med 'alle'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/work?per_page=100"; //laver kontant 'dburl' som er lig med alle produkter
    // const genreurl = "https://tinahvid.dk/wp-json/wp/v2/genre?per_page=100"; //laver konstant 'genreurl' som er lige med alle genrer

    async function getJson() {
        console.log("getJson");
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        //const genredata = await fetch(genreurl); //laver konstant 'genredata' som henter data via genreurl-variablen med fetch
        works = await data.json(); //variablen 'produkter' henter json-dataen
        //        produkter.reverse(); //gør så produkterne kommer i omvendt rækkefølge
        //genre = await genredata.json(); //variablen 'genre' henter json-dataen
        visWorks(); //kalder funktionen visProdukter
        //opretKnapper(); //kalder funktionen opretKnapper
    }

    function visWorks() {
        let temp = document.querySelector("template"); //laver variabel 'temp' som er lig med vores template i HTML'en
        let container = document.querySelector(".produkt_container_work"); //laver variabel 'container' som er lig med .produkt_container_work
        // document.querySelector("#intro").innerHTML; //indsætter titlen i .produkt_navn

        container.innerHTML = ""; //fjerner indhold i containeren så den kun viser den genre man har klikket på (ikke lægger til)
        console.log(works);
        works.forEach(work => {
            //if (filterprodukt == "alle" || produkt.genre.includes(parseInt(filterprodukt))) { //hvis filterprodukt er lig med "alle" eller hvis produktet har genren man har valgt  (parseInt gør at den læser filterProdukt som tal i stedet for tekst)

                let klon = temp.cloneNode(true).content; //laver variabel 'klon' som kloner alt indholdet i vores template
                klon.querySelector("video").src = work.movie.guid; //fortæller hvad der skal indsættes i img
                klon.querySelector(".works-client").innerHTML = work.client; //fortæller hvad der skal indsættes i img
                klon.querySelector(".works-movietitle").innerHTML = work.movietitle; //fortæller hvad der skal indsættes i img
                klon.querySelector(".works-director").innerHTML = work.director; //fortæller hvad der skal indsættes i img


                klon.querySelector("article").addEventListener("click", () => { //når man klikker på article kommer man videre til singleview
                    location.href = work.link;
                });
                container.appendChild(klon); //indsætter alt det klonede indhold i container

            //}
        })
    }

    getJson(); //henter JSON data

    </script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>


<?php get_footer(); ?>
