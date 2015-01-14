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
			<li class="active">Anggota</li>
		</ol>-->		

		<!--<div class="s_table_search">-->
		<div class="s_content">
			<div class="container-fluid">
				<!--
				<div class="col-md-3 panel panel-default ">
					<ul>		
						<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
						<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
					</ul>
				</div>
				-->
				<!--div class="panel panel-default col-md-9"-->
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							ANGGOTA
						</h3>
					</div>
					<div class="panel-body">						
						<form class="form-horizontal">								
							<div class="form-group">
								<label class="col-xs-4 control-label">Nomor anggota</label> 
								<div class="col-xs-3">
									{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_nomor_anggota', 'class'=>'form-control')) }}
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama</label> 
								<div class="col-xs-4">
									{{ Form::text('nama', Input::old('nama'), array('id' => 'f_nama', 'class'=>'form-control')) }} 
								</div>						
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">Tanggal lahir antara </label> 
								<div class="col-xs-2">

									{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }} 
								</div>
								<div class="col-xs-2">
									{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
								</div>								
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">Kota</label> 
								<div class="col-xs-3">
									{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota', 'class'=>'form-control')) }}  
								</div>						
							</div>		
							<div class="form-group">		
								<label class="col-xs-4 control-label">Jenis kelamin</label> 				
								<div class="col-xs-2">
									<?php
										$list_gender = array();
										$list_gender[''] = 'pilih!';
										$list_gender[0] = 'wanita';
										$list_gender[1] = 'pria';
									?>
									{{ Form::select('gender', $list_gender, Input::old('gender'), array('id' => 'f_gender', 'class'=>'form-control')) }}
									
									
									{{-- Form::radio('gender', '1', true, array('id'=>'f_jenis_kelamin')) --}} <!--pria-->    {{-- Form::radio('gender', '0', '', array('id'=>'f_jenis_kelamin')) --}} <!--wanita-->
								</div>															
							</div>		
							<div class="form-group">
								<label class="col-xs-4 control-label">Wilayah</label> 
								<div class="col-xs-2">
									<!--
									<select name="wilayah" id="f_wilayah" class="form-control">
										<option>bla</option>
									</select>  
									-->
									{{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_wilayah', 'class'=>'form-control')) }}
								</div>						
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Golongan darah</label> 
								<div class="col-xs-2">
									<!--<select name="gol_darah" id="f_gol_darah" class="form-control">
										<option>bla</option>
									</select> -->
									{{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_gol_darah', 'class'=>'form-control')) }}
								</div>						
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Pendidikan </label> 
								<div class="col-xs-2">
									<!--
									<select name="pendidikan" id="f_pendidikan" class="form-control">
										<option>bla</option>
									</select>  
									-->
									{{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_pendidikan', 'class'=>'form-control')) }}
								</div>						
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Pekerjaan</label> 
								<div class="col-xs-2">
									<!--
									<select name="pekerjaan" id="f_pekerjaan" class="form-control">
										<option>bla</option>
									</select>  
									-->
									{{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_pekerjaan', 'class'=>'form-control')) }}
								</div>						
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Etnis</label> 
								<div class="col-xs-2">
									<!--
									<select name="etnis" id="f_etnis" class="form-control">
										<option>bla</option>
									</select>  
									-->
									{{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_etnis', 'class'=>'form-control')) }}
								</div>						
							</div>
									
							<div class="form-group">
								<label class="col-xs-4 control-label">Status</label> 
								<div class="col-xs-2">
									<!--
									<select name="status" id="f_status" class="form-control">
										<option>bla</option>
									</select>  
									-->
									<?php 
										$new_list_role = array();
										$new_list_role[''] = 'pilih!';
										foreach($list_role as $key => $role)
										{
											$new_list_role[$key] = $role;
										}
									?>									
									{{ Form::select('status', $new_list_role, Input::old('status'), array('id' => 'f_status', 'class'=>'form-control')) }}
								</div>						
							</div>
							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">		
									<input type="button" id="f_search_anggota" class="btn btn-success" value="Cari Anggota"></input>
								</div>
							</div>
						</form>		
					</div>

					<!--<div id="temp_result">
					</div>-->
					
					<div id="f_result_anggota">
						<!--<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										No. Anggota
									</th>
									<th>
										Nama Anggota
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_anggota">-->
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_anggota">
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

$('body').on('change','#f_edit_foto',function(){
	var i = 0, len = this.files.length, img, reader, file;			
	for ( ; i < len; i++ ) {
		file = this.files[i];
		if (!!file.type.match(/image.*/)) {
			if ( window.FileReader ) {
				reader = new FileReader();
				reader.onloadend = function (e) { 										
					$('#show_foto').attr('src', e.target.result);																	
				};
				reader.readAsDataURL(file);
			}
			imageUpload = file;
		}	
	}
});

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}

//simpen detail 
var temp_detail = "";

//global variable buat ajax ganti view
var temp = '';
	
$('body').on('click', '#f_search_anggota', function(){			

	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
		
	var data, xhr;
	data = new FormData();
	
	// $gereja = $('#f_list_gereja').val();
	// data.append('gereja', $gereja);
	
	$nomor_anggota = $('#f_nomor_anggota').val();			
	data.append('no_anggota', $nomor_anggota);	
	// alert($nomor_anggota);
	$nama = $('#f_nama').val();	
	data.append('nama', $nama);
	// alert($nama);
	$kota = $('#f_kota').val();
	data.append('kota', $kota);		
	// alert($kota);
	// $gender = $('input[name="gender"]:checked').val()	
	$gender = $('#f_gender').val();
	data.append('gender', $gender);			
	
	// alert($gender);
	$wilayah = $('#f_wilayah').val();	
	data.append('wilayah', $wilayah);			
	// alert($wilayah);
	$gol_darah = $('#f_gol_darah').val();		
	data.append('gol_darah', $gol_darah);
	// alert($gol_darah);
	$pendidikan = $('#f_pendidikan').val();	
	data.append('pendidikan', $pendidikan);
	// alert($pendidikan);
	$pekerjaan = $('#f_pekerjaan').val();	
	data.append('pekerjaan', $pekerjaan);
	// alert($pekerjaan);
	$etnis = $('#f_etnis').val();	
	data.append('etnis', $etnis);		
	// alert($etnis);
	// $tanggal_lahir = $('#f_tanggal_lahir').val();	
		// data.append('tanggal_lahir', $tanggal_lahir);
	$tanggal_awal = $('#f_tanggal_awal').val();
	data.append('tanggal_awal', $tanggal_awal);
	$tanggal_akhir = $('#f_tanggal_akhir').val();
	data.append('tanggal_akhir', $tanggal_akhir);
	// alert($tanggal_lahir);
	// $anggota_gereja = $('#f_id_gereja').val();			
		// data.append('id_gereja', $anggota_gereja);		
	// alert($anggota_gereja);
	$role = $('#f_status').val();
	data.append('role', $role);	
	// alert($role);
		
	$.ajax({
		type: 'POST',
		url: "{{URL('admin/search_anggota')}}",
		data : data,
		processData: false,
		contentType: false,	
		success: function(response){	
			// alert('hemmm');
			
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
								result += 'No. Anggota';
							result += '</th>';
							result += '<th>';
								result += 'Nama Anggota';
							result += '</th>';
							result += '<th>';
								result += 'Status';
							result += '</th>';
							result += '<th>';
								result += 'Visible';
							result += '</th>';
							result += '<th>';
								
							result += '</th>';
						result += '</tr>';
					result += '</thead>';
					result += '<tbody id="f_result_body_anggota">';
					//set value di tabel result
					for($i = 0; $i < temp_detail.length; $i++)
					{
						result+= '<tr class="tabel_row'+$i+'">';
							result+='<td class="tabel_no_anggota'+$i+'">';
								result+=temp_detail[$i]['no_anggota'];								
							result+='</td>';
							result+='<td class="tabel_nama_anggota'+$i+'">';
								result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
							result+='</td>';
							result+='<td class="tabel_status'+$i+'">';
								//set status
								if(temp_detail[$i]['role'] == 1)
								{
									result+='jemaat';
								}
								else if(temp_detail[$i]['role'] == 2)
								{
									result+='pendeta';
								}
								else if(temp_detail[$i]['role'] == 3)
								{
									result+='penatua';
								}
								else if(temp_detail[$i]['role'] == 4)
								{
									result+='majelis';
								}
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
									result+='<input type="hidden" value='+temp_detail[$i]['id_anggota']+' />';
									result+='<button type="button" class="btn btn-warning visibleButton">Ganti Visible</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id_anggota']+' />';
									result+='<button style="margin-left:10px;" type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_anggota">';
										result+='Detail/Edit';
									result+='</button>';
									result+='<input type="hidden" value='+$i+' />';
									result+='<input type="hidden" value='+temp_detail[$i]['id_anggota']+' />';
									result+='<button style="margin-left:10px;" type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_anggota">';
										result+='Delete';
									result+='</button>';
								result+='</div>';	
							result+='</td>';
						result+='</tr>';							
					
					}
					result+='</tbody>';
				result+='</table>';					
					
				$('#f_result_anggota').html(result);
				// $('#f_result_body_anggota').html(result);										
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
			else				
			{
				alert(result.messages);
				$('#f_result_anggota').html("<p>Hasil pencarian tidak didapatkan.</p>");
				
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
				// $('#f_result_body_anggota').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");
			}
			
		
		// alert(response.length);
		
		/*
		var temp;				
		if(response.length > 0)
		{
			alert(response.length);
			for($i = 0 ; $i < response.length ; $i++)
			{
				// temp += response[$i]['nama_depan']+",";
				alert(response[$i]['nama_depan']);
			}
			// alert(temp);
		}
		else
		{
			alert(response);
		}
		*/
		
		// if(response == true)
		// {	
			// alert("Berhasil simpan data anggota");
		// }
		// else
		// {
			// alert(response);
		// }
		
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('error');
			alert(errorThrown);
			//END LOADER				
			$('.f_loader_container').addClass('hidden');
		}
	},'json');	
	
});

//simpen last index
var lastIdx = 2;

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
		url: "{{URL('admin/change_visible_anggota')}}",
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
	$id = $(this).prev().val();
	$index = $(this).prev().prev().val();
	
	temp = $(this).prev().prev().val();
	
	//reset 	
	lastIdx = 2;
	
	//set value di table pop up detail
	$('#f_edit_nomor_anggota').val(temp_detail[$index]['no_anggota']);
	$('#f_edit_nama_depan').val(temp_detail[$index]['nama_depan']);
	$('#f_edit_nama_tengah').val(temp_detail[$index]['nama_tengah']);
	$('#f_edit_nama_belakang').val(temp_detail[$index]['nama_belakang']);
	$('#f_edit_telp').val(temp_detail[$index]['telp']);		
	if(temp_detail[$index]['gender'] == 0)
	{
		$("#f_edit_jenis_kelamin_0").prop("checked", true);
	}
	else
	{
		$("#f_edit_jenis_kelamin_1").prop("checked", true);
	}	
	$('#f_edit_wilayah').val(temp_detail[$index]['wilayah']);
	$('#f_edit_gol_darah').val(temp_detail[$index]['gol_darah']);
	$('#f_edit_pendidikan').val(temp_detail[$index]['pendidikan']);
	$('#f_edit_pekerjaan').val(temp_detail[$index]['pekerjaan']);
	$('#f_edit_etnis').val(temp_detail[$index]['etnis']);
	$('#f_edit_kota_lahir').val(temp_detail[$index]['kota_lahir']);
	$('#f_edit_tanggal_lahir').val(temp_detail[$index]['tanggal_lahir']);
	// $('#f_edit_').val(temp_detail[$index]['tanggal_meninggal']);
	$('#f_edit_status').val(temp_detail[$index]['role']);
	// $('#f_edit_').val(temp_detail[$index]['foto']);
	//foto
	if(temp_detail[$index]['foto'] == '' || temp_detail[$index]['foto'] == null)
	{
		$('#edit_show_foto').attr('src', '');
		
	}
	else
	{
		var cobafoto = temp_detail[$index]['foto'];
		// $('#edit_show_foto').attr('src', 'http://localhost/gki_git/public/'+temp_detail[$index]['foto'] );
		$('#edit_show_foto').attr('src', '{{URL::to("/'+cobafoto+'")}}' );
	}
	$('#f_edit_alamat').val(temp_detail[$index]['jalan']); //alamat
	$('#f_edit_kota').val(temp_detail[$index]['kota']);
	$('#f_edit_kodepos').val(temp_detail[$index]['kodepos']);
	
	$temp_arr_hp = temp_detail[$index]['arr_hp'];
	if($temp_arr_hp.length > 0)
	{
		$('#f_edit_hp1').val($temp_arr_hp[0]);
		$('#edit_addHp').html("");
		for($i = 1; $i < $temp_arr_hp.length; $i++)
		{
			var newRow = "";							
			newRow +="<input style='width:200px; margin-top:10px;' type='text' id='f_edit_hp"+lastIdx+"' class='form-control' name='hp"+lastIdx+"' value='"+$temp_arr_hp[$i]+"' onkeypress='return isNumberKey(event)'/>";
			newRow +="<input type='button' value='X' id='delHp"+lastIdx+"' onClick='delHp()' />";
			$('#delHp'+(lastIdx-1)).hide();
			$('#edit_addHp').append(newRow);
			if(lastIdx==5){
				$('#edit_refHp').hide();									
			}
			lastIdx++;							
		}
	}	
});	

//click delete button
$('body').on('click', '.deleteButton', function(){
	$id = $(this).prev().val();	
	temp = $(this).prev().prev().val();
});	

</script>

@include('pages.admin.popup_edit_anggota')
@include('pages.admin.popup_delete_warning_anggota')

@stop