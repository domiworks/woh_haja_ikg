<div class="modal fade popup_delete_warning_kedukaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Alert!</h4>
			</div>
			<div class="modal-body"  style="text-align: center;">
				Apakah Anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer" style="text-align: center;">
				<button type="button" class="btn btn-danger okDelete" data-dismiss="modal">Yes</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('body').on('click', '.okDelete', function(){
		
		//START LOADER				
		$('.f_loader_container').removeClass('hidden');
		
		$data = {
			'id' : $id
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'DELETE',
			url: "{{URL('admin/delete_kedukaan')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){
				result = JSON.parse(response);				
				if(result.code==204)
				{
					alert(result.messages);					
										
					//remove row
					temp_detail[temp] = 'remove';					
										
					//gambar ulang tabel
					var result = '';	
					result += '<table style="margin-bottom: 0px;" class="table table-bordered">';
						result += '<thead>';
							result += '<tr>';
								result += '<th>';
									result += 'No. Kedukaan';
								result += '</th>';
								result += '<th>';
									result += 'Nama Anggota';
								result += '</th>';
								result += '<th>';
									result += 'Tanggal Meninggal';
								result += '</th>';
								result += '<th>';
									result += 'Visible';
								result += '</th>';
								result += '<th>';
									
								result += '</th>';
							result += '</tr>';
						result += '</thead>';
						result += '<tbody id="f_result_body_kedukaan">';
						//set value di tabel result
						for($i = 0; $i < temp_detail.length; $i++)
						{
							if(temp_detail[$i] != 'remove')
							{
								result+= '<tr class="tabel_row'+$i+'">';
									result+='<td class="tabel_no_kedukaan'+$i+'">';
										result+=temp_detail[$i]['no_kedukaan'];								
									result+='</td>';
									result+='<td class="tabel_nama_anggota'+$i+'">';
										result+=temp_detail[$i]['nama_depan']+' '+temp_detail[$i]['nama_tengah']+' '+temp_detail[$i]['nama_belakang'];								
									result+='</td>';	
									result+='<td class="tabel_tanggal_meninggal'+$i+'">';
										result+=temp_detail[$i]['tanggal_meninggal'];
									result+='</td>';
									result+='<td class="tabel_visible'+$i+'">';
										if(temp_detail[$i]['deleted'] == 0)
										{
											result+='<span style="color:green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
										}
										else
										{
											result+='<span style="color:red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
										}
									result+='</td>';
									result+='<td>';
										result+='<div class="pull-right">';
											result+='<input type="hidden" value='+$i+' />';
											result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
											result+='<button type="button" class="btn btn-warning visibleButton">Ganti Visible</button>';
											result+='<input type="hidden" value='+$i+' />';
											result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
											result+='<button style="margin-left:10px;" type="button" class="btn btn-info detailButton" data-toggle="modal" data-target=".popup_edit_kedukaan">';
												result+='Detail/Edit';
											result+='</button>';
											result+='<input type="hidden" value='+$i+' />';
											result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
											result+='<button style="margin-left:10px;" type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_kedukaan">';
												result+='Delete';
											result+='</button>';
										result+='</div>';	
									result+='</td>';
								result+='</tr>';	
							}
						}
						result += '</tbody>';
					result += '</table>';
										
					$('#f_result_kedukaan').html(result);								
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
					alert("Berhasil hapus data.");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_kedukaan')}}';					
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