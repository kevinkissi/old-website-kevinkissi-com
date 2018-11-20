<?php
/**
 * Template Name: Portfolio Page
 *
 * @package WordPress
 * @subpackage Kevin Kissi
 * @since Kevin Kissi 1.0
 */

get_header('portfolio'); ?>


<div class="page-feature">

<div class="page-header">
    
    <h2> Portfolio </h2>
</div> 
    
</div>  

<!--=======================-->
<!--============================-->

<div class="container">

<br> 

<!--=================================    -->
    
<ul id="myTab" class="nav nav-tabs">
   
<li class="dropdown active">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects &nbsp;<i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu">
<li class="active"><a href="#small" data-toggle="tab">Small Projects</a></li>
<li class="seperate-li"></li>
<li class><a href="#major" data-toggle="tab">Major Projects</a></li>
</ul>
</li>
    
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventures &nbsp;<i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu">
<li><a href="#nonp" data-toggle="tab">Non-profit</a></li>
<li class="seperate-li"></li>
<li><a href="#nonf" data-toggle="tab">For-profit</a></li>
</ul>
</li>  

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Skills &nbsp;<i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu">
<li><a href="#software" data-toggle="tab">Software Development</a></li>
<li class="seperate-li"></li>
<li><a href="#hardware" data-toggle="tab">Hardware Design</a></li>    
</ul>
</li>


<!------------------------> 
<li><a href="#leadership" data-toggle="tab" data-toggle="tab">Leadership</a></li>

<li><a href="#papers" data-toggle="tab">Papers</a></li>
    
<li><a href="#conferences" data-toggle="tab">Conferences</a></li>    

<li><a href="#talks" data-toggle="tab">Talks</a></li> 
    
<li class="dropdown">    
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Statements &nbsp;<i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu">
<li><a href="#research" data-toggle="tab">Research Statement</a></li>
<li class="seperate-li"></li>
<li><a href="#entrepreneur" data-toggle="tab">Entrepreneurship Statement</a></li> 
</ul>
</li>            

<!-- ========================-->

</ul>

<br>
<!--===========================    -->
<div  id="myTabContent" class="tab-content">

<!--=========================-->          
<!--  Small projects-->
<!--=========================-->
<div class="commoncolor tab-pane fade in active" id="small">
<h4>Small Projects:</h4>

<br>    
<!--====================================================-->    
<div class="container">
<div class="row">

<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'portfolio',
'portfolio_cat'  =>'small-projects',
'posts_per_page' => 99
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'portfolio_cat' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>
   
<div class="col-md-6">

<div class="thumbnail">
<?php the_post_thumbnail(); ?>
<div class="caption">
<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
<a href="#<?php echo $post->post_name;?>" class="databtn">
<button class="buttom-blog bold" data-toggle="collapse" data-target="#<?php echo $post->post_name;?>">More</button></a>
</div>
</div>

<br>

<div id="<?php echo $post->post_name;?>" class="collapse">
<?php the_content(); ?>
    <a href="<?php echo get_post_meta($post->ID, '_projectlink', true);?>" target = "_blank">
<button class="buttom-blog bold" >External Link</button></a>

</div>
 
<br>
    
</div>  
      


<?php
}
}
wp_reset_query();    
?>

</div>
</div> 
<!--====================================================-->    
    
</div>
<!--=========================-->          
<!--  Major projects-->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="major" >
<h4>Major Projects:</h4>
<!--====================================================--> 
    
<div class="container">
<div class="row">

<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'portfolio',
'portfolio_cat'  => 'major-projects',
'posts_per_page' => 4
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'portfolio_cat' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>


<div class="col-md-6">

<div class="thumbnail">
<?php the_post_thumbnail(); ?>
<div class="caption">
<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
<a href="#<?php echo $post->post_name;?>" class="databtn">
<button class="buttom-blog bold" data-toggle="collapse" data-target="#<?php echo $post->post_name;?>">More</button></a>
</div>
</div>

<br>

<div id="<?php echo $post->post_name;?>" class="collapse">
<?php the_content(); ?>
    <a href="<?php echo get_post_meta($post->ID, '_projectlink', true);?>" target = "_blank">
