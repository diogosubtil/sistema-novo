function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('cidade').value="";
    document.getElementById('cidadeText').innerText="";
    document.getElementById('bairro').value="";
    document.getElementById('bairroText').innerText="";
    document.getElementById('estado').value="";
    document.getElementById('estadoText').innerText="";
    document.getElementById('endereco').value="";
    document.getElementById('enderecoText').innerText="";
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        console.log(conteudo)
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('estado') ? document.getElementById('estado').value=(conteudo.uf) : null;
        document.getElementById('endereco').value=(conteudo.logradouro);

        if (document.getElementById('cidadeText')){
            document.getElementById('cidadeText').innerText=(conteudo.localidade);
            document.getElementById('estadoText').innerText=(conteudo.uf);
            document.getElementById('enderecoText').innerText=(conteudo.logradouro);
            document.getElementById('bairroText').innerText=(conteudo.bairro);
        }



    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.

            document.getElementById('cidade').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('estado') ? document.getElementById('estado').value="..." : null;
            document.getElementById('endereco').value="...";

            if (document.getElementById('cidadeText')){
                document.getElementById('cidadeText').value="...";
                document.getElementById('enderecoText').value="...";
                document.getElementById('estadoText').value="...";
                document.getElementById('bairroText').value="...";
            }

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};
