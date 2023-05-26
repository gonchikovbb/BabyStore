@extends('layouts.master')
@section("content")
    <div class="custom-category">
        <div class="trending-wrapper">
            <h3>Популярные категории</h3>
            @foreach($categories as $item)
                <div class="trening-item">
                    <a href="detail/{{$item['id']}}">
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
