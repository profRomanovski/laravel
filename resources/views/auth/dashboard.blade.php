@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group list-group-flush pt-3">
                <li class="list-group-item-primary">About me</li>
                <li class="list-group-item">{{$user->name}}</li>
                <li class="list-group-item">{{$user->email}}</li>
                <li class="list-group-item">Written posts: {{$user->posts->count()}}</li>
                <li class="list-group-item"><a href="{{route('post.create.view')}}" class=" btn btn-success">Create new</a></li>
                <li class="list-group-item"><a href="{{route('home')}}" class=" btn btn-info">Go Home</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="card-deck">
                @foreach($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Created by {{$user->name}}</h6>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{route('view-post', ['id'=>$post->id])}}" class="card-link">Read more</a>
                            <a href="{{route('edit-post', ['id'=>$post->id])}}" class="card-link">Edit</a>
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
