<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kevinkissi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--	<header class="entry-header">-->
		<?php the_title( sprintf( '<div class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></div>' ); ?>

	
		<div class="entry-meta">
			<?php kevinkissi_posted_on(); ?>
		</div><!-- .entry-meta -->
	
<!--	</header>-->
    <!-- .entry-header -->

<!--	<div class="entry-summary">-->
		<?php 
        echo get_excerpt(100);
        echo '<a href=" ' . esc_url( get_permalink() ) . '">' . "Continue reading" .'</a>';
        ?>
<!--	</div>-->
<!-- .entry-summary -->

	<footer class="entry-footer">
		<?php kevinkissi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

