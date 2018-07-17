<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.navigator')
    <div class="container">
        <div id="content">
            <h1>@yield('title')</h1>
            
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            @yield('content')
            @yield('script')
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>