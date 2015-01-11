<ul style="margin-top:15px;">
	<!--
	for ($i = 0; $i < 10; $i++)
	<li>
		<a href="#">link</a>
	</li>
	endfor-->
		 	
	<li>{{HTML::linkRoute('admin_view_kebaktian', 'Kebaktian', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_anggota', 'Anggota', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_baptis', 'Baptis', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_atestasi', 'Atestasi', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_pernikahan', 'Pernikahan', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_kedukaan', 'Kedukaan', '' , array('style'=>'color:white;'))}}</li>
	<li>{{HTML::linkRoute('admin_view_dkh', 'Dkh', '' , array('style'=>'color:white;'))}}</li>
	
</ul>