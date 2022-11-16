<!-- Sidebar -->
<nav id="sidebar" style="background-color: #00402b; border-right: 2px solid #00402b;">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700">
                        <span class="text-dual-primary-dark">PROJECT MANAGEMENT</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user p-1 align-parent" style="background-color: #00402b; height: auto;">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img width="100%" src="/asset/backend_asset/logo.png" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link">
                    <img style="width: 100%;" src="/asset/backend_asset/logo.png" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase d-block">{{Auth::user()->name}}</a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="/"><i class="fa fa-dashboard"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="{{route('user.list')}}"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Employees</span></a>
                </li>
                <li>
                    <a href="{{route('client.list')}}"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Client</span></a>
                </li>
                <li>
                    <a href="{{route('project.list')}}"><i class="fa fa-bookmark"></i><span class="sidebar-mini-hide">Project</span></a>
                </li>
                @endif
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
