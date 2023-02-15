<x-layout>
    @slot('stylesheet')
        <style>
            * {
                padding:0;
                margin:0;
                box-sizing: border-box;
                font-family: 'Segoe UI', 'Arial';
            }

            body{
                display: flex;
            }

            aside {
                background: #FFAF71;
                width: 650px;
                height: 100vh;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                /*grid-template-rows: 460px 160px 70px;*/
                grid-template-rows: 50% 25% 25%;
                align-items: center;
            }

            aside > img {
                grid-row: 1/2;
                grid-column: 2/3;
                margin:0 auto;
                width: 215px;
                height: 215px;
            }

            form {
                grid-row: 2/3;
                grid-column: 2/3;
                align-self: flex-end;
            }

            form > input{
                width: 374px;
                height: 40px;
                margin-bottom: 20px;
                border:0;
                border-radius: 5px;
                background: #EEEEEE;
                opacity: .7;
                padding: 10px 20px;
            }

            aside > button{
                width: 374px;
                height: 40px;
                grid-row: 3;
                grid-column: 2/3;
                border:0;
                border-radius: 5px;
                background: #232F48;
                color:#FBFBFB;
                text-align: center;
            }

            aside > button:hover{
                opacity: .8;
                box-shadow: 2px 2px 2px #444;
                transition: all .3s;
                cursor: pointer;
            }

            section {
                background: #FFFFFF;
                width: calc(100% - 650px);
                height: 100vh;
                padding: 40px 50px;
            }

            .me {
                display: flex;
                align-items: center;
                text-align: left;
                justify-content: flex-start;
                margin: 25px 0px;
            }

            .me > img {
                width: 53px;
                height: 47px;
                margin-right: 35px;
            }

            .me > .text > h5, .other > .text > h5{
                font-size: 15px;
                color: #232F48;
            }

            .me > .text > p, .other > .text > p{
                font-size: 15px;
                color: #232F48;
                opacity: .68;
            }

            .other {
                display: flex;
                align-items: center;
                text-align: right;
                margin: 25px 0px;
                flex-direction: row-reverse;
            }

            .other > img {
                width: 53px;
                height: 47px;
                margin-left: 35px;
                justify-self: flex-end;
            }

            /*Media Queries*/

            @media (max-width: 1250px){
                aside {
                    width: 320px;
                }

                aside > img {
                    width: 155px;
                    height: 155px;
                }

                form > input{
                    width: 250px;
                }

                aside > button{
                    width: 250px;
                }

                section {
                    width: calc(100% - 320px);
                    padding: 30px 40px;
                }

                .me > img {
                    width: 50px;
                    height: 43px;
                    margin-right: 33px;
                }
            }

            @media (max-width: 650px){
                aside {
                    width: 240px;
                }

                aside > img {
                    width: 115px;
                    height: 115px;
                }

                form > input{
                    width: 210px;
                    padding: 10px 15px;
                }

                aside > button{
                    width: 210px;
                }

                section {
                    width: calc(100% - 240px);
                    padding: 20px 30px;
                }

                .me > img {
                    width: 30px;
                    height: 25px;
                    margin-right: 20px;
                }

                .me > .text > h5, .other > .text > h5{
                    font-size: 14px;
                }

                .me > .text > p, .other > .text > p{
                    font-size: 14px;
                }
            }

        </style>
    @endslot

    @slot('slot')
            <div class="row">
            <aside class="col-6">
                <img src="{{ asset('/files/assets/images/Icon ionic-ios-chatboxes.png') }}" alt="Chat" title="Chat"/>

                <form id="form1">
                    <input type="text" disabled placeholder="Digite seu nome..." name="name" id="name" value="{{ Auth::user()->name }}" />
                    <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />
                </form>

                <button  id="btn1">Enviar</button>
            </aside>

            <section class="col-6" id="content">
            </section>
        </div>
    @endslot

    @slot('scripts')
        <script>
            //WebSocket
            var conn = new WebSocket('ws://127.0.0.1:8090');

            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                // console.log(e.data);
                showMessages('other', e.data);
            };

            // conn.send('Hello World!');
            ///////////////////////////////////////////////
            var form1 = document.getElementById('form1');
            var inp_message = document.getElementById('message');
            var inp_name = document.getElementById('name');
            var btn_env = document.getElementById('btn1');
            var area_content = document.getElementById('content');

            btn_env.addEventListener('click', function(){
                if (inp_message.value !== '') {
                    var msg = {'name': inp_name.value, 'msg': inp_message.value};
                    msg = JSON.stringify(msg);

                    conn.send(msg);

                    showMessages('me', msg);

                    inp_message.value = '';
                }
            });


            function showMessages(how, data) {
                data = JSON.parse(data);

                // console.log(data);

                if (how === 'me') {
                    var img_src = "{{ asset('/files/assets/images/Icon awesome-rocketchat.png') }}";
                } else if (how === 'other') {
                    var img_src = "{{ asset('/files/assets/images/Icon awesome-rocketchat-1.png') }}";
                }

                var div = document.createElement('div');
                div.setAttribute('class', how);

                var img = document.createElement('img');
                img.setAttribute('src', img_src);

                var div_txt = document.createElement('div');
                div_txt.setAttribute('class', 'text');

                var h5 = document.createElement('h5');
                h5.textContent = data.name;

                var p = document.createElement('p');
                p.textContent = data.msg;

                div_txt.appendChild(h5);
                div_txt.appendChild(p);

                div.appendChild(img);
                div.appendChild(div_txt);

                area_content.appendChild(div);
            }
        </script>
        <script>

        </script>
    @endslot
</x-layout>
