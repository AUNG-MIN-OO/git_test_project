@extends('layouts.app')

@section("title",'Edit Article')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">
                            <i class="feather-list"></i>
                            Article List
                        </h4>
                        <div class="d-flex">
                            @isset(request()->searchKey)
                                <a href="{{route('article.index')}}" class="btn btn-sm btn-danger mr-2"><i class="feather-x"></i> Clear Search</a>
                            @endisset
                            <form action="{{route('article.index')}}"  class="form-inline" method="get">
                                <input type="text" name="searchKey" class="form-control mr-2" value="{{request()->searchKey}}" placeholder="Search here">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    @isset(request()->searchKey)
                        <span class="font-weight-bold text-success">Search By : {{request()->searchKey}}</span>
                    @endisset
                    <hr>
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category Name</th>
                            <th>Owner</th>
                            <th>Actions</th>
                            <th>Created_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{\Illuminate\Support\Str::words($article->article_title,4)}}</td>
                                <td>{{\Illuminate\Support\Str::words($article->article_description,8)}}</td>
                                <td>
                                    <span class="badge badge-primary badge-pill">{{$article->getCategory->title}}</span>
                                </td>
                                <td>{{$article->getUser->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('article.show',$article->id)}}" class="btn btn-success mr-1"><i class="feather-eye"></i></a>
                                        <a href="{{route('article.edit',$article->id)}}" class="btn btn-warning mr-1"><i class="feather-edit-3"></i></a>
                                        <form action="{{route('article.destroy',[$article->id,'page'=>request()->page])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger article_delete"><i class="feather-trash-2"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <span><i class="feather-calendar"></i></span>
                                    <span class="small">{{$article->created_at->format("d-m-Y")}}</span>
                                    <br>
                                    <i class="feather-clock"></i>
                                    <span class="small">{{$article->created_at->format("H:i A")}}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center font-weight-bold">No match result!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{ $articles->appends(request()->all())->links() }}
                        <h4 class="font-weight-bold">Total : {{$articles->total()}} pages</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
