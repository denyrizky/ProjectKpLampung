 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">BaDas</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('blog.create') || $usr->can('blog.view') ||  $usr->can('blog.edit') ||  $usr->can('blog.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Master Data
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.kecil.index') || Route::is('admin.menengah.index') || Route::is('admin.kecilIlmea.index') || Route::is('admin.menengahIlmea.index') ? 'in' : '' }}">
                            @if ($usr->can('blog.view'))
                                <li class="{{ Route::is('admin.menengah.index')  || Route::is('admin.menengah.edit') ? 'active' : '' }}"><a href="{{ route('admin.menengah.index') }}">DATA INDUSTRI MENENGAH BIDANG IKAHH</a></li>
                            @endif
                            @if ($usr->can('blog.create'))
                                <li class="{{ Route::is('admin.kecil.index')  ? 'active' : '' }}"><a href="{{ route('admin.kecil.index') }}">DATA INDUSTRI KECIL BIDANG IKAHH</a></li>
                            @endif
                            @if ($usr->can('blog.view'))
                                <li class="{{ Route::is('admin.menengahIlmea.index') ? 'active' : '' }}"><a href="{{ route('admin.menengahIlmea.index') }}">DATA INDUSTRI MENENGAH BIDANG ILMEA</a></li>
                            @endif
                            @if ($usr->can('blog.create'))
                                <li class="{{ Route::is('admin.kecilIlmea.index')  ? 'active' : '' }}"><a href="{{ route('admin.kecilIlmea.index') }}">DATA INDUSTRI KECIL BIDANG ILMEA</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->