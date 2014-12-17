@extends('layouts.admin_layout')
@section('content')

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="">
		<div>
			@include('includes.sidebar.sidebar_admin_inputdata')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->		
	
		<div class="s_content">
			<div class="container-fluid">
				<div style="margin-top: 15px;" class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							JENIS KEBAKTIAN
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Jenis Kebaktian</label>
								<div class="col-xs-5">
									{{Form::text('nama_jenis_kebaktian', Input::old('nama_jenis_kebaktian'), array('id' => 'f_nama_jenis_kebaktian', 'class' => 'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label">Keterangan</label>
								<div class="col-xs-5">
									{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>	
							<div class="form-group">
								<div class="col-xs-6 col-xs-push-5">
									<input type="button" value="Simpan Data Jenis Kebaktian" id="f_post_jenis_kebaktian" class="btn btn-success" />
								</div>
							</div>
						</form>
					</div>
				</div>						
			</div>			
		</div>
	</div>
</div>	

<script>
	$('body').on('click', '#f_post_jenis_kebaktian', function(){
		$nama_kegiatan = $('#f_nama_jenis_kebaktian').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'nama_kegiatan' : $nama_kegiatan,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/post_jenis_kegiatan')}}",
			data : {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					window.location = '{{URL::route('admin_view_input_jenis_kegiatan')}}';
				}
				else				
				{
					alert(result.messages);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
		
	});
</script>

@stop