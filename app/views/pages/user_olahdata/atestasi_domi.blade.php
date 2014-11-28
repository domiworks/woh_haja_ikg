@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">Atestasi</li>
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
						<label class="col-xs-4 control-label">Nomor Atestasi</label>
						<div class="col-xs-5">{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi', 'class'=>'form-control')) }}</div>
					</div>					
					<div class="form-group">
						<label class="col-xs-4 control-label">Jemaat</label>
						<div class="col-xs-5">{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}</div>
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
						<label class="col-xs-4 control-label">Jenis Atestasi</label>
						<div class="col-xs-5">
							<select name="jenis_atestasi" id="f_jenis_atestasi" class="form-control">
								<option>bla</option>
							</select>  
						</div>					
					</div>					
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Gereja Lama</label>
						<div class="col-xs-5">{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'class'=>'form-control')) }}</div>
					</div>			
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Gereja Baru</label>
						<div class="col-xs-5">{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'class'=>'form-control')) }}</div>
					</div>			
					<div class="form-group">
						<div class="col-xs-5 col-xs-push-4">
							<button id="f_search_atestasi" class="btn btn-success">Cari Data Atestasi</button>
						</div>			
					</div>			
				</div>	


				<div id="f_result_anggota">
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
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_atestasi">
										Edit
									</button>
									<button type="button" class="btn btn-danger">
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
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_atestasi">
										Edit
									</button>
									<button type="button" class="btn btn-danger">
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
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_atestasi">
										Edit
									</button>
									<button type="button" class="btn btn-danger">
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
</div>	

<script>		
$('body').on('click', '#f_search_atestasi', function(){
	$no_atestasi = $('#f_nomor_atestasi').val();			
	$nama_jemaat = $('#f_jemaat').val();
	$tanggal_awal = $('#f_tanggal_awal').val();		
	$tanggal_akhir = $('#f_tanggal_akhir').val();
	$id_jenis_atestasi = $('#f_jenis_atestasi').val();		
	$nama_gereja_lama = $('#f_nama_gereja_lama').val();		
	$nama_gereja_baru = $('#f_nama_gereja_baru').val();		

	$data = {
		'no_atestasi' : $no_atestasi,
		'nama_jemaat' : $nama_jemaat,
		'tanggal_awal' : $tanggal_awal,
		'tanggal_akhir' : $tanggal_akhir,
		'id_jenis_atestasi' : $id_jenis_atestasi,			
		'nama_gereja_lama' : $nama_gereja_lama,			
		'nama_gereja_baru' : $nama_gereja_baru			
	};		

	$.ajax({
		type: "POST",
		url: "{{URL('user/search_atestasi')}}",
		data: {
			'data' : $data
		},
		success: function(response){	
			alert("Berhasil cari data atestasi");
				// alert(response);
				
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['id']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_atestasi').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_atestasi').html("<p>No result</p>");					
				}
				
				// if(response == "berhasil")
				// {	
					// alert("Berhasil search data atestasi");
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

	@include('pages.user_olahdata.popup_edit_atestasi')
@stop