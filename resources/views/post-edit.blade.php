@extends('app')

@section('content')
    <main class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header text-center">Post edit</h3>
                    <div class="card-body">
                        <form action="{{ route('post.update') }}" method="POST">
                            @csrf
                            <input type="text" name="id" placeholder="Id"
                                   id="id" class="form-control d-none" value="{{$post->id}}">
                            <div class="form-group mb-3">
                                <input type="text" name="name" placeholder="Name" id="name" class="form-control"
                                value="{{$post->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="description" placeholder="Description"
                                       id="description" class="form-control" value="{{$post->description}}">
                            </div>
                            <div class="form-group mb-3">
                                <textarea type="text" rows="12" name="content" placeholder="Content"
                                          id="content" class="form-control">{{$post->content}}</textarea>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </form>
                        <div class="d-grid mx-auto mt-3">
                            <a href="{{url()->previous()}}" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
