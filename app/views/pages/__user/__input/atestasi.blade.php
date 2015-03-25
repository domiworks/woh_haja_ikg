@extends('layouts.user_layout')
@section('content')

<script>
	$(document).ready(function(){						
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
	
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
		
<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="width:200px; background-color:white;">
		<div>
			@include('includes.sidebar.sidebar_user_inputdata')
		</div>		
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->
		<!--<ol class="breadcrumb">
			<li><a href="#">Input Data</a></li>
			<li class="active">Atestasi</li>
		</ol>-->

		<div class="s_content">
			<div class="container-fluid">
				<!--<div class="col-md-3 panel panel-default ">
					<ul>		
						<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
					</ul>
				</div>-->
				
				<!--div class="panel panel-default col-md-9"-->
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							ATESTASI
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="pull-right" style="position:relative;">
								<input type="button" value="Help ?" id="f_video_input_atestasi" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_input_atestasi" />
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nomor Piagam Atestasi
								</label>						
								<div class="col-xs-4">
									{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Tanggal Atestasi
								</label>						
								<div class="col-xs-2">
									{{ Form::text('tanggal_atestasi', Input::old('tanggal_atestasi'), array('id' => 'f_tanggal_atestasi', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Anggota
								</label>						
								<div class="col-xs-4">
									@if($list_jemaat == null)
									<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
									@else
									{{Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}							
									@endif
								</div>								
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Jenis Atestasi
								</label>						
								<div class="col-xs-3">
									@if($list_jenis_atestasi == null)
									<p class="control-label pull-left">(tidak ada daftar jenis atestasi)</p>
									@else
									{{Form::select('jenis_atestasi', $list_jenis_atestasi, Input::old('pembaptis'), array('id'=>'f_jenis_atestasi', 'class'=>'form-control'))}}
									@endif							
								</div>								
							</div>		
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Gereja Lama
								</label>						
								<div class="col-xs-4">
									@if($list_gereja == null)
									<p class="control-label pull-left">(tidak ada daftar gereja)</p>
									@else
									{{Form::select('list_gereja_lama', $list_gereja, Input::old('list_gereja_lama'), array('id'=>'f_list_gereja_lama', 'class'=>'form-control', 'disabled' => false))}}
									@endif														
								</div>
								
								<div class="col-xs-0">
									<input id="f_check_gereja_lama" type="checkbox" name="gereja_lama" value="0" /> Gereja Lain
								</div>							
																
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Gereja Lama
								</label>		
								<div class="col-xs-4">
									{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'class'=>'form-control', 'disabled' => true)) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Gereja Baru
								</label>
								
								<div class="col-xs-4">
									@if($list_gereja == null)
									<p class="control-label pull-left">(tidak ada daftar gereja)</p>
									@else
									{{Form::select('list_gereja_baru', $list_gereja, Input::old('list_gereja_baru'), array('id'=>'f_list_gereja_baru', 'class'=>'form-control', 'disabled' => false))}}
									@endif
								</div>
								
								<div class="col-xs-0">
									<input id="f_check_gereja_baru" type="checkbox" name="gereja_baru" value="0" /> Gereja Lain
								</div>								
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Gereja Baru
								</label>						
								<div class="col-xs-4">
									{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'class'=>'form-control', 'disabled' => true)) }}
								</div>
								<div class="col-xs-0">
									*
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
								<div class="col-xs-6 col-xs-push-5">
									@if($list_gereja == null || $list_jenis_atestasi == null || $list_jemaat == null)
									<input type="button" id="f_post_atestasi" class="btn btn-success" disabled=true value="Simpan Data Atestasi" />
									@else
									<input type="button" id="f_post_atestasi" class="btn btn-success" value="Simpan Data Atestasi" data-toggle="modal" data-target=".popup_confirm_warning_atestasi" />
									@endif						
								</div>		
							</div>		
						</form>	
					</div>
					<div class="panel-footer" style="background-color: white;">
						(*) wajib diisi
					</div>
				</div>	
			</div>	
		</div>	
	</div>
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
		
	$('body').on('change','#f_list_gereja_lama', function(){
		var selected = $('#f_list_gereja_lama').find(":selected").text();
		$('#f_nama_gereja_lama').val(selected);					
	});
	
	$('body').on('change','#f_list_gereja_baru', function(){
		var selected = $('#f_list_gereja_baru').find(":selected").text();
		$('#f_nama_gereja_baru').val(selected);					
	});
	
	$('body').on('click', '#f_post_atestasi', function(){		
		//SHOW POP UP CONFIRM ATESTASI			
		
		/*
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
			'id_anggota' : $id_jemaat,
			'tanggal_atestasi' : $tanggal_atestasi,
			'id_jenis_atestasi' : $id_jenis_atestasi,
			'id_gereja_lama' : $id_gereja_lama,
			'nama_gereja_lama' : $nama_gereja_lama,
			'id_gereja_baru' : $id_gereja_baru,
			'nama_gereja_baru' : $nama_gereja_baru,
			'keterangan' : $keterangan
		};		
		
		var json_data = JSON.stringify($data);

		$.ajax({
			type: 'POST',
			url: "{{--URL('user/post_atestasi')--}}",
			data: {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{
					// alert("Berhasil simpan data kebaktian");					
					// location.reload();
					alert(result.messages);
					window.location = '{{--URL::route('view_inputdata_atestasi')--}}';
				}
				else
				{
					alert(result.messages);
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
		*/
	});
</script>

@include('pages.__user.__input.popup_confirm_warning_atestasi')
@include('pages.__popup_video.popup_video_input_atestasi')

@stop