<div class="modal fade popup_edit_jenis_atestasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Jenis Atestasi</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Jenis Atestasi</label>
						<div class="col-xs-5">
							{{Form::text('nama_jenis_atestasi', Input::old('nama_jenis_atestasi'), array('id' => 'f_edit_nama_jenis_atestasi', 'class' => 'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>							
					<div class="form-group">
						<label class="col-xs-4 control-label">Keterangan</label>
						<div class="col-xs-5">
							{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
				</form>
				
			</div>
			<div class="modal-footer">
				<input type="button" value="Simpan Perubahan" id="f_edit_post_jenis_atestasi" class="btn btn-success" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_jenis_atestasi', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$nama_atestasi = $('#f_edit_nama_jenis_atestasi').val();
		$keterangan = $('#f_edit_keterangan').val();
		
		$data = {
			'id' : $id,
			'nama_atestasi' : $nama_atestasi,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
				
		$.ajax({
			type: 'POST',
			url: "{{URL('superadmin/edit_jenis_atestasi')}}",
			data : {
				'json_data' : json_data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// window.location = '{{URL::route('superadmin_view_input_jenis_atestasi')}}';
					
					//ganti isi row sesuai hasil edit
					//tabel id_jenis_atestasi
					$('.tabel_nama_jenis_atestasi'+temp).html(result.data['nama_atestasi']);				
					//ganti isi detail sesuai hasil edit
					data_jenis_atestasi[temp] = result.data;	
					
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
</script>