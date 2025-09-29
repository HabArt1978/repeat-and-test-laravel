<x-mail>
    <div>
        <h2 class="text-2xl">Вакансия: {{ $job->title }}</h2>

        <p class="font-black">Отлично! Ваша вакансия "{{ $job->title }}" размещена на нашем сайте.
        </p>

        <p>
            <a class="text-blue-900" href="{{ url('/jobs/' . $job->id) }}">Посмотреть вакансию</a>
        </p>
    </div>
</x-mail>
