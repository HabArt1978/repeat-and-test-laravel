## Создание проекта

```sh

laravel new repeat-and-test-laravel
php artisan sail:install
sail up -d
sail artisan migrate
sail npm install
sail down
sail up -d
sail npm run dev

```

## Создание модели

```sh
sail artisan make:model Job
```

## Миграция DB

```sh
sail artisan
sail artisan migrate
sail artisan migrate:fresh
```

# Создать таблицу в базе данных

```sh
sail artisan make:migration
```

-   после чего в прописываем имя миграции ( create_job_listings_table )
-   для добавления данной таблицы в базу данных ( sail artisan migrate )
