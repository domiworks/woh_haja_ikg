<script>
	$('body').on('click', '#f_edit_check_gereja_lama', function(){		
		if($('#f_edit_check_gereja_lama').val() == 0){	
			$('#f_edit_check_gereja_lama').val(1); //pakai pembicara luar jika value f_edit_check_gereja_lama == 1
			$('#f_edit_nama_gereja_lama').attr('disabled', false);			
			$('#f_edit_nama_gereja_lama').val("");
			$('#f_edit_list_gereja_lama').attr('disabled', true);								
			$('#f_edit_nama_gereja_lama').css('background-color','#FFFFFF');	
		}
		else
		{
			$('#f_edit_check_gereja_lama').val(0); //tidak pakai pembicara luar jika value f_edit_check_gereja_lama == 0
			$('#f_edit_nama_gereja_lama').attr('disabled', true);	
			// $('#f_edit_nama_pengkotbah').val("");
			selected = $('#f_edit_list_gereja_lama').find(":selected").text();
			$('#f_edit_nama_gereja_lama').val(selected);	
			$('#f_edit_list_gereja_lama').attr('disabled', false);				
			$('#f_edit_nama_gereja_lama').css('background-color','#eee');	
		}
	});

	$('body').on('click', '#f_edit_check_gereja_baru', function(){		
		if($('#f_edit_check_gereja_baru').val() == 0){	
			$('#f_edit_check_gereja_baru').val(1); //pakai pembicara luar jika value f_edit_check_gereja_baru == 1
			$('#f_edit_nama_gereja_baru').attr('disabled', false);			
			$('#f_edit_nama_gereja_baru').val("");
			$('#f_edit_list_gereja_baru').attr('disabled', true);	
			$('#f_edit_nama_gereja_baru').css('background-color','#FFFFFF');							
		}
		else
		{
			$('#f_edit_check_gereja_baru').val(0); //tidak pakai pembicara luar jika value f_edit_check_gereja_baru == 0
			$('#f_edit_nama_gereja_baru').attr('disabled', true);	
			selected = $('#f_edit_list_gereja_baru').find(":selected").text();
			$('#f_edit_nama_gereja_baru').val(selected);
			$('#f_edit_list_gereja_baru').attr('disabled', false);			
			$('#f_edit_nama_gereja_baru').css('background-color','#eee');	
		}
	});
	
</script>

