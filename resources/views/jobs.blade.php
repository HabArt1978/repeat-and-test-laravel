<x-layout>

    <x-slot:page_content>
        <div class='flex justify-center items-center h-[4rem]'>
            <h1 class='text-4xl text-gray-100'>Список вакансии</h1>
        </div>

        <div class='flex-1 flex justify-center items-start mt-6'>
            <ul class="flex flex-wrap gap-4 justify-center">
                @foreach ($jobs as $job)
                    <li
                        class="w-[32%] bg-slate-700 text-gray-300 p-4 border-2 border-gray-400 rounded-lg shadow-lg hover:bg-gray-800 transition-color duration-150 hover:border-orange-300 hover:shadow-xl">
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

        <div>
            {{ $jobs->links() }}
        </div>
    </x-slot:page_content>

</x-layout>
