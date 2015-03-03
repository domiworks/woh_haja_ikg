@extends('layouts.admin_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
	
	});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="width:200px; background-color:white;">
		<div>
			@include('includes.sidebar.sidebar_admin_user_behavior')
		</div>
	</div>
	<div class="s_main_side" style="">
	<!-- css -->
	<style>

	</style>
	<!-- end css -->
	<!--<ol class="breadcrumb">
		<li><a href="#">Olah Data</a></li>
		<li class="active">Atestasi</li>
	</ol>-->

		<div class="s_content">
			<div class="container-fluid">
				<!--<div class="col-md-3 panel panel-default ">
					<ul>		
						<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
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
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor Piagam Atestasi</label>
								<div class="col-xs-4">{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi', 'class'=>'form-control')) }}</div>
							</div>					
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Jemaat</label>
								<div class="col-xs-4">{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">Antara tanggal </label>
								<div class="col-xs-2">
									{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-2">
									{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
								</div>								
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">Jenis Atestasi</label>
								<div class="col-xs-3">							
									<?php 
										$new_list_jenis_atestasi = array(
											'-1' => 'pilih!'
										);									
										foreach($list_jenis_atestasi as $id => $key)
										{
											$new_list_jenis_atestasi[$id] = $key;
										}
									?>
									@if($list_jenis_atestasi == null)
										<p class="control-label pull-left">(tidak ada daftar jenis atestasi)</p>
									@else
										{{Form::select('jenis_atestasi', $new_list_jenis_atestasi, Input::old('pembaptis'), array('id'=>'f_jenis_atestasi', 'class'=>'form-control'))}}
									@endif						
								</div>					
							</div>					
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Gereja Lama</label>
								<div class="col-xs-4">{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'class'=>'form-control')) }}</div>
							</div>			
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Gereja Baru</label>
								<div class="col-xs-4">{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'class'=>'form-control')) }}</div>
							</div>			
							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">
									<input type="button" id="f_search_atestasi" class="btn btn-success" value="Cari Data Atestasi"></input>
								</div>			
							</div>			
						</form>
					</div>	

					<!--<div id="temp_result">
					</div>-->
					
					<div id="f_result_atestasi">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Atestasi
									</th>
									<th>
										Nama Anggota
									</th>
									<th>
										Gereja Lama
									</th>
									<th>
										Gereja Baru
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_atestasi">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_atestasi">
											Edit
										</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
											delete
										</button>
									</td>
								</tr>							
								-->
							<!--</tbody>
						</table>-->
					</div>
				</div>	
			</div>	
		</div>	
	</div>
</div>	

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
	
//simpen detail 
var temp_detail = "";

//global variable buat ajax ganti view
var temp = '';
	
