@extends('layouts.user_layout')
@section('content')

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="">
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
			<li class="active">Pernikahan</li>
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
				<div style="margin-top: 15px;" class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							PERNIKAHAN
						</h3>
					</div>
				
					<div class="panel-body">
						<form class="form-horizontal">	
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor Pernikahan</label> 
								<div class="col-xs-5">{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan', 'class'=>'form-control')) }}</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Antara tanggal </label> 
								<div class="col-xs-2">
									{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-2">
									{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
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
								</script>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Pendeta yang memberkati</label> 
								<div class="col-xs-5">
									<?php 
										$new_list_pendeta = array(
											'-1' => 'pilih!'
										);								
										
										foreach($list_pendeta as $id => $key)
										{
											$new_list_pendeta[$id] = $key;
										}
									?>
									@if($list_pendeta == null)
										<p class="control-label pull-left">(tidak ada daftar pendeta)</p>
									@else
										{{Form::select('nama_pendeta', $new_list_pendeta, Input::old('nama_pendeta'), array('id'=>'f_id_pendeta', 'class'=>'form-control'))}}
									@endif							
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Mempelai Wanita</label> 
								<div class="col-xs-5">{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita', 'class'=>'form-control')) }}</div>
							</div>		
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Mempelai Pria</label> 
								<div class="col-xs-5">{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria', 'class'=>'form-control')) }}</div>
							</div>
							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">
									@if($list_pendeta == null)
										<input type="button" id="f_search_pernikahan" class="btn btn-success" value="Cari Data Pernikahan" disabled=true/>
									@else
										<input type="button" id="f_search_pernikahan" class="btn btn-success" value="Cari Data Pernikahan"></input>
									@endif							
								</div>
							</div>
						</form>
					</div>

					<!--<div id="temp_result">					
					</div>-->
					
					<div id="f_result_pernikahan">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Pernikahan
									</th>
									<th>
										Mempelai Pria
									</th>
									<th>
										Mempelai Wanita
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_pernikahan">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_pernikahan">
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
	//simpen detail 
	var temp_detail = "";

	//global variable buat ajax ganti view
	var temp = '';
	
	$('body').on('click', '#f_search_pernikahan', function(){
		$no_pernikahan = $('#f_nomor_pernikahan').val();		
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$id_pendeta = $('#f_id_pendeta').val();
			// $id_gereja = $('#f_id_gereja').val();
		$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
		$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();		
		
		$data = {
			'no_pernikahan' : $no_pernikahan,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'id_pendeta' : $id_pendeta,
					// 'id_gereja' : $id_gereja,
			'nama_pria' : $nama_mempelai_pria,
			'nama_wanita' : $nama_mempelai_wanita
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_pernikahan')}}",
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
					result += '<table class="table table-bordered">';
						result += '<thead>';
							result += '<tr>';
								result += '<th>';
									result += 'No. Pernikahan';
								result += '</th>';
								result += '<th>';
									result += 'Mempelai Pria';
								result += '</th>';
								result += '<th>';
									result += 'Mempelai Wanita';
								result += '</th>';
								result += '<th>';
									
								result += '</th>';
							result += '</tr>';
						result += '</thead>';
						result += '<tbody id="f_result_body_pernikahan">';
						//set value di table result
						for($i = 0; $i < temp_detail.length; $i++)
						{
							result+= '<tr class="tabel_row'+$i+'">';
								result+='<td class="tabel_no_pernikahan'+$i+'">';
									result+=temp_detail[$i]['no_pernikahan']								
								result+='</td>';
								result+='<td class="tabel_nama_pria'+$i+'">';
									result+=temp_detail[$i]['nama_pria'];								
								result+='</td>';
								result+='<td class="tabel_nama_wanita'+$i+'">';
									result+=temp_detail[$i]['nama_wanita'];								
								result+='</td>';
								result+='<td>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-warning detailButton " data-toggle="modal" data-target=".popup_edit_pernikahan">';
										result+='Edit';
									result+='</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_pernikahan">';
										result+='delete';
									result+='</button>';
								result+='</td>';
							result+='</tr>';					
						}	
						result += '</tbody>';
					result += '</table>';
					// $('#f_result_body_pernikahan').html(result);
					$('#f_result_pernikahan').html(result);
				}
				else
				{
					alert(result.messages);
					$('#f_result_pernikahan').html("<p>Hasil pencarian tidak didapatkan.</p>");
					// $('#f_result_body_pernikahan').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");							
				}				
				/*
				alert("Berhasil cari data pernikahan");				
				
				if(response != "no result")
				{
					var result = "";									
					//set value di table result
					for($i = 0; $i < response.length; $i++)
					{
						result+= '<tr>';
							result+='<td>';
								result+=response[$i]['no_pernikahan']								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_pria'];								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_wanita'];								
							result+='</td>';
							result+='<td>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-warning detailButton " data-toggle="modal" data-target=".popup_edit_pernikahan">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_pernikahan">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';					
					}				
					$('#f_result_body_pernikahan').html(result);
				}					
				else				
				{
					$('#f_result_body_pernikahan').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
				}
				*/				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');		
	});
	
	//click detail button
	$('body').on('click', '.detailButton', function(){
		$id = $(this).prev().val();		
		$index = $(this).prev().prev().val();
		
		temp = $(this).prev().prev().val();
		
		//set value di detail view												
		if(temp_detail[$index]['id_jemaat_wanita'] == null)
		{
			$('#f_edit_check_jemaat_wanita').val(1);
			$('#f_edit_check_jemaat_wanita').prop('checked', true);				
			$('#f_edit_nama_mempelai_wanita').attr('disabled', false);	
			$('#f_edit_list_jemaat_wanita').attr('disabled', true);
		}				
		else
		{
			$('#f_edit_check_jemaat_wanita').val(0);
			$('#f_edit_check_jemaat_wanita').prop('checked', false);									
			$('#f_edit_list_jemaat_wanita').val(temp_detail[$index]['id_jemaat_wanita']);
			
			$('#f_edit_nama_mempelai_wanita').attr('disabled', true);
			$('#f_edit_list_jemaat_wanita').attr('disabled', false);
		}
		$('#f_edit_nama_mempelai_wanita').val(temp_detail[$index]['nama_wanita']);	
		if(temp_detail[$index]['id_jemaat_pria'] == null)
		{
			$('#f_edit_check_jemaat_pria').val(1);
			$('#f_edit_check_jemaat_pria').prop('checked', true);				
			$('#f_edit_nama_mempelai_pria').attr('disabled', false);	
			$('#f_edit_list_jemaat_pria').attr('disabled', true);
		}				
		else
		{
			$('#f_edit_check_jemaat_pria').val(0);
			$('#f_edit_check_jemaat_pria').prop('checked', false);
			
			$('#f_edit_list_jemaat_pria').val(temp_detail[$index]['id_jemaat_pria']);
			$('#f_edit_nama_mempelai_pria').attr('disabled', true);
			$('#f_edit_list_jemaat_pria').attr('disabled', false);					
		}
		$('#f_edit_nama_mempelai_pria').val(temp_detail[$index]['nama_pria']);	
		$('#f_edit_nomor_pernikahan').val(temp_detail[$index]['no_pernikahan']);		
		$('#f_edit_tanggal_pernikahan').val(temp_detail[$index]['tanggal_pernikahan']);
		$('#f_edit_id_pendeta').val(temp_detail[$index]['id_pendeta']);
		$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);
				
		/*
		$data = {
			'id' : $id
		};
		
		$.ajax({
			type: 'GET',
			url: "{{URL('user/detail_pernikahan')}}",
			data : {
				'data' : $data
			},
			success: function(response){												
				//set value di detail view												
				if(response['id_jemaat_wanita'] == null)
				{
					$('#f_edit_check_jemaat_wanita').val(1);
					$('#f_edit_check_jemaat_wanita').prop('checked', true);				
					$('#f_edit_nama_mempelai_wanita').attr('disabled', false);	
					$('#f_edit_list_jemaat_wanita').attr('disabled', true);
				}				
				else
				{
					$('#f_edit_check_jemaat_wanita').val(0);
					$('#f_edit_check_jemaat_wanita').prop('checked', false);									
					$('#f_edit_list_jemaat_wanita').val(response['id_jemaat_wanita']);
					
					$('#f_edit_nama_mempelai_wanita').attr('disabled', true);
					$('#f_edit_list_jemaat_wanita').attr('disabled', false);
				}
				$('#f_edit_nama_mempelai_wanita').val(response['nama_wanita']);	
				if(response['id_jemaat_pria'] == null)
				{
					$('#f_edit_check_jemaat_pria').val(1);
					$('#f_edit_check_jemaat_pria').prop('checked', true);				
					$('#f_edit_nama_mempelai_pria').attr('disabled', false);	
					$('#f_edit_list_jemaat_pria').attr('disabled', true);
				}				
				else
				{
					$('#f_edit_check_jemaat_pria').val(0);
					$('#f_edit_check_jemaat_pria').prop('checked', false);
					
					$('#f_edit_list_jemaat_pria').val(response['id_jemaat_pria']);
					$('#f_edit_nama_mempelai_pria').attr('disabled', true);
					$('#f_edit_list_jemaat_pria').attr('disabled', false);					
				}
				$('#f_edit_nama_mempelai_pria').val(response['nama_pria']);	
				$('#f_edit_nomor_pernikahan').val(response['no_pernikahan']);		
				$('#f_edit_tanggal_pernikahan').val(response['tanggal_pernikahan']);
				$('#f_edit_id_pendeta').val(response['id_pendeta']);
				// $('#f_edit_id_gereja').val(response['id_gereja']);
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

@include('pages.user_olahdata.popup_edit_pernikahan')
@include('pages.user_olahdata.popup_delete_warning_pernikahan')

@stop