<?php
/**
 * default search form
 */
?>


<form id="search-form" class="input-group input-group-lg" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<!--<div class="field" id="searchform">-->
<input type="search" id="search-input" class="form-control" placeholder="<?php echo esc_attr( 'Search...', 'kevinkissi' ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
     <span class="input-group-btn">
<button type="submit" id="search-btn" class="btn btn-default"  value="Search"><i class="fa fa-search"></i></button>
           </span>
<!--</div>-->
<!-- </div>-->
      
    
</form>

