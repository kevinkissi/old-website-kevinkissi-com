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
<!-- links / End -->



 <!-- Favicons
================================================== -->
<!--
<link rel="shortcut icon" href="<?php  ?>">
<link rel="icon" type="image/png" href="<?php  ?>">
<link rel="apple-touch-icon" href="<?php  ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php  ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php ?>">
-->
<!-- Favicons / End -->

<!--==============-->
<?php 
    wp_head(); 
    ?>
<!--==============-->


    
<script>


$(window).load(function(){ 
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 200,
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

// ==============================================

  $(".navbar-toggle").on("click", function () {
				    $(this).toggleClass("active");
			  });    

});

</script>
   
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

    .comment-content p:before {
content: open-quote !important;
}

.comment-content p:after {
content: close-quote !important;
}
/*-----------    */
ol.commentlist {
    list-style:none;
    margin:0;
    padding:0;
    }
    ol.commentlist a{ 
        text-decoration:none; 
        color: #444;
        }
ol.commentlist li { 
    border:1px solid #ddd; 
/*    border-radius:5px;*/
/*
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
*/
    margin:0 0 10px;
    padding:5px 7px 5px 64px; 
    position:relative; }
ol.commentlist li.pingback comment-author { 
    padding:0 170px 0 0;
    }
ol.commentlist li div.vcard { 
    font-weight:bold;
    font-size: 14px;
    line-height: 16px;
    font-family: helvetica,arial,sans-serif;
    }
ol.commentlist li div.vcard cite.fn { 
    font-style:normal;
    font-size: 11px; }
/*ol.commentlist li div.vcard cite.fn a.url { color:#cc0000; text-decoration:none; }*/
ol.commentlist li div.vcard cite.fn a.url:hover { 
    color:#444;
    }
ol.commentlist li div.vcard img.avatar { 
    background: #fff;
    border:1px solid #eee;
    padding: 2px; left:7px;
    position:absolute; 
    top:7px; }
ol.commentlist li div.comment-meta { 
    font-weight:bold;
    font-size: 10px !important; 
    line-height: 16px; 
    font-family: helvetica,arial,sans-serif;
    position:absolute;
    right:10px; 
    text-align:right;
    top:5px;
    }
ol.commentlist li div.comment-meta a {
    color:#444; 
    text-decoration:none; 
    }
ol.commentlist li p { 
    font-weight:normal;
    font-size: 12px;
    line-height: 16px; 
    white-space: normal !important;
    font-family: helvetica,arial,sans-serif;
    margin:5px 0 12px;
    }
ol.commentlist li ul { 
    font-weight:normal; 
    font-size:12px; 
    line-height: 16px; 
    font-family: helvetica,arial,sans-serif;
    list-style:square;
    margin:0 0 12px; 
    padding:0; 
    }
ol.commentlist li div.reply {
/*    background:#999;*/
/*    border:1px solid #666;*/
    border-radius:5px;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    color:#444 !important;
/*    font:bold 9px/1 helvetica,arial,sans-serif;*/
    font-weight: 600;
    padding:6px 5px 4px 5px;
    text-align:center; 
    text-decoration:none; 
    width:53px;
    }
ol.commentlist li div.reply:hover { 
/*    background:#444;*/
    border:2px solid #444; 
/*    padding: 10px;*/
    padding: 6px 5px 4px;
    color: #fff !important;
    margin:-2px;
    }
ol.commentlist li div.reply a { 
    color:#444; 
    text-decoration:none; 
/*    text-transform:uppercase;*/
    }
ol.commentlist li ul.children { list-style:none;
    margin:12px 0 0;
    text-indent:0;
    }
ol.commentlist li ul.children li.depth-2, ol.commentlist li ul.children li.depth-3, ol.commentlist li ul.children li.depth-4, ol.commentlist li ul.children li.depth-5 { 
     white-space: normal !important; 
    text-transform: none !important; 
    margin:0 0 3px;
    }
    ol.commentlist li ul.children li.depth-2 p, ol.commentlist li ul.children li.depth-3 p, ol.commentlist li ul.children li.depth-4 p, ol.commentlist li ul.children li.depth-5 p { 
     white-space: normal !important; 
    text-transform: none !important; 
    }
    ol.commentlist li ul.children li.depth-2 time, ol.commentlist li ul.children li.depth-3 time, ol.commentlist li ul.children li.depth-4 time, ol.commentlist li ul.children li.depth-5 time{
        text-decoration: none;
        font-size: 100 !important;
    }
/*
ol.commentlist li ul.children li.depth-3 { margin:0 0 3px; }
ol.commentlist li ul.children li.depth-4 { margin:0 0 3px; }
ol.commentlist li ul.children li.depth-5 { margin:0 0 3px; }
*/
ol.commentlist ul.children li.odd { 
    background:#fff;
    }
