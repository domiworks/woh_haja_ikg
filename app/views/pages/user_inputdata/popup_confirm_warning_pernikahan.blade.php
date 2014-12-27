<div class="modal fade popup_delete_warning_pernikahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
		$data = {
			'id' : $id
		};
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			type: 'DELETE',
			url: "{{URL('user/delete_pernikahan')}}",
			data : {
				'json_data' : json_data
				// 'data' : $data
			},
			success: function(response){
				result = JSON.parse(response);				
				if(result.code==204)
				{
					alert(result.messages);
					// window.location = '{{URL::route('view_olahdata_pernikahan')}}';
					
					//remove row
					temp_detail[temp] = 'remove';
					
					//gambar ulang tabel
					var result = '';
					result += '<table class="table table-bordered">';
						result += '<thead>';
							result += '<tr>';
								result += '<th>';
									result += 'No. Pernikahan';
								result += '</th>';
								result += '<th>';
									result += 'Mempelai Pria';
								result += '</th>';
								result += '<th>';
									result += 'Mempelai Wanita';
								result += '</th>';
								result += '<th>';
									
								result += '</th>';
							result += '</tr>';
						result += '</thead>';
						result += '<tbody id="f_result_body_pernikahan">';
						//set value di table result
						for($i = 0; $i < temp_detail.length; $i++)
						{
							if(temp_detail[$i] != 'remove')
							{
								result+= '<tr class="tabel_row'+$i+'">';
									result+='<td class="tabel_no_pernikahan'+$i+'">';
										result+=temp_detail[$i]['no_pernikahan']								
									result+='</td>';
									result+='<td class="tabel_nama_pria'+$i+'">';
										result+=temp_detail[$i]['nama_pria'];								
									result+='</td>';
									result+='<td class="tabel_nama_wanita'+$i+'">';
										result+=temp_detail[$i]['nama_wanita'];								
									result+='</td>';
									result+='<td>';
										result+='<input type="hidden" value='+$i+' />';
										result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
										result+='<button type="button" class="btn btn-warning detailButton " data-toggle="modal" data-target=".popup_edit_pernikahan">';
											result+='Edit';
										result+='</button>';
										result+='<input type="hidden" value='+$i+' />';
										result+='<input type="hidden" value='+temp_detail[$i]['id']+' />';
										result+='<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-target=".popup_delete_warning_pernikahan">';
											result+='delete';
										result+='</button>';
									result+='</td>';
								result+='</tr>';	
							}
						}	
						result += '</tbody>';
					result += '</table>';
					// $('#f_result_body_pernikahan').html(result);
					$('#f_result_pernikahan').html(result);
				}
				else
				{
					alert(result.messages);
				}
				/*
				if(response == "berhasil")
				{	
					alert("Berhasil hapus data.");
					// location.reload();
					window.location = '{{URL::route('view_olahdata_pernikahan')}}';					
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
		},'json');
	});
</script>