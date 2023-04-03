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