ol.commentlist ul.children li.even { 
    background:#eee;
    }
ol.commentlist li.pingback div.vcard { 
    padding:0 170px 0 0; 
    }    
/*-----------------------------------------------------------*/
/*
.comment-content{
        margin-left: 70px; 
    white-space: nowrap !important;
     border: 1px solid #ddd;
    }
*/
/*======================================================*/
    .wp-social-login-connect-with{
float:left;
        font-size:16px;
/*        padding-left:0 !important;*/
        padding:10px 10px 10px 0;
        font-weight:600;
        color: #444;
    }
    
.wp-social-login-provider-list img{
/*list-style:none outside none!important;margin:0!important;padding-left:0!important;*/
    width:24px!important;
    height:24px!important
}
/*------------------------*/
.comment-form {

    margin-bottom: 70px !important;
   
    }
    .comments-area {

    margin-bottom: 50px !important;
    
/*    margin-bottom: 115px !important ;*/
    }
    .comment-submit-ct{
        float: right !important;
    }
.comment-submit {
/*    width: 275px;*/
    float: right !important;
/*    right: 1000px !important;*/
/*    margin: 0;*/
    text-align: center;
/*    padding:0px 0px 5px 0px;*/
    color:#fff !important;
    background-color: #333 !important;
    font-weight: 600 !important;
    font-size: 16px !important;
    padding: 7px 10px 7px 10px !important;
    box-shadow: none !important;
    text-shadow: none !important;
    margin: 7px -15px 10px 0 !important;
/*     border: 2px solid #444 !important;*/
    
/*    padding: 0 !important;*/
    }
    
    .comment-submit:hover {

    color:#444 !important;
    background-color: #fff !important;
  
/*
    box-shadow: none !important;
    text-shadow: none !important;
 
*/
     border: 2px solid #444 !important;
    
/*    padding: 0 !important;*/
    }
    
.comment-author-name, .comment-author-email, .comment-author-url {
width: 290px;
height: 33px;
float: left;
text-align: left;
color:#444;
font-weight: 600;
/*    margin-left:-10px !important;*/
padding-left: 10px;
/*    padding-left: 50px;*/
margin: 5px 20px 10px -15px;
border: 2px solid #444 !important;
}

.wp-editor-area{
border: 2px solid #444 !important;
}
    
.reply-header{
color:#444;
font-weight: 600;
font-size: 22px;
/*    display:none;*/
}


.mce-tinymce{
border: 2px solid #333 !important;
box-shadow: none !important;
background-color: #fff !important;
}

#mceu_12-body{
border-bottom: 2px solid #333 !important;
box-shadow: none !important;
background-color: #fff !important;
}

.mce-label, .mce-tab{
font-weight: 600 !important;
}    
    
.mce-btn button, .mce-widget button {
background-color: #fff !important;
color: #333 !important;
box-shadow: none !important;
}

#mceu_14 button:hover,  #mceu_14  button:focus, #mceu_14  button:active{
border: 2px solid #444 !important;
margin: -2px !important; 
border-radius: 4px  !important;
}   
  
#mceu_9 button:hover, #mceu_9 button:focus, #mceu_9 button:active{
background: #fff !important;
}
.mce-btn-has-text button:hover, .mce-btn-has-text button:focus, .mce-btn-has-text button:active{
    background: #0073aa !important;
    box-shadow: none !important;
    text-shadow: none !important;
    outline: 0 !important;
}      

.mce-btn.mce-active,.mce-btn.mce-active:hover {
background-color: #444 !important;
border: 2px solid #444 !important;
border-radius: 4px  !important;
}

.mce-btn button {
padding: 4px !important;
font-size: 14px !important;
line-height: 20px !important;

}

.mce-i-bold, .mce-i-italic, .mce-i-strikethrough, .mce-i-link, .mce-i-undo, .mce-i-redo, .mce-i-blockquote, .mce-i-visualblocks, .mce-i-codesample, .mce-i-fullscreen {
color: #444 !important;
}  

.mce-i-strikethrough{
font-size: 29px !important;
font-weight: 500 !important;
} 
    
.mce-i-strikethrough{
padding-right: 7px !important;
}

.mce-btn-has-text button {
font-size: 17px !important;
font-weight: 900 !important;
color: #444 !important;
text-shadow: none !important;
}

.mce-i-codesample{
font-size: 20px !important;
}
    
/*---------------------------------*/
@media only screen and (max-device-width: 549px) {

#mce-modal-block {
padding: 4px !important;
}

