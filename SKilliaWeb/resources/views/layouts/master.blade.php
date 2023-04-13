<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    @include('layouts.head')

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.main-headerbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.main-sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- <div class="row">
                    Column
                    
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            
                            <div>
                                <hr class="mt-0 mb-0">
                            </div>
                            <div class="card-body text-center ">
                                
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3">
                        <!-- Column -->
                        
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body bg-info">
                                <h4 class="text-white card-title">My Patients</h4>
                                <h6 class="card-subtitle text-white mb-0 op-5">Checkout my patients here</h6>
                            </div>
                            <div class="card-body">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn"><button type="button"
                                            class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button>
                                    </h2>
                                    <div class="message-widget contact-widget">
                                        <!-- Message -->
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="user-img mb-0"> <img src="../assets/images/users/1.png"
                                                    alt="user" class="img-circle"> <span
                                                    class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5 class="mb-0">Layla Ahmed</h5> <span
                                                class="mail-desc">10 years old</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="user-img mb-0"> <img src="../assets/images/users/2.jpeg"
                                                    alt="user" class="img-circle"> <span
                                                    class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5 class="mb-0">Gana Mohammed</h5> <span
                                                    class="mail-desc">8 years old</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="user-img mb-0"> <img src="../assets/images/users/3.png"
                                                alt="user" class="img-circle"> <span
                                                class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5 class="mb-0">Ahmed Adel</h5> <span
                                                    class="mail-desc">12 years old</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="user-img mb-0"> <img src="../assets/images/users/4.jpeg"
                                                    alt="user" class="img-circle"> <span
                                                    class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5 class="mb-0">Hany Ahmed</h5> <span
                                                    class="mail-desc">9 years old</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
  @include('layouts.footer-scripts')
</body>

</html>