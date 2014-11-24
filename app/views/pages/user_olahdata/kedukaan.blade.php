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
			<td>Nomor Kedukaan</td>
			<td>:</td>
			<td>{{ Form::text('nomor_kedukaan', Input::old('nomor_kedukaan'), array('id' => 'f_nomor_kedukaan')) }}</td>
		</tr>
		<tr>
			<td class="">Antara tanggal </td>
			<td>:</td>
			<td>
				{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal')) }} - 
				{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir')) }}
			</td>
			<script>
				jQuery('#f_tanggal_awal').datetimepicker({
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
				jQuery('#f_tanggal_akhir').datetimepicker({
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
			<td class="">Nama jemaat yang meninggal</td>
			<td>:</td>
			<td>{{Form::text('nama_jemaat', Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat'))}}</td>
		</tr>
		<!--
		<tr>
			<td class="">Gereja</td>
			<td>:</td>
			<td>Form::select('list_gereja', dollarlist_gereja, Input::old('list_gereja'), array('id'=>'f_list_gereja'))</td>
		</tr>
		-->		
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_search_kedukaan">Cari Data Kedukaan</button></td>
		</tr>
	</table>

	<div id="f_result_kedukaan"></div>
</div>	
	
<script>
	$('body').on('click', '#f_search_kedukaan', function(){		
		$no_kedukaan = $('#f_nomor_kedukaan').val();
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$nama_jemaat = $('#f_nama_jemaat').val();
		// $id_gereja = $('#f_list_gereja').val();		
		
		$data = {
			'no_kedukaan' : $no_kedukaan,
			// 'id_gereja' : $id_gereja,
			'nama_jemaat' : $nama_jemaat,			
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_kedukaan')}}",
			data: {
				'data' : $data
			},
			success: function(response){					
				alert("Berhasil cari data kedukaan");				
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['no_kedukaan']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_kedukaan').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_kedukaan').html("<p>No result</p>");					
				}
				/*
				if(response == "berhasil")
				{	
					// alert("Berhasil simpan data kedukaan");
					// location.reload();
				}
				else
				{
					alert(response);
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
</script>
	
@stop