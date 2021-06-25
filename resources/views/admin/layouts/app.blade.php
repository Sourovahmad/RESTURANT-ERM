<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LearnEdu') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


        <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}" type="text/css">

        <link rel="stylesheet" href="{{asset('css/admin/sb-admin-2.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/datatables.min.css')}}">
        <link rel="stylesheet" src="{{asset('bootstrap-select/css/bootstrap-select.min.css')}}">

        <!-- Styles -->
        <style>

            .bg-techbot-dark {

            background-color: #041836;
            color: #fff;

            }
        </style>
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{asset('js/admin/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrapbundle.js')}}"></script>
    <script src="{{asset('js/admin/easing.min.js')}}"></script>
    <script src="{{asset('js/admin/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/admin/Chart.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.min.js')}}"></script>
    <script src="{{asset('bootstrap-select/js/bootstrap-select.min.js')}}"></script>

<script> 
    $(document).ready(function(){
        (function($) {
        "use strict"; // Start of use strict

        // Toggle the side navigation
        $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
          $("body").toggleClass("sidebar-toggled");
          $(".sidebar").toggleClass("toggled");
          if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
          };
        });

        // Close any open menu accordions when window is resized below 768px
        $(window).resize(function() {
          if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
          };
        });

        if ($(window).width() < 768) {
          $('#sidebarToggleTop').trigger('click');
          // $('.sidebar .collapse').collapse('hide');
        };

        // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
        $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
          if ($(window).width() > 768) {
            var e0 = e.originalEvent,
              delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
          }
        });

        // Scroll to top button appear
        $(document).on('scroll', function() {
          var scrollDistance = $(this).scrollTop();
          if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
          } else {
            $('.scroll-to-top').fadeOut();
          }
        });

        // Smooth scrolling using jQuery easing
        $(document).on('click', 'a.scroll-to-top', function(e) {
          var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
          }, 1000, 'easeInOutExpo');
          e.preventDefault();
        });

      })(jQuery); // End of use strict

    })
</script>

    </head>
    <body id="page-top">




        <!-- Page Wrapper -->
        <div id="wrapper">


            <x-sidebar />




            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <x-navbar/>

                    <!-- Begin Page Content -->
                    <div class="container-fluid pl-1 pl-md-2 ">

                        @yield('content')

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <x-footer>

                </x-footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

    </body>
</html>
