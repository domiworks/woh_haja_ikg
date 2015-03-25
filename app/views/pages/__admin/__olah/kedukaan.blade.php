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
			<li class="active">Kedukaan</li>
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
							KEDUKAAN
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">								
							<div class="pull-right" style="position:relative;">
								<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_olah_kedukaan" />
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor Piagam Kedukaan</label> 
								<div class="col-xs-4">{{ Form::text('nomor_kedukaan', Input::old('nomor_kedukaan'), array('id' => 'f_nomor_kedukaan', 'class'=>'form-control')) }}
								</div>
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
								<label class="col-xs-4 control-label">Nama jemaat yang meninggal</label> 
								<div class="col-xs-4">
									{{Form::text('nama_jemaat', Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}
								</div>
							</div>	
							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">
									<input type="button" id="f_search_kedukaan" class="btn btn-success" value="Cari Data Kedukaan"></input>
								</div>
							</div>
						</form>
					</div>
					
					<!--<div id="temp_result">
					</div>-->
					
					<div id="f_result_kedukaan">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Kedukaan
									</th>
									<th>
										Nama Anggota
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_kedukaan">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_kedukaan">
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
	
$('body').on('click', '#f_search_kedukaan', function(){		

	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
	
	// $gereja = $('#f_list_gereja').val();
	$no_kedukaan = $('#f_nomor_kedukaan').val();
	$tanggal_awal = $('#f_tanggal_awal').val();
	$tanggal_akhir = $('#f_tanggal_akhir').val();
	$nama_jemaat = $('#f_nama_jemaat').val();
		// $id_gereja = $('#f_list_gereja').val();		
		
		$data = {
			// 'gereja' : $gereja,
			'no_kedukaan' : $no_kedukaan,
			// 'id_gereja' : $id_gereja,
			'nama_jemaat' : $nama_jemaat,			
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/search_kedukaan')}}",
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
					// $('#temp_result').html(JSON.stringify(temp_detail));
					var result = '';	
					result += '<table style="margin-bottom: 0px;" class="table table-bordered">';
						result += '<thead>';
							result += '<tr>';
								result += '<th>';
									result += 'No. Piagam Kedukaan';
								result += '</th>';
								result += '<th>';
									result += 'Nama Anggota';
								result += '</th>';
								result += '<th>';
									result += 'Tanggal Meninggal';
								result += '</th>';
								result += '<th>';
									result += 'Visible';
								result += '</th>';
								result += '<th>';
									
								result += '</th>';
							result += '</tr>';
						result += '</thead>';
						result += '<tbody id="f_result_body_kedukaan">';
						//set value di tabel result
						for($i = 0; $i < temp_detail.length; $i++)
						{
							result+= '<tr class="tabel_row'+$i+'">';
								result+='<td class="tabel_no_kedukaan'+$i+'">';
									result+=temp_detail[$i]['no_kedukaan'];								
								result+='</td>';
								result+='<td class="tabel_nama_anggota'+$i+'">';
									result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
								result+='</td>';	
								result+='<td class="tabel_tanggal_meninggal'+$i+'">';
									result+=temp_detail[$i]['tanggal_meninggal'];
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
										result+='<button style="margin-left:10px;" type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_kedukaan">';
											result+='Detail/Edit';
										result+='</button>';
										result+='<input type="hidden" value='+$i+' />';
										result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
										result+='<button style="margin-left:10px;" type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_kedukaan">';
											result+='Delete';
										result+='</button>';
									result+='</div>';	
								result+='</td>';
							result+='</tr>';						
						}
						result += '</tbody>';
					result += '</table>';
					
					// $('#f_result_body_kedukaan').html(result);
					$('#f_result_kedukaan').html(result);
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);
					$('#f_result_kedukaan').html("<p>Hasil pencarian tidak didapatkan.</p>");
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
					
					// $('#f_result_body_kedukaan').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");
				}
				/*
				alert("Berhasil cari data kedukaan");				
				
				if(response != "no result")
				{
					var result = "";	
					//set value di tabel result
					for($i = 0; $i < response.length; $i++)
					{
						result+= '<tr>';
							result+='<td>';
								result+=response[$i]['no_kedukaan'];								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_depan_anggota']+' '+response[$i]['nama_tengah_anggota']+' '+response[$i]['nama_belakang_anggota'];								
							result+='</td>';
							result+='<td>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_kedukaan">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_kedukaan">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';						
					}
					
					$('#f_result_body_kedukaan').html(result);
				}					
				else				
				{					
					$('#f_result_body_kedukaan').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
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
			url: "{{URL('admin/change_visible_kedukaan')}}",
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
	
	//click edit button
	$('body').on('click', '.detailButton', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$id = $(this).prev().val();		
		$index = $(this).prev().prev().val();
		
		temp = $(this).prev().prev().val();
		
		//set value di detail view												
		$('#f_edit_nomor_kedukaan').val(temp_detail[$index]['no_kedukaan']);
		$('#f_edit_tanggal_meninggal').val(temp_detail[$index]['tanggal_meninggal']);
		$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);
		
		//clear background
		$('#f_edit_nomor_kedukaan').css('background-color','#FFFFFF');		
		$('#f_edit_tanggal_meninggal').css('background-color','#FFFFFF');		
		$('#f_edit_keterangan').css('background-color','#FFFFFF');		
				
		/*
		$data = {
			'id' : $id
		};
		
		$.ajax({
			type: 'GET',
			url: "{{URL('user/detail_kedukaan')}}",
			data : {
				'data' : $data
			},
			success: function(response){				
				// alert(JSON.stringify(response));
				
				//set value di detail view												
				$('#f_edit_nomor_kedukaan').val(response['no_kedukaan']);
				$('#f_edit_tanggal_meninggal').val(response['tanggal_meninggal']);
				$('#f_edit_keterangan').val(response['keterangan']);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("error");
				alert(errorThrown);
			}
		});
		*/
		
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
	});
	
	//click delete button
	$('body').on('click', '.deleteButton', function(){
		$id = $(this).prev().val();
		temp = $(this).prev().prev().val();				
	});
</script>

@include('pages.__admin.__olah.popup_edit_kedukaan')
@include('pages.__admin.__olah.popup_delete_warning_kedukaan')
@include('pages.__popup_video.popup_video_olah_kedukaan')

@stop