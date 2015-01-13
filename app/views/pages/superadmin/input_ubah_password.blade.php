@extends('layouts.superadmin_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');			
	
	});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="width:200px; background-color:white;">
		<div>
			@include('includes.sidebar.sidebar_superadmin')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->		
	
		<div class="s_content">
			<div class="container-fluid">				
				
				<!-- INI PANEL BUAT SHOW SELURUH DATA AUTH -->
				<div style="margin-top: 15px;" class="panel panel-default">
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-xs-4 control-label">Password baru</label>
								<div class="col-xs-3">
									{{Form::password('password_baru', array('id' => 'f_password_baru', 'class' => 'form-control'))}}									
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">Ulangi Password baru</label>
								<div class="col-xs-3">
									{{Form::password('password_baru_confirm', array('id' => 'f_password_baru_confirm', 'class' => 'form-control'))}}										
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>							
							<div class="form-group">								
								<div class="col-xs-6 col-xs-push-5">								
								
									<input type="button" value="Ubah Password" id="f_post_ubah_password" class="btn btn-success" />
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
	$('body').on('click', '#f_post_ubah_password', function(){
			
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
				
		$password_baru = $('#f_password_baru').val();				
		$password_baru_confirm = $('#f_password_baru_confirm').val();
		
		$data = {
			'password_baru' : $password_baru,
			'password_baru_confirm' : $password_baru_confirm
		};				
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/edit_password')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){								
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					
					location.reload();
					
					// window.location = '{{URL::route('superadmin_view_input_auth')}}';
					
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
		
	});
</script>

@stop