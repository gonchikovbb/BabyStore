@extends('layouts.master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Избранное</h4>
                @foreach($carts as $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-4">
                            <div class="">
                                <h3>{{$item['name']}}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
