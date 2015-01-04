@extends('layouts.admin_layout')
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
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
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
					
					location.reload();
					
					// window.location = '{{URL::route('admin_view_input_auth')}}';
					
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