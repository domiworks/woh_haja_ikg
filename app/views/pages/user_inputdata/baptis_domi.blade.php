@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">Baptis</li>
</ol>

<!-- <div class="s_sidebar"> -->
<!-- input data-->


<!-- olahdata -->
<!--
	<ul>
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
	</ul>
-->
<!-- </div> -->

<div class="s_content">
	<div class="container-fluid">
		<div class="col-md-3 panel panel-default ">
			<ul>		
				<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
				<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
			</ul>
		</div>
		<div class="panel panel-default col-md-9">
			<div class="panel-body">
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="nomor_baptis" id="f_nomor_baptis" class="form-control">
						</div>			
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pembaptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="pembaptis" id="f_pembaptis" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat
						</label>

						<div class="col-xs-6">
							<input type="text" name="jemaat" id="f_jemaat" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jenis Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="jenis_baptis" id="f_jenis_baptis" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="tanggal_baptis" id="f_tanggal_baptis" class="form-control">
						</div>
						<script>
						jQuery('#f_tanggal_baptis').datetimepicker({
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
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_post_baptis" class="btn btn-success">Simpan Data Baptis</button>
						</div>
					</div>
				</form>	

			</div>	
		</div>	
	</div>	
</div>	

<script>
$('body').on('click', '#f_post_baptis', function(){
	$nomor_baptis = $('#f_nomor_baptis').val();
	$pembaptis = $('#f_pembaptis').val();
	$jemaat = $('#f_jemaat').val();
	$jenis_baptis = $('#f_jenis_baptis').val();
		// $gereja = $('#f_id_gereja').val();
		$tanggal_baptis = $('#f_tanggal_baptis').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'id_jemaat' : $jemaat,
			'id_pendeta' : $pembaptis,
			'tanggal_baptis' : $tanggal_baptis,
			'id_jenis_baptis' : $jenis_baptis,
			// 'id_gereja' : $gereja
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data baptis");
					location.reload();
				}
				else
				{
					alert(response);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
</script>	

@stop