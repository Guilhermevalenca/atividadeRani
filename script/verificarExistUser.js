const form = document.querySelector('#formLogin');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const autenticar = new XMLHttpRequest();
    autenticar.onreadystatechange = function () {
        if(this.readyState === 4 && this.status === 200){
            if(this.responseText == "naoAutenticar"){
                alert('Conta que voce esta tentando acessar, nao existe!');
            }else{
                form.submit();
            }
        }
    }
    const data = new FormData();
    const email = form.querySelector('.email');
    data.append('email',email.value);
    const senha = form.querySelector('#senha');
    data.append('senha',senha.value);
    autenticar.open('POST', '/crud/verificacao/autenticacaoUser.php', true);
    autenticar.send(data);
})