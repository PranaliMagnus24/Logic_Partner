<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact"dir="ltr" data-skin="default" data-assets-path="{{ asset('admincss/assets/') }}"data-template="vertical-menu-template" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admincss/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/fonts/flag-icons.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admincss/assets/vendor/css/pages/cards-advance.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('admincss/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('admincss/assets/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('admincss/assets/js/config.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
    <div class="container my-3">
        @if(session('success'))
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
              popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
          });

          (async () => {
            await Toast.fire({
              icon: 'success',
              title: '{{ session('success') }}',
            });
          })();
        </script>
        @endif
      </div>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('main_admin.partials.sidebar')

            <div class="layout-page">
                @include('main_admin.partials.navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('main_admin.partials.footer')
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- build:js assets/vendor/js/theme.js -->

    <script src="{{ asset('admincss/assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admincss/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('admincss/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admincss/assets/js/dashboards-analytics.js') }}"></script>
  </body>
</html>
