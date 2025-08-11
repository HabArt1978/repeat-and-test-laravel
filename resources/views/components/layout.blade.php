<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Доска задач</title>

    @vite('resources/css/app.css')
</head>

<body class='w-full h-full bg-gray-700'>
    <main>
        <header class='w-full bg-gray-800'>
            <nav class='py-4'>
                <ul class='flex justify-center text-white gap-x-8'>
                    <li><x-nav-link href="/" :active="request()->is('/')">Главная</x-nav-link></li>
                    <li><x-nav-link href="/about" :active="request()->is('about')">О нас</x-nav-link></li>
                    <li><x-nav-link href="/contacts" :active="request()->is('contacts')">Контакты</x-nav-link></li>
                    <li><x-nav-link href="/jobs" :active="request()->is('jobs')">Вакансии</x-nav-link></li>
                </ul>
            </nav>
        </header>

        <section class="w-[80vw] mx-auto">
            {{ $page_content }}
        </section>
    </main>
</body>

</html>
