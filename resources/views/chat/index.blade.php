<x-layout>
    @slot('stylesheet')
        <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/pages/message/message.css') }}">
    @endslot

    @slot('slot')
            <div class="message">
                <div class="row">
                    <!-- Message section start -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="txt-white">Unidade: {{ \App\Helpers\Helper::getUnidadeTitle(Session::get('unidade')) }}</div>
                                        </div>
                                    <i class="icon-options-vertical f-24 p-absolute msg-ellipsis hidden-md-down"></i>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-lg-9 col-md-12 messages-content">
                                        <div id="content" style="overflow-y: auto;height: 55vh">
                                        </div>
                                        <hr>
                                        <div class="messages-send">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="name" hidden type="text"  class="form-control new-msg" value="{{ Auth::user()->name }}">
                                                    <input id="message" type="text"  class="form-control new-msg" placeholder="Escreva sua mensagem..." aria-describedby="basic-addon2">
                                                    <span id="send" class="input-group-addon bg-white" ><i class="icofont icofont-paper-plane f-18 text-primary"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 message-left">
                                        <div class="card-block user-box contact-box assign-user" style="overflow-y: auto;height: 60vh" >
                                            @foreach ($total as $on)
                                                @if(Cache::has('user-is-online-' . $on->id))
                                                    <div class="media">
                                                        <div class="media-left media-middle photo-table">
                                                            <a href="#">
                                                                <i class="feather icon-user text-success f-20"></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6><b>{{ $on->name }}</b></h6>
                                                            <p>Online</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Message section end -->
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <aside class="col-6" style="height: 80vh">--}}
{{--                    <img src="{{ asset('/files/assets/images/Icon ionic-ios-chatboxes.png') }}" alt="Chat" title="Chat"/>--}}
{{--                    {{ Session::get('usersChat') }}--}}
{{--                    <form id="form1">--}}
{{--                        <input type="text" disabled placeholder="Digite seu nome..." name="name" id="name" value="{{ Auth::user()->name }}" />--}}
{{--                        <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />--}}
{{--                    </form>--}}

{{--                    <button  id="btn1">Enviar</button>--}}
{{--                </aside>--}}

{{--                <section style="overflow:auto;height: 80vh" class="col-6" id="content">--}}
{{--                </section>--}}
{{--            </div>--}}
    @endslot

    @slot('scripts')
        <script>

            var connectionChat = new WebSocket('ws://127.0.0.1:8055');

            connectionChat.onopen = function(e) {
                console.log("Cenectado ao Chat!");
            };

            connectionChat.onmessage = function(e) {
                let user = JSON.parse(e.data)
                if (user && user.length > 1) {
                    user.forEach(function (data) {
                        let userid = JSON.parse(data)
                        if(userid.id === {{ Auth::user()->id }}){
                            showMessages('me', data)
                        } else {
                            showMessages('other', data)
                        }
                    })
                } else {
                    showMessages('other', e.data)
                }

            };

            // conn.send('Hello World!');
            ///////////////////////////////////////////////
            var inp_message = document.getElementById('message');
            var inp_name = document.getElementById('name');
            var btn_env = document.getElementById('send');
            var area_content = document.getElementById('content');

            btn_env.addEventListener('click', function(){
                if (inp_message.value !== '') {

                    //FUNÇÃO PARA ADICIONAR UM ZERO
                    function adicionaZero(numero) {
                        if (numero <= 9)
                            return "0" + numero;
                        else
                            return numero;
                    }

                    var dataAtual = new Date();
                    var dia = adicionaZero(dataAtual.getDate());
                    var mes = adicionaZero((dataAtual.getMonth() + 1));
                    var ano = dataAtual.getFullYear();
                    var horas = dataAtual.getHours();
                    var minutos = dataAtual.getMinutes();

                    var msg = {'id': {{ Auth::user()->id }}, 'name': inp_name.value, 'msg': inp_message.value, 'date': horas + ":" + minutos + "h. de " + dia + "/" + mes + "/" + ano};
                    msg = JSON.stringify(msg);

                    connectionChat.send(msg);

                    showMessages('me', msg);

                    inp_message.value = '';
                }
            });

            function showMessages(how, data) {
                let message = JSON.parse(data)
                // console.log(data);

                let html

                if(how === 'other'){
                    html =
                        '<div class="media">' +
                        '<div class="media-left friend-box">' +
                        '<a href="#">' +
                        '<span>' + message.name + '</span>' +
                        '</a>' +
                        '</div>' +
                        '<div class="media-body">' +
                        '<p class="msg-send">' + message.msg + '</p>' +
                        '<p><i class="icofont icofont-wall-clock f-12"></i>' + message.date + '</p>' +
                        '</div>' +
                        '</div>'
                } else {
                    html =
                        '<div class="media">' +
                        '<div class="media-body text-right">' +
                        '<p class="msg-reply bg-primary">' + message.msg + '</p>' +
                        '<p><i class="icofont icofont-wall-clock"></i>' + message.date + '</p>' +
                        '</div>' +
                        '<div class="media-right friend-box">' +
                        '<a href="#">' +
                        '<span>' + message.name + '</span>' +
                        '</a>' +
                        '</div>' +
                        '</div>'
                }

                $('#content').append(html);
                area_content.scrollTop = area_content.scrollHeight
            }
        </script>
    @endslot
</x-layout>
