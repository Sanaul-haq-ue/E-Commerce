<!doctype html>
<html lang="en" dir="ltr"> <!-- This "app.blade.php" master page is used for all the pages content present in "views/livewire" except "custom" and "switcher" pages -->

<!-- Mirrored from laravel8.spruko.com/noa/index by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:07:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa - Laravel Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">

    <!-- style -->
    @include('admin.includes.style')


</head>

<body class="ltr app sidebar-mini">


<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{ asset('/') }}admin/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- app-Header -->
        @include('admin.includes.header')

        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        @include('admin.includes.sidebar')
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    @yield('body')


                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>

    <!-- Country-selector modal-->
    <div class="modal fade" id="country-selector">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal">
                <div class="modal-header">
                    <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <ul class="row row-sm p-3">
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block active">
                                <span class="country-selector"><img alt="unitedstates" src="{{ asset('/') }}admin/assets/images/flags/us_flag.jpg" class="me-2 language"></span>United States
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="italy" src="{{ asset('/') }}admin/assets/images/flags/italy_flag.jpg" class="me-2 language"></span>Italy
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="spain" src="{{ asset('/') }}admin/assets/images/flags/spain_flag.jpg" class="me-2 language"></span>Spain
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="india" src="{{ asset('/') }}admin/assets/images/flags/india_flag.jpg" class="me-2 language"></span>India
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="french" src="{{ asset('/') }}admin/assets/images/flags/french_flag.jpg" class="me-2 language"></span>French
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="russia" src="{{ asset('/') }}admin/assets/images/flags/russia_flag.jpg" class="me-2 language"></span>Russia
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="germany" src="{{ asset('/') }}admin/assets/images/flags/germany_flag.jpg" class="me-2 language"></span>Germany
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="argentina" src="{{ asset('/') }}admin/assets/images/flags/argentina_flag.jpg" class="me-2 language"></span>Argentina
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="uae" src="{{ asset('/') }}admin/assets/images/flags/uae_flag.jpg" class="me-2 language"></span>UAE
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="austria" src="{{ asset('/') }}admin/assets/images/flags/austria_flag.jpg" class="me-2 language"></span>Austria
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="mexico" src="{{ asset('/') }}admin/assets/images/flags/mexico_flag.jpg" class="me-2 language"></span>Mexico
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="china" src="{{ asset('/') }}admin/assets/images/flags/china_flag.jpg" class="me-2 language"></span>China
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="poland" src="{{ asset('/') }}admin/assets/images/flags/poland_flag.jpg" class="me-2 language"></span>Poland
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="canada" src="{{ asset('/') }}admin/assets/images/flags/canada_flag.jpg" class="me-2 language"></span>Canada
                            </a>
                        </li>
                        <li class="col-lg-4 mb-2">
                            <a class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="malaysia" src="{{ asset('/') }}admin/assets/images/flags/malaysia_flag.jpg" class="me-2 language"></span>Malaysia
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Country-selector modal-->


    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2022 <a href="#">Noa</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="#"> Spruko </a> All rights reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER CLOSED -->

</div>
<!-- page -->

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

<!-- JQUERY -->
@include('admin.includes.script')

</body>


<!-- Mirrored from laravel8.spruko.com/noa/index by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:08:40 GMT -->
</html>
