@extends('layouts.admin_layout')
@section('content')
<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="">
		<div>
			@include('includes.sidebar.sidebar_00')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->
		<ol class="breadcrumb">
			<li><a href="#">Input Data</a></li>
			<li class="active">DKH</li>
		</ol>


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
								<div class="col-xs-0">
									*
								</div>							
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Jemaat
								</label>
								<div class="col-xs-6">
									@if($list_jemaat == null)
									<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
									@else								
									{{Form::select('nama_jemaat', $list_jemaat, Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}
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
									@if($list_jemaat == null)
									<input type="button" id="f_post_dkh" class="btn btn-success" value="Simpan Data Dkh" disabled=true />
									@else
									<input type="button" id="f_post_dkh" class="btn btn-success" value="Simpan Data Dkh" />
									@endif									
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
			
			var json_data = JSON.stringify($data);
			
			$.ajax({
				type: "POST",
				url: "{{URL('user/post_dkh')}}",
				data: {
			// 'data' : $data
			'json_data' : json_data
		},
		success: function(response){				
			result = JSON.parse(response);
			if(result.code==201)
			{
				alert(result.messages);
				window.location = '{{URL::route('view_inputdata_dkh')}}';
			}
			else
			{
				alert(result.messages);
			}
			// alert(result.code);
			// alert(result.status);
			/*
			if(response == "berhasil")
			{	
				alert("Berhasil simpan data dkh");
				// location.reload();
				window.location = '{{URL::route('view_inputdata_dkh')}}';
			}
			else
			{
				alert(response);
			}
			*/
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	},'json');
		});
</script>

</div>
</div>
@stop