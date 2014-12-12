@extends('layouts.admin_layout')
@section('content')

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="">
		<div>
			@include('includes.sidebar.sidebar_01')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->
		<!--<ol class="breadcrumb">
			<li><a href="#">Olah Data</a></li>
			<li class="active">Kebaktian</li>
		</ol>-->

		<!-- script buat pop up -->
		<script>
			$(document).ready(function(){				
				$('#f_edit_nama_pengkotbah').attr('disabled', true);		
				$('#f_edit_pengkotbah').attr('disabled', false);				
					//set nama pembicara di awal
					var selected = $('#f_edit_pengkotbah').find(":selected").text();
					$('#f_edit_nama_pengkotbah').val(selected);	
			});
		</script>
						
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
							KEBAKTIAN
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Kebaktian</label> 
								<div class="col-xs-5">								
									{{Form::text('nama_kebaktian', Input::old('nama_kebaktian'), array('id'=>'f_nama_kebaktian', 'class'=>'form-control'))}}
								</div>
										
							</div>				
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Pengkotbah</label> 
								<div class="col-xs-5">
									{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_nama_pengkotbah', 'class'=>'form-control'))}}
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
								<label class="col-xs-4 control-label">Antara jam </label> 
								<div class="col-xs-2">
									{{ Form::text('jam_awal', Input::old('jam_awal'), array('id' => 'f_jam_awal', 'class'=>'form-control')) }}
								</div>
								<div class="col-xs-2">
									{{ Form::text('jam_akhir', Input::old('jam_akhir'), array('id' => 'f_jam_akhir', 'class'=>'form-control')) }}
								</div>
								<script>
								jQuery('#f_jam_awal').datetimepicker({
									datepicker:false,
							 // allowTimes:[
							  // '12:00', '13:00', '15:00', 
							  // '17:00', '17:05', '17:20', '19:00', '20:00'
							 // ]
							 format:'H:i'
							});
								jQuery('#f_jam_akhir').datetimepicker({
									datepicker:false,
									format:'H:i'
								});
								</script>
							</div>			
							<div class="form-group">
								<label class="col-xs-4 control-label">Banyak jemaat yang hadir</label> 
								<div class="col-xs-2">
									{{ Form::text('batas_bawah_hadir_jemaat', Input::old('batas_bawah_hadir_jemaat'), array('id' => 'f_batas_bawah_hadir_jemaat', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
								<div class="col-xs-2"> 
									{{ Form::text('batas_atas_hadir_jemaat', Input::old('batas_atas_hadir_jemaat'), array('id' => 'f_batas_atas_hadir_jemaat', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Banyak simpatisan yang hadir</label> 
								<div class="col-xs-2">
									{{ Form::text('batas_bawah_hadir_simpatisan', Input::old('batas_bawah_hadir_simpatisan'), array('id' => 'f_batas_bawah_hadir_simpatisan', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
								<div class="col-xs-2"> 
									{{ Form::text('batas_atas_hadir_simpatisan', Input::old('batas_atas_hadir_simpatisan'), array('id' => 'f_batas_atas_hadir_simpatisan', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Banyak penatua yang hadir</label> 
								<div class="col-xs-2">
									{{ Form::text('batas_bawah_hadir_penatua', Input::old('batas_bawah_hadir_penatua'), array('id' => 'f_batas_bawah_hadir_penatua', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)')) }} 

								</div>
								<div class="col-xs-2">
									{{ Form::text('batas_atas_hadir_penatua', Input::old('batas_atas_hadir_penatua'), array('id' => 'f_batas_atas_hadir_penatua', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Banyak pemusik yang hadir</label> 
								<div class="col-xs-2">
									{{ Form::text('batas_bawah_hadir_pemusik', Input::old('batas_bawah_hadir_pemusik'), array('id' => 'f_batas_bawah_hadir_pemusik', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }} 

								</div>
								<div class="col-xs-2">
									{{ Form::text('batas_atas_hadir_pemusik', Input::old('batas_atas_hadir_pemusik'), array('id' => 'f_batas_atas_hadir_pemusik', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)')) }}
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Banyak komisi yang hadir</label> 
								<div class="col-xs-2">
									{{ Form::text('batas_bawah_hadir_komisi', Input::old('batas_bawah_hadir_komisi'), array('id' => 'f_batas_bawah_hadir_komisi', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }} 

								</div>
								<div class="col-xs-2">
									{{ Form::text('batas_atas_hadir_komisi', Input::old('batas_atas_hadir_komisi'), array('id' => 'f_batas_atas_hadir_komisi', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
								</div>
							</div>

							<div class="form-group">
								<div class="col-xs-5 col-xs-push-4">
								<input type="button" id="f_search_kebaktian" class="btn btn-success" value="Cari Data Kebaktian"></input>
								</div>
							</div>
						</form>
					</div>
						
					<!--<div id="temp_result">					
					</div>-->
									
					<div id="f_result_kebaktian">
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										Tanggal Kebaktian
									</th>
									<th>
										Nama Kebaktian
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody id="f_result_body_kebaktian">							
								<!--
								<tr>
									<td>
										0
									</td>
									<td>
										Catie
									</td>
									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_kebaktian">
											Edit
										</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
											delete
										</button>
									</td>
								</tr>													
								-->
							</tbody>
						</table>
						
					</div>						
				</div>
			</div>
		</div>	
	</div>	
</div>	

<script>					
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	//simpen detail 
	var temp_detail = "";

	$('body').on('click', '#f_search_kebaktian', function(){		
		$nama_kebaktian = $('#f_nama_kebaktian').val();
		$nama_pendeta = $('#f_nama_pengkotbah').val();			
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$jam_awal = $('#f_jam_awal').val();
		$jam_akhir = $('#f_jam_akhir').val();		
		$batas_bawah_hadir_jemaat = $('#f_batas_bawah_hadir_jemaat').val();
		$batas_atas_hadir_jemaat = $('#f_batas_atas_hadir_jemaat').val();
		$batas_bawah_hadir_simpatisan = $('#f_batas_bawah_hadir_simpatisan').val();
		$batas_atas_hadir_simpatisan = $('#f_batas_atas_hadir_simpatisan').val();
		$batas_bawah_hadir_penatua = $('#f_batas_bawah_hadir_penatua').val();
		$batas_atas_hadir_penatua = $('#f_batas_atas_hadir_penatua').val();
		$batas_bawah_hadir_pemusik = $('#f_batas_bawah_hadir_pemusik').val();
		$batas_atas_hadir_pemusik = $('#f_batas_atas_hadir_pemusik').val();
		$batas_bawah_hadir_komisi = $('#f_batas_bawah_hadir_komisi').val();
		$batas_atas_hadir_komisi = $('#f_batas_atas_hadir_komisi').val();

		// alert($batas_bawah_hadir_jemaat);
		// alert($batas_atas_hadir_jemaat);
		// alert($batas_bawah_hadir_simpatisan);
		// alert($batas_atas_hadir_simpatisan);
		// alert($batas_bawah_hadir_penatua);
		// alert($batas_atas_hadir_penatua);
		// alert($batas_bawah_hadir_pemusik);
		// alert($batas_atas_hadir_pemusik);
		// alert($batas_bawah_hadir_komisi);
		// alert($batas_atas_hadir_komisi);		
		
		
		$data = {
			'nama_kebaktian' : $nama_kebaktian,			
			'nama_pendeta' : $nama_pendeta,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'jam_awal' : $jam_awal,
			'jam_akhir' : $jam_akhir,			
			'batas_bawah_hadir_jemaat' : $batas_bawah_hadir_jemaat,
			'batas_atas_hadir_jemaat' : $batas_atas_hadir_jemaat,
			'batas_bawah_hadir_simpatisan' : $batas_bawah_hadir_simpatisan,
			'batas_atas_hadir_simpatisan' : $batas_atas_hadir_simpatisan,
			'batas_bawah_hadir_penatua' : $batas_bawah_hadir_penatua,
			'batas_atas_hadir_penatua' : $batas_atas_hadir_penatua,
			'batas_bawah_hadir_pemusik' : $batas_bawah_hadir_pemusik,
			'batas_atas_hadir_pemusik' : $batas_atas_hadir_pemusik,
			'batas_bawah_hadir_komisi' : $batas_bawah_hadir_komisi,
			'batas_atas_hadir_komisi' : $batas_atas_hadir_komisi
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_kebaktian')}}",
			data : {
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
					var result = '';
					for($i = 0; $i < temp_detail.length; $i++)
					{						
						//set value di tabel result
						result+= '<tr>';
							result+='<td>';
								result+=temp_detail[$i]['tanggal_mulai'];								
							result+='</td>';
							result+='<td>';
								result+=temp_detail[$i]['nama_jenis_kegiatan'];						
								// result+=temp_detail[$i]['id'];
							result+='</td>';
							result+='<td>';
								result+='<input type="hidden" value='+$i+' />';
								result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
								result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_kebaktian">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_kebaktian">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';						
					}
					
					$('#f_result_body_kebaktian').html(result);		
				}
				else
				{
					alert(result.messages);
					$('#f_result_body_kebaktian').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");
				}
				
				// alert("Berhasil cari data kebaktian");												
				// temp_detail = response;
												
				/*				
				if(response != "no result")
				{
					// alert('data kebaktian didapatkan');
					// var result = '<table class="table table-bordered"><thead><tr><th>No. Anggota</th><th>Nama Depan Anggota</th><th></th></tr></thead><tbody>';	
					var result = '';
					for($i = 0; $i < response.length; $i++)
					{						
						//set value di tabel result
						result+= '<tr>';
							result+='<td>';
								result+=response[$i]['tanggal_mulai'];								
							result+='</td>';
							result+='<td>';
								result+=response[$i]['nama_jenis_kegiatan'];						
								// result+=response[$i]['id'];
							result+='</td>';
							result+='<td>';
								result+='<input type="hidden" value='+$i+' />';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_kebaktian">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value='+response[$i]['id']+' />';
								result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_kebaktian">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';						
					}
					
					$('#f_result_body_kebaktian').html(result);					
										
				}								
				else				
				{
					$('#f_result_body_kebaktian').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");
				}	
				*/				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("error");
				alert(errorThrown);
			}
		},'json');
				
	});
	
	//click edit button
	$('body').on('click', '.detailButton', function(){
		$id = $(this).prev().val();		
		$index = $(this).prev().prev().val();
			
		if(temp_detail[$index]['id_jenis_kegiatan'] == null)
		{
			$('#f_edit_check_kebaktian_lain').val(1);
			$('#f_edit_check_kebaktian_lain').prop('checked', true);				
			$('#f_edit_nama_kebaktian').attr('disabled', false);	
			$('#f_edit_kebaktian_ke').attr('disabled', true);
		}				
		else
		{
			$('#f_edit_kebaktian_ke').val(temp_detail[$index]['id_jenis_kegiatan']);
		}
		$('#f_edit_nama_kebaktian').val(temp_detail[$index]['nama_jenis_kegiatan']);	
		if(temp_detail[$index]['id_pendeta'] == null)
		{
			$('#f_edit_check_pembicara_luar').val(1);
			$('#f_edit_check_pembicara_luar').prop('checked', true);				
			$('#f_edit_nama_pengkotbah').attr('disabled', false);	
			$('#f_edit_pengkotbah').attr('disabled', true);
		}
		else
		{
			$('#f_edit_pengkotbah').val(temp_detail[$index]['id_pendeta']);
		}
		$('#f_edit_nama_pengkotbah').val(temp_detail[$index]['nama_pendeta']);	
		$('#f_edit_tanggal_mulai').val(temp_detail[$index]['tanggal_mulai']);	
		$('#f_edit_tanggal_selesai').val(temp_detail[$index]['tanggal_selesai']);	
		$('#f_edit_jam_mulai').val(temp_detail[$index]['jam_mulai']);	
		$('#f_edit_jam_selesai').val(temp_detail[$index]['jam_selesai']);	
		$('#f_edit_tanggal_mulai').val(temp_detail[$index]['tanggal_mulai']);					
		$('#f_edit_banyak_jemaat_pria').val(temp_detail[$index]['banyak_jemaat_pria']);	
		$('#f_edit_banyak_jemaat_wanita').val(temp_detail[$index]['banyak_jemaat_wanita']);	
		$('#f_edit_banyak_jemaat').val(temp_detail[$index]['banyak_jemaat']);	
		$('#f_edit_banyak_simpatisan_pria').val(temp_detail[$index]['banyak_simpatisan_pria']);	
		$('#f_edit_banyak_simpatisan_wanita').val(temp_detail[$index]['banyak_simpatisan_wanita']);	
		$('#f_edit_banyak_simpatisan').val(temp_detail[$index]['banyak_simpatisan']);	
		$('#f_edit_banyak_penatua_pria').val(temp_detail[$index]['banyak_penatua_pria']);	
		$('#f_edit_banyak_penatua_wanita').val(temp_detail[$index]['banyak_penatua_wanita']);	
		$('#f_edit_banyak_penatua').val(temp_detail[$index]['banyak_penatua']);	
		$('#f_edit_banyak_pemusik_pria').val(temp_detail[$index]['banyak_pemusik_pria']);	
		$('#f_edit_banyak_pemusik_wanita').val(temp_detail[$index]['banyak_pemusik_wanita']);	
		$('#f_edit_banyak_pemusik').val(temp_detail[$index]['banyak_pemusik']);	
		$('#f_edit_banyak_komisi_pria').val(temp_detail[$index]['banyak_komisi_pria']);	
		$('#f_edit_banyak_komisi_wanita').val(temp_detail[$index]['banyak_komisi_wanita']);	
		$('#f_edit_banyak_komisi').val(temp_detail[$index]['banyak_komisi']);	
		$('#f_edit_jumlah_persembahan').val(temp_detail[$index]['jumlah_persembahan']);
		$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);
		
		$('#f_edit_id_persembahan').val(temp_detail[$index]['id_persembahan']);
		
		// $data = {
			// 'id' : $id
		// };
		
		
		/*
		$.ajax({
			type: 'GET',
			url: "{{URL('user/detail_kebaktian')}}",
			data : {
				'data' : $data
			},
			success: function(response){				
				// alert(JSON.stringify(response));
				
				//set value di detail view								
				if(response['id_jenis_kegiatan'] == null)
				{
					$('#f_edit_check_kebaktian_lain').val(1);
					$('#f_edit_check_kebaktian_lain').prop('checked', true);				
					$('#f_edit_nama_kebaktian').attr('disabled', false);	
					$('#f_edit_kebaktian_ke').attr('disabled', true);
				}				
				else
				{
					$('#f_edit_kebaktian_ke').val(response['id_jenis_kegiatan']);
				}
				$('#f_edit_nama_kebaktian').val(response['nama_jenis_kegiatan']);	
				if(response['id_pendeta'] == null)
				{
					$('#f_edit_check_pembicara_luar').val(1);
					$('#f_edit_check_pembicara_luar').prop('checked', true);				
					$('#f_edit_nama_pengkotbah').attr('disabled', false);	
					$('#f_edit_pengkotbah').attr('disabled', true);
				}
				else
				{
					$('#f_edit_pengkotbah').val(response['id_pendeta']);
				}
				$('#f_edit_nama_pengkotbah').val(response['nama_pendeta']);	
				$('#f_edit_tanggal_mulai').val(response['tanggal_mulai']);	
				$('#f_edit_tanggal_selesai').val(response['tanggal_selesai']);	
				$('#f_edit_jam_mulai').val(response['jam_mulai']);	
				$('#f_edit_jam_selesai').val(response['jam_selesai']);	
				$('#f_edit_tanggal_mulai').val(response['tanggal_mulai']);					
				$('#f_edit_banyak_jemaat_pria').val(response['banyak_jemaat_pria']);	
				$('#f_edit_banyak_jemaat_wanita').val(response['banyak_jemaat_wanita']);	
				$('#f_edit_banyak_jemaat').val(response['banyak_jemaat']);	
				$('#f_edit_banyak_simpatisan_pria').val(response['banyak_simpatisan_pria']);	
				$('#f_edit_banyak_simpatisan_wanita').val(response['banyak_simpatisan_wanita']);	
				$('#f_edit_banyak_simpatisan').val(response['banyak_simpatisan']);	
				$('#f_edit_banyak_penatua_pria').val(response['banyak_penatua_pria']);	
				$('#f_edit_banyak_penatua_wanita').val(response['banyak_penatua_wanita']);	
				$('#f_edit_banyak_penatua').val(response['banyak_penatua']);	
				$('#f_edit_banyak_pemusik_pria').val(response['banyak_pemusik_pria']);	
				$('#f_edit_banyak_pemusik_wanita').val(response['banyak_pemusik_wanita']);	
				$('#f_edit_banyak_pemusik').val(response['banyak_pemusik']);	
				$('#f_edit_banyak_komisi_pria').val(response['banyak_komisi_pria']);	
				$('#f_edit_banyak_komisi_wanita').val(response['banyak_komisi_wanita']);	
				$('#f_edit_banyak_komisi').val(response['banyak_komisi']);	
				$('#f_edit_jumlah_persembahan').val(response['jumlah_persembahan']);
				$('#f_edit_keterangan').val(response['keterangan']);
				
				$('#f_edit_id_persembahan').val(response['id_persembahan']);
				
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
	});
	
</script>

@include('pages.user_olahdata.popup_edit_kebaktian')
@include('pages.user_olahdata.popup_delete_warning_kebaktian')

@stop