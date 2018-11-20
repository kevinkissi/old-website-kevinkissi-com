    <div class="container">

        <div class="row">
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
// 
//			$terms = get_the_terms( $post->ID, 'about-cat' );
//      
//			$class = '';
//
//			if(!empty($terms)){
//				foreach ($terms as $term) {
//					$class .= $term->slug.' ';
//				}
//			}
                     
		?>
            
           <div id="abtxt" class="col-sm-6 column">
<!--               <div class="col-sm-6">-->

<p id= "ptxt" class="text-left"> 
<!--    <p id= "ptxt"> -->
               <?php echo get_the_content() ?>
               </p>

</div>
<div class="col-sm-6 column" >
<!--    <div id="meimg" class="col-sm-6" >-->
<!--     id="meimg-->

                   <img src=" <?php the_post_thumbnail( ); ?>" alt="<?php bloginfo('template_directory'); ?>/images/aboutsuit.jpg" />

               </div>


        <?php
			}
//  
		}
   wp_reset_query() 
    ?>     
            
            
<!--          <div id ="aboutimg">1</div>-->

        </div> <!-- / END 3 COLUMNS OF ABOUT US-->

    </div> <!-- / END CONTAINER -->