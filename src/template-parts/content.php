<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kevinkissi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<br>
     
    <?php if(has_post_thumbnail()) { 
     $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-page-image' );
  
    echo '<img src="' . $image_src[0] . '" width="100%"  >'; 
}
 
  ?>  
    <br>
    <h3 class="post-title"><?php the_title()?></h3>
    

    
<!--<div id="borderbottom"></div>    -->
    
   <div class="info-bar">
         
<div class="author">  
  <?php 
echo '<h5 class="author-name"> By ' . get_the_author() . '</h5>'; 
//    echo '&nbsp; &nbsp; <br>';
echo '<div class="author-img">';
echo get_avatar( get_the_author_meta( 'ID' ), 95 ); 
echo '</div>';   

echo '<div class="author-sm-img">';
echo get_avatar( get_the_author_meta( 'ID' ), 50 ); 
echo '</div>';           
        
  ?>     
</div>
                     
<div class="time"> 
<time datetime="2014-09-20" class="icon">
<em>
<?php echo get_the_date( 'Y' ); ?>&nbsp;|&nbsp;<?php echo get_the_date( 'D' ); ?>
</em>
<strong><?php echo get_the_date( 'F' ); ?></strong>
<span><?php echo get_the_date( 'd' ); ?></span>
</time>
<!--
   <div class="time-after"> <i class="fa fa-angle-right"></i> Post date</div>
</div>
-->
    </div>              
</div>
    
    <div class="rightb"></div>
    
    <br>
<!--      <br> -->
       
       <div class="post-content"><?php the_content(); ?> </div>
   
    <br>


	<button class="buttom-blog text-center">
		<?php kevinkissi_entry_footer(); ?>
	</button><!-- .entry-footer -->
	


</article><!-- #post-## -->
