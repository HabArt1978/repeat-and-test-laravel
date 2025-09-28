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
sail artisan list
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

-   создание 10 вакансий для каждого из 10 работодателей

```sh
sail artisan tinker
Psy Shell v0.12.9 (PHP 8.4.10 — cli) by Justin Hileman
> App\Models\Employer::factory(10)->create()->each(fn($employer)=>\App\Models\Job::factory(10)->create(['employer_id' => $employer->id]));
```

-   создание новой записи в сводной таблице job_tag

```sh
sail artisan tinker
Psy Shell v0.12.9 (PHP 8.4.10 — cli) by Justin Hileman

> $tag = App\Models\Tag::find(1);
= App\Models\Tag {#6208
    id: 1,
    name: "<D0><91><D0><B5><D0><B7> <D0><BE><D0><BF><D1><8B><D1><82><D0><B0>",
    created_at: null,
    updated_at: null,
  }

> $tag->jobs
= Illuminate\Database\Eloquent\Collection {#5244
    all: [
      App\Models\Job {#5226
        id: 29,
        employer_id: 10,
        title: "<D0><A2><D0><B5><D1><85><D0><BD><D0><B8><D1><87><D0><B5><D1><81><D0><BA><D0><B8><D0><B9> <D0><BF><D0><B8><D1><81><D0><B0><D1><82><D0><B5><D0><BB><D1><8C>",
        salary: "38 055",
        created_at: "2025-08-07 21:48:43",
        updated_at: "2025-08-07 21:48:43",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#1323
          tag_id: 1,
          job_listing_id: 29,
        },
      },
    ],
  }

> $tag->jobs()->attach(App\Models\Job::find(7))

> $tag->jobs
= Illuminate\Database\Eloquent\Collection {#5244
    all: [
      App\Models\Job {#5225
        id: 7,
        employer_id: 3,
        title: "<D0><9A><D1><80><D0><B8><D1><82><D0><B8><D0><BA>",
        salary: "44 048",
        created_at: "2025-08-07 21:48:43",
        updated_at: "2025-08-07 21:48:43",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#1323
          tag_id: 1,
          job_listing_id: 7,
        },
      },
      App\Models\Job {#5227
        id: 29,
        employer_id: 10,
        title: "<D0><A2><D0><B5><D1><85><D0><BD><D0><B8><D1><87><D0><B5><D1><81><D0><BA><D0><B8><D0><B9> <D0><BF><D0><B8><D1><81><D0><B0><D1><82><D0><B5><D0><BB><D1><8C>",
        salary: "38 055",

```

## Публикация пакета laravel-pagination

```sh
sail artisan vendor:publish

 ┌ Which provider or tag's files would you like to publish? ────┐
 │ Tag: laravel-pagination                                      │
 └──────────────────────────────────────────────────────────────┘

   INFO  Publishing [laravel-pagination] assets.

  Copying directory [vendor/laravel/framework/src/Illuminate/Pagination/resources/views] to [resources/views/vendor/pagination] ............... DONE
```

## Seeders

```sh
sail artisan db:seed
sail artisan migrate:fresh --seed
sail artisan make:seeder
sail artisan db:seed --class=UserSeeder
```

## Переключение локали (Русификация).

-   Laravel сам по себе идёт только с английским. Для русского можно использовать пакет локализации:

```sh
composer require laravel-lang/common --dev
sail artisan lang:add ru
```

-   Установить локаль по умолчанию, в файле config/app.php найди параметр:

```sh
'locale' => env('APP_LOCALE', 'ru'),
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
'faker_locale' => env('APP_FAKER_LOCALE', 'ru_RU'),
```

-   Очистить кеш конфигурации и переводов, чтобы изменения подтянулись:

```sh
sail artisan config:clear
sail artisan cache:clear
```

## Локальная отправка Email

### Локальный SMTP сервер для перехвата писем

Можно воспользоваться программой [Mailpit](https://mailpit.axllent.org/docs/install/docker/)
Конфигурация по умолчанию указана в .env.example, конфигурация по умолчанию уже добавлена в docker.compose.yml (сервис mailpit).

По умолчанию веб-интерфейс Mailpit доступен на http://localhost:8025.

### Класс письма Laravel

Для отправки письма нужен Mailable класс и blade шаблон, команда для создания:

```sh
sail artisan make:mail --view <emailable_class_name>
```

### Artisan команда для тестовой отправки письма

Для того чтобы не писать тестовый эндпоинт, можно создать [консольную команду](https://laravel.com/docs/12.x/artisan#writing-commands) к которой не будет доступа у пользователя сайта. Создать можно так:

```sh
sail artisan make:command <command_class_name>
```
