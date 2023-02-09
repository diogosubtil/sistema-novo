<x-guest-layout>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div style="width: 100%;height: 100%;display: flex; justify-content: center" class="text-center mb-5">
                            <img src="{{ asset(Helper::settings()->logo) }}" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="form-group">
                                    <label class="text-inverse">E-mail</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary" id="basic-addon1">@</span>
                                        <input type="text" name="email" class="form-control" value="{{ old('email', $request->email) }}">
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
                                <div class="form-group form-primary">
                                    <label class="text-inverse">Nova Senha</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary" id="basic-addon1">
                                            <i class="icofont icofont-lock"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Senha">
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
                                <div class="form-group form-primary">
                                    <label class="text-inverse">Confirmação de senha</label>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-primary" id="basic-addon1">
                                            <i class="icofont icofont-lock"></i>
                                        </span>
                                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Senha">
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('password_confirmation'))
                                            <ul class="text-danger">
                                                @foreach ((array) $errors->get('password_confirmation') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            Modificar Senha
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
