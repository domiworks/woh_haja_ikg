<script>
	$('body').on('click', '#f_edit_check_jemaat_wanita', function(){		
		if($('#f_edit_check_jemaat_wanita').val() == 0){	
			$('#f_edit_check_jemaat_wanita').val(1); //pakai pembicara luar jika value f_edit_check_jemaat_wanita == 1
			$('#f_edit_nama_mempelai_wanita').attr('disabled', false);			
			$('#f_edit_nama_mempelai_wanita').val("");
			$('#f_edit_list_jemaat_wanita').attr('disabled', true);								
		}
		else
		{
			$('#f_edit_check_jemaat_wanita').val(0); //tidak pakai pembicara luar jika value f_edit_check_jemaat_wanita == 0
			$('#f_edit_nama_mempelai_wanita').attr('disabled', true);	
			// $('#f_edit_nama_pengkotbah').val("");
			selected = $('#f_edit_list_jemaat_wanita').find(":selected").text();
			$('#f_edit_nama_mempelai_wanita').val(selected);	
			$('#f_edit_list_jemaat_wanita').attr('disabled', false);				
		}
	});

	$('body').on('click', '#f_edit_check_jemaat_pria', function(){		
		if($('#f_edit_check_jemaat_pria').val() == 0){	
			$('#f_edit_check_jemaat_pria').val(1); //pakai pembicara luar jika value f_edit_check_jemaat_pria == 1
			$('#f_edit_nama_mempelai_pria').attr('disabled', false);			
			$('#f_edit_nama_mempelai_pria').val("");
			$('#f_edit_list_jemaat_pria').attr('disabled', true);								
		}
		else
		{
			$('#f_edit_check_jemaat_pria').val(0); //tidak pakai pembicara luar jika value f_edit_check_jemaat_pria == 0
			$('#f_edit_nama_mempelai_pria').attr('disabled', true);	
			selected = $('#f_edit_list_jemaat_pria').find(":selected").text();
			$('#f_edit_nama_mempelai_pria').val(selected);
			$('#f_edit_list_jemaat_pria').attr('disabled', false);				
		}
	});	
</script>

