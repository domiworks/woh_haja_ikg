@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">Kebaktian</li>
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
						<label class="col-xs-4 control-label">Kebaktian ke</label> 
						<div class="col-xs-5">
							<select name="kebaktian_ke" id="f_kebaktian_ke" class="form-control">
								<option>ytgrsf/option>
								</select>
							</div>
						</div>				
						<div class="form-group">
							<label class="col-xs-4 control-label">Nama Pengkotbah</label> 
							<div class="col-xs-5">{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_nama_pengkotbah', 'class'=>'form-control'))}}</div>
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
							<button id="f_search_kebaktian" class="btn btn-success">Cari Data Kebaktian</button>
						</div>
						</div>
					</form>
				</div>
				<div id="f_result_kebaktian">
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
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_kebaktian">
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
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_kebaktian">
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
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_kebaktian">
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
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	$('body').on('click', '#f_search_kebaktian', function(){		
		$kebaktian_ke = $('#f_kebaktian_ke').val();
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
			'kebaktian_ke' : $kebaktian_ke,			
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
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_kebaktian')}}",
			data : {
				'data' : $data
			},
			success: function(response){				
				alert("Berhasil cari data kebaktian");
				// location.reload();					
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['id']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_kebaktian').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_kebaktian').html("<p>No result</p>");
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
</script>

@include('pages.user_olahdata.popup_edit_kebaktian')
@stop