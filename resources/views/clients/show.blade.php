<x-layout>
    @slot('stylesheet')
        <link href="{{ asset('/files/bower_components/summernote/summernote.min.css') }}" rel="stylesheet">

    @endslot
    @slot('slot')
        <div class="row justify-content-center">
            <div class="{{ $client->transferido === 's' ? 'col-xl-8' : 'col-xl-12'}} col-md-12 col-12">
                <div class="card card-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 d-flex justify-content-center align-items-center invoice-col">
                                <div style="width: 150px" class="m-1">
                                        <img width="100%" src="{{ $photo }}" class="rounded-circle" alt="your image"/>
                                </div>
                            </div>
                            <div class="col-xl-9 mt-2">
                                <div class="card-title mb-3"><strong style="font-size: 18px">{{ $client->nome }}</strong></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <span>
                                            Sexo: <strong>{{ $client->sexo == 'f' ? 'Feminino' : 'Masculino' }}</strong><br>
                                            Estado Civil: <strong>{{ $client->estado_civil }}</strong><br>
                                            Data de Nascimento: <strong>{{ date('d/m/Y', strtotime($client->dataNascimento)) }}</strong><br>
                                            Email: <strong>{{ $client->email }}</strong><br>
                                            Whatsapp: <strong>{{ $client->whatsapp }}</strong><br>
                                        </span>
                                    </div>
                                    <div class="col-xl-6">
                                        <span>
                                            CPF: <strong>{{ $client->cpf }}</strong><br>
                                            RG: <strong>{{ $client->rg }}</strong><br>
                                            CEP: <strong>{{ $client->cep }}</strong><br>
                                            Endereço: <strong>{{ $client->endereco }}, {{ $client->numero }} - {{ $client->bairro }} -  {{ $client->cidade }}</strong><br>
                                            Data de Cadastro: <strong>{{ date('d/m/Y', strtotime($client->created_at)) }}</strong><br>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php if($client->transferido === 's') { @endphp
            <div class="col-xl-4 col-md-12 col-12">
                <div class="card card-light">
                    <div class="card-body">
                        <div class="card-title mb-3"><strong style="font-size: 18px">Histórico do Cliente:</strong></div>
                        <div style="overflow:hidden;overflow-y: auto;max-height: 12.5vh;min-height: 12.5vh" class="p-2">
                            @foreach ($logs as $log)
                                <p>- <?php echo $log->info ?> no dia {{ date('d/m/Y', strtotime($log->dataCadastro)) }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @php } @endphp
            <div class="col-xl-12 col-12">
                <div class="card card-light">
                    <div class="card-body">
                        @if(Helper::requireFuncao('1,2,3,4'))

                            <!-- MODAL DE TRANSFERENCIA -->
                            <div class="md-modal md-effect-2" id="transferencia">
                                <div class="md-content">
                                    <h3 class="bg-primary">Transferência de unidade</h3>
                                    <div>
                                        <form id="transferir-unidade" action="{{ route('clients.transfer') }}" data-loading="true"  method="POST">
                                            @csrf
                                            <p>Você gostaria de transferir o cliente da unidade: <strong>{{ Helper::getUnidadeTitle($client->unidade_id) }}</strong></p>
                                            <br>
                                            <p>Para qual unidade?</p>
                                            <select name="unidade_id" class="form-control col-12">
                                                <option value="">Selecione</option>
                                                @foreach(Helper::getUnidades() as $unidade)
                                                    <option value="{{$unidade}}">{{ Helper::getUnidadeTitle($unidade) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->get('unidade_id'))
                                                @foreach ((array) $errors->get('unidade_id') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                            <input name="client_id" hidden value="{{ $client->id }}">
                                            <div class="d-flex mt-3">
                                                <div>
                                                    <button type="submit" id="submit" class="text-sm pl-4 pr-4 b-radius-5 btn btn-primary">Transferir</button>
                                                </div>
                                                <div class="ml-1">
                                                    <button type="button" class="text-sm pl-4 pr-4 btn btn-round b-radius-5 waves-effect md-close">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL DE TRANSFERENCIA -->

                            <!-- MODAL DE NOTA -->
                            <div class="md-modal md-effect-2" id="nota">
                                <div class="md-content">
                                    <h3 class="bg-primary">Nota</h3>
                                    <div>
                                        <form id="adicionar-nota" action="{{ route('notes.store') }}" data-loading="true"  method="POST">
                                            @csrf
                                            <input name="client_id" hidden value="{{ $client->id }}">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="tipo">Tipo</label>
                                                    <select id="tipo" name="type" class="form-control" >
                                                        <option disabled selected value="">Selecione</option>
                                                        <option value="scheduling">Informação do Agendamento</option>
                                                        <option value="contract">Congelamento de Contrato</option>
                                                    </select>
                                                    @if ($errors->get('type'))
                                                        @foreach ((array) $errors->get('type') as $message)
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row" id="informacao-agendamento">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="tipoAgendamento">Tipo de agendamento</label>
                                                        <select id="tipoAgendamento" name="typeScheduling" class="form-control">
                                                            <option disabled selected value="">Selecione</option>
                                                            <option value="next">Próximo</option>
                                                            <option value="fixed">Fixo</option>
                                                            <option value="specific">Específico</option>
                                                        </select>
                                                        @if ($errors->get('typeScheduling'))
                                                            @foreach ((array) $errors->get('typeScheduling') as $message)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12" id="tipo-especifico" style="display: none">
                                                    <div class="form-group">
                                                        <label for="agendamento">Agendamento</label>
                                                        <select id="agendamento" name="scheduling" class="form-control select2">
                                                            <option disabled selected value="">Selecione</option>
{{--                                                                <?php foreach ($obAgendamentos as $obAgendamento) { ?>--}}
{{--                                                            <option value="<?php echo $obAgendamento->id; ?>"><?php echo formatDataTime($obAgendamento->inicio) ?></option>--}}
{{--                                                            <?php } ?>--}}
                                                        </select>
                                                        @if ($errors->get('scheduling'))
                                                            @foreach ((array) $errors->get('scheduling') as $message)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="informacao-congelamento" style="display: none">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dataInicio">Data de início</label>
                                                        <input type="date" class="form-control" id="dataInicio" value="{{ old('startDate') }}" name="startDate">
                                                        @if ($errors->get('startDate'))
                                                            @foreach ((array) $errors->get('startDate') as $message)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dataTermino">Data de término</label>
                                                        <input type="date" class="form-control" id="dataTermino" value="{{ old('endDate') }}" name="endDate">
                                                        @if ($errors->get('endDate'))
                                                            @foreach ((array) $errors->get('endDate') as $message)
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="texto">Texto</label>
                                                    <textarea  class="form-control" id="texto" name="text" placeholder="Insira o texto..." rows="4" style="resize: none">{{ old('text') }}</textarea>
                                                    @if ($errors->get('text'))
                                                        @foreach ((array) $errors->get('text') as $message)
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex mt-3">
                                                <div>
                                                    <button type="submit" id="submit" class="text-sm pl-4 pr-4 b-radius-5 btn btn-primary">Adicionar</button>
                                                </div>
                                                <div class="ml-1">
                                                    <button type="button" class="text-sm pl-4 pr-4 btn btn-round b-radius-5 waves-effect md-close">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL DE NOTA -->

                            <!-- MODAL DE UPLOAD -->
                            <div class="md-modal md-effect-2" id="upload">
                                <div class="md-content">
                                    <h3 class="bg-primary">Envio de arquivos</h3>
                                    <div>
                                        <form id="upload-clients" action="{{ route('clients.uploads') }}" data-loading="true" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <label for="nomeupload" class="col-form-label">Nome</label>
                                            <input type="text" class="form-control" id="nomeupload" value="{{ old('nomeupload') }}" name="nomeupload">
                                            @if ($errors->get('nomeupload'))
                                                @foreach ((array) $errors->get('nomeupload') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                            <p style="display: none" id="error-nameupload" class="text-danger"></p>

                                            <label for="files" class="col-form-label">Arquivos</label>
                                            <div class="input-group input-group-button">
                                                <span class="input-group-addon btn btn-primary" id="basic-addon9">
                                                    <span onclick="$('#files').click()">Buscar</span>
                                                </span>
                                                <input onclick="$('#files').click()" value="Nenhum arquivo selecionado" class="form-control botaoArquivo" type="text" id="filesName"/>
                                                <input hidden onchange="$('#filesName').val(this.name)" class="form-control" type="file" id="files" name="archives[]"/>
                                            </div>
                                            @if ($errors->get('archives'))
                                                @foreach ((array) $errors->get('archives') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                            <p style="display: none" id="error-files" class="text-danger"></p>

                                            <input name="client_id" hidden value="{{ $client->id }}">
                                            <div class="d-flex mt-3">
                                                <div>
                                                    <button type="submit" id="upload-submit" class="text-sm pl-4 pr-4 b-radius-5 btn btn-primary">Enviar</button>
                                                </div>
                                                <div class="ml-1">
                                                    <button type="button" class="text-sm pl-4 pr-4 btn btn-round b-radius-5 waves-effect md-close">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div style="display: none" class="progress text-center">
                                    <div style="height: 1rem!important;" class="progress-bar" id="progress-bar" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL DE UPLOAD -->

                            <!-- MODAL DE ALTERAÇÃO DE SENHA -->
                            <div class="md-modal md-effect-2" id="senha">
                                <div class="md-content">
                                    <h3 class="bg-primary">Alteração de senha</h3>
                                    <div>
                                        <form id="senha-clients" action="{{ route('clients.password') }}" data-loading="true" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="password" class="col-form-label">Nova senha</label>
                                            <input type="password" class="form-control" id="password" value="{{ old('nomeupload') }}" name="password">
                                            @if ($errors->get('password'))
                                                @foreach ((array) $errors->get('password') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                            <label for="confirm-password" class="col-form-label">Confirmar senha</label>
                                            <input type="password" class="form-control" id="confirm-password" value="{{ old('nomeupload') }}" name="confirm-password">
                                            @if ($errors->get('confirm-password'))
                                                @foreach ((array) $errors->get('confirm-password') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                            @if (session()->has('confirmpass'))
                                                  <p class="text-danger">{{ session('confirmpass') }}</p>
                                            @endif
                                            <input name="client_id" hidden value="{{ $client->id }}">
                                            <div class="d-flex mt-3">
                                                <div>
                                                    <button type="submit" id="submit" class="text-sm pl-4 pr-4 b-radius-5 btn btn-primary">Enviar</button>
                                                </div>
                                                <div class="ml-1">
                                                    <button type="button" class="text-sm pl-4 pr-4 btn btn-round b-radius-5 waves-effect md-close">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL DE ALTERAÇÃO DE SENHA -->

                            <!-- MODAL OVERLAY -->
                            <div class="md-overlay"></div>
                            <!-- MODAL OVERLAY -->

                            <div class="row m-1">
                                <a href="{{ route('clients.edit', $client->id) }}">
                                    <button type="button" class="m-1 text-sm pl-4 pr-4 btn btn-primary b-radius-5">Editar</button>
                                </a>

                                <button id="notes-button" type="button" class="m-1 text-sm pl-4 pr-4 btn btn-success b-radius-5 waves-effect md-trigger" data-modal="nota">Adicionar Nota</button>

                                <button id="transfer-button" type="button" class="m-1 text-sm pl-4 pr-4 btn btn-secondary b-radius-5 waves-effect md-trigger" data-modal="transferencia">Transferir</button>

                                <button id="upload-button" type="button" class="m-1 text-sm pl-4 pr-4 btn btn-light b-radius-5 waves-effect md-trigger"  data-modal="upload">Enviar Arquivos</button>

                                <button id="senha-button" type="button" class="m-1 text-sm pl-4 pr-4 btn btn-warning b-radius-5 waves-effect md-trigger" data-modal="senha">Alterar Senha</button>

                                <form id="client-delete-{{ $client->id }}" method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="m-1 text-sm pl-4 pr-4 btn btn-danger b-radius-5">Excluir</button>
                                </form>

                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- NOTAS -->
            @if($client->notes->count() > 0)
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-body">
                            <div class="card-title mb-3"><strong style="font-size: 18px">Notas:</strong></div>
                            @foreach($client->notes as $note)

                                @if($note->type == 'contract')
                                    <div class="card bg-danger">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <form id="notes-delete-{{ $note->id }}" class="ml-3" method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit"  class="waves-effect waves-light float-right" data-toggle="tooltip" data-placement="left" title="Excluir">
                                                        <i style="font-size: 18px" class="fa fa-trash m-0 text-white"></i>
                                                    </button>
                                                </form>
                                                Congelamento de Contrato
                                            </div>
                                            <div class="card-body">
                                                {{ $note->text }}
                                            </div>
                                            <div class="card-footer bg-danger">
                                                Data: {{ date('d/m/Y', strtotime($note->dataInicio)) }} até {{date('d/m/Y', strtotime($note->dataTermino)) }}
                                                <span class="float-right  m-3">Criado em: {{ date('d/m/Y H:i', strtotime($note->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($note->type == 'scheduling' && $note->typeScheduling == 'fixed')
                                    <div class="card bg-warning">
                                        <div class="col-12">
                                            <div class="card-header">
                                                <form id="notes-delete-{{ $note->id }}" class="ml-3" method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit"  class="waves-effect waves-light float-right" data-toggle="tooltip" data-placement="left" title="Excluir">
                                                        <i style="font-size: 18px" class="fa fa-trash m-0 text-white"></i>
                                                    </button>
                                                </form>
                                                Fixo
                                            </div>
                                            <div class="card-body">
                                                    {{ $note->text }}
                                                <span class="float-right m-3">Criado em: {{ date('d/m/Y H:i', strtotime($note->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            @endif
            <!-- NOTAS -->

            <div class="col-12">
                <div class="card card-light">
                    <div class="card-body">
                        <div class="card-title mb-3"><strong style="font-size: 18px">Histórico Clínico:</strong></div>
                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <p>
                                    Diabetes descontrolada? <strong>{{ ($client->diabetes) ? 'Sim' : 'Não'  }}</strong>
                                </p>
                                <p>
                                    Portador de marcapasso/alterações cardíacas descontrolado? <strong>{{ ($client->cardiaco) ? 'Sim' : 'Não'  }}</strong>
                                </p>
                                <p>
                                    Alteração hormonal Como: Ovário policístico, Andropausa, Hirsutíssimo, Hipertireoidismo, Menopausa, Hipotireoidismo? <strong>{{ ($client->hormonal) ? 'Sim' : 'Não'  }}</strong>
                                </p>
                                <p>
                                    Tem ou teve alguma alteração na pele como manchas e foliculites? <strong>{{ ($client->foliculite) ? 'Sim. Onde? ' : 'Não'  }} {{ $client->foliculite_onde }}</strong><br>
                                </p>
                                <p>
                                    Doença de pele como vitligo, psoríase? <strong>{{ ($client->doenca_de_pele) ? 'Sim. Onde? ' : 'Não'  }} {{ $client->doenca_de_pele_qual }}</strong><br>
                                </p>
                                <p>
                                    Doenças fotossensíveis? <strong>{{ ($client->fotossensiveis) ? 'Sim. Onde? ' : 'Não'  }} {{ $client->fotossensiveis_qual }}</strong><br>
                                </p>
                                <p>
                                    Tem histórico de cicatrizes, queloides ou hipertróficas? <strong>{{ ($client->queloides) ? 'Sim. Onde? ' : 'Não'  }} {{ $client->queloides_qual }}</strong><br>
                                </p>
                                <p>
                                    Antecedentes alérgicos? <strong>{{ ($client->alergico) ? 'Sim. Onde? ' : 'Não'  }} {{ $client->alergico_qual }}</strong><br>
                                </p>
                            </div>
                            <div class="col-xl-6 col-12">
                                <p>
                                    Tem ou teve herpes? <strong>{{ ($client->herpes) ? 'Sim. Frequências? ' : 'Não'  }} {{ $client->herpes_frequencias }}</strong><br>
                                </p>
                                <p>
                                    Epilepsia – convulsão? <strong>{{ ($client->epilepsia) ? 'Sim. Frequências? ' : 'Não'  }} {{ $client->epilepsia_frequencias }}</strong><br>
                                </p>
                                <p>
                                    Neoplasias e metástases? <strong>{{ ($client->neoplasias_metastases) ? 'Sim. Qual? ' : 'Não'  }} {{ $client->neopla_metast_qual }}</strong><br>
                                </p>
                                <p>
                                    Uso de medicamentos? <strong>{{ ($client->medicamentos) ? 'Sim. Qual? ' : 'Não'  }} {{ $client->medicamentos_qual }}</strong><br>
                                </p>
                                <p>
                                    Algum tipo de doenças autoimune? <strong>{{ ($client->doenca_autoimune) ? 'Sim. Qual? ' : 'Não'  }} {{ $client->doenca_autoimune_qual }}</strong><br>
                                </p>
                                <p>
                                    Gestante? <strong>{{ ($client->gestante) ? 'Sim. Quantos meses? ' : 'Não'  }} {{ $client->gestante_meses }}</strong><br>
                                </p>
                                <p>
                                    Lactante? <strong>{{ ($client->lactante) ? 'Sim. Quanto tempo? ' : 'Não'  }} {{ $client->lactante_tempo }}</strong><br>
                                </p>
                                <p>
                                    Tratamentos Dermatológico/Estético? <strong>{{ ($client->tratamento) ? 'Sim. Qual? ' : 'Não'  }} {{ $client->tratamento_qual }}</strong><br>
                                </p>
                                <p>
                                    Possui pêlos brancos, loiros ou ruivos na região de interesse em fazer o laser? <strong>{{ ($client->pelos_brancos_loiros_ruivos) ? 'Sim' : 'Não'  }}</strong><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-light">
                    <div class="card-body">
                        <div class="card-title mb-3"><strong style="font-size: 18px">Hábitos Diários:</strong></div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>
                                    Filtro solar? <strong>{{ ($client->filtro_solar) ? 'Sim' : 'Não'  }}</strong><br>
                                </p>
                                <p>
                                    Exposição ao sol? <strong>{{ ($client->exposicao_sol) ? 'Sim. Frequência? ' : 'Não'  }}  {{ $client->exposicao_sol_frequencia }}</strong><br>
                                </p>
                                <p>
                                    Uso de roacutan, anticoagulante ou corticoide a mais de 3 meses? <strong>{{ ($client->roacutan) ? 'Sim. Qual? ' : 'Não'  }}  {{ $client->roacutan_qual }}</strong><br>
                                </p>
                                <p>
                                    Uso medicamentos fotossensíveis(Furocumarina)? <strong>{{ ($client->medic_fotossensiveis) ? 'Sim. Qual? ' : 'Não'  }}  {{ $client->medic_fotossensiveis_qual }}</strong><br>
                                </p>
                                <p>
                                    Uso de anabolizante? <strong>{{ ($client->anabolizante) ? 'Sim. Qual? ' : 'Não'  }}  {{ $client->anabolizante_qual }}</strong><br>
                                </p>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>
                                    Uso de ácidos fotossensíveis? <strong>{{ ($client->acidos) ? 'Sim. Quanto tempo? ' : 'Não'  }}  {{ $client->acidos_tempo }}</strong><br>
                                </p>
                                <p>
                                    Já fez algum procedimento com Laser ou IPL para depilação? <strong>{{ ($client->laser) ? 'Sim. Qual? ' : 'Não'  }}  {{ $client->laser_qual }}</strong><br>
                                </p>
                                <p>
                                    Tem tatuagem ou Micropigmentação? <strong>{{ ($client->tatuagem_micropig) ? 'Sim. Qual? ' : 'Não'  }}  {{ $client->tatuagem_micropig_onde }}</strong><br>
                                </p>
                                <p>
                                    Reações relatadas frente aos métodos epilatórios habitualmente utilizados? <strong>{{ ($client->reacoes) ? 'Sim. Onde? ' : 'Não'  }}  {{ $client->reacoes_qual }}</strong><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UPLOADS -->
            @if($uploads->count() > 0)
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-body">
                            <div class="card-title mb-3"><strong style="font-size: 18px">Arquivos: </strong></div>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                    <tr>
                                        <th class="col-4">Nome</th>
                                        <th class="col-4">Tipo</th>
                                        <th class="col-2"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($uploads as $upload)
                                        <tr>
                                            <td>{{ $upload->name }}</td>
                                            <td>{{ $upload->extension }}</td>
                                            <td class="d-flex">
                                                <a download="" href="{{ $upload->url }}"  class="waves-effect waves-light ml-3" data-toggle="tooltip" data-placement="left" title="Baixar aquivo">
                                                    <i style="font-size: 20px" class="fa fa-download m-0 text-success"></i>
                                                </a>
                                                <form id="uploads-delete-{{ $upload->id }}" class="ml-3" method="POST" action="{{ route('uploads.destroy', $upload->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" type="submit"  class="waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Excluir">
                                                        <i style="font-size: 18px" class="fa fa-trash m-0 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- UPLOADS -->


        </div>
    @endslot
    @slot('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script>
            var progress = $('.progress');
            $('#upload-clients').ajaxForm({
                beforeSend: function () {
                    $('#nomeupload').val() == '' || $('#files').val() == '' ? progress.hide() : progress.show()
                    document.getElementById("progress-bar").style.width = '0%';
                    document.getElementById("progress-bar").setAttribute("aria-valuenow", '0');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    if ($('#nomeupload').val() == '' || $('#files').val() == '') {
                        progress.hide()
                        $('#nomeupload').val() == '' ? $('#error-nameupload').show().html('O nome do arquivo é obrigatório')  : $('#error-nameupload').hide();
                        $('#files').val() == '' ? $('#error-files').show().html('O arquivo é obrigatório') : $('#error-files').hide();
                        $('button').removeAttr('disabled');
                        $('#upload-submit').html('Enviar');
                        $('#upload-submit').css({ 'font-size': '0.8em' });
                    } else {
                        $('#error-nameupload').hide();
                        $('#error-files').hide();
                        progress.show()
                        var percentVal = percentComplete + '%';
                        const Val = percentComplete;
                        document.getElementById("progress-bar").innerText = percentComplete + '%'
                        document.getElementById("progress-bar").setAttribute('style', 'height:1rem !important; width: ' + percentVal);
                        document.getElementById("progress-bar").setAttribute("aria-valuenow", Val);
                    }
                },
                complete: function (xhr, data) {
                    if (data === 'success') {
                        window.location.href = '{{ route('clients.uploadsOk', $client->id) }}';
                    }
                }
            });
        </script>
        <script>

            @foreach ($client->notes as $note)
                let form{{ $note->id }} = document.getElementById("notes-delete-{{ $note->id }}")
                form{{ $note->id }}.addEventListener("submit", function(event){
                    event.preventDefault()
                    formDelet(this)
                });
            @endforeach

            @foreach ($uploads as $upload)
            let form{{ $upload->id }} = document.getElementById("uploads-delete-{{ $upload->id }}")
            form{{ $upload->id }}.addEventListener("submit", function(event){
                event.preventDefault()
                formDelet(this)
            });
            @endforeach

            let form{{ $client->id }} = document.getElementById("client-delete-{{ $client->id }}")
            form{{ $client->id }}.addEventListener("submit", function(event){
                event.preventDefault()
                formDelet(this)
            });

            //VERIFICA O ERRO E ABRE O MODAL
            @if ($errors->get('unidade_id'))
                $('#transfer-button').click()
            @endif

            //VERIFICA O ERRO E ABRE O MODAL
            @if ($errors->get('nomeupload') || $errors->get('archives'))
                $('#upload-button').click()
            @endif

            //VERIFICA O ERRO E ABRE O MODAL
            @if ($errors->get('password') || $errors->get('confirm-password') || session()->has('confirmpass'))
                $('#senha-button').click()
            @endif

            //VERIFICA O ERRO E ABRE O MODAL
            @if ($errors->get('text') || $errors->get('startDate') || $errors->get('endDate') || $errors->get('scheduling') || $errors->get('typeScheduling') || $errors->get('type'))
                $('#notes-button').click()
                setTimeout(function (){
                    @if(old('type') == 'contract')
                    $('#tipo').val('contract').trigger('change')
                    @endif

                    @if(old('type') == 'scheduling')
                    $('#tipo').val('scheduling').trigger('change')
                    @endif

                    @if(old('typeScheduling') == 'specific')
                    $('#tipoAgendamento').val('specific').trigger('change')
                    @endif
                    @if(old('typeScheduling') == 'fixed')
                    $('#tipoAgendamento').val('fixed').trigger('change')
                    @endif
                    @if(old('typeScheduling') == 'next')
                    $('#tipoAgendamento').val('next').trigger('change')
                    @endif

                },200)
            @endif

            $('#tipo').on('change', function() {
                if ($(this).val() === 'scheduling') {
                    $('#informacao-agendamento').show();
                    $('#informacao-congelamento').hide();
                } else {
                    $('#informacao-agendamento').hide();
                    $('#informacao-congelamento').show();
                }
            });

            $('#tipoAgendamento').on('change', function() {
                if ($(this).val() === 'specific') {
                    $('#tipo-especifico').show();
                } else {
                    $('#tipo-especifico').hide();
                }
            });
        </script>
    @endslot
</x-layout>
