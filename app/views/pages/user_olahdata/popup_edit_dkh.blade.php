<div class="modal fade popup_edit_dkh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit DKH</h4>
			</div>
			<div class="modal-body form-horizontal">

					
				<form>	
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
							<button id="f_search_dkh" class="btn btn-success">Save Changes</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>