@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->

<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">Pernikahan</li>
</ol>

<div class="s_content">

	<div class="container-fluid">
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
		<div class="panel panel-default col-md-9">
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
						<div class="col-xs-5">{{Form::text('nama_pendeta', Input::old('nama_pendeta'), array('id'=>'f_nama_pendeta', 'class'=>'form-control'))}}</div>
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
							<button id="f_search_pernikahan" class="btn btn-success">Cari Data Pernikahan</button>
						</div>
					</div>
				</form>
			</div>

			<div id="f_result_pernikahan">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								No. Anggota
							</th>
							<th>
								Nama Depan Anggota
							</th>
							<th>
								Perintah
							</th>
						</tr>
					</thead>
					<tbody>
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
						<tr>
							<td>
								1
							</td>
							<td>
								Wayne
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
						<tr>
							<td>
								2
							</td>
							<td>
								Boxxy
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
					</tbody>
				</table>
			</div>
		</div>	
	</div>	
</div>	

<script>
$('body').on('click', '#f_search_pernikahan', function(){
	$no_pernikahan = $('#f_nomor_pernikahan').val();		
	$tanggal_awal = $('#f_tanggal_awal').val();
	$tanggal_akhir = $('#f_tanggal_akhir').val();
	$nama_pendeta = $('#f_nama_pendeta').val();
		// $id_gereja = $('#f_id_gereja').val();
		$nama_mempelai_wanita = $('#f_nama_mempelai_wanita').val();
		$nama_mempelai_pria = $('#f_nama_mempelai_pria').val();		
		
		$data = {
			'no_pernikahan' : $no_pernikahan,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'nama_pendeta' : $nama_pendeta,
			// 'id_gereja' : $id_gereja,
			'nama_pria' : $nama_mempelai_pria,
			'nama_wanita' : $nama_mempelai_wanita
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/search_pernikahan')}}",
			data: {
				'data' : $data
			},
			success: function(response){
				alert("Berhasil cari data pernikahan");				
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['no_pernikahan']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_pernikahan').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_pernikahan').html("<p>No result</p>");					
				}
				
				// alert(JSON.stringify(response));
				// if(response == "berhasil")
				// {	
					// alert("Berhasil simpan data pernikahan");
					// location.reload();
				// }
				// else
				// {
					// alert(response);
				// }
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
		
	});
</script>

@include('pages.user_olahdata.popup_edit_pernikahan')
@stop