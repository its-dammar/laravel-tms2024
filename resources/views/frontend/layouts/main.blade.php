<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.header')
</head>

<body>
    @include('frontend.layouts.navbar')
    <div class="container py-5">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 mb-3 mb-md-0">
                @include('frontend.layouts.sidebar')
            </div>
            <!-- Sidebar -->

            <!-- Content area -->
            <div class="col-lg-9 col-md-8">
                @yield('content')
            </div>
            <!-- Content area -->
        </div>
    </div>
    @include('frontend.layouts.footer')
</body>

</html>
