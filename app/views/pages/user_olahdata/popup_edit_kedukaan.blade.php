<div class="modal fade popup_edit_kedukaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Kedukaan</h4>
			</div>
			<div class="modal-body form-horizontal">
				
				<form class="form-horizontal">

					<div class="form-group">
						<label class="col-xs-4 control-label">
							Nomor Kedukaan
						</label>
						<div class="col-xs-6">
							{{ Form::text('nomor_kedukaan', Input::old('nomor_kedukaan'), array('id' => 'f_edit_nomor_kedukaan', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 control-label">
							Tanggal Meninggal
						</label>
						<div class="col-xs-6">
							{{ Form::text('tanggal_meninggal', Input::old('tanggal_meninggal'), array('id' => 'f_edit_tanggal_meninggal', 'class'=>'form-control')) }}
						</div>
						<div class="col-xs-0">
							*
						</div>
						<script>
						jQuery('#f_edit_tanggal_meninggal').datetimepicker({
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
						<label class="col-xs-4 control-label">
							Keterangan
						</label>
						<div class="col-xs-6">
							{{ Form::textarea('keterangan', Input::old('keterangan'), array('id'=>'f_edit_keterangan', 'class'=>'form-control'))}}
						</div>
						<div class="col-xs-0">
							*
						</div>
					</div>										
				</form>									
			</div>
			<div class="modal-footer">
				<input type="button" id="f_edit_post_kedukaan" class="btn btn-success" value="Simpan Data Kedukaan" data-dismiss="modal" />
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '#f_edit_post_kedukaan', function(){		
		$no_kedukaan = $('#f_edit_nomor_kedukaan').val();
		$tanggal_meninggal = $('#f_edit_tanggal_meninggal').val();
		$keterangan = $('#f_edit_keterangan').val();
		
		$data = {
			'id' : $id,
			'no_kedukaan' : $no_kedukaan,						
			'keterangan' : $keterangan,
			'tanggal_meninggal' : $tanggal_meninggal
		};
		
		$.ajax({
			type: 'POST',
			url: "{{URL('user/edit_kedukaan')}}",
			data: {
				'data' : $data
			},
			success: function(response){					
				if(response == "berhasil")
				{	
					alert("Berhasil simpan data kedukaan");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_kedukaan')}}';
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