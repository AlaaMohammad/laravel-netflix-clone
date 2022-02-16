@include('layouts.header')
<main class="py-4">
    <div class="container">

    @yield('content')
    </div>
</main>
@yield('scripts')
@include('layouts.footer')
