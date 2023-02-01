<x-layout>
    <div class="row">
        @if(Auth::user()->email_verified_at == null)
            <div class="col-lg-12 col-12">
                <div class="p-4 small-box bg-white">
                    <section>
                        <header>
                            <h5 class="text-lg text-gray">
                                Verificação de e-mail
                            </h5>

                            <p class="text-sm mt-1 text-red">
                                Clique no botão abaixo para enviar o email de verificação.
                            </p>
                        </header>

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button style="text-transform: none" type="submit" class="btn bg-primary b-radius-5">Enviar e-mail de verificação</button>
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
                            <label for="name">Nome</label>
                            <div class="input-group input-group-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                </div>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" >
                            </div>
                            <span class="form-bar">
                                @if ($errors->get('name'))
                                    <ul class="text-red">
                                        @foreach ((array) $errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="email">Email</label>
                            @if(Auth::user()->email_verified_at == null) <b class="text-sm text-red">"E-mail não verificado"</b>@endif
                            <div class="input-group input-group-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        @
                                    </span>
                                </div>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autofocus autocomplete="email" >
                            </div>
                            <span class="form-bar">
                                @if ($errors->get('email'))
                                    <ul class="text-red">
                                        @foreach ((array) $errors->get('email') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Salvar</button>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="p-4 small-box bg-white">
                <section>
                    <header>
                        <h2 class="text-lg text-gray">
                            Atualizar a senha
                        </h2>

                        <p class="mt-1 text-sm text-gray">
                            Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.
                        </p>
                    </header>
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <label for="current_password">Senha Atual</label>
                            <div class="input-group input-group-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-lock"></i>
                                    </span>
                                </div>
                                <input id="current_password" name="current_password" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('current_password'))
                                    <ul class="text-red">
                                        @foreach ((array) $errors->updatePassword->get('current_password') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="password">Nova Senha</label>
                            <div class="input-group input-group-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-lock"></i>
                                    </span>
                                </div>
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('password'))
                                    <ul class="text-red">
                                        @foreach ((array) $errors->updatePassword->get('password') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="password_confirmation">Confirmação de senha</label>
                            <div class="input-group input-group-default">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-lock"></i>
                                    </span>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('password_confirmation'))
                                    <ul class="text-red">
                                        @foreach ((array) $errors->updatePassword->get('password_confirmation') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Salvar</button>
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
