@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group pt-3" id="catogoryList" role="tablist">
                <a class="list-group-item list-group-item-action"
                    data-toggle="list" role="tab" href="{{route('home', ['cat'=>'all'])}}">All</a>
                @foreach($categories as $category)
                    <a class="list-group-item list-group-item-action"
                        data-toggle="list" role="tab" href="{{route('home', ['cat'=>"$category->id"])}}">{{$category->name}}</a>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="card-deck">
                @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Created by {{$post->username}}</h6>
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
