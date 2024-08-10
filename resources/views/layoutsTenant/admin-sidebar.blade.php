<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="gradient-4" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Inventario - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/layout.js"></script>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        @livewireStyles

    </head>

    <body>

        @include('layoutsTenant.menu-sidebar')
        @yield('content')
        @include('layoutsTenant.footer')


        @livewireScripts
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script>
            livewire.on('notificar_accion', accion => {
                document.getElementById('close-modal').click();
            });
        </script>

        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>

