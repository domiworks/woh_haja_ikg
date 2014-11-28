@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->

<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">Anggota</li>
</ol>

<!-- <div class="s_sidebar"> -->
<!-- input data-->


<!-- olahdata -->
	<!--<ul>
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
	</ul>-->
	<!-- </div> -->

	<div class="s_content">
		<div class="container-fluid">
			<div class="col-md-3 panel panel-default ">
				<ul>		
					<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
					<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
				</ul>
			</div>

			<div class="panel panel-default col-md-9">
				<div class="panel-body">
					<form class="form-horizontal">	
						<div class="form-group">

							<label class="col-xs-4 control-label">
								Nomor anggota
							</label>

							<div class="col-xs-6">
								{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_nomor_anggota', 'class'=>'form-control')) }}
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Nama depan
							</label>

							<div class="col-xs-6">
								{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_nama_depan', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>				
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Nama tengah
							</label>

							<div class="col-xs-6">
								{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_nama_tengah', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Nama belakang
							</label>
							<div class="col-xs-6">
								{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_nama_belakang', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>			
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Alamat
							</label>

							<div class="col-xs-6">
								{{ Form::textarea('alamat', Input::old('alamat'), array('id' => 'f_alamat', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kota
							</label>

							<div class="col-xs-6">
								{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kodepos
							</label>

							<div class="col-xs-6">
								{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_kodepos', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Telepon
							</label>

							<div class="col-xs-6">
								{{ Form::text('telp', Input::old('telp'), array('id' => 'f_telp', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Hp
							</label>
							<div class="col-xs-6">			
								<input type="text" id="f_hp1" class="form-control" name="hp1" onkeypress='return isNumberKey(event)'/>			
								<div id="addHp"></div>					
								<a href="javascript:void(0)" onClick="addHp();" id="refHp">tambah nomor hp</a>
								<script>						
								var lastIdx = 2;
								function addHp(){
									if(lastIdx <=5)
									{
										var newRow = "";							
										newRow +="<input type='text' id='f_hp"+lastIdx+"' name='hp"+lastIdx+"' onkeypress='return isNumberKey(event)'/>";
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
									$('#f_hp'+(lastIdx-1)).remove();
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
								{{ Form::radio('gender', '1', true, array('id'=>'f_jenis_kelamin')) }}pria    {{ Form::radio('gender', '0', '', array('id'=>'f_jenis_kelamin')) }}wanita <span class="red">*</span>
							</div>
						</div>		
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Wilayah
							</label>

							<div class="col-xs-6">
								{{ Form::select('wilayah', Input::old('wilayah'), array('id' => 'f_wilayah', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Golongan darah
							</label>

							<div class="col-xs-6">
								{{ Form::select('gol_darah', Input::old('gol_darah'), array('id' => 'f_gol_darah', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Pendidikan 
							</label>

							<div class="col-xs-6">
								{{ Form::select('pendidikan',  Input::old('pendidikan'), array('id' => 'f_pendidikan', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Pekerjaan
							</label>

							<div class="col-xs-6">
								{{ Form::select('pekerjaan', Input::old('pekerjaan'), array('id' => 'f_pekerjaan', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Etnis
							</label>

							<div class="col-xs-6">
								{{ Form::select('etnis', Input::old('etnis'), array('id' => 'f_etnis', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kota lahir
							</label>

							<div class="col-xs-6">
								{{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_kota_lahir', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Tanggal lahir
							</label>

							<div class="col-xs-6">
								{{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_tanggal_lahir', 'class'=>'form-control')) }} <span class="red">*</span>
							</div>			
							<script>
							jQuery('#f_tanggal_lahir').datetimepicker({
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
								{{ Form::file('foto', array('name' => 'foto', 'id' => 'f_foto', 'accept' => 'image/*')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Status
							</label>

							<div class="col-xs-6">
								{{ Form::select('status', Input::old('status'), array('id' => 'f_status', 'class'=>'form-control')) }}<span class="red">*</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6 col-xs-push-3">
								<button id="f_post_anggota">Simpan Data Anggota</button>
							</div>
						</div>
					</div>	
				</div>	
			</div>	
		</div>	
	</div>	

	<script>
	$('body').on('change','#f_foto',function(){
		var i = 0, len = this.files.length, img, reader, file;			
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 										
						$('#show_foto').attr('src', e.target.result);																	
					};
					reader.readAsDataURL(file);
				}
				imageUpload = file;
			}	
		}
	});

	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	$('body').on('click', '#f_post_anggota', function(){								
		var data, xhr;
		data = new FormData();

		$nomor_anggota = $('#f_nomor_anggota').val();			
		data.append('no_anggota', $nomor_anggota);
		$nama_depan = $('#f_nama_depan').val();	
		data.append('nama_depan', $nama_depan);
		$nama_tengah = $('#f_nama_tengah').val();	
		data.append('nama_tengah', $nama_tengah);
		$nama_belakang = $('#f_nama_belakang').val();	
		data.append('nama_belakang', $nama_belakang);
		$jalan = $('#f_alamat').val();
		data.append('jalan', $jalan);
		$kota = $('#f_kota').val();
		data.append('kota', $kota);
		$kodepos = $('#f_kodepos').val();
		data.append('kodepos', $kodepos);
		$telp = $('#f_telp').val();	
		data.append('telp', $telp);		
		//looping ambil data hp
		var arr_hp = new Array();
		for($i = 1; $i < lastIdx; $i++)
		{
			arr_hp[arr_hp.length] = $('#f_hp'+$i+'').val();			
		}
		data.append('arr_hp', arr_hp);					
		$gender = $('input[name="gender"]:checked').val();	
		data.append('gender', $gender);
		$wilayah = $('#f_wilayah').val();	
		data.append('wilayah', $wilayah);
		$gol_darah = $('#f_gol_darah').val();
		data.append('gol_darah', $gol_darah);
		$pendidikan = $('#f_pendidikan').val();	
		data.append('pendidikan', $pendidikan);
		$pekerjaan = $('#f_pekerjaan').val();	
		data.append('pekerjaan', $pekerjaan);
		$etnis = $('#f_etnis').val();	
		data.append('etnis', $etnis);
		$kota_lahir	= $('#f_kota_lahir').val();
		data.append('kota_lahir', $kota_lahir);
		$tanggal_lahir = $('#f_tanggal_lahir').val();	
		data.append('tanggal_lahir', $tanggal_lahir);
		// $anggota_gereja = $('#f_id_gereja').val();
			// data.append('id_gereja', $anggota_gereja);
			if($('#f_foto').val() != "")
			{			
				$foto = $('#f_foto')[0].files[0];
			}		
			else		
			{
				$foto = "";
			}
			data.append('foto', $foto);
			$role = $('#f_status').val();
			data.append('role', $role);						

			$.ajax({
				type: 'POST',
				url: "{{URL('user/post_anggota')}}",
				data : data,
				processData: false,
				contentType: false,	
				success: function(response){				
				// alert(response);
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data anggota");
					location.reload();
				}
				else
				{
					alert(response);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});

		});
</script>

@stop