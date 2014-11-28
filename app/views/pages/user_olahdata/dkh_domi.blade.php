@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->

<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">DKH</li>
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
				<form class="form-horizontal">	
					<div class="form-group">
						<label class="col-xs-4 control-label">Nomor Dkh</label>
						<div class="col-xs-5">{{Form::text('nomor_dkh', Input::old('nomor_dkh'), array('id'=>'f_nomor_dkh', 'class'=>'form-control'))}}</div>			
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama Jemaat</label>
						<div class="col-xs-5">{{Form::text('nama_jemaat', Input::old('nama_jemaat'), array('id'=>'f_nama_jemaat', 'class'=>'form-control'))}}</div>
					</div>				
					<div class="form-group">
						<div class="col-xs-5 col-xs-push-4">
							<button id="f_search_dkh" class="btn btn-success">Cari Data Dkh</button>
						</div>
					</div>
				</form>
			</div>	

			<div id="f_result_dkh">
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
								Perintah
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								0
							</td>
							<td>
								Catie
							</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_dkh">
									Edit
								</button>
								<button type="button" class="btn btn-danger">
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
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_dkh">
									Edit
								</button>
								<button type="button" class="btn btn-danger">
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
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".popup_edit_dkh">
									Edit
								</button>
								<button type="button" class="btn btn-danger">
									delete
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	

	</div>	
</div>	

<script>
$('body').on('click', '#f_search_dkh', function(){
	$no_dkh = $('#f_nomor_dkh').val();
	$nama_jemaat = $('#f_nama_jemaat').val();		

	$data = {
		'no_dkh' : $no_dkh,
		'nama_jemaat' : $nama_jemaat			
	};

	$.ajax({
		type: "POST",
		url: "{{URL('user/search_dkh')}}",
		data: {
			'data' : $data
		},
		success: function(response){	
			alert("Berhasil cari data dkh");				

			if(response != "no result")
			{
				var result = "";					
				for($i = 0; $i < response.length; $i++)
				{
					result += response[$i]['no_dkh']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_dkh').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_dkh').html("<p>No result</p>");					
				}	
				/*				
				if(response == "berhasil")
				{	
					// alert("Berhasil simpan data kedukaan");
					// location.reload();
				}
				else
				{
					alert(response);
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
});
</script>

@include('pages.user_olahdata.popup_edit_dkh')
@stop