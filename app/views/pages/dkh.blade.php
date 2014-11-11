@extends('layouts.default')
@section('content')

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_menubar">
	{{HTML::linkRoute('profile_user', 'Profile')}}
</div>

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
			<td class="">Nomor Dkh</td>
			<td>:</td>
			<td>{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh'))}}</td>			
		</tr>
		<tr>
			<td class="">Nama Jemaat</td>
			<td>:</td>
			<td>{{Form::select('nama_jemaat', $list_jemaat, Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat'))}}</td>
		</tr>		
		<tr>
			<td class="">Keterangan</td>
			<td>:</td>
			<td>{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan'))}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_dkh">Simpan Data Dkh</button></td>
		</tr>
	</table>	
</div>	
	
<script>
	$('body').on('click', '#f_post_dkh', function(){
		$no_dkh = $('#f_nomor_dkh').val();
		$id_jemaat = $('#f_nama_jemaat').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_dkh' : $no_dkh,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_dkh')}}",
			data: {
				'data' : $data
			}.
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