<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Доска задач</title>

    @vite('resources/css/app.css')
</head>

<body>
    <main class='w-full h-[100vh] bg-gray-100'>
        <header class='w-full bg-gray-800'>
            <nav class='w-full py-4'>
                <ul class='flex justify-center text-white gap-x-8'>
                    <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
                    <li><x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link></li>
                    <li><x-nav-link href="/contacts" :active="request()->is('contacts')">Contacts</x-nav-link></li>
                </ul>
            </nav>
        </header>

        <section class="w-[80vw] h-full mx-auto">
            {{ $header_title }}
        </section>
    </main>
</body>

</html>
