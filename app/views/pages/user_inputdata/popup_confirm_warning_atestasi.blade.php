<div class="modal fade popup_confirm_warning_atestasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		
		$no_atestasi = $('#f_nomor_atestasi').val();
		$id_jemaat = $('#f_jemaat').val();
		$tanggal_atestasi = $('#f_tanggal_atestasi').val();		
		$id_jenis_atestasi = $('#f_jenis_atestasi').val();
		if($('#f_check_gereja_lama').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_lama = '';
			$nama_gereja_lama = $('#f_nama_gereja_lama').val();
		}
		else
		{
			$id_gereja_lama = $('#f_list_gereja_lama').val();
			$nama_gereja_lama = $('#f_nama_gereja_lama').val();
		}
		if($('#f_check_gereja_baru').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_baru = '';		
			$nama_gereja_baru = $('#f_nama_gereja_baru').val();
		}
		else
		{
			$id_gereja_baru = $('#f_list_gereja_baru').val();		
			$nama_gereja_baru = $('#f_nama_gereja_baru').val();
		}
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_atestasi' : $no_atestasi,
			'id_anggota' : $id_jemaat,
			'tanggal_atestasi' : $tanggal_atestasi,
			'id_jenis_atestasi' : $id_jenis_atestasi,
			'id_gereja_lama' : $id_gereja_lama,
			'nama_gereja_lama' : $nama_gereja_lama,
			'id_gereja_baru' : $id_gereja_baru,
			'nama_gereja_baru' : $nama_gereja_baru,
			'keterangan' : $keterangan
		};		
		
		var json_data = JSON.stringify($data);
	
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_atestasi')}}",
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
					// window.location = '{{--URL::route('view_inputdata_atestasi')--}}';
					
					location.reload();
				}
				else
				{
					alert(result.messages);
					
					//show red background validation
					if($no_atestasi == ""){$('#f_nomor_atestasi').css('background-color','#FBE3E4');}else{$('#f_nomor_atestasi').css('background-color','#FFFFFF');}
					if($tanggal_atestasi == ""){$('#f_tanggal_atestasi').css('background-color','#FBE3E4');}else{$('#f_tanggal_atestasi').css('background-color','#FFFFFF');}
					if($nama_gereja_lama == ""){$('#f_nama_gereja_lama').css('background-color','#FBE3E4');}else{$('#f_nama_gereja_lama').css('background-color','#FFFFFF');}
					if($nama_gereja_baru == ""){$('#f_nama_gereja_baru').css('background-color','#FBE3E4');}else{$('#f_nama_gereja_baru').css('background-color','#FFFFFF');}

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