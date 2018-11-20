<?php
/**
* Template Name: Blog Page
*
* @package WordPress
* @subpackage Kevin Kissi
* @since Kevin Kissi 1.0
*/

get_header('blog'); ?>

<div class="page-feature">

<div class="page-header">

<h2> Blog  </h2>
</div> 

</div>  

<div class="container">

<br> 
<!--============================-->

<br>
<!--=================================    -->


<ul class="nav nav-tabs">

<li class="active"><a href="#articles" > Articles </a></li>

<li><a href="#readings"> Readings</a></li>


<li><a href="#flow">Flow</a></li>

</ul>

<!--============================-->

<!--=================================    -->

<div class="tab-content">

<div class="tab-pane in fade active" id="articles">

<div class="container commoncolor ">    
<div class="row">

<h3>Recent Articles: </h3>    
<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'articles',
'posts_per_page' => 8
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'articles_tag' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>    

<div class="col-sm-6 col-md-4">
<div class="thumbnail">
<!--      <img src="..." alt="...">-->
<?php the_post_thumbnail() ?>
<div class="caption">
<h4 class="post-title"> <?php the_title(); ?> </h4>
</div>
<!--    ==================-->


<div class="info-bar">

<div class="author">  
<?php 
echo '<h5 class="author-name"> By ' . get_the_author() . '</h5>'; 


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

</div>              
</div>

<div class="rightb"></div>
<!-- ========-->
<br>
<!--==========-->
<div class="post-content"><?php echo get_excerpt(370); ?>

</div>

<br>

<!-----------    -->
<div class="btn-blog">
<a href= "<?php the_permalink() ?>">    
<button class="buttom-blog" role="button"> 
Read Full Article
</button></a>
<i class="fa fa-angle-double-right"></i> 
</div>  

</div>
<br>
</div>

<?php
}
}
wp_reset_query() 
?>

</div><!--  <div class="row">-->
</div><!--    <div class="tab-pane fade in active" id="articles">-->

    

<br>

<br>
<br>

<br>
<!--=================================    -->    

<hr>
<p class="buttom-link">
Visit the <button id="blog-button-main">
<span><a href="./articles">Articles</a></span>
</button> page.</p>    
</div>

<!--    =========================================-->  
<div class="tab-pane fade" id="readings">
<div class="container">    
<div class="row">

<h3>Recent Readings: </h3> 


<!--  ---------------------------------->
<?php
global $post;
$query = new WP_Query( array ( 
'post_type' 	  => 'readings',
'posts_per_page' => 8
) );



if( $query->have_posts() ) {

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'readings_cat' );

$class = '';

if(!empty($terms) ){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>    

    
    
<?php
//Preview Size Image
 if ( has_post_thumbnail() ) {
  $image_id = get_post_thumbnail_id();	 
  $image_url = wp_get_attachment_image_src($image_id,'homepage-preview');
  $url = $image_url[0];
 }
 else $url = get_bloginfo('stylesheet_directory').'/images/home-preview-default.jpg'
 ?>
 
  <?php
//Thumb Size Image
 if ( has_post_thumbnail() ) {
  $image_id = get_post_thumbnail_id();	 
  $image_url = wp_get_attachment_image_src($image_id,'homepage-thumb');
  $url2 = $image_url[0];
 }
 else $url2 = get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'
 ?>
<!-- -----    -->    
    
    
    
<div class="col-sm-6 col-md-4">
<div class="thumbnail readings-blog">

<h4> <?php the_title(); ?></h4>

<img src="<?php echo $url2; ?>"
alt=""/>

<div class="">
<h4>Category: <a href= "<?php the_permalink() ?>"><button class="buttom-blog"> <?php echo $term->name; ?></button></a></h4>   
</div>


<div class="progress progress-custom">
<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
?>%;">
<?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
?>%
</div>
</div>

</div>   
</div><!-- class="col-md-4"  -->

<?php
}           
}      
wp_reset_query() 
?>      
<!--    ------------------------------------->

</div>
</div>
    
    

<br>

<br>
<br>

<br>
<!--=================================    -->    

<hr>
<p class="buttom-link">
Visit the <button id="blog-button-main">
<span><a href="./readings">Readings</a></span>
</button> page.</p>
    
</div>
<!-- ======================================================   -->

<div class="tab-pane fade" id="flow">
<div class="container">    
<div class="row">

<h3>Recent Flows: </h3>    
<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'flow',
'posts_per_page' => 8
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'flow_cat' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>    

<div class="col-sm-6 col-md-4">
<div class="thumbnail">

<div class="caption">
<h4>
<?php the_title(); ?>
</h4>
</div>
<!--    ==================-->


<div class="info-bar">

<div class="author">  
<?php 
echo '<h5 class="author-name"> By ' . get_the_author() . '</h5>'; 


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

</div>              
</div>

<div class="rightb"></div>
<!--    ========================-->


<div class="except"><?php echo get_excerpt(350); ?>

</div>

<br>
<!-- --------------------------- -->

<div class="btn-blog">

<a href= "<?php the_permalink() ?>">    
<button class="buttom-blog" role="button"> 
See Flow
</button></a>
<i class="fa fa-angle-double-right"></i> 
</div>  

</div>

<div class="">
<h4>Category: <a href= "<?php the_permalink() ?>"><button class="buttom-blog"><span class="icon-categories"><?php echo get_tax_icon($term->term_id) ?>&nbsp;</span> <?php echo $term->name; ?></button></a> <i class="fa fa-angle-double-right"></i> </h4>   
</div>

</div>


<?php
}
}
wp_reset_query() 
?>

</div><!--  <div class="row">-->
</div><!--    <div class="tab-pane fade in active" id="articles">-->
    

<br>

<br>
<br>

<br>
<!--=================================    -->    

<hr>
<p class="buttom-link">
Visit the <button id="blog-button-main">
<span><a href="./flow">Flow</a></span>
</button> page.</p>    
</div>
    
<!--===============================-->
</div>
<!--============================-->


<!--    ====================================-->
<br>    
<br>  
<br> 
<br> 
<br>  
<br>
</div><!--< class="container">-->


<?php
//get_sidebar();
get_footer();
