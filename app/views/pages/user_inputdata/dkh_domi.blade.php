@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">DKH</li>
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
	>-->
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
								Nomor Dkh
							</label>
							<div class="col-xs-6">
								{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh', 'class'=>'form-control'))}}
							</div>			
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Nama Jemaat
							</label>
							<div class="col-xs-6">
								{{Form::select('nama_jemaat', $list_jemaat, Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}
							</div>
						</div>		
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Keterangan
							</label>
							<div class="col-xs-6">
								{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
							</div>
						</div>						
						<div class="form-group">
							<div class="col-xs-6 col-xs-push-3">
								<button id="f_post_dkh" class="btn btn-success">Simpan Data Dkh</button>
							</div>	
						</div>
					</form>	
				</div>	
			</div>	
		</div>	
	</div>	
	
	<script>
	$('body').on('click', '#f_post_dkh', function(){
		$no_dkh = $('#f_nomor_dkh').val();
		$id_jemaat = $('#f_nama_jemaat').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_dkh' : $no_dkh,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan
		};
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_dkh')}}",
			data: {
				'data' : $data
			},
			success: function(response){				
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data kedukaan");
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