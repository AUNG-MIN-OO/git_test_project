@extends('layouts.app')

@section("title") Edit Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-bread-crumb>

    <div class="row mb-4">
        <div class="col-12">
            <h4 class="mb-0">
                <i class="feather-edit-3"></i>
                Edit Article
            </h4>
            <form action="{{ route('article.update',$article->id) }}" id="edit_article" method="post">
                @csrf
                @method("put")
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="category">Select Category</label>
                        <select name="category" form="edit_article" id="category" class="custom-select-lg custom-select @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$article->category_id==$category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger font-weight-bold">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="article_title">Article Title</label>
                        <input name="article_title" form="edit_article" id="article_title" class="form-control form-control-lg @error('article_title') is-invalid @enderror" value="{{$article->article_title}}">
                        @error('article_title')
                        <small class="text-danger font-weight-bold">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="article_description">Article Description</label>
                        <textarea name="article_description" form="edit_article" id="article_title" class="form-control form-control-lg @error('article_description') is-invalid @enderror" rows="5">{{$article->article_description}}</textarea>
                        @error('article_description')
                        <small class="text-danger font-weight-bold">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary btn-lg w-100" form="edit_article">Update Article</button>
                    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger btn-lg mt-3 w-100">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
