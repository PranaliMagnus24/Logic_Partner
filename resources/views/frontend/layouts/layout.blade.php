<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Logic Partners')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
  <script src="{{ asset('admin/assets/vendor/sweet-alert/sweetalert2@11.js')}}"></script>

</head>
<style>

</style>
<body>
<!-------Flash success message--------->
<div class="flas-message">
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



<div class="login-new">
    @yield('login')

</div>




<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
