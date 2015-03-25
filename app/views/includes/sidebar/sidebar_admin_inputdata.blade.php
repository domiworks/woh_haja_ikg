<!-- 
	THIS VIEW TEMPORARY UNUSED 
	(asumsi admin ga bisa input data, hanya bisa memantau untuk edit/delete permanent)
									-->

<ul style="margin-top:15px;">
	<!--
	for ($i = 0; $i < 10; $i++)
	<li>
		<a href="#">link</a>
	</li>
	endfor-->
	
	<li>{{HTML::linkRoute('admin_view_input_gereja', 'Gereja', '' , array('style'=>'color:white;'))}}</li> 
	<li>{{HTML::linkRoute('admin_view_input_jenis_baptis', 'Jenis Baptis', '' , array('style'=>'color:white;'))}}</li> 
	<li>{{HTML::linkRoute('admin_view_input_jenis_atestasi', 'Jenis Atestasi', '' , array('style'=>'color:white;'))}}</li> 
	<li>{{HTML::linkRoute('admin_view_input_jenis_kegiatan', 'Jenis Kegiatan', '' , array('style'=>'color:white;'))}}</li> 
	<li>{{HTML::linkRoute('admin_view_input_auth', 'Akun', '' , array('style'=>'color:white;'))}}</li> 	
	<li>{{HTML::linkRoute('admin_view_input_ubah_password', 'Ubah Password', '' , array('style'=>'color:white;'))}}</li> 	
	
</ul>