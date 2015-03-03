@extends('layouts.user_layout')
@section('content')

<script>
$(document).ready(function(){				
	
	//END LOADER				
	$('.f_loader_container').addClass('hidden');
	
});
</script>

<div class="s_content_maindiv" style="overflow: hidden;">
	<div class="s_sidebar_main" style="width:200px; background-color:white;">
		<div>
			@include('includes.sidebar.sidebar_user_inputdata')
		</div>
	</div>
	<div class="s_main_side" style="">
		<!-- css -->
		<style>

		</style>
		<!-- end css -->
		<!--<ol class="breadcrumb">
			<li><a href="#">Input Data</a></li>
			<li class="active">DKH</li>
		</ol>-->

		<div class="s_content">
			<div class="container-fluid">
				<!--<div class="col-md-3 panel panel-default ">
					<ul>		
						<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
						<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
					</ul>
				</div>-->
				
				<!--div class="panel panel-default col-md-9"-->
				<div style="margin-top: 15px;" class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							DKH
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">

							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nomor Piagam Dkh
								</label>
								<div class="col-xs-4">
									{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh', 'class'=>'form-control'))}}
								</div>	
								<div class="col-xs-0">
									*
								</div>							
							</div>
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Nama Jemaat
								</label>
								<div class="col-xs-4">
									<!--<input type="text" class="form-control" id="f_nama_jemaat"  />-->
									
									@if($list_jemaat == null)
										<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
									@else								
										{{Form::select('nama_jemaat', $list_jemaat, Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}
									@endif
								</div>								
								<!-- start search table -->
								<!--<table class="table table-bordered table-striped">
									<thead>
									</thead>
									<tbody class="f_table_search" id="searchContent">
										<style>
										.f_table_search > tr:active > td {
											background-color: #E8CD02 !important;
										</style>
									</tbody>
								</table>-->
								<!-- end search table -->
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Tanggal Dkh
								</label>
								<div class="col-xs-2">
									<input type="text" name="tanggal_dkh" id="f_tanggal_dkh" class="form-control">
								</div>
								<div class="col-xs-0">
									*
								</div>								
							</div>	
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Jenis Dkh
								</label>
								<div class="col-xs-2">
									<!--<input type="text" name="jenis_baptis" id="f_jenis_baptis" class="form-control">-->
									@if($list_jenis_dkh == null)
									<p class="control-label pull-left">(tidak ada daftar jenis dkh)</p>
									@else
									{{ Form::select('jenis_dkh', $list_jenis_dkh, Input::old('jenis_dkh'), array('id'=>'f_jenis_dkh', 'class'=>'form-control')) }}
									@endif							
								</div>								
							</div>							
							<div class="form-group">
								<label class="col-xs-4 control-label">
									Keterangan
								</label>
								<div class="col-xs-6">
									{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_keterangan', 'class'=>'form-control'))}}
								</div>
								<div class="col-xs-0">
									*
								</div>
							</div>						
							<div class="form-group">							
								<div class="col-xs-6 col-xs-push-5">
									@if($list_jemaat == null)
									<input type="button" id="f_post_dkh" class="btn btn-success" value="Simpan Data Dkh" disabled=true />
									@else
									<input type="button" id="f_post_dkh" class="btn btn-success" value="Simpan Data Dkh" data-toggle="modal" data-target=".popup_confirm_warning_dkh" />
									@endif									
								</div>	
							</div>
						</form>	
					</div>	
					<div class="panel-footer" style="background-color: white;">
						(*) wajib diisi
					</div>
				</div>	
			</div>	
		</div>	
	</div>
</div>

<script>

	/*
		COBA LIVE SEARCH ANGGOTA
	*/
	/*
	$('body').on('keyup','#f_nama_jemaat', function(){
		$keyword = $('#f_nama_jemaat').val();
		$data = {
			'keyword' : $keyword
		};
		var json_data = JSON.stringify($data);
		$.ajax({
			type: 'GET',
			url: '{{--URL::route('user_search_anggota')--}}',
			data: {
				// 'keyword' : $keyword
				'json_data' : json_data
			},
			success: function(response){	
				result = JSON.parse(response);
				if(result.code == 200)
				{
					alert('found');
				}
				else if(result.code == 404)
				{
					alert('not found');
				}
				else
				{
					alert('internal error');
				}
				
				if(response['code'] == '404') //gagal
				{
					alert('not found');
					// $data = "<tr><td> No Result Found </td></tr>";
					// $('#searchContent').html($data);
				}
				else if(response['code'] == '200')
				{
					alert('found');
					alert(JSON.stringify(response['messages']));
				}
				else //berhasil, maka draw tabel
				{
					//berhasil...foreach setiap barang
					$data = "";
					alert('internal error');
					// alert(JSON.stringify(response['code']));
					// $.each(response['messages'], function(i, resp){
						// $data += "<tr id='row_"+resp.id+"' class='search_row' style='border-bottom:1px solid #000 !important;' data-dismiss='modal'>";
							// $data += "<td>";
								// $data += resp.nama_depan+' '+resp.nama_tengah+' '+resp.nama_belakang;
							// $data += "</td>";
						// $data += "</tr>";					
					// });
					// $('#searchContent').html($data);
				}
				
			},
			error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
	*/
	/*	
	$('body').on('click','.search_row',function(){
		
	});
	*/
	
	jQuery('#f_tanggal_dkh').datetimepicker({
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

	$('body').on('click', '#f_post_dkh', function(){
		//SHOW POP UP CONFIRM KEBAKTIAN			
		
		/*
		$no_dkh = $('#f_nomor_dkh').val();
		$id_jemaat = $('#f_nama_jemaat').val();
		$keterangan = $('#f_keterangan').val();
		
		$data = {
			'no_dkh' : $no_dkh,
			'id_jemaat' : $id_jemaat,
			'keterangan' : $keterangan
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: "POST",
			url: "{{URL('user/post_dkh')}}",
			data: {
				// 'data' : $data
				'json_data' : json_data
			},
			success: function(response){				
				result = JSON.parse(response);
				if(result.code==201)
				{
					alert(result.messages);
					window.location = '{{URL::route('view_inputdata_dkh')}}';
				}
				else
				{
					alert(result.messages);
				}
				// alert(result.code);
				// alert(result.status);
			
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
		*/
});
</script>

@include('pages.user_inputdata.popup_confirm_warning_dkh')

@stop