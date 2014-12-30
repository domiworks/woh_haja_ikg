<div class="modal fade popup_confirm_warning_baptis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<button type="button" class="btn btn-danger okConfirm" data-dismiss="modal">Yes</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '.okConfirm', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$nomor_baptis = $('#f_nomor_baptis').val();
		$pembaptis = $('#f_pembaptis').val();
		$jemaat = $('#f_jemaat').val();
		$jenis_baptis = $('#f_jenis_baptis').val();		
		$tanggal_baptis = $('#f_tanggal_baptis').val();
		// $gereja = $('#f_id_gereja').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'id_jemaat' : $jemaat,
			'id_pendeta' : $pembaptis,
			'tanggal_baptis' : $tanggal_baptis,
			'id_jenis_baptis' : $jenis_baptis,
			'keterangan' : $keterangan
			// 'id_gereja' : $gereja
			
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_baptis')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_inputdata_baptis')}}';
					
					location.reload();
										
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