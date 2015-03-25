<div class="modal fade popup_edit_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Keanggotaan</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">	
					<div class="form-group">

						<label class="col-xs-4 control-label">
							Nomor anggota
						</label>

						<div class="col-xs-3">
							{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_edit_nomor_anggota', 'class'=>'form-control', 'disabled'=>'true')) }}
						</div>
					</div>	
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama depan
						</label>

						<div class="col-xs-4">
							{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_edit_nama_depan', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-0">
							*
						</div>
						<!--<div class="col-xs-0">
							<span class="red">*</span>
						</div>	-->
					</div>				
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama tengah
						</label>

						<div class="col-xs-4">
							{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_edit_nama_tengah', 'class'=>'form-control')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama belakang
						</label>
						
						<div class="col-xs-4">
							{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_edit_nama_belakang', 'class'=>'form-control')) }} 
						</div>
													
					</div>			
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Alamat
						</label>

						<div class="col-xs-6">
							{{ Form::textarea('alamat', Input::old('alamat'), array('id' => 'f_edit_alamat', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kota
						</label>

						<div class="col-xs-3">
							{{ Form::text('kota', Input::old('kota'), array('id' => 'f_edit_kota', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-0">
							*
						</div>							
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kodepos
						</label>

						<div class="col-xs-2">
							{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_edit_kodepos', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Telepon
						</label>

						<div class="col-xs-2">
							{{ Form::text('telp', Input::old('telp'), array('id' => 'f_edit_telp', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
						</div>
						<div class="col-xs-0">
							*
						</div>						
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Hp
						</label>
						<div class="col-xs-6">			
							<!--<input type="text" id="f_edit_hp1" class="form-control" name="hp1" onkeypress='return isNumberKey(event)'/>			
							<div id="edit_addHp"></div>					
							<a href="javascript:void(0)" onClick="addHp();" id="edit_refHp">tambah nomor hp</a>-->
							
							<input style="width:200px;" type="text" id="f_edit_hp1" class="form-control" name="hp1" onkeypress='return isNumberKey(event)'/>			
							<div id="edit_addHp" style="margin-top:10px;" ></div>														
							<a href="javascript:void(0)" onClick="addHp();" id="edit_refHp" >tambah nomor hp</a>									
						</div>
					</div>
					<div class="form-group">		
						<label class="col-xs-4 control-label">
							Jenis kelamin
						</label>

						<div class="col-xs-2">
							{{ Form::radio('edit_gender', '1', true, array('id'=>'f_edit_jenis_kelamin_1')) }}pria    {{ Form::radio('edit_gender', '0', '', array('id'=>'f_edit_jenis_kelamin_0')) }}wanita 
						</div>						
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Wilayah
						</label>

						<div class="col-xs-2">
							@if($list_wilayah == null)
								<p class="control-label pull-left">(tidak ada daftar wilayah)</p>
							@else
								{{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_edit_wilayah', 'class'=>'form-control')) }}
							@endif
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Golongan darah
						</label>

						<div class="col-xs-2">
							@if($list_gol_darah == null)
								<p class="control-label pull-left">(tidak ada daftar golongan darah)</p>
							@else
								{{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_edit_gol_darah', 'class'=>'form-control')) }}
							@endif
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pendidikan 
						</label>

						<div class="col-xs-2">
							@if($list_pendidikan == null)
								<p class="control-label pull-left">(tidak ada daftar pendidikan)</p>
							@else
								{{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_edit_pendidikan', 'class'=>'form-control')) }}
							@endif
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pekerjaan
						</label>

						<div class="col-xs-2">
							@if($list_pekerjaan == null)
								<p class="control-label pull-left">(tidak ada daftar pekerjaan)</p>
							@else
								{{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_edit_pekerjaan', 'class'=>'form-control')) }}
							@endif
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Etnis
						</label>

						<div class="col-xs-2">
							@if($list_etnis == null)
								<p class="control-label pull-left">(tidak ada daftar etnis)</p>
							@else
								{{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_edit_etnis', 'class'=>'form-control')) }}
							@endif
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kota lahir
						</label>

						<div class="col-xs-3">
							{{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_edit_kota_lahir', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal lahir
						</label>

						<div class="col-xs-2">
							{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_edit_tanggal_lahir', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
						
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Status Anggota
						</label>

						<div class="col-xs-2">
							<select id="f_edit_status_anggota">
								<option value="0">(belum anggota)</option>
								<option value="1">Baptis</option>
								<option value="2">Sidi</option>
							</select>
						</div>						
					</div>					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Foto
						</label>

						<div class="col-xs-6">
							<img src="" id="edit_show_foto" width="200" height="200">				
							{{ Form::file('foto', array('name' => 'foto', 'id' => 'f_edit_foto', 'accept' => 'image/*')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Status
						</label>

						<div class="col-xs-2">
							@if($list_role == null)
								<p class="control-label pull-left">(tidak ada daftar role)</p>
							@else
								{{ Form::select('status', $list_role, Input::old('status'), array('id' => 'f_edit_status', 'class'=>'form-control')) }}
							@endif
						</div>						
					</div>										
				</form>
			</div>
			<div class="modal-footer">
				@if($list_wilayah == null || $list_gol_darah == null || $list_pendidikan == null || $list_pekerjaan == null || $list_etnis == null || $list_role == null)
					<input type="button" id="f_edit_post_anggota" class="btn btn-success" value="Simpan Perubahan" disabled=true />
				@else
					<input type="button" id="f_edit_post_anggota" class="btn btn-success" value="Simpan Perubahan" />
				@endif
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
// var lastIdx = 2; //variable nya dipindah ke file olah_data-anggota_domi
	function addHp(){
		if(lastIdx <=5)
		{
			var newRow = "";							
			newRow +="<input style='width:200px; margin-top:10px;' type='text' id='f_edit_hp"+lastIdx+"' class='form-control' name='hp"+lastIdx+"' onkeypress='return isNumberKey(event)'/>";
			newRow +="<input type='button' value='X' id='delHp"+lastIdx+"' onClick='delHp()' />";
			$('#delHp'+(lastIdx-1)).hide();
			$('#edit_addHp').append(newRow);
			if(lastIdx==5){
				$('#edit_refHp').hide();									
			}
			lastIdx++;							
		}						
	}
	function delHp()
	{
		$('#f_edit_hp'+(lastIdx-1)).remove();
		$('#delHp'+(lastIdx-1)).remove();
		lastIdx--;							
		$('#delHp'+(lastIdx-1)).show();
		if(lastIdx==5){
			$('#edit_refHp').show();
		}
	}
	
	jQuery('#f_edit_tanggal_lahir').datetimepicker({
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

	$('body').on('change','#f_edit_foto',function(){
		var i = 0, len = this.files.length, img, reader, file;			
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 										
						$('#edit_show_foto').attr('src', e.target.result);																	
					};
					reader.readAsDataURL(file);
				}
				imageUpload = file;
			}	
		}
	});
	
	$('body').on('click', '#f_edit_post_anggota', function(){	

		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		//add id
		data.append('id', $id); //id anggota
		
		$nomor_anggota = $('#f_edit_nomor_anggota').val();			
		data.append('no_anggota', $nomor_anggota);
		$nama_depan = $('#f_edit_nama_depan').val();	
		data.append('nama_depan', $nama_depan);
		$nama_tengah = $('#f_edit_nama_tengah').val();	
		data.append('nama_tengah', $nama_tengah);
		$nama_belakang = $('#f_edit_nama_belakang').val();	
		data.append('nama_belakang', $nama_belakang);
		$jalan = $('#f_edit_alamat').val();
		data.append('jalan', $jalan);
		$kota = $('#f_edit_kota').val();
		data.append('kota', $kota);
		$kodepos = $('#f_edit_kodepos').val();
		data.append('kodepos', $kodepos);
		$telp = $('#f_edit_telp').val();	
		data.append('telp', $telp);		
		//looping ambil data hp
		var arr_hp = new Array();
		for($i = 1; $i < lastIdx; $i++)
		{
			arr_hp[arr_hp.length] = $('#f_edit_hp'+$i+'').val();			
		}
		// data.append('arr_hp', arr_hp);									
		if(arr_hp.length == 1 && $('#f_edit_hp1').val() == "")
		{
			data.append('arr_hp', "kosong");
		}
		else
		{
			data.append('arr_hp', arr_hp);
		}
		$gender = $('input[name="edit_gender"]:checked').val();	
		data.append('gender', $gender);
		$wilayah = $('#f_edit_wilayah').val();	
		data.append('wilayah', $wilayah);
		$gol_darah = $('#f_edit_gol_darah').val();
		data.append('gol_darah', $gol_darah);
		$pendidikan = $('#f_edit_pendidikan').val();	
		data.append('pendidikan', $pendidikan);
		$pekerjaan = $('#f_edit_pekerjaan').val();	
		data.append('pekerjaan', $pekerjaan);
		$etnis = $('#f_edit_etnis').val();	
		data.append('etnis', $etnis);
		$kota_lahir	= $('#f_edit_kota_lahir').val();
		data.append('kota_lahir', $kota_lahir);
		$tanggal_lahir = $('#f_edit_tanggal_lahir').val();	
		data.append('tanggal_lahir', $tanggal_lahir);
		$status_anggota = $('#f_edit_status_anggota').val();
		data.append('status_anggota', $status_anggota);
		// $anggota_gereja = $('#f_id_gereja').val();
			// data.append('id_gereja', $anggota_gereja);
			if($('#f_edit_foto').val() != "")
			{			
				$foto = $('#f_edit_foto')[0].files[0];
			}		
			else		
			{
				$foto = "";
			}
			data.append('foto', $foto);
			$role = $('#f_edit_status').val();
			data.append('role', $role);						

		$.ajax({
			type: 'POST',
			url: "{{URL('user/edit_anggota')}}",
			data : data,
			processData: false,
			contentType: false,	
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==200)
				{				
					alert(result.messages);
					// alert(JSON.stringify(result.data));
					// window.location = '{{URL::route('view_olahdata_anggota')}}';
					
					//ganti isi row sesuai hasil edit_anggota
					$('.tabel_no_anggota'+temp).html(result.data['no_anggota']);
					$('.tabel_nama_anggota'+temp).html(result.data['nama_depan']+' '+result.data['nama_tengah']+' '+result.data['nama_belakang']);
					//set status
					if(result.data['role'] == 1)
					{
						$('.tabel_status'+temp).html('jemaat');
					}
					else if(temp_detail[$i]['role'] == 2)
					{
						$('.tabel_status'+temp).html('pendeta');
					}
					else if(temp_detail[$i]['role'] == 3)
					{
						$('.tabel_status'+temp).html('penatua');
					}
					else if(temp_detail[$i]['role'] == 4)
					{
						$('.tabel_status'+temp).html('majelis');
					}
					
					//ganti isi detail sesuai hasil edit
					temp_detail[temp] = result.data;

					//close popup
					$('#popup_edit_anggota').modal('toggle');
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);

					//show red background validation
					if($nama_depan == ""){$('#f_edit_nama_depan').css('background-color','#FBE3E4');}else{$('#f_edit_nama_depan').css('background-color','#FFFFFF');}
					if($jalan == ""){$('#f_edit_alamat').css('background-color','#FBE3E4');}else{$('#f_edit_alamat').css('background-color','#FFFFFF');}
					if($kota == ""){$('#f_edit_kota').css('background-color','#FBE3E4');}else{$('#f_edit_kota').css('background-color','#FFFFFF');}
					if($telp == ""){$('#f_edit_telp').css('background-color','#FBE3E4');}else{$('#f_edit_telp').css('background-color','#FFFFFF');}
					if($gol_darah == ""){$('#f_edit_gol_darah').css('background-color','#FBE3E4');}else{$('#f_edit_gol_darah').css('background-color','#FFFFFF');}
					if($pekerjaan == ""){$('#f_edit_pekerjaan').css('background-color','#FBE3E4');}else{$('#f_edit_pekerjaan').css('background-color','#FFFFFF');}
					if($kota_lahir == ""){$('#f_edit_kota_lahir').css('background-color','#FBE3E4');}else{$('#f_edit_kota_lahir').css('background-color','#FFFFFF');}
					if($tanggal_lahir == ""){$('#f_edit_tanggal_lahir').css('background-color','#FBE3E4');}else{$('#f_edit_tanggal_lahir').css('background-color','#FFFFFF');}					

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