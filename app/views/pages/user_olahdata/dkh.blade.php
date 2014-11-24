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
			<td class="">Nomor Dkh</td>
			<td>:</td>
			<td>{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh'))}}</td>			
		</tr>
		<tr>
			<td class="">Nama Jemaat</td>
			<td>:</td>
			<td>{{Form::text('nama_jemaat', Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat'))}}</td>
		</tr>				
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_search_dkh">Cari Data Dkh</button></td>
		</tr>
	</table>	
	
	<div id="f_result_dkh"></div>
</div>	
	
<script>
	$('body').on('click', '#f_search_dkh', function(){
		$no_dkh = $('#f_nomor_dkh').val();
		$nama_jemaat = $('#f_nama_jemaat').val();		
		
		$data = {
			'no_dkh' : $no_dkh,
			'nama_jemaat' : $nama_jemaat			
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_dkh')}}",
			data: {
				'data' : $data
			},
			success: function(response){	
				alert("Berhasil cari data dkh");				
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['no_dkh']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_dkh').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_dkh').html("<p>No result</p>");					
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