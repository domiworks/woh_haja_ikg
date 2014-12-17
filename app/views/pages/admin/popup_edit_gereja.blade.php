<div class="modal fade popup_edit_gereja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Gereja</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Gereja</label>
						<div class="col-xs-5">
							{{Form::text('nama_gereja', Input::old('nama_gereja'), array('id' => 'f_edit_nama_gereja', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>							
					<div class="form-group">
						<label class="col-xs-4 control-label">Alamat</label>
						<div class="col-xs-5">
							{{Form::textarea('alamat', Input::old('alamat'), array('id'=>'f_edit_alamat', 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label"> Kota</label>
						<div class="col-xs-5">
							{{Form::text('kota', Input::old('kota'), array('id' => 'f_edit_kota', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>	
					<div class="form-group">
						<label class="col-xs-4 control-label"> Kodepos</label>
						<div class="col-xs-5">
							{{Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_edit_kodepos', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label"> Telepon</label>
						<div class="col-xs-5">
							{{Form::text('telepon', Input::old('telepon'), array('id' => 'f_edit_telepon', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Status</label>
						<div class="col-xs-5">
							@if($list_status_gereja == null)
								<p class="control-label pull-left">(tidak ada daftar status gereja)</p>
							@else
								{{Form::select('status', $list_status_gereja, Input::old('status'), array('id'=>'f_edit_status', 'class'=>'form-control'))}} 
							@endif								
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Gereja Induk</label>
						<div class="col-xs-5">
							<?php
								$new_list_gereja = array(
									'-1' => 'pilih!'
								);
								
								foreach($list_gereja as $id => $key)
								{
									$new_list_gereja[$id] = $key;
								}
							?>
							@if($list_gereja == null)
								<p class="control-label pull-left">(tidak ada daftar status gereja)</p>
							@else
								{{Form::select('list_gereja', $new_list_gereja, Input::old('list_gereja'), array('id'=>'f_edit_list_gereja', 'class'=>'form-control'))}} 
							@endif														
						</div>
					</div>					
				</form>
				
			</div>
			<div class="modal-footer">
				<input type="button" value="Simpan Perubahan" id="f_edit_post_gereja" class="btn btn-success" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_gereja', function(){		
		$nama = $('#f_edit_nama_gereja').val();
		$alamat = $('#f_edit_alamat').val();
		$kota = $('#f_edit_kota').val();
		$kodepos = $('#f_edit_kodepos').val();
		$telp = $('#f_edit_telepon').val();
		$status = $('#f_edit_status').val();
		$list_gereja = $('#f_edit_list_gereja').val();
		
		$data = {
			'id' : $id,
			'nama' : $nama,
			'alamat' : $alamat,
			'kota' : $kota,
			'kodepos' : $kodepos, 
			'telp' : $telp,
			'status' : $status,
			'id_parent_gereja' : $list_gereja
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/edit_gereja')}}",
			data: {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);				
				
				if(result.code==200)
				{
					alert(result.messages);
					window.location = '{{URL::route('admin_view_input_gereja')}}';
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