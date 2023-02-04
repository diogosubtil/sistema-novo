<x-layout>
    @slot('stylesheet')
    @endslot
    @slot('slot')
    <div class="row">
        @if(Auth::user()->email_verified_at == null)
            <div class="col-lg-12 col-12">
                <div class="p-4 card bg-white">
                    <section>
                        <header>
                            <h5>
                                Verificação de e-mail
                            </h5>

                            <p class="text-sm mt-1 text-danger">
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
            <div class="p-4 card bg-white">
                <section>
                    <header>
                        <h5>
                            Informação do Perfil
                        </h5>

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
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-user"></i>
                                </span>
                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autocomplete="name" >
                            </div>
                            <span class="form-bar">
                                @if ($errors->get('name'))
                                    <ul class="text-danger">
                                        @foreach ((array) $errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="email">Email</label>
                            @if(Auth::user()->email_verified_at == null) <b class="text-sm text-danger">"E-mail não verificado"</b>@endif
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @
                                </span>
                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="email" >
                            </div>
                            <span class="form-bar">
                                @if ($errors->get('email'))
                                    <ul class="text-danger">
                                        @foreach ((array) $errors->get('email') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">SALVAR</button>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="p-4 card bg-white">
                <section>
                    <header>
                        <h5>
                            Atualizar a senha
                        </h5>

                        <p class="mt-1 text-sm text-gray">
                            Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.
                        </p>
                    </header>
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div>
                            <label for="current_password">Senha Atual</label>
                            <div class="input-group ">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-lock"></i>
                                </span>
                                <input id="current_password" name="current_password" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('current_password'))
                                    <ul class="text-danger">
                                        @foreach ((array) $errors->updatePassword->get('current_password') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="password">Nova Senha</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-lock"></i>
                                </span>
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('password'))
                                    <ul class="text-danger">
                                        @foreach ((array) $errors->updatePassword->get('password') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div>
                            <label for="password_confirmation">Confirmação de senha</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icofont icofont-lock"></i>
                                </span>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                            </div>
                            <span class="form-bar">
                                @if ($errors->updatePassword->get('password_confirmation'))
                                    <ul class="text-danger">
                                        @foreach ((array) $errors->updatePassword->get('password_confirmation') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">SALVAR</button>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>
    @endslot
    @slot('scripts')
    @endslot
</x-layout>
