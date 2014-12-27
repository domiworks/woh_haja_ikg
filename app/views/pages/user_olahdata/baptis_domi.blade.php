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
		<li class="active">Baptis</li>
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
							BAPTIS
						</h3>
					</div>
					<div class="panel-body">						
						<form class="form-horizontal">	
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor Baptis</label> 
								<div class="col-xs-5">{{Form::text('nomor_baptis', Input::old('nomor_baptis'), array('id'=>'f_nomor_baptis', 'class'=>'form-control'))}} </div>			
							</div>		
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Pembaptis</label> 
								<div class="col-xs-5">
									{{--Form::text('pembaptis', Input::old('pembaptis'), array('id'=>'f_pembaptis', 'class'=>'form-control'))--}}
									<?php 
										$new_list_pembaptis = array(
											'-1' => 'pilih!'
										);									
										foreach($list_pembaptis as $id => $key)
										{
											$new_list_pembaptis[$id] = $key;
										}
									?>
									@if($list_pembaptis == null)
										<p class="control-label pull-left">(tidak ada daftar pembaptis)</p>
									@else
										{{ Form::select('pembaptis', $new_list_pembaptis, Input::old('pembaptis'), array('id'=>'f_pembaptis', 'class'=>'form-control')) }}
									@endif	
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Jemaat</label> 
								<div class="col-xs-5">{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Jenis Baptis</label> 
								<div class="col-xs-5">
									<!--<select name="jenis_baptis" id="f_jenis_baptis" class="form-control">
										<option>bla</option>
									</select>
									-->
									<?php 
										$new_list_jenis_baptis = array(
											'-1' => 'pilih!'
										);									
										foreach($list_jenis_baptis as $id => $key)
										{
											$new_list_jenis_baptis[$id] = $key;
										}
									?>
									@if($list_jenis_baptis == null)
										<p class="control-label pull-left">(tidak ada daftar jenis baptis)</p>
									@else
										{{ Form::select('jenis_baptis', $new_list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_jenis_baptis', 'class'=>'form-control')) }}
									@endif								
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
								<div class="col-xs-5 col-xs-push-4">
									@if($list_pembaptis == null || $list_jenis_baptis == null)
										<input type="button" id="f_search_baptis" class="btn btn-success" disabled=true value="Cari Data Baptis"></input>
									@else
										<input type="button" id="f_search_baptis" class="btn btn-success" value="Cari Data Baptis"></input>
									@endif								
								</div>
							</div>
						</form>	
					</div>

					<!--<div id="temp_result">						
					</div>-->
					
					<div id="f_result_baptis">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Baptis
									</th>
									<th>
										Nama Anggota
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_baptis">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_baptis">
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

	$('body').on('click', '#f_search_baptis', function(){
		$nomor_baptis = $('#f_nomor_baptis').val();
		$id_pembaptis = $('#f_pembaptis').val();
		$nama_jemaat = $('#f_jemaat').val();
		$jenis_baptis = $('#f_jenis_baptis').val();
	
		// $gereja = $('#f_id_gereja').val();
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
	
		$data = {
			'no_baptis' : $nomor_baptis,
			'nama_jemaat' : $nama_jemaat,
			'id_pembaptis' : $id_pembaptis,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'id_jenis_baptis' : $jenis_baptis
			// 'id_gereja' : $gereja
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_baptis')}}",
			data : {	
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
					result += '<table class="table table-bordered">';
						result += '<thead>';
							result += '<tr>';
								result += '<th>';
									result += 'No. Baptis';
								result += '</th>';
								result += '<th>';
									result += 'Nama Anggota';
								result += '</th>';
								result += '<th>';
									
								result += '</th>';
							result += '</tr>';
						result += '</thead>';
						result += '<tbody id="f_result_body_baptis">';
						for($i = 0; $i < temp_detail.length; $i++)
						{
							// alert(JSON.stringify(temp_detail[$i]));
							result+= '<tr class="tabel_row'+$i+'">';
								result+='<td class="tabel_no_baptis'+$i+'">';
									result+=temp_detail[$i]['no_baptis'];								
								result+='</td>';
								result+='<td class="tabel_nama_jemaat'+$i+'">';
									result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
								result+='</td>';
								result+='<td>';							
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_baptis">';
										result+='Detail/Edit';
									result+='</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
									result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_baptis">';
										result+='Delete';
									result+='</button>';
								result+='</td>';
							result+='</tr>';
						}
						result += '</tbody>';
					result += '</table>';
					
					// $('#f_result_body_baptis').html(result);
					$('#f_result_baptis').html(result);
				}
				else
				{
					alert(result.messages);
					$('#f_result_baptis').html("<p>Hasil pencarian tidak didapatkan.</p>");
					// $('#f_result_body_baptis').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
				}
				// alert(response);
				
				/*
				alert("Berhasil cari data baptis");				
				
				if(response != "no result")
				{
					// alert('data baptis didapatkan');
					var result = '';					
					
					//set value di table result
					for($i = 0; $i < response.length; $i++)
					{
						// alert(JSON.stringify(response[$i]));
						result+= '<tr>';
							result+='<td>';
								result+=response[$i]['no_baptis'];								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_depan_jemaat']+' '+response[$i]['nama_tengah_jemaat']+' '+response[$i]['nama_belakang_jemaat'];								
							result+='</td>';
							result+='<td>';								
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_baptis">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_baptis">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';
					}
					
					$('#f_result_body_baptis').html(result);
				}					
				else				
				{
					$('#f_result_body_baptis').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		},'json');	
	});
	
	//click edit button
	$('body').on('click', '.detailButton', function(){
		$id = $(this).prev().val();				
		$index = $(this).prev().prev().val();
		
		temp = $(this).prev().prev().val();
		
		$('#f_edit_nomor_baptis').val(temp_detail[$index]['no_baptis']);	
		$('#f_edit_pembaptis').val(temp_detail[$index]['id_pendeta']);	
		$('#f_edit_jemaat').val(temp_detail[$index]['id_jemaat']);	
		$('#f_edit_jenis_baptis').val(temp_detail[$index]['id_jenis_baptis']);	
		$('#f_edit_tanggal_baptis').val(temp_detail[$index]['tanggal_baptis']);					
		$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);
		/*
		$data = {
			'id' : $id			
		};
		
		$.ajax({
			type: 'GET',
			url: "{{URL('user/detail_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){				
				// alert(JSON.stringify(response));
				
				//set value di detail view				
				$('#f_edit_nomor_baptis').val(response['no_baptis']);	
				$('#f_edit_pembaptis').val(response['id_pendeta']);	
				$('#f_edit_jemaat').val(response['id_jemaat']);	
				$('#f_edit_jenis_baptis').val(response['id_jenis_baptis']);	
				$('#f_edit_tanggal_baptis').val(response['tanggal_baptis'])					
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

@include('pages.user_olahdata.popup_edit_baptis')
@include('pages.user_olahdata.popup_delete_warning_baptis')

@stop