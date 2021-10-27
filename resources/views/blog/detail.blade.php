@extends('blog.master')
@section('content')

    <div class="">
        <div class="py-3">

            <h2 class="fw-bolder">{{$article->article_title}}</h2>
            <div class="small post-category mb-3 badge badge-primary">
                <a href="{{route('baseOnCategory',$article->category_id)}}" rel="category tag">{{$article->getCategory->title}}</a>
            </div>

            <div class="my-3 feature-image-box">
                <img width="1024" height="682" src="{{asset('images/blogPhotos/de0d23dd-86f6-3ee1-a871-6325fb45bd06-1024x682.jpg')}}">
                <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                    <div class="">
                        <img alt="" src="{{$article->getUser->photo != null ? asset('storage/profile/'.$article->getUser->photo) : asset('images/blogPhotos/75d23af433e0cea4c0e45a56dba18b30.png')}}"
                             class="avatar avatar-30 photo rounded-circle me-2" height="30" width="30" loading="lazy" style="background-size: contain">
                        <a href="{{route('baseOnOwner',$article->user_id)}}" title="Visit admin’s website" rel="author external">
                            {{$article->getUser->name}}
                        </a>
                    </div>

                    <div class="">
                        <span class="badge-primary badge badge-pill text-black-50">
                            <i class="feather-calendar"></i>
                            <a href="{{route('baseOnDate',$article->created_at->format('Y-m-d'))}}">{{$article->created_at->format('Y F d H:i A')}}</a>
                        </span>
                    </div>
                </div>

                <p>{{$article->article_description}}</p>
                <hr>
                @php
                    $previousArticle = \App\Article::where("id","<",$article->id)->latest("id")->first();
                    $nextArticle = \App\Article::where("id",">",$article->id)->first();
                @endphp
                <div class="nav d-flex justify-content-between p-3">
                    <a href="{{isset($previousArticle) ? route('detail',$previousArticle->id) : "#"}}"
                       class="btn btn-outline-primary page-mover rounded-circle @empty($previousArticle) disabled @endempty">
                        <i class="feather-chevron-left"></i>
                    </a>
                    <a class="btn btn-outline-primary px-3 rounded-pill" href="{{route('welcome',['page'=>request()->page])}}">
                        Read All
                    </a>
                    <a href="{{isset($nextArticle) ? route('detail',$nextArticle->id) : '#'}}"
                       class="btn btn-outline-primary page-mover rounded-circle @empty($nextArticle) disabled @endempty">
                        <i class="feather-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
