@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Input Data</a></li>
	<li class="active">Baptis</li>
</ol>

<!-- <div class="s_sidebar"> -->
<!-- input data-->


<!-- olahdata -->
<!--
	<ul>
		<li>{{HTML::linkRoute('view_olahdata_kebaktian', 'Olah Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_anggota', 'Olah Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_baptis', 'Olah Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_atestasi', 'Olah Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_pernikahan', 'Olah Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_kedukaan', 'Olah Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_olahdata_dkh', 'Olah Data Dkh')}}</li>
	</ul>
-->
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
							Nomor Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="nomor_baptis" id="f_nomor_baptis" class="form-control">
						</div>	
						<div class="col-xs-0">
							*
						</div>						
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Pembaptis
						</label>

						<div class="col-xs-6">							
							@if($list_pembaptis == null)
								<p class="control-label pull-left">(tidak ada daftar pembaptis)</p>
							@else
								{{ Form::select('pembaptis', $list_pembaptis, Input::old('pembaptis'), array('id'=>'f_pembaptis', 'class'=>'form-control')) }}
							@endif							
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jemaat
						</label>

						<div class="col-xs-6">
							<!--<input type="text" name="jemaat" id="f_jemaat" class="form-control">-->
							@if($list_jemaat == null)
								<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
							@else
								{{ Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control')) }}							
							@endif							
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jenis Baptis
						</label>

						<div class="col-xs-6">
							<!--<input type="text" name="jenis_baptis" id="f_jenis_baptis" class="form-control">-->
							@if($list_jenis_baptis == null)
								<p class="control-label pull-left">(tidak ada daftar jenis baptis)</p>
							@else
								{{ Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_jenis_baptis', 'class'=>'form-control')) }}
							@endif							
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="tanggal_baptis" id="f_tanggal_baptis" class="form-control">
						</div>
						<div class="col-xs-0">
							*
						</div>
						<script>
						jQuery('#f_tanggal_baptis').datetimepicker({
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
						<div class="col-xs-6 col-xs-push-3">
							@if($list_jemaat == null || $list_pembaptis == null || $list_jenis_baptis == null)
								<input type="button" id="f_post_baptis" class="btn btn-success" value="Simpan Data Baptis" disabled=true />
							@else
								<input type="button" id="f_post_baptis" class="btn btn-success" value="Simpan Data Baptis" />
							@endif							
						</div>
					</div>
				</form>	

			</div>	
		</div>	
	</div>	
</div>	

<script>
/*
var trigger = false;
$('body').on('keyup','#f_jemaat',function()
{
	trigger = false;
	$('#searchContent').html("");
	$keyword = $('#f_jemaat').val();
	$data = "";
	$.ajax({
		type: 'GET',
		url: '{{--URL::route('allAirport')--}}',
		data: {
			'keyword' : $keyword
		},
		success: function(response){
			$data = "";
			$.each(response , function(i,resp)
			{
				
				$data = $data + "<tr id='row_"+resp.id + "' class='search_row' style='border-bottom: 1px solid #000 !important;' data-dismiss='modal'><td><span style='display: block;'>";
				$data = $data + "<td>"+resp.nama_bandara+" ( "+resp.kode_bandara + " ) - "+ resp.city.nama_kota;
				$data = $data + "</td><input type='hidden' value='"+resp.id+"' />";
				$data = $data + "</tr>";
			});
			if(trigger == false){
				$('#searchContent').html($data);
				//$('#f_table_suggestion_pelanggan').removeClass('hidden');
				$('#searchContent').removeClass('hidden');
			}
		},error: function(xhr, textStatus, errorThrown){
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
			alert("responseText: "+xhr.responseText);
		}
	},'json');
});

$('body').on('click','#searchContent > tr > td',function(){
	//alert($(this).text());
	//alert($(this).next().val());
	$('#depart_flight_hotel').val($(this).next().val());
	$('#departFrom').val($(this).text());
	trigger = true;
	//$('#f_table_suggestion_pelanggan ').addClass('hidden');
	$('#searchContent').addClass('hidden');
});
*/

$('body').on('click', '#f_post_baptis', function(){
	$nomor_baptis = $('#f_nomor_baptis').val();
	$pembaptis = $('#f_pembaptis').val();
	$jemaat = $('#f_jemaat').val();
	$jenis_baptis = $('#f_jenis_baptis').val();		
	$tanggal_baptis = $('#f_tanggal_baptis').val();
	// $gereja = $('#f_id_gereja').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'id_jemaat' : $jemaat,
			'id_pendeta' : $pembaptis,
			'tanggal_baptis' : $tanggal_baptis,
			'id_jenis_baptis' : $jenis_baptis
			// 'id_gereja' : $gereja
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/post_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data baptis");
					// location.reload();
					window.location = '{{URL::route('view_inputdata_baptis')}}';
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