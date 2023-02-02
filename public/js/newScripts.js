//FUNÇÃO PARA COMFIRMAÇÃO DELETAR USUARIO
function deactivateUser(id){
    document.getElementById('deactivateUser'+ id).onsubmit = function (e){
        e.preventDefault();
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você deseja desativar este usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, desative!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // <--- prevent form from submitting
            }
        })
    }
}function activateUser(id){
    document.getElementById('activateUser'+ id).onsubmit = function (e){
        e.preventDefault();
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você deseja ativar este usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, ative!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // <--- prevent form from submitting
            }
        })
    }
}

//FUNÇÃO PARA ALTERAR STATUS ONLINE NO PERFIL
setTimeout(function (){
        document.getElementById('statusUser').classList.remove('bg-success')
        document.getElementById('statusUser').classList.add('bg-danger')
}, 15*60000)

//FUNÇÃO PARA MOSTRAR MENU ATIVO
window.onload = function activeMenu(){
    let li = document.getElementById(window.location.href) // PAGINA
    let ul = li.parentElement.parentElement // MENU
    let ull = ul.parentElement.parentElement // SUB MENU

    li.classList.add('active')
    li.lastElementChild.querySelector('span').classList.add('text-primary')
    ul.classList.add('pcoded-trigger')
    ull.classList.add('pcoded-trigger')
}
