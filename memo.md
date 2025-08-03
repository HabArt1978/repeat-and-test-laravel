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

## ORM Eloquent

-   all();
-   find();

```sh
 sail artisan tinker

> App\Models\Job::create(['title' => 'Разработчик на JavaScript', 'salary' => '90,000']);

   Illuminate\Database\Eloquent\MassAssignmentException  Add [title] to fillable property to allow mass assignment on [App\Models\Job].
```

-   важно!!! Защита от массового присваивания ( fillable property ) // После предупреждения перезапустить tinker

## Проверить, поддерживает ли контейнер Sail нужные локали !!!

-   Если вы используете Laravel Sail (Docker), локаль должна быть настроена внутри контейнера,
-   иначе кириллица не будет отображаться корректно в tinker.

## Связывание id ( Jobs / Employers ),

```sh
sail artisan tinker
Psy Shell v0.12.9 (PHP 8.4.10 — cli) by Justin Hileman
> App\Models\Employer::factory(10)->create()->each(fn($employer)=>\App\Models\Job::factory(10)->create(['employer_id' => $employer->id]));
```
