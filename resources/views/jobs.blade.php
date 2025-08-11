<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[4rem]'>
            <h1 class='text-4xl text-gray-300'>Список вакансии</h1>
        </div>

        <ul>
            @foreach ($jobs as $job)
                <li
                    class="text-lg text-gray-300 font-medium mt-2 hover:underline hover:text-blue-400">
                    <a href="/jobs/{{ $job['id'] }}">
                        <p>{{ mb_ucfirst($job['title']) }} : ЗП -
                            {{ $job['salary'] }} т.р.</p>
                    </a>

                </li>
            @endforeach
        </ul>
    </x-slot:page_content>

</x-layout>
