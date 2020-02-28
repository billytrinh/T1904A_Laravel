<!DOCTYPE html>
<html lang="zxx">
@include('html.head')
<body>

<!-- Header section -->
@includeIf('html.header')
<!-- Header section end -->
<!-- Product section -->
<section class="product-section spad">
    <div class="container">
        @yield('content')
    </div>
</section>
<!-- Product section end -->
@includeFirst(['html.footer','footer'])

@yield('popup')

</body>
</html>
