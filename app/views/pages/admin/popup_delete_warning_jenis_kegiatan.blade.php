<div class="modal fade popup_delete_warning_jenis_kegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Alert!</h4>
			</div>
			<div class="modal-body"  style="text-align: center;">
				Apakah Anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="button" class="btn btn-danger okDelete" data-dismiss="modal">Yes</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '.okDelete', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$data = {
			'id' : $id
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'DELETE',
			url: "{{URL('admin/delete_jenis_kegiatan')}}",
			data : {
				'json_data' : json_data				
			},
			success: function(response){
				result = JSON.parse(response);
				
				if(result.code==204)
				{
					alert(result.messages);
					
					location.reload();
					
					// window.location = '{{URL::route('admin_view_input_jenis_kegiatan')}}';
					
					
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
</script>