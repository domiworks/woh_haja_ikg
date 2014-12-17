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
							ACCOUNT
						</h3>
					</div>
					<div class="panel-body">
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
								<label class="col-xs-4 control-label">Confirm Password</label>
								<div class="col-xs-5">
									{{Form::password('confirm_password',  array('id' => 'f_confirm_password', 'class' => 'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6 col-xs-push-5">
									<input type="button" value="Simpan Data Account" id="f_post_auth" class="btn btn-success" />
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
	$('body').on('click', '#f_post_auth', function(){
		$username = $('#f_username').val();
		$password = $('#f_password').val();		
		
		$data = {
			'username' : $username,
			'password' : $password						
		};				
		
		var json_data = JSON.stringify($data);
		
		/*
		$.ajax({
			type: 'POST',
			url: "{{--URL('admin/post_auth')--}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					window.location = '{{--URL::route('admin_view_input_auth')--}}';
				}
				else
				{
					alert(result.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
		*/
	});
</script>

@stop