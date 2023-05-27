@extends('layouts.master')
@section('content')
    <div class="bg-light p-5 rounded">
        @include('layouts.partials.messages')
        <table class="table table-striped">
            <h3>Отзывы:</h3>
            <thead>
            <tr>
                <th scope="col">Пользователь</th>
                <th scope="col">Текст</th>
                <th scope="col">Фотографии</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td width="3%">{{ $review->name }}</td>
                    <td>{{ $review->text }}</td>
                    <td>
                        @isset ($review->image_path)
                            <img class="img-fluid" src="{{ asset('/storage/' . $review->image_path) }}" alt="">
                        @endisset
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <form action="/save_to_review/{{$product_id}}" method="post" enctype="multipart/form-data">
        @include('layouts.partials.messages')
        @csrf
        <h3>Добавить отзыв</h3>
        <div class="form-group mb-3">
            <input type="text" placeholder="Текст" id="text" class="form-control" name="text">
            @if ($errors->has('text'))
                <span class="text-danger">{{ $errors->first('text') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-1">
                <input type="file" name="images[]"/>
                <input type="file" name="images[]"/>
                <input type="file" name="images[]"/>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
