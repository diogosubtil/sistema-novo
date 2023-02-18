<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-12">
                <div class="p-2 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Dados do Usuario
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="name" class="col-form-label">Nome</label>
                                            <div class="input-group">
                                            <span class="input-group-addon bg-primary" id="basic-addon1">
                                                <i class="icofont icofont-user"></i>
                                            </span>
                                                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Nome">
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
                                        <!-- Telefone -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="telefone" class="col-form-label">Telefone</label>
                                            <div class="input-group">
                                                <span class="input-group-addon bg-primary" id="basic-addon1">
                                                    <i class="icofont icofont-phone"></i>
                                                </span>
                                                <input id="telefone" class="form-control telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone">
                                            </div>
                                            <span class="form-bar">
                                            @if ($errors->get('telefone'))
                                                    <ul class="text-danger">
                                                    @foreach ((array) $errors->get('telefone') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                </ul>
                                                @endif
                                        </span>
                                        </div>
                                        <!-- Funcao -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="funcao">Função</label>
                                            <div class="input-group">
                                            <span class="input-group-addon bg-primary" id="basic-addon1">
                                                <i class="icofont icofont-book-mark"></i>
                                            </span>
                                                <select id="funcao" name="funcao" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <option {{ (old("funcao") == '1' ? "selected":"") }} value="1">Master</option>
                                                    <option {{ (old("funcao") == '2' ? "selected":"") }} value="2">Gerente</option>
                                                    <option {{ (old("funcao") == '3' ? "selected":"") }} value="3">Aplicadora</option>
                                                    <option {{ (old("funcao") == '4' ? "selected":"") }} value="4">Recepção/Vendedor</option>
                                                    <option {{ (old("funcao") == '10' ? "selected":"") }} value="10">Cliente</option>
                                                </select>
                                            </div>
                                            <span class="form-bar">
                                            @if ($errors->get('funcao'))
                                                    <ul class="text-danger">
                                                    @foreach ((array) $errors->get('funcao') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                </ul>
                                                @endif
                                        </span>
                                        </div>
                                        <!-- Treinamento -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="treinamento">Treinamento</label>
                                            <div class="input-group">
                                            <span class="input-group-addon bg-primary" id="basic-addon1">
                                                <i class="icofont icofont-users"></i>
                                            </span>
                                                <select id="treinamento" name="treinamento" class="form-control">
                                                    <option value="">Selecione</option>
                                                    <option {{ (old("treinamento") == 'n' ? "selected":"") }} value="n">Não</option>
                                                    <option {{ (old("treinamento") == 's' ? "selected":"") }} value="s">Sim</option>
                                                </select>
                                            </div>
                                            <span class="form-bar">
                                        @if ($errors->get('treinamento'))
                                                    <ul class="text-danger">
                                                    @foreach ((array) $errors->get('treinamento') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                </ul>
                                                @endif
                                        </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-xl-4 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            Login e Senha
                                        </div>
                                        <!-- Email Address -->
                                        <div class="col-12 mt-3">
                                            <label for="email">E-mail</label>
                                            <div class="input-group">
                                                <span class="input-group-addon bg-primary" id="basic-addon1">@</span>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail">
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
                                        <!-- Password -->
                                        <div class="col-12">
                                            <label for="password">Senha</label>
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

                                        <!-- Confirm Password -->
                                        <div class="col-12">
                                            <label for="password_confirmation">Confirmação de senha</label>
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
                                    </div>
                                </div>

                                <div id="userDivider" class="col-12">
                                    <hr>
                                </div>

                                <div id="userUnidade" style="" class="col-xl-8 col-12">
                                    <div>
                                        Unidades de acesso
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('unidade_id'))
                                            <ul class="text-danger">
                                            @foreach ((array) $errors->get('unidade_id') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                        </ul>
                                        @endif
                                    </span>
                                    <div class="col-12 mt-4">
                                        <div class="row ">
                                            <div hidden class="col-4 mt-2">
                                                <label for="js-single" class="col-8 form-check-label">js-single</label>
                                                <input type="checkbox" name="js-single" class="col-4 js-single">
                                            </div>
                                            @foreach($unidades as $unidade)
                                                <div class="col-xl-4 col-md-6 col-12 mt-2 align-items-center">
                                                    <div class="row">
                                                        <label class="col-xl-9 col-9 form-check-label">{{$unidade->bairro}} - <b>{{$unidade->estado }}</b></label>
                                                        <input class="col-xl-2 col-2 js-switch" type="checkbox" {{ (in_array($unidade->id, old('unidade_id') ?? [null]) ? "checked":"") }} name="unidade_id[]" value="{{ $unidade->id }}">
                                                    </div>
                                               </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <button id="cadastrar"  type="submit" class="text-sm pl-4 pr-4 btn btn-primary b-radius-5">Cadastrar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endslot
        @slot('scripts')
            <script type="text/javascript" src="{{ asset('/files/assets/pages/form-masking/inputmask.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/files/assets/pages/form-masking/jquery.inputmask.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/files/assets/pages/form-masking/form-mask.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/files/assets/pages/form-masking/autoNumeric.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/files/bower_components/switchery/js/switchery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/files/assets/pages/advance-elements/swithces.js') }}"></script>
        @endslot
</x-layout>