<div class="modal fade popup_edit_atestasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Atestasi</h4>
			</div>
			<div class="modal-body form-horizontal">
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Piagam Atestasi
						</label>						
						<div class="col-xs-6">
							{{ Form::text('nomor_atestasi', Input::old('nomor_atestasi'), array('id' => 'f_edit_nomor_atestasi', 'class'=>'form-control')) }}
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
							<!--<select id='f_edit_jemaat' class='form-control'>
							</select>-->
							@if($list_jemaat == null)
								<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
							@else
								{{Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_edit_jemaat', 'class'=>'form-control'))}}							
							@endif
						</div>						
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Atestasi
						</label>						
						<div class="col-xs-6">
							{{ Form::text('tanggal_atestasi', Input::old('tanggal_atestasi'), array('id' => 'f_edit_tanggal_atestasi', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Jenis Atestasi
						</label>						
						<div class="col-xs-6">
							@if($list_jenis_atestasi == null)
								<p class="control-label pull-left">(tidak ada daftar jenis atestasi)</p>
							@else
								{{Form::select('jenis_atestasi', $list_jenis_atestasi, Input::old('pembaptis'), array('id'=>'f_edit_jenis_atestasi', 'class'=>'form-control'))}}
							@endif							
						</div>						
					</div>		
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja Lama
						</label>						
						<div class="col-xs-6">
							@if($list_gereja == null)
								<p class="control-label pull-left">(tidak ada daftar gereja)</p>
							@else
								{{Form::select('list_gereja_lama', $list_gereja, Input::old('list_gereja_lama'), array('id'=>'f_edit_list_gereja_lama', 'class'=>'form-control', 'disabled' => false))}}
							@endif														
						</div>
						
						<div class="col-xs-0">
							<input id="f_edit_check_gereja_lama" type="checkbox" name="gereja_lama" value="0" /> Gereja Lain
						</div>							
						
						<script>
						$('body').on('change','#f_edit_list_gereja_lama', function(){
							var selected = $('#f_edit_list_gereja_lama').find(":selected").text();
							$('#f_edit_nama_gereja_lama').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Gereja Lama
						</label>		
						<div class="col-xs-6">
							{{ Form::text('nama_gereja_lama', Input::old('nama_gereja_lama'), array('id' => 'f_edit_nama_gereja_lama', 'class'=>'form-control', 'disabled' => true)) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Gereja Baru
						</label>
						
						<div class="col-xs-6">
							@if($list_gereja == null)
								<p class="control-label pull-left">(tidak ada daftar gereja)</p>
							@else
								{{Form::select('list_gereja_baru', $list_gereja, Input::old('list_gereja_baru'), array('id'=>'f_edit_list_gereja_baru', 'class'=>'form-control', 'disabled' => false))}}
							@endif
						</div>
						
						<div class="col-xs-0">
							<input id="f_edit_check_gereja_baru" type="checkbox" name="gereja_baru" value="0" /> Gereja Lain
						</div>
						<script>
						$('body').on('change','#f_edit_list_gereja_baru', function(){
							var selected = $('#f_edit_list_gereja_baru').find(":selected").text();
							$('#f_edit_nama_gereja_baru').val(selected);					
						});
						</script>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nama Gereja Baru
						</label>						
						<div class="col-xs-6">
							{{ Form::text('nama_gereja_baru', Input::old('nama_gereja_baru'), array('id' => 'f_edit_nama_gereja_baru', 'class'=>'form-control', 'disabled' => true)) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Keterangan
						</label>						
						<div class="col-xs-6">
							{{Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
					</div>	
				</form>	

			</div>
			<div class="modal-footer">
				@if($list_gereja == null || $list_jenis_atestasi == null)
					<input type="button" id="f_edit_post_atestasi" class="btn btn-success" disabled=true value="Simpan Data Atestasi" />
				@else
					<input type="button" id="f_edit_post_atestasi" class="btn btn-success" value="Simpan Data Atestasi" />
				@endif	
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
jQuery('#f_edit_tanggal_atestasi').datetimepicker({
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
	format:'Y-m-d',
	yearStart: '1900'
});	

$('body').on('click', '#f_edit_post_atestasi', function(){		

	//START LOADER				
	$('.f_loader_container').removeClass('hidden');
		
	$no_atestasi = $('#f_edit_nomor_atestasi').val();
	$id_jemaat = $('#f_edit_jemaat').val();
	$tanggal_atestasi = $('#f_edit_tanggal_atestasi').val();		
	$id_jenis_atestasi = $('#f_edit_jenis_atestasi').val();
		if($('#f_edit_check_gereja_lama').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_lama = '';
			$nama_gereja_lama = $('#f_edit_nama_gereja_lama').val();
		}
		else
		{
			$id_gereja_lama = $('#f_edit_list_gereja_lama').val();
			$nama_gereja_lama = $('#f_edit_nama_gereja_lama').val();
		}
		if($('#f_edit_check_gereja_baru').val() == 1) //pakai nama gereja lain
		{
			$id_gereja_baru = '';		
			$nama_gereja_baru = $('#f_edit_nama_gereja_baru').val();
		}
		else
		{
			$id_gereja_baru = $('#f_edit_list_gereja_baru').val();		
			$nama_gereja_baru = $('#f_edit_nama_gereja_baru').val();
		}
		$keterangan = $('#f_edit_keterangan').val();
		
		$data = {
			'id' : $id,
			'no_atestasi' : $no_atestasi,
			'id_anggota' : $id_jemaat,
			'tanggal_atestasi' : $tanggal_atestasi,
			'id_jenis_atestasi' : $id_jenis_atestasi,
			'id_gereja_lama' : $id_gereja_lama,
			'nama_gereja_lama' : $nama_gereja_lama,
			'id_gereja_baru' : $id_gereja_baru,
			'nama_gereja_baru' : $nama_gereja_baru,
			'keterangan' : $keterangan
		};		
		
		var json_data = JSON.stringify($data);

		$.ajax({
			type: 'POST',
			url: "{{URL('admin/edit_atestasi')}}",
			data: {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_olahdata_atestasi')}}';
					
					//ganti isi row sesuai hasil edit_atestasi
					$('.tabel_no_atestasi'+temp).html(result.data['no_atestasi']);
					$('.tabel_nama_jemaat'+temp).html(result.data['nama_anggota']);
					$('.tabel_nama_gereja_lama'+temp).html(result.data['nama_gereja_lama']);
					$('.tabel_nama_gereja_baru'+temp).html(result.data['nama_gereja_baru']);
					//ganti isi detail sesuai hasil edit
					temp_detail[temp] = result.data;					
					
					//close popup
					$('#popup_edit_atestasi').modal('toggle');

					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);

					//show red background validation
					if($no_atestasi == ""){$('#f_edit_nomor_atestasi').css('background-color','#FBE3E4');}else{$('#f_edit_nomor_atestasi').css('background-color','#FFFFFF');}
					if($tanggal_atestasi == ""){$('#f_edit_tanggal_atestasi').css('background-color','#FBE3E4');}else{$('#f_edit_tanggal_atestasi').css('background-color','#FFFFFF');}	
					if($nama_gereja_lama == ""){$('#f_edit_nama_gereja_lama').css('background-color','#FBE3E4');}else{$('#f_edit_nama_gereja_lama').css('background-color','#FFFFFF');}
					if($nama_gereja_baru == ""){$('#f_edit_nama_gereja_baru').css('background-color','#FBE3E4');}else{$('#f_edit_nama_gereja_baru').css('background-color','#FFFFFF');}					
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				/*
				result = JSON.parse(response);				
				if(result.code==200)
				{
					// alert("Berhasil simpan data kebaktian");					
					// location.reload();
					alert(result.messages);
					window.location = '{{URL::route('view_inputdata_atestasi')}}';
				}
				else
				{
					alert(result.messages);
				}
				*/
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data atestasi");
					// location.reload();
					window.location = '{{URL::route('view_inputdata_atestasi')}}';
				}
				else
				{
					alert(response);
				}
				*/
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
				//END LOADER				
				$('.f_loader_container').addClass('hidden');
			}
		},'json');					
});
</script>	