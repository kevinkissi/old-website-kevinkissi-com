<?php
/**
 * Template Name: Readings Page
 *
 * @package WordPress
 * @subpackage Kevin Kissi
 * @since Kevin Kissi 1.0
 */

get_header('portfolio'); ?>


 <div class="page-feature">

 
  <header class="page-header">   
				<?php
//					the_archive_title( '<h1 class="page-title">', '</h1>' );
//					the_archive_description( '<div class="taxonomy-description">', '</div>' );
 the_title('<h2 class="page-title">', '</h2>');
      
				?>
			</header><!-- .page-header -->

       </div>      

<br>
<!--=====================================-->
<div class="container">
<br> 

<!--=================================    -->
    
<ul id="myTab" class="nav nav-tabs">
<!--    <ul id="myTab" class="nav">-->

<li class="active" ><a href="#nontechnical" data-toggle="tab" data-toggle="tab">Non-Technical</a></li>

<li><a href="#papers" data-toggle="tab">Papers</a></li>
    
<li><a href="#textbooks" data-toggle="tab">Textbooks</a></li>    
  
<!-- ========================-->

</ul>    
    
  <br>
<!--===========================    -->
<div  id="myTabContent" class="tab-content">

<!--=========================-->          
<!-- Non-Technical-->
<!--=========================-->
<div class="tab-pane fade in active" id="nontechnical">  

<br>    
<!--====================================================-->  
<div class="container commoncolor">

<div class="row" >

		
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'nontechnical',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 99
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
    
<!--<div class="col-md-4 ">  -->
<div class="col-sm-6 col-md-4">
<div class="thumbnail readings-blog">

<h4> <?php the_title(); ?></h4>
    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    

<?php 
$totalpages = get_post_meta($post->ID, '_totalpages', true);
if($totalpages == 0){
$totalpages =1;  
};

if ( ( (get_post_meta($post->ID, '_currentcount', true)/$totalpages ) == 1) || $totalpages == 1){
echo '<h4>' . 'Read: ' . get_post_meta($post->ID, '_readdate', true) . '</h4>'; 
}
else{
echo '<br>';    
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo'%;">';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo '%';
echo '</div>';
echo '</div>'; 
}
?>    

</div>   
</div><!-- class="col-md-4"  -->
    
<?php
        }           
    }      
wp_reset_query() 
?>      
<!--    -------------------------------------> 		
		</div><!-- .row -->
	</div><!-- .container -->

<!--=====================================-->
    </div>
<!-- class="commoncolor tab-pane fade in active" id="nontechnical"-->
  
    
    
<!--=========================-->          
<!-- Papers-->
<!--=========================-->
<div class="commoncolor tab-pane fade" id="papers">  

<br>    
<!--====================================================-->  
<div class="container commoncolor">

<div class="row" >

		
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'papers',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 99
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
    
<!--<div class="col-md-4 ">  -->
<div class="col-sm-6 col-md-4">
<div class="thumbnail readings-blog">

<h4> <?php the_title(); ?></h4>
    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    

<?php 
$totalpages = get_post_meta($post->ID, '_totalpages', true);
if($totalpages == 0){
$totalpages =1;  
};

if ( ( (get_post_meta($post->ID, '_currentcount', true)/$totalpages ) == 1) || $totalpages == 1){
echo '<h4>' . 'Read: ' . get_post_meta($post->ID, '_readdate', true) . '</h4>'; 
}
else{
echo '<br>';    
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo'%;">';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo '%';
echo '</div>';
echo '</div>'; 
}
?>    

</div>   
</div><!-- class="col-md-4"  -->
    
<?php
        }           
    }      
wp_reset_query() 
?>      
<!--    -------------------------------------> 		
		</div><!-- .row -->
	</div><!-- .container -->

<!--=====================================-->
    </div>
<!-- class="commoncolor tab-pane fade in active" id="Papers"-->    
    
    
<!--=========================-->          
<!-- Textbooks-->
<!--=========================-->
<div class="commoncolor tab-pane fade" id="textbooks">  

<br>    
<!--====================================================-->  
<div class="container commoncolor">

<div class="row" >

		
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'textbooks',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 99
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
    
<!--<div class="col-md-4 ">  -->
<div class="col-sm-6 col-md-4">
<div class="thumbnail readings-blog">

<h4> <?php the_title(); ?></h4>
    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    

<?php 
$totalpages = get_post_meta($post->ID, '_totalpages', true);
if($totalpages == 0){
$totalpages =1;  
};

if ( ( (get_post_meta($post->ID, '_currentcount', true)/$totalpages ) == 1) || $totalpages == 1){
echo '<h4>' . 'Read: ' . get_post_meta($post->ID, '_readdate', true) . '</h4>'; 
}
else{
echo '<br>';    
echo '<div class="progress progress-custom">';
echo'<div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo'%;">';
echo round ((get_post_meta($post->ID, '_currentcount', true)/$totalpages)*100);
echo '%';
echo '</div>';
echo '</div>'; 
}
?>    

</div>   
</div><!-- class="col-md-4"  -->
    
<?php
        }           
    }      
wp_reset_query() 
?>      
<!--    -------------------------------------> 		
		</div><!-- .row -->
	</div><!-- .container -->

<!--=====================================-->
    </div>
<!-- class="commoncolor tab-pane fade in active" id="textbooks"-->    
    
    </div> <!-- id="myTabContent" class="tab-content"-->
    
</div><!-- .container -->

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