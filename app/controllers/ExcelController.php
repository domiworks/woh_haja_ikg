<?php

class ExcelController extends BaseController {

	public function import(){
		
		$temp = Excel::selectSheets('Test')->load('public/assets/file_excel/LKKJBULANANGKICianjur10-11.xls','UTF-8');
		$temp->each(function($row) {
			echo $row;
		});
		
		// Loop through all rows

		
		//return $temp;
		//return $temp[0];
		//return $temp[0]['kolom_1'];
	}
	
	public function export(){
		
		try{
			$header = array('MINGGU TANGGAL','JUMLAH ANGGOTA JEMAAT GEREJA TERDAFTAR','','','JENIS KEBAKTIAN','JUMLAH KEHADIRAN DALAM KEBAKTIAN UMUM','','','','','','','','','','','','','','','TOTAL ANGGOTA DAN SIMPATISAN');
			
			$header2 = array('','','','','','Anggota Jemaat','','','Simpatisan **','','','Penatua','','','Pemusik Gerejawi','','','Sub-Total Anggota','','',''); 
			
			$header3 = array('','Pria','Wanita','Jumlah','','Pria','Wanita','Jumlah','Pria','Wanita','Jumlah','Pria','Wanita','Jumlah','Pria','Wanita','Jumlah','Pria','Wanita','Jumlah',''); 
			
			$datarow1 = array('4-Apr-10',137,184,321,'KU - 1',61,106,167,0,0,0,4,5,9,1,0,1,66,111,177,177);
			$datarow2 = array('','','','','KU - 2',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			$datarow3 = array('','','','','KU - 3',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			$datarow4 = array('','','','','Pos.Jem',18,21,39,0,0,0,1,2,3,2,0,2,21,23,44,44);
			$datarow5 = array('','','','','Jumlah',79,127,206,0,0,0,5,7,12,3,0,3,87,134,221,221);
			
			$data = array(
						$header,
						$header2,
						$header3,
						$datarow1,
						$datarow2,
						$datarow3,
						$datarow4,
						$datarow5
			);
			
			
			
			//simpen di server
			Excel::create('LKKJ', function($excel) use($data) {

				$excel->sheet('Keb.Umum', function($sheet) use($data){
					
					$sheet->fromArray($data, null, 'A1', true, false);
					$sheet->mergeCells('A1:A3');
					$sheet->mergeCells('B1:D2');
					$sheet->mergeCells('E1:E2');
					$sheet->mergeCells('F1:T1');
					$sheet->mergeCells('F2:H2');
					$sheet->mergeCells('I2:K2');
					$sheet->mergeCells('L2:N2');
					$sheet->mergeCells('O2:Q2');
					$sheet->mergeCells('R2:T2');
					$sheet->mergeCells('U1:U3');
					$sheet->cells('A1:U8',function($cells) {
						$cells->setAlignment('center');
						$cells->setValignment('middle');
					});
					
					$sheet->setBorder('A1:U8', 'thin');
					$sheet->setWidth(array(
						'A'		=>  20,
						'B'     =>  20,
						'C'     =>  20,
						'D'		=>  20,
						'E'		=>	20,
						'U'		=> 40
					));
					$sheet->setAutoSize(false);
					

				});
			})->store('xlsx','assets/file_excel');
			
			//buat diunduh
			/*Excel::create('test', function($excel) use($data) {

				$excel->sheet('Test Sheet 1', function($sheet) use($data){
					
					//fromArray(datanya,null value,mulai dari mana,0 != null,pakai default header atau ga)
					$sheet->fromArray($data, null, 'A1', false, false);

				});

			})->export('xls');*/
			
			return "Success";
		}
		catch(Exception $e){
			return $e;
		}
	}

}
