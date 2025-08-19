<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[4rem]'>
            <h1 class='text-4xl text-gray-300'>Вакансия - {{ $job['title'] }}</h1>
        </div>

        <p class='text-lg font-medium text-gray-300'>Вакансия № {{ $job['id'] }}</p>

        <p class='text-xl font-medium mt-2 text-gray-300'>
            - {{ mb_ucfirst($job['title']) }} : {{ $job['salary'] }} т.р.
        </p>

        <div class='w-full h-2 border-b-2 mt-2 text-gray-800' />

        <div
             class="text-gray-300 mt-6 inline-block border-2 border-blue-700 px-2 rounded-lg hover:bg-blue-700 hover:text-white transition-colors duration-200 font-medium">
            <a href="/jobs" class='uppercase
           tracking-wider'>К списку вакансий</a>
        </div>
    </x-slot:page_content>

</x-layout>
