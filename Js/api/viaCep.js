function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('estado').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);
    } else {
        //CEP não Encontrado.
        limpa_formulário_cep();

        let input = document.getElementById('cep');
        let divPai = input.parentNode;

        adicionarMensagem("Cep não encontrado!", divPai);
    }
}

function pesquisacep(campo) {
    campo = campo.target
    var valor = campo.value
    
    removeErro(campo);
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        
        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('cidade').value= " ...";
            document.getElementById('estado').value= " ...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } else {
            //cep é inválido.
            limpa_formulário_cep();

            let input = document.getElementById('cep');
            let divPai = input.parentNode;
            adicionarMensagem("Formato de CEP inválido", divPai);
        }
    }
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}