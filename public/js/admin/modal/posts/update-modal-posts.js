function verificaErro(titulo, erroTitulo, avaliacao, erroAvaliacao, formEdit){
    event.preventDefault();

    const title = document.getElementById(titulo).value;
    const avaliation = document.getElementById(avaliacao).value;

    let valid = true;

    if(!title){
        document.getElementById(erroTitulo).style.display = "block";
        document.getElementById(erroTitulo).innerText = "título é obrigatório";
        valid = false;
    }

    if(!avaliation){
        document.getElementById(erroAvaliacao).style.display = "block";
        document.getElementById(erroAvaliacao).innerText = "Avaliação é obrigatória";
        valid = false;
    }


    if(!valid) return;

    document.getElementById(formEdit).submit();
}