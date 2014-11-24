@extends('layouts.default')
@section('content')

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_sidebar">
	<!-- input data-->
	<ul>		
		<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
	</ul>
	
	<!-- olahdata -->
	<ul>
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
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
			<td class="">Nama Pengkotbah</td>
			<td>:</td>
			<td>{{Form::text('nama_pengkotbah', Input::old('nama_pengkotbah') , array('id' => 'f_nama_pengkotbah', 'style'=>'width:250px;'))}}</td>
		</tr>
		<tr>
			<td class="">Antara tanggal </td>
			<td>:</td>
			<td>
				{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal')) }} - 
				{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir')) }}
			</td>
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
		</tr>
		<tr>
			<td class="">Antara jam </td>
			<td>:</td>
			<td>
				{{ Form::text('jam_awal', Input::old('jam_awal'), array('id' => 'f_jam_awal')) }} - 
				{{ Form::text('jam_akhir', Input::old('jam_akhir'), array('id' => 'f_jam_akhir')) }}
			</td>
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
		</tr>			
		<tr>
			<td class="">Banyak jemaat yang hadir</td>
			<td>:</td>
			<td>
				{{ Form::text('batas_bawah_hadir_jemaat', Input::old('batas_bawah_hadir_jemaat'), array('id' => 'f_batas_bawah_hadir_jemaat', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }} - 
				{{ Form::text('batas_atas_hadir_jemaat', Input::old('batas_atas_hadir_jemaat'), array('id' => 'f_batas_atas_hadir_jemaat', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }}
			</td>
		</tr>
		<tr>
			<td class="">Banyak simpatisan yang hadir</td>
			<td>:</td>
			<td>
				{{ Form::text('batas_bawah_hadir_simpatisan', Input::old('batas_bawah_hadir_simpatisan'), array('id' => 'f_batas_bawah_hadir_simpatisan', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }} - 
				{{ Form::text('batas_atas_hadir_simpatisan', Input::old('batas_atas_hadir_simpatisan'), array('id' => 'f_batas_atas_hadir_simpatisan', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }}
			</td>
		</tr>
		<tr>
			<td class="">Banyak penatua yang hadir</td>
			<td>:</td>
			<td>
				{{ Form::text('batas_bawah_hadir_penatua', Input::old('batas_bawah_hadir_penatua'), array('id' => 'f_batas_bawah_hadir_penatua', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }} - 
				{{ Form::text('batas_atas_hadir_penatua', Input::old('batas_atas_hadir_penatua'), array('id' => 'f_batas_atas_hadir_penatua', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }}
			</td>
		</tr>
		<tr>
			<td class="">Banyak pemusik yang hadir</td>
			<td>:</td>
			<td>
				{{ Form::text('batas_bawah_hadir_pemusik', Input::old('batas_bawah_hadir_pemusik'), array('id' => 'f_batas_bawah_hadir_pemusik', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }} - 
				{{ Form::text('batas_atas_hadir_pemusik', Input::old('batas_atas_hadir_pemusik'), array('id' => 'f_batas_atas_hadir_pemusik', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }}
			</td>
		</tr>
		<tr>
			<td class="">Banyak komisi yang hadir</td>
			<td>:</td>
			<td>
				{{ Form::text('batas_bawah_hadir_komisi', Input::old('batas_bawah_hadir_komisi'), array('id' => 'f_batas_bawah_hadir_komisi', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }} - 
				{{ Form::text('batas_atas_hadir_komisi', Input::old('batas_atas_hadir_komisi'), array('id' => 'f_batas_atas_hadir_komisi', 'style'=>'width:50px;' ,'onkeypress'=>'return isNumberKey(event)')) }}
			</td>
		</tr>
		<!--
		<tr>
			<td class="">Gereja</td>
			<td>:</td>
			<td> Form::select('id_gereja', dollarlist_gereja, Input::old('id_gereja'), array('id' => 'f_id_gereja')) <span class="red">*</span></td>
		</tr>		
		-->		
		<tr>
			<td></td>
			<td></td>
			<td><button id="f_search_kebaktian">Cari Data Kebaktian</button></td>
		</tr>
	</table>

	<div id="f_result_kebaktian"></div>
	
</div>	

<script>					
	function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	$('body').on('click', '#f_search_kebaktian', function(){		
		$kebaktian_ke = $('#f_kebaktian_ke').val();
		$nama_pendeta = $('#f_nama_pengkotbah').val();			
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		$jam_awal = $('#f_jam_awal').val();
		$jam_akhir = $('#f_jam_akhir').val();		
		$batas_bawah_hadir_jemaat = $('#f_batas_bawah_hadir_jemaat').val();
		$batas_atas_hadir_jemaat = $('#f_batas_atas_hadir_jemaat').val();
		$batas_bawah_hadir_simpatisan = $('#f_batas_bawah_hadir_simpatisan').val();
		$batas_atas_hadir_simpatisan = $('#f_batas_atas_hadir_simpatisan').val();
		$batas_bawah_hadir_penatua = $('#f_batas_bawah_hadir_penatua').val();
		$batas_atas_hadir_penatua = $('#f_batas_atas_hadir_penatua').val();
		$batas_bawah_hadir_pemusik = $('#f_batas_bawah_hadir_pemusik').val();
		$batas_atas_hadir_pemusik = $('#f_batas_atas_hadir_pemusik').val();
		$batas_bawah_hadir_komisi = $('#f_batas_bawah_hadir_komisi').val();
		$batas_atas_hadir_komisi = $('#f_batas_atas_hadir_komisi').val();
				
		// alert($batas_bawah_hadir_jemaat);
		// alert($batas_atas_hadir_jemaat);
		// alert($batas_bawah_hadir_simpatisan);
		// alert($batas_atas_hadir_simpatisan);
		// alert($batas_bawah_hadir_penatua);
		// alert($batas_atas_hadir_penatua);
		// alert($batas_bawah_hadir_pemusik);
		// alert($batas_atas_hadir_pemusik);
		// alert($batas_bawah_hadir_komisi);
		// alert($batas_atas_hadir_komisi);		
		
		
		$data = {
			'kebaktian_ke' : $kebaktian_ke,			
			'nama_pendeta' : $nama_pendeta,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'jam_awal' : $jam_awal,
			'jam_akhir' : $jam_akhir,			
			'batas_bawah_hadir_jemaat' : $batas_bawah_hadir_jemaat,
			'batas_atas_hadir_jemaat' : $batas_atas_hadir_jemaat,
			'batas_bawah_hadir_simpatisan' : $batas_bawah_hadir_simpatisan,
			'batas_atas_hadir_simpatisan' : $batas_atas_hadir_simpatisan,
			'batas_bawah_hadir_penatua' : $batas_bawah_hadir_penatua,
			'batas_atas_hadir_penatua' : $batas_atas_hadir_penatua,
			'batas_bawah_hadir_pemusik' : $batas_bawah_hadir_pemusik,
			'batas_atas_hadir_pemusik' : $batas_atas_hadir_pemusik,
			'batas_bawah_hadir_komisi' : $batas_bawah_hadir_komisi,
			'batas_atas_hadir_komisi' : $batas_atas_hadir_komisi
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_kebaktian')}}",
			data : {
				'data' : $data
			},
			success: function(response){				
				alert("Berhasil cari data kebaktian");
				// location.reload();					
				if(response != "no result")
				{
					var result = "";					
					for($i = 0; $i < response.length; $i++)
					{
						result += response[$i]['id']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_kebaktian').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_kebaktian').html("<p>No result</p>");
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
</script>
	
@stop