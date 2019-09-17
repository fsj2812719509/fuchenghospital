<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>阜城县人民医院</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/img/favicon.png" />
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div style="font-size: 30px; margin:0 auto; color: #7886d7;">阜城县第一人民医院</div>
    </nav>
    {{--左侧导航--}}
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <span class="menu-title">首页</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                    @foreach($res as $k=>$v)
                    <a class="nav-link" href="/IndexOffice?office_id={{$v['office_id']}}">
                        <span class="menu-title">{{$v['office_name']}}</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                    @endforeach
                </li>
                <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            {{--主体内容--}}

                @yield('content')
            {{--结束主体内容--}}
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    {{--结束左侧导航--}}




</div>
</body>
</html>