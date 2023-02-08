<x-layout>

    @slot('stylesheet')
    @endslot

    @slot('slot')
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="p-4 card">
                    <div class="col-12">
                        <form method="POST" action="{{ route('unidades.update', $unidade->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="row">
                                <div class="row col-12 p-4">
                                    <div class="col-12">
                                        Dados do Unidade
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="cnpj" class="col-form-label">CNPJ</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-building"></i>
                                            </span>
                                            <input id="cnpj" name="cnpj" type="text" class="form-control cnpj" value="{{ $unidade->cnpj }}" placeholder="CNPJ">
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('cnpj'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('cnpj') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="dataAbertura" class="col-form-label">Data de Abertura</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input id="dataAbertura" name="dataAbertura" type="date" class="form-control" value="{{ $unidade->dataAbertura }}">
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('dataAbertura'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('dataAbertura') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="whatsapp" class="col-form-label">Whatsapp</label>
                                        <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <i class="icofont icofont-phone"></i>
                                                </span>
                                            <input id="whatsapp" class="form-control telphone_with_code" type="text" name="whatsapp" value="{{ $unidade->whatsapp }}" placeholder="Whatsapp">
                                        </div>
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

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="meta" class="col-form-label">Meta</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-money"></i>
                                            </span>
                                            <input id="meta" name="meta" type="number" class="form-control" value="{{ $unidade->meta }}" placeholder="Meta">
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('meta'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('meta') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="gerente">Gerente</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-user"></i>
                                            </span>
                                            <select id="gerente" name="gerente" class="form-control">
                                                <option value="">Selecione</option>
                                                @foreach($usuarios as $usuario)
                                                    <option {{ ($unidade->gerente == $usuario->id ? "selected":"") }} value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('gerente'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('gerente') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-lg-2 col-12 mt-3">
                                        <label for="timezone">Timezone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="icofont icofont-clock-time"></i>
                                            </span>
                                            <select id="timezone" name="timezone" class="form-control">
                                                <option value="">Selecione</option>
                                                @foreach($timezones as $uf => $timezone)
                                                    <option {{ ($unidade->timezone == $timezone ? "selected":"") }} value="{{ $timezone }}">{{ $uf }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('timezone'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('timezone') as $message)
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
                                <div class="row col-lg-3 col-12 p-4 mt-2 mr-1">
                                    <div class="col-12">
                                        Endereço da Unidade
                                    </div>
                                    <div class="col-lg-12 col-12 mt-3">
                                        <label for="cep" class="col-form-label">CEP</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-home"></i>
                                            </span>
                                            <input id="cep" name="cep" onblur="pesquisacep(this.value)" type="text" class="form-control cep" value="{{ $unidade->cep }}" placeholder="CEP">
                                        </div>
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

                                    <div class="col-12">
                                        <div class="input-group">
                                            <label for="cidade"><b>Cidade:</b> </label><span class="ml-2" id="cidadeText">{{ $unidade->cidade }}</span>
                                            <input hidden id="cidade" name="cidade" type="text"  class="form-control" value="{{ $unidade->cidade }}">
                                        </div>
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

                                    <div class="col-12">
                                        <div class="input-group">
                                            <label for="bairro"><b>Bairro: </b></label><span class="ml-2" id="bairroText"> {{ $unidade->bairro }}</span>
                                            <input hidden id="bairro" name="bairro" type="text"  class="form-control" value="{{ $unidade->bairro }}">
                                        </div>
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

                                    <div class="col-12">
                                        <div class="input-group">
                                            <label for="endereco"><b>Endereço:</b> </label><span class="ml-2" id="enderecoText">{{ $unidade->endereco }}</span>
                                            <input hidden id="endereco" name="endereco" type="text"  class="form-control" value="{{ $unidade->endereco }}">
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('endereco'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('endereco') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group">
                                            <label for="estado"><b>Estado:</b> </label><span class="ml-2" id="estadoText">{{ $unidade->estado }}</span>
                                            <input hidden id="estado" name="estado" type="text"  class="form-control" value="{{ $unidade->estado }}">
                                        </div>
                                        <span class="form-bar">
                                            @if ($errors->get('estado'))
                                                <ul class="text-danger">
                                                    @foreach ((array) $errors->get('estado') as $message)
                                                        <li>{{ $message }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </span>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <label for="numero" class="col-form-label">Numero</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-sort-numeric-desc"></i>
                                            </span>
                                            <input id="numero" name="numero" type="text" class="form-control" value="{{ $unidade->numero }}" placeholder="Numero">
                                        </div>
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

                                <div id="userDivider" class="col-12">
                                    <hr>
                                </div>

                                <!-- Unidade -->
                                <div id="userUnidade" style="" class="col-lg-9 col-12 p-4 mt-2">
                                    <div>
                                        Assinatura
                                    </div>
                                    <span class="form-bar">
                                        @if ($errors->get('assinatura'))
                                            <ul class="text-danger">
                                            @foreach ((array) $errors->get('assinatura') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                        </ul>
                                        @endif
                                    </span>
                                    <div id="campoAssinado" class="col-12">
                                        <img  style="width: 100%" src="{{ $unidade->assinatura }}">
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="button" id="assinar-novamente" class="btn btn-primary pl-5 pr-5 b-radius-5 mt-4 ml-2" value="Assinar novamente">
                                        </div>
                                    </div>
                                    <div hidden id="campoAssinar" class="row col-12 mt-4">
                                        <div class="col-12" style="border: 1px solid #ccc;">
                                            <div id="signature2" class="col-12"></div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <input type="button" id="limpar" class="btn btn-danger pl-5 pr-5 b-radius-5 mt-4 ml-2" value="Limpar">
                                        </div>
                                        <input type="hidden" id="assinatura" name="assinatura" value="{{ $unidade->assinatura }}">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button id="salvar"  type="submit" class="text-sm pl-4 pr-4 btn bg-primary b-radius-5">Salvar</button>
                                <a href="{{ route('unidades.index') }}">
                                    <button type="button" class="text-sm pl-4 pr-4 btn bg-danger b-radius-5">Cancelar</button>
                                </a>
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
        <script src="{{ asset('/files/bower_components/jSignature/jSignature.min.noconflict.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#assinar-novamente').click(function (){
                    document.getElementById('campoAssinado').hidden = true
                    document.getElementById('campoAssinar').hidden = false

                    // Initialize jSignature
                    var $sigdiv1 = $("#signature2").jSignature({
                        lineWidth: 1
                    });

                    $('#salvar').click(function(e) {
                        // Get response of type image
                        var data1 = $sigdiv1.jSignature('getData', 'image');

                        // VERIFICA SE O USUÁRIO ASSINOU ALGO
                        var isSignatureProvided = $sigdiv1.jSignature('getData', 'base30')[1].length > 1;

                        if (isSignatureProvided) {
                            // Alter image source
                            $('#assinatura').val("data:" + data1);
                        }
                    });

                    $('#limpar').click(function() {
                        $('#signature2').jSignature("reset");
                    });

                })

            })
        </script>
    @endslot
</x-layout>
