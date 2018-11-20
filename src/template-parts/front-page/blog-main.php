  
<div class="container-fluid ablog">
<div class="row">

<!--=============================================================
            Articles
=============================================================-->

<div class="col-md-6 " style="border-right:2px solid #eee">
      
    <div class="section-header">

        <h3 class="">Articles</h3>

        </div><!-- / END SECTION HEADER -->
    
<div class="container">
<div class="row">

<!--<div class="col-sm-12">   -->
    
    
<?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'articles',
				'posts_per_page' => 3
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
    
<div class="col-sm-12"> 
    
    <h4><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h4>	    
    <div><?php echo get_excerpt(650); ?><a href= "<?php the_permalink() ?>">Read more</a></div>

    <div> <h6>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></h6> 

<i class="fa fa-comments"></i>
   <?php
$comments_count = wp_count_comments();
//echo "Comments for site <br />";
//echo "Comments in moderation: " . $comments_count->moderated . "<br />"; 
//echo "Comments approved: " . $comments_count->approved . "<br />";
//echo "Comments in Spam: " . $comments_count->spam . "<br />";
//echo "Comments in Trash: " . $comments_count->trash . "<br />";
echo "Total Comments: " . $comments_count->total_comments . "<br />";
?>
 
<div class="tags-container"> 
Tags: <?php foreach ($terms as $term) echo '<span class="atag">'. $term->name .'</span>'; ?>  
</div>  
         
    </div>
    
  </div><!-- class="col-md-4" -->  
    
<div id="articles-hr" class="divider"><hr></div> 
<!--SECONDARY DIVIDER
=====================================-->    

      
   <?php
			}
//            endwhile;
		}
   wp_reset_query() 
    ?>
    
   <br> 
    <div class="btn-icon">
        <button class="blog-button">
            <a href="\wp\blog\articles"> Go to Articles page</a>
        </button>
<i class="fa fa-angle-double-right"></i> 
    </div>

<div id="articles-after-hr" class="divider"><hr></div> 
<!--SECONDARY DIVIDER
=====================================-->        
    
</div><!-- class="row" -->
</div> <!-- class="container"-->      
    
    
</div><!-- class="col-md-6" -->

<!--<div id="blog-hr" class="divider divider-vertical" ><hr></div>-->

<!-- PRIMARY DIVIDER
================================-->
<!--=====================================================================
            Readings
=====================================================================    -->

<div class="col-md-6">
<div class="container">
<div class="row">
    
<div class="col-md-12">
    
<div class="section-header">

<h3 class="">Readings</h3>

</div><!-- / END SECTION HEADER -->    
    
<div class="container">
<div class="row">  

<!--Nontechnical ================================    -->
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'nontechnical',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 1 
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
    
<div class="col-md-4 readings-border">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     

    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    
<h5><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h5>

  <div class="progress progress-custom">
  <div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%;">
    <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%
  </div>
</div>

    
</div><!-- class="col-md-4"  -->
    
<?php
        }           
    }      
wp_reset_query() 
?>    

<!-- Papers ================================    -->
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'papers',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 1 
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
    
<div class="col-md-4 readings-border">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     

    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    
<h5><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h5>

   <div class="progress progress-custom">
  <div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%;">
    <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%
  </div>
</div>

    
</div><!-- class="col-md-4"  -->
    
<?php
        }          
    }     
wp_reset_query() 
?>    

<!-- Textbooks ================================    -->
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'readings',
//                                     'tag_ID'         => 18,
                                        'readings_cat'   =>'textbooks',
//                                     'category_name' => 'papers',
                                     'posts_per_page' => 1 
                                    ));
    
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
    
<div class="col-md-4">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     
    
<img src="<?php
//Thumb Size Image
echo get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'    
?>"
alt=""/>
    
<h5><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h5>
    
   <div class="progress progress-custom">
  <div class="progress-bar progress-color" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%;">
    <?php echo round ((get_post_meta($post->ID, '_currentcount', true)/get_post_meta($post->ID, '_totalpages', true))*100);
 ?>%
  </div>
</div>

</div><!-- class="col-md-4"  -->
    
<?php
        }         
    }      
wp_reset_query() 
?>     
     
</div><!-- class="row" -->
</div> <!-- class="container"--> 
    
<br>
    
<div class="btn-icon">
        <button class="blog-button">
            <a href="\wp\blog\readings"> Go to Readings page</a>
        </button>
