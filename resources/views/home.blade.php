<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[4rem]'>
            <h1 class='text-4xl '>Страница баннер</h1>
        </div>

        <p class='text-xl'>
            {{ $greeting }}, меня зовут {{ $name }}!!!
        </p>
    </x-slot:page_content>

</x-layout>
