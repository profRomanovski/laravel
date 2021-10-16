<html>
<h1>As a admin I have got acccess to:</h1>
@foreach($roles as $role)
    <h2>{{$role}}</h2>
@endforeach
<button>
    <a href="/">To main page</a>
</button>
</html>
