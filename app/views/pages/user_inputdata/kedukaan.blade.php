@extends('layouts.default')
@section('content')

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_sidebar">
	<ul>		
		<li>{{HTML::linkRoute('view_kebaktian', 'Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_anggota', 'Anggota')}}</li>
		<li>{{HTML::linkRoute('view_baptis', 'Baptis')}}</li>
		<li>{{HTML::linkRoute('view_atestasi', 'Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_pernikahan', 'Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_kedukaan', 'Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_dkh', 'Dkh')}}</li>
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
			<td>Tanggal Meninggal</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_meninggal', Input::old('tanggal_meninggal'), array('id' => 'f_tanggal_meninggal')) }}</td>
			<script>
				jQuery('#f_tanggal_meninggal').datetimepicker({
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
				});	
			</script>
		</tr>		
		<tr>
			<td class="">Jemaat yang meninggal</td>
			<td>:</td>
			<td>{{Form::select('list_jemaat', $list_jemaat, Input::old('list_jemaat'), array('id'=>'f_list_jemaat'))}}</td>
		</tr>
		<tr>
			<td class="">Gereja</td>
			<td>:</td>
			<td>{{Form::select('list_gereja', $list_gereja, Input::old('list_gereja'), array('id'=>'f_list_gereja'))}}</td>
		</tr>
		<tr>
			<td class="">Keterangan</td>
			<td>:</td>
			<td>{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan'))}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_kedukaan">Simpan Data Kedukaan</button></td>
		</tr>
	</table>	
</div>	
	
<script>
	$('body').on('click', '#f_post_kedukaan', function(){		
		$no_kedukaan = $('#f_nomor_kedukaan').val();
		$tanggal_meninggal = $('#f_tanggal_meninggal').val();
		$id_jemaat = $('#f_list_jemaat').val();
		$id_gereja = $('#f_list_gereja').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_kedukaan' : $no_kedukaan,
			'id_gereja' : $id_gereja,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan,
			'tanggal_meninggal' : $tanggal_meninggal
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_kedukaan')}}",
			data: {
				'data' : $data
			},
			success: function(response){				
				if(response == true)
				{	
					alert("Berhasil simpan data kedukaan");
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