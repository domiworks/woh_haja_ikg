@extends('layouts.default')
@section('content')

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_sidebar">
	<!-- input data-->
	<ul>		
		<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
	</ul>
	
	<!-- olahdata -->
	<ul>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
	</ul>
</div>

<div class="s_content">
	<table border="0" style="width:100%;">		
		<tr> <!-- waktu masukin input nomor anggota boleh kosong, karena kemungkinan 
			blom dapet nomor anggotanya -->
			<td>Nomor anggota</td>
			<td>:</td>
			<td>{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_nomor_anggota')) }}</td>
		</tr>	
		<tr>
			<td>Nama depan</td>
			<td>:</td>
			<td>{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_nama_depan')) }} <span class="red">*</span></td>
		</tr>				
		<tr>
			<td>Nama tengah</td>
			<td>:</td>
			<td>{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_nama_tengah')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Nama belakang</td>
			<td>:</td>
			<td>{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_nama_belakang')) }} <span class="red">*</span></td>
		</tr>			
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>{{ Form::textarea('alamat', Input::old('alamat'), array('id' => 'f_alamat')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td>:</td>
			<td>{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kodepos</td>
			<td>:</td>
			<td>{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_kodepos', 'onkeypress'=>'return isNumberKey(event)')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td>{{ Form::text('telp', Input::old('telp'), array('id' => 'f_telp', 'onkeypress'=>'return isNumberKey(event)')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td style="vertical-align:top;">Hp</td>
			<td style="vertical-align:top;">:</td>
			<td>				
				<input type="text" id="f_hp1" name="hp1" onkeypress='return isNumberKey(event)'/>			
					<div id="addHp"></div>					
					<a href="javascript:void(0)" onClick="addHp();" id="refHp">tambah nomor hp</a>
					<script>						
						var lastIdx = 2;
						function addHp(){
							if(lastIdx <=5)
							{
								var newRow = "";							
								newRow +="<input type='text' id='f_hp"+lastIdx+"' name='hp"+lastIdx+"' onkeypress='return isNumberKey(event)'/>";
								newRow +="<input type='button' value='X' id='delHp"+lastIdx+"' onClick='delHp()' /><br />";
								$('#delHp'+(lastIdx-1)).hide();
								$('#addHp').append(newRow);
								if(lastIdx==5){
									$('#refHp').hide();									
								}
								lastIdx++;							
							}						
						}
						function delHp()
						{
							$('#f_hp'+(lastIdx-1)).remove();
							$('#delHp'+(lastIdx-1)).remove();
							lastIdx--;							
							$('#delHp'+(lastIdx-1)).show();
							if(lastIdx==5){
								$('#refHp').show();
							}
						}
					</script>
			</td>
		</tr>
		<tr>		
			<td>Jenis kelamin</td>
			<td>:</td>
			<td>{{ Form::radio('gender', '1', true, array('id'=>'f_jenis_kelamin')) }}pria    {{ Form::radio('gender', '0', '', array('id'=>'f_jenis_kelamin')) }}wanita <span class="red">*</span></td>
		</tr>		
		<tr>
			<td>Wilayah</td>
			<td>:</td>
			<td>{{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_wilayah')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Golongan darah</td>
			<td>:</td>
			<td>{{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_gol_darah')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Pendidikan </td>
			<td>:</td>
			<td>{{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_pendidikan')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>:</td>
			<td>{{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_pekerjaan')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Etnis</td>
			<td>:</td>
			<td>{{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_etnis')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kota lahir</td>
			<td>:</td>
			<td>{{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_kota_lahir')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Tanggal lahir</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_tanggal_lahir')) }} <span class="red">*</span></td>			
			<script>
				jQuery('#f_tanggal_lahir').datetimepicker({
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
			</script>
		</tr>		
		<tr>
			<td>Anggota gereja</td>
			<td>:</td>
			<td>{{ Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>:</td>
			<td>
				<img src="" id="show_foto" width="200" height="200">				
				{{ Form::file('foto', array('name' => 'foto', 'id' => 'f_foto', 'accept' => 'image/*')) }}
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td>{{ Form::select('status', $list_role, Input::old('status'), array('id' => 'f_status')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_anggota">Simpan Data Anggota</button></td>
		</tr>
	</table>	
</div>	

<script>
	$('body').on('change','#f_foto',function(){
		var i = 0, len = this.files.length, img, reader, file;			
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 										
						$('#show_foto').attr('src', e.target.result);																	
					};
					reader.readAsDataURL(file);
				}
				imageUpload = file;
			}	
		}
	});
	
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	$('body').on('click', '#f_post_anggota', function(){								
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
		$anggota_gereja = $('#f_id_gereja').val();
			data.append('id_gereja', $anggota_gereja);
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
				alert(response);
				// if(response == true)
				// {	
					// alert("Berhasil simpan data anggota");
				// }
				// else
				// {
					// alert(response);
				// }
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
		
	});
</script>
	
@stop