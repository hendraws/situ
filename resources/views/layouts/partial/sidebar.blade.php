<div class="sidebar">
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{ action('HomeController@underContraction') }}" class="nav-link">
					<i class="nav-icon fa fa-tachometer-alt"></i>
					<p>
						Dashboard
					</p>
				</a>
			</li>	
			<li class="nav-item">
				<a href="{{ action('MasterController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-database"></i>
					<p>
						Data Master
					</p>
				</a>
			</li>	
			<li class="nav-item">
				<a href="{{ action('ScanInController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-barcode"></i>
					<p>
						Scan In
					</p>
				</a>
			</li>	
			<li class="nav-item">
				<a href="{{ action('SettingLocationController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-map-pin"></i>
					<p>
						Setting Location
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ action('InspectionController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-archive"></i>
					<p>
						Inspection
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ action('ScanOutController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-barcode"></i>
					<p>
						Scan Out
					</p>
				</a>
			</li>	
			
		</ul>

	</nav>
	<!-- /.sidebar-menu -->
</div>