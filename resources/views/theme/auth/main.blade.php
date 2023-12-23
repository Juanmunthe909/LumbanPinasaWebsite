<!DOCTYPE html>
<html lang="en">
@include('theme.auth.head')
<body>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container col-lg-6">
                <div class="card overflow-hidden border-0">
                    {{$slot}}
                </div>
            </div>
        </div>
        @include('theme.auth.footer')
    </div>
    @include('theme.auth.js')
    @yield('custom_js')
</body>
</html>