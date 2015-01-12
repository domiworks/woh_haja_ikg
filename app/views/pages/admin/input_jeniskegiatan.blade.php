@extends('layouts.admin_layout')
@section('content')

<script>
	<!-- set variable javascript biar ga usah get detail lagi -->
	var data_jenis_kegiatan = new Array();
	
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');							
		//reset kalau sampai reload page
		data_jenis_kegiatan = new Array();
		
		//insert ke data jenisbaptis ke variable javascript
		<?php
			foreach($data_jenis_kegiatan as $kegiatan)
			{
		?>	
				data_jenis_kegiatan[data_jenis_kegiatan.length] = <?php echo $kegiatan; ?>
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
				
				<!-- INI PANEL BUAT TAMBAH JENIS KEGIATAN -->
				<div style="margin-top: 15px;" class="panel panel-default">	
					<div class="panel-group" style="margin-bottom: 0px;" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<strong>tambah data jenis kebaktian baru</strong>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<!-- form -->
									<form class="form-horizontal">
										<div class="form-group">
											<label class="col-xs-4 control-label">Nama Jenis Kebaktian</label>
											<div class="col-xs-5">
												{{Form::text('nama_jenis_kebaktian', Input::old('nama_jenis_kebaktian'), array('id' => 'f_nama_jenis_kebaktian', 'class' => 'form-control'))}}
											</div>
											<div class="col-xs-0">
												*
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
												<input type="button" value="Simpan Data Jenis Kebaktian" id="f_post_jenis_kebaktian" class="btn btn-success" />
											</div>
										</div>
									</form>
								</div>
							</div>	
						</div>	
					</div>
				</div>
				
				<!-- INI PANEL BUAT SHOW SELURUH DATA JENIS KEGIATAN -->
				<div style="margin-top: 15px;" class="panel panel-default">
					<table class="table">
						<thead>
							<tr class="active">
								<td class="col-md-2"><strong>ID Jenis Kebaktian</strong></td>
								<td class="col-md-4"><strong>Nama Jenis Kebaktian</strong></td>
								<td class="col-md-1"><strong>Visible</strong></td>
								<td class="col-md-4"><!-- edit delete --></td>
							</tr>								
						</thead>
						<tbody>
							
							<!-- set list jenis baptis -->
							<?php $index = 0; ?>
							@foreach($data_jenis_kegiatan as $kegiatan)
								<tr>
									<td class="tabel_id_jenis_kegiatan<?php echo $index; ?>">{{$kegiatan->id}}</td>
									<td class="tabel_nama_jenis_kegiatan<?php echo $index; ?>">{{$kegiatan->nama_kegiatan}}</td>
									<td class="tabel_visible<?php echo $index; ?>">
										@if($kegiatan->deleted == 0)
											<span style="color:green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										@else											
											<span style="color:red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										@endif
									</td>
									<td>										
										<div class="pull-right">
											<input type="hidden" value="{{$kegiatan->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-warning visibleButton">Ganti Visible</button>
											<input type="hidden" value="{{$kegiatan->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_jenis_kegiatan">Detail / Edit</button>			
											<input type="hidden" value="{{$kegiatan->id}}" />
											<input type="hidden" value="<?php echo $index; ?>" />
											<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_jenis_kegiatan">Delete</button>
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
			url: "{{URL('admin/change_visible_jenis_kegiatan')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);				
				if(result.code==200)
				{
					alert(result.messages);
					
					// window.location = '{{URL::route('admin_view_input_jenis_kegiatan')}}';
					
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
		$('#f_edit_nama_jenis_kebaktian').val(data_jenis_kegiatan[$index]['nama_kegiatan']);
		$('#f_edit_keterangan').val(data_jenis_kegiatan[$index]['keterangan']);
		
	});
	
	//click delete button
	$('body').on('click', '.deleteButton', function(){
		$id = $(this).prev().prev().val();
		$index = $(this).prev().val();
			
	});
	
	$('body').on('click', '#f_post_jenis_kebaktian', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$nama_kegiatan = $('#f_nama_jenis_kebaktian').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'nama_kegiatan' : $nama_kegiatan,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/post_jenis_kegiatan')}}",
			data : {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					
					location.reload();
					
					// window.location = '{{URL::route('admin_view_input_jenis_kegiatan')}}';
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

@include('pages.admin.popup_edit_jenis_kegiatan')
@include('pages.admin.popup_delete_warning_jenis_kegiatan')

@stop