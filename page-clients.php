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
    <article class="client_article">
        <div class="">
        <h2 class="clientname"></h2>
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
             <section class="client_container">
            </section>
        </div>

    </div>
   

	</div><!-- #primary -->

	<script>
    window.addEventListener("load", visclients); //lader siden loade før javascipt startes

    let clients; //laver variabel 'clients'
    let filterclient = "alle"; //laver variabel 'filterclient' som er lig med 'alle'
    const dburl = "http://www.sjakstudio.dk/wordpress/wp-json/wp/v2/client?per_page=100"; //laver kontant 'dburl' som er lig med alle clients
  
    async function getJson() {
        console.log("getJson");
        const data = await fetch(dburl); //laver konstant 'data' som henter data via dburl-variablen med fetch
         clients = await data.json(); //variablen 'clients' henter json-dataen
         clients.reverse(); //gør så clients kommer i omvendt rækkefølge
        visclients(); //kalder funktionen visclients
    }

    function visclients() {
        let temp = document.querySelector("template"); //laver variabel 'temp' som er lig med vores template i HTML'en
        let container = document.querySelector(".client_container"); //laver variabel 'container' som er lig med .client_container
        container.innerHTML = ""; //fjerner indhold i containeren så den kun viser den genre man har klikket på (ikke lægger til)
        console.log(clients);
        clients.forEach(client => {
                let klon = temp.cloneNode(true).content; //laver variabel 'klon' som kloner alt indholdet i vores template
                klon.querySelector(".clientname").innerHTML = client.clientname; //fortæller hvad der skal indsættes i img
                klon.querySelector("article").addEventListener("click", () => { //når man klikker på article kommer man videre til singleview
                    location.href = client.link;
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
