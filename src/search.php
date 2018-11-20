<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kevinkissi
 */

get_header('search'); ?>

<div class="page-feature">

<div class="page-header">
    
    <h2> Search </h2>
</div> 
    
</div> 
<!--=======================-->
<!--============================-->

<div class="container">

<!--
		<div class="center">
            <div class="search_term">
-->

<!--			<header class="page-header">-->
				
<!--			</header> .page-header -->           
    <br>
         
    <br>
    
    <?php get_search_form(); ?>
    
    <div class="search-count">
        <?php _e('Total results found : ', 'kevinkissi'); ?> <span id="resultscount"><?php global $wp_query; echo $wp_query->found_posts; wp_reset_query(); ?></span>
                </div>
            <br>
    <div class="search-header">
                    <?php printf( esc_html__( 'Search results for: %s', 'kevinkissi' ), '<span>' . get_search_query() . '</span>' ); ?>
                </div>
    <br>
<!--
                </div>
        </div> 
-->
        <!--SEARCH DETAILS END-->
                
    <!--SEARCHED POSTS START-->   
      <div class="result-container">
    <?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
      </div>
        <!--SEARCHED POSTS END-->

</div>




   

<br>
<br>
<br>    
<br>
<br>
<br>
<br>    
<br>
<br>
<br>
<br>
<br>    
<br>
<br>
<br>
<br>
<br>    
<br>
<br>
<br>
<br>
<br>    
<br>
<?php get_footer(); ?>
