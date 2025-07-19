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
