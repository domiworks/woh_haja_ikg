<!DOCTYPE html>
<html lang="en">
	<title>Project</title>
	<head>
		<!-- head.user dipake aj soalnya cuma isi import" jquery dll sama title -->
		@include('includes.head_user')
		<script>
			function startTime() {
				var m_names = new Array("Januari", "Februari", "Maret", 
				"April", "Mei", "Juni", "Juli", "Agustus", "September", 
				"Oktober", "November", "Desember");

				var today=new Date();
				var mo=today.getMonth();
				var da=today.getDate();
				var y=today.getFullYear();
				var h=today.getHours();
				var m=today.getMinutes();
				var s=today.getSeconds();
				m = checkTime(m);
				s = checkTime(s);
				document.getElementById('f_clock').innerHTML = da+" "+m_names[mo]+" "+y+" - "+h+":"+m+":"+s;
				var t = setTimeout(function(){startTime()},500);
			}

			function checkTime(i) {
				if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
				return i;
			}
		</script>
	</head>
	<!--<body onload="startTime()">-->
	
	<body style="">
		<!-- <div class="s_orenji_header">
		</div> -->		
		
		
		<div style="height:500px;" id="yield_content" class=""> <!-- s_content_admin -->
			@yield('content')
		</div>
			
		<script type="text/javascript">
			function updateSize(){
				// Get the dimensions of the viewport
				var width = $(window).width();
				var height = $(window).height();
				var iHeight = $(window).height() - 270;
				
				$('.s_set_height_window').height(iHeight);

				$('.s_content_maindiv').height(height-($('.s_top_header').height()+$('.navbar').height())-3);
				$('.s_sidebar_main').height(height-($('.s_top_header').height()+$('.navbar').height())-3);
				$('.s_main_side').height(height-($('.s_top_header').height()+$('.navbar').height())-3);
				$('.s_main_side').width(width-$('.s_sidebar_main').width());
				//$('.irashai').width(width);
				//$('.willkommen').width($('.irashai').width()/2);
				//$('.willkommen').height(height);
				//$('body').css('overflow-x','hidden');//.css('overflow-x','visible');
				//$('body').mousewheel(function(event, delta) {
				//	this.scrollLeft -= (delta * 50);
				//	event.preventDefault();
				//});
			};
			$(document).ready(updateSize);
			$(window).resize(updateSize);
		</script>
		<script>
			var timeout    = 500;
			var closetimer = 0;
			var ddmenuitem = 0;

			function jsddm_open()
			{  jsddm_canceltimer();
			   jsddm_close();
			   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

			function jsddm_close()
			{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

			function jsddm_timer()
			{  closetimer = window.setTimeout(jsddm_close, timeout);}

			function jsddm_canceltimer()
			{  if(closetimer)
			   {  window.clearTimeout(closetimer);
				  closetimer = null;}}

			$(document).ready(function()
			{  $('.s_top_nav > li').bind('mouseover', jsddm_open)
			   $('.s_top_nav > li').bind('mouseout',  jsddm_timer)});

			document.onclick = jsddm_close;
		</script>

		<script>
			//Resetter input[type=text] untuk seluruh modal
			$('.modal').on('hidden.bs.modal', function (e) {
			  //alert('modal closed');
			  //-- fungsi untuk me-reset sluruh input[type=text] pada modal --
			  $(this).find('input[type=text]').val('');
			})
		</script>
		
	</body>
</html>