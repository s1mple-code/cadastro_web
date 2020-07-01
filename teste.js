function validar(){
    var nome = form_user.nome.value;
    var email = form_user.email.value;
    var telefone = form_user.telefone.value;
    var cpf = form_user.cpf.value;
    var ddd = form_user.ddd.value;
    
    if(nome == "" || email == "" || telefone == "" || cpf == "" || ddd == ""){
        alert('É necessario preencher todos os campos!');
        form_user.nome.focus();
        return false;
    }
}
function consulta(){
    location.href="consulta_pagina.html"
}