<button class="buttom-blog bold" >External Link</button></a>

</div>
 
<br>
    
</div>  
    
    
<?php
}
}
wp_reset_query();
?>

</div>
</div>      
    
</div>
<!--=========================-->          
<!--  Non-profit-->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="nonp" >
<h4>Non-profit:</h4>
    
<div class="container">
<div class="row">
<!--====================================================-->    
    
<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'portfolio',
'portfolio_cat'  =>'non-profit',
'posts_per_page' => 4
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'portfolio_cat' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>

<div class="col-md-6">

<div class="thumbnail">
<?php the_post_thumbnail(); ?>
<div class="caption">
<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
<a href="#<?php echo $post->post_name;?>" class="databtn">
<button class="buttom-blog bold" data-toggle="collapse" data-target="#<?php echo $post->post_name;?>">More</button></a>
</div>
</div>

<br>

<div id="<?php echo $post->post_name;?>" class="collapse">
<?php the_content(); ?>
    <a href="<?php echo get_post_meta($post->ID, '_projectlink', true);?>" target = "_blank">
<button class="buttom-blog bold" >External Link</button></a>

</div>
 
<br>
    
</div>  
    
<?php
}
}
wp_reset_query();
?>

</div>
</div>    
<!--====================================================-->
    
</div>
<!--=========================-->          
<!--  For-profit -->
<!--=========================-->
<div class="tab-pane fade commoncolor"  id="nonf">
<h4>For-profit:</h4>
 
<!--====================================================-->    
<div class="container">
<div class="row">

<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'portfolio',
'portfolio_cat'  =>'for-profit',
'posts_per_page' => 4
));

if($query->have_posts()){

while($query->have_posts()){
$query->the_post();

$terms = get_the_terms( $post->ID, 'portfolio_cat' );

$class = '';

if(!empty($terms)){
foreach ($terms as $term) {
$class .= $term->slug.' ';
}
}

?>  
 
 <div class="col-md-6">

<div class="thumbnail">
<?php the_post_thumbnail(); ?>
<div class="caption">
<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
<a href="#<?php echo $post->post_name;?>" class="databtn">
<button class="buttom-blog bold" data-toggle="collapse" data-target="#<?php echo $post->post_name;?>">More</button></a>
</div>
</div>

<br>

<div id="<?php echo $post->post_name;?>" class="collapse">
<?php the_content(); ?>
    <a href="<?php echo get_post_meta($post->ID, '_projectlink', true);?>" target = "_blank">
<button class="buttom-blog bold" >External Link</button></a>

</div>
 
<br>
    
</div>  
    

<?php
}
}
wp_reset_query();
?>

</div> 
</div>        
<!--====================================================-->
    
</div> 
<!--=========================-->          
<!-- Software Development-->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="software">
<h4>Software Development Tools</h4>
<br>
   
<div class= "container">
<div class= "row">
            
<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    

<h4>Languages/Scripts:</h4> 
            
  <?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>
            
<?php            

if (get_cat_name($term->parent) == 'Languages/Scripts') {             
        
echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';
    
}
?>
  
<?php

}
            
?>
</div><!-- class="col-xs-12"> -->

<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Frameworks:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>
            
<?php            

if (get_cat_name($term->parent) == 'Frameworks') {             
        
echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';
    
}
?>

<?php

}
?>

</div><!-- class="col-xs-12"> -->
        
 <!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
 
<hr>    
<h4> Libraries:</h2>
 
<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Libraries') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
</div><!-- class="col-xs-12"> -->   
<hr>            
<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Architecture Patterns:</h4> 

    
<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Architecture Patterns') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> -->   
<hr>    
<!--=========================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Testings Tools:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Testings Tools') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> -->  
<hr>
<!--=========================================================-->        
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Methodologies:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Methodologies') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> -->    
<hr>

<!--=========================================================-->  
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Cloud Techonolies:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Cloud Techonolies') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> -->               
<!--=========================================================-->      
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Platforms/Operating Systems:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Platforms/Operating Systems') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> --> 
<hr>
            
