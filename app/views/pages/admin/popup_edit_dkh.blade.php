<div class="modal fade popup_edit_dkh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit DKH</h4>
			</div>
			<div class="modal-body form-horizontal">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Piagam Dkh
						</label>
						<div class="col-xs-4">
							{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_edit_nomor_dkh', 'class'=>'form-control'))}}
						</div>	
						<div class="col-xs-0">	
							*
						</div>						
					</div>
					<!--<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Jemaat
						</label>
						<div class="col-xs-6">
							if($list_jemaat == null)
								<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
							else
								{{--Form::select('nama_jemaat', $list_jemaat, Input::old('nama_jemaat'), array('id'=>'f_edit_nama_jemaat', 'class'=>'form-control'))--}}
							endif
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>		-->
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>											
				</form>
				
			</div>
			<div class="modal-footer">
				<!--if($list_jemaat == null)
					<input type="button" id="f_edit_post_dkh" class="btn btn-success" value="Simpan Perubahan" data-dismiss="modal" disabled=true />		
				else
					<input type="button" id="f_edit_post_dkh" class="btn btn-success" value="Simpan Perubahan" data-dismiss="modal"/>
				endif-->
				<input type="button" id="f_edit_post_dkh" class="btn btn-success" value="Simpan Perubahan" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_dkh', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$no_dkh = $('#f_edit_nomor_dkh').val();
		// $id_jemaat = $('#f_edit_nama_jemaat').val();
		$keterangan = $('#f_edit_keterangan').val();
		
		$data = {
			'id' : $id,
			'no_dkh' : $no_dkh,
			// 'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('admin/edit_dkh')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){				
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_olahdata_dkh')}}';
					
					//ganti isi row sesuai hasil edit_kebaktian
					$('.tabel_no_dkh'+temp).html(result.data['no_dkh']);
					$('.tabel_nama_anggota'+temp).html(result.data['nama_anggota']);
					//ganti isi detail sesuai hasil edit
					temp_detail[temp] = result.data;
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil simpan perubahan.");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_dkh')}}';
				}
				else
				{					
					alert(response);
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
</script>