<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-12">
                <div class="p-2 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                            <input id="nome" name="nome" type="text" class="form-control" value="{{ $client->nome }}" placeholder="Nome">
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
                                            <input id="dataNascimento" name="dataNascimento" type="date" class="form-control" value="{{ $client->dataNascimento }}">
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
                                                <option {{ ($client->sexo == 'f' ? "selected":"") }} value="f">Feminino</option>
                                                <option {{ ($client->sexo == 'm' ? "selected":"") }} value="m">Masculino</option>
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
                                                <option {{ ($client->estado_civil == 'solteiro' ? "selected":"") }} value="solteiro">Solteiro</option>
                                                <option {{ ($client->estado_civil == 'casado' ? "selected":"") }} value="casado">Casado</option>
                                                <option {{ ($client->estado_civil == 'divorciado' ? "selected":"") }} value="divorciado">Divorciado</option>
                                                <option {{ ($client->estado_civil == 'viuvo' ? "selected":"") }} value="viuvo">Viúvo</option>
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
                                            <input id="cpf" name="cpf" type="number" class="form-control" value="{{ old('cpf') ?? $client->cpf }}" placeholder="CPF">
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
                                            <input id="rg" name="rg" type="number" class="form-control" value="{{ $client->rg }}" placeholder="RG">
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
                                            <input id="whatsapp" name="whatsapp"  class="form-control telphone_with_code" data-mask="(99) 99999-9999" telphon type="text" value="{{ $client->whatsapp }}" placeholder="Whatsapp">
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
                                                <input hidden onchange="$('#filesName').val(this.name)" class="form-control" type="file" id="files" accept="image/jpeg,image/jpg,image/png" name="foto[]"/>
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
                                            <input id="cep" name="cep" onblur="pesquisacep(this.value)" type="text" class="cep form-control" value="{{ $client->cep }}" placeholder="CEP">
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
                                            <input id="endereco" name="endereco" type="text" class="form-control" value="{{ $client->endereco }}" placeholder="Rua">
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
                                            <input id="bairro" name="bairro" type="text" class="form-control" value="{{ $client->bairro }}" placeholder="Bairro">
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
                                            <input id="cidade" name="cidade" type="text" class="form-control" value="{{ $client->cidade }}" placeholder="cidade">
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
                                            <input id="numero" name="numero" type="text" class="form-control" value="{{ $client->numero }}" placeholder="Numero">
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
                                            <input id="email" name="email" type="email" class="form-control" value="{{ $client->email }}" placeholder="E-mail">
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
                                                    <input {{ ($client->diabetes ? "checked":"") }} value="s" id="diabetes" name="diabetes" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Diabetes descontrolada?</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->cardiaco ? "checked":"") }} value="s" id="cardiaco" name="cardiaco" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Portador de marcapasso/alterações cardíacas descontrolado?</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->hormonal ? "checked":"") }} value="s" id="hormonal" name="hormonal" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Alteração hormonal? Como: Ovário policístico, Andropausa, Hirsutíssimo, Hipertireoidismo, Menopausa, Hipotireoidismo.</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->foliculite ? "checked":"") }} value="s" id="foliculite" name="foliculite" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Tem ou teve alguma alteração na pele como manchas e foliculites?</span>
                                                </label>
                                            </div>
                                            <input id="foliculite_onde" name="foliculite_onde" type="text" class="form-control" value="{{ $client->foliculite_onde }}" placeholder="Onde?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->doenca_de_pele ? "checked":"") }} value="s" id="doenca_de_pele" name="doenca_de_pele" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Doença de pele como vitligo, psoríase?</span>
                                                </label>
                                            </div>
                                            <input id="doenca_de_pele_qual" name="doenca_de_pele_qual" type="text" class="form-control" value="{{ $client->doenca_de_pele_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->fotossensiveis ? "checked":"") }} value="s" id="fotossensiveis" name="fotossensiveis" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Doenças fotossensíveis?</span>
                                                </label>
                                            </div>
                                            <input id="fotossensiveis_qual" name="fotossensiveis_qual" type="text" class="form-control" value="{{ $client->fotossensiveis_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->queloides ? "checked":"") }} value="s" id="queloides" name="queloides" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Tem histórico de cicatrizes, queloides ou hipertróficas?</span>
                                                </label>
                                            </div>
                                            <input id="queloides_qual" name="queloides_qual" type="text" class="form-control" value="{{ $client->queloides_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->alergico ? "checked":"") }} value="s" id="alergico" name="alergico" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Antecedentes alérgicos?</span>
                                                </label>
                                            </div>
                                            <input id="alergico_qual" name="alergico_qual" type="text" class="form-control" value="{{ $client->alergico_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->herpes ? "checked":"") }} value="s" id="herpes" name="herpes" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Tem ou teve herpes?</span>
                                                </label>
                                            </div>
                                            <input id="herpes_frequencias" name="herpes_frequencias" type="text" class="form-control" value="{{ $client->herpes_frequencias }}" placeholder="Frequências?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->epilepsia ? "checked":"") }} value="s" id="epilepsia" name="epilepsia" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Epilepsia – convulsão?</span>
                                                </label>
                                            </div>
                                            <input id="epilepsia_frequencias" name="epilepsia_frequencias" type="text" class="form-control" value="{{ $client->epilepsia_frequencias }}" placeholder="Frequências?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->neoplasias_metastases ? "checked":"") }} value="s" id="neoplasias_metastases" name="neoplasias_metastases" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Neoplasias e metástases?</span>
                                                </label>
                                            </div>
                                            <input id="neopla_metast_qual" name="neopla_metast_qual" type="text" class="form-control" value="{{ $client->neopla_metast_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->medicamentos ? "checked":"") }} value="s" id="medicamentos" name="medicamentos" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Uso de medicamentos?</span>
                                                </label>
                                            </div>
                                            <input id="medicamentos_qual" name="medicamentos_qual" type="text" class="form-control" value="{{ $client->medicamentos_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->doenca_autoimune ? "checked":"") }} value="s" id="doenca_autoimune" name="doenca_autoimune" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Algum tipo de doenças autoimune?</span>
                                                </label>
                                            </div>
                                            <input id="doenca_autoimune_qual" name="doenca_autoimune_qual" type="text" class="form-control" value="{{ $client->doenca_autoimune_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->gestante ? "checked":"") }} value="s" id="gestante" name="gestante" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Gestante?</span>
                                                </label>
                                            </div>
                                            <input id="gestante_meses" name="gestante_meses" type="text" class="form-control" value="{{ $client->gestante_meses }}" placeholder="Quantos meses?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->lactante ? "checked":"") }} value="s" id="lactante" name="lactante" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Lactante?</span>
                                                </label>
                                            </div>
                                            <input id="lactante_tempo" name="lactante_tempo" type="text" class="form-control" value="{{ $client->lactante_tempo }}" placeholder="Quanto tempo?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->tratamento ? "checked":"") }} value="s" id="tratamento" name="tratamento" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Tratamentos Dermatológico/Estético?</span>
                                                </label>
                                            </div>
                                            <input id="tratamento_qual" name="tratamento_qual" type="text" class="form-control" value="{{ $client->tratamento_qual }}" placeholder="Qual?">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            Hábitos Diários:
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->filtro_solar ? "checked":"") }} value="s" id="filtro_solar" name="filtro_solar" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Filtro Solar?</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->exposicao_sol ? "checked":"") }} value="s" id="exposicao_sol" name="exposicao_sol" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Exposição ao sol?</span>
                                                </label>
                                            </div>
                                            <input id="exposicao_sol_frequencia" name="exposicao_sol_frequencia" type="text" class="form-control" value="{{ $client->exposicao_sol_frequencia }}" placeholder="Frequência?">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->roacutan ? "checked":"") }} value="s" id="roacutan" name="roacutan" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Uso de roacutan, anticoagulante ou corticoide a mais de 3 meses?</span>
                                                </label>
                                            </div>
                                            <input id="roacutan_qual" name="roacutan_qual" type="text" class="form-control" value="{{ $client->roacutan_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->medic_fotossensiveis ? "checked":"") }} value="s" id="medic_fotossensiveis" name="medic_fotossensiveis" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Uso medicamentos fotossensíveis(Furocumarina)?</span>
                                                </label>
                                            </div>
                                            <input id="medic_fotossensiveis_qual" name="medic_fotossensiveis_qual" type="text" class="form-control" value="{{ $client->medic_fotossensiveis_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->anabolizante ? "checked":"") }} value="s" id="anabolizante" name="anabolizante" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Uso de anabolizante?</span>
                                                </label>
                                            </div>
                                            <input id="anabolizante_qual" name="anabolizante_qual" type="text" class="form-control" value="{{ $client->anabolizante_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->acidos ? "checked":"") }} value="s" id="acidos" name="acidos" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Uso de ácidos fotossensíveis?</span>
                                                </label>
                                            </div>
                                            <input id="acidos_tempo" name="acidos_tempo" type="text" class="form-control" value="{{ $client->acidos_tempo }}" placeholder="Quanto tempo?">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->laser ? "checked":"") }} value="s" id="laser" name="laser" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Já fez algum procedimento com Laser ou IPL para depilação?</span>
                                                </label>
                                            </div>
                                            <input id="laser_qual" name="laser_qual" type="text" class="form-control" value="{{ $client->laser_qual }}" placeholder="Qual?">
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->tatuagem_micropig ? "checked":"") }} value="s" id="tatuagem_micropig" name="tatuagem_micropig" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Tem tatuagem ou Micropigmentação?</span>
                                                </label>
                                            </div>
                                            <input id="tatuagem_micropig_onde" name="tatuagem_micropig_onde" type="text" class="form-control" value="{{ $client->tatuagem_micropig_onde }}" placeholder="Onde?">
                                        </div>
                                        <div class="col-xl-5 col-md-6 col-12 mt-3">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input {{ ($client->reacoes ? "checked":"") }} value="s" id="reacoes" name="reacoes" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check"></i>
                                                    </span>
                                                    <span class="text-inverse">Reações relatadas frente aos métodos epilatórios habitualmente utilizados?</span>
                                                </label>
                                            </div>
                                            <input id="reacoes_qual" name="reacoes_qual" type="text" class="form-control" value="{{ $client->reacoes_qual }}" placeholder="Qual?">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-12">
                                    <button id="submit"  type="submit" class="text-sm pl-4 pr-4 btn btn-primary b-radius-5">Salvar</button>
                                    <a href="{{ route('clients.index') }}">
                                        <button type="button" class="text-sm pl-4 pr-4 btn btn-round b-radius-5">Cancelar</button>
                                    </a>
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
