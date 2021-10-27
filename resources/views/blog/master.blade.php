<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="icon" href="{{asset('images/logos/fav.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;900&family=Padauk:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    @yield('head')
</head>
<body>
<div class="py-3 mb-5" id="themeHeaderSpacer"></div>
@include('blog.navbar')
<div class="container">
    <div class="row justify-content-center g-5">
        <div class="col-12 col-lg-6">
            @yield('content')
        </div>
        <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
            <div class="position-sticky" style="top: 100px">
                <div class="mb-5 sidebar">
                    <div id="search" class="mb-5">
                        <form action="" method="get">
                            <div class="d-flex search-box">
                                <input type="text"
                                       class="form-control flex-shrink-1 me-2 search-input"
                                       placeholder="Search Anything"
                                       name="searchKey" value="{{request()->searchKey}}" required>
                                <button class="btn btn-primary search-btn">
                                    <i class="feather-search d-block d-xl-none"></i>
                                    <span
                                        class="d-none d-xl-block">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="category">
                        <h4 class="fw-bolder">Category Lists</h4>
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{route('baseOnCategory',$category->id)}}" class="{{route('baseOnCategory',$category->id) == request()->url() ? 'active':''}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @yield('paginate')
                </div>
                <div class="d-none d-lg-block">

                </div>
            </div>
        </div>
        <div class="col-12 border-bottom mb-0 mt-3">

        </div>
        <div class="col-12">
            <div class="container">
                <div
                    class="d-flex justify-content-between align-items-center my-4">
                    <div class="text-center">
                        Copyright © {{date('Y')}} {{\App\Base::$name}}
                    </div>
                    <a href="#themeHeaderSpacer" class="btn btn-primary">
                        <i class="feather-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
