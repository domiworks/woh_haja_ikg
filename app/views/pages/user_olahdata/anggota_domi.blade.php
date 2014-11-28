@extends('layouts.admin_layout')
@section('content')

<!-- css -->
<style>

</style>
<!-- end css -->
<ol class="breadcrumb">
	<li><a href="#">Olah Data</a></li>
	<li class="active">Anggota</li>
</ol>


<div class="s_table_search">

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
						<label class="col-xs-4 control-label">Nomor anggota</label> 
						<div class="col-xs-5">
							{{ Form::text('nomor_anggota', Input::old('nomor_anggota'), array('id' => 'f_nomor_anggota', 'class'=>'form-control')) }}
						</div>
					</div>	
					<div class="form-group">
						<label class="col-xs-4 control-label">Nama</label> 
						<div class="col-xs-5">
							{{ Form::text('nama', Input::old('nama'), array('id' => 'f_nama', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>							
					<div class="form-group">
						<label class="col-xs-4 control-label">Kota</label> 
						<div class="col-xs-5">
							{{ Form::text('kota', Input::old('kota'), array('id' => 'f_kota', 'class'=>'form-control')) }}  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>		
					<div class="form-group">		
						<label class="col-xs-4 control-label">Jenis kelamin</label> 				
						<div class="col-xs-5">
							{{ Form::radio('gender', '1', true, array('id'=>'f_jenis_kelamin')) }}pria    {{ Form::radio('gender', '0', '', array('id'=>'f_jenis_kelamin')) }}wanita
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>											
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">Wilayah</label> 
						<div class="col-xs-5">
							<select name="wilayah" id="f_wilayah" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Golongan darah</label> 
						<div class="col-xs-5">
							<select name="gol_darah" id="f_gol_darah" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Pendidikan </label> 
						<div class="col-xs-5">
							<select name="pendidikan" id="f_pendidikan" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Pekerjaan</label> 
						<div class="col-xs-5">
							<select name="pekerjaan" id="f_pekerjaan" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Etnis</label> 
						<div class="col-xs-5">
							<select name="etnis" id="f_etnis" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">Tanggal lahir antara </label> 
						<div class="col-xs-2">

							{{ Form::text('tanggal_awal', Input::old('tanggal_awal'), array('id' => 'f_tanggal_awal', 'class'=>'form-control')) }} 
						</div>
						<div class="col-xs-2">
							{{ Form::text('tanggal_akhir', Input::old('tanggal_akhir'), array('id' => 'f_tanggal_akhir', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
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
						<label class="col-xs-4 control-label">Status</label> 
						<div class="col-xs-5">
							<select name="status" id="f_status" class="form-control">
								<option>bla</option>
							</select>  
						</div>
						<div class="col-xs-1">
							<span class="red">*</span>
						</div>
					</div>
					<div class="form-group">

						<div class="col-xs-5 col-xs-push-4">
							<button id="f_search_anggota" class="btn btn-success">Cari Anggota</button>
						</div>
					</div>
				</form>		
			</div>
		</div>
	</div>

</div>	

<div id="f_result_anggota"></div>


<script>		
function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}

$('body').on('click', '#f_search_anggota', function(){										
	var data, xhr;
	data = new FormData();
	
	$nomor_anggota = $('#f_nomor_anggota').val();			
	data.append('no_anggota', $nomor_anggota);	
			// alert($nomor_anggota);
			$nama = $('#f_nama').val();	
			data.append('nama', $nama);				
			// alert($nama);
			$kota = $('#f_kota').val();
			data.append('kota', $kota);		
			// alert($kota);
			$gender = $('input[name="gender"]:checked').val()	
			data.append('gender', $gender);			
			// alert($gender);
			$wilayah = $('#f_wilayah').val();	
			data.append('wilayah', $wilayah);			
			// alert($wilayah);
			$gol_darah = $('#f_gol_darah').val();		
			data.append('gol_darah', $gol_darah);
			// alert($gol_darah);
			$pendidikan = $('#f_pendidikan').val();	
			data.append('pendidikan', $pendidikan);
			// alert($pendidikan);
			$pekerjaan = $('#f_pekerjaan').val();	
			data.append('pekerjaan', $pekerjaan);
			// alert($pekerjaan);
			$etnis = $('#f_etnis').val();	
			data.append('etnis', $etnis);		
			// alert($etnis);
		// $tanggal_lahir = $('#f_tanggal_lahir').val();	
			// data.append('tanggal_lahir', $tanggal_lahir);
			$tanggal_awal = $('#f_tanggal_awal').val();
			data.append('tanggal_awal', $tanggal_awal);
			$tanggal_akhir = $('#f_tanggal_akhir').val();
			data.append('tanggal_akhir', $tanggal_akhir);
			// alert($tanggal_lahir);
		// $anggota_gereja = $('#f_id_gereja').val();			
			// data.append('id_gereja', $anggota_gereja);		
			// alert($anggota_gereja);
			$role = $('#f_status').val();
			data.append('role', $role);	
			// alert($role);
			
			
			$.ajax({
				type: 'POST',
				url: "{{URL('user/search_anggota')}}",
				data : data,
				processData: false,
				contentType: false,	
				success: function(response){		
					alert("Berhasil cari data anggota");
					
					if(response != "no result")
					{
						var result = "";					
						for($i = 0; $i < response.length; $i++)
						{
							result += response[$i]['nama_depan']+ " ";
						// alert(response[$i]['tanggal_mulai']);
					}
					
					$('#f_result_anggota').html("<p>"+result+"</p>");
				}					
				else				
				{
					$('#f_result_anggota').html("<p>No result</p>");
				}
				
				// alert(response.length);
				/*
				var temp;				
				if(response.length > 0)
				{
					alert(response.length);
					for($i = 0 ; $i < response.length ; $i++)
					{
						// temp += response[$i]['nama_depan']+",";
						alert(response[$i]['nama_depan']);
					}
					// alert(temp);
				}
				else
				{
					alert(response);
				}
				*/
				// if(response == true)
				// {	
					// alert("Berhasil simpan data anggota");
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

@stop