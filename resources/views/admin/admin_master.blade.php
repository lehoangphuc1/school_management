<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management -  Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/chartjs/Chart.min.css')}}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg')}}" type="image/x-icon">
    {{-- css for datatable --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/simple-datatables/style.css')}}">
</head>
<body>
    <div id="app">
        @include('admin.body.sidebar')
        <div id="main">
            @include('admin.body.header')
            @yield('content')
            @include('admin.body.footer')
        </div>
    </div>
    <script src="{{ asset('backend/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/app.js')}}"></script>
    
    <script src="{{ asset('backend/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{ asset('backend/assets/js/main.js')}}"></script>

    {{-- js for datatable --}}
    <script src="{{ asset('backend/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('backend/assets/js/vendors.js')}}"></script>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'success') }}";
            switch(type){
                case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
                case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
                case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
                case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                title: 'Bạn có chắc là muốn xóa?',
                text: "Dữ liệu đã xóa sẽ không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Hủy',
                confirmButtonText: 'Xóa'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Đã xóa!',
                    'Thông tin đã được xóa',
                    'thành công'
                    )
                }
                })
            });
        });
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>