.mce-window {
width: auto !important;
top: 0 !important;
left: 0 !important;
right: 0 !important;
bottom: 0 !important;
background: none !important;
/*        padding: 4px !important;*/
}

.mce-window-head {
background: #fff !important;
}

.mce-window-body {
background: #fff !important;
}

.mce-foot > .mce-container-body {
padding: 10px !important;
}

.mce-panel {
max-width: 100% !important;

}

.mce-container {
max-width: 100% !important;
height: auto !important;
}

.mce-container-body {
max-width: 100% !important;
height: auto !important;
}

.mce-form {
padding: 10px !important;
}

.mce-tabs {
max-width: 100% !important;
}


.mce-formitem {
margin: 10px 0 !important;
}

.mce-abs-layout-item {
position: static !important;
width: auto !important;

}
.mce-listbox{
min-width: 250px !important;
}
.mce-abs-layout-item.mce-label {
display: block !important;
}

.mce-abs-layout-item.mce-textbox {
-webkit-box-sizing: border-box !important;
-moz-box-sizing: border-box !important;
box-sizing: border-box !important;
display: block !important;
width: 100% !important;
}

}    
/*==================================================    */
   .readings-blog{
       border: none;
       text-align: center;
   }

  .buttom-link{
      font-size:16px;
      font-weight:900;
      
      background-color: transparent;
     text-decoration: none;
      
      box-shadow: none;
  }

  .buttom-blog{
      font-size:17px;
      font-weight: bold;
      color: #444 !important;
      background-color: transparent;
      border: 2px solid #444;
      padding: 5px;
      box-shadow: none;
      text-decoration: none;
  }
  .buttom-blog a{
      text-decoration: none;
      text-shadow: none;
      color: #444 !important; 
  }
  
.buttom-blog:hover{
   background-color: #444;
      border: 2px solid #444; 
       box-shadow: none;
       text-decoration; none;
       color:#fff !important;
}

.buttom-blog a:hover{
       color:#fff !important;
}

.btn-blog{
   text-align: right;
   
}


.author-sm-img{
    display: none;
}
 

@media screen and (max-width: 768px) { 
 
 .author-img{
    display: none;
}

.author-sm-img{
    display: block;
}

.rightb{
  margin-right: 7px !important;
  height: 75px !important;
}

.time{
    margin-top: 32px !important;
    margin-left: -3px !important;
    margin-right: 10px !important;
}

time.icon{
  font-size: 0.51em !important;
}

.author-name{
    font-family: 'EB Garamond', serif !important;
    font-size: 11px !important;
/*    font-weight: 900 !important;*/
}

.post-title {
    font-size: 25px !important;
}

.post-content{
   font-size: 17px !important;
}

}

 .commoncolor{
     color: #444;
     font-family: 'EB Garamond', Georgia, serif !important;
 }

.post-title {
   font-family: 'EB Garamond', Georgia, serif !important;
    text-align: center;
    font-size: 35px;
    font-weight: 600;
}

.post-content{
   font-size: 20px;
       font-weight: 500; 
}
.author-name{
    font-family: 'EB Garamond', Georgia, serif !important;
    font-weight: 900;
     font-size: 16px;
}

.rightb{
display: inline-block ;
    float:left ; 
  border-right: 3px solid #eee;
  margin-right: 15px;
 margin-top: 20px;
  height: 130px;
}

.author, .time-after{
    display: inline-block ;
    float:left ; 
    font-size: 0.93em;
  font-weight: bold;
}

.time-after{
    float:left ; 
    font-size: 0.7em;
  font-weight: bold;
  font-style: normal;
}

.time{
    margin-top: 37px;
    margin-left: 15px;
    margin-right: 20px;
     margin-bottom: 12px;
    display: inline-block ;
    float:left ; 
}

time.icon{
  font-size: .95em;
  display: block;;
  position: relative;
  width: 7em;
  height: 7em;
  background-color: #fff;
  margin-left: 0 auto;
  border-radius: 0.6em;
  border: 2px solid #444;
  overflow: hidden;
}

time.icon *
{
  display: block;
  width: 100%;
  font-size: 1.2em;
  font-weight: bold;
  font-style: normal;
  text-align: center;
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
  .navbar-header {
        float: none;
    }
    .navbar-toggle {
        display: block;     
        background-color: #444; 
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
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }   

ul {
  margin: 0;
  padding: 0;
  
}
ul li {

  font-weight: bold;
  font-size: 8.6px;
  color: #c1c1c1;
  text-transform: uppercase;

}

@media screen and (min-width: 768px) { 
  
ul li {
   font-size: 15px;
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
          if ( has_nav_menu( 'content_singles_nav' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'content_singles_nav',
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
