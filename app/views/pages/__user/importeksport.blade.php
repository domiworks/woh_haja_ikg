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
							<div class="col-xs-4">
								<input type="button" class="btn btn-success pull-left" id="f_import_kebaktian" value="import data kebaktian" />
								<input type='file' class='hidden' id='excel_import_kebaktian' />
							</div>
							<div class="col-xs-6">
								<input type="button" class="btn btn-warning pull-left" id="f_eksport_kebaktian" value="eksport data kebaktian" />
								<p style="display:inline;margin-left:10px;">untuk tahun pelayanan :</p>
								<select class="form-control" id="f_tahun_pelayanan_kebaktian" style="width:150px;display:inline;">
									<option value="2012-2013">2012-2013</option>
									<option value="2013-2014">2013-2014</option>
									<option value="2014-2015">2014-2015</option>
									<option value="2015-2016">2015-2016</option>
									<option value="2016-2017">2016-2017</option>
									<option value="2017-2018">2017-2018</option>
									<option value="2018-2019">2018-2019</option>
									<option value="2019-2020">2019-2020</option>									
								</select>
							</div>
							<div class="pull-right">
								<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_import_eksport_kebaktian" />
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
							<div class="col-xs-4">
								<input type="button" class="btn btn-success pull-left" id="f_import_anggota" value="import data anggota" />
								<input type='file' class='hidden' id='excel_import_anggota' />
							</div>
							<div class="col-xs-6">								
								<input type="button" class="btn btn-warning pull-left" id="f_eksport_anggota" value="eksport data anggota" />								
								<p style="display:inline;margin-left:10px;">untuk tahun pelayanan :</p>
								<select class="form-control" id="f_tahun_pelayanan_anggota" style="width:150px;display:inline;">
									<option value="2012-2013">2012-2013</option>
									<option value="2013-2014">2013-2014</option>
									<option value="2014-2015">2014-2015</option>
									<option value="2015-2016">2015-2016</option>
									<option value="2016-2017">2016-2017</option>
									<option value="2017-2018">2017-2018</option>
									<option value="2018-2019">2018-2019</option>
									<option value="2019-2020">2019-2020</option>																
								</select>
							</div>
							<div class="pull-right">
								<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_import_eksport_anggota" />
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
		$tahun_pelayanan = $('#f_tahun_pelayanan_kebaktian').val();
		var arr_tahun_pelayanan = $tahun_pelayanan.split("-");
		var tahun_awal = arr_tahun_pelayanan[0];
		var tahun_akhir = arr_tahun_pelayanan[1];
		//window.open("{{URL('user/export_kegiatan')}}/"+{{Session::get('id_gereja')}}+"/"+$tahun_pelayanan,'_blank');
		window.open("{{URL('user/export_kegiatan')}}/"+{{Session::get('id_gereja')}}+"/"+tahun_awal+"/"+tahun_akhir,'_blank');
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
				alert(textStatus);
				alert('error');
				alert(errorThrown);
				$('.f_loader_container').addClass('hidden');
			}
		});
	});
	
	//eksport data anggota
	$('body').on('click', '#f_eksport_anggota', function(){
		$tahun_pelayanan = $('#f_tahun_pelayanan_anggota').val();	
		var arr_tahun_pelayanan = $tahun_pelayanan.split("-");
		var tahun_awal = arr_tahun_pelayanan[0];
		var tahun_akhir = arr_tahun_pelayanan[1];	
		window.open("{{URL('user/export_anggota')}}/"+{{Session::get('id_gereja')}}+"/"+tahun_awal+"/"+tahun_akhir,'_blank');
	});
</script>

@include('pages.__popup_video.popup_video_import_eksport_kebaktian')
@include('pages.__popup_video.popup_video_import_eksport_anggota')

@stop