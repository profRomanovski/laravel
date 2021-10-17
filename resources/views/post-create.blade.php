@extends('app')

@section('content')
    <main class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header text-center">Post create</h3>
                    <div class="card-body">
                        <form action="{{ route('post.create') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="description" placeholder="Description"
                                       id="description" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select" name="category_id">
                                    <option selected>Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <textarea type="text" rows="12" name="content" placeholder="Content" id="content" class="form-control"></textarea>
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
