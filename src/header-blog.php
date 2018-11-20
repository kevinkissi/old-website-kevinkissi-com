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

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/respond.min.js"></script>
<![endif]-->


<?php wp_head(); ?>
<script> 
$(window).load(function(){ 
			  $(".navbar-toggle").on("click", function () {
				    $(this).toggleClass("active");
			  });    
//   ============================  
     $(".menu-item-type-custom").on("click", function () {
				    $(".navbar-toggle").toggleClass("active");
			  });
//  =============================         
 $(".btn-secondary").prop('disabled',true);
    $(".container-2 input#search").keyup(function(){
        $(".btn-secondary").prop('disabled', this.value == "" ? true : false);     
    })
    // ======================   
   $(".container-2 input#search").on("click", function () {
                $( ".btn-secondary" ).css( "border", "2px solid #333");
                // $( ".container-2 input#search" ).css( "border", "2px solid #333");
            }).blur(function() {
                 $( ".btn-secondary" ).css( "border", "none");
            });    
    // =========================           
        });
        
</script>
<!--==============-->
    
<script>

//jQuery(document).ready(function($){
$(window).load(function(){ 
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

// ====================================
$(document).ready(function(){
    // ============================
    
$(".nav-tabs a").click(function(e){
// --------------------
e.preventDefault();
e.stopImmediatePropagation();
//   -------------------
$(this).tab('show');
});
    
// ==============================

    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         
        $(".act span").text(x);
  
    });
    
});
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
 
 <script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'EB+Garamond::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); 
  </script>
 
 
 <style> 
   .readings-blog{
       border: none;
       text-align: center;
   }
  /*=============================  */
  .buttom-link{
      font-size:16px;
      font-weight:900;
      
      background-color: transparent;
     text-decoration: none;
      
      box-shadow: none;
  }

  .buttom-blog{
      font-size:16px;
      font-weight:900;
      color: #444 !important;
      background-color: transparent;
      border: 2px solid #444;
      padding: 5px;
      box-shadow: none;
  }

.buttom-blog:hover{
   background-color: #444;
      border: 2px solid #444; 
       box-shadow: none;
       text-decoration; none;
       color:#fff !important;
}

.btn-blog{
   text-align: right;
   
}

/*=================*/

 .commoncolor{
     color: #444;
     /*font-family: 'EB Garamond', Georgia, serif !important;*/
 }

.post-title {
   font-family: 'EB Garamond', Georgia, serif !important;
    text-align: center;
    /*font-size: 35px;*/
    font-weight: 600;
    font-size: 25px !important;
    margin-bottom: -10px;
}

.post-content{
   /*font-size: 20px;*/
   font-size: 17px !important;
       font-weight: 500;
       font-family: 'EB Garamond', Georgia, serif !important; 
}

.author-name{
    font-family: 'EB Garamond', Georgia, serif !important;
    font-weight: 900;
      /*font-family: 'EB Garamond', serif !important;*/
    font-size: 12px;
}

.author-sm-img{
    display: block;
    margin-bottom: -20px;
}

.author, .time-after{
    display: inline-block ;
    float:left ; 
    font-size: 0.93em;
  font-weight: bold;
  /*font-style: normal;*/

}

.time-after{
    /*display: inline-block ;*/
    float:left ; 
    font-size: 0.7em;
  font-weight: bold;
  font-style: normal;
}

.time{
    font-family: 'EB Garamond', Georgia, serif !important;
    
       margin-top: 32px ;
    margin-left: -8px ;
    margin-right: 10px;
     /*margin-bottom: -12px;*/
     /*border-right: 2px solid #444;*/
    display: inline-block ;
    float:left ;     
}

time.icon{
  /*font-size: .95em;*/
  display: block;;
  position: relative;
  width: 7em;
  height: 7em;
  background-color: #fff;
  margin-left: 0 auto;
  border-radius: 0.6em;
  border: 2px solid #444;
  overflow: hidden;
  
   font-size: 0.51em; /* change icon size */

/*float:left; */
}

