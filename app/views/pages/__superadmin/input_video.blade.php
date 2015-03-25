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
						<div class="row">
							<div class="col-xs-3">
								Input Data Kebaktian
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_kebaktian', array('name' => 'video_input_kebaktian', 'id' => 'f_video_input_kebaktian', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="1" />
								<input type="button" id="f_post_video_input_kebaktian" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />
						<div class="row">
							<div class="col-xs-3">
								Input Data Anggota
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_anggota', array('name' => 'video_input_anggota', 'id' => 'f_video_input_anggota', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="2" />
								<input type="button" id="f_post_video_input_anggota" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Input Data Baptis
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_baptis', array('name' => 'video_input_baptis', 'id' => 'f_video_input_baptis', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="3" />
								<input type="button" id="f_post_video_input_baptis" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Input Data Atestasi
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_atestasi', array('name' => 'video_input_atestasi', 'id' => 'f_video_input_atestasi', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="4" />
								<input type="button" id="f_post_video_input_atestasi" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Input Data Pernikahan
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_pernikahan', array('name' => 'video_input_pernikahan', 'id' => 'f_video_input_pernikahan', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="5" />
								<input type="button" id="f_post_video_input_pernikahan" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Input Data Kedukaan
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_kedukaan', array('name' => 'video_input_kedukaan', 'id' => 'f_video_input_kedukaan', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="6" />
								<input type="button" id="f_post_video_input_kedukaan" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Input Data Dkh
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_input_dkh', array('name' => 'video_input_dkh', 'id' => 'f_video_input_dkh', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="7" />
								<input type="button" id="f_post_video_input_dkh" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Kebaktian
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_kebaktian', array('name' => 'video_olah_kebaktian', 'id' => 'f_video_olah_kebaktian', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="8" />
								<input type="button" id="f_post_video_olah_kebaktian" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Anggota
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_anggota', array('name' => 'video_olah_anggota', 'id' => 'f_video_olah_anggota', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="9" />
								<input type="button" id="f_post_video_olah_anggota" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Baptis
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_baptis', array('name' => 'video_olah_baptis', 'id' => 'f_video_olah_baptis', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="10" />
								<input type="button" id="f_post_video_olah_baptis" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Atestasi
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_atestasi', array('name' => 'video_olah_atestasi', 'id' => 'f_video_olah_atestasi', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="11" />
								<input type="button" id="f_post_video_olah_atestasi" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Pernikahan
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_pernikahan', array('name' => 'video_olah_pernikahan', 'id' => 'f_video_olah_pernikahan', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="12" />
								<input type="button" id="f_post_video_olah_pernikahan" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Kedukaan
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_kedukaan', array('name' => 'video_olah_kedukaan', 'id' => 'f_video_olah_kedukaan', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="13" />								
								<input type="button" id="f_post_video_olah_kedukaan" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Olah Data Dkh
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_olah_dkh', array('name' => 'video_olah_dkh', 'id' => 'f_video_olah_dkh', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="14" />
								<input type="button" id="f_post_video_olah_dkh" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Laporan Kebaktian
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_laporan_kebaktian', array('name' => 'video_laporan_kebaktian', 'id' => 'f_video_laporan_kebaktian', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="15" />
								<input type="button" id="f_post_video_laporan_kebaktian" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Laporan Persembahan
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_laporan_persembahan', array('name' => 'video_laporan_persembahan', 'id' => 'f_video_laporan_persembahan', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="16" />
								<input type="button" id="f_post_video_laporan_persembahan" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Laporan Anggota
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_laporan_anggota', array('name' => 'video_laporan_anggota', 'id' => 'f_video_laporan_anggota', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="17" />
								<input type="button" id="f_post_video_laporan_anggota" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Import Eksport Kebaktian
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_import_eksport_kebaktian', array('name' => 'video_import_eksport_kebaktian', 'id' => 'f_video_import_eksport_kebaktian', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">
								<input type="hidden" value="18" />
								<input type="button" id="f_post_video_import_eksport_kebaktian" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>	
						<hr />	
						<div class="row">
							<div class="col-xs-3">
								Import Eksport Anggota
							</div>							
							<div class="col-xs-3">
								{{ Form::file('video_import_eksport_anggota', array('name' => 'video_import_eksport_anggota', 'id' => 'f_video_import_eksport_anggota', 'accept' => 'video/mp4')) }}
							</div>				
							<div class="col-xs-4">			
								<input type="hidden" value="19" />					
								<input type="button" id="f_post_video_import_eksport_anggota" class="btn btn-success" value="Upload" style="margin-left:30px;" />
							</div>			
						</div>								
					</div>					
				</div>	
				
			</div>			
		</div>		
	</div>
</div>	

<script>		
	$('body').on('click', '#f_post_video_input_kebaktian', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_kebaktian').val() != "")
		{			
			$video = $('#f_video_input_kebaktian')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});

	$('body').on('click', '#f_post_video_input_anggota', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_anggota').val() != "")
		{			
			$video = $('#f_video_input_anggota')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_input_baptis', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_baptis').val() != "")
		{			
			$video = $('#f_video_input_baptis')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_input_atestasi', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_atestasi').val() != "")
		{			
			$video = $('#f_video_input_atestasi')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_input_pernikahan', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_pernikahan').val() != "")
		{			
			$video = $('#f_video_input_pernikahan')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_input_kedukaan', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_kedukaan').val() != "")
		{			
			$video = $('#f_video_input_kedukaan')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_input_dkh', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_input_dkh').val() != "")
		{			
			$video = $('#f_video_input_dkh')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_kebaktian', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_kebaktian').val() != "")
		{			
			$video = $('#f_video_olah_kebaktian')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_anggota', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_anggota').val() != "")
		{			
			$video = $('#f_video_olah_anggota')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_baptis', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_baptis').val() != "")
		{			
			$video = $('#f_video_olah_baptis')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_atestasi', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_atestasi').val() != "")
		{			
			$video = $('#f_video_olah_atestasi')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_pernikahan', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_pernikahan').val() != "")
		{			
			$video = $('#f_video_olah_pernikahan')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_kedukaan', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_kedukaan').val() != "")
		{			
			$video = $('#f_video_olah_kedukaan')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_olah_dkh', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_olah_dkh').val() != "")
		{			
			$video = $('#f_video_olah_dkh')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_laporan_kebaktian', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_laporan_kebaktian').val() != "")
		{			
			$video = $('#f_video_laporan_kebaktian')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_laporan_persembahan', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_laporan_persembahan').val() != "")
		{			
			$video = $('#f_video_laporan_persembahan')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_laporan_anggota', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_laporan_anggota').val() != "")
		{			
			$video = $('#f_video_laporan_anggota')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_import_eksport_kebaktian', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_import_eksport_kebaktian').val() != "")
		{			
			$video = $('#f_video_import_eksport_kebaktian')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
	$('body').on('click', '#f_post_video_import_eksport_anggota', function(){		
		// //START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		var data, xhr;
		data = new FormData();

		if($('#f_video_import_eksport_anggota').val() != "")
		{			
			$video = $('#f_video_import_eksport_anggota')[0].files[0];
		}		
		else		
		{
			$video = "";
		}
		data.append('video', $video);					

		$kode = $(this).prev().val();
		data.append('kode', $kode);		

		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_video')}}",
			data : data,
			processData: false,
			contentType: false,				
			success: function(response){				
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);							
					location.reload();
				}
				else
				{
					alert(result.messages);									
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}				
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
</script>

@stop