@include('layouts.public.header')

<body>

    <div class="container">

    @include('partials.flash')

    @yield('content')

    </div>

    @include('layouts.public.footer')

</body>