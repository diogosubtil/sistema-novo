<x-guest-layout>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                        <div style="width: 100%;height: 100%;display: flex" class="text-center col-12 d-flex justify-content-center">
                            <div class="col-4">
                                <img src="{{ asset(Helper::settings()->logo) }}" alt="logo.png">
                            </div>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20 d-flex justify-content-center">
                                    @csrf
                                    @if (Session::has('message'))
                                        <div class="text-danger">{{ Session::get('message') }}</div>
                                    @endif
                                    @if (Session::has('status'))
                                        <div class="text-success">{{ Session::get('status') }}</div>
                                    @endif
                                </div>
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
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary" id="basic-addon1">
                                            <i class="icofont icofont-lock"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control" placeholder="Senha" required>
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('password'))
                                            <ul class="text-danger">
                                                @foreach ((array) $errors->get('password') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check"></i>
                                                </span>
                                                <span class="text-inverse">Manter conectado</span>
                                            </label>
                                        </div>
                                        <div class="text-right f-right">
                                            <a href="{{ route('password.request') }}" class="text-right f-w-600 text-primary"> Esqueceu sua senha? </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            Entrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
