<div class="modal fade popup_confirm_warning_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		
		var data, xhr;
		data = new FormData();

		$nomor_anggota = $('#f_nomor_anggota').val();			
		data.append('no_anggota', $nomor_anggota);		
		$nama_depan = $('#f_nama_depan').val();	
		data.append('nama_depan', $nama_depan);
		$nama_tengah = $('#f_nama_tengah').val();	
		data.append('nama_tengah', $nama_tengah);
		$nama_belakang = $('#f_nama_belakang').val();	
		data.append('nama_belakang', $nama_belakang);
		$jalan = $('#f_alamat').val();
		data.append('jalan', $jalan);
		$kota = $('#f_kota').val();
		data.append('kota', $kota);
		$kodepos = $('#f_kodepos').val();
		data.append('kodepos', $kodepos);
		$telp = $('#f_telp').val();	
		data.append('telp', $telp);		
		//looping ambil data hp
		var arr_hp = new Array();
		for($i = 1; $i < lastIdx; $i++)
		{
			arr_hp[arr_hp.length] = $('#f_hp'+$i+'').val();			
		}
		data.append('arr_hp', arr_hp);					
		$gender = $('input[name="gender"]:checked').val();	
		data.append('gender', $gender);
		$wilayah = $('#f_wilayah').val();	
		data.append('wilayah', $wilayah);
		$gol_darah = $('#f_gol_darah').val();
		data.append('gol_darah', $gol_darah);
		$pendidikan = $('#f_pendidikan').val();	
		data.append('pendidikan', $pendidikan);
		$pekerjaan = $('#f_pekerjaan').val();	
		data.append('pekerjaan', $pekerjaan);
		$etnis = $('#f_etnis').val();	
		data.append('etnis', $etnis);
		$kota_lahir	= $('#f_kota_lahir').val();
		data.append('kota_lahir', $kota_lahir);
		$tanggal_lahir = $('#f_tanggal_lahir').val();	
		data.append('tanggal_lahir', $tanggal_lahir);
		// $anggota_gereja = $('#f_id_gereja').val();
		// data.append('id_gereja', $anggota_gereja);
		if($('#f_foto').val() != "")
		{			
			$foto = $('#f_foto')[0].files[0];
		}		
		else		
		{
			$foto = "";
		}
		data.append('foto', $foto);
		$role = $('#f_status').val();
		data.append('role', $role);						

		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_anggota')}}",
			data : data,
			processData: false,
			contentType: false,	
			success: function(response){
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);
					// window.location = '{{URL::route('view_inputdata_anggota')}}';
					
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
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
</script>