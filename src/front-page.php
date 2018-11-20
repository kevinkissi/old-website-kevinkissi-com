<?php
/**
 * Template Name: Home
 * 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kevinkissi
 */

get_header(); ?>

     
<div id="home" class="demo-1">

<div id="large-header" class="large-header">
<canvas id="demo-canvas"></canvas>

<div class="main-title">

<div id ="typeout">
<div id="typed-strings">

<?php 
    $intro = array(
0 =>"<p><span>Hi, I'm Kevin.</span></p> 
<p><span>I am an engineer and a mathematics enthusiast.</span></p>
<p><span>Navigate the site as usual.</span></p>
<p><span>Or submit queries to a robotic impression of myself.</span></p>",
    
1 =>"<p><span>Thanks for visiting.</span></p> 
<p><span>Consider navigating the site as usual.</span></p>
<p><span>Or submit queries to a robotic impression of myself.</span></p>",   

2 =>"<p><span>Welcome to my blog site.</span></p> 
<p><span>A bot can answer some questions if you have any.</span></p>"
    );
 
echo $intro[rand ( 0 , 2)];

?>
<p><span>Click <button id="herep" class="log" onclick="return pFunction();" >here</button> to interact with a bot.</span></p>
</div>
<span id="typed" ></span>
<!--<!--    style="white-space:pre;"-->

</div >



<div class="row">

<div class="control-group" id="fields">

<form id="formd" name="Kevin" class="body ui-widget" onSubmit="return dialog();">

<div class="form-group form-group-lg">

<div id="container">
<div class="row"> 
<div class="col-xs-1"></div> 
<div class="col-xs-10">    
<textarea id="textd" class="log writer" name="log" rows="3"  disabled></textarea>
</div>
<div class="col-xs-1"></div> 
</div>
</div>
    
<div class="col-lg-3"></div>    
<div class="col-lg-6">
<!--<div class="containerm col-centered">-->
<div class="input-group input-group-lg">
<input id="tags" class="form-control input-lg " type="text" autocomplete="on"  name="input" value="" placeholder="Ask bot anything">
<span class="input-group-btn ">
<button id="askb" class="btn btn-default btn-lg " type="button" data-original-title="" title="" onclick="return dialog();"><i class="fa fa-question"></i></button>
</span>
</div><!-- /input-group -->
</div><!-- /col-lg-6 -->   
<div class="col-lg-3"></div>

</div>

</form>
<!--==========================-->
</div><!-- /control-group -->
</div><!-- /.row -->

</div>
</div><!-- /.larger-header -->

</div><!-- /.demo-1 -->

<!--<span id='hide-main'>-->
<!--==================================================================-->
<!--       ABOUT SECTION   -->
<!--==================================================================-->
<!--<div id="menu-item-7">-->
 
<section class="about-us" id="about">

<div class="section-header">

<h2 class="">About</h2>

</div><!-- / END SECTION HEADER -->

<div class="container">

<div class="row">

<div class="col-sm-1"></div>    
<?php
global $post;
$query = new WP_Query(array(
'post_type' 	 => 'about',
'posts_per_page' => 1
));

if($query->have_posts()){
//            
while($query->have_posts()){
$query->the_post();

?>
<!--id="abtxt"-->
<!--    class="text-left"-->
<div class="col-sm-7 ">
<div id= "ptxt" class="text-left"> 
<?php echo get_the_content() ?>
</div>
</div>
<!-------->

<div class="col-sm-3" >    
<img id="aboutimg" src="<?php bloginfo('template_directory'); ?>/images/aboutsuit.jpg" alt="<?php the_post_thumbnail(); ?>" />
</div>
<?php
}  
}
wp_reset_query() 
?> 
    

<div class="col-sm-1"></div>

</div> <!-- / END 3 COLUMNS OF ABOUT US-->

</div> <!-- / END CONTAINER -->


</section> <!-- END ABOUT US SECTION -->

<!--==================================================================-->
<!--       PORTFOLIIO SECTION   -->
<!--==================================================================-->
<!--	<div id="menu-item-8">-->
<section class="portfolio" id="portfolio">

<div class="section-header">

<h2>Portfolio</h2>

</div>


<div class="container">
<div class="row">

<ul class="col-md-6 col-md-offset-3 nav" id="filter">


<li>

<a class="active" href="#" data-group="all">

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

echo '<li>';
echo '<a href="#" data-group="';
echo $term->slug . '">';

echo '<span class="icon-categories">';
echo get_tax_icon($term->term_id);
echo '&nbsp;';
echo '</span>';
echo $term->name;

echo '</a>';
echo '</li>';

}

?>

<?php
}
wp_reset_query();
?>
</ul>
    
<!--==========================================-->

        <div id="padtop" class="tab-content">
            
<!--==========================================-->
 
    <div id="all" class="tab-pane fade in active" >
        
        <ul id="grid" class="og-grid">

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
        
<!--post-->
<li class="item <?php echo $term->slug ?>" data-groups='["all", "<?php echo $term->slug ?>"]'>        

<div id="title">
<?php the_title(); ?>
</div>

    
<div class="image">
    
<span class="itemhover"> 
    

<div id="title">
<?php the_title(); 
    ?>
