@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group list-group-flush pt-3" id="catogoryList" >
                <li class="list-group-item"><a href="{{route('home')}}" class=" btn btn-success">Go Home</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="card-deck">
                @foreach($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->name}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{route('view-post', ['id'=>$post->id])}}" class="card-link">Read more</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{$post->updated_at}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