<!--=========================================================-->  
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Command Line Syntaxes:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Command Line Syntaxes') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
    
</div><!-- class="col-xs-12"> -->  
<hr>    
<!--=========================================================-->             

</div> <!-- < class= "row">  -->   
</div><!--   < class= "container">-->

</div>
<!--========================================================-->          
<!-- Hardware Design-->
<!--========================================================-->
<div class="tab-pane fade commoncolor" id="hardware">
<h4>Hardware Design Tools</h4>
 
<br>
   
<div class= "container">
<div class= "row">
<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    

<h4>Computer-aided Design:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Computer-aided Design') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
</div><!-- class="col-xs-12"> -->
    
<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>
<h4>Finite Element Analysis:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Finite Element Analysis') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
</div><!-- class="col-xs-12"> --> 
    
<!--====================================================-->
<div class="col-xs-1"> </div> 
<div class="col-xs-11">    
<hr>   

<h4>Automation/Data Acquisition:</h4> 

<?php
$terms = get_terms( 'portfolio_skills', array('hide_empty' => false) );
foreach ($terms as $term) {   
?>

<?php            

if (get_cat_name($term->parent) == 'Automation/Data Acquisition') {             

echo '<div class="col-sm-3">';
echo   '<h4 class="text-center">';
echo $term->name ; 
echo '</h4>';
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo get_skills_ratings($term->term_id); 
echo'%;">';
echo get_skills_ratings($term->term_id);
echo '%';
echo '</div>';
echo '</div>'; 
echo  '</div>';

}
?>

<?php

}
?>
</div><!-- class="col-xs-12"> -->

<!--====================================================-->      

</div> <!-- < class= "row">  -->   
</div><!--   < class= "container">-->
    
    
</div> 
<!--=========================-->          
<!-- Leadership -->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="leadership">

<h4>Leadership Roles</h4>
<br>  
    
<div class="container">    
    <div class="row"> 
    
<?php
$terms = get_terms( 'portfolio_leader', array('hide_empty' => false) );
foreach ($terms as $term) {
?>

<div class="col-xs-12 bevel">   

<h4><?php echo get_leader_title($term->term_id); ?> </h4>

<span class="bold"> <?php echo get_leader_organization($term->term_id); ?> </span> 
<span class="bold">&nbsp; / &nbsp;</span>
<span class="bold"><?php echo get_leader_division($term->term_id); ?> </span> 

<h5 class="bold"> <?php echo get_leader_date($term->term_id); ?> </h5>         
        
<span><?php echo $term->description; ?> </span>
 
<br>
<br>

</div>

<br>

<?php
}
?>

      
        
</div><!-- class="row"-->
</div><!-- class="container" -->
    
</div>
<!--=========================-->          
<!-- Papers -->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="papers">
<h4>Technical Papers</h4>
  <br>  
<div class="container">    
    <div class="row"> 
    <ol>
<?php
$terms = get_terms( 'portfolio_paper', array('hide_empty' => false) );
foreach ($terms as $term) {
?>

<!--<div class="col-xs-12">   -->
    <li>
        <h4><?php echo $term->name;  ?> </h4>

        <h5><?php echo get_paper_journal($term->term_id); ?> </h5>

<?php echo $term->description; ?>
 
<div class="container">    
<div class="row">        

<div class="col-xs-12">     

<span class="bold"> <?php echo get_paper_date($term->term_id); ?> </span> 

<span class="bold">&nbsp; / &nbsp;</span>

<span class="bold">Status: <?php echo get_paper_status($term->term_id) ?> </span>

<span class="bold">&nbsp; / &nbsp;</span>
    
    <span class="list-btn bold"> <a href="<?php echo get_paper_source($term->term_id) ?>" target="_blank"> Source </a> </span>    
  
</div>
   
</div><!-- class="row"-->
</div><!-- class="container" -->
    
</li>
<!--</div>-->
        <!-- class="col-xs-12" -->

<?php
}
?>
</ol> 
      
        
</div><!-- class="row"-->
</div><!-- class="container" -->
    
</div>    
<!--=========================-->          
<!-- Talks -->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="talks">

