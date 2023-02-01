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

//FUNÇÃO PARA ALTERAR STATUS
setTimeout(function (){
    document.getElementById('statusUser').classList.remove('bg-success')
    document.getElementById('statusUser').classList.add('bg-yellow')
    setTimeout(function (){
        document.getElementById('statusUser').classList.remove('bg-warning')
        document.getElementById('statusUser').classList.add('bg-danger')
    }, 60*60000)
}, 15*60000)
