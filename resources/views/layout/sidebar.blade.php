<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Image" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">User Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item @yield('course_child_operate')">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-rotate nav-icon"></i>
                        <p>
                            {{ __('Courses') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-1">
                            <a href="{{ route('course.add') }}" class="nav-link @yield('course_add')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Add') }}</p>
                            </a>
                        </li>
                        <li class="nav-item ml-1">
                            <a href="{{ route('course.view') }}" class="nav-link @yield('course_view')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('View') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('material_child_operate')">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-rotate nav-icon"></i>
                        <p>
                            {{ __('Resources / Materials') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-1">
                            <a href="{{ route('material.view') }}" class="nav-link @yield('material_view')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('View') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
