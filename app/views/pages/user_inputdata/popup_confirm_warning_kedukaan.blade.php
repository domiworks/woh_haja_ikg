<div class="modal fade popup_confirm_warning_kedukaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		
		$no_kedukaan = $('#f_nomor_kedukaan').val();
		$tanggal_meninggal = $('#f_tanggal_meninggal').val();
		$id_jemaat = $('#f_list_jemaat').val();
		// $id_gereja = $('#f_list_gereja').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_kedukaan' : $no_kedukaan,
			// 'id_gereja' : $id_gereja,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan,
			'tanggal_meninggal' : $tanggal_meninggal
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_kedukaan')}}",
			data: {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){	
				result = JSON.parse(response);				
				if(result.code==201)
				{
					// alert("Berhasil simpan data kebaktian");					
					// location.reload();
					alert(result.messages);
					// window.location = '{{URL::route('view_inputdata_kedukaan')}}';
					
					location.reload();
									
				}
				else
				{
					alert(result.messages);

					//show red background validation
					if($no_kedukaan == ""){$('#f_nomor_kedukaan').css('background-color','#FBE3E4');}else{$('#f_nomor_kedukaan').css('background-color','#FFFFFF');}
					if($tanggal_meninggal == ""){$('#f_tanggal_meninggal').css('background-color','#FBE3E4');}else{$('#f_tanggal_meninggal').css('background-color','#FFFFFF');}
					if($keterangan == ""){$('#f_keterangan').css('background-color','#FBE3E4');}else{$('#f_keterangan').css('background-color','#FFFFFF');}

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