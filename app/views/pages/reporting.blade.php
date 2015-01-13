@extends('layouts.user_layout')
@section('content')

<script>
	$(document).ready(function(){				
	
		//END LOADER				
		$('.f_loader_container').addClass('hidden');
	
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
								<input type="button" class="btn btn-success" id="f_lihat_grafik" value="lihat grafik" />
							</div>
						</div>
						<div class="col-xs-12">
							<script type="text/javascript">
							$(function () {
								$('#container_graph').highcharts({
									chart: {
										type: 'area'
									},
									title: {
										text: 'Text Judul silahkan ubah'
									},
									subtitle: {
										text: ''
									},
									xAxis: {
										allowDecimals: false,
										labels: {
											formatter: function () {
												return this.value; 
											}
										}
									},
									yAxis: {
										title: {
											text: 'text axis'
										},
										labels: {
											formatter: function () {
												return this.value ;
											}
										}
									},
									tooltip: {
										pointFormat: 'Tanggal <b>{point.y:,.0f}</b><br/>Pada hari ke-{point.x}'
									},
									plotOptions: {
										area: {
											pointStart: 1,
											marker: {
												enabled: false,
												symbol: 'circle',
												radius: 1,
												states: {
													hover: {
														enabled: true
													}
												}
											}
										}
									},
									series: [{
										name: 'Hari',
										data: ['8','4','9','10','4','6','7','9']
									}]
								});
							});
							</script>
							<div id="container_graph" style="width: 100%; height: 400px; margin: 0 auto"></div>

						</div>
						<div class="col-xs-12">
							<div class="col-xs-8">
								<input type="button" class="btn btn-info pull-right" id="f_print_pdf" value="cetak grafik" />
							</div>							
						</div>
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
		
	});
	
	//print pdf
	$('body').on('click', '#f_print_pdf', function(){
		
	});
</script>

@stop