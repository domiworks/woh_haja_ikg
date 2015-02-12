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
								<input type='file' class='hidden' id='excel_import_kebaktian' />
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
								<input type='file' class='hidden' id='excel_import_anggota' />
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
		$('#excel_import_kebaktian').click();
	});
	
	$('body').on('change','#excel_import_kebaktian',function(){
		$('.f_loader_container').removeClass('hidden');
		$excel = '';
		//get file
		var i = 0, len = this.files.length, img, reader, file;
		for ( ; i < len; i++ ) {
			file = this.files[i];
			$excel = file;
		}
		
		
		//ajax
		$formData = new FormData();
		$formData.append('excel_file',$excel);
		$.ajax({
			type: 'POST',
			// url: "{{--URL('user/import_kegiatan')--}}/"+{{--$header['id_gereja']--}},
			url: "{{URL('user/import_kegiatan')}}/"+{{Session::get('id_gereja')}},
			data: $formData,
			processData:false,
			contentType:false,
			success: function(response){
				alert(response);
				$('.f_loader_container').addClass('hidden');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				$('.f_loader_container').addClass('hidden');
			}
		});
	});
	
	//eksport data kebaktian
	$('body').on('click', '#f_eksport_kebaktian', function(){
		window.open("{{URL('user/export_kegiatan')}}/"+0+'/'+2,'_blank');
		/*$.ajax({
			type: 'GET',
			url: "{{URL('user/export_kegiatan')}}/"+0+'/'+2,
			success: function(response){
				//alert(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		});*/
	});
	
	//import data anggota
	$('body').on('click', '#f_import_anggota', function(){
		$('#excel_import_anggota').click();
	});		
	
	$('body').on('change','#excel_import_anggota',function(){
		$('.f_loader_container').removeClass('hidden');
		$excel = '';
		//get file
		var i = 0, len = this.files.length, img, reader, file;
		for ( ; i < len; i++ ) {
			file = this.files[i];
			$excel = file;
		}
		
		
		//ajax
		$formData = new FormData();
		$formData.append('excel_file',$excel);
		$.ajax({
			type: 'POST',
			// url: "{{--URL('user/import_kegiatan')--}}/"+{{--$header['id_gereja']--}},
			url: "{{URL('user/import_anggota')}}/"+{{Session::get('id_gereja')}},
			data: $formData,
			processData:false,
			contentType:false,
			success: function(response){
				alert(response);
				$('.f_loader_container').addClass('hidden');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				$('.f_loader_container').addClass('hidden');
			}
		});
	});
	
	//eksport data anggota
	$('body').on('click', '#f_eksport_anggota', function(){
		
	});
</script>

@stop