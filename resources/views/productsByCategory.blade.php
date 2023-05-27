@extends('layouts.master')
@section("content")
<div class="custom-product">
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h2 align="center" >{{$category['name']}} </h2>
            @foreach($products as $item)
            <div class="searched-item">
                {{--                            <img class="trending-image" src="{{$item['image']}}">--}}
                <div class="">
                    <h4>{{$item['name']}}</h4>
                </div>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$item['id']}}>
                    <button class="btn btn-primary">Добавить в избранное</button>
                </form>
                <form action="/review/{{$item['id']}}" method="GET">
                    <button class="btn btn-primary">Добавить отзыв</button>
                </form>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
