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
							<input type="button" id="f_search_dkh" class="btn btn-success" value="Cari Data Dkh"></input>
						</div>
					</div>
				</form>
			</div>	

			<div id="temp_result">
			</div>
			
			<div id="f_result_dkh">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								No. Dkh
							</th>
							<th>
								Nama Jemaat
							</th>
							<th>
								
							</th>
						</tr>
					</thead>
					<tbody id="f_result_body_dkh">
						<!--
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
//simpen detail 
var temp_detail = "";
	
$('body').on('click', '#f_search_dkh', function(){
	$no_dkh = $('#f_nomor_dkh').val();
	$nama_jemaat = $('#f_nama_jemaat').val();		

	$data = {
		'no_dkh' : $no_dkh,
		'nama_jemaat' : $nama_jemaat			
	};

	var json_data = JSON.stringify($data);
	
	$.ajax({
		type: 'POST',
		url: "{{URL('user/search_dkh')}}",
		data: {
			'json_data' : json_data
			// 'data' : $data
		},
		success: function(response){
			result = JSON.parse(response);
			if(result.code==200)
			{
				alert('Data ditemukan.');
				temp_detail = result.messages;
				$('#temp_result').html(JSON.stringify(temp_detail));
				var result = "";				
				for($i = 0; $i < temp_detail.length; $i++)
				{
					//set value di table
					result+= '<tr>';
						result+='<td>';
							result+=temp_detail[$i]['no_dkh'];								
						result+='</td>';
						result+='<td>';
							result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
						result+='</td>';
						result+='<td>';
							result+='<input type="hidden" value='+$i+' />';
							result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
							result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_dkh">';
								result+='Edit';
							result+='</button>';
							result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
							result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_dkh">';
								result+='delete';
							result+='</button>';
						result+='</td>';
					result+='</tr>';
					// result += response[$i]['no_dkh']+ " ";
						// alert(response[$i]['tanggal_mulai']);
				}
					
				$('#f_result_body_dkh').html(result);
			}
			else
			{
				alert(result.messages);
				$('#f_result_body_dkh').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");			
			}
			/*
			alert("Berhasil cari data dkh");				

			if(response != "no result")
			{				
				var result = "";				
				for($i = 0; $i < response.length; $i++)
				{
					//set value di table
					result+= '<tr>';
						result+='<td>';
							result+=response[$i]['no_dkh'];								
						result+='</td>';
						result+='<td>';
							result+=response[$i]['nama_depan_jemaat']+' '+response[$i]['nama_tengah_jemaat']+' '+response[$i]['nama_belakang_jemaat'];								
						result+='</td>';
						result+='<td>';
							result+='<input type="hidden" value='+response[$i]['id']+' />';
							result+='<button type="button" class="btn btn-warning detailButton" data-toggle="modal" data-target=".popup_edit_dkh">';
								result+='Edit';
							result+='</button>';
							result+='<input type="hidden" value='+response[$i]['id']+' />';
							result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_dkh">';
								result+='delete';
							result+='</button>';
						result+='</td>';
					result+='</tr>';
					// result += response[$i]['no_dkh']+ " ";
						// alert(response[$i]['tanggal_mulai']);
				}
					
				$('#f_result_body_dkh').html(result);
			}					
			else				
			{
				$('#f_result_body_dkh').html("<tr><td>Hasil pencarian tidak didapatkan</td></tr>");					
			}
			*/			
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('error');
			alert(errorThrown);
		}
			
	},'json');	
});

//click edit button
$('body').on('click', '.detailButton', function(){
	$id = $(this).prev().val();
	$index = $(this).prev().prev().val();
	
	$('#f_edit_nomor_dkh').val(temp_detail[$index]['no_dkh']);
	$('#f_edit_nama_jemaat').val(temp_detail[$index]['id_jemaat']);
	$('#f_edit_keterangan').val(temp_detail[$index]['keterangan']);
	/*
	$data = {
		'id' : $id
	};
	
	$.ajax({
		type: 'GET',
		url: "{{URL('user/detail_dkh')}}",
		data : {
			'data' : $data
		},
		success: function(response){				
			//set value tabel pop up
			$('#f_edit_nomor_dkh').val(response['no_dkh']);
			$('#f_edit_nama_jemaat').val(response['id_jemaat']);
			$('#f_edit_keterangan').val(response['keterangan']);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert("error");
			alert(errorThrown);
		}
	});
	*/
});

//click delete button
$('body').on('click', '.deleteButton', function(){
	$id = $(this).prev().val();
});
</script>

</div>
</div>
@include('pages.user_olahdata.popup_edit_dkh')
@include('pages.user_olahdata.popup_delete_warning_dkh')

@stop