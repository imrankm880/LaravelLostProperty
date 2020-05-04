@include('layouts.header')
<body>
<div class="wrapper">
    <!--
        Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
    -->
    <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
        <div class="logo-header">


            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
            <div class="navbar-minimize">
                <button class="btn btn-minimize btn-rounded">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->

    </div>

    <!-- Sidebar -->
    <div class="sidebar">


        <div class="sidebar-wrapper scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">

                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>

									<span class="user-level"></span>
									<span class="caret"></span>
								</span>
                        </a>



                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                            <span class="badge badge-count"></span>
                        </a>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Components</h4>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>All Items List</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{url('dashboard/items-list')}}">
                                        <span class="sub-item">All Items List</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('dashboard/items-Pendinglist')}}">
                                        <span class="sub-item">Approved User Claim</span>
                                    </a>
                                </li>


                                <li>
                                    <a href="{{url('dashboard/report-list')}}">
                                        <span class="sub-item">Reports List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a data-toggle="collapse" href="#forms">--}}
{{--                            <i class="fas fa-pen-square"></i>--}}
{{--                            <p>Forms</p>--}}
{{--                            <span class="caret"></span>--}}
{{--                        </a>--}}
{{--                        <div class="collapse" id="forms">--}}
{{--                            <ul class="nav nav-collapse">--}}
{{--                                <li>--}}
{{--                                    <a href="forms/forms.html">--}}
{{--                                        <span class="sub-item">Basic Form</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a href="{{url('dashboard/logout')}}">
                            <i class="fas fa-pen-square"></i>
                            <p>Logout</p>

                        </a>

                    </li>
                </ul>



            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">

{{--              yieldcontent--}}

                @yield('content');

{{----}}

            </div>
        </div>

    </div>

    <!-- Custom template | don't include it in your project! -->

    <!-- End Custom template -->
</div>
</div>
@include('layouts.footer')
</body>
</html>
