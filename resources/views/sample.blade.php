@extends('layouts.app')

@section("title") Sample @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="">sample</a></li>
        <li class="breadcrumb-item active" aria-current="page">sample</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-heart"></i>
                        Hello Sample
                    </h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id in itaque maiores maxime minima nemo nihil nobis porro, ratione sit, voluptas. A consequuntur magni maxime porro quas repudiandae veritatis!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
