//NÃO DEIXA O MENU DE NOTIFICAÇÕES FECHAR AO CLICAR EM VER TODAS
$(document).on('click', '#notifications', function(e) {
    e.stopPropagation();
});

//CHAMA A FUNÇÃO DE NOVAS NOTIFICAÇÕES
newsNotify();

//OBTEM A QUANTIDADE DE NOTIFICAÇÕES NOVAS
function newsNotify() {
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        type: "POST",
        url: "/notifications/quantity",
        dataType: "json",
        success: function(data) {
            if(data){
                let html =
                    '<span  class="badge bg-c-yellow">' + data + '</span>\n'
                $('#qtdNotify').append(html);
            }
        },
        error: function(data) {
            console.log(data)
        }
    });
}

//QTD DE NOTIFICAÇÕES INICIAL
let listnotify = 5

//ADICONA 5 NOTIFICAÇÃO NA LISTA A CADA CLICK
function clickLista() {
    listnotify += 5;
    abrirNotificacoes()
}

//FUNÇÃO PARA OBTER AS NOTIFICAÇÕES
function abrirNotificacoes(){
    //BUCAS TODAS AS NOTIFIÇÕES
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        type: "POST",
        url: '/notifications/get',
        data: {
            limit: listnotify,
        },
        dataType: "json",
        beforeSend: function(xhr) {},
        success: function(data) {
            //VERIFICA SE EXISTE NOTIFICAÇÃO
            if (data){
                let html = '';
                data.forEach(function (data){
                    const dados = JSON.parse(data.data)

                    //VERIFICA SE A NOTIFICAÇÃO JA FOI LIDA
                    let seen = data.seen ? '' : '<label class="label f-right label-success">New</label>\n'

                    html +=
                        '<li>\n' +
                        '<a class="p-0" href="' + dados.url + '">\n' +
                        '<div class="media">\n' +
                        '<i style="font-size: 30px" class="feather text-warning icon-help-circle mr-2 mt-1"></i>\n' +
                        '<div class="media-body">\n' +
                        seen +
                        '<span style="font-size: 14px" class="notification-user">' + dados.title + '</span>\n' +
                        '<p style="font-size: 12px" class="notification-msg">' + dados.content + '</p>\n' +
                        '<span class="notification-time">' + dados.date + '</span>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '</a>\n' +
                        '</li>\n'

                })
                $('#bodyNotifications').html(html)
            }

        },
        error: function(data) {
            console.log(data)
        }

    });
}

//MARCA COMO LIDA AS NOTIFICAÇÕES NOVAS
function seenNotyfy() {
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        type: "POST",
        url: "/notifications/seen",
        dataType: "json",
        success: function(data) {
        },
        error: function(data) {
            console.log(data)
        }
    });
}
