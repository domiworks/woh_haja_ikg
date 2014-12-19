@extends('layouts.default')
@section('content')	
<div class="container">
	<div class="row ">
		<div class="col-lg-6 col-lg-push-3">
			<div class="s_tbl s_set_height_window">
				<div class="s_cl">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login</h3>
						</div>
						<div class="panel-body">
							{{ Form::open(array('url' => '/signin', 'class'=>'form-horizontal')) }}

							<div class="form-group">
								<label class="control-label col-lg-4">Username</label>
								<div class="col-lg-6">
									{{ Form::text('username', Input::old('username'), array('placeholder'=>'username', 'class'=>'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4">Password</label>
								<div class="col-lg-6">
									{{ Form::password('password', array('placeholder'=>'password','class' => 'form-control'), Input::old('password')) }}	
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4"><!-- kosong --></label>
								<div class="col-lg-6">
									{{ Form::checkbox('remember_me', 'yes', null, ['style' => 'margin-top: 8px;']) }}
									Remember me
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-lg-4"></label>
								<div class="col-lg-6">
									{{ Form::submit('Login', array('class' => 'btn btn-success')) }}						
								</div>
							</div>
							
							{{ Form::token() }}
							{{ Form::close() }}	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop