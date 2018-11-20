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

// =============================
// ====================================
// $(document).ready(function(){
   
// $(".nav-tabs a").click(function(){

// e.preventDefault();
// e.stopImmediatePropagation();


// $(this).tab('show');
// });
  
// });

$('nav-tabs a').click(function (e) {
    if($(this).parent('li').hasClass('active')){
        $( $(this).attr('href') ).hide();
    }
    else {
        e.preventDefault();
        $(this).tab('show');
    }
});