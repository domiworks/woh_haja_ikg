@extends('layouts.user_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
	
	});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">

	<div class="s_main_side" style="">
		<div class="s_content">
			<div class="container-fluid">
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							IMPORT / EKSPORT DATA KEBAKTIAN
						</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-12">
							<div class="col-xs-3">
								<input type="button" class="btn btn-success pull-right" id="f_import_kebaktian" value="import data kebaktian" />
							</div>
							<div class="col-xs-3">
								<input type="button" class="btn btn-warning pull-right" id="f_eksport_kebaktian" value="eksport data kebaktian" />
							</div>
						</div>
					</div>
				</div>	
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							IMPORT / EKSPORT DATA ANGGOTA
						</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-12">
							<div class="col-xs-3">
								<input type="button" class="btn btn-success pull-right" id="f_import_anggota" value="import data anggota" />
							</div>
							<div class="col-xs-3">
								<input type="button" class="btn btn-warning pull-right" id="f_eksport_anggota" value="eksport data anggota" />
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>	
	</div>	
</div>	

<script>
	//import data kebaktian
	$('body').on('click', '#f_import_kebaktian', function(){
		
	});
	
	//eksport data kebaktian
	$('body').on('click', '#f_eksport_kebaktian', function(){
		
	});
	
	//import data anggota
	$('body').on('click', '#f_import_anggota', function(){
		
	});
	
	//eksport data anggota
	$('body').on('click', '#f_eksport_anggota', function(){
		
	});
</script>

@stop