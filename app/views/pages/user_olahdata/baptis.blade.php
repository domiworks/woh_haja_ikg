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
	
	<div class="s_table_search">
		<table border="0" style="width:100%;">
			<tr>
				<td class="">Nomor Baptis</td>
				<td>:</td>
				<td>{{Form::text('nomor_baptis', Input::old('nomor_baptis'), array('id'=>'f_nomor_baptis'))}} </td>			
			</tr>		
			<tr>
				<td class="">Nama Pembaptis</td>
				<td>:</td>
				<td>{{Form::text('pembaptis', Input::old('pembaptis'), array('id'=>'f_pembaptis'))}}</td>
			</tr>
			<tr>
				<td class="">Nama Jemaat</td>
				<td>:</td>
				<td>{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat'))}}</td>
			</tr>
			<tr>
				<td class="">Jenis Baptis</td>
				<td>:</td>
				<td>{{Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_jenis_baptis'))}}</td>
			</tr>
			<!--
			<tr>
				<td>Dibaptis di Gereja</td>
				<td>:</td>
				<td> Form::select('id_gereja', dollarlist_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) <span class="red">*</span></td>
			</tr>
			-->
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
				<td></td>
				<td></td>
				<td><button id="f_search_baptis">Cari Data Baptis</button></td>
			</tr>
		</table>	
	</div>

	<div id="f_result_baptis"></div>
	
</div>	
	
<script>
	$('body').on('click', '#f_search_baptis', function(){
		$nomor_baptis = $('#f_nomor_baptis').val();
		$nama_pembaptis = $('#f_pembaptis').val();
		$nama_jemaat = $('#f_jemaat').val();
		$jenis_baptis = $('#f_jenis_baptis').val();
		// $gereja = $('#f_id_gereja').val();
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'nama_jemaat' : $nama_jemaat,
			'nama_pembaptis' : $nama_pembaptis,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'id_jenis_baptis' : $jenis_baptis
			// 'id_gereja' : $gereja
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				// alert(response);
				
				alert("Berhasil cari data baptis");				
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['no_baptis']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_baptis').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_baptis').html("<p>No result</p>");					
				}
				
				// alert(JSON.stringify(response));
				/*
				var temp;				
				if(response.length > 0)
				{
					alert(response.length);
					for($i = 0 ; $i < response.length ; $i++)
					{
						// temp += response[$i]['no_baptis']+",";
						alert(response[$i]['no_baptis']);
					}
					// alert(temp);
				}
				else
				{
					alert(response);
				}
				*/
				// if(response == "berhasil")
				// {	
					// alert("Berhasil simpan data baptis");
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