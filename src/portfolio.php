    
<div class="container">
    <div class="row">
 
         <ul class="col-md-6 col-md-offset-3" id="filter">

        <li>

            <a href= "#" class="active" >
                <span class="icon-categories"><i class="fa fa-align-justify"></i>&nbsp;</span>
                <?php _e( 'All', 'kevinkissi' ); ?>
            </a>

        </li>
<?php

        $terms = get_terms( 'portfolio_cat', array('hide_empty' => false) );

    foreach ($terms as $term) {
        ?>

        <li >

            <a href= "#">

                <span class="icon-categories"><?php echo get_tax_icon($term->term_id) ?>&nbsp;</span>
                <?php echo $term->name ?>

            </a>


        </li>

        <?php
    }
?>
    </ul>
        
<!--==========================================            -->
 
    <div id="padtop">
        
        <ul id="og-grid" class="og-grid">

    <?php
		global $post;
		$query = new WP_Query(array(
				'post_type' 	 => 'portfolio',
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
    
        
<?php
//Preview Size Image
  $url = get_bloginfo('stylesheet_directory').'/images/home-preview-default.jpg'
?>
 
<?php
//Thumb Size Image
 $url2 = get_bloginfo('stylesheet_directory').'/images/home-thumb-default.jpg'
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
    ?>
            
</ul> 
        </div>      

</div>
</div>
