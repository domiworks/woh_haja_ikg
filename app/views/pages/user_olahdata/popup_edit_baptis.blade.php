<div class="modal fade popup_edit_baptis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Baptis</h4>
			</div>
			<div class="modal-body form-horizontal">
					<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="nomor_baptis" id="f_edit_nomor_baptis" class="form-control">
						</div>			
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pembaptis
						</label>

						<div class="col-xs-6">
							<!--<input type="text" name="pembaptis" id="f_edit_pembaptis" class="form-control">-->
							{{ Form::select('pembaptis', $list_pembaptis, Input::old('pembaptis'), array('id'=>'f_edit_pembaptis', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat
						</label>

						<div class="col-xs-6">
							<!--<input type="text" name="jemaat" id="f_edit_jemaat" class="form-control">-->
							{{ Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_edit_jemaat', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jenis Baptis
						</label>

						<div class="col-xs-6">
							<!--<input type="text" name="jenis_baptis" id="f_edit_jenis_baptis" class="form-control">-->
							{{ Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_edit_jenis_baptis', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="tanggal_baptis" id="f_edit_tanggal_baptis" class="form-control">
						</div>
						<script>
						jQuery('#f_edit_tanggal_baptis').datetimepicker({
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
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_edit_post_baptis" class="btn btn-success">Simpan Data Baptis</button>
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