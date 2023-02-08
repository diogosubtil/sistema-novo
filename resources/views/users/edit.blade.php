<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="p-4 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="row">
                                <div class="row col-12 p-4">
                                    <div class="col-12">
                                        Dados do Usuario
                                    </div>
                                    <div class="col-lg-4 col-12 mt-3">
                                        <label for="name" class="col-form-label">Nome</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-user"></i>
                                            </span>
                                            <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
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
                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="telefone" class="col-form-label">Telefone</label>
                                        <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="icofont icofont-phone"></i>
                                                </span>
                                            <input id="telefone" class="form-control telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" name="telefone" value="{{ $user->telefone }}">
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
                                    <div class="col-lg-3 col-12 mt-3">
                                        <label for="funcao">Função</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-book-mark"></i>
                                            </span>
                                            <select id="funcao" name="funcao" class="form-control">
                                                <option value="">Selecione</option>
                                                <option {{ ($user->funcao == '1' ? "selected":"") }} value="1">Master</option>
                                                <option {{ ($user->funcao == '2' ? "selected":"") }} value="2">Gerente</option>
                                                <option {{ ($user->funcao == '3' ? "selected":"") }} value="3">Aplicadora</option>
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
                                    <div class="col-lg-3 col-12 mt-3">
                                        <label for="treinamento">Treinamento</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-users"></i>
                                            </span>
                                            <select id="treinamento" name="treinamento" class="form-control">
                                                <option value="">Selecione</option>
                                                <option {{ ($user->treinamento == 'n' ? "selected":"") }} value="n">Não</option>
                                                <option {{ ($user->treinamento == 's' ? "selected":"") }} value="s">Sim</option>
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
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="row col-lg-4 col-12 p-4 mt-2 mr-1">
                                    <div class="col-12">
                                        Login e Senha
                                    </div>
                                    <!-- Email Address -->
                                    <div class="col-12 mt-3">
                                        <label for="email">E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>
                                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
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
                                    <div class="col-12 mt-3">
                                        <label for="password">Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control"  placeholder="Senha">
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
                                    <div class="col-12 mt-3">
                                        <label for="password_confirmation">Confirmação de senha</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-lock"></i>
                                            </span>
                                            <input type="password" name="password_confirmation"  class="form-control" placeholder="Senha">
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

                                <div id="userDivider" class="col-12">
                                    <hr>
                                </div>

                                <!-- Unidade -->
                                <div id="userUnidade" style="" class="col-lg-8 col-12 p-4 mt-2">
                                    <div>
                                        Unidades de acesso
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('unidade'))
                                            <ul class="text-danger">
                                            @foreach ((array) $errors->get('unidade') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                        </ul>
                                        @endif
                                </span>
                                    <div hidden class="row col-12 mt-4">
                                        <div class="row col-12 mt-4">
                                            <label for="js-single" class="col-8 form-check-label">js-single</label>
                                            <input type="checkbox" name="js-single" class="col-4 js-single">
                                        </div>
                                        @foreach($unidades as $unidade)
                                            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                                                <label class="col-xl-9 col-sm-9 col-8 form-check-label">{{$unidade->bairro}} - <b>{{$unidade->estado }}</b></label>
                                                <input type="checkbox" {{ (in_array($unidade->id, $unidadesUser) ? "checked":"") }} name="unidade[]" value="{{ $unidade->id }}" class="col-3 js-switch">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Salvar</button>
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

