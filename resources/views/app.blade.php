<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogв</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"><!-- Custom styles for this template -->
</head>

<body>
@include('layout.header')
<div class="container col-8">
@yield('content')
</div>
@include('layout.footer')
@include('layout.footer-scripts')

</body>

</html>
