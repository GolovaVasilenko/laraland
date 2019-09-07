<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/admin" class="nav-link active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                    {{ trans('menu.dashboard') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/admin/pages" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                    {{ trans('menu.menu_pages') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('menu.list') }}" class="nav-link">
                <i class="nav-icon fa fa-navicon"></i>
                <p>
                    Menu
                </p>
            </a>
        </li>
        <!--li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-pencil"></i>
                <p>
                    Blog
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Posts</p>
                    </a>
                </li>
            </ul>
        </li-->
        <li class="nav-item">
            <a href="{{ route('settings.list') }}" class="nav-link">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                {{ trans('menu.menu_settings') }}
                    <!--span class="right badge badge-danger">New</span-->
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
