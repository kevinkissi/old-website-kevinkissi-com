var availableTags = [
"What projects are you currently working on?",
"What is the best way to reach you?",
"What programming languages do you use often?",
"What technologies do you like working with?",//
"Are you interested in building your company full-time?",//
"Why do you have an online presence?",//
"Are you interested in grad school?",//
"Were you really contemplating the universe?",//
"Why are you building isconjectured.org?",//
"How committed are you in entrepreneurship?",//
"Are you interested in employment?",//
"Do you have a bachelors degree in mathematics yet?",//
"How many projects are you currently working on?",//
"Is this a learning bot?",// 
"Does bot use artificial intelligence?",//
"Is this chatbot similar to eliza?",//
"Which of your past/current projects uses Java?",//
"Which of your past/current projects uses Javascript?",//
"Which of your past/current projects uses Mongodb?",//
"Which of your past/current projects uses SQL?",
"Which of your past/current projects uses PHP?",//
"Which of your past/current projects uses Angularjs?",//
"Which of your past/current projects uses Nodejs?",//
//"Which of your past/current projects uses Angularjs?",
"What frameworks do you use most often?",//    
"How important is ergonomics to you?",//
"How do you coordinate your workflow on a typical project?",//
"What is your current home city?",//
"How do you manage your time?",// 
"How many projects do you manage at a time?",//
"Are you currently attempting to solve a conjecture?",//
"How important is it for you to find the most optimum algorithm for every problem?",//
"Do you have a degree in computer science?", //   
"Do you have a mechanical engineering background?",//
"How much of your leadership skills have you retain from previous leadership roles?",//
"What is your current schedule like?",// 
"How busy are you?",// 
"Do you enjoy staying busy?",//
"Can you elaborate on the mobile applications you are currently working on?", //
"What frameworks do you use often?", //
//"what is your favorite database framework?",
"What companies have you worked for in the past?",//
"Why is the startup you are building stealth mode?", //
"Why are you keeping your mobile development projects stealth mode?",//
"Sumarize what you learned as a mechanical engineering major?",//
"Which are you more passionate about: Mathematics or Computer Science?",// 
"What is your most prefered IDE?",// 
"What is your most prefered programming language?",// 
"How much of your typical day is allocated to coding",//
//"How much code do you write daily?",
"How many technical papers do you read on a weekly basis?",//
"How many books do you read on a monthly basis?",//
"How much of your time do you allocate to testing the software you write?", //   
"How many of your projects integrate artificial intelligence?",//
"Which of your current projects is a big data project?", //    
"How much of your optimization research in mathematics meets computer science?",//
"Have you written any proposals for your current non-profit projects?", //
"Is your startup funded by a VC yet?", //
"How do you manage the risk involved in building a startup?", //
"How do you manage a startup's large decision set that is characteristic of its large software products and other aspects of running it?",    
];

$("#tags").autocomplete( {
     		source: availableTags,

         autoFocus: true,
     
     });

$("#tags").focus( function() {

$("#tags" ).css( "background-color", "transparent" )
$("#tags").attr("placeholder", "")
   
}).blur(function() {
//    
     $( "#tags" ).css( "background-color", "rgba(19, 8, 4, 0.6)" );

      var keyEvent = $.Event("keydown");
         keyEvent.keyCode = $.ui.keyCode.ENTER;
         $(this).trigger(keyEvent);
          return false; 

});
//----------------------------------
//$( "#herep" ).onlick(function() { // does not work with shuffle

document.getElementById("herep").onclick = function() {

    $("#typeout").hide();

     $( "#tags" ).css( "background-color", "rgba(19, 8, 4, 0.6)" );
    
    };
    
  // Handler for .ready() called.
//});
//---------------------------------------
function pFunction() {
    document.getElementById("formd").style.display = 'block';
    document.getElementById("typeout").style.display = 'none';
}
//===============================================

$(".contact-name input").blur(function()
{
if( !this.value) {
$( "#cf7-label-name" ).css( "transform", "translateY(42)").fadeIn('slow');
}
});

$(".contact-email input").blur(function()
{
if( !this.value) {
$( "#cf7-label-email" ).css( "transform", "translateY(42)").fadeIn('slow');
}
});

$(".contact-message textarea").blur(function()
{
if( !this.value) {
$( "#cf7-label-message" ).css( "transform", "translateY(42)").fadeIn('slow');
}
});

// ==================================
$( ".contact-name" ).click(function() {
$( "#cf7-label-name" ).css( "transform", "translateY(0)").fadeIn('slow');
}); 

$( ".contact-email" ).click(function() {
$( "#cf7-label-email" ).css( "transform", "translateY(0)").fadeIn('slow');
});  

$( ".contact-message" ).click(function() {
$( "#cf7-label-message" ).css( "transform", "translateY(0)").fadeIn('slow');
});  



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

//});

// =============================

//$(document).ready(function () {
//$(window).load(function(){ 
			  $(".navbar-toggle").on("click", function () {
				    $(this).toggleClass("active");
			  });
    
    
     $(".menu-item-type-custom").on("click", function () {
				    $(".navbar-toggle").toggleClass("active");
			  });
//        });
//===============================================              
            //   ========================
//    $(document).ready(function () {
              $(".container-2 input#search").on("click", function () {
                $( ".btn-secondary" ).css( "border", "2px solid #333");
                // $( ".container-2 input#search" ).css( "border", "2px solid #333");
            }).blur(function() {
                 $( ".btn-secondary" ).css( "border", "none");
            }); 
                


    $(".btn-secondary").prop('disabled',true);
    $(".container-2 input#search").keyup(function(){
        $(".btn-secondary").prop('disabled', this.value == "" ? true : false);     
    })
    
  
});  
//====================================


//====================================================
//jQuery(document).ready(function($) {
$(function() {
// OPACITY OF BUTTON SET TO 0%
$("span.itemhover").css("opacity","0");
 
// ON MOUSE OVER
$("span.itemhover").hover(function () {
 
// SET OPACITY TO 70%
$(this).stop().animate({
opacity: 0.9
}, "slow");
},
 
// ON MOUSE OUT
function () {
 
// SET OPACITY BACK TO 50%
$(this).stop().animate({
opacity: 0
}, "slow");
});
});

//------------
//-------------

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
//===================================
//$(function() {
function myFunction() {
//$("#detailport").click(function() {
    $('html,body').animate({
        scrollTop: $("#detailitem").offset().top},
        'slow');
//});
};