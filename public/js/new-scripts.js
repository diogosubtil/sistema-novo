//FUNÇÃO PARA ALTERAR STATUS ONLINE NO PERFIL
setTimeout(function (){
    document.getElementById('statusUser').classList.remove('text-success')
    document.getElementById('statusUser').classList.add('text-danger')
}, 15*60000)

//FUNÇÃO PARA MOSTRAR MENU ATIVO
window.onload = function activeMenu(){
    let link = document.getElementById(window.location.href) // PAGINA
    let menu = link.parentElement.parentElement // MENU
    let submenu = menu.parentElement.parentElement // SUB MENU
    let submenu1 = submenu.parentElement.parentElement // SUB MENU

    link.classList.add('active')
    menu.classList.add('pcoded-trigger')
    submenu.classList.add('pcoded-trigger')
    submenu1.classList.add('pcoded-trigger')
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
input.addEventListener("change", function(){
    enviar.value = input.files.length + ' Arquivo selecionado.';
});

