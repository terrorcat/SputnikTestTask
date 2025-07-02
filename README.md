# Как запустить шарманку

## Создание сборки в Композере
docker-compose up --build

## Проверка миграции
docker-compose exec app php artisan migrate

## Войти в БД вручную, если нужно
docker exec -it postgres-db psql -U laravel -d laravel

## Засеить БД тестовыми данными
docker-compose exec app php artisan db:seed

## Запуск тестов
docker-compose exec app php artisan test --testsuit=Unit

## Эндпоинты для проверки
http://localhost:8123/api/prices
http://localhost:8123/api/prices?currency=RUB (будет ошибка)
http://localhost:8123/api/prices?currency=EUR
http://localhost:8123/api/prices?currency=USD