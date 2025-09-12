    <x-layout>

        <x-slot:page_content>
            <x-page-container>
                <x-header-page>Вход в систему</x-header-page>

                <form class="mt-6"
                      method='POST'
                      action='/login'>

                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-100/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-100 tracking-wider">
                                Вход пользователя в систему
                            </h2>
                            <p class="mt-1 text-sm/6 text-gray-300 tracking-wide">
                                Заполните поля в соответствии с требованиями аутентификации
                                пользователя.
                            </p>

                            <div class='flex flex-col w-1/2 gap-6 mt-10'>

                                <x-form.field>
                                    <x-form.label for='email'>
                                        Электронная почта
                                    </x-form.label>
                                    <x-form.input id='email'
                                                  name='email'
                                                  type='email'
                                                  placeholder="example@email.com"
                                                  required
                                                  :value="old('email')" />
                                    <x-form.error name='email' />
                                </x-form.field>

                                <x-form.field>
                                    <x-form.label for='password'>
                                        Пароль
                                    </x-form.label>
                                    <x-form.input id='password'
                                                  name='password'
                                                  type='password'
                                                  placeholder="********"
                                                  required />
                                    <x-form.error name='password' />
                                </x-form.field>

                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between gap-x-6">
                        <div class="flex gap-2">
                            <button type="submit"
                                    class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 uppercase tracking-wider">войти</button>
                            <a href="/"
                               class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 uppercase tracking-wider">отменить</a>
                        </div>
                    </div>
                </form>
            </x-page-container>
        </x-slot:page_content>

    </x-layout>
