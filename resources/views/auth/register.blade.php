    <x-layout>

        <x-slot:page_content>
            <x-page-container>
                <x-header-page>Регистрация</x-header-page>

                <form class="mt-6"
                      method='POST'
                      action='/register'>

                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-100/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-100 tracking-wider">
                                Регистрация нового пользователя
                            </h2>
                            <p class="mt-1 text-sm/6 text-gray-300 tracking-wide">
                                Заполните поля в соответствии с требованиями регистрации.
                            </p>

                            <div class='flex flex-col w-1/2 gap-6 mt-10'>
                                <x-form.field>
                                    <x-form.label for='first_name'>
                                        Имя
                                    </x-form.label>
                                    <x-form.input id='first_name'
                                                  name='first_name'
                                                  placeholder="Иван"
                                                  required />

                                    <x-form.error name='first_name' />
                                </x-form.field>

                                <x-form.field>
                                    <x-form.label for='last_name'>
                                        Фамилия
                                    </x-form.label>
                                    <x-form.input id='last_name'
                                                  name='last_name'
                                                  placeholder="Петров"
                                                  required />
                                    <x-form.error name='last_name' />
                                </x-form.field>

                                <x-form.field>
                                    <x-form.label for='email'>
                                        Электронная почта
                                    </x-form.label>
                                    <x-form.input id='email'
                                                  name='email'
                                                  type='email'
                                                  placeholder="example@email.com"
                                                  required />
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

                                <x-form.field>
                                    <x-form.label for='password_confirmation'>
                                        Подтвердите пароль
                                    </x-form.label>
                                    <x-form.input id='password_confirmation'
                                                  name='password_confirmation'
                                                  type='password'
                                                  placeholder="********"
                                                  required />
                                    <x-form.error name='password_confirmation' />
                                </x-form.field>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between gap-x-6">
                        <div class="flex gap-2">
                            <x-form.button>зарегистрировать</x-form.button>
                            <x-form.link href="/">отменить</x-form.link>
                        </div>
                    </div>
                </form>
            </x-page-container>
        </x-slot:page_content>

    </x-layout>
