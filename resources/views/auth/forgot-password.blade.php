<x-guest-layout>
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div style="width: 100%;height: 100%;display: flex" class="text-center mb-5 col-12 d-flex justify-content-center">
                            <div>
                                <img src="{{ asset(Helper::settings()->logo) }}" alt="logo.png">
                            </div>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <p class="text-inverse text-center m-b-0">Esqueceu sua senha? Sem problemas. </p>
                                        <b class="text-inverse text-left">
                                                Apenas informe seu endereço de e-mail que enviaremos um link que permitirá definir uma nova senha.
                                        </b>
                                    </div>
                                </div>
                                @if (Session::has('status'))
                                    <div class="text-sm text-success space-y-1 text-center">{{ Session::get('status') }}</div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary" id="basic-addon1">@</span>
                                        <input type="text" name="email" class="form-control" placeholder="E-mail" required>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                            Resetar Senha
                                        </button>
                                    </div>
                                </div>
                                <div class="text-right f-right">
                                    <a href="{{ route('login') }}" class="text-right f-w-600 text-primary">Voltar ao Login.</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</x-guest-layout>
