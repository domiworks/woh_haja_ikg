<div class="modal fade popup_video_input_kebaktian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Tutorial</h4>
			</div>
			<div class="modal-body"  style="text-align:center;height:400px;">
				<div>
					<video id="f_video_user_input_kebaktian" style="margin-left:10px;" width="550" height="350" controls>
					  	<source id="f_src_user_input_kebaktian" src="{{URL('assets/tutorial/input_kebaktian.mp4')}}" type="video/mp4">
					</video>
				</div>
			</div>			
		</div>
	</div>
</div>

<script>
	//pause video when popuop closed
	$('.popup_video_input_kebaktian').on('hidden.bs.modal', function () {
		$("#f_video_user_input_kebaktian")[0].pause();	  	
	})
</script>