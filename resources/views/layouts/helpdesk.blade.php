<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from zuramai.github.io/mazer/demo/layout-vertical-navbar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Mar 2022 15:23:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TICKETING BIRO PBJ PROVINSI RIAU</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('img/riau.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }}" type="image/x-icon">

</head>

<body>
    {{ $slot }}

    @include('sweetalert::alert')

    <!-- <script src="//code.jivosite.com/widget/A0mHAMOY4b" async></script> -->

    <!-- Hotjar Tracking Code for my site -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2970321,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    @yield('pilih')
    <script src="{{ asset('libs/jspdf.umd.js') }}"></script>
    <script src="{{ asset('libs/jspdf.plugin.autotable.js') }}"></script>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/mazer.js') }}"></script>


    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>

    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui-chartjs.js') }}"></script>

    <!-- Include Choices JavaScript -->
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
</body>


<!-- Mirrored from zuramai.github.io/mazer/demo/layout-vertical-navbar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Mar 2022 15:23:00 GMT -->

</html>