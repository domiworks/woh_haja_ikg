<div class="modal fade popup_confirm_warning_pernikahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		
		$no_pernikahan = $('#f_nomor_pernikahan').val();		
		$tanggal_pernikahan = $('#f_tanggal_pernikahan').val();
		$id_pendeta = $('#f_id_pendeta').val();
		$id_gereja = $('#f_id_gereja').val();
		$keterangan = $('#f_keterangan').val();
		
			if($('#f_check_jemaat_wanita').val() == 1) //pakai nama gereja lain
			{
				$id_mempelai_wanita = '';
				$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
			}
			else
			{
				$id_mempelai_wanita = $('#f_list_jemaat_wanita').val();
				$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
			}
			if($('#f_check_jemaat_pria').val() == 1) //pakai nama gereja lain
			{
				$id_mempelai_pria = '';
				$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();
			}
			else
			{
				$id_mempelai_pria = $('#f_list_jemaat_pria').val();
				$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();
			}
			
			$data = {
				'no_pernikahan' : $no_pernikahan,
				'tanggal_pernikahan' : $tanggal_pernikahan,
				'id_pendeta' : $id_pendeta,
						// 'id_gereja' : $id_gereja,			
						'id_jemaat_pria' : $id_mempelai_pria,
						'id_jemaat_wanita' : $id_mempelai_wanita,
						'nama_pria' : $nama_mempelai_pria,
						'nama_wanita' : $nama_mempelai_wanita,
						'keterangan' : $keterangan
					};
					
					var json_data = JSON.stringify($data);
					
					$.ajax({
						type: "POST",
						url: "{{URL('user/post_pernikahan')}}",
						data: {
							'json_data' : json_data
					// 'data' : $data
				},
				success: function(response){		
					result = JSON.parse(response);				
					if(result.code==201)
					{
						// alert("Berhasil simpan data kebaktian");					
						alert(result.messages);
						location.reload();
						
						// window.location = '{{URL::route('view_inputdata_pernikahan')}}';
					}
					else
					{
						alert(result.messages);

						//show red background validation
						if($no_pernikahan == ""){$('#f_nomor_pernikahan').css('background-color','#FBE3E4');}else{$('#f_nomor_pernikahan').css('background-color','#FFFFFF');}
						if($tanggal_pernikahan == ""){$('#f_tanggal_pernikahan').css('background-color','#FBE3E4');}else{$('#f_tanggal_pernikahan').css('background-color','#FFFFFF');}	
						if($nama_mempelai_pria == ""){$('#f_nama_mempelai_pria').css('background-color','#FBE3E4');}else{$('#f_nama_mempelai_pria').css('background-color','#FFFFFF');}	
						if($nama_mempelai_wanita == ""){$('#f_nama_mempelai_wanita').css('background-color','#FBE3E4');}else{$('#f_nama_mempelai_wanita').css('background-color','#FFFFFF');}

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