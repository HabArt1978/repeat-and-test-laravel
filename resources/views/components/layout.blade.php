<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Доска задач</title>

    @vite('resources/css/app.css')
</head>

<body class='w-screen h-screen bg-gray-700'>
    <main>
        <header class='w-full h-[6vh] bg-gray-800 flex items-center justify-center'>
            <ul class='flex text-white gap-x-8'>
                <li><x-nav-link href="/" :active="request()->is('/')">Главная</x-nav-link></li>
                <li><x-nav-link href="/about" :active="request()->is('about')">О нас</x-nav-link></li>
                <li><x-nav-link href="/contacts" :active="request()->is('contacts')">Контакты</x-nav-link></li>
                <li><x-nav-link href="/jobs" :active="request()->is('jobs')">Вакансии</x-nav-link></li>
            </ul>
        </header>

        {{ $page_content }}

    </main>
</body>

</html>
