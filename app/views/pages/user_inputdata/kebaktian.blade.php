@extends('layouts.default')
@section('content')

<script>
	$(document).ready(function(){				
		$('#f_nama_pengkotbah').attr('disabled', true);		
		$('#f_pengkotbah').attr('disabled', false);				
		
		//set nama pembicara di awal
		var selected = $('#f_pengkotbah').find(":selected").text();
		$('#f_nama_pengkotbah').val(selected);	
	});

</script>

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_sidebar">
	<ul>		
		<li>{{HTML::linkRoute('view_kebaktian', 'Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_anggota', 'Anggota')}}</li>
		<li>{{HTML::linkRoute('view_baptis', 'Baptis')}}</li>
		<li>{{HTML::linkRoute('view_atestasi', 'Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_pernikahan', 'Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_kedukaan', 'Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_dkh', 'Dkh')}}</li>
	</ul>
</div>

<div class="s_content">
	<table border="0" style="width:100%;">
		<tr>
			<td class="">Kebaktian ke</td>
			<td>:</td>
			<td>{{Form::select('kebaktian_ke', $list_jenis_kegiatan, Input::old('kebaktian_ke'), array('id'=>'f_kebaktian_ke'))}}</td>
		</tr>
		<tr>
			<td class="">Pengkotbah</td>
			<td>:</td>
			<td>
				{{Form::select('pengkotbah', $list_pembicara, Input::old('pengkotbah'), array('id'=>'f_pengkotbah', 'disabled' => false))}}				
				<input id="f_check_pembicara_luar" type="checkbox" name="pembicara_luar" value="0" /> Pembicara Luar
			</td>
			<script>				
				$('body').on('change','#f_pengkotbah', function(){
					var selected = $('#f_pengkotbah').find(":selected").text();
					$('#f_nama_pengkotbah').val(selected);					
				});
			</script>
		</tr>
		<tr>
			<td class="">Nama Pengkotbah</td>
			<td>:</td>
			<td>{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_nama_pengkotbah', 'disabled' => true, 'style'=>'width:500px;'))}}</td>
		</tr>
		<tr>
			<td class="">Tanggal Mulai - Tanggal Selesai</td>
			<td>:</td>
			<td>{{ Form::text('tanggal_mulai', Input::old('tanggal_mulai'), array('id' => 'f_tanggal_mulai')) }} - 
				{{ Form::text('tanggal_selesai', Input::old('tanggal_selesai'), array('id' => 'f_tanggal_selesai')) }}</td>
			<script>				
				jQuery('#f_tanggal_mulai').datetimepicker({
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
				jQuery('#f_tanggal_selesai').datetimepicker({
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
		</tr>
		<tr>
			<td class="">Jam Mulai - Jam Selesai</td>
			<td>:</td>
			<td>{{ Form::text('jam_mulai', Input::old('jam_mulai'), array('id' => 'f_jam_mulai')) }} - 
				{{ Form::text('jam_selesai', Input::old('jam_selesai'), array('id' => 'f_jam_selesai')) }}</td>
			<script>
				
				jQuery('#f_jam_mulai').datetimepicker({
					datepicker:false,
					 // allowTimes:[
					  // '12:00', '13:00', '15:00', 
					  // '17:00', '17:05', '17:20', '19:00', '20:00'
					 // ]
					format:'H:i'
				});
				jQuery('#f_jam_selesai').datetimepicker({
					datepicker:false,
					format:'H:i'
				});
			</script>				
		</tr>
		<tr>
			<td class="">Banyak Jemaat Pria, Banyak Jemaat Wanita</td>
			<td>:</td>
			<td>{{Form::text('banyak_jemaat_pria', Input::old('banyak_jemaat_pria'), array('id'=>'f_banyak_jemaat_pria','onkeypress'=>'return isNumberKey(event)'))}}, 
				{{Form::text('banyak_jemaat_wanita', Input::old('banyak_jemaat_wanita'), array('id'=>'f_banyak_jemaat_wanita','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Seluruh Jemaat</td>
			<td>:</td>
			<td>{{Form::text('banyak_jemaat', Input::old('banyak_jemaat'), array('id'=>'f_banyak_jemaat','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Simpatisan Pria, Banyak Simpatisan Wanita</td>
			<td>:</td>
			<td>{{Form::text('banyak_simpatisan_pria', Input::old('banyak_simpatisan_pria'), array('id'=>'f_banyak_simpatisan_pria','onkeypress'=>'return isNumberKey(event)'))}}, 
				{{Form::text('banyak_simpatisan_wanita', Input::old('banyak_simpatisan_wanita'), array('id'=>'f_banyak_simpatisan_wanita','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Seluruh Simpatisan</td>
			<td>:</td>
			<td>{{Form::text('banyak_simpatisan', Input::old('banyak_simpatisan'), array('id'=>'f_banyak_simpatisan','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Penatua Pria, Banyak Penatua Wanita</td>
			<td>:</td>
			<td>{{Form::text('banyak_penatua_pria', Input::old('banyak_penatua_pria'), array('id'=>'f_banyak_penatua_pria','onkeypress'=>'return isNumberKey(event)'))}}, 
				{{Form::text('banyak_penatua_wanita', Input::old('banyak_penatua_wanita'), array('id'=>'f_banyak_penatua_wanita','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Seluruh Penatua</td>
			<td>:</td>
			<td>{{Form::text('banyak_penatua', Input::old('banyak_penatua'), array('id'=>'f_banyak_penatua','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Pemusik Pria, Banyak Pemusik Wanita</td>
			<td>:</td>
			<td>{{Form::text('banyak_pemusik_pria', Input::old('banyak_pemusik_pria'), array('id'=>'f_banyak_pemusik_pria','onkeypress'=>'return isNumberKey(event)'))}}, 
				{{Form::text('banyak_pemusik_wanita', Input::old('banyak_pemusik_wanita'), array('id'=>'f_banyak_pemusik_wanita','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Seluruh Pemusik</td>
			<td>:</td>
			<td>{{Form::text('banyak_pemusik', Input::old('banyak_pemusik'), array('id'=>'f_banyak_pemusik','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Komisi Pria, Banyak Komisi Wanita</td>
			<td>:</td>
			<td>{{Form::text('banyak_komisi_pria', Input::old('banyak_komisi_pria'), array('id'=>'f_banyak_komisi_pria','onkeypress'=>'return isNumberKey(event)'))}}, 
				{{Form::text('banyak_komisi_wanita', Input::old('banyak_komisi_wanita'), array('id'=>'f_banyak_komisi_wanita','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Banyak Seluruh Komisi</td>
			<td>:</td>
			<td>{{Form::text('banyak_komisi', Input::old('banyak_komisi'), array('id'=>'f_banyak_komisi','onkeypress'=>'return isNumberKey(event)'))}}</td>
		</tr>
		<tr>
			<td class="">Keterangan</td>
			<td>:</td>
			<td>{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan'))}}</td>
		</tr>		
		<!-- caritau dulu jenis persembahan untuk kegiatan ada apa aj -->
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_post_kebaktian">Simpan Data Kebaktian</button></td>
		</tr>
	</table>	
</div>	

<script>			
	$('body').on('click', '#f_check_pembicara_luar', function(){		
		if($('#f_check_pembicara_luar').val() == 0){	
			$('#f_check_pembicara_luar').val(1); //pakai pembicara luar jika value f_check_pembicara_luar == 1
			$('#f_nama_pengkotbah').attr('disabled', false);			
			$('#f_nama_pengkotbah').val("");
			$('#f_pengkotbah').attr('disabled', true);								
		}
		else
		{
			$('#f_check_pembicara_luar').val(0); //tidak pakai pembicara luar jika value f_check_pembicara_luar == 0
			$('#f_nama_pengkotbah').attr('disabled', true);	
			// $('#f_nama_pengkotbah').val("");
			selected = $('#f_pengkotbah').find(":selected").text();
			$('#f_nama_pengkotbah').val(selected);	
			$('#f_pengkotbah').attr('disabled', false);				
		}
	});
	
	//banyak_jemaat
	$('body').on('change','#f_banyak_jemaat_pria',function(){
		var jemaat_pria = parseInt($('#f_banyak_jemaat_pria').val());		
		var jemaat_wanita = parseInt($('#f_banyak_jemaat_wanita').val());
		if(isNaN(jemaat_wanita))
		{
			jemaat_wanita = 0;
		}
		$('#f_banyak_jemaat').val(jemaat_pria+jemaat_wanita);
	});
	$('body').on('change','#f_banyak_jemaat_wanita',function(){
		var jemaat_pria = parseInt($('#f_banyak_jemaat_pria').val());
		var jemaat_wanita = parseInt($('#f_banyak_jemaat_wanita').val());
		if(isNaN(jemaat_pria))
		{
			jemaat_wanita = 0;
		}
		$('#f_banyak_jemaat').val(jemaat_pria+jemaat_wanita);
	});		
	$('body').on('change','#f_banyak_jemaat',function(){
		$('#f_banyak_jemaat_pria').val('');
		$('#f_banyak_jemaat_wanita').val('');		
	});		
	
	//banyak_simpatisan
	$('body').on('change','#f_banyak_simpatisan_pria',function(){
		var simpatisan_pria = parseInt($('#f_banyak_simpatisan_pria').val());		
		var simpatisan_wanita = parseInt($('#f_banyak_simpatisan_wanita').val());
		if(isNaN(simpatisan_wanita))
		{
			simpatisan_wanita = 0;
		}
		$('#f_banyak_simpatisan').val(simpatisan_pria+simpatisan_wanita);
	});
	$('body').on('change','#f_banyak_simpatisan_wanita',function(){
		var simpatisan_pria = parseInt($('#f_banyak_simpatisan_pria').val());
		var simpatisan_wanita = parseInt($('#f_banyak_simpatisan_wanita').val());
		if(isNaN(simpatisan_pria))
		{
			simpatisan_wanita = 0;
		}
		$('#f_banyak_simpatisan').val(simpatisan_pria+simpatisan_wanita);
	});		
	$('body').on('change','#f_banyak_simpatisan',function(){
		$('#f_banyak_simpatisan_pria').val('');
		$('#f_banyak_simpatisan_wanita').val('');		
	});
	
	//banyak_penatua
	$('body').on('change','#f_banyak_penatua_pria',function(){
		var penatua_pria = parseInt($('#f_banyak_penatua_pria').val());		
		var penatua_wanita = parseInt($('#f_banyak_penatua_wanita').val());
		if(isNaN(penatua_wanita))
		{
			penatua_wanita = 0;
		}
		$('#f_banyak_penatua').val(penatua_pria+penatua_wanita);
	});
	$('body').on('change','#f_banyak_penatua_wanita',function(){
		var penatua_pria = parseInt($('#f_banyak_penatua_pria').val());
		var penatua_wanita = parseInt($('#f_banyak_penatua_wanita').val());
		if(isNaN(penatua_pria))
		{
			penatua_wanita = 0;
		}
		$('#f_banyak_penatua').val(penatua_pria+penatua_wanita);
	});		
	$('body').on('change','#f_banyak_penatua',function(){
		$('#f_banyak_penatua_pria').val('');
		$('#f_banyak_penatua_wanita').val('');		
	});
	
	//banyak_pemusik
	$('body').on('change','#f_banyak_pemusik_pria',function(){
		var pemusik_pria = parseInt($('#f_banyak_pemusik_pria').val());		
		var pemusik_wanita = parseInt($('#f_banyak_pemusik_wanita').val());
		if(isNaN(pemusik_wanita))
		{
			pemusik_wanita = 0;
		}
		$('#f_banyak_pemusik').val(pemusik_pria+pemusik_wanita);
	});
	$('body').on('change','#f_banyak_pemusik_wanita',function(){
		var pemusik_pria = parseInt($('#f_banyak_pemusik_pria').val());
		var pemusik_wanita = parseInt($('#f_banyak_pemusik_wanita').val());
		if(isNaN(pemusik_pria))
		{
			pemusik_wanita = 0;
		}
		$('#f_banyak_pemusik').val(pemusik_pria+pemusik_wanita);
	});		
	$('body').on('change','#f_banyak_pemusik',function(){
		$('#f_banyak_pemusik_pria').val('');
		$('#f_banyak_pemusik_wanita').val('');		
	});
	
	//banyak_komisi
	$('body').on('change','#f_banyak_komisi_pria',function(){
		var komisi_pria = parseInt($('#f_banyak_komisi_pria').val());		
		var komisi_wanita = parseInt($('#f_banyak_komisi_wanita').val());
		if(isNaN(komisi_wanita))
		{
			komisi_wanita = 0;
		}
		$('#f_banyak_komisi').val(komisi_pria+komisi_wanita);
	});
	$('body').on('change','#f_banyak_komisi_wanita',function(){
		var komisi_pria = parseInt($('#f_banyak_komisi_pria').val());
		var komisi_wanita = parseInt($('#f_banyak_komisi_wanita').val());
		if(isNaN(komisi_pria))
		{
			komisi_wanita = 0;
		}
		$('#f_banyak_komisi').val(komisi_pria+komisi_wanita);
	});		
	$('body').on('change','#f_banyak_komisi',function(){
		$('#f_banyak_komisi_pria').val('');
		$('#f_banyak_komisi_wanita').val('');		
	});
	
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	$('body').on('click', '#f_post_kebaktian', function(){
		$kebaktian_ke = $('#f_kebaktian_ke').val();
		if($('#f_check_pembicara_luar').val() == 1) //pakai pembicara luar
		{
			$id_pendeta = '';
			$nama_pendeta = $('#f_nama_pengkotbah').val();
		}
		else
		{
			$id_pendeta = $('#f_pengkotbah').val();
			$nama_pendeta = $('#f_nama_pengkotbah').val();
		}		
		$tanggal_mulai = $('#f_tanggal_mulai').val();
		$tanggal_selesai = $('#f_tanggal_selesai').val();
		$jam_mulai = $('#f_jam_mulai').val();
		$jam_selesai = $('#f_jam_selesai').val();
		$banyak_jemaat_pria = $('#f_banyak_jemaat_pria').val();
		$banyak_jemaat_wanita = $('#f_banyak_jemaat_wanita').val();
		$banyak_jemaat = $('#f_banyak_jemaat').val();
		$banyak_simpatisan_pria = $('#f_banyak_simpatisan_pria').val();
		$banyak_simpatisan_wanita = $('#f_banyak_simpatisan_wanita').val();
		$banyak_simpatisan = $('#f_banyak_simpatisan').val();
		$banyak_penatua_pria = $('#f_banyak_penatua_pria').val();
		$banyak_penatua_wanita = $('#f_banyak_penatua_wanita').val();
		$banyak_penatua = $('#f_banyak_penatua').val();
		$banyak_pemusik_pria = $('#f_banyak_pemusik_pria').val();
		$banyak_pemusik_wanita = $('#f_banyak_pemusik_wanita').val();
		$banyak_pemusik = $('#f_banyak_pemusik').val();
		$banyak_komisi_pria = $('#f_banyak_komisi_pria').val();
		$banyak_komisi_wanita = $('#f_banyak_komisi_wanita').val();
		$banyak_komisi = $('#f_banyak_komisi').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'kebaktian_ke' : $kebaktian_ke,
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
			'keterangan' : $keterangan
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_kebaktian')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				if(response == true)
				{	
					alert("Berhasil simpan data kebaktian");
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