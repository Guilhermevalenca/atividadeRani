const form = document.querySelector('#formCreate');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const senhas = form.querySelectorAll('.senha');

    if(senhas[0].value != senhas[1].value){
        alert('voce digitou senhas diferentes');
    }else{
        const verificacao = new XMLHttpRequest();
        verificacao.onreadystatechange = function () {
            if(this.readyState === 4 && this.status === 200){
                if(this.responseText == "proibidoPassagem"){
                    alert('voce nao pode criar sua conta, dados ja cadastrados!!!');
                }else{
                    form.submit();
                }
            }
        }
        const data = new FormData();
        const user = form.querySelector('#user');
        data.append('user',user.value);
        const email = form.querySelector('.email');
        data.append('email',email.value);
        verificacao.open('POST', '/crud/verificacao/verificarExistenciaUsuario.php', true);
        verificacao.send(data);
    }
})