<i class="fa fa-angle-double-right"></i>
</div>    
    
</div><!-- class="col-md-12" --> 
    
<div class="divider"><hr></div> 
<!--SECONDARY DIVIDER
=====================================-->
<!--=====================================================================
            FLOW
=====================================================================    -->
    
<div class="col-md-12">
    
<div class="section-header">

<h3 class="">Flow</h3>

</div><!-- / END SECTION HEADER --> 
    
<div class="container">
<div class="row">      

<!-- devflow ================================-->    
<?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'flow',
                                     'flow_cat'       =>'devflow',
                                     'posts_per_page' => 1 
                                    ) );


    
    if( $query->have_posts() ) {
            
			while($query->have_posts()){
				$query->the_post();
 
			$terms = get_the_terms( $post->ID, 'flow_cat' );
      
			$class = '';

			if(!empty($terms) ){
				foreach ($terms as $term) {
					$class .= $term->slug.' ';
				}
			}
                     
		?>   
    
<div id="devFlow" class="col-sm-6">

<h4><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h4>	    
<div><?php echo get_excerpt(200); ?><a href= "<?php the_permalink() ?>">Read more</a></div>
    
<div class="flow-section-header">
        <h4 class="">#<?php echo $term->name ?></h4>
</div><!-- / END SECTION HEADER -->    
    
</div><!-- class="col-md-6" --> 
    
<?php
			}
		}
   wp_reset_query() 
    ?>

<!-- devflow ================================-->

    <?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'flow',
                                     'flow_cat'       =>'mathflow',
                                     'posts_per_page' => 1 
                                    ) );

    if( $query->have_posts() ) {
            
			while($query->have_posts()){
				$query->the_post();
 
			$terms = get_the_terms( $post->ID, 'flow_cat' );
      
			$class = '';

			if(!empty($terms) ){
				foreach ($terms as $term) {
					$class .= $term->slug.' ';
				}
			}
                     
		?>   
    
<div class="col-sm-6">

<h4><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h4>	    
<div><?php echo get_excerpt(200); ?><a href= "<?php the_permalink() ?>">Read more</a></div>
    
<div class="flow-section-header">
        <h4 class="">#<?php echo $term->name ?></h4>
</div><!-- / END SECTION HEADER -->    
    
</div><!-- class="col-md-6" --> 
    
<?php
			}
		}
   wp_reset_query() 
    ?>


</div><!-- class="row" -->
</div> <!-- class="container"-->      
 
<!-- healthflow ================================-->
<!--FLOW SECONDARY DIVIDER
=====================================-->
<div id="healthFlow-hr" class="divider"><hr></div> 
    
<div class="container">
<div class="row">    
    
    
    <?php
		global $post;
		$query = new WP_Query( array ( 
                                     'post_type' 	  => 'flow',
                                     'flow_cat'       =>'healthflow',
                                     'posts_per_page' => 1 
                                    ) );

    if( $query->have_posts() ) {
            
			while($query->have_posts()){
				$query->the_post();
 
			$terms = get_the_terms( $post->ID, 'flow_cat' );
      
			$class = '';

			if(!empty($terms) ){
				foreach ($terms as $term) {
					$class .= $term->slug.' ';
				}
			}
                     
		?>         

<div class="col-sm-12"> 

<h4><a href= "<?php the_permalink() ?>"> <?php the_title(); ?></a></h4>	    
<div><?php echo get_excerpt(200); ?><a href= "<?php the_permalink() ?>">Read more</a></div>
    
<div class="flow-section-header">
        <h4 class="">#<?php echo $term->name ?></h4>
</div><!-- / END SECTION HEADER -->    

</div><!-- class="col-sm-12"   -->
     
   
 
    
<?php
			}
		}
   wp_reset_query() 
    ?>   
 
</div><!-- class="row" -->
</div> <!-- class="container"-->        

<br>    
    
<div class="btn-icon">
        <button class="blog-button">
            <a href="\wp\blog\flow"> Go to Flow page</a>
        </button>
<i class="fa fa-angle-double-right"></i>
</div>
    
    
</div><!-- class="col-xs-12" -->
    
</div><!-- class="row" -->
</div> <!-- class="container"-->
</div><!-- class="col-xs-6" -->
    
</div><!-- class="row" -->
</div> <!-- class="container"-->