$('body').on('click', '#f_search_atestasi', function(){

	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
		
	// $gereja = $('#f_list_gereja').val();
	$no_atestasi = $('#f_nomor_atestasi').val();			
	$nama_jemaat = $('#f_jemaat').val();
	$tanggal_awal = $('#f_tanggal_awal').val();		
	$tanggal_akhir = $('#f_tanggal_akhir').val();
	$id_jenis_atestasi = $('#f_jenis_atestasi').val();		
	$nama_gereja_lama = $('#f_nama_gereja_lama').val();		
	$nama_gereja_baru = $('#f_nama_gereja_baru').val();		

	$data = {
		// 'gereja' : $gereja,
		'no_atestasi' : $no_atestasi,
		'nama_jemaat' : $nama_jemaat,
		'tanggal_awal' : $tanggal_awal,
		'tanggal_akhir' : $tanggal_akhir,
		'id_jenis_atestasi' : $id_jenis_atestasi,			
		'nama_gereja_lama' : $nama_gereja_lama,			
		'nama_gereja_baru' : $nama_gereja_baru			
	};		

	var json_data = JSON.stringify($data);
	
	$.ajax({
		type: 'POST',
		url: "{{URL('admin/search_atestasi')}}",
		data: {
			'json_data' : json_data
			// 'data' : $data
		},
		success: function(response){	
			result = JSON.parse(response);
			if(result.code==200)
			{
				// alert(result.messages);
				alert('Data ditemukan.');
				temp_detail = result.messages;
				$('#temp_result').html(JSON.stringify(temp_detail));
				var result = "";					
				result += '<table style="margin-bottom: 0px;" class="table table-bordered">';
					result += '<thead>';
						result += '<tr>';
							result += '<th>';
								result += 'No. Piagam Atestasi';
							result += '</th>';
							result += '<th>';
								result += 'Nama Anggota';
							result += '</th>';
							result += '<th>';
								result += 'Gereja Lama';
							result += '</th>';
							result += '<th>';
								result += 'Gereja Baru';
							result += '</th>';
							result += '<th>';
								result += 'Visible';
							result += '</th>';
							result += '<th>';
								
							result += '</th>';
						result += '</tr>';
					result += '</thead>';
					result += '<tbody id="f_result_body_atestasi">';
					//set value di tabel result
					for($i = 0; $i < temp_detail.length; $i++)
					{
						result+= '<tr class="tabel_row'+$i+'">';
							result+='<td class="tabel_no_atestasi'+$i+'">';
								result+=temp_detail[$i]['no_atestasi'];								
							result+='</td>';
							result+='<td class="tabel_nama_jemaat'+$i+'">';
								result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];							
							result+='</td>';
							result+='<td class="tabel_nama_gereja_lama'+$i+'">';
								result+=temp_detail[$i]['nama_gereja_lama'];								
							result+='</td>';
							result+='<td class="tabel_nama_gereja_baru'+$i+'">';
								result+=temp_detail[$i]['nama_gereja_baru'];								
							result+='</td>';
							result+='<td class="tabel_visible'+$i+'">';
								if(temp_detail[$i]['deleted'] == 0)
								{
									result+='<span style="color:green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
								}
								else
								{
									result+='<span style="color:red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
								}
							result+='</td>';
							result+='<td>';
								result+='<div class="pull-right">';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-warning visibleButton">Ganti Visible</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button style="margin-left:10px;" type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_atestasi">';
										result+='Detail/Edit';
									result+='</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button style="margin-left:10px;" type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_atestasi">';
										result+='Delete';
									result+='</button>';
								result+='</div>';	
							result+='</td>';
						result+='</tr>';
						// alert(response[$i]['tanggal_mulai']);
					}
					result += '</tbody>';
				result += '</table>';
				
				// $('#f_result_body_atestasi').html(result);
				$('#f_result_atestasi').html(result);
				
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
			else
			{
				alert(result.messages);
				$('#f_result_atestasi').html("<p>Hasil pencarian tidak didapatkan.</p>");
				
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
					
				// $('#f_result_body_atestasi').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");
				
			}				
			/*
			alert("Berhasil cari data atestasi");
				// alert(JSON.stringify(response));
				// $('#temp_result').html(JSON.stringify(response));
				
				temp_detail = response;
				
				if(response != "no result")
				{
					var result = "";					
					
					//set value di tabel result
					for($i = 0; $i < response.length; $i++)
					{
						result+= '<tr>';
							result+='<td>';
								result+=response[$i]['no_atestasi'];								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_depan']+' '+response[$i]['nama_tengah']+' '+response[$i]['nama_belakang'];							
							result+='</td>';
														
							result+='<td>';
								result+='<input type="hidden" value='+$i+' />';
								result+='<input type="hidden" value='+response[$i]['id_atestasi']+' />';
								result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_atestasi">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+response[$i]['id_atestasi']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_atestasi">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_body_atestasi').html(result);
				}					
				else				
				{
					$('#f_result_body_atestasi').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
				}								
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
			*/
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		}
	},'json');
});

