<x-layout>
    @slot('stylesheet')
        <link href="{{ asset('/files/bower_components/summernote/summernote.min.css') }}" rel="stylesheet">
    @endslot
    @slot('slot')
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6><p>Olá , <b class="text-primary">{{ Auth::user()->name }}</b>!</p> Estamos diponíveis para responder seus tickets!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6 class="text-primary"><p><b>Ultímo Ticket</b></p></h6>
                                <hr>
                                @if($ultimoSuporte)
                                    <div style="cursor: pointer" onclick="window.location.href = '{{ route('supports.showuser', $ultimoSuporte->id) }}'">
                                        <h5>#{{ $ultimoSuporte->id }} - {{ $ultimoSuporte->subject }}</h5>
                                        <span><i class="fa fa-circle"></i> <label class="label {{ Helper::getColorSupport($ultimoSuporte->status) }}">{{ Helper::getStatusSupport($ultimoSuporte->status) }}</label></span>
                                        <span><i class="fa fa-calendar"></i> {{ date('d/m/Y H:i', strtotime($ultimoSuporte->created_at))}}</span>
                                    </div>
                                @else
                                    <h5>Nenhum Ticket Registrado</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h6 class="text-primary"><p><b>Suporte</b></p></h6>
                                <hr>
                                <ul>
                                    <li>
                                        <a href="{{ route('supports.indexuser') }}"><i class="fa fa-list"></i> Meus Tickets de Suporte</a>
                                    </li>
                                    <li class="mt-2">
                                        <a href="{{ route('supports.create') }}"><i class="fa fa-ticket"></i> Abrir Ticket</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-md-12 col-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5 class="text-primary"><p><b>Informações do ticket</b></p></h5>
                        <hr>
                    </div>
                    <div class="card-block">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <label for="created_at">Nome</label>
                                    <div class="input-group">
                                    <span class="input-group-addon bg-primary">
                                        <i class="icofont icofont-user"></i>
                                    </span>
                                        <input disabled type="text" class="form-control" name="created_at" id="created_at" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <label for="created_at">Unidade</label>
                                    <div class="input-group">
                                    <span class="input-group-addon bg-primary">
                                        <i class="fa fa-building"></i>
                                    </span>
                                        <input disabled type="text" class="form-control" name="created_at" id="created_at" value="{{ Helper::getUnidadeTitle(Session::get('unidade')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card table-card">
                    <div class="card-header">
                        <h5 class="text-primary"><p><b>Mensagem</b></p></h5>
                        <hr>
                    </div>
                    <div class="card-block">
                        <div class="col-12">
                            <form id="create-support" method="POST" class="row" action=" {{ route('supports.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input hidden type="number" class="form-control" name="user" id="user" value="{{ Auth::user()->id }}">
                                <input hidden type="number" class="form-control" name="unidade_id" id="unidade_id" value="{{ Session::get('unidade') }}">
                                <input hidden type="number" class="form-control" name="status" id="status" value="1">
                                <div class="col-6">
                                    <label for="subject">Assunto</label>
                                    <input class="form-control" placeholder="Assunto do Ticket" value="{{ old('subject') }}" type="text" maxlength="50" name="subject">
                                    <ul class="text-danger">
                                            <li id="subject"></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <label for="subject">Arquivos</label>
                                    <div class="input-group input-group-button">
                                        <span class="input-group-addon btn btn-primary" id="basic-addon9">
                                            <span onclick="$('#files').click()">Buscar</span>
                                        </span>
                                        <input onclick="$('#files').click()" value="Nenhum arquivo selecionado" class="form-control botaoArquivo" type="text" id="filesName"/>
                                        <input hidden onchange="$('#filesName').val(this.name)" class="form-control" type="file" id="files" accept="image/jpeg,image/jpg,image/png,application/pdf" name="file[]" multiple/>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="description">Descrição</label>
                                    <ul class="text-danger">
                                        <li id="description"></li>
                                    </ul>
                                    <textarea id="summernote" name="description" placeholder="Sua mensagem">{{ old('description') }}</textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary b-radius-5">Enviar</button>
                                    <a href="{{ route('supports.indexuser') }}">
                                        <button type="button" class="btn btn-round b-radius-5">Cancelar</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
    @slot('scripts')
        <script src="{{ asset('/files/bower_components/summernote/summernote.min.js') }}"></script>
        <script>
            //FUNÇÃO DO TEXTAREA COM SUMMERNOTE
            $(document).ready(function() {
                $('#summernote').summernote();
            });

            const form = document.getElementById('create-support')
            form.addEventListener('submit', function (e){
                e.preventDefault()
                const formData = new FormData(this)
                $.ajax({
                    url: '{{ route('supports.store') }}',
                    type: 'POST',
                    enctype: "multipart/form-data",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(data){

                        //REDIRECIONA PARA A PAGINA
                        window.location = '{{ route('supports.indexuser', Auth::user()->id) }}'

                        //OBTEM DADOS PARA ENVIAR NOTIFICAÇÃO
                        let info = { msg: 'support-create', support: data.id }

                        //NOTIFICA OS ADMINISTRADORES
                        connectionWeb.send(JSON.stringify(info));

                    },
                    error: function(data){
                        console.log(data)
                        let errors = JSON.parse(data.responseText)
                        $('#subject').text(errors.errors.subject)
                        $('#description').text(errors.errors.description)
                    }
                });
            })
        </script>
    @endslot
</x-layout>
