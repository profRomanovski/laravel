<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>@yield('title')</title>
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
@include('layout.footer-scripts')
 </body>
</html>
