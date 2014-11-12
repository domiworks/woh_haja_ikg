@extends('layouts.default')
@section('content')

<script>
	$(document).ready(function(){						
		$('#f_nama_gereja_lama').attr('disabled', true);		
		$('#f_list_gereja_lama').attr('disabled', false);				
		
		$('#f_nama_gereja_baru').attr('disabled', true);		
		$('#f_list_gereja_baru').attr('disabled', false);
		
		//set nama gereja lama / baru
		var selected = $('#f_list_gereja_lama').find(":selected").text();
		$('#f_nama_gereja_lama').val(selected);	
		
		selected = $('#f_list_gereja_baru').find(":selected").text();
		$('#f_nama_gereja_baru').val(selected);	
	});
	
	$('body').on('click', '#f_check_gereja_lama', function(){		
		if($('#f_check_gereja_lama').val() == 0){	
			$('#f_check_gereja_lama').val(1); //pakai pembicara luar jika value f_check_gereja_lama == 1
			$('#f_nama_gereja_lama').attr('disabled', false);			
			$('#f_nama_gereja_lama').val("");
			$('#f_list_gereja_lama').attr('disabled', true);								
		}
		else
		{
			$('#f_check_gereja_lama').val(0); //tidak pakai pembicara luar jika value f_check_gereja_lama == 0
			$('#f_nama_gereja_lama').attr('disabled', true);	
			// $('#f_nama_pengkotbah').val("");
			selected = $('#f_list_gereja_lama').find(":selected").text();
			$('#f_nama_gereja_lama').val(selected);	
			$('#f_list_gereja_lama').attr('disabled', false);				
		}
	});
	
	$('body').on('click', '#f_check_gereja_baru', function(){		
		if($('#f_check_gereja_baru').val() == 0){	
			$('#f_check_gereja_baru').val(1); //pakai pembicara luar jika value f_check_gereja_baru == 1
			$('#f_nama_gereja_baru').attr('disabled', false);			
			$('#f_nama_gereja_baru').val("");
			$('#f_list_gereja_baru').attr('disabled', true);								
		}
		else
		{
			$('#f_check_gereja_baru').val(0); //tidak pakai pembicara luar jika value f_check_gereja_baru == 0
			$('#f_nama_gereja_baru').attr('disabled', true);	
			selected = $('#f_list_gereja_baru').find(":selected").text();
			$('#f_nama_gereja_baru').val(selected);
			$('#f_list_gereja_baru').attr('disabled', false);				
		}
	});
</script>

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
			<td>Nomor Atestasi</td>
			<td>:</td>
			<td>{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi')) }}</td>
		</tr>				
		<tr>
			<td class="">Jemaat</td>
			<td>:</td>
			<td>{{Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_jemaat'))}}</td>
		</tr>
		<tr>
			<td>Tanggal Atestasi</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_atestasi', Input::old('tanggal_atestasi'), array('id' => 'f_tanggal_atestasi')) }}</td>
			<script>
				jQuery('#f_tanggal_atestasi').datetimepicker({
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
					format:'Y-m-d',
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
			<td>Gereja Lama</td>
			<td>:</td>
			<td>
				{{Form::select('list_gereja_lama', $list_gereja, Input::old('list_gereja_lama'), array('id'=>'f_list_gereja_lama', 'disabled' => false))}}
				<input id="f_check_gereja_lama" type="checkbox" name="gereja_lama" value="0" /> Gereja Lain
			</td>
			<script>
				$('body').on('change','#f_list_gereja_lama', function(){
					var selected = $('#f_list_gereja_lama').find(":selected").text();
					$('#f_nama_gereja_lama').val(selected);					
				});
			</script>
		</tr>
		<tr>
			<td>Nama Gereja Lama</td>
			<td>:</td>
			<td>{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'disabled' => true)) }}</td>
		</tr>
		<tr>
			<td>Gereja Baru</td>
			<td>:</td>
			<td>
				{{Form::select('list_gereja_baru', $list_gereja, Input::old('list_gereja_baru'), array('id'=>'f_list_gereja_baru', 'disabled' => false))}}
				<input id="f_check_gereja_baru" type="checkbox" name="gereja_baru" value="0" /> Gereja Lain
			</td>
			<script>
				$('body').on('change','#f_list_gereja_baru', function(){
					var selected = $('#f_list_gereja_baru').find(":selected").text();
					$('#f_nama_gereja_baru').val(selected);					
				});
			</script>
		</tr>
		<tr>
			<td>Nama Gereja Baru</td>
			<td>:</td>
			<td>{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'disabled' => true)) }}</td>
		</tr>
		<tr>
			<td class="">Keterangan</td>
			<td>:</td>
			<td>{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan'))}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_atestasi">Simpan Data Atestasi</button></td>
		</tr>		
	</table>	
</div>	

<script>		
	$('body').on('click', '#f_post_atestasi', function(){
		$no_atestasi = $('#f_nomor_atestasi').val();
		$id_jemaat = $('#f_jemaat').val();
		$tanggal_atestasi = $('#f_tanggal_atestasi').val();		
		$id_jenis_atestasi = $('#f_jenis_atestasi').val();
		if($('#f_check_gereja_lama').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_lama = '';
			$nama_gereja_lama = $('#f_nama_gereja_lama').val();
		}
		else
		{
			$id_gereja_lama = $('#f_list_gereja_lama').val();
			$nama_gereja_lama = $('#f_nama_gereja_lama').val();
		}
		if($('#f_check_gereja_baru').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_baru = '';		
			$nama_gereja_baru = $('#f_nama_gereja_baru').val();
		}
		else
		{
			$id_gereja_baru = $('#f_list_gereja_baru').val();		
			$nama_gereja_baru = $('#f_nama_gereja_baru').val();
		}
		$keterangan = $('#f_keterangan').val();
					
		$data = {
			'no_atestasi' : $no_atestasi,
			'id_jemaat' : $id_jemaat,
			'tanggal_atestasi' : $tanggal_atestasi,
			'id_jenis_atestasi' : $id_jenis_atestasi,
			'id_gereja_lama' : $id_gereja_lama,
			'nama_gereja_lama' : $nama_gereja_lama,
			'id_gereja_baru' : $id_gereja_baru,
			'nama_gereja_baru' : $nama_gereja_baru,
			'keterangan' : $keterangan
		};		
						
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_atestasi')}}",
			data: {
				'data' : $data
			},
			success: function(response){				
				if(response == true)
				{	
					alert("Berhasil simpan data atestasi");
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