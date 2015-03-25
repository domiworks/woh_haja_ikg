@extends('layouts.user_layout')
@section('content')

<script>	
	$(document).ready(function(){						
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
		
		$('#f_nama_mempelai_wanita').attr('disabled', true);		
		$('#f_list_jemaat_wanita').attr('disabled', false);				

		$('#f_nama_mempelai_pria').attr('disabled', true);		
		$('#f_list_jemaat_pria').attr('disabled', false);

		//set nama mempelai
		var selected = $('#f_list_jemaat_wanita').find(":selected").text();
		$('#f_nama_mempelai_wanita').val(selected);	
		
		selected = $('#f_list_jemaat_pria').find(":selected").text();
		$('#f_nama_mempelai_pria').val(selected);	
	});

	$('body').on('click', '#f_check_jemaat_wanita', function(){		
		if($('#f_check_jemaat_wanita').val() == 0)
		{	
		$('#f_check_jemaat_wanita').val(1); //pakai pembicara luar jika value f_check_jemaat_wanita == 1
		$('#f_nama_mempelai_wanita').attr('disabled', false);			
		$('#f_nama_mempelai_wanita').val("");
		$('#f_list_jemaat_wanita').attr('disabled', true);								
		}
		else
		{
			$('#f_check_jemaat_wanita').val(0); //tidak pakai pembicara luar jika value f_check_jemaat_wanita == 0
			$('#f_nama_mempelai_wanita').attr('disabled', true);	
			// $('#f_nama_pengkotbah').val("");
			selected = $('#f_list_jemaat_wanita').find(":selected").text();
			$('#f_nama_mempelai_wanita').val(selected);	
			$('#f_list_jemaat_wanita').attr('disabled', false);				
		}
	});

	$('body').on('click', '#f_check_jemaat_pria', function(){		
		if($('#f_check_jemaat_pria').val() == 0)
		{	
		$('#f_check_jemaat_pria').val(1); //pakai pembicara luar jika value f_check_jemaat_pria == 1
		$('#f_nama_mempelai_pria').attr('disabled', false);			
		$('#f_nama_mempelai_pria').val("");
		$('#f_list_jemaat_pria').attr('disabled', true);								
		}
		else
		{
			$('#f_check_jemaat_pria').val(0); //tidak pakai pembicara luar jika value f_check_jemaat_pria == 0
			$('#f_nama_mempelai_pria').attr('disabled', true);	
			selected = $('#f_list_jemaat_pria').find(":selected").text();
			$('#f_nama_mempelai_pria').val(selected);
			$('#f_list_jemaat_pria').attr('disabled', false);				
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
			<li class="active">Pernikahan</li>
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
							PERNIKAHAN
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="pull-right" style="position:relative;">
								<input type="button" value="Help ?" id="f_video_input_pernikahan" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_input_pernikahan" />
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nomor Piagam Pernikahan
								</label>
								<div class="col-xs-4">
									{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Tanggal Pernikahan
								</label>
								<div class="col-xs-2">
									{{ Form::text('tanggal_pernikahan', Input::old('tanggal_pernikahan'), array('id' => 'f_tanggal_pernikahan', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Pendeta yang memberkati
								</label>
								<div class="col-xs-4">
									@if($list_pendeta == null)
									<p class="control-label pull-left">(tidak ada daftar pendeta)</p>
									@else
									{{Form::select('id_pendeta', $list_pendeta, Input::old('id_pendeta'), array('id'=>'f_id_pendeta', 'class'=>'form-control'))}}
									@endif							
								</div>								
							</div>
							
							<!--
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Gereja tempat diberkati
								</label>
								<div class="col-xs-6">
									{{-- Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja', 'class'=>'form-control')) --}}
								</div>
							</div>
							-->
						
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Jemaat Pria
								</label>
								<div class="col-xs-4">
									@if($list_jemaat_pria == null)
									<p class="control-label pull-left">(tidak ada daftar jemaat pria)</p>
									@else
									{{Form::select('list_jemaat_pria', $list_jemaat_pria, Input::old('list_jemaat_pria'), array('id'=>'f_list_jemaat_pria', 'class'=>'form-control'))}}							
									@endif
								</div>
								<div class="col-xs-0">
									<input id="f_check_jemaat_pria" type="checkbox" name="jemaat_pria" value="0" /> Non-Jemaat				
								</div>
								
							</div>
							
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Mempelai Pria
								</label>
								<div class="col-xs-4">
									{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Jemaat Wanita
								</label>
								<div class="col-xs-4">
									@if($list_jemaat_wanita == null)
									<p class="control-label pull-left">(tidak ada daftar jemaat wanita)</p>
									@else
									{{Form::select('list_jemaat_wanita', $list_jemaat_wanita, Input::old('list_jemaat_wanita'), array('id'=>'f_list_jemaat_wanita', 'class'=>'form-control'))}}							
									@endif
								</div>
								<div class="col-xs-0">
									<input id="f_check_jemaat_wanita" type="checkbox" name="jemaat_wanita" value="0" /> Non-Jemaat				
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Mempelai Wanita
								</label>
								<div class="col-xs-4">
									{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita', 'class'=>'form-control')) }}
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
									@if($list_jemaat_pria == null || $list_jemaat_wanita == null || $list_pendeta == null)
									<input type="button" id="f_post_pernikahan" class="btn btn-success" disabled=true value="Simpan Data Pernikahan" />
									@else
									<input type="button" id="f_post_pernikahan" class="btn btn-success" value="Simpan Data Pernikahan" data-toggle="modal" data-target=".popup_confirm_warning_pernikahan" />
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
jQuery('#f_tanggal_pernikahan').datetimepicker({
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

$('body').on('change','#f_list_jemaat_pria', function(){
	var selected = $('#f_list_jemaat_pria').find(":selected").text();
	$('#f_nama_mempelai_pria').val(selected);					
});

$('body').on('change','#f_list_jemaat_wanita', function(){
	var selected = $('#f_list_jemaat_wanita').find(":selected").text();
	$('#f_nama_mempelai_wanita').val(selected);					
});

$('body').on('click', '#f_post_pernikahan', function(){
	//SHOW POP UP CONFIRM PERNIKAHAN	
	
	/*
	$no_pernikahan = $('#f_nomor_pernikahan').val();		
	$tanggal_pernikahan = $('#f_tanggal_pernikahan').val();
	$id_pendeta = $('#f_id_pendeta').val();
	$id_gereja = $('#f_id_gereja').val();
	$keterangan = $('#f_keterangan').val();
	
		if($('#f_check_jemaat_wanita').val() == 1) //pakai nama gereja lain
		{
			$id_mempelai_wanita = '';
			$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
		}
		else
		{
			$id_mempelai_wanita = $('#f_list_jemaat_wanita').val();
			$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
		}
		if($('#f_check_jemaat_pria').val() == 1) //pakai nama gereja lain
		{
			$id_mempelai_pria = '';
			$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();
		}
		else
		{
			$id_mempelai_pria = $('#f_list_jemaat_pria').val();
			$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();
		}
		
		$data = {
			'no_pernikahan' : $no_pernikahan,
			'tanggal_pernikahan' : $tanggal_pernikahan,
			'id_pendeta' : $id_pendeta,
					// 'id_gereja' : $id_gereja,			
					'id_jemaat_pria' : $id_mempelai_pria,
					'id_jemaat_wanita' : $id_mempelai_wanita,
					'nama_pria' : $nama_mempelai_pria,
					'nama_wanita' : $nama_mempelai_wanita,
					'keterangan' : $keterangan
				};
				
				var json_data = JSON.stringify($data);
				
				$.ajax({
					type: "POST",
					url: "{{URL('user/post_pernikahan')}}",
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
					window.location = '{{URL::route('view_inputdata_pernikahan')}}';
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

@include('pages.__user.__input.popup_confirm_warning_pernikahan')
@include('pages.__popup_video.popup_video_input_pernikahan')

@stop