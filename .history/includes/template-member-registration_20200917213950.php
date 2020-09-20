<?php
/* Template Name: Memberpress Registration */

get_header();

?>

    <div id="primary" class="content-area memberpressproduct-template-jes">
        <main id="main" class="site-main page content-page">

            <div class="container">

                <?php

                // Start the Loop.
                while ( have_posts() ) :
                    the_post(); ?>

                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                          <div class="mpress-product-intro text-center">
                            <h2>Asia Blockchain Summit 2020</h2>
                            <h5>Fill out the form below to get INSTANT access to 200+ blockchain videos for only $37.00 USD (Regular price $147)</h5>
                          </div>
                          
                          
                          <?php
                          the_content();
                          ?>
                        </div><!-- .entry-content -->

                      </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                endwhile; // End the loop.
                ?>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
