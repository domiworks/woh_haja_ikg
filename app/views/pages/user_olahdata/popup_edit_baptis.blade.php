<div class="modal fade popup_edit_baptis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Baptis</h4>
			</div>
			<div class="modal-body form-horizontal">
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Baptis
						</label>

						<div class="col-xs-6">
							<input type="text" name="nomor_baptis" id="f_edit_nomor_baptis" class="form-control">
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
								{{ Form::select('pembaptis', $list_pembaptis, Input::old('pembaptis'), array('id'=>'f_edit_pembaptis', 'class'=>'form-control')) }}
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
							<!--<input type="text" name="jemaat" id="f_edit_jemaat" class="form-control">-->
							@if($list_jemaat == null)
								<p class="control-label pull-left">(tidak ada daftar jemaat)</p>
							@else
								{{ Form::select('jemaat', $list_jemaat, Input::old('jemaat'), array('id'=>'f_edit_jemaat', 'class'=>'form-control')) }}							
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
							<!--<input type="text" name="jenis_baptis" id="f_edit_jenis_baptis" class="form-control">-->
							@if($list_jenis_baptis == null)
								<p class="control-label pull-left">(tidak ada daftar jenis baptis)</p>
							@else
								{{ Form::select('jenis_baptis', $list_jenis_baptis, Input::old('jenis_baptis'), array('id'=>'f_edit_jenis_baptis', 'class'=>'form-control')) }}
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
							<input type="text" name="tanggal_baptis" id="f_edit_tanggal_baptis" class="form-control">
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
				@if($list_jemaat == null || $list_pembaptis == null || 	$list_jenis_baptis == null)
					<input type="button" id="f_edit_post_baptis" class="btn btn-success" value="Simpan Perubahan" disabled=true />
				@else
					<input type="button" id="f_edit_post_baptis" class="btn btn-success" value="Simpan Perubahan" data-dismiss="modal" />
				@endif							
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	jQuery('#f_edit_tanggal_baptis').datetimepicker({
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
						
	$('body').on('click', '#f_edit_post_baptis', function(){
	
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$nomor_baptis = $('#f_edit_nomor_baptis').val();
		$pembaptis = $('#f_edit_pembaptis').val();
		$jemaat = $('#f_edit_jemaat').val();
		$jenis_baptis = $('#f_edit_jenis_baptis').val();		
		$tanggal_baptis = $('#f_edit_tanggal_baptis').val();
		// $gereja = $('#f_edit_id_gereja').val();
		$keterangan = $('#f_edit_keterangan').val();	
		$data = {
			'id' : $id,
			'no_baptis' : $nomor_baptis,
			'id_jemaat' : $jemaat,
			'id_pendeta' : $pembaptis,
			'tanggal_baptis' : $tanggal_baptis,
			'id_jenis_baptis' : $jenis_baptis,
			'keterangan' : $keterangan
			// 'id_gereja' : $gereja
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/edit_baptis')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){
				result = JSON.parse(response);
				if(result.code==200)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_olahdata_baptis')}}';					
					//ganti isi row sesuai hasil edit_baptis
					$('.tabel_no_baptis'+temp).html(result.data['no_baptis']);
					$('.tabel_nama_jemaat'+temp).html(result.data['nama_jemaat']);
					//ganti isi detail sesuai hasil edit
					temp_detail[temp] = result.data;
					
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				else
				{
					alert(result.messages);
					//END LOADER				
					$('.f_loader_container').addClass('hidden');
				}
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil simpan perubahan.");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_baptis')}}';					
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