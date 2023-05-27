@extends('layouts.master')
@section("content")
    <div class="custom-category">
        <div class="trending-wrapper">
            <h3>Товары</h3>
            @foreach($products as $item)
                <div class="form-group mb-3">
                    <div class="">
                        <h3>{{$item['name']}}</h3>
                    </div>
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value={{$item['id']}}>
                        <button class="btn btn-primary">Добавить в избранное</button>
                    </form>
                    <form action="/review/{{$item['id']}}" method="GET">
                        <button class="btn btn-primary">Добавить отзыв</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
