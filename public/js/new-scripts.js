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
