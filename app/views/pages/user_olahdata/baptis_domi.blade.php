@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">Baptis</li>
</ol>

<div class="s_content">
	<div class="container-fluid">
		<div class="col-md-3 panel panel-default ">
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
		<div class="panel panel-default col-md-9">

			<div class="panel-body">
				<div class="s_table_search">
					<form class="form-horizontal">	
						<div class="form-group">
							<label class="col-xs-4 control-label">Nomor Baptis</label> 
							<div class="col-xs-5">{{Form::text('nomor_baptis', Input::old('nomor_baptis'), array('id'=>'f_nomor_baptis', 'class'=>'form-control'))}} </div>			
						</div>		
						<div class="form-group">
							<label class="col-xs-4 control-label">Nama Pembaptis</label> 
							<div class="col-xs-5">{{Form::text('pembaptis', Input::old('pembaptis'), array('id'=>'f_pembaptis', 'class'=>'form-control'))}}</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Nama Jemaat</label> 
							<div class="col-xs-5">{{Form::text('jemaat', Input::old('jemaat'), array('id'=>'f_jemaat', 'class'=>'form-control'))}}</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Jenis Baptis</label> 
							<div class="col-xs-5">
								<!--<select name="jenis_baptis" id="f_jenis_baptis" class="form-control">
									<option>bla</option>
								</select>
								-->
								{{ Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_jenis_baptis', 'class'=>'form-control')) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label">Antara tanggal </label> 
							<div class="col-xs-2">
								{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }}
							</div>
							<div class="col-xs-2">
								{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
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
							</script>
						</div>
						<div class="form-group">
							<div class="col-xs-5 col-xs-push-4">
								<input type="button" id="f_search_baptis" class="btn btn-success" value="Cari Data Baptis"></input>
							</div>
						</div>
					</form>	
				</div>
			</div>

			<div id="f_result_baptis">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								No. Anggota
							</th>
							<th>
								Nama Depan Anggota
							</th>
							<th>
								
							</th>
						</tr>
					</thead>
					<tbody id="f_result_body_baptis">
						<!--
						<tr>
							<td>
								0
							</td>
							<td>
								Catie
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_baptis">
									Edit
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
									delete
								</button>
							</td>
						</tr>
						<tr>
							<td>
								1
							</td>
							<td>
								Wayne
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_baptis">
									Edit
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
									delete
								</button>
							</td>
						</tr>
						<tr>
							<td>
								2
							</td>
							<td>
								Boxxy
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_baptis">
									Edit
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">
									delete
								</button>
							</td>
						</tr>
						-->
					</tbody>
				</table>
			</div>

		</div>	
	</div>	
</div>	

<script>
$('body').on('click', '#f_search_baptis', function(){
	$nomor_baptis = $('#f_nomor_baptis').val();
	$nama_pembaptis = $('#f_pembaptis').val();
	$nama_jemaat = $('#f_jemaat').val();
	$jenis_baptis = $('#f_jenis_baptis').val();
		// $gereja = $('#f_id_gereja').val();
		$tanggal_awal = $('#f_tanggal_awal').val();
		$tanggal_akhir = $('#f_tanggal_akhir').val();
		
		$data = {
			'no_baptis' : $nomor_baptis,
			'nama_jemaat' : $nama_jemaat,
			'nama_pembaptis' : $nama_pembaptis,
			'tanggal_awal' : $tanggal_awal,
			'tanggal_akhir' : $tanggal_akhir,
			'id_jenis_baptis' : $jenis_baptis
			// 'id_gereja' : $gereja
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/search_baptis')}}",
			data : {
				'data' : $data
			},
			success: function(response){
				// alert(response);
				
				alert("Berhasil cari data baptis");				
				
				if(response != "no result")
				{
					alert('data baptis didapatkan');
					var result = '';					
					
					//set value di table result
					for($i = 0; $i < response.length; $i++)
					{
						result+= '<tr>';
							result+='<td>';
								result+='nobaptis :'+response[$i]['no_baptis'];								
							result+='</td>';
							result+='<td>';
								result+='id jemaat'+response[$i]['id_jemaat'];								
							result+='</td>';
							result+='<td>';
								result+='<input type="hidden" value="'+response[$i]['id']+'" />';
								result+='<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_baptis">';
									result+='Edit';
								result+='</button>';
								result+='<input type="hidden" value="'+response[$i]['id']+'" />';
								result+='<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".popup_delete_warning">';
									result+='delete';
								result+='</button>';
							result+='</td>';
						result+='</tr>';
					}
					
					$('#f_result_body_baptis').html(result);
				}					
				else				
				{
					$('#f_result_body_baptis').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
				}
				
				// alert(JSON.stringify(response));
				/*
				var temp;				
				if(response.length > 0)
				{
					alert(response.length);
					for($i = 0 ; $i < response.length ; $i++)
					{
						// temp += response[$i]['no_baptis']+",";
						alert(response[$i]['no_baptis']);
					}
					// alert(temp);
				}
				else
				{
					alert(response);
				}
				*/
				// if(response == "berhasil")
				// {	
					// alert("Berhasil simpan data baptis");
					// location.reload();
				// }
				// else
				// {
					// alert(response);
				// }
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
});
</script>	

@include('pages.user_olahdata.popup_edit_baptis')
@stop