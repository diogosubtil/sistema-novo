//FUNÇÃO PARA ALTERAR STATUS ONLINE NO PERFIL
setTimeout(function (){
    document.getElementById('statusUser').classList.remove('text-success')
    document.getElementById('statusUser').classList.add('text-danger')
}, 15*60000)

//FUNÇÃO PARA MOSTRAR MENU ATIVO
window.onload = function activeMenu(){
    let li = document.getElementById(window.location.href) // PAGINA
    let ul = li.parentElement.parentElement // MENU
    let ull = ul.parentElement.parentElement // SUB MENU

    li.classList.add('active')
    ul.classList.add('pcoded-trigger')
    ull.classList.add('pcoded-trigger')
}
