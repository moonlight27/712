<html>
    <head>
        <title>MyBlog - @yield('title')</title>
        @include('partials.header')
    </head>
    <body>
        @include('partials.nav')
        <div class="container">
            @section('content')
            @show
        </div>
    </body>
</html>
