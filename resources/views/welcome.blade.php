@extends('blog.master')
@section('content')
    @forelse($articles as $article)
        <div class="">
            <div class="border-bottom mb-4 pb-4 article-preview">
                <div class="p-0 p-md-3">
                    <a class="fw-bold h4 d-block text-decoration-none"
                       href="{{route('detail',$article->id)}}">
                        {{$article->article_title}}
                    </a>
                    <div class="small post-category">
                        <a href="{{route('baseOnCategory',$article->category_id)}}" rel="category tag">{{$article->getCategory->title}}</a>
                    </div>
                    <div class="my-3 feature-image-box">
                        <img width="1024" height="682"
                             src="{{asset('images/blogPhotos/de0d23dd-86f6-3ee1-a871-6325fb45bd06-1024x682.jpg')}}"
                             class="attachment-large size-large wp-post-image" alt="">
                    </div>

                    <div class="text-black-50 the-excerpt">
                        <p>{{\Illuminate\Support\Str::words($article->article_description,20)}}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            <img alt="" src="{{$article->getUser->photo != null ? asset('storage/profile/'.$article->getUser->photo) : asset('images/blogPhotos/75d23af433e0cea4c0e45a56dba18b30.png')}}"
                                 class="avatar avatar-30 photo rounded-circle" height="30" width="30" loading="lazy" style="background-size: contain">
                            <div class="ms-2">
                                <span class="small">
                                    <a href="{{route('baseOnOwner',$article->user_id)}}" title="Visit admin’s website" rel="author external">
                                        {{$article->getUser->name}}
                                    </a>
                                </span>
                                <br>
                                <a class="small" href="{{route('baseOnDate',$article->created_at->format('Y-m-d'))}}">{{$article->created_at->format('Y-m-d')}}</a>
                            </div>
                        </div>

                        <a href="{{route('detail',$article->id)}}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="mb-4 pb-4">
            <div class="py-5 my-5 text-center text-lg-start">
                <p class="fw-bold text-primary">Dear Viewer</p>
                <h1 class="fw-bold">
                    There is no article ...
                </h1>
                <p>Please go back to Home Page</p>
                <a class="btn btn-outline-primary rounded-pill px-3" href="{{route('welcome')}}">
                    <i class="feather-home"></i>
                    Blog Home
                </a>

            </div>
        </div>
    @endforelse
    <div class="d-block d-lg-none mt-5" id="pagination">
        <div class="pagination">
            <ul class="pagination">
                {{ $articles->onEachSide(1)->links() }}
            </ul>
        </div>
    </div>
@endsection
@section('paginate')
    <div class="d-none d-lg-block mt-5" id="pagination">
        <div class="pagination">
            <ul class="pagination">
                {{ $articles->onEachSide(1)->links() }}
            </ul>
        </div>
    </div>
@endsection
