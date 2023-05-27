@extends('layouts.master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h4>Результаты поиска</h4>
                @foreach($products as $item)
                    <div class="searched-item">
{{--                            <img class="trending-image" src="{{$item['image']}}">--}}
                            <div class="">
                                <h2>{{$item['name']}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach($categories as $item)
                    <div class="searched-item">
                        <a href="categories/{{$item['id']}}">
                            {{--                            <img class="trending-image" src="{{$item['image']}}">--}}
                            <div class="">
                                <h2>{{$item['name']}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
