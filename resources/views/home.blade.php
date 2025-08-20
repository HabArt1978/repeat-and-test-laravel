<x-layout>

    <x-slot:page_content>
        <x-page-container>
            <x-header-page>
                Страница баннер
            </x-header-page>

            <p class='text-xl text-center mt-14 text-gray-300'>
                {{ $greeting }}, меня зовут {{ $name }}!!!
            </p>
        </x-page-container>
    </x-slot:page_content>

</x-layout>
