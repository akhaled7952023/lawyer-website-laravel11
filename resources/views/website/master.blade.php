{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.website.head')
</head>

<body class="fixed">

        		<!-- Header Start -->
        @include('layouts.website.header')
                <!-- Header End -->
		<!-- Loader End -->
        @yield('content')

	<!-- Footer Start -->
    @include('layouts.website.footer')
    <!-- Footer End -->

@include('layouts.website.scripts')
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.website.head')
</head>

<body class="fixed">
	<div class="main">
		<!-- Loader Start -->
		<div class="loader-box">
			<div class="loader"></div>
		</div>
		<!-- Loader End -->

		<!-- Header Start -->
        @include('layouts.website.header')
		<!-- Header End -->
        @yield('content')

		<!-- Footer Start -->
		@include('layouts.website.footer')
		<!-- Footer End -->
    </div>

@include('layouts.website.scripts')
</body>
</html>



