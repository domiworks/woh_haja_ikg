<div class="modal fade popup_confirm_warning_dkh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Alert!</h4>
			</div>
			<div class="modal-body"  style="text-align: center;">
				Apakah Anda yakin data yang dimasukkan sudah benar?
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="button" class="btn btn-danger okCOnfirm" data-dismiss="modal">Yes</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '.okCOnfirm', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$no_dkh = $('#f_nomor_dkh').val();
		$id_jemaat = $('#f_nama_jemaat').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_dkh' : $no_dkh,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_dkh')}}",
			data: {
				// 'data' : $data
				'json_data' : json_data
			},
			success: function(response){				
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_inputdata_dkh')}}';
					location.reload();
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');	
				}
				// alert(result.code);
				// alert(result.status);
			
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');	
			}
		},'json');
	});
</script>