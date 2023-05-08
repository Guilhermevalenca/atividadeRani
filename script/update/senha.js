const table = document.querySelector('#table');
const tr = table.querySelector('#verificarSenha');
const button = document.querySelector('.verificacao');

button.addEventListener('click', (event) => {
    const senhas = tr.querySelectorAll(".senhaAtual");
    if(senhas[0].value != senhas[1].value){
        alert('voce errou sua senha!!!');
    }else{
        tr.remove();
        const newTr = document.createElement('tr');
        const newTd = document.createElement('td');
        newTr.appendChild(newTd);
        const newForm = document.createElement('form');
        newForm.action = "/crud/update/editarConta.php";
        newForm.method = "POST";
        newTd.appendChild(newForm);
        const inputSenha = document.createElement('input');
        inputSenha.name = "senha";
        inputSenha.type = "password";
        inputSenha.class = "senha";
        inputSenha.placeholder = "digite sua nova senha";
        inputSenha.required = true;
        newForm.appendChild(inputSenha);
        const inputConfirme = document.createElement('input');
        inputConfirme.name = "confirme";
        inputConfirme.type = "password";
        inputConfirme.class = "senha";
        inputConfirme.placeholder = "confirme sua nova senha";
        newForm.appendChild(inputConfirme);
        const inputSubmit = document.createElement('input');
        inputSubmit.value = "editar senha";
        inputSubmit.type = "submit";
        newForm.appendChild(inputSubmit);
        table.appendChild(newTr);
    }
    newForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const novaSenha = newForm.querySelectorAll('.senha');
        if(novaSenha[0].value != novaSenha[1].value){
            alert('senhas diferentes!!!');
        }else{
            form.submit();
        }
    })
})