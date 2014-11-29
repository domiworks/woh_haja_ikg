<div class="modal fade popup_edit_pernikahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Pernikahan</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Pernikahan
						</label>
						<div class="col-xs-6">
							{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Pernikahan
						</label>
						<div class="col-xs-6">
							{{ Form::text('tanggal_pernikahan', Input::old('tanggal_pernikahan'), array('id' => 'f_tanggal_pernikahan', 'class'=>'form-control')) }}
						</div>
						<script>
						jQuery('#f_tanggal_pernikahan').datetimepicker({
							lang:'en',
							i18n:{
								en:{
									months:[
									'Januari','Februari','Maret','April',
									'Mei','Juni','Juli','Agustus',
									'September','Oktober','November','Desember',
									],
									dayOfWeek:[
									"Ming.", "Sen.", "Sel.", "Rab.", 
									"Kam.", "Jum.", "Sab.",
									]

								}
							},
							timepicker:false,
							format: 'Y-m-d',
							yearStart: '1900'
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pendeta yang memberkati
						</label>
						<div class="col-xs-6">
							{{Form::select('id_pendeta', $list_pendeta, Input::old('id_pendeta'), array('id'=>'f_id_pendeta', 'class'=>'form-control'))}}
						</div>
					</div>
					
					<!--
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja tempat diberkati
						</label>
						<div class="col-xs-6">
							{{-- Form::select('id_gereja', $list_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja', 'class'=>'form-control')) --}}
						</div>
					</div>
					-->
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat Pria
						</label>
						<div class="col-xs-6">

							{{Form::select('list_jemaat_pria', $list_jemaat_pria, Input::old('list_jemaat_pria'), array('id'=>'f_list_jemaat_pria', 'class'=>'form-control'))}}							

						</div>
						<div class="col-xs-0">
							<input id="f_check_jemaat_pria" type="checkbox" name="jemaat_pria" value="0" /> Non-GKI				
						</div>
						<script>
						$('body').on('change','#f_list_jemaat_pria', function(){
							var selected = $('#f_list_jemaat_pria').find(":selected").text();
							$('#f_nama_mempelai_pria').val(selected);					
						});
						</script>
					</div>
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Mempelai Pria
						</label>
						<div class="col-xs-6">
							{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria', 'class'=>'form-control')) }}
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat Wanita
						</label>
						<div class="col-xs-6">

							{{Form::select('list_jemaat_wanita', $list_jemaat_wanita, Input::old('list_jemaat_wanita'), array('id'=>'f_list_jemaat_wanita', 'class'=>'form-control'))}}							

						</div>
						<div class="col-xs-0">
							<input id="f_check_jemaat_wanita" type="checkbox" name="jemaat_wanita" value="0" /> Non-GKI				
						</div>
						<script>
						$('body').on('change','#f_list_jemaat_wanita', function(){
							var selected = $('#f_list_jemaat_wanita').find(":selected").text();
							$('#f_nama_mempelai_wanita').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Mempelai Wanita
						</label>
						<div class="col-xs-6">
							{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita', 'class'=>'form-control')) }}
						</div>
					</div>
										
					<div class="form-group">
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_post_pernikahan" class="btn btn-success">Simpan Data Pernikahan</button>
						</div>
					</div>				
				</form>
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>