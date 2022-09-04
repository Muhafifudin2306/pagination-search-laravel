<!DOCTYPE html>
<html lang="en">

<head>
    <x-style></x-style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @stack('style')
        <x-sidebar></x-sidebar>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <x-navbar></x-navbar>
                @yield('content');

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <x-script></x-script>
        @stack('script')


</body>

</html>
