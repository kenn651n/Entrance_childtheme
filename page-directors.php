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
    <article class="director_article">
        <div class="">
        <h2 class="directors-name"></h2>
        </div>
    </article>
</template>




	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

		<div class="galleri_container">

        <div class="introduktion">
            <section class="produkt_container_directors">
            </section>
        </div>

    </div>
   

	</div><!-- #primary -->

	<script>
    window.addEventListener("load", visdirectors); //lader siden loade før javascipt startes

    let directors; //laver variabel 'Directors'
    let filterdirector = "alle"; //laver variabel 'filterprodukt' som er lig med 'alle'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/director?per_page=100"; //laver kontant 'dburl' som er lig med alle directors

    async function getJson() {
        console.log("getJson");
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
        directors = await data.json(); //variablen 'directors' henter json-dataen
        visdirectors(); //kalder funktionen visdirectors
    }

    function visdirectors() {
        let temp = document.querySelector("template"); //laver variabel 'temp' som er lig med vores template i HTML'en
        let container = document.querySelector(".produkt_container_directors"); //laver variabel 'container' som er lig med .produkt_container_directors

        container.innerHTML = ""; //fjerner indhold i containeren så den kun viser det produkt man har klikket på (ikke lægger til)
        console.log(directors);
        directors.forEach(director => {
                let klon = temp.cloneNode(true).content; //laver variabel 'klon' som kloner alt indholdet i vores template
                klon.querySelector(".directors-name").innerHTML = director.directorname; //fortæller hvad der skal indsættes i img
                klon.querySelector("article").addEventListener("click", () => { //når man klikker på article kommer man videre til singleview
                    location.href = director.link;
                });
                container.appendChild(klon); //indsætter alt det klonede indhold i container
        })
    }

    getJson(); //henter JSON data

    </script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>


<?php get_footer(); ?>
