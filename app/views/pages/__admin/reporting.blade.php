@extends('layouts.admin_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//START LOADER				
		//$('.f_loader_container').removeClass('hidden');
		
		/*
		$from = 0;
		$to = 0;
		$jenis_kegiatan = [];
		$jenis = -1;
		$arr_tanggal=[];
		$jumlah =[];
		$.ajax({
			type: 'GET',
			url: "{{URL('user/jenis_kegiatan')}}",			
			success: function(response){
				$daftar_jenis_kegiatan = response;
				$.ajax({
					type: 'GET',
					url: "{{URL('user/reporting/search_kebaktian/')}}"+'/'+{{Session::get('id_gereja')}}+'/'+$from+'/'+$to+'/'+$jenis,			
					success: function(response){
						$arr_kegiatan = [];
						$jenis_kegiatan = 0;
						$count = 0;
						$temp = [];
						$arr_temp = [];
						$.each($daftar_jenis_kegiatan,function(){
							$jenis_kegiatan = $(this)[0].id;
							$.each(response,function(){
								if($(this)[0].id_jenis_kegiatan == $jenis_kegiatan){
									$temp.push($(this)[0].banyak_jemaat_pria+$(this)[0].banyak_jemaat_wanita+$(this)[0].banyak_simpatisan_pria+$(this)[0].banyak_simpatisan_wanita+$(this)[0].banyak_penatua_pria+$(this)[0].banyak_penatua_wanita+$(this)[0].banyak_pemusik_pria+$(this)[0].banyak_pemusik_wanita+$(this)[0].banyak_komisi_pria+$(this)[0].banyak_komisi_wanita);
								}
							});
							//$arr_kegiatan.push($temp);
							
							$arr_kegiatan.push({
								name:$(this)[0].nama_kegiatan,
								data:$temp
							});
							
							$temp = [];
						});
						
						$tanggal_recent ='';
						
						$.each(response,function(){
							if($tanggal_recent != $(this)[0].tanggal_mulai){
								$tanggal_recent = $(this)[0].tanggal_mulai;
								$arr_tanggal.push($tanggal_recent);
							}
						});
						//process tanggal
						for($i=0;$i<$arr_tanggal.length;$i++){
							$date = $arr_tanggal[$i];
							$arr = $date.split('-');
							switch($arr[1]){
								case '01':
									$arr[1]='JAN'
									break;
								case '02':
									$arr[1]='FEB'
									break;
								case '03':
									$arr[1]='MAR'
									break;
								case '04':
									$arr[1]='APR'
									break;
								case '05':
									$arr[1]='MEI'
									break;
								case '06':
									$arr[1]='JUN'
									break;
								case '07':
									$arr[1]='JUL'
									break;
								case '08':
									$arr[1]='AGU'
									break;
								case '09':
									$arr[1]='SEP'
									break;
								case '10':
									$arr[1]='OKT'
									break;
								case '11':
									$arr[1]='NOV'
									break;
								case '12':
									$arr[1]='DES'
									break;
							}
							$arr_tanggal[$i] = $arr[2]+'<br/>'+$arr[1]+'<br/>'+$arr[0];
						}
						$('#container_graph').highcharts({
							title: {
								text: 'Laporan Kehadiran Gereja',
								x: -20 //center
							},
							
							xAxis: {
								// tanggal
								categories: $arr_tanggal
							},
							yAxis: {
								title: {
									text: 'Banyak Jemaat'
								},
								plotLines: [{
									value: 0,
									width: 1,
									color: '#808080'
								}]
							},
							tooltip: {
								valueSuffix: 'orang'
							},
							legend: {
								layout: 'vertical',
								align: 'right',
								verticalAlign: 'middle',
								borderWidth: 0
							},
							series: $arr_kegiatan
						});
						//END LOADER				
						$('.f_loader_container').addClass('hidden');
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('error');
						alert(errorThrown);
						//END LOADER				
						$('.f_loader_container').addClass('hidden');
					}
				});
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		});
		*/
	});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">	
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->
		<!--<ol class="breadcrumb">
			<li><a href="#">Olah Data</a></li>
			<li class="active">Anggota</li>
		</ol>-->		

		<!--<div class="s_table_search">-->
		<div class="s_content">
			<div class="container-fluid">
				<!--newcode-->
				<ul class="nav nav-tabs" role="tablist" id="myTab" style="margin-top:15px;">
				  	<li role="presentation" class="active"><a href="#tab_kebaktian" aria-controls="tab_kebaktian" role="tab" data-toggle="tab">Kebaktian</a></li>
				  	<li role="presentation"><a href="#tab_persembahan" aria-controls="tab_persembahan" role="tab" data-toggle="tab">Persembahan</a></li>
				  	<li role="presentation"><a href="#tab_anggota" aria-controls="tab_anggota" role="tab" data-toggle="tab">Anggota</a></li>				  	
				</ul>

				<div class="tab-content">
				  	<div role="tabpanel" class="tab-pane fade in active" id="tab_kebaktian">
				  		<!-- 	
				  			NOTE : 
				  				- pas load pertama spertinya lebih enak grafiknya kosong dulu, takut loadnya kebanyakan
				  			 	- range tanggal maksimal yang boleh paling besar 1 tahun
				  				- yang ada di bagian kanan grafik, pengelompokannya bukan ambil dari tabel jenis kebaktian, 
				  					tapi ambil dari tabel kegiatan -> nama_jenis_kegiatan
						-->
				  		<div style="margin-top: 15px;" class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									LAPORAN KEBAKTIAN
								</h3>
							</div>
							<div class="panel-body">
								<div class="col-xs-12">
									<div class="col-xs-3">
										<label>dari tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_awal" placeholder="(dari tanggal)" style="width:150px;display:inline;"/>								
									</div>
									<div class="col-xs-3">
										<label>sampai tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_akhir" placeholder="(sampai tanggal)" style="width:150px;display:inline;"/>
									</div>
									<div class="col-xs-6">
										<div class="pull-right">
											<input type="button" class="btn btn-success" id="f_lihat_grafik" value="Update Grafik" style="margin-right:15px;" />
											<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_laporan_kebaktian" />
										</div>										
									</div>
								</div>
								<div class="col-xs-12">							
									<div id="container_graph" class='col-xs-12' style="display:block;width: 100%; height: 400px; margin: 0 auto"></div>
								</div>						
							</div>
						</div>	
				  	</div>
				  	<div role="tabpanel" class="tab-pane fade" id="tab_persembahan">
				  		<!-- isi grafik laporan persembahan di sini-->
				  		<!-- 
				  			NOTE : 
				  				- range tanggal maksimal yang boleh paling besar 1 tahun				  				
				  		-->
						<div style="margin-top: 15px;" class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									LAPORAN PERSEMBAHAN
								</h3>
							</div>
							<div class="panel-body">
								<div class="col-xs-12">
									<div class="col-xs-3">
										<label>dari tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_awal_persembahan" placeholder="(dari tanggal)" style="width:150px;display:inline;"/>								
									</div>
									<div class="col-xs-3">
										<label>sampai tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_akhir_persembahan" placeholder="(sampai tanggal)" style="width:150px;display:inline;"/>
									</div>
									<div class="col-xs-6">
										<div class="pull-right">
											<input type="button" class="btn btn-success" id="f_lihat_grafik_persembahan" value="Update Grafik" style="margin-right:15px;" />
											<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_laporan_persembahan" />
										</div>										
									</div>
								</div>
								<div class="col-xs-12">							
									<div id="container_graph_persembahan" class='col-xs-12' style="display:block;width: 100%; height: 400px; margin: 0 auto"></div>
								</div>						
							</div>
						</div>					  		
				  	</div>
				  	<div role="tabpanel" class="tab-pane fade" id="tab_anggota">
				  		<!-- isi grafik laporan pertumbuhan anggota di sini-->
				  		<!-- 
				  			NOTE : 
				  				- tampilkan grafik pertumbuhan total jemaat per tahun
				  				- range tanggal maksimal yang boleh paling besar 1 tahun				  				
				  		-->
				  		<div style="margin-top: 15px;" class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									LAPORAN PERTUMBUHAN ANGGOTA
								</h3>
							</div>
							<div class="panel-body">
								<div class="col-xs-12">
									<div class="col-xs-3">
										<label>dari tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_awal_anggota" placeholder="(dari tanggal)" style="width:150px;display:inline;"/>								
									</div>
									<div class="col-xs-3">
										<label>sampai tanggal : </label>
										<input class="form-control" type="text" id="f_tanggal_akhir_anggota" placeholder="(sampai tanggal)" style="width:150px;display:inline;" />
									</div>
									<div class="col-xs-2">										
										<label>satuan : </label>
										<select class="form-control" id="f_satuan_anggota" style="width:100px;display:inline;">
											<option value="0">(pilih)</option> <!-- defaultnya kayanya mending pake per bulan aj-->
											<option value="0">bulan</option>
											<option value="1">tahun</option>
										</select>																
									</div>
									<div class="col-xs-4">
										<div class="pull-right">
											<input type="button" class="btn btn-success" id="f_lihat_grafik_anggota" value="Update Grafik" style="margin-right:15px;" />
											<input type="button" value="Help ?" class="btn btn-danger" data-toggle="modal" data-target=".popup_video_laporan_anggota" />
										</div>										
									</div>
								</div>
								<div class="col-xs-12">							
									<div id="container_graph_anggota" class='col-xs-12' style="display:block;width: 100%; height: 400px; margin: 0 auto"></div>
								</div>						
							</div>
						</div>	
				  	</div>				  	
				</div>				
				<!--newcode-->
			</div>
		</div>
	</div>	
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

	//lihat grafik / generate grafik 
	$('body').on('click', '#f_lihat_grafik', function(){
		$('.f_loader_container').removeClass('hidden');
		// get tanggal
		$from = $('#f_tanggal_awal').val();
		$to = $('#f_tanggal_akhir').val();
		
		//kalau kosong
		if($from == ""){
			$from = 0;
		}
		if($to == ""){
			$to = 0;
		}
		
		
		$jenis_kegiatan = [];
		
		//default = -1
		$jenis = -1;
		
		//nyimpen ada tanggal apa aja
		$arr_tanggal=[];
		
		$.ajax({
			type: 'GET',
			url: "{{URL('admin/jenis_kegiatan')}}",			
			success: function(response){
				$('.f_loader_container').addClass('hidden');
				$daftar_jenis_kegiatan = response;
				$.ajax({
					type: 'GET',
					url: "{{URL('admin/reporting/search_kebaktian/')}}"+'/'+{{Session::get('id_gereja')}}+'/'+$from+'/'+$to+'/'+$jenis,			
					success: function(response){
						
						$arr_kegiatan = [];
						$jenis_kegiatan = 0;
						$temp = [];
						$.each($daftar_jenis_kegiatan,function(){
							$jenis_kegiatan = $(this)[0].id;
							//$nama_kegiatan = $(this)[0].nama_kegiatan;
							$.each(response,function(){
								if($(this)[0].id_jenis_kegiatan == $jenis_kegiatan){
								//if($(this)[0].nama_jenis_kegiatan == $nama_kegiatan){								
									$temp.push(0+parseInt($(this)[0].banyak_jemaat_pria)+
										parseInt($(this)[0].banyak_jemaat_wanita)+
										// parseInt($(this)[0].banyak_jemaat)+
										parseInt($(this)[0].banyak_simpatisan_pria)+
										parseInt($(this)[0].banyak_simpatisan_wanita)+
										// parseInt($(this)[0].banyak_simpatisan)+
										parseInt($(this)[0].banyak_penatua_pria)+
										parseInt($(this)[0].banyak_penatua_wanita)+
										// parseInt($(this)[0].banyak_penatua)+
										parseInt($(this)[0].banyak_pemusik_pria)+
										parseInt($(this)[0].banyak_pemusik_wanita)+
										// parseInt($(this)[0].banyak_pemusik)+
										parseInt($(this)[0].banyak_komisi_pria)+
										parseInt($(this)[0].banyak_komisi_wanita)
										// parseInt($(this)[0].banyak_komisi)
										);
								}
							});
							//$arr_kegiatan.push($temp);
							//alert($temp+"<br/>");
							
							$arr_kegiatan.push({
								name:$(this)[0].nama_kegiatan,
								data:$temp
							});
							
							$temp = [];
						});
												
						$tanggal_recent ='';
						
						$.each(response,function(){
							if($tanggal_recent != $(this)[0].tanggal_mulai){
								$tanggal_recent = $(this)[0].tanggal_mulai;
								$arr_tanggal.push($tanggal_recent);
							}
						});
						//process tanggal
						for($i=0;$i<$arr_tanggal.length;$i++){
							$date = $arr_tanggal[$i];
							$arr = $date.split('-');
							switch($arr[1]){
								case '01':
									$arr[1]='JAN'
									break;
								case '02':
									$arr[1]='FEB'
									break;
								case '03':
									$arr[1]='MAR'
									break;
								case '04':
									$arr[1]='APR'
									break;
								case '05':
									$arr[1]='MEI'
									break;
								case '06':
									$arr[1]='JUN'
									break;
								case '07':
									$arr[1]='JUL'
									break;
								case '08':
									$arr[1]='AGU'
									break;
								case '09':
									$arr[1]='SEP'
									break;
								case '10':
									$arr[1]='OKT'
									break;
								case '11':
									$arr[1]='NOV'
									break;
								case '12':
									$arr[1]='DES'
									break;
							}
							$arr_tanggal[$i] = $arr[2]+'<br/>'+$arr[1]+'<br/>'+$arr[0];
						}
						
						
						
						
						$('#container_graph').highcharts({
							title: {
								text: 'Laporan Kehadiran Gereja',
								x: -20 //center
							},
							subtitle:{
								text: $from+" sampai "+$to,
								x: -20
							},
							xAxis: {
								// tanggal
								categories: $arr_tanggal
							},
							yAxis: {
								title: {
									text: 'Banyak Jemaat'
								},
								plotLines: [{
									value: 0,
									width: 1,
									color: '#808080'
								}]
							},
							tooltip: {
								valueSuffix: ' orang'
							},
							legend: {
								layout: 'vertical',
								align: 'right',
								verticalAlign: 'middle',
								borderWidth: 0
							},
							series: $arr_kegiatan,
							exporting : {
								sourceHeight:768,
								sourceWidth:1366
							}
						});
						
						
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('error');
						alert(errorThrown);
					}
				});
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		});
	});
		
	jQuery('#f_tanggal_awal_persembahan').datetimepicker({
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
	
	jQuery('#f_tanggal_akhir_persembahan').datetimepicker({
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
	
	$('body').on('click', '#f_lihat_grafik_persembahan', function(){
		$('.f_loader_container').removeClass('hidden');
		// get tanggal
		$from = $('#f_tanggal_awal_persembahan').val();
		$to = $('#f_tanggal_akhir_persembahan').val();
		
		//kalau kosong
		if($from == ""){
			$from = 0;
		}
		if($to == ""){
			$to = 0;
		}
				
		$jenis_kegiatan = [];
		
		//default = -1
		$jenis = -1;
		
		//nyimpen ada tanggal apa aja
		$arr_tanggal=[];
		
		$.ajax({
			type: 'GET',
			url: "{{URL('admin/jenis_kegiatan')}}",			
			success: function(response){
				$('.f_loader_container').addClass('hidden');
				$daftar_jenis_kegiatan = response;
				$.ajax({
					type: 'GET',
					url: "{{URL('admin/reporting/search_persembahan/')}}"+'/'+$from+'/'+$to+'/'+$jenis,			
					success: function(response){
						
						$arr_kegiatan = [];
						$jenis_kegiatan = 0;
						$temp = [];
						$.each($daftar_jenis_kegiatan,function(){
							$jenis_kegiatan = $(this)[0].id;
							$.each(response,function(){
								if($(this)[0].id_jenis_kegiatan == $jenis_kegiatan){
									//$temp.push($(this)[0].banyak_jemaat_pria+$(this)[0].banyak_jemaat_wanita+$(this)[0].banyak_jemaat+$(this)[0].banyak_simpatisan_pria+$(this)[0].banyak_simpatisan_wanita+$(this)[0].banyak_simpatisan+$(this)[0].banyak_penatua_pria+$(this)[0].banyak_penatua_wanita+$(this)[0].banyak_penatua+$(this)[0].banyak_pemusik_pria+$(this)[0].banyak_pemusik_wanita+$(this)[0].banyak_pemusik+$(this)[0].banyak_komisi_pria+$(this)[0].banyak_komisi_wanita)+$(this)[0].banyak_komisi;
									$temp.push(parseInt($(this)[0].jumlah_persembahan));
								}
							});
							//$arr_kegiatan.push($temp);
							
							$arr_kegiatan.push({
								name:$(this)[0].nama_kegiatan,
								data:$temp
							});
							
							$temp = [];
						});
						
						$tanggal_recent ='';
						
						$.each(response,function(){
							if($tanggal_recent != $(this)[0].tanggal_mulai){
								$tanggal_recent = $(this)[0].tanggal_mulai;
								$arr_tanggal.push($tanggal_recent);
							}
						});
						//process tanggal
						for($i=0;$i<$arr_tanggal.length;$i++){
							$date = $arr_tanggal[$i];
							$arr = $date.split('-');
							switch($arr[1]){
								case '01':
									$arr[1]='JAN'
									break;
								case '02':
									$arr[1]='FEB'
									break;
								case '03':
									$arr[1]='MAR'
									break;
								case '04':
									$arr[1]='APR'
									break;
								case '05':
									$arr[1]='MEI'
									break;
								case '06':
									$arr[1]='JUN'
									break;
								case '07':
									$arr[1]='JUL'
									break;
								case '08':
									$arr[1]='AGU'
									break;
								case '09':
									$arr[1]='SEP'
									break;
								case '10':
									$arr[1]='OKT'
									break;
								case '11':
									$arr[1]='NOV'
									break;
								case '12':
									$arr[1]='DES'
									break;
							}
							$arr_tanggal[$i] = $arr[2]+'<br/>'+$arr[1]+'<br/>'+$arr[0];
						}
						
						
						
						
						$('#container_graph_persembahan').highcharts({
							title: {
								text: 'Laporan Persembahan Gereja',
								x: -20 //center
							},
							subtitle:{
								text: $from+" sampai "+$to,
								x: -20
							},
							xAxis: {
								// tanggal
								categories: $arr_tanggal
							},
							yAxis: {
								title: {
									text: 'Banyak Persembahan'
								},
								plotLines: [{
									value: 0,
									width: 1,
									color: '#808080'
								}]
							},
							tooltip: {
								valueSuffix: ' rupiah'
							},
							legend: {
								layout: 'vertical',
								align: 'right',
								verticalAlign: 'middle',
								borderWidth: 0
							},
							series: $arr_kegiatan,
							exporting : {
								sourceHeight:768,
								sourceWidth:1366
							}
						});
						
						
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert('error');
						alert(errorThrown);
					}
				});
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		});
	});	
	
	jQuery('#f_tanggal_awal_anggota').datetimepicker({
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
	
	jQuery('#f_tanggal_akhir_anggota').datetimepicker({
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
	
	$('body').on('click', '#f_lihat_grafik_anggota', function(){
		$('.f_loader_container').removeClass('hidden');
		// get tanggal
		$from = $('#f_tanggal_awal_anggota').val();
		$to = $('#f_tanggal_akhir_anggota').val();
		$bulan = $('#f_satuan_anggota').val();
		//alert($from+' '+$to+' '+$bulan);

		//kalau kosong
		if($from == ""){
			$from = 0;
		}
		if($to == ""){
			$to = 0;
		}
				
		$.ajax({
			type: 'GET',
			url: "{{URL('user/reporting/search_anggota/')}}"+'/'+{{Session::get('id_gereja')}}+'/'+$from+'/'+$to+'/'+$bulan,			
			success: function(response){
				//alert(response[0]);
				//alert(response[1]);
				$temp = [];
				$arr_anggota = [];
				
				$arr_anggota.push({
					name:'Anggota Gereja',
					data:response[0]
				});
				$('#container_graph_anggota').highcharts({
					title: {
						text: 'Laporan Perkembangan Anggota Gereja',
						x: -20 //center
					},
					subtitle:{
						text: $from+" sampai "+$to,
						x: -20
					},
					xAxis: {
					// tanggal
						categories: response[1]
					},
					yAxis: {
						title: {
							text: 'Banyak Anggota'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						valueSuffix: ' jiwa'
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'middle',
						borderWidth: 0
					},
					series: $arr_anggota,
					exporting : {
						sourceHeight:768,
						sourceWidth:1366
					}
				});
						
				$('.f_loader_container').addClass('hidden');	
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert('error');
				alert(errorThrown);
			}
		});
	});
</script>

@include('pages.__popup_video.popup_video_laporan_kebaktian')
@include('pages.__popup_video.popup_video_laporan_persembahan')
@include('pages.__popup_video.popup_video_laporan_anggota')

@stop