<div class="modal fade popup_edit_pernikahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Pernikahan</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Piagam Pernikahan
						</label>
						<div class="col-xs-4">
							{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_edit_nomor_pernikahan', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Pernikahan
						</label>
						<div class="col-xs-2">
							{{ Form::text('tanggal_pernikahan', Input::old('tanggal_pernikahan'), array('id' => 'f_edit_tanggal_pernikahan', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pendeta yang memberkati
						</label>
						<div class="col-xs-4">
							<!--<select id='f_edit_id_pendeta' class='form-control'>
							</select>-->
							@if($list_pendeta == null)
								<p class="control-label pull-left">(tidak ada daftar pendeta)</p>
							@else
								{{Form::select('id_pendeta', $list_pendeta, Input::old('id_pendeta'), array('id'=>'f_edit_id_pendeta', 'class'=>'form-control'))}}
							@endif
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					
					<!--
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja tempat diberkati
						</label>
						<div class="col-xs-6">
							{{-- Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja', 'class'=>'form-control')) --}}
						</div>
					</div>
					-->
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat Pria
						</label>
						<div class="col-xs-4">
							<!--<select id='f_edit_list_jemaat_pria' class='form-control'>
							</select>-->
							@if($list_jemaat_pria == null)
								<p class="control-label pull-left">(tidak ada daftar pendeta)</p>
							@else
								{{Form::select('list_jemaat_pria', $list_jemaat_pria, Input::old('list_jemaat_pria'), array('id'=>'f_edit_list_jemaat_pria', 'class'=>'form-control'))}}					
							@endif
						</div>
						<div class="col-xs-0">
							<input id="f_edit_check_jemaat_pria" type="checkbox" name="jemaat_pria" value="0" /> Non-GKI				
						</div>
						<script>
						$('body').on('change','#f_edit_list_jemaat_pria', function(){
							var selected = $('#f_edit_list_jemaat_pria').find(":selected").text();
							$('#f_edit_nama_mempelai_pria').val(selected);					
						});
						</script>
					</div>
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Mempelai Pria
						</label>
						<div class="col-xs-4">
							{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_edit_nama_mempelai_pria', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat Wanita
						</label>
						<div class="col-xs-4">
							<!--<select id='f_edit_list_jemaat_wanita' class='form-control'>
							</select>-->
							@if($list_jemaat_wanita == null)
								<p class="control-label pull-left">(tidak ada daftar pendeta)</p>
							@else
								{{Form::select('list_jemaat_wanita', $list_jemaat_wanita, Input::old('list_jemaat_wanita'), array('id'=>'f_edit_list_jemaat_wanita', 'class'=>'form-control'))}}							
							@endif
						</div>
						<div class="col-xs-0">
							<input id="f_edit_check_jemaat_wanita" type="checkbox" name="jemaat_wanita" value="0" /> Non-GKI				
						</div>
						<script>
						$('body').on('change','#f_edit_list_jemaat_wanita', function(){
							var selected = $('#f_edit_list_jemaat_wanita').find(":selected").text();
							$('#f_edit_nama_mempelai_wanita').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Mempelai Wanita
						</label>
						<div class="col-xs-4">
							{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_edit_nama_mempelai_wanita', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
					</div>
				</form>
				
				
			</div>
			<div class="modal-footer">
				<!--if($list_pendeta == null || $list_jemaat_pria == null || $list_jemaat_wanita == null)
					<input type="button" id="f_edit_post_pernikahan" class="btn btn-success" value="Simpan Data Pernikahan" disabled=true />
				else					
					<input type="button" id="f_edit_post_pernikahan" class="btn btn-success" value="Simpan Data Pernikahan" data-dismiss="modal" />
				endif	-->
				<input type="button" id="f_edit_post_pernikahan" class="btn btn-success" value="Simpan Data Pernikahan" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery('#f_edit_tanggal_pernikahan').datetimepicker({
		lang:'en',
		i18n:{
			en:{
				months:[
				'Januari','Februari','Maret','April',
				'Mei','Juni','Juli','Agustus',
				'September','Oktober','November','Desember',
				],
				dayOfWeek:[
				"Ming.", "Sen.", "Sel.", "Rab.", 
				"Kam.", "Jum.", "Sab.",
				]

			}
		},
		timepicker:false,
		format: 'Y-m-d',
		yearStart: '1900'
	});
						
	$('body').on('click', '#f_edit_post_pernikahan', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$no_pernikahan = $('#f_edit_nomor_pernikahan').val();		
		$tanggal_pernikahan = $('#f_edit_tanggal_pernikahan').val();
		$id_pendeta = $('#f_edit_id_pendeta').val();
		$keterangan = $('#f_edit_keterangan').val();
		// $id_gereja = $('#f_edit_id_gereja').val();
		if($('#f_edit_check_jemaat_wanita').val() == 1) //pakai nama gereja lain
		{
			$id_mempelai_wanita = '';
			$nama_mempelai_wanita = $('#f_edit_nama_mempelai_wanita').val();
		}
		else
		{
			$id_mempelai_wanita = $('#f_edit_list_jemaat_wanita').val();
			$nama_mempelai_wanita = $('#f_edit_nama_mempelai_wanita').val();
		}
		if($('#f_edit_check_jemaat_pria').val() == 1) //pakai nama gereja lain
		{
			$id_mempelai_pria = '';
			$nama_mempelai_pria = $('#f_edit_nama_mempelai_pria').val();
		}
		else
		{
			$id_mempelai_pria = $('#f_edit_list_jemaat_pria').val();
			$nama_mempelai_pria = $('#f_edit_nama_mempelai_pria').val();
		}
		
		$data = {
			'id' : $id,
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
			type: 'POST',
			url: "{{URL('admin/edit_pernikahan')}}",
			data: {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){				
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_olahdata_pernikahan')}}';
					
					//ganti isi row sesuai hasil edit_pernikahan
					$('.tabel_no_pernikahan'+temp).html(result.data['no_pernikahan']);
					$('.tabel_nama_pria'+temp).html(result.data['nama_pria']);
					$('.tabel_nama_wanita'+temp).html(result.data['nama_wanita']);
					//ganti isi detail sesuai hasil edit
					temp_detail[temp] = result.data;
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil simpan perubahan.");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_pernikahan')}}';
				}
				else
				{
					alert(response);
				}
				*/
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