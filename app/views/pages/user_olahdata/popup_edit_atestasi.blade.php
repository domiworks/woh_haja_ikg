<div class="modal fade popup_edit_atestasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Atestasi</h4>
			</div>
			<div class="modal-body form-horizontal">

				<div class="form-group">
					<label class="col-xs-4 control-label">Nomor Atestasi</label>
					<div class="col-xs-5">{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_nomor_atestasi', 'class'=>'form-control')) }}</div>
				</div>					
				<div class="form-group">
					<label class="col-xs-4 control-label">Jemaat</label>
					<div class="col-xs-5">{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}</div>
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
					<label class="col-xs-4 control-label">Jenis Atestasi</label>
					<div class="col-xs-5">
						<select name="jenis_atestasi" id="f_jenis_atestasi" class="form-control">
							<option>bla</option>
						</select>  
					</div>					
				</div>					
				<div class="form-group">
					<label class="col-xs-4 control-label">Nama Gereja Lama</label>
					<div class="col-xs-5">{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_nama_gereja_lama', 'class'=>'form-control')) }}</div>
				</div>			
				<div class="form-group">
					<label class="col-xs-4 control-label">Nama Gereja Baru</label>
					<div class="col-xs-5">{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_nama_gereja_baru', 'class'=>'form-control')) }}</div>
				</div>			
				<div class="form-group">
					<div class="col-xs-5 col-xs-push-4">
						<button id="f_search_atestasi" class="btn btn-success">Save Changes</button>
					</div>			
				</div>			


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>