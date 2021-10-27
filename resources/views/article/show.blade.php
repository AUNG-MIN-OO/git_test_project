@extends('layouts.app')

@section("title") {{$article->article_title}} @endsection

@section("head")
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0 text-capitalize text-center font-weight-bold">
                        {{$article->article_title}}
                    </h4>
                    <hr class="w-50">
                    <div class="text-center mb-4 mt-2">
                        <span class="badge badge-pill badge-primary"><i class="feather-clock"></i> {{$article->created_at->diffForHumans()}}</span>
                        <span class="badge badge-pill badge-primary"><i class="feather-calendar"></i> {{$article->created_at->format("d-m-Y")}}</span>
                        <span class="badge badge-pill badge-success"><i class="feather-user"></i> {{$article->getUser->name}}</span>
                    </div>
                    <p class="description">{{$article->article_description}}</p>
                    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger float-right btn-sm">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
