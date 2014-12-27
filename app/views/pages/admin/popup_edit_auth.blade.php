<div class="modal fade popup_edit_auth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Akun</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">Username</label>
						<div class="col-xs-5">
							{{Form::text('username', Input::old('username'), array('id' => 'f_edit_username', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">New Password</label>
						<div class="col-xs-5">
							{{Form::password('password', array('id' => 'f_edit_password', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>								
				</form>
				
			</div>
			<div class="modal-footer">
				<input type="button" value="Simpan Perubahan" id="f_edit_post_auth" class="btn btn-success" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_auth', function(){
		$username = $('#f_edit_username').val();
		$password = $('#f_edit_password').val();		
		
		$data = {
			'username' : $username,
			'password' : $password						
		};				
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/edit_auth')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==200)
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