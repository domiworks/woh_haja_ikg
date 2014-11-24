@extends('layouts.default')
@section('content')

<!-- css -->
<style>
	
</style>
<!-- end css -->

<div class="s_sidebar">
	<!-- input data-->
	<ul>		
		<li>{{HTML::linkRoute('view_inputdata_kebaktian', 'Input Data Kebaktian')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_anggota', 'Input Data Anggota')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_baptis', 'Input Data Baptis')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_atestasi', 'Input Data Atestasi')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_pernikahan', 'Input Data Pernikahan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_kedukaan', 'Input Data Kedukaan')}}</li>
		<li>{{HTML::linkRoute('view_inputdata_dkh', 'Input Data Dkh')}}</li>
	</ul>
	
	<!-- olahdata -->
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

<div class="s_content">
	<table border="0" style="width:450px;">					
		<tr>						
			<td class="">Nomor Jemaat</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->no_anggota}}</span>
			<span class="f_back"><input type="text" id="f_up_no_jemaat" value="{{array_get($data, 'data')->no_anggota}}" /></span></td>
		</tr>
		<tr>						
			<td class="">Nama Depan</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->nama_depan}}</span>
			<span class="f_back"><input type='text' id="f_up_nama_depan" value="{{array_get($data, 'data')->nama_depan}}" /></span></td>		
		</tr>							
		<tr>						
			<td class="">Nama Tengah</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->nama_tengah}}</span>
			<span class="f_back"><input type="text" id="f_up_nama_tengah" value="{{array_get($data, 'data')->nama_tengah}}" /></span></td>
		</tr>
		<tr>						
			<td class="">Nama Belakang</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->nama_belakang}}</span>
			<span class="f_back"><input type="text" id="f_up_nama_belakang" value="{{array_get($data, 'data')->nama_belakang}}" /></span></td>
		</tr>
		<tr>
			<td class="">Alamat</td>
			<td>:</td>
			<td><span class="f_front">{{$alamat->jalan}} </span>
			<span class="f_back"><input type="text" id="f_up_alamat" value="{{$alamat->jalan}}" /></span></td>
		</tr>
		<tr>
			<td class="">Kota</td>
			<td>:</td>
			<td><span class="f_front">{{$alamat->kota}}</span>
			<span class="f_back"><input type="text" id="f_up_kota" value="{{$alamat->kota}}" /></span></td>		
		</tr>
		<tr>
			<td class="">Kodepos</td>
			<td>:</td>
			<td><span class="f_front">{{$alamat->kodepos}}</span>
			<span class="f_back"><input type="text" id="f_up_kodepos" value="{{$alamat->kodepos}}" /></span></td>
		</tr>
		<tr>						
			<td class="">Telpon</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->telp}}</span>
			<span class="f_back"><input type="text" id="f_up_telp" value="{{array_get($data, 'data')->telp}}" /></span></td>
		</tr>
		<tr>
			<td class="" style="vertical-align:top;">Hp</td>
			<td style="vertical-align:top;">:</td>			
			<td>				
				<?php 
					$idx = 1;
					foreach($list_hp as $value){ ?>
						<span class="f_front"> <?php echo $value['no_hp']; ?> </span> 
						<span class="f_back"> 
							<input type="text" id="f_up_hp<?php echo $idx;?>" value="<?php echo $value['no_hp']?>" /> 
							<?php $idx++; ?>
							<input type="button" value="X" id="delHp<?php echo $idx;?>" />
						</span>						
						<br/>
				<?php }; ?>				
			</td>
		</tr>
		<tr>						
			<td class="">Jenis Kelamin</td>
			<td>:</td>
			<td><span class="f_front">
				<?php 
					if($data['data']['gender'] == 1) {
						echo "pria";
					} else {
						echo "wanita";
					} ?>			
				</span>
			<span class="f_back"><input id="f_up_genderpria" type="radio" name="gender" value="1" <?php if($data['data']['gender']==1) {echo 'checked';}?>/>pria <input id="f_up_genderwanita" type="radio" name="gender" value="0" <?php if($data['data']['gender']==0) {echo 'checked';}?>/>wanita</span></td>
		</tr>
		<tr>
			<td>Wilayah</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->wilayah}}</span>
				<span class="f_back">				
					<select id="f_up_wilayah">
						<?php 
							foreach($list_wilayah as $value => $text){ ?> 
								<option value="<?php echo $value; ?>" <?php if($data['data']['wilayah'] == $value){echo "selected";} ?> > 
									<?php echo $text; ?>
								</option><?php } ?>
					</select>
				</span>
			</td>
		</tr>
		<tr>
			<td>Golongan Darah</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->gol_darah}}</span>	
				<span class="f_back">
					<select id="f_up_gol_darah">
						<?php 
							foreach($list_gol_darah as $value => $text){ ?> 
								<option value="<?php echo $value; ?>" <?php if($data['data']['gol_darah'] == $value){echo "selected";} ?> > 
									<?php echo $text; ?>
								</option><?php } ?>
					</select>
				</span>
			</td>
		</tr>
		<tr>
			<td>Pendidikan</td>		
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->pendidikan}}</span>		
				<span class="f_back">
					<select id="f_up_pendidikan">
						<?php 
							foreach($list_pendidikan as $value => $text){ ?> 
								<option value="<?php echo $value; ?>" <?php if($data['data']['pendidikan'] == $value){echo "selected";} ?> > 
									<?php echo $text; ?>
								</option><?php } ?>
					</select>		
				</span>
			</td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->pekerjaan}}</span>
				<span class="f_back">
					<select id="f_up_pekerjaan">
						<?php 
							foreach($list_pekerjaan as $value => $text){ ?> 
								<option value="<?php echo $value; ?>" <?php if($data['data']['pekerjaan'] == $value){echo "selected";} ?> > 
									<?php echo $text; ?>
								</option><?php } ?>
					</select>			
				</span>
			</td>
		</tr>
		<tr>
			<td>Etnis</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->etnis}}</span>
				<span class="f_back">
					<select id="f_up_etnis">
						<?php 
							foreach($list_etnis as $value => $text){ ?> 
								<option value="<?php echo $value; ?>" <?php if($data['data']['etnis'] == $value){echo "selected";} ?> > 
									<?php echo $text; ?>
								</option><?php } ?>
					</select>		
				</span>
			</td>
		</tr>
		<tr>
			<td>Kota Lahir</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->kota_lahir}}</span>
			<span class="f_back"><input type="text" id="f_up_kota_lahir" value="{{array_get($data, 'data')->kota_lahir}}" /></span></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><span class="f_front">{{array_get($data, 'data')->tanggal_lahir}}</span>
			<span class="f_back"><input type="text" id="f_up_tanggal_lahir" value="{{array_get($data, 'data')->tanggal_lahir}}"/></span></td>
		</tr>
		<tr>
			<td>Gereja</td>
			<td>:</td>
			<td><span class="f_front">{{$nama_gereja}}</span>
				<span class="f_back">
					<select id="f_up_gereja">
						<?php foreach($list_gereja as $value => $text){ ?> 
								<option value='<?php echo $value; ?>' 
									<?php 
										if ($data['data']['id_gereja'] == $value) {
											echo 'selected';
										}?> > <?php echo $text; ?>
								</option>
						<?php } ?>
					</select>		
				</span>
			</td>
		</tr>	
	</table>	
</div>	
	
@stop