//FUNÇÃO PARA ALTERAR STATUS ONLINE NO PERFIL
setTimeout(function (){
    document.getElementById('statusUser').classList.remove('text-success')
    document.getElementById('statusUser').classList.add('text-danger')
}, 15*60000)

//FUNÇÃO PARA MOSTRAR MENU ATIVO
window.onload = function activeMenu(){
    let link = document.getElementById(window.location.href) // PAGINA
    if (link){
        link.classList.add('active')
    }

    let menu
    if (link){
        menu = link.parentElement.parentElement // MENU
        menu.classList.add('pcoded-trigger')
    }

    let submenu
    if (menu){
        submenu = menu.parentElement.parentElement // SUB MENU
        submenu.classList.add('pcoded-trigger')
    }

    if (submenu){
        let submenu1 = submenu.parentElement.parentElement // SUB MENU
        submenu1.classList.add('pcoded-trigger')
    }

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


