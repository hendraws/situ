<div class="sidebar">
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{ action('HomeController@index') }}" class="nav-link">
					<i class="nav-icon fa fa-tachometer-alt"></i>
					<p>
						Dashboard
					</p>
				</a>
			</li>	
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fa fa-database"></i>
					<p>
						Data Master
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview" style="display: none;">
					<li class="nav-item">
						<a href="{{ action('MasterController@index') }}" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Barang</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ action('UserController@index') }}" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>User</p>
						</a>
					</li>
				</ul>
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