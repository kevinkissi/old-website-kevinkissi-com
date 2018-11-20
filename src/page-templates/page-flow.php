<?php
/**
 * Template Name: Flow Page
 *
 * @package WordPress
 * @subpackage Kevin Kissi
 * @since Kevin Kissi 1.0
 */

get_header('flow'); ?>

   
    <div class="page-feature">

 
  <header class="page-header">   
				<?php
 				
 the_title('<h2 class="page-title">', '</h2>');
      
				?>
			</header><!-- .page-header -->

       </div>           


<br>

<div class="container commoncolor">

<div class="row" >

		<?php if ( have_posts() ) : ?>

			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- .row -->
	</div><!-- .container -->

<?php 
//get_sidebar();
?>
<?php get_footer(); ?>
