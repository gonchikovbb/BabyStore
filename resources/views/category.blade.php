@extends('layouts.master')
@section("content")
    <div class="custom-category">
        <div class="trending-wrapper">
            <h3>Категории</h3>
            @foreach($categories as $item)
                <div class="trening-item">
                    <a href="categories/{{$item['id']}}">
                        <img class="trending-image" src="{{$item['gallery']}}">
                        <div class="">
                            <h3>{{$item['name']}}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
