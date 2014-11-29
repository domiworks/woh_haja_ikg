@extends('layouts.admin_layout')
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
<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">Atestasi</li>
</ol>

<!-- olahdata -->
<!--
	<ul>
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
	</ul>
-->
<!-- </div> -->

<div class="s_content">
	<div class="container-fluid">

		<div class="col-md-3 panel panel-default ">
			<ul>		
				<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
			</ul>
		</div>
		<div class="panel panel-default col-md-9">
			<div class="panel-body">
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Atestasi
						</label>
						
						<div class="col-xs-6">
							{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi', 'class'=>'form-control')) }}
						</div>
					</div>				
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat
						</label>
						
						<div class="col-xs-6">
							{{Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Atestasi
						</label>
						
						<div class="col-xs-6">
							{{ Form::text('tanggal_atestasi', Input::old('tanggal_atestasi'), array('id' => 'f_tanggal_atestasi', 'class'=>'form-control')) }}
						</div>
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
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jenis Atestasi
						</label>
						
						<div class="col-xs-6">
							{{Form::select('jenis_atestasi', $list_jenis_atestasi, Input::old('pembaptis'), array('id'=>'f_jenis_atestasi', 'class'=>'form-control'))}}
						</div>
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja Lama
						</label>
						
						<div class="col-xs-6">

							{{Form::select('list_gereja_lama', $list_gereja, Input::old('list_gereja_lama'), array('id'=>'f_list_gereja_lama', 'class'=>'form-control', 'disabled' => false))}}
							
						</div>
						
						<div class="col-xs-0">
							<input id="f_check_gereja_lama" type="checkbox" name="gereja_lama" value="0" /> Gereja Lain
						</div>							
						
						<script>
						$('body').on('change','#f_list_gereja_lama', function(){
							var selected = $('#f_list_gereja_lama').find(":selected").text();
							$('#f_nama_gereja_lama').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Gereja Lama
						</label>		
						<div class="col-xs-6">
							{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'class'=>'form-control', 'disabled' => true)) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja Baru
						</label>
						
						<div class="col-xs-6">

							{{Form::select('list_gereja_baru', $list_gereja, Input::old('list_gereja_baru'), array('id'=>'f_list_gereja_baru', 'class'=>'form-control', 'disabled' => false))}}
							
						</div>
						
						<div class="col-xs-0">
							<input id="f_check_gereja_baru" type="checkbox" name="gereja_baru" value="0" /> Gereja Lain
						</div>
						<script>
						$('body').on('change','#f_list_gereja_baru', function(){
							var selected = $('#f_list_gereja_baru').find(":selected").text();
							$('#f_nama_gereja_baru').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Gereja Baru
						</label>
						
						<div class="col-xs-6">
							{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'class'=>'form-control', 'disabled' => true)) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						
						<div class="col-xs-6">
							{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-push-2">
							<button id="f_post_atestasi" class="btn btn-success">Simpan Data Atestasi</button>
						</div>		
					</div>		
				</form>	
			</div>	
		</div>	
	</div>	
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
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data atestasi");
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