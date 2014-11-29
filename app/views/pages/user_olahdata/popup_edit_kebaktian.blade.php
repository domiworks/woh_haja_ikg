<div class="modal fade popup_edit_kebaktian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Kebaktian</h4>
			</div>
			<div class="modal-body form-horizontal">				

<script>
	$('body').on('click', '#f_edit_check_pembicara_luar', function(){		
		if($('#f_edit_check_pembicara_luar').val() == 0){	
			$('#f_edit_check_pembicara_luar').val(1); //pakai pembicara luar jika value f_edit_check_pembicara_luar == 1
			$('#f_edit_nama_pengkotbah').attr('disabled', false);			
			$('#f_edit_nama_pengkotbah').val("");
			$('#f_edit_pengkotbah').attr('disabled', true);								
		}
		else
		{
			$('#f_edit_check_pembicara_luar').val(0); //tidak pakai pembicara luar jika value f_edit_check_pembicara_luar == 0
			$('#f_edit_nama_pengkotbah').attr('disabled', true);	
			// $('#f_edit_nama_pengkotbah').val("");
			selected = $('#f_edit_pengkotbah').find(":selected").text();
			$('#f_edit_nama_pengkotbah').val(selected);	
			$('#f_edit_pengkotbah').attr('disabled', false);				
		}
	});

	//banyak_jemaat
	$('body').on('change','#f_edit_banyak_jemaat_pria',function(){
		var jemaat_pria = parseInt($('#f_edit_banyak_jemaat_pria').val());		
		var jemaat_wanita = parseInt($('#f_edit_banyak_jemaat_wanita').val());		
		if(isNaN(jemaat_pria))
		{
			jemaat_pria = 0;
		}
		if(isNaN(jemaat_wanita))
		{
			jemaat_wanita = 0;
		}
		$('#f_edit_banyak_jemaat').val(jemaat_pria+jemaat_wanita);
	});
	$('body').on('change','#f_edit_banyak_jemaat_wanita',function(){
		var jemaat_pria = parseInt($('#f_edit_banyak_jemaat_pria').val());		
		var jemaat_wanita = parseInt($('#f_edit_banyak_jemaat_wanita').val());
		if(isNaN(jemaat_pria))
		{			
			jemaat_pria = 0;
		}
		if(isNaN(jemaat_wanita))
		{
			jemaat_wanita = 0;
		}
		$('#f_edit_banyak_jemaat').val(jemaat_pria+jemaat_wanita);
	});		
	$('body').on('change','#f_edit_banyak_jemaat',function(){
		$('#f_edit_banyak_jemaat_pria').val('');
		$('#f_edit_banyak_jemaat_wanita').val('');		
	});		
	
	//banyak_simpatisan
	$('body').on('change','#f_edit_banyak_simpatisan_pria',function(){
		var simpatisan_pria = parseInt($('#f_edit_banyak_simpatisan_pria').val());		
		var simpatisan_wanita = parseInt($('#f_edit_banyak_simpatisan_wanita').val());
		if(isNaN(simpatisan_pria))
		{
			simpatisan_pria = 0;
		}
		if(isNaN(simpatisan_wanita))
		{
			simpatisan_wanita = 0;
		}
		$('#f_edit_banyak_simpatisan').val(simpatisan_pria+simpatisan_wanita);
	});
	$('body').on('change','#f_edit_banyak_simpatisan_wanita',function(){
		var simpatisan_pria = parseInt($('#f_edit_banyak_simpatisan_pria').val());
		var simpatisan_wanita = parseInt($('#f_edit_banyak_simpatisan_wanita').val());
		if(isNaN(simpatisan_pria))
		{
			simpatisan_pria = 0;
		}
		if(isNaN(simpatisan_wanita))
		{
			simpatisan_wanita = 0;
		}
		$('#f_edit_banyak_simpatisan').val(simpatisan_pria+simpatisan_wanita);
	});		
	$('body').on('change','#f_edit_banyak_simpatisan',function(){
		$('#f_edit_banyak_simpatisan_pria').val('');
		$('#f_edit_banyak_simpatisan_wanita').val('');		
	});
	
	//banyak_penatua
	$('body').on('change','#f_edit_banyak_penatua_pria',function(){
		var penatua_pria = parseInt($('#f_edit_banyak_penatua_pria').val());		
		var penatua_wanita = parseInt($('#f_edit_banyak_penatua_wanita').val());
		if(isNaN(penatua_pria))
		{
			penatua_pria = 0;
		}
		if(isNaN(penatua_wanita))
		{
			penatua_wanita = 0;
		}
		$('#f_edit_banyak_penatua').val(penatua_pria+penatua_wanita);
	});
	$('body').on('change','#f_edit_banyak_penatua_wanita',function(){
		var penatua_pria = parseInt($('#f_edit_banyak_penatua_pria').val());
		var penatua_wanita = parseInt($('#f_edit_banyak_penatua_wanita').val());
		if(isNaN(penatua_pria))
		{
			penatua_pria = 0;
		}
		if(isNaN(penatua_wanita))
		{
			penatua_wanita = 0;
		}
		$('#f_edit_banyak_penatua').val(penatua_pria+penatua_wanita);
	});		
	$('body').on('change','#f_edit_banyak_penatua',function(){
		$('#f_edit_banyak_penatua_pria').val('');
		$('#f_edit_banyak_penatua_wanita').val('');		
	});
	
	//banyak_pemusik
	$('body').on('change','#f_edit_banyak_pemusik_pria',function(){
		var pemusik_pria = parseInt($('#f_edit_banyak_pemusik_pria').val());		
		var pemusik_wanita = parseInt($('#f_edit_banyak_pemusik_wanita').val());
		if(isNaN(pemusik_pria))
		{
			pemusik_pria = 0;
		}
		if(isNaN(pemusik_wanita))
		{
			pemusik_wanita = 0;
		}
		$('#f_edit_banyak_pemusik').val(pemusik_pria+pemusik_wanita);
	});
	$('body').on('change','#f_edit_banyak_pemusik_wanita',function(){
		var pemusik_pria = parseInt($('#f_edit_banyak_pemusik_pria').val());
		var pemusik_wanita = parseInt($('#f_edit_banyak_pemusik_wanita').val());
		if(isNaN(pemusik_pria))
		{
			pemusik_pria = 0;
		}
		if(isNaN(pemusik_wanita))
		{
			pemusik_wanita = 0;
		}
		$('#f_edit_banyak_pemusik').val(pemusik_pria+pemusik_wanita);
	});		
	$('body').on('change','#f_edit_banyak_pemusik',function(){
		$('#f_edit_banyak_pemusik_pria').val('');
		$('#f_edit_banyak_pemusik_wanita').val('');		
	});
	
	//banyak_komisi
	$('body').on('change','#f_edit_banyak_komisi_pria',function(){
		var komisi_pria = parseInt($('#f_edit_banyak_komisi_pria').val());		
		var komisi_wanita = parseInt($('#f_edit_banyak_komisi_wanita').val());
		if(isNaN(komisi_pria))
		{
			komisi_pria = 0;
		}
		if(isNaN(komisi_wanita))
		{
			komisi_wanita = 0;
		}
		$('#f_edit_banyak_komisi').val(komisi_pria+komisi_wanita);
	});
	$('body').on('change','#f_edit_banyak_komisi_wanita',function(){
		var komisi_pria = parseInt($('#f_edit_banyak_komisi_pria').val());
		var komisi_wanita = parseInt($('#f_edit_banyak_komisi_wanita').val());
		if(isNaN(komisi_pria))
		{
			komisi_pria = 0;
		}
		if(isNaN(komisi_wanita))
		{
			komisi_wanita = 0;
		}
		$('#f_edit_banyak_komisi').val(komisi_pria+komisi_wanita);
	});		
	$('body').on('change','#f_edit_banyak_komisi',function(){
		$('#f_edit_banyak_komisi_pria').val('');
		$('#f_edit_banyak_komisi_wanita').val('');		
	});
	
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>

				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">Kebaktian ke</label>
						<div class="col-xs-6">
							{{Form::select('kebaktian_ke', $list_jenis_kegiatan, Input::old('kebaktian_ke'), array('id'=>'f_edit_kebaktian_ke', 'class'=>'form-control'))}}
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">Pengkotbah</label>
						<div class="col-xs-6">
							{{Form::select('pengkotbah', $list_pembicara, Input::old('pengkotbah'), array('id'=>'f_edit_pengkotbah','class'=>'form-control', 'disabled' => false))}}				
							<div class="checkbox">
								<label>
									<input id="f_edit_check_pembicara_luar" type="checkbox" name="pembicara_luar" value="0" /> Pembicara Luar
								</label>
							</div>
						</div>
						<script>				
						$('body').on('change','#f_edit_pengkotbah', function(){
							var selected = $('#f_edit_pengkotbah').find(":selected").text();
							$('#f_edit_nama_pengkotbah').val(selected);					
						});
						</script>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Pengkotbah</label>
						<div class="col-xs-6">
							{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_edit_nama_pengkotbah', 'disabled' => true , 'class'=>'form-control'))}}
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">Tanggal Mulai - Tanggal Selesai</label>
						
						<div class="col-xs-3">
							{{ Form::text('tanggal_mulai', Input::old('tanggal_mulai'), array('id' => 'f_edit_tanggal_mulai', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-3">
							{{ Form::text('tanggal_selesai', Input::old('tanggal_selesai'), array('id' => 'f_edit_tanggal_selesai', 'class'=>'form-control')) }}
						</div>
						<script>				
						jQuery('#f_edit_tanggal_mulai').datetimepicker({
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
						jQuery('#f_edit_tanggal_selesai').datetimepicker({
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
						<label class="col-xs-4 control-label">Jam Mulai - Jam Selesai</label>

						<div class="col-xs-3">
							{{ Form::text('jam_mulai', Input::old('jam_mulai'), array('id' => 'f_edit_jam_mulai', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-3">
							{{ Form::text('jam_selesai', Input::old('jam_selesai'), array('id' => 'f_edit_jam_selesai', 'class'=>'form-control')) }}
						</div>
						<script>

						jQuery('#f_edit_jam_mulai').datetimepicker({
							datepicker:false,
							 // allowTimes:[
							  // '12:00', '13:00', '15:00', 
							  // '17:00', '17:05', '17:20', '19:00', '20:00'
							 // ]
							 format:'H:i'
							});
						jQuery('#f_edit_jam_selesai').datetimepicker({
							datepicker:false,
							format:'H:i'
						});
						</script>				
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Banyak Jemaat Pria, Banyak Jemaat Wanita</label>

						<div class="col-xs-3">
							{{Form::text('banyak_jemaat_pria', Input::old('banyak_jemaat_pria'), array('id'=>'f_edit_banyak_jemaat_pria', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}} 
						</div>
						<div class="col-xs-3">	
							{{Form::text('banyak_jemaat_wanita', Input::old('banyak_jemaat_wanita'), array('id'=>'f_edit_banyak_jemaat_wanita', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Banyak Seluruh Jemaat</label>
						<div class="col-xs-6">
							{{Form::text('banyak_jemaat', Input::old('banyak_jemaat'), array('id'=>'f_edit_banyak_jemaat', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Simpatisan Pria dan Wanita
						</label>

						<div class="col-xs-3">
							{{Form::text('banyak_simpatisan_pria', Input::old('banyak_simpatisan_pria'), array('id'=>'f_edit_banyak_simpatisan_pria', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}} 
						</div>
						<div class="col-xs-3">
							{{Form::text('banyak_simpatisan_wanita', Input::old('banyak_simpatisan_wanita'), array('id'=>'f_edit_banyak_simpatisan_wanita', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Seluruh Simpatisan
						</label>

						<div class="col-xs-6">
							{{Form::text('banyak_simpatisan', Input::old('banyak_simpatisan'), array('id'=>'f_edit_banyak_simpatisan', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Penatua Pria dan Wanita
						</label>

						<div class="col-xs-3">
							{{Form::text('banyak_penatua_pria', Input::old('banyak_penatua_pria'), array('id'=>'f_edit_banyak_penatua_pria', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}} 
						</div>
						<div class="col-xs-3">
							{{Form::text('banyak_penatua_wanita', Input::old('banyak_penatua_wanita'), array('id'=>'f_edit_banyak_penatua_wanita', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Seluruh Penatua
						</label>

						<div class="col-xs-6">
							{{Form::text('banyak_penatua', Input::old('banyak_penatua'), array('id'=>'f_edit_banyak_penatua', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Pemusik Pri dan Wanita
						</label>
						<div class="col-xs-3">
							{{Form::text('banyak_pemusik_pria', Input::old('banyak_pemusik_pria'), array('id'=>'f_edit_banyak_pemusik_pria', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
						<div class="col-xs-3">
							{{Form::text('banyak_pemusik_wanita', Input::old('banyak_pemusik_wanita'), array('id'=>'f_edit_banyak_pemusik_wanita', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Seluruh Pemusik
						</label>

						<div class="col-xs-6">
							{{Form::text('banyak_pemusik', Input::old('banyak_pemusik'), array('id'=>'f_edit_banyak_pemusik', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Komisi Pria dan Wanita
						</label>

						<div class="col-xs-3">
							{{Form::text('banyak_komisi_pria', Input::old('banyak_komisi_pria'), array('id'=>'f_edit_banyak_komisi_pria', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
						<div class="col-xs-3">
							{{Form::text('banyak_komisi_wanita', Input::old('banyak_komisi_wanita'), array('id'=>'f_edit_banyak_komisi_wanita', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Banyak Seluruh Komisi
						</label>

						<div class="col-xs-6">
							{{Form::text('banyak_komisi', Input::old('banyak_komisi'), array('id'=>'f_edit_banyak_komisi', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>	

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jumlah Persembahan
						</label>
						<div class="col-xs-6">
							{{Form::text('jumlah_persembahan', Input::old('jumlah_persembahan'), array('id'=>'f_edit_jumlah_persembahan', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_edit_post_kebaktian" class="btn btn-success">Simpan Data Kebaktian</button>
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