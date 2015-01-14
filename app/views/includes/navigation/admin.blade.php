
<nav class="navbar navbar-default" role="navigation" 
	style="border-top:0px;
			border-bottom:0px;">
	<div class="container-fluid" style="background-color: white;">		<!--#FFFF19-->

		<!-- Collect the nav links, forms, and other content for toggling -->
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav nav-pills">
				<!--
				<li><a href="{{URL::to('/admin/view_gereja')}}"><span class="glyphicon glyphicon-home" style="color:green; margin-right:10px;"></span>Admin</a></li>
				<li>
					<div 
						style="height:40px; 
								width: 1px; 
								background-color:#D1D1D1;
								margin-left: 25px;
								margin-right: 25px;">								
					</div>
				</li>
				-->
				<li><a href="{{URL::to('/admin/view_kebaktian')}}"><span class="glyphicon glyphicon-home" style="color:orange; margin-right:10px;"></span>Admin</a></li>
				<li>
					<div 
						style="height:40px; 
								width: 1px; 
								background-color:#D1D1D1;
								margin-left: 25px;
								margin-right: 25px;">								
					</div>
				</li>								
				<li><a href="{{--URL::to('/user/reporting')--}}"><span class="glyphicon glyphicon-file" style="color:#333333; margin-right:10px;"></span>Laporan</a></li>
				<li>
					<div 
						style="height:40px; 
								width: 1px; 
								background-color:#D1D1D1;
								margin-left: 25px;
								margin-right: 25px;">								
					</div>
				</li>
				<li><a href="{{--URL::to('/user/importeksport')--}}"><span class="glyphicon glyphicon-import" style="color:#2974FF; margin-right:10px;"></span>Import / Eksport <span class="glyphicon glyphicon-export" style="color:#2974FF; margin-right:10px;"></span></a></li>			
				
				<!--
				<li><a href="#">Other Link</a></li>
				<li><a href="#">Other Link</a></li>
				<li><a href="#">Other Link</a></li>
				-->
			</ul>
			
		 
			<!--<span class="pull-right" id="f_clock" style="margin-right: 10px; line-height: 30px; color: #fff;"></span>
			-->
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>