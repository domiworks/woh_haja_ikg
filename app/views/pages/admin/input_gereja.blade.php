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
							GEREJA
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama Gereja</label>
								<div class="col-xs-5">
									{{Form::text('nama_gereja', Input::old('nama_gereja'), array('id' => 'f_nama_gereja', 'class' => 'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label">Alamat</label>
								<div class="col-xs-5">
									{{Form::textarea('alamat', Input::old('alamat'), array('id'=>'f_alamat', 'class'=>'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label"> Kota</label>
								<div class="col-xs-5">
									{{Form::text('kota', Input::old('kota'), array('id' => 'f_kota', 'class' => 'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label"> Kodepos</label>
								<div class="col-xs-5">
									{{Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_kodepos', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label"> Telepon</label>
								<div class="col-xs-5">
									{{Form::text('telepon', Input::old('telepon'), array('id' => 'f_telepon', 'class' => 'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Status</label>
								<div class="col-xs-5">
									@if($list_status_gereja == null)
										<p class="control-label pull-left">(tidak ada daftar status gereja)</p>
									@else
										{{Form::select('status', $list_status_gereja, Input::old('status'), array('id'=>'f_status', 'class'=>'form-control'))}} 
									@endif								
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Gereja Induk</label>
								<div class="col-xs-5">
									<?php
										$new_list_gereja = array(
											'-1' => 'pilih!'
										);
										
										foreach($list_gereja as $id => $key)
										{
											$new_list_gereja[$id] = $key;
										}
									?>
									@if($list_gereja == null)
										<p class="control-label pull-left">(tidak ada daftar status gereja)</p>
									@else
										{{Form::select('list_gereja', $new_list_gereja, Input::old('list_gereja'), array('id'=>'f_list_gereja', 'class'=>'form-control'))}} 
									@endif														
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6 col-xs-push-5">
									<input type="button" value="Simpan Data Gereja" id="f_post_gereja" class="btn btn-success" />
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
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	$('body').on('click', '#f_post_gereja', function(){
		$nama = $('#f_nama_gereja').val();
		$alamat = $('#f_alamat').val();
		$kota = $('#f_kota').val();
		$kodepos = $('#f_kodepos').val();
		$telp = $('#f_telepon').val();
		$status = $('#f_status').val();
		$list_gereja = $('#f_list_gereja').val();
		
		$data = {
			'nama' : $nama,
			'alamat' : $alamat,
			'kota' : $kota,
			'kodepos' : $kodepos, 
			'telp' : $telp,
			'status' : $status,
			'id_parent_gereja' : $list_gereja
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/post_gereja')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					window.location = '{{URL::route('admin_view_input_gereja')}}';
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