<x-layout>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="p-4 small-box bg-white">
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
                                    <label for="name">Nome</label>
                                    <div class="input-group input-group-default">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                        </div>
                                        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
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
                                <!-- Telefone -->
                                <div class="col-lg-2 col-12 mt-3">
                                    <label for="telefone">Telefone</label>
                                    <div class="input-group input-group-default">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-phone"></i>
                                    </span>
                                        </div>
                                        <input id="telefone" class="form-control block telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" name="telefone" value="{{ $user->telefone }}">
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('telefone'))
                                            <ul class="text-red">
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
                                    <div class="input-group input-group-default">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-book-mark"></i>
                                    </span>
                                        </div>
                                        <select id="funcao" name="funcao" class="form-control">
                                            <option value="">Selecione</option>
                                            <option {{ ($user->funcao == '1' ? "selected":"") }} value="1">Master</option>
                                            <option {{ ($user->funcao == '2' ? "selected":"") }} value="2">Gerente</option>
                                            <option {{ ($user->funcao == '3' ? "selected":"") }} value="3">Aplicadora</option>
                                        </select>
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('funcao'))
                                            <ul class="text-red">
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
                                    <div class="input-group input-group-default">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont icofont-users"></i>
                                    </span>
                                        </div>
                                        <select id="treinamento" name="treinamento" class="form-control">
                                            <option value="">Selecione</option>
                                            <option {{ ($user->treinamento == 'n' ? "selected":"") }} value="n">Não</option>
                                            <option {{ ($user->treinamento == 's' ? "selected":"") }} value="s">Sim</option>
                                        </select>
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('treinamento'))
                                            <ul class="text-red">
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
                                    <label class="text-inverse">E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
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
                                <!-- Password -->
                                <div class="col-12 mt-3">
                                    <label class="text-inverse">Senha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="icofont icofont-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Senha">
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('password'))
                                            <ul class="text-red">
                                                @foreach ((array) $errors->get('password') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </span>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-12 mt-3">
                                    <label class="text-inverse">Confirmação de senha</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="icofont icofont-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Senha">
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('password_confirmation'))
                                            <ul class="text-red">
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
                                        <ul class="text-red">
                                            @foreach ((array) $errors->get('unidade') as $message)
                                                <li>{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </span>
                                <div class="row col-12 mt-4">
                                    <div class="col-lg-4 col-12">
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Campina Grande</label>
                                            <input type="checkbox" {{ (in_array(1, $unidades) ? "checked" : null) }} name="unidade[]" value="1" class="col-6 js-single" data-switchery="true" style="display: none;">
                                        </div>

                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">João Pessoa</label>
                                            <input type="checkbox" {{ (in_array(2, $unidades) ? "checked" : null) }} name="unidade[]" value="2" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Belém</label>
                                            <input type="checkbox" {{ (in_array(3, $unidades) ? "checked" : null) }} name="unidade[]" value="3" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Brasília</label>
                                            <input type="checkbox" {{ (in_array(4, $unidades) ? "checked" : null) }} name="unidade[]" value="4" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Lauro de Freitas</label>
                                            <input type="checkbox" {{ (in_array(5, $unidades) ? "checked" : null) }} name="unidade[]" value="5" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Campo Grande</label>
                                            <input type="checkbox" {{ (in_array(6, $unidades) ? "checked" : null) }} name="unidade[]" value="6" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Maceió</label>
                                            <input type="checkbox" {{ (in_array(7, $unidades) ? "checked" : null) }} name="unidade[]" value="7" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Salvador</label>
                                            <input type="checkbox" {{ (in_array(8, $unidades) ? "checked" : null) }} name="unidade[]" value="8" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Curitiba</label>
                                            <input type="checkbox" {{ (in_array(9, $unidades) ? "checked" : null) }} name="unidade[]" value="9" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Londrina</label>
                                            <input type="checkbox" {{ (in_array(10, $unidades) ? "checked" : null) }} name="unidade[]" value="10" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Santa Catarina</label>
                                            <input type="checkbox" {{ (in_array(11, $unidades) ? "checked" : null) }} name="unidade[]" value="11" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                        <div class="mt-2">
                                            <label class="col-6 form-check-label">Cascavel</label>
                                            <input type="checkbox" {{ (in_array(12, $unidades) ? "checked" : null) }} name="unidade[]" value="12" class="col-6 js-switch" data-switchery="true" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

