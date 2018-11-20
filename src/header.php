<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html <?php language_attributes(); ?>>

<head>
<!-- Meta
================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php ?>">
<meta name="keywords" content="<?php ?>">
<meta name="author" content="<?php ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Meta / End -->


<!-- links
================================================== -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- links / End -->

<?php wp_head(); ?>

<!--<script>
jQuery(window).load(function() {
jQuery("#status").fadeOut();
jQuery("#preloader").delay(1000).fadeOut("slow");
});   
</script>

<style>
 #preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }

#status  {
     width: 200px;
     height: 200px;
     position: absolute;
     left: 50%;
     top: 50%;
     background-image: url(images/preloader.gif);
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
 }   
</style>-->

</head><!--/head-->

<body <?php body_class() ?> onload =" start();">
    
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>	

<!-- Header
======================================================================== -->
<header id="header" class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
      <div class="navbar-header">

        <div type="button" class="navbar-toggle res-menu menu-right push-body" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </div>

<!-- Logo
======================================================================== -->
<div class="logo-wrapper">
<div class="logo">
    
<?php if  ( file_exists( TEMPLATEPATH . '/images/morelinesoriginallogo.png' ) ) { ?>
<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/morelinesoriginallogo.png" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<?php } ?>

</div>
</div>
<!-- ========================================================================
Logo / End -->

</div>
        
<!-- Main Navigation
======================================================================== -->
      <nav class="hidden-xs">
          
        <?php
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array(
            'theme_location'  => 'primary',
            'container'       => false,
            'menu_class'      => 'nav navbar-nav navbar-main',
            )
          );
        }
        ?>
          
      </nav>
      <!-- Main Navigation / End -->

<!-- Responsive Navigation
======================================================================== -->

      <nav class="navbar-inverse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
        <div class="navbar-collapse">
            
          <?php
          if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'primary',
              'container'       => false,
                // 'menu_class'      => 'nav', 
              'menu_class'      => 'nav navbar-nav', 
              
              )
            );
          }
          ?>
        </div>
      </nav><!--/.visible-xs-->
 <!-- Responsive Navigation / End -->

    </div> <!--/.container-->
</header><!--/#header-->
