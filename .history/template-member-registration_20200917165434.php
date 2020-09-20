<?php
/* Template Name: Memberpress Registration */

get_header();

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main page content-page">

            <div class="container">

                <?php

                // Start the Loop.
                while ( have_posts() ) :
                    the_post(); ?>

                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
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
