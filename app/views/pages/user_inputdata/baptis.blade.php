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
			<td class="">Nomor Baptis</td>
			<td>:</td>
			<td>{{Form::text('nomor_baptis', Input::old('nomor_baptis'), array('id'=>'f_nomor_baptis'))}} </td>			
		</tr>
		
		<tr>
			<td class="">Pembaptis</td>
			<td>:</td>
			<td>{{Form::select('pembaptis', $list_pembaptis, Input::old('pembaptis'), array('id'=>'f_pembaptis'))}}</td>
		</tr>
		<tr>
			<td class="">Jemaat</td>
			<td>:</td>
			<td>{{Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_jemaat'))}}</td>
		</tr>
		<tr>
			<td class="">Jenis Baptis</td>
			<td>:</td>
			<td>{{Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_jenis_baptis'))}}</td>
		</tr>
		<tr>
			<td>Dibaptis di Gereja</td>
			<td>:</td>
			<td>{{ Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) }}<span class="red">*</span></td>
		</tr>
		<tr>
			<td class="">Tanggal Baptis</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_baptis', Input::old('tanggal_baptis'), array('id' => 'f_tanggal_baptis')) }}</td>
			<script>
				jQuery('#f_tanggal_baptis').datetimepicker({
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
			<td><button id="f_post_baptis">Simpan Data Baptis</button></td>
		</tr>
	</table>	
</div>	
	
<script>
	$('body').on('click', '#f_post_baptis', function(){
		$nomor_baptis = $('#f_nomor_baptis').val();
		$pembaptis = $('#f_pembaptis').val();
		$jemaat = $('#f_jemaat').val();
		$jenis_baptis = $('#f_jenis_baptis').val();
		$gereja = $('#f_id_gereja').val();
		$tanggal_baptis = $('#f_tanggal_baptis').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'id_jemaat' : $jemaat,
			'id_pendeta' : $pembaptis,
			'tanggal_baptis' : $tanggal_baptis,
			'id_jenis_baptis' : $jenis_baptis,
			'id_gereja' : $gereja
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				if(response == true)
				{	
					alert("Berhasil simpan data baptis");
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