@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-edit-3"></i>
                        Edit Category
                    </h4>
                    <hr>
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <input type="text" name="title" class="w-50 form-control mr-4 @error('title') is-invalid @enderror" required value="{{old('title',$category->title)}}">
                            <button class="btn btn-primary">Update Category</button>
                        </div>
                        @error('title')
                        <small class="text-danger font-weight-bold">{{$message}}</small>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