//click change visible
$('body').on('click', '.visibleButton', function(){
	
	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
	
	$id = $(this).prev().val();		
	temp = $(this).prev().prev().val();					
	
	$data = {
		'id' : $id
	};
	
	var json_data = JSON.stringify($data);
			
	$.ajax({
		type: 'POST',
		url: "{{URL('admin/change_visible_atestasi')}}",
		data: {
			'json_data' : json_data
		},
		success: function(response){							
			result = JSON.parse(response);
			if(result.code==200)
			{
				alert(result.messages);					
				// window.location = '{{--URL::route('admin_view_input_gereja')--}}';
									
				//ganti isi row sesuai hasil edit
				// alert(result.data['deleted']);
				if(result.data['deleted'] == 0)
				{						
					$('.tabel_visible'+temp).html("<span style='color:green;' class='glyphicon glyphicon-ok' aria-hidden='true'></span>");						
				}
				else
				{							
					$('.tabel_visible'+temp).html("<span style='color:red;' class='glyphicon glyphicon-remove' aria-hidden='true'></span>");
				}	

				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
			else
			{
				alert(result.messages);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}				
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		}
	},'json');
	
});

//click detail button
$('body').on('click', '.detailButton', function(){
	
	//START LOADER				
	// $('.f_loader_container').removeClass('hidden');
	
	/*	
	//get list pendeta sesuai gereja
	$gereja = $('#f_list_gereja').val();	
	$data = {
		'gereja' : $gereja
	};
	var json_data = JSON.stringify($data);
	$.ajax({
		type: 'GET',
		url: "{{URL('admin/get_list_anggota_by_gereja')}}",
		data: {
			'json_data' : json_data
		},
		success: function(response){				
			//set new f_edit_pengkotbah								
			result = JSON.parse(response);
			var list = "";
			if(result.code==200)
			{
				var data = result.data;
				for($i = 0; $i < data.length; $i++)
				{
					list += "<option value='"+data[$i]['id']+"'>";
						list += data[$i]['nama_depan']+' '+data[$i]['nama_tengah']+' '+data[$i]['nama_belakang'];
					list += "</option>";
				}
			}
			else
			{
				//kosong
			}				
						
			$('#f_edit_jemaat').html(list);
			
			$('#f_edit_jemaat').val(temp_detail[$index]['id_anggota']);
			
			// alert($('#f_edit_pengkotbah').html());
			// $('#f_edit_div_pengkotbah').html(list);
			
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		},
		error: function(jqXHR, textStatus, errorThrown){
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		}
	},'json');
	*/
		
	$id = $(this).prev().val();	
	$index = $(this).prev().prev().val();
	
	temp = $(this).prev().prev().val();
	
	//set value di table pop up detail
	$('#f_edit_nomor_atestasi').val(temp_detail[$index]['no_atestasi']);	
	$('#f_edit_jemaat').val(temp_detail[$index]['id_anggota']);
	$('#f_edit_tanggal_atestasi').val(temp_detail[$index]['tanggal_atestasi']);
	$('#f_edit_jenis_atestasi').val(temp_detail[$index]['id_jenis_atestasi']);
	if(temp_detail[$index]['id_gereja_lama'] == null)
	{
		$('#f_edit_check_gereja_lama').val(1);
		$('#f_edit_check_gereja_lama').prop('checked', true);
		$('#f_edit_list_gereja_lama').attr('disabled', true);
		$('#f_edit_nama_gereja_lama').attr('disabled', false);
		$('#f_edit_nama_gereja_lama').val(temp_detail[$index]['nama_gereja_lama']);			
		//clear background
		$('#f_edit_nama_gereja_lama').css('background-color','#FFFFFF');	
	}
	else
	{
		$('#f_edit_check_gereja_lama').val(0);
		
		$('#f_edit_list_gereja_lama').attr('disabled', false);
		$('#f_edit_nama_gereja_lama').attr('disabled', true);
		$('#f_edit_list_gereja_lama').val(temp_detail[$index]['id_gereja_lama']);
		$('#f_edit_nama_gereja_lama').val(temp_detail[$index]['nama_gereja_lama']);		
		//clear background
		$('#f_edit_nama_gereja_lama').css('background-color','#eee');		
	}
	if(temp_detail[$index]['id_gereja_baru'] == null)
	{
		$('#f_edit_check_gereja_baru').val(1);
		$('#f_edit_check_gereja_baru').prop('checked', true);
		$('#f_edit_list_gereja_baru').attr('disabled', true);
		$('#f_edit_nama_gereja_baru').attr('disabled', false);
		$('#f_edit_nama_gereja_baru').val(temp_detail[$index]['nama_gereja_baru']);			
		//clear background
		$('#f_edit_nama_gereja_baru').css('background-color','#FFFFFF');
	}
	else
	{
		$('#f_edit_check_gereja_baru').val(0);
		
		$('#f_edit_list_gereja_baru').attr('disabled', false);
		$('#f_edit_nama_gereja_baru').attr('disabled', true);
		$('#f_edit_list_gereja_baru').val(temp_detail[$index]['id_gereja_baru']);
		$('#f_edit_nama_gereja_baru').val(temp_detail[$index]['nama_gereja_baru']);				
		//clear background
		$('#f_edit_nama_gereja_baru').css('background-color','#eee');
	}	
	$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);			

	//clear background		
	$('#f_edit_nomor_atestasi').css('background-color','#FFFFFF');
	$('#f_edit_tanggal_atestasi').css('background-color','#FFFFFF');		
});	

//click delete button
$('body').on('click', '.deleteButton', function(){
	$id = $(this).prev().val();
	temp = $(this).prev().prev().val();
});

</script>

@include('pages.admin.popup_edit_atestasi')
@include('pages.admin.popup_delete_warning_atestasi')

@stop