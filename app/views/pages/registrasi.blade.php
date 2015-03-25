<!-- 
	THIS VIEW TEMPORARY UNUSED 
									-->

@extends('layouts.default')
@section('content')
	
<div class="s_menubar">
	{{HTML::linkRoute('profile', 'Profile')}}
</div>

<div class="s_sidebar">
	<ul>
		<li>{{HTML::linkRoute('jemaat','Jemaat')}}</li>
		<li><!-- kebaktian --></li>
		<li><!-- baptis --></li>
		<li><!-- atestasi --></li>
		<li><!-- pernikahan --></li>
		<li><!-- kedukaan --></li>
		<li><!-- dkh --></li>
	</ul>
</div>

<div class="s_content">
	<!-- form registrasi -> redirect to /regis -->		
	{{ Form::open(array('url' => '/regis')) }}		
	<table border="0">		
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>{{ Form::text('username', Input::old('username'), array('id' => 'f_input_username')) }} <span class="red">*</span></td>			
			<script>
				
			</script>	
		</tr>	
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>{{ Form::password('password',array('id' => 'input_password'), Input::old('password')) }} <span class="red">*</span></td>			
		</tr>
		<tr> <!-- waktu masukin input nomor anggota boleh kosong, karena kemungkinan 
			blom dapet nomor anggotanya -->
			<td>Nomor anggota</td>
			<td>:</td>
			<td>{{ Form::text('no_jemaat', Input::old('no_jemaat'), array('id' => 'f_input_no_jemaat')) }}</td>
		</tr>	
		<tr>
			<td>Nama depan</td>
			<td>:</td>
			<td>{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_input_nama_depan')) }} <span class="red">*</span></td>
		</tr>				
		<tr>
			<td>Nama tengah</td>
			<td>:</td>
			<td>{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_input_nama_tengah')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Nama belakang</td>
			<td>:</td>
			<td>{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_input_nama_belakang')) }} <span class="red">*</span></td>
		</tr>			
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>{{ Form::text('alamat', Input::old('alamat'), array('id' => 'f_input_alamat')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td>:</td>
			<td>{{ Form::text('kota', Input::old('kota'), array('id' => 'f_input_kota')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kodepos</td>
			<td>:</td>
			<td>{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_input_kodepos')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td>{{ Form::text('telp', Input::old('telp'), array('id' => 'f_input_telp')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td style="vertical-align:top;">Hp</td>
			<td style="vertical-align:top;">:</td>
			<td>				
				<input type="text" id="f_input_hp1" name="hp1" />			
				<div id="addHp"></div>
				<br/>
				<a href="javascript:void(0)" onClick="addHp();" id="refHp">tambah nomor hp</a>
				<script>
					var lastIdx = 2;
					function addHp(){
						if(lastIdx <=5)
						{
							var newRow = "";							
							newRow +="<input type='text' id='f_input_hp"+lastIdx+"' name='hp"+lastIdx+"' />";
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
						$('#f_input_hp'+(lastIdx-1)).remove();
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
			<td>{{ Form::radio('gender', '1') }}pria    {{ Form::radio('gender', '0') }}wanita <span class="red">*</span></td>
		</tr>		
		<tr>
			<td>Wilayah</td>
			<td>:</td>
			<td>{{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_input_wilayah')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Golongan darah</td>
			<td>:</td>
			<td>{{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_input_gol_darah')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Pendidikan </td>
			<td>:</td>
			<td>{{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_input_pendidikan')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>:</td>
			<td>{{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_input_pekerjaan')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Etnis</td>
			<td>:</td>
			<td>{{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_input_etnis')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td>Kota lahir</td>
			<td>:</td>
			<td>{{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_input_kota_lahir')) }} <span class="red">*</span></td>
		</tr>
		<tr>
			<td>Tanggal lahir</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_input_tanggal_lahir')) }} <span class="red">*</span></td>			
			<script>
				jQuery('#f_input_tanggal_lahir').datetimepicker({
					lang:'en',
					i18n:{
						en:{
							months:[
							'January','February','March','April',
							'May','June','July','August',
							'September','October','November','December',
							],
							dayOfWeek:[
							"Sun.", "Mon", "Tue", "Wed", 
							"Thu", "Fri", "Sa.",
							]
							
						}
						},
					timepicker:false,
					format:'d.m.Y',
					yearStart: '1900'
				});
			</script>
		</tr>		
		<tr>
			<td>Anggota gereja</td>
			<td>:</td>
			<td>{{ Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_input_id_gereja')) }}<span class="red">*</span></td>
		</tr>		
	</table>	
	{{ Form::submit('Daftar') }} {{ Form::reset('Clear') }}
	{{ Form::token() }}
	{{ Form::close() }}
</div>

	<script>		
	/*
		//jquery blom import di header sama blom di add ke folder js
		jQuery('#input_tanggal_lahir').datetimepicker({
			lang:'en',
			i18n:{
				en:{
					months:[
					'January','February','March','April',
					'May','June','July','August',
					'September','October','November','December',
					],
					dayOfWeek:[
					"Sun.", "Mon", "Tue", "Wed", 
					"Thu", "Fri", "Sa.",
					]
					
				}
				},
			timepicker:false,
			format:'d.m.Y',
			yearStart: '1900'
		});
		
		//form validator
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$("form").validate({
			rules: {
				username: {
					required: true
				},
				//...
			},
			messages: {
				username: {
					required: "Mohon isi username Anda"
				},
				//...
			},
			submitHandler: function(form){
				form.submit();
			}
		});*/
	</script>
	
@stop