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
						<div class="col-xs-2">
							<select class="form-control" id="f_edit_tipe_atestasi">								
								<option value = 1>Masuk</option>
								<option value = 2>Keluar</option>
							</select>
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
				<input type="button" value="Simpan Perubahan" id="f_edit_post_jenis_atestasi" class="btn btn-success" />
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
		$tipe_atestasi = $('#f_edit_tipe_atestasi').val();
		$keterangan = $('#f_edit_keterangan').val();
		
		$data = {
			'id' : $id,
			'nama_atestasi' : $nama_atestasi,
			'tipe' : $tipe_atestasi,
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
					if(result.data['tipe'] == 1)
					{
						$('.tabel_tipe_atestasi'+temp).html("Masuk");				
					}
					else
					{
						$('.tabel_tipe_atestasi'+temp).html("Keluar");					
					}					
					//ganti isi detail sesuai hasil edit
					data_jenis_atestasi[temp] = result.data;	
					
					//close popup
					$('.popup_edit_jenis_atestasi').modal('toggle');

					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else				
				{
					alert(result.messages);

					//show red background validation					
					if($nama_atestasi == ""){$('#f_edit_nama_jenis_atestasi').css('background-color','#FBE3E4');}else{$('#f_edit_nama_jenis_atestasi').css('background-color','#FFFFFF');}
					if($keterangan == ""){$('#f_edit_keterangan').css('background-color','#FBE3E4');}else{$('#f_edit_keterangan').css('background-color','#FFFFFF');}

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