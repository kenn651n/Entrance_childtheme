<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>
	</div><!-- #page -->
	<footer id="site-footer" role="contentinfo" class="header-footer-group">

    <div class="section-inner">

	<div class="section-inner-top">

	<div class="footer_column footer-left">
            <a href="http://www.sjakstudio.dk/wordpress/work/">Work→</a>
            <a href="http://www.sjakstudio.dk/wordpress/directors/">Directors→</a>
            <a href="http://www.sjakstudio.dk/wordpress/clients/">Clients→</a>
        </div>
        <div class="footer_column footer-center">
		<div class="component">
				<ul class="grid">
					<li class="ot-letter-left"><span data-letter="e">e</span></li>
					<li class="ot-letter-right"><span data-letter="n">n</span></li>
					<li class="ot-letter-left"><span data-letter="t">t</span></li>
					<li class="ot-letter-left"><span data-letter="r">r</span></li>
					<li class="ot-letter-right"><span data-letter="a">a</span></li>
					<li class="ot-letter-left"><span data-letter="n">n</span></li>
					<li class="ot-letter-right"><span data-letter="c">c</span></li>
					<li class="ot-letter-left"><span data-letter="e">e</span></li>
				</ul>

				
			</div>
        </div>

       

        <div class="footer_column footer-right">
			<p>Entrance ApS</p>
			<p>Borgergade 3, stuen</p>
			<p>DK-1300 København K</p>
			<p>Copyright © 2022 entrance</p>
        </div>
		</div>
        <div class="footer_some">
            <a target="_blank" href="https://www.facebook.com/entrance.dk/">facebook→</a>
			<a target="_blank" href="https://www.instagram.com">instagram→</a>
			<a target="_blank" href="https://www.linkedin.com/in/rasmus-ejlers-a404601/">linkedin→</a>


        </div>




    </div><!-- .section-inner -->

</footer><!-- #site-footer -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
	</body>
</html>
