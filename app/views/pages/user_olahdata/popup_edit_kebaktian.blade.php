<script>
	$('body').on('click', '#f_edit_check_kebaktian_lain', function(){		
		if($('#f_edit_check_kebaktian_lain').val() == 0){	
			$('#f_edit_check_kebaktian_lain').val(1); //pakai pembicara luar jika value f_check_pembicara_luar == 1
			$('#f_edit_nama_kebaktian').attr('disabled', false);			
			$('#f_edit_nama_kebaktian').val("");
			$('#f_edit_kebaktian_ke').attr('disabled', true);								
		}
		else
		{
			$('#f_edit_check_kebaktian_lain').val(0); //tidak pakai pembicara luar jika value f_check_pembicara_luar == 0
			$('#f_edit_nama_kebaktian').attr('disabled', true);				
			selected = $('#f_edit_kebaktian_ke').find(":selected").text();
			$('#f_edit_nama_kebaktian').val(selected);	
			$('#f_edit_kebaktian_ke').attr('disabled', false);				
		}
	});
	
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

<div class="modal fade popup_edit_kebaktian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Kebaktian</h4>
			</div>
			<div class="modal-body form-horizontal">				
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">Kebaktian</label>
						<div class="col-xs-5">
							@if($list_jenis_kegiatan == null)
								<p class="control-label pull-left">(tidak ada daftar kegiatan)</p>
							@else
								{{Form::select('kebaktian_ke', $list_jenis_kegiatan, Input::old('kebaktian_ke'), array('id'=>'f_edit_kebaktian_ke', 'class'=>'form-control', 'disabled' => false))}} 
							@endif	
							<div class="checkbox">
								<label>
									<input id="f_edit_check_kebaktian_lain" type="checkbox" name="kebaktian_lain" value="0" /> Kebaktian Lain
								</label>
							</div>							
						</div>
						<script>				
						$('body').on('change','#f_edit_kebaktian_ke', function(){
							var selected = $('#f_edit_kebaktian_ke').find(":selected").text();
							$('#f_edit_nama_kebaktian').val(selected);					
						});
						</script>
					</div>
					
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Kebaktian</label>
						<div class="col-xs-6">
							{{Form::text('nama_kebaktian', Input::old('nama_kebaktian') , array('id' => 'f_edit_nama_kebaktian', 'disabled' => true , 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">Pengkotbah</label>
						<div class="col-xs-6">
							@if($list_pembicara == null)
								<p class="control-label pull-left">(tidak ada daftar pengkotbah)</p>
							@else
								{{Form::select('pengkotbah', $list_pembicara, Input::old('pengkotbah'), array('id'=>'f_edit_pengkotbah','class'=>'form-control', 'disabled' => false))}}	 	
							@endif							
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
						<div class="col-xs-0">
							*
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-4 control-label">Tanggal Mulai - Tanggal Selesai</label>
						
						<div class="col-xs-2">
							{{ Form::text('tanggal_mulai', Input::old('tanggal_mulai'), array('id' => 'f_edit_tanggal_mulai', 'class'=>'form-control')) }}
						</div>						
						<div class="col-xs-2">
							{{ Form::text('tanggal_selesai', Input::old('tanggal_selesai'), array('id' => 'f_edit_tanggal_selesai', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
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
						<div class="col-xs-0">
							*
						</div>
					</div>	

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jumlah Persembahan
						</label>
						<div class="col-xs-6">
							<input type="hidden" id="f_edit_id_persembahan" value="" />
							{{Form::text('jumlah_persembahan', Input::old('jumlah_persembahan'), array('id'=>'f_edit_jumlah_persembahan', 'class'=>'form-control','onkeypress'=>'return isNumberKey(event)'))}} 
						</div>
						<div class="col-xs-0">
							*
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
							
						</div>
					</div>
				</form>		
			</div>
			<div class="modal-footer">
				@if($list_jenis_kegiatan == null || $list_pembicara == null)
					<input type="button" value="Simpan Perubahan" id="f_edit_post_kebaktian" class="btn btn-success" disabled=true />
				@else
					<input type="button" value="Simpan Perubahan" id="f_edit_post_kebaktian" class="btn btn-success" data-dismiss="modal" />
				@endif 							
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
			
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_kebaktian', function(){				
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		if($('#f_edit_check_kebaktian_lain').val() == 1) //pakai nama kebaktian lain
		{
			$kebaktian_ke = '';
			$nama_kebaktian = $('#f_edit_nama_kebaktian').val();
		}
		else
		{
			$kebaktian_ke = $('#f_edit_kebaktian_ke').val();
			$nama_kebaktian = $('#f_edit_nama_kebaktian').val();
		}
		if($('#f_edit_check_pembicara_luar').val() == 1) //pakai pembicara luar
		{
			$id_pendeta = '';
			$nama_pendeta = $('#f_edit_nama_pengkotbah').val();
		}
		else
		{
			$id_pendeta = $('#f_edit_pengkotbah').val();
			$nama_pendeta = $('#f_edit_nama_pengkotbah').val();
		}		
		$tanggal_mulai = $('#f_edit_tanggal_mulai').val();
		$tanggal_selesai = $('#f_edit_tanggal_selesai').val();
		$jam_mulai = $('#f_edit_jam_mulai').val();
		$jam_selesai = $('#f_edit_jam_selesai').val();
		$banyak_jemaat_pria = $('#f_edit_banyak_jemaat_pria').val();
		$banyak_jemaat_wanita = $('#f_edit_banyak_jemaat_wanita').val();
		$banyak_jemaat = $('#f_edit_banyak_jemaat').val();
		$banyak_simpatisan_pria = $('#f_edit_banyak_simpatisan_pria').val();
		$banyak_simpatisan_wanita = $('#f_edit_banyak_simpatisan_wanita').val();
		$banyak_simpatisan = $('#f_edit_banyak_simpatisan').val();
		$banyak_penatua_pria = $('#f_edit_banyak_penatua_pria').val();
		$banyak_penatua_wanita = $('#f_edit_banyak_penatua_wanita').val();
		$banyak_penatua = $('#f_edit_banyak_penatua').val();
		$banyak_pemusik_pria = $('#f_edit_banyak_pemusik_pria').val();
		$banyak_pemusik_wanita = $('#f_edit_banyak_pemusik_wanita').val();
		$banyak_pemusik = $('#f_edit_banyak_pemusik').val();
		$banyak_komisi_pria = $('#f_edit_banyak_komisi_pria').val();
		$banyak_komisi_wanita = $('#f_edit_banyak_komisi_wanita').val();
		$banyak_komisi = $('#f_edit_banyak_komisi').val();
		// $id_gereja = $('#f_edit_id_gereja').val();
		$jumlah_persembahan = $('#f_edit_jumlah_persembahan').val();
		$keterangan = $('#f_edit_keterangan').val();		
		
		$data = {
			'id' : $id,
			'id_jenis_kegiatan' : $kebaktian_ke,
			'nama_jenis_kegiatan' : $nama_kebaktian,
			'id_pendeta' : $id_pendeta,
			'nama_pendeta' : $nama_pendeta,
			'tanggal_mulai' : $tanggal_mulai,
			'tanggal_selesai' : $tanggal_selesai,
			'jam_mulai' : $jam_mulai,
			'jam_selesai' : $jam_selesai,
			'banyak_jemaat_pria' : $banyak_jemaat_pria,
			'banyak_jemaat_wanita' : $banyak_jemaat_wanita,
			'banyak_jemaat' : $banyak_jemaat,
			'banyak_simpatisan_pria' : $banyak_simpatisan_pria,
			'banyak_simpatisan_wanita' : $banyak_simpatisan_wanita,
			'banyak_simpatisan' : $banyak_simpatisan,
			'banyak_penatua_pria' : $banyak_penatua_pria,
			'banyak_penatua_wanita' : $banyak_penatua_wanita,
			'banyak_penatua' : $banyak_penatua,
			'banyak_pemusik_pria' : $banyak_pemusik_pria,
			'banyak_pemusik_wanita' : $banyak_pemusik_wanita,
			'banyak_pemusik' : $banyak_pemusik,
			'banyak_komisi_pria' : $banyak_komisi_pria,
			'banyak_komisi_wanita' : $banyak_komisi_wanita,
			'banyak_komisi' : $banyak_komisi,
			// 'id_gereja' : $id_gereja,
			'id_persembahan' : $('#f_edit_id_persembahan').val(),
			'jumlah_persembahan' : $jumlah_persembahan,
			'keterangan' : $keterangan
		};				
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/edit_kebaktian')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){				
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// alert(result.data['nama_jenis_kegiatan']);
					// alert(JSON.stringify(result.data));
					// window.location = '{{URL::route('view_olahdata_kebaktian')}}';
					
					//ganti isi row sesuai hasil edit_kebaktian
					$('.tabel_tanggal_mulai'+temp).html(result.data['tanggal_mulai']);
					$('.tabel_nama_jenis_kegiatan'+temp).html(result.data['nama_jenis_kegiatan']);
					$('.tabel_nama_pendeta'+temp).html(result.data['nama_pendeta']);
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
				
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');
	});
</script>