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
                                            CPF: <strong>{{ $client->cpf }}</strong><br>
                                            Email: <strong>{{ $client->email }}</strong><br>
                                        </span>
                                    </div>
                                    <div class="col-xl-6">
                                        <span>
                                            RG: <strong>{{ $client->rg }}</strong><br>
                                            Whatsapp: <strong>{{ $client->whatsapp }}</strong><br>
                                            CEP: <strong>{{ $client->cep }}</strong><br>
                                            Endereço: <strong>{{ $client->endereco }}, {{ $client->numero }} - {{ $client->bairro }} -  {{ $client->cidade }}</strong>
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
                    <strong>Histórico do Cliente:</strong>
                    <div style="overflow:hidden;overflow-y: auto;max-height: 15vh;">
                            <?php foreach ($logs as $log) { ?>
                        <p>- <?php echo $log->info ?> no dia {{ date('d/m/Y', strtotime($log->dataCadastro)) }}</p>
                        <?php } ?>
                    </div>
                </div>
            @php } @endphp
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
        </div>
    @endslot
    @slot('scripts')
    @endslot
</x-layout>
