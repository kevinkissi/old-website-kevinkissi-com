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
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Meta / End -->


<!-- links
================================================== -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!-- links / End -->

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/respond.min.js"></script>
<![endif]-->


<?php wp_head(); ?>

    
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>-->

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
    //============

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


$(window).load(function(){ 
	var offset1 = 300,

		offset_opacity1 = 1200,
		
		scroll_top_duration1 = 700,
        $back_to_item = $('a[href*="#"]:not([href="#"])');

	//smooth scroll to top
	$back_to_item.on('click', function(event){
        
		event.preventDefault();
		$('body,html').animate({
        
             scrollTop:  $back_to_item.offset().top + ($( window ).height()*(1/12)),
        
		 	}, scroll_top_duration1
		);

        
	});

});

// =======================================

$('nav-tabs a').click(function (e) {
    if($(this).parent('li').hasClass('active')){
        $( $(this).attr('href') ).hide();
    }
    else {
        e.preventDefault();
        $(this).tab('show');
    }
});    
</script>
<style> 


/*====================== */
.dropdown-menu {
 padding-top: 1px !important;
    padding: 0;
    margin: 0;
    font-size: 14px;
    background-color: #fff;
    border: 2px solid #444;
}

.dropdown-menu>li>a {
    font-weight: bold;
    color: #444;
}

.seperate-li{
  background: #444; 
  height: 2px;
}


.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus {
    color: #fff;
    text-decoration: none;
    background-color: #444 !important;
}

.nav-tabs .open > a, .nav-tabs .open > a:hover, .nav-tabs .open > a:focus {
    border: 2px solid #444;
    color: #444;
     background-color: #fff !important;
}

.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus {
background-color: rgba(150, 150, 150, 0.2 );
color: #fff;
}

.dropdown-menu>.active>a:hover {
    color: #fff !important;
    text-decoration: none;
    background-color: #444 !important;
    /*outline: 0;*/
}
.dropdown-menu>.active>a,.dropdown-menu>.active>a:focus {
    color: #444 !important;
    /*text-decoration: none;*/*/
    background-color: #fff !important;
    /*outline: 0;*/
}

.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus {
    color: #fff;
}

/*===========*/
 .commoncolor{
     color: #444;
 }
 .thickleftborder{
     border-left: 5px solid #444;
 }
 
 .bevel
{
    background: #fff;
    
    border: 1px solid #eee;    
    
    -moz-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(150, 150, 150, .2);
    -webkit-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(150, 150, 150, .2);
    box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(150, 150, 150, .2);
}
 
 .bold{
     font-weight: bold;
 }
 
  .list-btn a{
  color: #444 !important;
      background-color: transparent;
      border: 2px solid #444;
      padding: 3px;
      box-shadow: none;  
      text-decoration: none !important;   
      border-radius:3.5px;
 }
 
 .list-btn a:hover{
   background-color: #444;
      /*border: 1px solid #444; */
       box-shadow: none;
       text-decoration; none;
       color:#fff !important;
}
 
 ol {
    counter-reset:li; /* Initiate a counter */
    margin-left:0; /* Remove the default left margin */
    padding-left:0; /* Remove the default left padding */
}
ol > li {
    position:relative; /* Create a positioning context */
    margin:0 0 6px 2em; /* Give each list item a left margin to make room for the numbers */
    padding:4px 8px; /* Add some spacing around the content */
    list-style:none; /* Disable the normal item numbering */
    /*border-top:2px solid #666;*/
    /*background:#f6f6f6;*/
}
ol > li:before {
    content:counter(li); /* Use the counter as content */
    counter-increment:li; /* Increment the counter by 1 */
    /* Position and style the number */
    position:absolute;
    top:-2px;
    left:-2em;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    box-sizing:border-box;
    width:2em;
    /* Some space between the number and the content in browsers that support
       generated content but not positioning it (Camino 2 is one example) */
    margin-right:8px;
    padding:4px;
    border-top:2px solid #000;
    color:#fff;
    background: #555;
    font-weight:bold;
    font-family:"Helvetica Neue", Arial, sans-serif;
    text-align:center;
}
/*li ol,
li ul {margin-top:6px;}
ol ol li:last-child {margin-bottom:0;}*/
 /*=====================================*/
   .readings-blog{
       border: none;
       text-align: center;
   }
  /*=============================  */
  .request-btn{
     padding: 2px;
     float: left;
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


.author, .time-after{
    display: inline-block ;
    float:left ; 
    font-size: 0.93em;
  font-weight: bold;
  font-style: normal;

}

.time-after{
    /*display: inline-block ;*/
    float:left ; 
    font-size: 0.7em;
  font-weight: bold;
  font-style: normal;
}

.except{
    display:block ;
    position: relative;
 
    
     border-left: 2px solid #eee !important;
  margin-left: 101px  !important;
  padding:5px;

}

.time{
    margin-top:18px;
    margin-left: -12px;
    display: inline-block ;
    float:left ; 

}

time.icon
{
  font-size: 0.45em; /* change icon size */
  display: block;;
  position: relative;
  width: 7em;
  height: 7em;
  background-color: #fff;
  margin-left: 0 auto;
  border-radius: 0.6em;
  border: 2px solid #444;
  overflow: hidden

float:left; 
}

time.icon *
{
  display: block;
  width: 100%;
  font-size: 1.2em;
  font-weight: bold;
  font-style: normal;
  text-align: center;
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

}

time.icon em
{
  position: absolute;
  bottom: 0.2em;
  color: #444;
  text-transform: uppercase;
  font-weight: bold;
   font-size: 1.2em;
}

time.icon span
{
  width: 100%;
  font-size: 2.5em;
  letter-spacing: -0.05em;
  padding-top: 0.75em;
  color: #444;
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
  <nav class="navbar-inverse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
        <div class="navbar-collapse">
            
          <?php
          if ( has_nav_menu( 'portfolio_nav' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'portfolio_nav',
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

<div class = "content">