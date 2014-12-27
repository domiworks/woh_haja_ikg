<div class="modal fade popup_confirm_warning_kebaktian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		
		if($('#f_check_kebaktian_lain').val() == 1) //pakai nama kebaktian lain
		{
			$kebaktian_ke = '';
			$nama_kebaktian = $('#f_nama_kebaktian').val();
		}
		else
		{
			$kebaktian_ke = $('#f_kebaktian_ke').val();
			$nama_kebaktian = $('#f_nama_kebaktian').val();
		}
		if($('#f_check_pembicara_luar').val() == 1) //pakai pembicara luar
		{
			$id_pendeta = '';
			$nama_pendeta = $('#f_nama_pengkotbah').val();
		}
		else
		{
			$id_pendeta = $('#f_pengkotbah').val();
			$nama_pendeta = $('#f_nama_pengkotbah').val();
		}		
		$tanggal_mulai = $('#f_tanggal_mulai').val();
		$tanggal_selesai = $('#f_tanggal_selesai').val();
		$jam_mulai = $('#f_jam_mulai').val();
		$jam_selesai = $('#f_jam_selesai').val();
		$banyak_jemaat_pria = $('#f_banyak_jemaat_pria').val();
		$banyak_jemaat_wanita = $('#f_banyak_jemaat_wanita').val();
		$banyak_jemaat = $('#f_banyak_jemaat').val();
		$banyak_simpatisan_pria = $('#f_banyak_simpatisan_pria').val();
		$banyak_simpatisan_wanita = $('#f_banyak_simpatisan_wanita').val();
		$banyak_simpatisan = $('#f_banyak_simpatisan').val();
		$banyak_penatua_pria = $('#f_banyak_penatua_pria').val();
		$banyak_penatua_wanita = $('#f_banyak_penatua_wanita').val();
		$banyak_penatua = $('#f_banyak_penatua').val();
		$banyak_pemusik_pria = $('#f_banyak_pemusik_pria').val();
		$banyak_pemusik_wanita = $('#f_banyak_pemusik_wanita').val();
		$banyak_pemusik = $('#f_banyak_pemusik').val();
		$banyak_komisi_pria = $('#f_banyak_komisi_pria').val();
		$banyak_komisi_wanita = $('#f_banyak_komisi_wanita').val();
		$banyak_komisi = $('#f_banyak_komisi').val();
		// $id_gereja = $('#f_id_gereja').val();
		$jumlah_persembahan = $('#f_jumlah_persembahan').val();
		$keterangan = $('#f_keterangan').val();		
		
		$data = {
			'id_jenis_kegiatan' : $kebaktian_ke,
			'nama_jenis_kegiatan' : $nama_kebaktian,
			'id_pendeta' : $id_pendeta,
			'nama_pendeta' : $nama_pendeta,
			'tanggal_mulai' : $tanggal_mulai,
			'tanggal_selesai' : $tanggal_selesai,
			'jam_mulai' : $jam_mulai,
			'jam_selesai' : $jam_selesai,
			'banyak_jemaat_pria' : $banyak_jemaat_pria,
			'banyak_jemaat_wanita' : $banyak_jemaat_wanita,
			'banyak_jemaat' : $banyak_jemaat,
			'banyak_simpatisan_pria' : $banyak_simpatisan_pria,
			'banyak_simpatisan_wanita' : $banyak_simpatisan_wanita,
			'banyak_simpatisan' : $banyak_simpatisan,
			'banyak_penatua_pria' : $banyak_penatua_pria,
			'banyak_penatua_wanita' : $banyak_penatua_wanita,
			'banyak_penatua' : $banyak_penatua,
			'banyak_pemusik_pria' : $banyak_pemusik_pria,
			'banyak_pemusik_wanita' : $banyak_pemusik_wanita,
			'banyak_pemusik' : $banyak_pemusik,
			'banyak_komisi_pria' : $banyak_komisi_pria,
			'banyak_komisi_wanita' : $banyak_komisi_wanita,
			'banyak_komisi' : $banyak_komisi,
			// 'id_gereja' : $id_gereja,
			'jumlah_persembahan' : $jumlah_persembahan,
			'keterangan' : $keterangan
		};				
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_kebaktian')}}",
			data : {
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
					// $(".loader").fadeIn(200, function(){});
					
					// window.location = '{{URL::route('view_inputdata_kebaktian')}}';					
					location.reload();
					
					// $(".loader").fadeOut(200, function(){});
					
					//END LOADER
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);
				}				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
			
	});
</script>