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
	
	<div class="s_table_search">
		<table border="0" style="width:100%;">		
			<tr> <!-- waktu masukin input nomor anggota boleh kosong, karena kemungkinan 
				blom dapet nomor anggotanya -->
				<td>Nomor anggota</td>
				<td>:</td>
				<td>{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_nomor_anggota')) }}</td>
			</tr>	
			<tr>
				<td>Nama</td>
				<td>:</td>
			<td>{{ Form::text('nama', Input::old('nama'), array('id' => 'f_nama')) }} <span class="red">*</span></td>
			</tr>							
			<tr>
				<td>Kota</td>
				<td>:</td>
				<td>{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota')) }} <span class="red">*</span></td>
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
				<td>Status</td>
				<td>:</td>
				<td>{{ Form::select('status', $list_role, Input::old('status'), array('id' => 'f_status')) }}<span class="red">*</span></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button id="f_search_anggota">Cari Anggota</button></td>
			</tr>
		</table>		
	</div>	
	
	<div class="s_table_result_search">
	
	</div>
		
</div>	

<script>		
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	$('body').on('click', '#f_search_anggota', function(){										
		var data, xhr;
		data = new FormData();
			
		$nomor_anggota = $('#f_nomor_anggota').val();			
			data.append('no_anggota', $nomor_anggota);		
		$nama = $('#f_nama').val();	
			data.append('nama', $nama);				
		$kota = $('#f_kota').val();
			data.append('kota', $kota);		
		$gender = $('input[name="gender"]:checked').val()	
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
		$tanggal_lahir = $('#f_tanggal_lahir').val();	
			data.append('tanggal_lahir', $tanggal_lahir);
		$anggota_gereja = $('#f_id_gereja').val();
			data.append('id_gereja', $anggota_gereja);		
		$role = $('#f_status').val();
			data.append('role', $role);	
			
				
		$.ajax({
			type: 'GET',
			url: "{{URL('user/search_anggota')}}",
			data : data,
			processData: false,
			contentType: false,	
			success: function(response){		
				alert(response);
				// alert(JSON.stringify(response));
				// alert(response.length);
				
				// var temp;
				// if(response.length > 0)
				// {
					// for($i = 0 ; $i < response.length ; $i++)
					// {
						// temp += response[$i]['nama_depan']+",";
					// }
					// alert(temp);
				// }
				// else
				// {
					// alert(response);
				// }
				
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