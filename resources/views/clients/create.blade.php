<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-12">
                <div class="p-2 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('clients.store') }}">
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Dados do Cliente
                                        </div>
                                        <!-- Nome -->
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <label for="nome" class="col-form-label">Nome</label>
                                            <input id="nome" name="nome" type="text" class="form-control" value="{{ old('nome') }}" placeholder="Nome">
                                            <span class="form-bar">
                                                @if ($errors->get('nome'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('nome') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Data de Nascimento -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="dataNascimento" class="col-form-label">Data de Nascimento</label>
                                            <input id="dataNascimento" name="dataNascimento" type="date" class="form-control" value="{{ old('dataNascimento') }}">
                                            <span class="form-bar">
                                                @if ($errors->get('dataNascimento'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('dataNascimento') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Sexo -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="sexo" class="col-form-label">Sexo</label>
                                            <select id="sexo" name="sexo" class="form-control">
                                                <option {{ (old("sexo") == 'f' ? "selected":"") }} value="f">Feminino</option>
                                                <option {{ (old("sexo") == 'm' ? "selected":"") }} value="m">Masculino</option>
                                            </select>
                                            <span class="form-bar">
                                                @if ($errors->get('sexo'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('sexo') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Estado Civil -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="estado_civil" class="col-form-label">Estado Civil</label>
                                            <select id="estado_civil" name="estado_civil" class="form-control">
                                                <option {{ (old("estado_civil") == 'solteiro' ? "selected":"") }} value="solteiro">Solteiro</option>
                                                <option {{ (old("estado_civil") == 'casado' ? "selected":"") }} value="casado">Casado</option>
                                                <option {{ (old("estado_civil") == 'divorciado' ? "selected":"") }} value="divorciado">Divorciado</option>
                                                <option {{ (old("estado_civil") == 'viuvo' ? "selected":"") }} value="viuvo">Viúvo</option>
                                            </select>
                                            <span class="form-bar">
                                                @if ($errors->get('estado_civil'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('estado_civil') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- CPF -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="cpf" class="col-form-label">CPF</label>
                                            <input id="cpf" name="cpf" type="number" class="form-control" value="{{ old('cpf') }}" placeholder="CPF">
                                            <span class="form-bar">
                                                @if ($errors->get('cpf'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('cpf') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- RG -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="rg" class="col-form-label">RG</label>
                                            <input id="rg" name="rg" type="number" class="form-control" value="{{ old('rg') }}" placeholder="RG">
                                            <span class="form-bar">
                                                @if ($errors->get('rg'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('rg') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Whatsapp -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="whatsapp" class="col-form-label">Whatsapp</label>
                                            <input id="whatsapp" name="whatsapp"  class="form-control telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" value="{{ old('whatsapp') }}" placeholder="Whatsapp">
                                            <span class="form-bar">
                                                @if ($errors->get('whatsapp'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('whatsapp') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Foto -->
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <label for="foto" class="col-form-label">Foto</label>
                                            <div class="input-group input-group-button">
                                                <span class="input-group-addon btn btn-primary" id="basic-addon9">
                                                    <span onclick="$('#files').click()">Buscar</span>
                                                </span>
                                                <input onclick="$('#files').click()" value="Nenhum arquivo selecionado" class="form-control botaoArquivo" type="text" id="filesName"/>
                                                <input hidden onchange="$('#filesName').val(this.name)" class="form-control" type="file" id="files" accept="image/jpeg,image/jpg,image/png,application/pdf" name="file[]"/>
                                            </div>
                                            <span class="form-bar">
                                                @if ($errors->get('foto'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('foto') as $message)
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

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Endereço
                                        </div>
                                        <!-- CEP -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="cep" class="col-form-label">CEP</label>
                                            <input id="cep" name="cep" onblur="pesquisacep(this.value)" type="text" class="cep form-control" value="{{ old('cep') }}" placeholder="CEP">
                                            <span class="form-bar">
                                                @if ($errors->get('cep'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('cep') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Endereço -->
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <label for="endereco" class="col-form-label">Rua</label>
                                            <input id="endereco" name="endereco" type="text" class="form-control" value="{{ old('endereco') }}" placeholder="Rua">
                                            <span class="form-bar">
                                                @if ($errors->get('cep'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('cep') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Bairro -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="bairro" class="col-form-label">Bairro</label>
                                            <input id="bairro" name="bairro" type="text" class="form-control" value="{{ old('bairro') }}" placeholder="Bairro">
                                            <span class="form-bar">
                                                @if ($errors->get('bairro'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('bairro') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Cidade -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="cidade" class="col-form-label">Cidade</label>
                                            <input id="cidade" name="cidade" type="text" class="form-control" value="{{ old('cidade') }}" placeholder="cidade">
                                            <span class="form-bar">
                                                @if ($errors->get('cidade'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('cidade') as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </span>
                                        </div>
                                        <!-- Numero -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="numero" class="col-form-label">Numero</label>
                                            <input id="numero" name="numero" type="text" class="form-control" value="{{ old('numero') }}" placeholder="Numero">
                                            <span class="form-bar">
                                                @if ($errors->get('numero'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('numero') as $message)
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

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Informações de Acesso:
                                        </div>
                                        <!-- E-mail -->
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <label for="email" class="col-form-label">E-mail</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail">
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
                                        <!-- Senha -->
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <label for="senha" class="col-form-label">Senha</label>
                                            <input id="senha" name="senha" type="password" class="form-control" value="{{ old('senha') }}" placeholder="senha">
                                            <span class="form-bar">
                                                @if ($errors->get('senha'))
                                                    <ul class="text-danger">
                                                        @foreach ((array) $errors->get('senha') as $message)
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


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Informações de Acesso:
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ (old('diabetes') ? "checked":"") }} id="diabetes" name="diabetes" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Diabetes descontrolada?</span>
                                                </label>
                                            </div>
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
        <script src="{{ asset('/js/consulta-cep.js') }}"></script>

        @endslot
</x-layout>
