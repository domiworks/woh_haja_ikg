<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>FRUNK Blueprint</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Dominikus Radit and SJI Systems" />
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css') }}" />
	<script src="{{ asset('assets/js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/mbf.js') }}"></script>
	<script src="{{ asset('assets/js/touchswipe/jquery.touchSwipe.min.js') }}"></script>
</head>
<body>
	<div class="f_super_container" style="position: relative; overflow-y: auto; overflow-x: hidden;padding-right: 0px !important;padding-left: 0px !important;margin-right: auto;margin-left: auto;">
		<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				@include('includes/navigation/sidepanel_mobile')
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<header class="frunk-header">
							<div class="s_left_sec">
								<a href="javascript:void(0)" id="trigger" class="cusicon_menu pull-left"></a>
							</div>
							<div class="s_mid_sec">

							</div>
							<div class="s_right_sec">

							</div>
							
						</header>
						<div class="s_coner_fluid_cstm f_touch" id="f_touch">
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
							<p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
							<p>The next level can optionally overlap or cover the previous one.</p>
						</div>

						

						<!--<div class="content">
							<div class="block block-60">
								<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
								<p>This menu will open by pushing the website content to the right. It has multi-level functionality, allowing endless nesting of navigation elements.</p>
								<p>The next level can optionally overlap or cover the previous one.</p>
							</div>
							<div class="info">
								<p>If you enjoyed this you might also like Lorem Ipsum</p>
								<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
							</div>
						</div>-->

					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		
	</div><!-- /container -->
	<script src="{{ asset('assets/js/classie.js') }} "></script>
	<script src="{{ asset('assets/js/mlpushmenu.js') }} "></script>
	<script>
		new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );


		     
	      //Enable swiping...
	      /*$(".f_touch").swipe( {
	        //Generic swipe handler for all directions
	        swipeRight:function(event, direction, distance, duration, fingerCount) {
        		
	        },
	        //Default is 75px, set to 0 for demo so any distance triggers swipe
	        threshold:0
	      });*/

		
		var height = $(window).height();
		var width = $(window).width();

		function updateSize(){
			// Get the dimensions of the viewport
			//var width = $(window).width();
			
			//var navHeight = $('#nav_sec').height();
			
			//$('#landing_sec').height(height);
			//$('.landing_spc').height(height - navHeight);
			$('.f_super_container').css('height',height);
			$('.mp-pusher').css('height',height);
			//$('.mp-menu ul').css('height',height);
			//$('.mp-menu ul').css('overflow','hidden');
			//$('.mp-level').css('height',height);
			//$('.mp-level').css('overflow-y','scroll');
			
			
		};
		$(document).ready(updateSize);
		$(window).resize(updateSize);
	</script>
</body>
</html>