time.icon *
{
  display: block;
  width: 100%;
  font-size: 1.2em;
  font-weight: bold;
  font-style: normal;
  text-align: center;

/*
overflow: hidden;
  -webkit-backface-visibility: hidden;*/
  -webkit-transform: rotate(0deg) skewY(0deg);*/
  -webkit-transform-origin: 50% 10%;
  transform-origin: 50% 10%;
}

time.icon strong
{
  position: absolute;
  top: 0;
  padding: 0.30em 0;
  color: #fff;
  background-color: #444;
   font-weight: bold;
   letter-spacing: 0.1em;
   
     /*text-transform: uppercase;*/
  /*border-bottom: 30px dashed #f37302;*/
  /*box-shadow: 0 2px 0 #fd9f1b;*/
}

time.icon em
{
  position: absolute;
  bottom: 0.2em;
  color: #444;
  text-transform: uppercase;
  font-weight: bold;
   font-size: 1.3em;
}

time.icon span
{
  width: 100%;
  font-size: 2.5em;
  letter-spacing: -0.05em;
  padding-top: 0.6em;
  color: #444;
}

.rightb{
  margin-right: 7px;
  height: 70px;
  display: inline-block ;
    float:left ; 
  border-right: 3px solid #eee;
  /*margin-right: 15px;*/
 margin-top: 20px;
  /*height: 130px;*/
}

  /*========================== */
  .navbar-header {
        float: none;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        /*margin: 7.5px -15px;*/
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }   
   /*====================================== */
   
.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
     zoom:1; /* hasLayout ie7 trigger */

}

/*.nav-pills{ border: 3px solid #c1c1c1;}*/
.nav-tabs, .nav-pills {
    text-align:center;

}
/*============/*/

.nav-tabs {
    border-bottom: 4px solid #444;
}
.nav-tabs>li.active>a{
  border-bottom-color: #fff !important;  
}
.nav-tabs>li>a:hover {
 border-color: #444;
  background-color: #444;
  color: #fff;
   /*border: 4px solid #444;*/
 
}
/*---------*/
.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.nav-tabs>li.active>a:focus {
 background: #444 !important;
  background-color: #444 !important;
  color: #fff;
     border: 4px solid #444;
    border-bottom-color: #444 !important;  
}
/*--------------------*/
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.428571429;
    /*border: 4.3px solid transparent;*/
    border-radius: 3px;
    
    color: #333;
}

/*============
*/
ul {
  margin: 0;
  padding: 0;
  
}
ul li {
  /*padding: 0;*/
  font-weight: bold;
  font-size: 8.6px;
  color: #c1c1c1;
  text-transform: uppercase;

}
/* Small devices (tablets, 768px and above) */
@media screen and (min-width: 768px) { 
  
ul li {
   font-size: 13.5px;
 }
    
 }



</style>    

</head><!--/head-->

<body <?php body_class() ?> >
  <!-- navbar-inverse navbar-fixed-top -->

<!-- Header
======================================================================== -->
<header id="header" class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
      <div class="navbar-header">

<!-- data-toggle="collapse" -->

        <div type="button" class="navbar-toggle res-menu menu-right push-body" data-toggle="collapse" data-target=".navbar-collapse">
             <!--<span class = "sr-only">Toggle navigation</span>-->
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

<!-- Responsive Navigation
======================================================================== -->
<!-- id="mobile-menu" -->
<!-- visible-xs -->

      <nav class="navbar-inverse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
        <div class="navbar-collapse">
            
          <?php
          if ( has_nav_menu( 'blog_nav' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'blog_nav',
              'container'       => false,
                // 'menu_class'      => 'nav', 
              'menu_class'      => 'nav navbar-nav', 
              //delete after pushmenu
              // 'fallback_cb'     => 'wp_page_menu',
              // 'walker'          => new wp_bootstrap_mobile_navwalker()
              )
            );
          }
          ?>
        </div>
      </nav><!--/.visible-xs-->
 <!-- Responsive Navigation / End -->

    </div> <!--/.container-->
</header><!--/#header-->
