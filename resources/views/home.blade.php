@extends('layouts.master')
@section("content")
    @auth
        <p>Добро пожаловать <b>{{ Auth::user()->name }}</b></p>
        <a class="btn btn-danger" href="{{ route('signout') }}">Выйти</a>
    @endauth
    @guest
        <a class="btn btn-primary" href="{{ route('login') }}">Войти</a>
        <a class="btn btn-info" href="{{ route('register') }}">Регистрация</a>
    @endguest
@endsection
