@extends('layouts.master')
@section("content")
    <div class="custom-category">
        <div class="trending-wrapper">
            <h3>Популярные категории</h3>
            <div id="if"></div>
            @if (empty($countReviews))
                <h3>Отзывов нет</h3>
            @elseif (count($countReviews) === 1)
                <table class="table table-striped">
                    <h3>Количество отзывов:</h3>
                    <thead>
                    <tr>
                        <th scope="col">{{$countReviews[$top1Category[0]['name']]}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top1Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top1Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @elseif(count($countReviews) === 2)
                <table class="table table-striped">
                    <h3>Количество отзывов:</h3>
                    <thead>
                    <tr>
                        <th scope="col">{{$countReviews[$top1Category[0]['name']]}}</th>
                        <th scope="col">{{$countReviews[$top2Category[0]['name']]}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top1Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top1Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top2Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top2Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @else
            <table class="table table-striped">
                <h3>Количество отзывов:</h3>
                <thead>
                <tr>
                    <th scope="col">{{$countReviews[$top1Category[0]['name']]}}</th>
                    <th scope="col">{{$countReviews[$top2Category[0]['name']]}}</th>
                    <th scope="col">{{$countReviews[$top3Category[0]['name']]}}</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top1Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top1Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top2Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top2Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td width="3%">
                            <div class="trening-item">
                                <a href="categories/{{$top3Category[0]['id']}}">
                                    <div class="">
                                        <h3>{{$top3Category[0]['name']}}</h3>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
    </div>
@endsection
