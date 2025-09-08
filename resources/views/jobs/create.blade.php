<x-layout>

    <x-slot:page_content>
        <x-page-container>
            <x-header-page>Создание вакансии</x-header-page>

            <form class="mt-6"
                  method='POST'
                  action='/jobs'>

                @csrf

                <div class="space-y-12">
                    <div class="border-b border-gray-100/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-100 tracking-wider">
                            Создать новую вакансию
                        </h2>

                        <p class="mt-1 text-sm/6 text-gray-300 tracking-wide">
                            Нам просто нужно немного подробностей от вас.
                        </p>

                        <div class='flex flex-col w-1/2 gap-6 mt-10'>
                            <x-form.field>
                                <x-form.label for='job_title'>
                                    Название вакансии
                                </x-form.label>
                                <x-form.input id='job_title'
                                              name='job_title'
                                              placeholder="Гладиатор"
                                              required />

                                <x-form.error name='job_title' />
                            </x-form.field>

                            <x-form.field>
                                <x-form.label for='salary'>
                                    Заработная плата
                                </x-form.label>
                                <x-form.input id='salary'
                                              name='salary'
                                              placeholder="50000"
                                              required />

                                <x-form.error name='salary' />
                            </x-form.field>
                        </div>

                    </div>
                </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href='/jobs'
                       class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 uppercase tracking-wider">отменить</a>
                    <x-form.button>добавить</x-form.button>
                </div>
            </form>
        </x-page-container>
    </x-slot:page_content>

</x-layout>
