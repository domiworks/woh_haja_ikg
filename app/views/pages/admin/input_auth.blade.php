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
				
				<!-- INI PANEL BUAT TAMBAH AUTH -->
				<div style="margin-top: 15px;" class="panel panel-default">	
					<div class="panel-group" style="margin-bottom: 0px;" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<strong>tambah data akun baru</strong>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<!-- form -->
									<form class="form-horizontal">
										<div class="form-group">
											<label class="col-xs-4 control-label">Username</label>
											<div class="col-xs-5">
												{{Form::text('username', Input::old('username'), array('id' => 'f_username', 'class' => 'form-control'))}}
											</div>
											<div class="col-xs-0">
												*
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-4 control-label">Password</label>
											<div class="col-xs-5">
												{{Form::password('password', array('id' => 'f_password', 'class' => 'form-control'))}}
											</div>
											<div class="col-xs-0">
												*
											</div>
										</div>	
										<div class="form-group">
											<label class="col-xs-4 control-label">Gereja</label>
											<div class="col-xs-5">
												@if($list_gereja == null)
													<p class="control-label pull-left">(tidak ada daftar gereja)</p>
												@else
													{{Form::select('list_gereja', $list_gereja, Input::old('list_gereja'), array('id'=>'f_list_gereja', 'class'=>'form-control'))}}
												@endif	
											</div>
											<div class="col-xs-0">
												*
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-6 col-xs-push-5">
												@if($list_gereja == null)
													<input type="button" value="Simpan Data Akun" id="f_post_auth" class="btn btn-success" disabled=true />
												@else
													<input type="button" value="Simpan Data Akun" id="f_post_auth" class="btn btn-success" />
												@endif												
											</div>
										</div>
									</form>
								</div>	
							</div>	
						</div>	
					</div>	
				</div>	
				
				<!-- INI PANEL BUAT SHOW SELURUH DATA AUTH -->
				<div style="margin-top: 15px;" class="panel panel-default">
					<table class="table">
						<thead>
							<tr class="active">
								<td class="col-md-2"><strong>ID Akun</strong></td>
								<td class="col-md-4"><strong>Username</strong></td>								
								<td class="col-md-4"><!-- edit delete --></td>
							</tr>								
						</thead>
						<tbody>
							<!-- set variable javascript biar ga usah get detail lagi -->
							<script>
								var data_auth = new Array();
								$(document).ready(function(){

									//reset kalau sampai reload page
									data_auth = new Array();
									
									//insert ke data jenisatestasi ke variable javascript
									<?php
										foreach($data_auth as $auth)
										{
									?>	
											data_auth[data_auth.length] = <?php echo $auth; ?>
									<?php		
										}
									?>
									
									// alert(data_gereja[1]['nama']);
									// var data_gereja = '';
									// alert(data_gereja[1]);
									// alert(arr_gereja);
								});
							</script>
							<!-- set list auth -->
							<?php $index = 0; ?>
							@foreach($data_auth as $auth)
								<tr>
									<td>{{$auth->id}}</td>
									<td>{{$auth->username}}</td>									
									<td>										
										<div class="pull-right">
										
											<input type="hidden" value="{{$auth->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_auth">Detail / Edit</button>			
											<input type="hidden" value="{{$auth->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_auth">Delete</button>
										</div>	
										<!-- index++ -->
										<?php $index++; ?>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>									
				</div>	
				
			</div>			
		</div>		
	</div>
</div>	

<script>		
	//click detail/edit button
	$('body').on('click', '.detailButton', function(){
		$id = $(this).prev().prev().val();
		$index = $(this).prev().val();
		
		// set value di popup detail/edit
		$('#f_edit_username').val(data_auth[$index]['username']);		
		
	});
	
	//click delete button
	$('body').on('click', '.deleteButton', function(){
		$id = $(this).prev().prev().val();
		$index = $(this).prev().val();
			
	});
	
	$('body').on('click', '#f_post_auth', function(){
		$username = $('#f_username').val();
		$password = $('#f_password').val();		
		$gereja = $('#f_list_gereja').val();
		
		$data = {
			'username' : $username,
			'password' : $password,
			'gereja' : $gereja
		};				
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/post_auth')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					window.location = '{{URL::route('admin_view_input_auth')}}';
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

@include('pages.admin.popup_edit_auth')
@include('pages.admin.popup_delete_warning_auth')

@stop