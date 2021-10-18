@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group list-group-flush pt-3">
                <li class="list-group-item-primary">Деталі</li>
                <li class="list-group-item"><a href="{{url()->previous()}}" class=" btn btn-success">Go Back</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$post->description}}</h6>
                    <p class="card-text">{{$post->content}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated {{$post->updated_at}}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
