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
			<td>Nomor Atestasi</td>
			<td>:</td>
			<td>{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi')) }}</td>
		</tr>				
		<tr>
			<td class="">Jemaat</td>
			<td>:</td>
			<td>{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat'))}}</td>
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
			<td>Jenis Atestasi</td>
			<td>:</td>
			<td>{{Form::select('jenis_atestasi', $list_jenis_atestasi, Input::old('pembaptis'), array('id'=>'f_jenis_atestasi'))}}</td>
		</tr>				
		<tr>
			<td>Nama Gereja Lama</td>
			<td>:</td>
			<td>{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama')) }}</td>
		</tr>		
		<tr>
			<td>Nama Gereja Baru</td>
			<td>:</td>
			<td>{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru')) }}</td>
		</tr>		
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_search_atestasi">Cari Data Atestasi</button></td>
		</tr>		
	</table>	
	
	<div id="f_result_atestasi"></div>
</div>	

<script>		
	$('body').on('click', '#f_search_atestasi', function(){
		$no_atestasi = $('#f_nomor_atestasi').val();			
		$nama_jemaat = $('#f_jemaat').val();
		$tanggal_awal = $('#f_tanggal_awal').val();		
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$id_jenis_atestasi = $('#f_jenis_atestasi').val();		
		$nama_gereja_lama = $('#f_nama_gereja_lama').val();		
		$nama_gereja_baru = $('#f_nama_gereja_baru').val();		
					
		$data = {
			'no_atestasi' : $no_atestasi,
			'nama_jemaat' : $nama_jemaat,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'id_jenis_atestasi' : $id_jenis_atestasi,			
			'nama_gereja_lama' : $nama_gereja_lama,			
			'nama_gereja_baru' : $nama_gereja_baru			
		};		
						
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_atestasi')}}",
			data: {
				'data' : $data
			},
			success: function(response){	
				alert("Berhasil cari data atestasi");
				// alert(response);
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['id']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_atestasi').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_atestasi').html("<p>No result</p>");					
				}
				
				// if(response == "berhasil")
				// {	
					// alert("Berhasil search data atestasi");
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