</div>

    
<span id="title"><?php  echo get_excerpt(300);?></span> 

<button id="portfolio-button-main" type="button" data-toggle="collapse" data-target="#<?php echo $post->post_name; ?>" onclick="myFunction()">
More 
</button>

    
</span> 

<img class="imgborder" src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>

</div>
    

</li><!--end of post-->

       
<?php
}
}
wp_reset_query();

?>            
            

</ul> 
</div>  
            
            
<!--============================================================================        -->
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
             
            

<div id="detailitem" >            
<div id="<?php echo $post->post_name; ?>" class="collapse">
  
<div id="portdetail"> 
    
<button id="portfolio-button-main" class="floatright" type="button" data-toggle="collapse" data-target="#<?php echo $post->post_name; ?>"><i class="fa fa-times"></i></button>  
    
<div id="title-port">
<h2><?php the_title(); ?></h2>
</div>
    
<span class="porttype"><h5>Type: <b><?php echo $term->name ?></b></h5></span>
  
    
<div class="container"> 
<div class="row">
    
<div  class="col-sm-4">
<img class="imgborder" src="<?php echo $url2; ?>" alt="<?php the_title(); ?>"/>
</div>
<div class="col-sm-1">&nbsp;</div>
<div class="col-sm-7">
<?php the_content() ?>
  
<button id="portfolio-button-main"><a href="<?php echo get_post_meta($post->ID, '_projectlink', true);?>" target="_blank">Visit Website</a></button>

</div>
    
</div> 
</div> 
    

    
</div>   
    
</div>
</div> 
            
<?php
}
}
wp_reset_query();

?> 
<!--===========================================================-->    
            
<!--==============================-->
</div><!-- class="tab-content-->
     
</div>
</div>

<div id="portfolio-more">

<h4 class="">For more information, visit the portfolio page <button id="portfolio-button-main"><a href="/portfolio">here</a></button></h4>

</div><!-- / more ionfor mation -->

</section> 

<!-- </div> -->

<!--==================================================================-->
<!--       CONTACT SECTION   -->
<!--==================================================================-->

<section id="contact" class="site-footer" >

<div id="about-header">

<h2 class="">Contact </h2>

</div><!-- / END SECTION HEADER -->

	
<div class="container">

<div class="row">

<div class="list-contact-wrapper">

<div class="col-md-3 col-md-offset-3 ">

<div class="contact-wrapper">

<span class="icon" ><i class="fa fa-phone"></i></span>

<p>Voicemail: (763) 390-9122
</p>

</div>

</div>

<div class="col-md-3">

<div class="contact-wrapper">

<span class="icon"><i class="fa fa-envelope"></i></span>

<p>Email: more@kevinkissi.com
</p>

</div>

</div>

</div>

<div class="clearfix"></div>

<div class="contact-form-wrapper">

<h2 class="contact-title"><?php echo __('Get In Touch', 'kevinkissi')?></h2>

<?php 
echo do_shortcode( 
'[contact-form-7 id="20" title="Main"]'
); 
?>

</div>

</div>
</div>

             
</section><!--#contact section  -->

<!--==================================================================-->
<!--       BLOG SECTION   -->
<!--==================================================================-->

<section id="blog">

        <div class="section-header">

        <h2 class="">Blog</h2>

        </div><!-- / END SECTION HEADER -->

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
            <a href="\blog\articles"> Go to Articles page</a>
        </button>
<i class="fa fa-angle-double-right"></i> 
    </div>

<div id="articles-after-hr" class="divider"><hr></div> 
<!--SECONDARY DIVIDER
=====================================-->        
    
</div><!-- class="row" -->
</div> <!-- class="container"-->      
    
    
</div><!-- class="col-md-6" -->


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
    
<div class="col-md-4 readings-border">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     

    
<img src="<?php echo $url2; ?>"
alt=""/>
    
<h4><a href= ""> <?php the_title(); ?></a></h4>

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
    
<div class="col-md-4 readings-border">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     

    
<img src="<?php echo $url2; ?>"
alt=""/>
    
<h4><a href= ""> <?php the_title(); ?></a></h4>

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
    
<div class="col-md-4">  

<div class="flow-section-header">
 <h4><a href= "<?php the_permalink() ?>"> <?php echo $term->name; ?></a></h4>   
</div><!-- / END SECTION HEADER -->     
    
<img src="<?php echo $url2; ?>"
alt=""/>
    
<h4><a href= ""> <?php the_title(); ?></a></h4>
    
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
            <a href="\blog\readings"> Go to Readings page</a>
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
            <a href="\blog\flow"> Go to Flow page</a>
        </button>
<i class="fa fa-angle-double-right"></i>
</div>
    
    
</div><!-- class="col-xs-12" -->
    
</div><!-- class="row" -->
</div> <!-- class="container"-->
</div><!-- class="col-xs-6" -->
    
</div><!-- class="row" -->
</div> <!-- class="container"-->
    
<div class="">

        <hr>

      </div><!-- / more ionfor mation -->
    
    
<div class="">

        <h4 class="">Click <button id="blog-button-main"><a href="\blog">here</a></button> to visit the blog page.</h4>

      </div><!-- / more ionfor mation -->

</section>



<?php get_footer(); ?>

    <!--</span>-->