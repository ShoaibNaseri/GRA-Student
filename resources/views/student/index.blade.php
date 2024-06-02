<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="thememakker, design by: ThemeMakker.com">
    <link rel="icon" href="{{ asset('studen/favicon.png') }}" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('student/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('student/vendor/charts-c3/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('student/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('student/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('student/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('student/css/chatapp.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/inbox.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/mycss.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/pie.css') }}">
    <link rel="stylesheet" href="{{ asset('student/css/main.css') }}">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="">
        <div id="app">
            <home></home>
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('student/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('student/bundles/vendorscripts.bundle.js') }}"></script>

    {{-- table need script --}}
    <script src="{{ asset('student/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('student/bundles/jquery-datatable.js') }}"></script>
    <!-- page vendor js file -->
    <script src="{{ asset('student/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('student/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('student/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
    {{-- drop files script --}}
    <script src="{{ asset('student/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="https://wrraptheme.com/templates/iconic/js/pages/forms/dropify.js"></script>
    <!--  Message nedded script   -->
    <script src="https://wrraptheme.com/templates/iconic/js/pages/ui/dialogs.js"></script>
    <script src="{{ asset('student/bundles/easypiechart.bundle.js') }}"></script> <!-- easypiechart Plugin Js -->
    <script src="{{ asset('student/vendor/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js -->
    <!-- page js file -->
    <script src="{{ asset('student/bundles/mainscripts.bundle.js') }}"></script>
    <script src="https://wrraptheme.com/templates/iconic/js/university/index.js"></script>
    <script src="https://wrraptheme.com/templates/iconic/js/pages/ui/dialogs.js"></script>
    <script src="{{ asset('student/js/pie.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".mail-detail-expand").click(function() {
                $("#mail-detail-open").toggle();
            });
            $(".mail-back").click(function() {
                $("#mail-detail-open").toggle();
            });
        });
    </script>
    <!-- progress bar -->
    <script src="{{ asset('student/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>

    <script>
        $(function() {
            $('#progress-format1 .progress-bar').progressbar({
                display_text: 'fill'
            });

            $('#progress-format2 .progress-bar').progressbar({
                display_text: 'fill',
                use_percentage: false
            });

            $('#progress-custom-format .progress-bar').progressbar({
                display_text: 'fill',
                use_percentage: false,
                amount_format: function(p, t) {
                    return p + ' of ' + t;
                }
            });

            $('#progress-striped .progress-bar, #progress-striped-active .progress-bar, #progress-stacked .progress-bar')
                .progressbar({
                    display_text: 'fill'
                });

            $('.progress.vertical .progress-bar').progressbar();
            $('.progress.vertical.wide .progress-bar').progressbar({
                display_text: 'fill'
            });
        });
    </script>
</body>

</html>
