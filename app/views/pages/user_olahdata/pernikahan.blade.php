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
			<td>Nomor Pernikahan</td>
			<td>:</td>
			<td>{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan')) }}</td>
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
			<td>Pendeta yang memberkati</td>
			<td>:</td>
			<td>{{Form::text('nama_pendeta', Input::old('nama_pendeta'), array('id'=>'f_nama_pendeta'))}}</td>
		</tr>
		<!--
		<tr>
			<td>Gereja tempat diberkati</td>
			<td>:</td>
			<td> Form::select('id_gereja', dollarlist_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) </td>
		</tr>		
		-->
		<tr>
			<td>Nama Mempelai Wanita</td>
			<td>:</td>
			<td>{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita')) }}</td>
		</tr>		
		<tr>
			<td>Nama Mempelai Pria</td>
			<td>:</td>
			<td>{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria')) }}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_search_pernikahan">Cari Data Pernikahan</button></td>
		</tr>
	</table>

	<div id="f_result_pernikahan"></div>
</div>	
	
<script>
	$('body').on('click', '#f_search_pernikahan', function(){
		$no_pernikahan = $('#f_nomor_pernikahan').val();		
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$nama_pendeta = $('#f_nama_pendeta').val();
		// $id_gereja = $('#f_id_gereja').val();
		$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
		$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();		
		
		$data = {
			'no_pernikahan' : $no_pernikahan,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'nama_pendeta' : $nama_pendeta,
			// 'id_gereja' : $id_gereja,
			'nama_pria' : $nama_mempelai_pria,
			'nama_wanita' : $nama_mempelai_wanita
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_pernikahan')}}",
			data: {
				'data' : $data
			},
			success: function(response){
				alert("Berhasil cari data pernikahan");				
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['no_pernikahan']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_pernikahan').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_pernikahan').html("<p>No result</p>");					
				}
				
				// alert(JSON.stringify(response));
				// if(response == "berhasil")
				// {	
					// alert("Berhasil simpan data pernikahan");
					// location.reload();
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