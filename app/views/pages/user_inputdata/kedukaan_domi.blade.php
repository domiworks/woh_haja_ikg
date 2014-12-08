@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">Kedukaan</li>
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
							Nomor Kedukaan
						</label>
						<div class="col-xs-6">
							{{ Form::text('nomor_kedukaan', Input::old('nomor_kedukaan'), array('id' => 'f_nomor_kedukaan', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Meninggal
						</label>
						<div class="col-xs-6">
							{{ Form::text('tanggal_meninggal', Input::old('tanggal_meninggal'), array('id' => 'f_tanggal_meninggal', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
						<script>
						jQuery('#f_tanggal_meninggal').datetimepicker({
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
						<label class="col-xs-4 control-label">
							Jemaat yang meninggal
						</label>
						<div class="col-xs-6">
							@if($list_anggota == null)
								<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
							@else
								{{Form::select('list_jemaat', $list_anggota, Input::old('list_jemaat'), array('id'=>'f_list_jemaat', 'class'=>'form-control'))}}
							@endif	
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>					
					<div class="form-group">	
						<div class="col-xs-6 col-xs-push-3">
							@if($list_anggota == null)
								<input type="button" id="f_post_kedukaan" class="btn btn-success" value="Simpan Data Kedukaan" disabled=true />
							@else							
								<input type="button" id="f_post_kedukaan" class="btn btn-success" value="Simpan Data Kedukaan" />
							@endif
						</div>					
					</div>	
				</form>	
			</div>	
		</div>	
	</div>	

<script>
	$('body').on('click', '#f_post_kedukaan', function(){		
		$no_kedukaan = $('#f_nomor_kedukaan').val();
		$tanggal_meninggal = $('#f_tanggal_meninggal').val();
		$id_jemaat = $('#f_list_jemaat').val();
		// $id_gereja = $('#f_list_gereja').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_kedukaan' : $no_kedukaan,
			// 'id_gereja' : $id_gereja,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan,
			'tanggal_meninggal' : $tanggal_meninggal
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_kedukaan')}}",
			data: {
				'data' : $data
			},
			success: function(response){					
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data kedukaan");
					// location.reload();
					window.location = '{{URL::route('view_inputdata_kedukaan')}}';
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