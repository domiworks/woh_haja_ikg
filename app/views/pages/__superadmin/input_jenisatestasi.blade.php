@extends('layouts.superadmin_layout')
@section('content')

<script>
	<!-- set variable javascript biar ga usah get detail lagi -->
	var data_jenis_atestasi = new Array();
	
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');									
		//reset kalau sampai reload page
		data_jenis_atestasi = new Array();
		
		//insert ke data jenisatestasi ke variable javascript
		<?php
			foreach($data_jenis_atestasi as $atestasi)
			{
		?>	
				data_jenis_atestasi[data_jenis_atestasi.length] = <?php echo $atestasi; ?>
		<?php		
			}
		?>
		
		// alert(data_gereja[1]['nama']);
		// var data_gereja = '';
		// alert(data_gereja[1]);
		// alert(arr_gereja);
									
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
				
				<!-- INI PANEL BUAT TAMBAH JENIS ATESTASI -->
				<div style="margin-top: 15px;" class="panel panel-default">	
					<div class="panel-group" style="margin-bottom: 0px;" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<strong>tambah data jenis atestasi baru</strong>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<!-- form -->
									<form class="form-horizontal">
										<div class="form-group">
											<label class="col-xs-4 control-label">Nama Jenis Atestasi</label>
											<div class="col-xs-5">
												{{Form::text('nama_jenis_atestasi', Input::old('nama_jenis_atestasi'), array('id' => 'f_nama_jenis_atestasi', 'class' => 'form-control'))}}
											</div>
											<div class="col-xs-0">
												*
											</div>
										</div>							
										<div class="form-group">
											<label class="col-xs-4 control-label">Tipe</label>
											<div class="col-xs-2">
												<select class="form-control" id="f_tipe_atestasi" >
													<option value="1">Masuk</option>
													<option value="2">Keluar</option>																									
												</select>												
											</div>											
										</div>																	
										<div class="form-group">
											<label class="col-xs-4 control-label">Keterangan</label>
											<div class="col-xs-5">
												{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
											</div>
											<div class="col-xs-0">
												*
											</div>
										</div>	
										<div class="form-group">
											<div class="col-xs-6 col-xs-push-5">
												<input type="button" value="Simpan Data Jenis Atestasi" id="f_post_jenis_atestasi" class="btn btn-success" />
											</div>
										</div>
									</form>
								</div>
								<div class="panel-footer" style="background-color: white;">
									(*) wajib diisi
								</div>
							</div>	
						</div>	
					</div>
				</div>
				
				<!-- INI PANEL BUAT SHOW SELURUH DATA JENIS ATESTASI -->
				<div style="margin-top: 15px;" class="panel panel-default">
					<table class="table">
						<thead>
							<tr class="active">
								<td class="col-md-2"><strong>ID Jenis Atestasi</strong></td>
								<td class="col-md-3"><strong>Nama Jenis Atestasi</strong></td>
								<td class="col-md-1"><strong>Tipe</strong></td>
								<td class="col-md-1"><strong>Visible</strong></td>
								<td class="col-md-4"><!-- edit delete --></td>
							</tr>								
						</thead>
						<tbody>							
							<!-- set list jenis atestasi -->
							<?php $index = 0; ?>
							@foreach($data_jenis_atestasi as $atestasi)
								<tr>
									<td class="tabel_id_jenis_atestasi<?php echo $index; ?>">{{$atestasi->id}}</td>
									<td class="tabel_nama_jenis_atestasi<?php echo $index; ?>">{{$atestasi->nama_atestasi}}</td>
									<td class="tabel_tipe_atestasi<?php echo $index; ?>"><?php if($atestasi->tipe == 1){ echo "Masuk"; }else{ echo "Keluar"; } ?></td>
									<td class="tabel_visible<?php echo $index; ?>">
										@if($atestasi->deleted == 0)
											<span style="color:green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										@else											
											<span style="color:red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										@endif
									</td>
									<td>										
										<div class="pull-right">
											<input type="hidden" value="{{$atestasi->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-warning visibleButton">Ganti Visible</button>
											<input type="hidden" value="{{$atestasi->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_jenis_atestasi">Detail / Edit</button>			
											<input type="hidden" value="{{$atestasi->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_jenis_atestasi">Delete</button>
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
	//global variable buat ajax ganti view
	var temp = '';
	
	//click change visible
	$('body').on('click', '.visibleButton', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$id = $(this).prev().prev().val();
		temp = $(this).prev().val();
		
		$data = {
			'id' : $id
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/change_visible_jenis_atestasi')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					
					// window.location = '{{URL::route('superadmin_view_input_jenis_atestasi')}}';
					
					//ganti isi row sesuai hasil edit
					// alert(result.data['deleted']);
					if(result.data['deleted'] == 0)
					{						
						$('.tabel_visible'+temp).html("<span style='color:green;' class='glyphicon glyphicon-ok' aria-hidden='true'></span>");						
					}
					else
					{							
						$('.tabel_visible'+temp).html("<span style='color:red;' class='glyphicon glyphicon-remove' aria-hidden='true'></span>");
					}	
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
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
	
	//click detail/edit button
	$('body').on('click', '.detailButton', function(){
		$id = $(this).prev().prev().val();
		$index = $(this).prev().val();
		
		temp = $(this).prev().val();
		
		//set value di popup detail/edit
		$('#f_edit_nama_jenis_atestasi').val(data_jenis_atestasi[$index]['nama_atestasi']);
		$('#f_edit_tipe_atestasi').val(data_jenis_atestasi[$index]['tipe']);
		$('#f_edit_keterangan').val(data_jenis_atestasi[$index]['keterangan']);		

		//clear background
		$('#f_edit_nama_jenis_atestasi').css('background-color','#FFFFFF');
		$('#f_edit_keterangan').css('background-color','#FFFFFF');
	});
	
	//click delete button
	$('body').on('click', '.deleteButton', function(){
		$id = $(this).prev().prev().val();
		$index = $(this).prev().val();
			
	});
	
	$('body').on('click', '#f_post_jenis_atestasi', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$nama_atestasi = $('#f_nama_jenis_atestasi').val();
		$tipe_atestasi = $('#f_tipe_atestasi').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'nama_atestasi' : $nama_atestasi,
			'tipe' : $tipe_atestasi,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/post_jenis_atestasi')}}",
			data : {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					
					location.reload();
					
					// window.location = '{{URL::route('superadmin_view_input_jenis_atestasi')}}';
				}
				else				
				{
					alert(result.messages);

					//show red background validation
					if($nama_atestasi == ""){$('#f_nama_jenis_atestasi').css('background-color','#FBE3E4');}else{$('#f_nama_jenis_atestasi').css('background-color','#FFFFFF');}
					if($keterangan == ""){$('#f_keterangan').css('background-color','#FBE3E4');}else{$('#f_keterangan').css('background-color','#FFFFFF');}

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

@include('pages.__superadmin.popup_edit_jenis_atestasi')
@include('pages.__superadmin.popup_delete_warning_jenis_atestasi')

@stop