@extends('layouts.master')
@section("content")
    <div class="custom-category">
        <div class="trending-wrapper">
            <h3>Популярные категории</h3>
            <div id="if"></div>
            @if (empty($popularCategories))
                <h3>Отзывов нет</h3>
            @else
                <table class="table table-striped">
                    <tbody>
                    @foreach($popularCategories as $popularCategory)
                        <tr>
                            <a href="categories/{{$popularCategory['id']}}">
                                <div class="">
                                    <h3>{{$popularCategory['name']}}</h3>
                                </div>
                            </a>
                            <div>
                                <h3>Отзывов: {{count($popularCategory['popular'])}}</h3>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    </div>
@endsection
