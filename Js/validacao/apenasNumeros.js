function numero(input) {
    const campo = input.target
    removeErro(campo);

    const valor = campo.value;
    const regex = /\D/g;
    
    campo.value = valor.replace(regex, '');
}