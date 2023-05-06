"use strict"
//FUNÇÃO PARA ALTERAR STATUS ONLINE NO PERFIL
setTimeout(function (){
    document.getElementById('statusUser').classList.remove('text-success')
    document.getElementById('statusUser').classList.add('text-danger')
}, 15*60000)

//FUNÇÃO DE CONFIRMAÇÃO DE EXCLUSÃO
function formDelet(form) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger  ml-2',
            cancelButton: 'btn btn-success'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Tem certeza?',
        text: "Você não será capaz de reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Não, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit()
        }
    })
}

//FUNÇÃO PARA SELCIONAR A UNIDADE EXIBIDA
function setUnidade(id){
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        url: '/unidades/setUnidade',
        data: {
            unidade: id,
        },
        type: 'POST',
        success: function(data){
            window.location.reload()
        },
        error: function(data){
            console.log(data)
        }
    });
}

//FUNÇÃO PARA INPUT PERSONALIZADO DE UPLOAD
var enviar = document.getElementsByClassName("botaoArquivo")[0];
var input = document.getElementById("files");
if (input){
    input.addEventListener("change", function(){
        enviar.value = input.files.length + ' Arquivo selecionado.';
    });
}

//FUNÇÃO DE LOADING PARA BUTTONS SUBMIT
const button_submit = document.querySelectorAll('button[type="submit"]')
button_submit.forEach(function (value) {
    value.addEventListener('click', function () {
        this.innerHTML =
            '<div id="button-loading" style="height: 19px!important"  class="preloader3 loader-block">' +
            '<span style="font-size: 14px;color: white" >Carregando</span> \n' +
            '<div style="height: 5px;width: 5px;margin-top: 30px" class="circ1 loader-default"></div>\n' +
            '<div style="height: 5px;width: 5px;margin-top: 30px" class="circ2 loader-default"></div>\n' +
            '<div style="height: 5px;width: 5px;margin-top: 30px" class="circ3 loader-default"></div>\n' +
            '<div style="height: 5px;width: 5px;margin-top: 30px" class="circ4 loader-default"></div>\n' +
            '</div>\n';
    })
})
$(document).on('submit', 'form', function() {
    $('button').attr('disabled', 'disabled');
});


