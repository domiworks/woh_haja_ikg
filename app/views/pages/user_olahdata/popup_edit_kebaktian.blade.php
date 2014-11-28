<div class="modal fade popup_edit_kebaktian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit DKH</h4>
			</div>
			<div class="modal-body form-horizontal">

				<form>
					<div class="form-group">
						<label class="col-xs-4 control-label">Kebaktian ke</label> 
						<div class="col-xs-5">
							<select name="kebaktian_ke" id="f_kebaktian_ke" class="form-control">
								<option>ytgrsf/option>
								</select>
							</div>
						</div>				
						<div class="form-group">
							<label class="col-xs-4 control-label">Nama Pengkotbah</label> 
							<div class="col-xs-5">{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_nama_pengkotbah', 'class'=>'form-control'))}}</div>
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
							<label class="col-xs-4 control-label">Antara jam </label> 
							<div class="col-xs-2">
								{{ Form::text('jam_awal', Input::old('jam_awal'), array('id' => 'f_jam_awal', 'class'=>'form-control')) }}
							</div>
							<div class="col-xs-2">
								{{ Form::text('jam_akhir', Input::old('jam_akhir'), array('id' => 'f_jam_akhir', 'class'=>'form-control')) }}
							</div>
							<script>
							jQuery('#f_jam_awal').datetimepicker({
								datepicker:false,
						 // allowTimes:[
						  // '12:00', '13:00', '15:00', 
						  // '17:00', '17:05', '17:20', '19:00', '20:00'
						 // ]
						 format:'H:i'
						});
							jQuery('#f_jam_akhir').datetimepicker({
								datepicker:false,
								format:'H:i'
							});
							</script>
						</div>			
						<div class="form-group">
							<label class="col-xs-4 control-label">Banyak jemaat yang hadir</label> 
							<div class="col-xs-2">
								{{ Form::text('batas_bawah_hadir_jemaat', Input::old('batas_bawah_hadir_jemaat'), array('id' => 'f_batas_bawah_hadir_jemaat', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
							<div class="col-xs-2"> 
								{{ Form::text('batas_atas_hadir_jemaat', Input::old('batas_atas_hadir_jemaat'), array('id' => 'f_batas_atas_hadir_jemaat', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Banyak simpatisan yang hadir</label> 
							<div class="col-xs-2">
								{{ Form::text('batas_bawah_hadir_simpatisan', Input::old('batas_bawah_hadir_simpatisan'), array('id' => 'f_batas_bawah_hadir_simpatisan', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
							<div class="col-xs-2"> 
								{{ Form::text('batas_atas_hadir_simpatisan', Input::old('batas_atas_hadir_simpatisan'), array('id' => 'f_batas_atas_hadir_simpatisan', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Banyak penatua yang hadir</label> 
							<div class="col-xs-2">
								{{ Form::text('batas_bawah_hadir_penatua', Input::old('batas_bawah_hadir_penatua'), array('id' => 'f_batas_bawah_hadir_penatua', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)')) }} 

							</div>
							<div class="col-xs-2">
								{{ Form::text('batas_atas_hadir_penatua', Input::old('batas_atas_hadir_penatua'), array('id' => 'f_batas_atas_hadir_penatua', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Banyak pemusik yang hadir</label> 
							<div class="col-xs-2">
								{{ Form::text('batas_bawah_hadir_pemusik', Input::old('batas_bawah_hadir_pemusik'), array('id' => 'f_batas_bawah_hadir_pemusik', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }} 

							</div>
							<div class="col-xs-2">
								{{ Form::text('batas_atas_hadir_pemusik', Input::old('batas_atas_hadir_pemusik'), array('id' => 'f_batas_atas_hadir_pemusik', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Banyak komisi yang hadir</label> 
							<div class="col-xs-2">
								{{ Form::text('batas_bawah_hadir_komisi', Input::old('batas_bawah_hadir_komisi'), array('id' => 'f_batas_bawah_hadir_komisi', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }} 

							</div>
							<div class="col-xs-2">
								{{ Form::text('batas_atas_hadir_komisi', Input::old('batas_atas_hadir_komisi'), array('id' => 'f_batas_atas_hadir_komisi', 'class'=>'form-control' ,'onkeypress'=>'return isNumberKey(event)')) }}
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-5 col-xs-push-4">
							<button id="f_search_kebaktian" class="btn btn-success">Save Changes</button>
						</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>