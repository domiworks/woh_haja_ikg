<div class="modal fade popup_edit_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Keanggotaan</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">	
					<div class="form-group">

						<label class="col-xs-4 control-label">
							Nomor anggota
						</label>

						<div class="col-xs-6">
							{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_edit_nomor_anggota', 'class'=>'form-control')) }}
						</div>
					</div>	
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama depan
						</label>

						<div class="col-xs-6">
							{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_edit_nama_depan', 'class'=>'form-control')) }} 
						</div>
						
						<!--<div class="col-xs-0">
							<span class="red">*</span>
						</div>	-->
					</div>				
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama tengah
						</label>

						<div class="col-xs-6">
							{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_edit_nama_tengah', 'class'=>'form-control')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama belakang
						</label>
						
						<div class="col-xs-6">
							{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_edit_nama_belakang', 'class'=>'form-control')) }} 
						</div>
													
					</div>			
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Alamat
						</label>

						<div class="col-xs-6">
							{{ Form::textarea('alamat', Input::old('alamat'), array('id' => 'f_edit_alamat', 'class'=>'form-control')) }} 
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kota
						</label>

						<div class="col-xs-6">
							{{ Form::text('kota', Input::old('kota'), array('id' => 'f_edit_kota', 'class'=>'form-control')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kodepos
						</label>

						<div class="col-xs-6">
							{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_edit_kodepos', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Telepon
						</label>

						<div class="col-xs-6">
							{{ Form::text('telp', Input::old('telp'), array('id' => 'f_edit_telp', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Hp
						</label>
						<div class="col-xs-6">			
							<input type="text" id="f_edit_hp1" class="form-control" name="hp1" onkeypress='return isNumberKey(event)'/>			
							<div id="addHp"></div>					
							<a href="javascript:void(0)" onClick="addHp();" id="refHp">tambah nomor hp</a>
							<script>						
							var lastIdx = 2;
							function addHp(){
								if(lastIdx <=5)
								{
									var newRow = "";							
									newRow +="<input type='text' id='f_edit_hp"+lastIdx+"' class='form-control' name='hp"+lastIdx+"' onkeypress='return isNumberKey(event)'/>";
									newRow +="<input type='button' value='X' id='delHp"+lastIdx+"' onClick='delHp()' /><br />";
									$('#delHp'+(lastIdx-1)).hide();
									$('#addHp').append(newRow);
									if(lastIdx==5){
										$('#refHp').hide();									
									}
									lastIdx++;							
								}						
							}
							function delHp()
							{
								$('#f_edit_hp'+(lastIdx-1)).remove();
								$('#delHp'+(lastIdx-1)).remove();
								lastIdx--;							
								$('#delHp'+(lastIdx-1)).show();
								if(lastIdx==5){
									$('#refHp').show();
								}
							}
							</script>
						</div>
					</div>
					<div class="form-group">		
						<label class="col-xs-4 control-label">
							Jenis kelamin
						</label>

						<div class="col-xs-6">
							{{ Form::radio('gender', '1', true, array('id'=>'f_edit_jenis_kelamin')) }}pria    {{ Form::radio('gender', '0', '', array('id'=>'f_edit_jenis_kelamin')) }}wanita 
						</div>
													
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Wilayah
						</label>

						<div class="col-xs-6">
							{{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_edit_wilayah', 'class'=>'form-control')) }}
						</div>
													
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Golongan darah
						</label>

						<div class="col-xs-6">
							{{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_edit_gol_darah', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pendidikan 
						</label>

						<div class="col-xs-6">
							{{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_edit_pendidikan', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pekerjaan
						</label>

						<div class="col-xs-6">
							{{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_edit_pekerjaan', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Etnis
						</label>

						<div class="col-xs-6">
							{{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_edit_etnis', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Kota lahir
						</label>

						<div class="col-xs-6">
							{{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_edit_kota_lahir', 'class'=>'form-control')) }} 
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal lahir
						</label>

						<div class="col-xs-6">
							{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_edit_tanggal_lahir', 'class'=>'form-control')) }}
						</div>			
						<script>
						jQuery('#f_edit_tanggal_lahir').datetimepicker({
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
							Foto
						</label>

						<div class="col-xs-6">
							<img src="" id="show_foto" width="200" height="200">				
							{{ Form::file('foto', array('name' => 'foto', 'id' => 'f_edit_foto', 'accept' => 'image/*')) }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Status
						</label>

						<div class="col-xs-6">
							{{ Form::select('status', $list_role, Input::old('status'), array('id' => 'f_edit_status', 'class'=>'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-xs-push-3">
							<button id="f_edit_post_anggota" class="btn btn-success"	>Simpan Data Anggota</button>
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