<x-layout>

    <x-slot:page_content>
        <x-page-container>
            <x-header-page>Редактирование вакансии : {{ $job->title }}</x-header-page>

            <form class="mt-6"
                  method='POST'
                  action='/jobs/{{ $job->id }}'>

                @csrf
                @method('PATCH')

                <div class="space-y-12">
                    <div class="border-b border-gray-100/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-100 tracking-wider">
                            Редактировать вакансию
                        </h2>
                        <p class="mt-1 text-sm/6 text-gray-300 tracking-wide">
                            Измените данные в полях формы.
                        </p>

                        <div class='flex flex-col w-1/2 gap-6 mt-10'>
                            <x-form.field>
                                <x-form.label for='job_title'>
                                    Название вакансии
                                </x-form.label>
                                <x-form.input id='job_title'
                                              name='job_title'
                                              placeholder="Гладиатор"
                                              required
                                              value="{{ $job->title }}" />

                                <x-form.error name='job_title' />
                            </x-form.field>

                            <x-form.field>
                                <x-form.label for='salary'>
                                    Заработная плата
                                </x-form.label>
                                <x-form.input id='salary'
                                              name='salary'
                                              placeholder="50000"
                                              required
                                              value="{{ $job->salary }}" />
                                <x-form.error name='salary' />
                            </x-form.field>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div class="flex gap-2">
                        <x-form.button>редактировать</x-form.button>
                        <x-form.link href="/jobs/{{ $job->id }}">
                            отменить
                        </x-form.link>
                    </div>

                    <button type="submit"
                            class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 uppercase tracking-wider"
                            form='delete-job'>
                        удалить
                    </button>
                </div>
            </form>

            <form action="/jobs/{{ $job->id }}"
                  method='POST'
                  class='hidden'
                  id='delete-job'>
                @csrf
                @method('DELETE');
            </form>
        </x-page-container>
    </x-slot:page_content>

</x-layout>
