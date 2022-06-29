<?php 
require_once('MyConnect.php');
require_once('Databaseable.php');
require_once('WithDatabaseable.php');
require_once('Agente.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Adicionar Modelo</h3>

    <form action="adiciona_modelo.php" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id=""><br>

        <label for="agente">Agente:</label>
        <select name="agente" id="">
            <option value="">Sem Agente</option>
            <?php
                $agentes = Agente::search([],[],[]);
                foreach($agentes as $agente){?>
                    <option value="<?php echo $agente->getId();?>"><?php echo $agente->getMulta(); ?></option>
                <?php }
            ?>
            
        </select>

        <br><br>
        <input type="submit" value="Registar">

    </form>
</body>
</html>