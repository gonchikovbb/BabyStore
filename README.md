 <h1 align="center">Интернет магазин детских товаров BabyStore</h1>
  <p> Этот проект реализован с помощью PHP 8.0 , фреймворка Laravel, PostgreSql и Nginx.
 <h2>Описание:</h2>
  <p> Это магазин, в котором можно зарегистрировать, аутентифицироваться, посмотреть популярные категории, посмотреть все товары, посмотреть какие есть категории товаров, произвести поиск товаров и категории товаров,добавить товар в избранное, оставить отзыв о товаре с загрузкой до 3 фотографии, так же можно посмотреть отзывы товара.</p>

<h2>Функционал сервиса:</h2>
<ul>

- Регистрация пользователя
- Аутентификация пользователя
- Просмотр всех товаров
- Добавление товара в избранное
- Просмотр что добавлено в избранное
- Просмотр категории товаров
- Просмотр популярных категории товаров
- Просмотр отзывов товара
- Добавление отзыва с загрузкой до 3х фотографии
- Поиск товара и категории товаров

</ul>

<h2>API:</h2>
<ul>

- GET / - Главная страница
- GET /login - Страница аутентификации пользователя
- POST /login - Отправка данных пользователя для аутентификации
- GET /registration - Страница регистрации пользователя
- POST /registration - Отправка данных пользователя для регистрации
- GET /signout - Выход пользователя из личного кабинета
---
- GET /products - Просмотр всех товаров
- GET /categories - Просмотр категории товаров
- GET /categories/{category_id} - Просмотр товаров по категории
- GET /popular_categories - Просмотр популярных категории товаров, с количеством отзывов (Категории у которых больше 3х отзывов считаются популярными)
- GET /search - Поиск товаров и категории
- POST /review/{product_id} - Просмотр отзывов
---
- POST /add_to_favorites - Добавление товара в избранное
- GET /favorites - Просмотр, что добавлено в избранное
- GET /remove_from_favorites/{id} - Удаление товаров из избранного
- POST /save_to_review/{product_id} - Добавление отзыва к товару с загрузкой до 3х фотографии

</ul>


<h2>Чтобы запустить проект, выполните:</h2>

Поднять проект:

```make dev-up```
