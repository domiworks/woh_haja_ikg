<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	@include('includes/mobile_head_html')
</head>
<body>
	<section class="s_super_container">
		@yield('content')
	</section>
<script>
	//new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );



      //Enable swiping...
      


      var height = $(window).height();
      var width = $(window).width();

      function updateSize(){
		// Get the dimensions of the viewport
		//var width = $(window).width();
		
		//var navHeight = $('#nav_sec').height();
		
		//$('#landing_sec').height(height);
		//$('.landing_spc').height(height - navHeight);
		$('.s_super_container').height(height);
		$('.s_super_container').width(width);
		$('.s_left_display').height(height);
		$('.s_left_display').width(width);


		$('.s_middle_display').width(width);
		$('.s_middle_display').height(height);
		$('.s_middle_display_splash').width(width);
		$('.s_middle_display_splash').height(height);
		$('.sixty_slasher').width(width);
		$('.sixty_slasher').height(height);
		$('.s_deg_60').width(height*1.15);

		$('.s_left_display').css('left',-width);

		$('.s_sidebar_area').height(height);
		$('.s_sidebar_lv_1').height(height);

		$('.s_sidebar_close_area').width($('.s_left_display').width() - 300);
		$('.s_sidebar_close_area').height(height);
		//$('.mp-menu ul').css('height',height);
		//$('.mp-menu ul').css('overflow','hidden');
		//$('.mp-level').css('height',height);
		//$('.mp-level').css('overflow-y','scroll');
		
		
	};
	$(document).ready(updateSize);
	$(window).resize(updateSize);

	$('body').on('click', '.f_side_bar_buka', function(){
		$('.s_left_display').animate({"left": '0px'},330, 'easeInOutExpo');
		$('.s_middle_display').animate({"margin-left": '300px'},330, 'easeInOutExpo');
		$('.f_side_bar_tutup').removeClass('hidden').addClass('show');
		$('.f_side_bar_buka').addClass('hidden').removeClass('show');

	});

	$('body').on('click', '.f_side_bar_tutup', function(){
		$('.s_left_display').animate({"left": -width},330, 'easeInOutExpo');
		$('.s_middle_display').animate({"margin-left": '0px'},330, 'easeInOutExpo');
		$('.f_side_bar_tutup').addClass('hidden').removeClass('show');
		$('.f_side_bar_buka').removeClass('hidden').addClass('show');
	});

	
	

	$('body').on('click', '.s_sidebar_close_area', function(){
		$('.s_left_display').animate({"left": -width},330, 'easeInOutExpo');
		$('.s_middle_display').animate({"margin-left": '0px'},330, 'easeInOutExpo');
		$('.f_side_bar_tutup').addClass('hidden').removeClass('show');
		$('.f_side_bar_buka').removeClass('hidden').addClass('show');
	});

	$(".s_middle_display").swipe( {
        //Generic swipe handler for all directions
        swipeRight:function(event, direction, distance, duration, fingerCount) {

        	$('.s_left_display').animate({"left": '0px'},330, 'easeInOutExpo');
        	$('.s_middle_display').animate({"margin-left": '300px'},330, 'easeInOutExpo');
        	$('.f_side_bar_tutup').removeClass('hidden').addClass('show');
        	$('.f_side_bar_buka').addClass('hidden').removeClass('show');

        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold:0
    });



	$(".s_left_display").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {

        	$('.s_left_display').animate({"left": -width},330, 'easeInOutExpo');
        	$('.s_middle_display').animate({"margin-left": '0px'},330, 'easeInOutExpo');
        	$('.f_side_bar_tutup').addClass('hidden').removeClass('show');
        	$('.f_side_bar_buka').removeClass('hidden').addClass('show');

        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold:0
    });
	</script>
</body>
</html>