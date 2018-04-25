<?php /* Template Name: Raw Template */ ?>
<!DOCTYPE html>
<html>
	<?php get_header(); ?>

	
    <body class="home page-template page-template-front-page page-template-front-page-php page page-id-77 page-home en">
		
	   <div id="page" class="site-page">
				
           	<!-- The Sidebar is the navigation menu -->
			<?php get_sidebar(); ?>

			<main id="main" class="site-main">
				
            <?php
            // TO SHOW THE PAGE CONTENTS
            while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                <div class="entry-content-page">
                    <?php the_content(); ?> <!-- Page Content -->
                </div><!-- .entry-content-page -->

            <?php
            endwhile; //resetting the page loop
            wp_reset_query(); //resetting the page query
            ?>
			    

			</main>

		<?php get_footer(); ?>
        
  </body>
</html>