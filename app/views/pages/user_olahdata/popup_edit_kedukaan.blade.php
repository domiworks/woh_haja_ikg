<div class="modal fade popup_edit_kedukaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Kedukaan</h4>
			</div>
			<div class="modal-body form-horizontal">
				
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Kedukaan
						</label>
						<div class="col-xs-6">
							{{ Form::text('nomor_kedukaan', Input::old('nomor_kedukaan'), array('id' => 'f_nomor_kedukaan', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Meninggal
						</label>
						<div class="col-xs-6">
							{{ Form::text('tanggal_meninggal', Input::old('tanggal_meninggal'), array('id' => 'f_tanggal_meninggal', 'class'=>'form-control')) }}
						</div>
						<script>
						jQuery('#f_tanggal_meninggal').datetimepicker({
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
							Jemaat yang meninggal
						</label>
						<div class="col-xs-6">
							{{Form::select('list_jemaat', $list_jemaat, Input::old('list_jemaat'), array('id'=>'f_list_jemaat', 'class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
						</div>
					</div>					
					<div class="form-group">	
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_post_kedukaan" class="btn btn-success">Simpan Data Kedukaan</button>
						</div>
					</form>	
					
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>