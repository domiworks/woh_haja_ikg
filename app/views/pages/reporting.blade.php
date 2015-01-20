@extends('layouts.user_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
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
					url: "{{URL('user/reporting/search_kebaktian/')}}"+'/'+$from+'/'+$to+'/'+$jenis,			
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
	});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">

	<div class="s_main_side" style="">
		<div class="s_content">
			<div class="container-fluid">				
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							LAPORAN KEBAKTIAN
						</h3>
					</div>
					<div class="panel-body">
						<div class="col-xs-12">
							<div class="col-xs-4">
								<label>dari tanggal : </label>
								<input type="text" id="f_tanggal_awal" placeholder="(dari tanggal)"/>								
							</div>
							<div class="col-xs-4">
								<label>sampai tanggal : </label>
								<input type="text" id="f_tanggal_akhir" placeholder="(sampai tanggal)"/>
							</div>
							<div class="col-xs-4">
								<input type="button" class="btn btn-success" id="f_lihat_grafik" value="Update Grafik" />
							</div>
						</div>
						<div class="col-xs-12">
							
							<div id="container_graph" class='col-xs-12' style="display:block;width: 100%; height: 400px; margin: 0 auto"></div>

						</div>
						<!--<div class="col-xs-12">
							<div class="col-xs-8">
								<input type="button" class="btn btn-info pull-right" id="f_print_pdf" value="cetak grafik" />
							</div>							
						</div>-->
					</div>
				</div>				
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
			url: "{{URL('user/jenis_kegiatan')}}",			
			success: function(response){
				$('.f_loader_container').addClass('hidden');
				$daftar_jenis_kegiatan = response;
				$.ajax({
					type: 'GET',
					url: "{{URL('user/reporting/search_kebaktian/')}}"+'/'+$from+'/'+$to+'/'+$jenis,			
					success: function(response){
						
						$arr_kegiatan = [];
						$jenis_kegiatan = 0;
						$temp = [];
						$.each($daftar_jenis_kegiatan,function(){
							$jenis_kegiatan = $(this)[0].id;
							$.each(response,function(){
								if($(this)[0].id_jenis_kegiatan == $jenis_kegiatan){
									$temp.push($(this)[0].banyak_jemaat_pria+$(this)[0].banyak_jemaat_wanita+$(this)[0].banyak_jemaat+$(this)[0].banyak_simpatisan_pria+$(this)[0].banyak_simpatisan_wanita+$(this)[0].banyak_simpatisan+$(this)[0].banyak_penatua_pria+$(this)[0].banyak_penatua_wanita+$(this)[0].banyak_penatua+$(this)[0].banyak_pemusik_pria+$(this)[0].banyak_pemusik_wanita+$(this)[0].banyak_pemusik+$(this)[0].banyak_komisi_pria+$(this)[0].banyak_komisi_wanita)+$(this)[0].banyak_komisi;
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
	
	//print pdf
	$('body').on('click', '#f_print_pdf', function(){
		
	});
</script>

@stop