<div class="container">    
    <div class="row"> 
    <ol>
<?php
$terms = get_terms( 'portfolio_talk', array('hide_empty' => false) );
foreach ($terms as $term) {
?>

<!--<div class="col-xs-12">   -->
    <li>
        <h4><?php echo $term->name;  ?> </h4>

        <h5><?php echo get_talk_title($term->term_id); ?> </h5>

<?php echo $term->description; ?>
 
<div class="container">    
<div class="row">        

<div class="col-xs-12">     

<span class="bold"> <?php echo get_talk_date($term->term_id); ?> </span> 

<span class="bold">&nbsp; / &nbsp;</span>

<span class="bold"> <?php echo get_talk_location($term->term_id) ?> </span>

<span class="bold">&nbsp; / &nbsp;</span>
    
    <span class="list-btn bold"> <a href="<?php echo get_talk_source($term->term_id) ?>" target="_blank"> Source </a> </span>    
  
</div>
   
</div><!-- class="row"-->
</div><!-- class="container" -->
    
</li>
<!--</div>-->
        <!-- class="col-xs-12" -->

<?php
}
?>
</ol> 
      
        
</div><!-- class="row"-->
</div><!-- class="container" -->
 
 
</div>
<!--=========================-->          
<!-- Conferences -->
<!--=========================-->
<div class="tab-pane fade " id="conferences">

<h4>Conference Attendances</h4>
<br>  
    
<div class="container">    
    <div class="row"> 
    
<?php
$terms = get_terms( 'portfolio_conference', array('hide_empty' => false) );
foreach ($terms as $term) {
?>

<div class="col-xs-12 thickleftborder">   

<h4><?php echo $term->name; ?> </h4>

<span class="bold"> <?php echo get_conference_date($term->term_id); ?> </span> 
<span class="bold">&nbsp; / &nbsp;</span>
<span class="bold"><?php echo get_conference_location($term->term_id); ?> </span> 
<!--
<br>
<br>
-->

</div>

<br>

<?php
}
?>

      
        
</div><!-- class="row"-->
</div><!-- class="container" -->
</div>    
<!--=========================-->          
<!-- Research Statement -->
<!--=========================-->    
<div class="tab-pane fade commoncolor" id="research">
<h4>Research Statement</h4>
   
    <?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'portfolio',
                                     'portfolio_cat'       =>'research-statement',
                                     'posts_per_page' => 1 
                                    ) );

    if( $query->have_posts() ) {
            
			while($query->have_posts()){
				$query->the_post();
 
			$terms = get_the_terms( $post->ID, 'portfolio_cat' );
      
			$class = '';

			if(!empty($terms) ){
				foreach ($terms as $term) {
					$class .= $term->slug.' ';
				}
			}
                     
		?>         
    <div class="bevel">
        <br>
        <div class="container">
        <?php echo the_content() ?>
    </div>
         <br>
         </div>
    
    <?php
			}
		}
   wp_reset_query() 
    ?>   
    
</div>
<!--=========================-->          
<!-- Entrepreneurship Statement -->
<!--=========================-->
<div class="tab-pane fade commoncolor" id="entrepreneur">
<h4>Entrepreneurship Statement</h4>
   
     <?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'portfolio',
                                     'portfolio_cat'       =>'entrepreneurship-statement',
                                     'posts_per_page' => 1 
                                    ) );

    if( $query->have_posts() ) {
            
			while($query->have_posts()){
				$query->the_post();
 
			$terms = get_the_terms( $post->ID, 'portfolio_cat' );
      
			$class = '';

			if(!empty($terms) ){
				foreach ($terms as $term) {
					$class .= $term->slug.' ';
				}
			}
                     
		?>         
    <div class="bevel">
        <br>
        <div class="container">
        <?php echo the_content() ?>
    </div>
         <br>
         </div>
    
    <?php
			}
		}
   wp_reset_query() 
    ?>   
    
</div>      
<!--===================-->
    
</div>
    
<!--==================-->
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
<!--    ==============================-->
</div><!--< class="container">-->


</div>
<!--class = "content"-->
<?php
//get_sidebar();
get_footer();
?>