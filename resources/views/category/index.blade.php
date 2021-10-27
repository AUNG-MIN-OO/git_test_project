@extends('layouts.app')

@section("title",'Category Manager')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Category Manager
                    </h4>
                    <hr>
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" placeholder="New Category" class="form-control mr-4 @error('title') is-invalid @enderror" required value="{{old('title')}}">
                            <button class="btn btn-primary">Add Category</button>
                        </div>
                        @error('title')
                        <small class="text-danger font-weight-bold">{{$message}}</small>
                        @enderror
                    </form>
                    <hr>
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Actions</th>
                            <th>Created_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(\App\Category::with("getUser")->get() as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->getUser->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning"><i class="feather-edit-3"></i></a>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button href="" class="btn btn-danger category_delete"><i class="feather-trash-2"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <span><i class="feather-calendar"></i></span>
                                    <span class="small">{{$category->created_at->format("d-m-Y")}}</span>
                                    <br>
                                    <i class="feather-clock"></i>
                                    <span class="small">{{$category->created_at->format("H:i A")}}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center font-weight-bold">There is not data yet!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
