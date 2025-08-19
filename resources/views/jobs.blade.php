<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[10vh]'>
            <h1 class='text-4xl text-gray-100'>Список вакансии</h1>
        </div>

        <div class='grow'>
            <ul class="grid grid-cols-3 gap-4">
                @foreach ($jobs as $job)
                    <li
                        class="bg-slate-700 text-gray-300 p-4 border-2 border-gray-400 rounded-lg shadow-lg hover:bg-gray-800 transition-color duration-150 hover:border-orange-300 hover:shadow-xl">
                        <a href="/jobs/{{ $job['id'] }}">
                            <div class='flex flex-col'>
                                <h1 class='text-gray-100 font-medium text-2xl'>
                                    {{ mb_ucfirst($job['title']) }}
                                </h1>

                                <span class='text-xl'>
                                    от - {{ $job['salary'] }} ₽ за месяц.
                                </span>

                                <span class='mt-2 text-orange-300'>
                                    {{ $job->employer->name }}
                                </span>
                            </div>

                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="h-[8vh]">
            {{ $jobs->links() }}
        </div>
    </x-slot:page_content>

</x-layout>
