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
                            <div class="jes-row mt-5">
                              <div class="jes-column">
                                <div class="text-center d-bold">
                                  <img src="https://abs2020.com/wp-content/uploads/2020/09/a101e22fc458c1110d418ee309f240c8-2.png" />
                                </div>
                              </div>
                              <div class="jes-column">
                                <div class="">
                                    <h5>100% Satisfaction Guarantee</h5>
                                    <p>
                                      We’re confident you will love these exclusive blockchain videos. If you’re not satisfied with our 200+ quality blockchain founders and CEO’s you will get your MONEY BACK GUARANTEE.
                                    </p>
                                </div>
                              </div>
                            </div>
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
