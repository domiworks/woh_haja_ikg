<div class="modal fade popup_edit_pernikahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Pernikahan</h4>
			</div>
			<div class="modal-body form-horizontal">

				
				<form>	
					<div class="form-group">
						<label class="col-xs-4 control-label">Nomor Pernikahan</label> 
						<div class="col-xs-5">{{ Form::text('nomor_pernikahan', Input::old('nomor_pernikahan'), array('id' => 'f_nomor_pernikahan', 'class'=>'form-control')) }}</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Antara tanggal </label> 
						<div class="col-xs-2">
							{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-2">
							{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
						</div>
						<script>
						jQuery('#f_tanggal_awal').datetimepicker({
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
						jQuery('#f_tanggal_akhir').datetimepicker({
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
						<label class="col-xs-4 control-label">Pendeta yang memberkati</label> 
						<div class="col-xs-5">{{Form::text('nama_pendeta', Input::old('nama_pendeta'), array('id'=>'f_nama_pendeta', 'class'=>'form-control'))}}</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Mempelai Wanita</label> 
						<div class="col-xs-5">{{ Form::text('nama_mempelai_wanita', Input::old('nama_mempelai_wanita'), array('id' => 'f_nama_mempelai_wanita', 'class'=>'form-control')) }}</div>
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Mempelai Pria</label> 
						<div class="col-xs-5">{{ Form::text('nama_mempelai_pria', Input::old('nama_mempelai_pria'), array('id' => 'f_nama_mempelai_pria', 'class'=>'form-control')) }}</div>
					</div>
					<div class="form-group">
						<div class="col-xs-5 col-xs-push-4">
							<button id="f_search_pernikahan" class="btn btn-success">Save Changes</button>
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