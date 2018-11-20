<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kevinkissi
 */

get_header('404'); ?>


<div class="page-feature">

<div class="page-header">

<h2  class="page-title"> 404 </h2>
</div> 

</div> 


<div class="container">


<div class="fourofour">
404
</div>
    
<h2 class="postitle"><?php _e('Page Not Found', 'kevinkissi'); ?></h2>

<div class="error_msg">

Server cannot find the file you requested. The page has either been moved or deleted, or you entered the wrong URL or document name. Look at the URL. If a word looks misspelled, then correct it and try it again. If that doesnt work You can try seaching to find what you are looking for.

</div>

<?php get_search_form(); ?>

    
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
    
</div><!-- container class END-->

	
<?php get_footer(); ?>
