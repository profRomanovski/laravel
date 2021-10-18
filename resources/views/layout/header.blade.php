<div class="container col-8 align-content-center">
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand col-4" href="{{route('home')}}">Expert System Documentation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse col-8" id="navbarsExample09">
        @if(Request::path() === '/' || Request::path() === 'post-search' )
            <form class="form-inline my-2 my-md-0 ml-3" method="GET" action="{{route('post.search')}}">
                <input class="form-control" type="text" name="val" placeholder="Search" aria-label="Search"
                value="{{$val}}">
            </form>
        @endif
    </div>
</nav>
</div>
<style>
    #navbarsExample09 {
        justify-content: flex-end;
        padding-right: 17px;
    }
    .form-inline {
        margin-left: 10px;
    }
</style>
