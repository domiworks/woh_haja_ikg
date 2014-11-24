@extends('layouts.default')
@section('content')

<script>	
	$(document).ready(function(){						
		$('#f_nama_mempelai_wanita').attr('disabled', true);		
		$('#f_list_jemaat_wanita').attr('disabled', false);				
		
		$('#f_nama_mempelai_pria').attr('disabled', true);		
		$('#f_list_jemaat_pria').attr('disabled', false);
		
		//set nama mempelai
		var selected = $('#f_list_jemaat_wanita').find(":selected").text();
		$('#f_nama_mempelai_wanita').val(selected);	
		
		selected = $('#f_list_jemaat_pria').find(":selected").text();
		$('#f_nama_mempelai_pria').val(selected);	
	});
	
	$('body').on('click', '#f_check_jemaat_wanita', function(){		
		if($('#f_check_jemaat_wanita').val() == 0){	
			$('#f_check_jemaat_wanita').val(1); //pakai pembicara luar jika value f_check_jemaat_wanita == 1
			$('#f_nama_mempelai_wanita').attr('disabled', false);			
			$('#f_nama_mempelai_wanita').val("");
			$('#f_list_jemaat_wanita').attr('disabled', true);								
		}
		else
		{
			$('#f_check_jemaat_wanita').val(0); //tidak pakai pembicara luar jika value f_check_jemaat_wanita == 0
			$('#f_nama_mempelai_wanita').attr('disabled', true);	
			// $('#f_nama_pengkotbah').val("");
			selected = $('#f_list_jemaat_wanita').find(":selected").text();
			$('#f_nama_mempelai_wanita').val(selected);	
			$('#f_list_jemaat_wanita').attr('disabled', false);				
		}
	});
	
	$('body').on('click', '#f_check_jemaat_pria', function(){		
		if($('#f_check_jemaat_pria').val() == 0){	
			$('#f_check_jemaat_pria').val(1); //pakai pembicara luar jika value f_check_jemaat_pria == 1
			$('#f_nama_mempelai_pria').attr('disabled', false);			
			$('#f_nama_mempelai_pria').val("");
			$('#f_list_jemaat_pria').attr('disabled', true);								
		}
		else
		{
			$('#f_check_jemaat_pria').val(0); //tidak pakai pembicara luar jika value f_check_jemaat_pria == 0
			$('#f_nama_mempelai_pria').attr('disabled', true);	
			selected = $('#f_list_jemaat_pria').find(":selected").text();
			$('#f_nama_mempelai_pria').val(selected);
			$('#f_list_jemaat_pria').attr('disabled', false);				
		}
	});	
</script>

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
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
	</ul>
</div>

<div class="s_content">
	<table border="0" style="width:100%;">
		<tr>
			<td>Nomor Pernikahan</td>
			<td>:</td>
			<td>{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan')) }}</td>
		</tr>
		<tr>
			<td>Tanggal Pernikahan</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_pernikahan', Input::old('tanggal_pernikahan'), array('id' => 'f_tanggal_pernikahan')) }}</td>
			<script>
				jQuery('#f_tanggal_pernikahan').datetimepicker({
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
			<td>Pendeta yang memberkati</td>
			<td>:</td>
			<td>{{Form::select('id_pendeta', $list_pendeta, Input::old('id_pendeta'), array('id'=>'f_id_pendeta'))}}</td>
		</tr>
		<tr>
			<td>Gereja tempat diberkati</td>
			<td>:</td>
			<td>{{ Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) }}</td>
		</tr>
		<tr>
			<td>Jemaat Wanita</td>
			<td>:</td>
			<td>
				{{Form::select('list_jemaat_wanita', $list_jemaat_wanita, Input::old('list_jemaat_wanita'), array('id'=>'f_list_jemaat_wanita'))}}
				<input id="f_check_jemaat_wanita" type="checkbox" name="jemaat_wanita" value="0" /> Non-GKI				
			</td>
			<script>
				$('body').on('change','#f_list_jemaat_wanita', function(){
					var selected = $('#f_list_jemaat_wanita').find(":selected").text();
					$('#f_nama_mempelai_wanita').val(selected);					
				});
			</script>
		</tr>
		<tr>
			<td>Nama Mempelai Wanita</td>
			<td>:</td>
			<td>{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita')) }}</td>
		</tr>
		<tr>
			<td>Jemaat Pria</td>
			<td>:</td>
			<td>
				{{Form::select('list_jemaat_pria', $list_jemaat_pria, Input::old('list_jemaat_pria'), array('id'=>'f_list_jemaat_pria'))}}
				<input id="f_check_jemaat_pria" type="checkbox" name="jemaat_pria" value="0" /> Non-GKI				
			</td>
			<script>
				$('body').on('change','#f_list_jemaat_pria', function(){
					var selected = $('#f_list_jemaat_pria').find(":selected").text();
					$('#f_nama_mempelai_pria').val(selected);					
				});
			</script>
		</tr>
		<tr>
			<td>Nama Mempelai Pria</td>
			<td>:</td>
			<td>{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria')) }}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_pernikahan">Simpan Data Pernikahan</button></td>
		</tr>
	</table>	
</div>	
	
<script>
	$('body').on('click', '#f_post_pernikahan', function(){
		$no_pernikahan = $('#f_nomor_pernikahan').val();		
		$tanggal_pernikahan = $('#f_tanggal_pernikahan').val();
		$id_pendeta = $('#f_id_pendeta').val();
		$id_gereja = $('#f_id_gereja').val();
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
			'id_gereja' : $id_gereja,			
			'id_jemaat_pria' : $id_mempelai_pria,
			'id_jemaat_wanita' : $id_mempelai_wanita,
			'nama_pria' : $nama_mempelai_pria,
			'nama_wanita' : $nama_mempelai_wanita
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_pernikahan')}}",
			data: {
				'data' : $data
			},
			success: function(response){				
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data pernikahan");
					location.reload();
				}
				else
				{
					alert(response);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
		
	});
</script>
	
@stop