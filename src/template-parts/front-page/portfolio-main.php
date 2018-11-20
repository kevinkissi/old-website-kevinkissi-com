    
<div class="container">
    <div class="row">
 
         <ul class="col-md-6 col-md-offset-3 nav" id="filter">

        <li class="active" >

            <a href= "#all" class="active"  data-toggle="tab">
<!--                   <a href= "#all"  data-toggle="tab">-->
                <span class="icon-categories"><i class="fa fa-align-justify"></i>&nbsp;</span>
                <?php _e( 'All', 'kevinkissi' ); ?>
            </a>

        </li>
             
<?php
$terms = get_terms( 'portfolio_cat', array('hide_empty' => false) );
foreach ($terms as $term) {
?>

<?php            

if (get_cat_name($term->parent) == 'Front Page Portfolio Categories') {    

echo    '<li>';
echo   '<a href= "#'. $term->slug;
echo '" data-toggle="tab">';
echo '<span class="icon-categories">';
echo get_tax_icon($term->term_id);
echo '&nbsp;';
echo '</span>';
echo $term->name;
//    echo $term->slug;
echo '</a>';
echo '</li>';
    

}

?>
             
<?php
}
wp_reset_query();
?>
    </ul>
<!--    ===========================================================    -->
        <div id="padtop" class="tab-content">
            

<!--==========================================            -->
 
    <div id="all" class="tab-pane fade in active" >
<!--        <div id="all padtop">-->
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
                'portfolio_cat'  => 'front-page-portfolio-categories',
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
 
<!---------------------Grid Posts---------------------->


	<li><!--post-->
    
		<a href= "<?php the_permalink() ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title(); ?>" data-description="<?php the_content( 'portfolio-content', array('class' => 'portfolio-content') ); ?>">
           
<!--            echo get_excerpt(190); -->
            
        <img src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
           
            
            <span class="pstTitle">
                <div id="title"><?php the_title(); ?></div>
            </span>
            
        </a>	
       
	</li><!--end of post-->

  
   <?php
			}
		}
wp_reset_query();
    ?>
            
</ul> 
        </div>  
            
<!-- ================================================================       -->
<!--=========================================================        -->
     
    <div id="apps" class="tab-pane fade">
<!--        <div id="all padtop">-->
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
                'portfolio_cat'  => 'apps',
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
<!---------------------Grid Posts---------------------->

	<li class="item"><!--post-->
    
		<a href= "<?php the_permalink() ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title(); ?>" data-description="<?php the_content( 'portfolio-content', array('class' => 'portfolio-content') ); ?>">
            
        <img src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
            <span class="pstTitle">
                <div id="title"><?php the_title(); ?></div>
            </span>
            
        </a>	
       
	</li><!--end of post-->

  
   <?php
			}
		}
wp_reset_query();
    ?>
            
</ul> 
        </div>       
<!--===============================================================        -->
<!--============================================================================        -->
            
<!-- ================================================================       -->
<!--=========================================================        -->
     
    <div id="ngo" class="tab-pane fade">
<!--        <div id="all padtop">-->
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
                'portfolio_cat'  => 'ngo',
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
<!---------------------Grid Posts---------------------->

	<li><!--post-->
    
		<a href= "<?php the_permalink() ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title(); ?>" data-description="<?php the_content( 'portfolio-content', array('class' => 'portfolio-content') ); ?>">
            
        <img src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
            <span class="pstTitle">
                <div id="title"><?php the_title(); ?></div>
            </span>
            
        </a>	
       
	</li><!--end of post-->

  
   <?php
			}
		}
wp_reset_query();
    ?>
            
</ul> 
        </div> 
<!-- ================================================================       -->
<!--=========================================================        -->

    <div id="papers" class="tab-pane fade">
<!--        <div id="all padtop">-->
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
                'portfolio_cat'  => 'papers',
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
<!---------------------Grid Posts---------------------->

	<li class="item"><!--post-->
    
		<a href= "<?php the_permalink() ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title(); ?>" data-description="<?php the_content( 'portfolio-content', array('class' => 'portfolio-content') ); ?>">
            
        <img src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
            <span class="pstTitle">
                <div id="title"><?php the_title(); ?></div>
            </span>
            
        </a>	
       
	</li><!--end of post-->

  
   <?php
			}
		}
wp_reset_query();
    ?>
            
</ul> 
        </div>  
            <!-- ================================================================       -->
<!--=========================================================        -->
     
    <div id="startup" class="tab-pane fade">
<!--        <div id="all padtop">-->
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
                'portfolio_cat'  => 'startup',
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
<!---------------------Grid Posts---------------------->

	<li><!--post-->
    
		<a href= "<?php the_permalink() ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title(); ?>" data-description="<?php the_content( 'portfolio-content', array('class' => 'portfolio-content') ); ?>">
            
        <img src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
            <span class="pstTitle">
                <div id="title"><?php the_title(); ?></div>
            </span>
            
        </a>	
       
	</li><!--end of post-->

  
   <?php
			}
		}
wp_reset_query();
    ?>
            
</ul> 
        </div>       
<!--===============================================================        -->
<!--============================================================================        -->

            
        </div><!-- class="tab-content-->

        
        
</div>
</div>
