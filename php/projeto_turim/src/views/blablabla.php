<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <title>Pessoas</title>
    <?php
        require __DIR__ . "/../../style/reset.html";
        require __DIR__ . "/../../style/style.html"; 

    ?>
</head>
<body>

    <table>
    <tr>
        <th id="titulo">
            Pessoas
        </th>
    </tr>
    <tr>
        <?php
            foreach($pessoas as $pessoa){
        ?>
        <th class="nomes" id="nome<?=$pessoa->id?>">

            <?php echo $pessoa->nome; ?>

            <input type="text">
                <button class="add-filho" action="" onclick="criaFilho(<?= $pessoa->id?>)">add filho</button>

                <?php
                    $filhos = $filhoController->select($pessoa->id);
                    foreach($filhos as $filho){ 
                ?>           
                <tr class="filho" id="filho<?=$filho->id?>">
                    <th ondblclick="apagar('filho<?=$filho->id?>')">
                        <?php echo $filho->nome;?>
                    </th>
                </tr>
                <?php } ?>
        </th>
    </tr>
        <?php } ?>
    </table>


    <?php
    require __DIR__ . "/../../style/escondeMostraInfo.php"; 
   // require __DIR__ . "/../Routes/routes.php";
    ?>


    

</body>
</html>


