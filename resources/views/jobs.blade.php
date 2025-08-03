<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[4rem]'>
            <h1 class='text-4xl '>Список вакансии</h1>
        </div>

        <ul>
            @foreach ($jobs as $job)
                <li
                    class="text-lg text-blue-800 font-medium mt-2 hover:underline hover:text-blue-600">
                    <a href="/jobs/{{ $job['id'] }}">
                        <p>{{ mb_ucfirst($job['title']) }} : ЗП -
                            {{ $job['salary'] }} т.р.</p>
                    </a>

                </li>
            @endforeach
        </ul>
    </x-slot:page_content>

</x-layout>
