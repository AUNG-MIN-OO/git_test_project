@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-home"></i>
                    {{ __('You are logged in!') }}
                    <button class="test btn btn-primary">test</button>

                        <br>
                    {{ \Illuminate\Support\Facades\Request::url() }}
                        <br>
                        <br>
                    {{route('article.index',['page'=>3])}}
                        <br>
                        <br>
                    {{Base::$name}}
                    {{Base::$description}}

                    {{env("APP_NAME")}}
                    {{env("APP_ENV")}}
                        <br>
                    {{date('Y-m-d h:i:s')}}
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
    <script>
        $(".test").click(function (){
            alert("hello");
        })
    </script>
@endsection
