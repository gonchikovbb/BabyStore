<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
    $total= ProductController::cartItem();
}

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand">Детский магазин</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form action="/search" class="navbar-form navbar">
                <div class="form-group">
                    <input type="text" name="query" class="form-control search-box" placeholder="Поиск">
                </div>
                <button type="submit" class="btn btn-default">Поиск</button>
            </form>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/">Главная страница</a></li>
                <li><a href="{{ route('products') }}">Все товары</a></li>
                <li><a href="{{ route('categories') }}">Категории</a></li>
                <li><a href="{{ route('popular.categories') }}">Популярные категории</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/favorites">Избранное</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Выйти</a>
                    </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
