<x-layout>
    @slot('stylesheet')
        <link href="{{ asset('/files/bower_components/summernote/summernote.min.css') }}" rel="stylesheet">
    @endslot
    @slot('slot')
        <div class="row justify-content-center">
                <div class="col-xl-4 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h6 class="text-primary"><p><b>@if($support->status == 4) Esse Ticket ja foi concluido! @else Seu ticket foi resolvido? @endif</b></p></h6>
                                    <!-- VERIFICA SE O TICKET JA FOI FINALIZADO -->
                                    @if($support->status != 4)
                                    <form method="POST" action="{{ route('supports.update', $support->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input hidden name="status" value="4">
                                        <input hidden name="subject" value="{{ $support->subject }}">
                                        <input hidden name="description" value="{{ $support->description }}">
                                        <input hidden name="user" value="{{ $support->user }}">
                                        <input hidden name="unidade_id" value="{{ $support->unidade_id }}">
                                        <button id="submit" type="submit" class="btn b-radius-5 btn-success">Finalizar</button>
                                    </form>
                                    @endif
                                    <!-- VERIFICA SE O TICKET JA FOI FINALIZADO -->
                                </div>
                            </div>
                        </div>
                        <!-- VERIFICA SE O TICKET JA FOI FINALIZADO -->
                        @if($support->status != 4)
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card table-card p-3">
                                <form id="answer-support" method="POST" class="row" action="{{ route('supportsanswers.storeuser') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input hidden type="number" class="form-control" name="support_id" id="support_id" value="{{ $support->id }}">
                                    <input hidden type="number" class="form-control" name="user" id="user" value="{{ Auth::user()->id }}">
                                    <input hidden type="number" class="form-control" name="unidade_id" id="unidade_id" value="{{ Session::get('unidade') }}">
                                    <div class="col-12">
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
                                        <label for="summernote">Resposta</label>
                                        <ul class="text-danger">
                                            <li id="answer"></li>
                                        </ul>
                                        @if ($errors->get('answer'))
                                            <ul class="text-danger">
                                                @foreach ((array) $errors->get('answer') as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <textarea id="summernote" name="answer" placeholder="Sua mensagem">{{ old('answer') }}</textarea>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button id="submit" type="submit" class="btn btn-primary b-radius-5">Responder</button>
                                        <a href="{{ route('supports.indexuser') }}">
                                            <button type="button" class="btn btn-round b-radius-5">Cancelar</button>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        <!-- VERIFICA SE O TICKET JA FOI FINALIZADO -->
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
            <div class="col-xl-8 col-md-12 col-12 ">
                <div class="card comment-block">
                    <div class="card-header">
                        <span style="color: #919aa3;font-size: 13px" class="f-right">{{ date('d/m/Y H:i', strtotime($support->created_at)) }}</span>
                        <b>{{ Helper::getUserTitle($support->user) }}</b><br>
                        <span>Unidade: <b>{{ Helper::getUnidadeTitle($support->unidade_id) }}</b></span>
                    </div>
                    <div class="card-block">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-body">
                                    <b class="">Assunto: </b><span class="f-12 m-l-5">{{ $support->subject }}</span>
                                    <p class="mt-3"><b>Descrição:</b></p>
                                    <span>{!! $support->description !!}</span>
                                    <div class="mt-5">
                                        <div class="task-list-table">
                                            @foreach($uploads as $upload)
                                                @if($upload->extension == 'pdf')
                                                    <a class="ml-2 text-pink" target="_blank" href="{{ $upload->url }}">Arquivo PDF</a>
                                                @else
                                                    <a class="ml-2" target="_blank" href="{{ $upload->url }}"><img class="img-fluid img-radius" src="{{ $upload->url }}" alt="1"></a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach($answersAndUp as $answerAndUp)
                                        <div class="media mt-2 ml-5">
                                            <a class="media-left" href="#">
                                                @if(Helper::getUser($answerAndUp['answer']->user)->funcao == 1)
                                                    <label class="label label-danger">Suporte</label>
                                                @else
                                                    <label class="label label-warning">Usuario</label>
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <span style="color: #919aa3;font-size: 13px" class="f-right">{{ date('d/m/Y H:i', strtotime($answerAndUp['answer']->created_at)) }}</span>
                                                <b>{{ Helper::getUserTitle($answerAndUp['answer']->user) }}</b><br>
                                                @if(Helper::getUser($answerAndUp['answer']->user)->funcao == 1)
                                                    <span>Administrador</span>
                                                @else
                                                    <span>Unidade: <b>{{ Helper::getUnidadeTitle($answerAndUp['answer']->unidade_id) }}</b></span>
                                                @endif
                                                <p class="mt-3">{!! $answerAndUp['answer']->answer !!}</p>
                                                <div class="mt-5">
                                                    <div class="task-list-table">
                                                        @foreach($answerAndUp['uploads'] as $upload)
                                                            @if($upload->extension == 'pdf')
                                                                <a class="ml-2 text-pink" target="_blank" href="{{ $upload->url }}">Arquivo PDF</a>
                                                            @else
                                                                <a class="ml-2" target="_blank" href="{{ $upload->url }}"><img class="img-fluid img-radius" src="{{ $upload->url }}" alt="1"></a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Nested media object -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
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

                const form = document.getElementById('answer-support')
                form.addEventListener('submit', function (e){
                    e.preventDefault()
                    const formData = new FormData(this)

                    $.ajax({
                        url: '{{ route('supportsanswers.storeuser') }}',
                        type: 'POST',
                        enctype: "multipart/form-data",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data){

                            //REDIRECIONA PARA A PAGINA
                            window.location.reload()

                            //OBTEM DADOS PARA ENVIAR NOTIFICAÇÃO
                            let info = { msg: 'support-answer', support: {{ $support->id }} }

                            //NOTIFICA OS ADMINISTRADORES
                            connectionWeb.send(JSON.stringify(info));

                        },
                        error: function(data){
                            let errors = JSON.parse(data.responseText)
                            if(errors.errors.answer){
                                $('#answer').text('O campo resposta é obrigatório')
                            }
                            $('button').removeAttr('disabled');
                            $('#button-loading').html('Responder');
                            $('#button-loading').css({ 'font-size': '14px' });
                        }
                    });
                })
            </script>
    @endslot
</x-layout>
