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
                            <h2 class="mb-2"><?= the_field('heading'); ?></h2>
                            <h5><?= the_field('sub_heading'); ?></h5>
                            <div class="jes-row mt-4 mb-4">
                              <div class="jes-column">
                                <div class="text-center">
                                  <img class="m-auto" src="<?= get_field('image'); ?>" />
                                </div>
                              </div>
                              <div class="jes-column">
                                <div class="jes-announcement">
                                    <h4 class="mb-2"><?= get_field('heading_2'); ?></h4>
                                    <p>
                                      <?= get_field('description'); ?>
                                    </p>
                                </div>
                              </div>
                            </div>
                            <h3 class="mx-2">
                              <a href="<?= get_field('offer_url'); ?>"><?= get_field('offer'); ?></a>
                            </h3>
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
