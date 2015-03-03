@extends('layouts.user_layout')
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
			@include('includes.sidebar.sidebar_user_olahdata')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->

		<!--<ol class="breadcrumb">
			<li><a href="#">Olah Data</a></li>
			<li class="active">DKH</li>
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
							DKH
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">	
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor Dkh</label>
								<div class="col-xs-4">{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh', 'class'=>'form-control'))}}</div>			
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Jemaat</label>
								<div class="col-xs-4">{{Form::text('nama_jemaat', Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}</div>
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
								<label class="col-xs-4 control-label">Jenis Dkh</label> 
								<div class="col-xs-3">
									<!--<select name="jenis_baptis" id="f_jenis_baptis" class="form-control">
										<option>bla</option>
									</select>
									-->
									<?php 
										$new_list_jenis_dkh = array(
											'' => 'pilih!'
										);									
										foreach($list_jenis_dkh as $id => $key)
										{
											$new_list_jenis_dkh[$id] = $key;
										}
									?>
									@if($list_jenis_dkh == null)
										<p class="control-label pull-left">(tidak ada daftar jenis baptis)</p>
									@else
										{{ Form::select('jenis_dkh', $new_list_jenis_dkh, Input::old('jenis_dkh'), array('id'=>'f_jenis_dkh', 'class'=>'form-control')) }}
									@endif								
								</div>
							</div>				
							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">
									<input type="button" id="f_search_dkh" class="btn btn-success" value="Cari Data Dkh"></input>
								</div>
							</div>
						</form>
					</div>	

					<!--<div id="temp_result">
					</div>-->
					
					<div id="f_result_dkh">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Dkh
									</th>
									<th>
										Nama Jemaat
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_dkh">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_dkh">
											Edit
										</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
											delete
										</button>
									</td>
								</tr>-->
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

$('body').on('click', '#f_search_dkh', function(){
	
	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
		
	$no_dkh = $('#f_nomor_dkh').val();	
	$nama_jemaat = $('#f_nama_jemaat').val();		
	$jenis_dkh = $('#f_jenis_dkh').val();
	$tanggal_awal = $('#f_tanggal_awal').val();
	$tanggal_akhir = $('#f_tanggal_akhir').val();

	$data = {
		'no_dkh' : $no_dkh,
		'nama_jemaat' : $nama_jemaat,			
		'tanggal_awal' : $tanggal_awal,
		'tanggal_akhir' : $tanggal_akhir,
		'id_jenis_dkh' : $jenis_dkh
	};

	var json_data = JSON.stringify($data);
	
	$.ajax({
		type: 'POST',
		url: "{{URL('user/search_dkh')}}",
		data: {
			'json_data' : json_data
			// 'data' : $data
		},
		success: function(response){
			result = JSON.parse(response);
			if(result.code==200)
			{
				alert('Data ditemukan.');
				temp_detail = result.messages;
				// $('#temp_result').html(JSON.stringify(temp_detail));
				var result = '';				
				result += '<table style="margin-bottom: 0px;" class="table table-bordered">';
					result += '<thead>';
						result += '<tr>';
							result += '<th>';
								result += 'No. Piagam Dkh';
							result += '</th>';
							result += '<th>';
								result += 'Nama Anggota';
							result += '</th>';							
							result += '<th>';
								
							result += '</th>';
						result += '</tr>';
					result += '</thead>';
					result += '<tbody id="f_result_body_dkh">';
					for($i = 0; $i < temp_detail.length; $i++)
					{
						//set value di table
						result+= '<tr class="tabel_row'+$i+'">';
							result+='<td class="tabel_no_dkh'+$i+'">';
								result+=temp_detail[$i]['no_dkh'];								
							result+='</td>';
							result+='<td class="tabel_nama_anggota'+$i+'">';
								result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
							result+='</td>';
							result+='<td>';
								result+='<div class="pull-right">';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_dkh">';
										result+='Detail/Edit';
									result+='</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button style="margin-left:10px;" type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_dkh">';
										result+='Delete';
									result+='</button>';
								result+='</div>';	
							result+='</td>';
						result+='</tr>';						
					}
					result += '</tbody>';
				result += '</table>';
					
				// $('#f_result_body_dkh').html(result);
				$('#f_result_dkh').html(result);
				
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
			else
			{
				alert(result.messages);
				$('#f_result_dkh').html("<p>Hasil pencarian tidak didapatkan.</p>");
				
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
					
				// $('#f_result_body_dkh').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");			
			}
			/*
			alert("Berhasil cari data dkh");				

			if(response != "no result")
			{				
				var result = "";				
				for($i = 0; $i < response.length; $i++)
				{
					//set value di table
					result+= '<tr>';
						result+='<td>';
							result+=response[$i]['no_dkh'];								
						result+='</td>';
						result+='<td>';
							result+=response[$i]['nama_depan_jemaat']+' '+response[$i]['nama_tengah_jemaat']+' '+response[$i]['nama_belakang_jemaat'];								
						result+='</td>';
						result+='<td>';
							result+='<input type="hidden" value='+response[$i]['id']+' />';
							result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_dkh">';
								result+='Edit';
							result+='</button>';
							result+='<input type="hidden" value='+response[$i]['id']+' />';
							result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_dkh">';
								result+='delete';
							result+='</button>';
						result+='</td>';
					result+='</tr>';
					// result += response[$i]['no_dkh']+ " ";
						// alert(response[$i]['tanggal_mulai']);
				}
					
				$('#f_result_body_dkh').html(result);
			}					
			else				
			{
				$('#f_result_body_dkh').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
			}
			*/			
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('error');
			alert(errorThrown);
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		}
		
	},'json');	
});

//click edit button
$('body').on('click', '.detailButton', function(){
	$id = $(this).prev().val();
	$index = $(this).prev().prev().val();
	
	temp = $(this).prev().prev().val();
	
	$('#f_edit_nomor_dkh').val(temp_detail[$index]['no_dkh']);
	$('#f_edit_nama_jemaat').val(temp_detail[$index]['id_jemaat']);
	$('#f_edit_tanggal_dkh').val(temp_detail[$index]['tanggal_dkh']);
	$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);

	//clear background
	$('#f_edit_nomor_dkh').css('background-color','#FFFFFF');		
	$('#f_edit_tanggal_dkh').css('background-color','#FFFFFF');		
	$('#f_edit_keterangan').css('background-color','#FFFFFF');		

	/*
	$data = {
		'id' : $id
	};
	
	$.ajax({
		type: 'GET',
		url: "{{URL('user/detail_dkh')}}",
		data : {
			'data' : $data
		},
		success: function(response){				
			//set value tabel pop up
			$('#f_edit_nomor_dkh').val(response['no_dkh']);
			$('#f_edit_nama_jemaat').val(response['id_jemaat']);
			$('#f_edit_keterangan').val(response['keterangan']);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert("error");
			alert(errorThrown);
		}
	});
*/
});

//click delete button
$('body').on('click', '.deleteButton', function(){
	$id = $(this).prev().val();
	temp = $(this).prev().prev().val();
});
</script>

@include('pages.user_olahdata.popup_edit_dkh')
@include('pages.user_olahdata.popup_delete_warning_dkh')

@stop