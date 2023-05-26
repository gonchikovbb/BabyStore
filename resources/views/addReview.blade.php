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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <form action="/save_to_review" method="post" enctype="multipart/form-data">
        @include('layouts.partials.messages')
        @csrf
        <h3>Добавить отзыв</h3>
        <div class="form-group mb-3">
            <input type="text" placeholder="Текст" id="text" class="form-control" name="text"
                   required autofocus>
            @if ($errors->has('text'))
                <span class="text-danger">{{ $errors->first('text') }}</span>
            @endif
        </div>
        <div class="form-group mt-4">
            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
        </div>
        <div class="form-group mt-4">
            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
        </div>
        <div class="form-group mt-4">
            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Сохранить</button>
    </form>
@endsection
