<?php 
    require('../verificacaoAutencidade.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $data = $_GET['info'];
    ?>
    <form id="formEdit" action="./action/edit.php" method="POST">
        <input type="hidden" name="info[]" value="<?= $data[0] ?>">
        <input type="text" name="info[]" value="<?= $data[1] ?>">
        <input type="text" name="info[]" value="<?= $data[2] ?>">
        <input type="text" name="info[]" value="<?= $data[3] ?>">
        <input type="submit" value="editar">
    </form>
    <script>
        const form = document.querySelector('#formEdit');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const verificar = confirm('tem certeza que deseja modificar essas informações ?');
            if(verificar){
                form.submit();
            }
        })
    </script>
</body>
</html>