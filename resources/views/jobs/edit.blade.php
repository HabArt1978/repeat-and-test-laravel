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

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for='job_title'
                                       class="block text-sm/6 font-medium text-gray-300 tracking-wide">
                                    Название вакансии
                                </label>

                                <div class="mt-2">
                                    <div
                                         class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                        <input id='job_title'
                                               type='text'
                                               name='job_title'
                                               placeholder="Гладиатор"
                                               class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 rounded-md placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                               value="{{ $job->title }}"
                                               required />
                                    </div>

                                    @error('job_title')
                                        <p class='text-red-600 text-xs mt-1'>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="salary"
                                       class="block text-sm/6 font-medium text-gray-300 tracking-wide">
                                    Заработная плата
                                </label>
                                <div class="mt-2">
                                    <div
                                         class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                        <input id="salary"
                                               type="text"
                                               name="salary"
                                               placeholder="50000"
                                               class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                               value="{{ $job->salary }}"
                                               required />
                                    </div>

                                    @error('salary')
                                        <p class='text-red-600 text-xs mt-1'>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div class="flex gap-2">
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 uppercase tracking-wider">редактировать</button>
                        <a href="/jobs/{{ $job->id }}"
                           class="rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 uppercase tracking-wider">отменить</a>
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
