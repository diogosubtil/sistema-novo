<x-layout>
    <div class="row">
        @if(Auth::user()->email_verified_at == null)
            <div class="col-lg-12 col-12">
                <div class="p-4 small-box bg-white">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Verificação de e-mail') }}
                            </h2>

                            <p class="mt-1 text-sm text-red-600">
                                {{ __('Clique no botão abaixo para enviar o email de verificação.') }}
                            </p>
                        </header>

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-primary-button>
                                        {{ __('Enviar e-mail de verificação.') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </section>

                </div>
            </div>
        @endif

        <div class="col-lg-6 col-12">
            <div class="p-4 small-box bg-white">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Informação do Perfil
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Atualize as informações do perfil da sua conta e o endereço de e-mail.
                        </p>

                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            @if(Auth::user()->email_verified_at == null)<b class="text-red-600">E-mail não verificado! </b> @endif
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="p-4 small-box bg-white">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('New Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </section>

            </div>
        </div>

{{--        <div class="col-lg-12 col-12">--}}
{{--            <div class="p-4 small-box bg-white">--}}
{{--                <section class="space-y-6">--}}
{{--                    <header>--}}
{{--                        <h2 class="text-lg font-medium text-gray-900">--}}
{{--                            {{ __('Desativar Conta') }}--}}
{{--                        </h2>--}}

{{--                        <p class="mt-1 text-sm text-gray-600">--}}
{{--                            {{ __('Depois que sua conta for desativada, somente a administração pode reativa-la.') }}--}}
{{--                        </p>--}}
{{--                    </header>--}}

{{--                    <x-danger-button--}}
{{--                        x-data=""--}}
{{--                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"--}}
{{--                    >{{ __('Desativar Conta') }}</x-danger-button>--}}

{{--                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>--}}
{{--                        <form method="post" action="{{ route('profile.disable') }}" class="p-6">--}}
{{--                            @csrf--}}
{{--                            @method('patch')--}}

{{--                            <h2 class="text-lg font-medium text-gray-900">--}}
{{--                                {{ __('Você tem certeza que deseja desativar sua conta?') }}--}}
{{--                            </h2>--}}

{{--                            <p class="mt-1 text-sm text-gray-600">--}}
{{--                                {{ __('Ao desativar sua conta somente a administração podera reativa-la, digite sua senha para confirmar.') }}--}}
{{--                            </p>--}}

{{--                            <div class="mt-6">--}}
{{--                                <x-input-label for="password" value="Password" class="sr-only" />--}}

{{--                                <x-text-input--}}
{{--                                    id="password"--}}
{{--                                    name="password"--}}
{{--                                    type="password"--}}
{{--                                    class="mt-1 block w-3/4"--}}
{{--                                    placeholder="Senha"--}}
{{--                                />--}}

{{--                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />--}}
{{--                            </div>--}}

{{--                            <div class="mt-6 flex justify-end">--}}
{{--                                <x-secondary-button x-on:click="$dispatch('close')">--}}
{{--                                    {{ __('Cancel') }}--}}
{{--                                </x-secondary-button>--}}

{{--                                <x-danger-button class="ml-3">--}}
{{--                                    {{ __('Desativar conta') }}--}}
{{--                                </x-danger-button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </x-modal>--}}
{{--                </section>--}}

{{--            </div>--}}
{{--        </div>--}}
    </div>
</x-layout>
