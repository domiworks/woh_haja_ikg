@extends('layouts.admin_layout')
@section('content')

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="">
		<div>
			@include('includes.sidebar.sidebar_00')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->

		<ol class="breadcrumb">
			<li><a href="#">Input Data</a></li>
			<li class="active">Anggota</li>
		</ol>
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
									{{ Form::text('nama_depan', Input::old('nama_depan'), array('id' => 'f_nama_depan', 'class'=>'form-control')) }} 
								</div>
								<div class="col-xs-0">
									*
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
								{{ Form::text('nama_tengah', Input::old('nama_tengah'), array('id' => 'f_nama_tengah', 'class'=>'form-control')) }} 
							</div>

						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Nama belakang
							</label>
							
							<div class="col-xs-6">
								{{ Form::text('nama_belakang', Input::old('nama_belakang'), array('id' => 'f_nama_belakang', 'class'=>'form-control')) }} 
							</div>

						</div>			
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Alamat
							</label>

							<div class="col-xs-6">
								{{ Form::textarea('alamat', Input::old('alamat'), array('id' => 'f_alamat', 'class'=>'form-control')) }} 
							</div>
							<div class="col-xs-0">
								*
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kota
							</label>

							<div class="col-xs-6">
								{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota', 'class'=>'form-control')) }} 
							</div>
							<div class="col-xs-0">
								*
							</div>							
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kodepos
							</label>

							<div class="col-xs-6">
								{{ Form::text('kodepos', Input::old('kodepos'), array('id' => 'f_kodepos', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
							</div>

						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Telepon
							</label>

							<div class="col-xs-6">
								{{ Form::text('telp', Input::old('telp'), array('id' => 'f_telp', 'class'=>'form-control', 'onkeypress'=>'return isNumberKey(event)')) }} 
							</div>
							<div class="col-xs-0">
								*
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
										newRow +="<input type='text' id='f_hp"+lastIdx+"' class='form-control' name='hp"+lastIdx+"' onkeypress='return isNumberKey(event)'/>";
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
								{{ Form::radio('gender', '1', true, array('id'=>'f_jenis_kelamin')) }}pria    {{ Form::radio('gender', '0', '', array('id'=>'f_jenis_kelamin')) }}wanita 
							</div>
							<div class="col-xs-0">
								*
							</div>						
						</div>		
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Wilayah
							</label>

							<div class="col-xs-6">
								{{-- @if($list_wilayah == null) --}}
								<p class="control-label pull-left">(tidak ada daftar wilayah)</p>
								{{-- @else  --}}
								{{-- {{ Form::select('wilayah', $list_wilayah, Input::old('wilayah'), array('id' => 'f_wilayah', 'class'=>'form-control')) }} --}}
								{{-- @endif	 --}}
							</div>

						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Golongan darah
							</label>

							<div class="col-xs-6">
								{{-- @if($list_gol_darah == null) --}}
								<p class="control-label pull-left">(tidak ada daftar golongan darah)</p>
								{{-- @else --}}
								{{-- {{ Form::select('gol_darah', $list_gol_darah, Input::old('gol_darah'), array('id' => 'f_gol_darah', 'class'=>'form-control')) }} --}}
								{{-- @endif --}}
							</div>
							<div class="col-xs-0">
								*
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Pendidikan 
							</label>

							<div class="col-xs-6">
								{{-- @if($list_pendidikan == null) --}}
								<p class="control-label pull-left">(tidak ada daftar pendidikan)</p>
								{{-- @else --}}
								{{-- {{ Form::select('pendidikan', $list_pendidikan, Input::old('pendidikan'), array('id' => 'f_pendidikan', 'class'=>'form-control')) }} --}}
								{{-- @endif --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Pekerjaan
							</label>

							<div class="col-xs-6">
								{{-- @if($list_pekerjaan == null) --}}
								<p class="control-label pull-left">(tidak ada daftar pekerjaan)</p>
								{{-- @else --}}
								{{-- {{ Form::select('pekerjaan', $list_pekerjaan, Input::old('pekerjaan'), array('id' => 'f_pekerjaan', 'class'=>'form-control')) }} --}}
								{{-- @endif --}}
							</div>
							<div class="col-xs-0">
								*
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Etnis
							</label>

							<div class="col-xs-6">
								{{-- @if($list_etnis == null) --}}
								<p class="control-label pull-left">(tidak ada daftar etnis)</p>
								{{-- @else --}}
								{{-- {{ Form::select('etnis', $list_etnis, Input::old('etnis'), array('id' => 'f_etnis', 'class'=>'form-control')) }} --}}
								{{-- @endif --}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Kota lahir
							</label>

							<div class="col-xs-6">
								{{-- {{ Form::text('kota_lahir', Input::old('kota_lahir'), array('id' => 'f_kota_lahir', 'class'=>'form-control')) }}  --}}
							</div>
							<div class="col-xs-0">
								*
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">
								Tanggal lahir
							</label>

							<div class="col-xs-6">
								{{-- {{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('id' => 'f_tanggal_lahir', 'class'=>'form-control')) }} --}}
							</div>	
							<div class="col-xs-0">
								*
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
								{{-- @if($list_role == null)--}}
								<p class="control-label pull-left">(tidak ada daftar role)</p>
								{{-- @else	--}}							
								{{-- {{ Form::select('status', $list_role, Input::old('status'), array('id' => 'f_status', 'class'=>'form-control')) }}--}}
								{{-- @endif	--}}
							</div>
							<div class="col-xs-0">
								*
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-6 col-xs-push-3">
								{{-- @if($list_wilayah == null || $list_gol_darah == null || $list_pendidikan == null || $list_pekerjaan == null || $list_etnis == null || $list_role == null) --}}
								<input type="button" id="f_post_anggota" class="btn btn-success" value="Simpan Data Anggota" disabled=true />
								{{-- @else --}}
								<input type="button" id="f_post_anggota" class="btn btn-success" value="Simpan Data Anggota" />
								{{-- @endif --}}
							</div>
						</div>
					</form>	
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

	/*
		$('body').on('click', '#f_post_anggota', function(){		
			var data, xhr;
			data = new FormData();
			
			$nomor_anggota = $('#f_nomor_anggota').val();			
			$nama_depan = $('#f_nama_depan').val();			
			$nama_tengah = $('#f_nama_tengah').val();			
			$nama_belakang = $('#f_nama_belakang').val();			
			$jalan = $('#f_alamat').val();		
			$kota = $('#f_kota').val();		
			$kodepos = $('#f_kodepos').val();		
			$telp = $('#f_telp').val();			
			//looping ambil data hp
			var arr_hp = new Array();
			for($i = 1; $i < lastIdx; $i++)
			{
				arr_hp[arr_hp.length] = $('#f_hp'+$i+'').val();			
			}						
			$gender = $('input[name="gender"]:checked').val();			
			$wilayah = $('#f_wilayah').val();			
			$gol_darah = $('#f_gol_darah').val();		
			$pendidikan = $('#f_pendidikan').val();			
			$pekerjaan = $('#f_pekerjaan').val();			
			$etnis = $('#f_etnis').val();			
			$kota_lahir	= $('#f_kota_lahir').val();		
			$tanggal_lahir = $('#f_tanggal_lahir').val();					
			$role = $('#f_status').val();				
			
			if($('#f_foto').val() != "")
			{			
				$foto = $('#f_foto')[0].files[0];
			}		
			else		
			{
				$foto = "";
			}		
			data.append('foto', $foto);
			
			
			$data = {
				'no_anggota' : $nomor_anggota,		
				'nama_depan' : $nama_depan,
				'nama_tengah' : $nama_tengah,
				'nama_belakang' : $nama_belakang,
				'jalan' : $jalan,
				'kota' : $kota,
				'kodepos' : $kodepos,
				'telp' : $telp,		
				'arr_hp' : arr_hp,	
				'gender' : $gender,
				'wilayah' : $wilayah,
				'gol_darah' : $gol_darah,
				'pendidikan' : $pendidikan,
				'pekerjaan' : $pekerjaan,
				'etnis' : $etnis,
				'kota_lahir' : $kota_lahir,
				'tanggal_lahir' : $tanggal_lahir,
				'role' : $role		
			};
			
			var json_data = JSON.stringify($data);
			
			$.ajax({
				type: 'POST',
				url: "{{URL('user/post_anggota')}}",
				data : {
					'json_data' : json_data
					// 'foto' : data
				},
				dataType: 'json',
				processData: false,
				contentType: false,				
				success: function(response){				
					result = JSON.parse(response);				
					if(result.code==201)
					{					
						alert('berhasil');
						// alert(result.messages);
						// window.location = '{{URL::route('view_inputdata_anggota')}}';
					}
					else
					{
						alert(result.messages);
					}				
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert('error');
					alert(errorThrown);
				}
			});
		});
*/


	//BEFORE
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
				result = JSON.parse(response);				
				if(result.code==201)
				{				
					alert(result.messages);
					window.location = '{{URL::route('view_inputdata_anggota')}}';
				}
				else
				{
					alert(result.messages);
				}
				// alert(response);				
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data anggota");
					// location.reload();
					window.location = '{{URL::route('view_inputdata_anggota')}}';
				}
				else
				{
					alert(response);
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		},'json');
	});

</script>

</div>
</div>

@stop