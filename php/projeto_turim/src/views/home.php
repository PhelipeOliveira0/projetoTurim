<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require __DIR__ ."/../../style/reset.html"?>
    <?php require __DIR__ . "/../../style/style.html"?>
    <title>Home</title>
</head>
<body>
<div id="botao">
    <form action="jobs/gravarInfo.php" method="post">
        
        <textarea id="json" cols="150" rows="50" name="textAreaJson" ><?=$_GET["var"]; ?></textarea>
        <input type="submit" id="gravar" class="botao_json" value="gravar">
    </form>
    <form action="jobs/buscarInfo.php" method="post">
        <input type="submit" id="ler" class="botao_json" value="ler">

    </form>

</div>
<div class="div_input_nome">
    <label for="input_nome">Nome</label>
    <input type="text" id="input_nome" placeholder="insira o nome aqui">
    <button id="adiciona_pessoa" class="botao_json" onclick="inserePessoaJson()">Adicionar pessoa</button>
</div>

    <div id="tabela">
        
        <table id="tabela_info">
            <tr>
                <th id="cabecalho">Pessoas</th>
            </tr>   
        </table>

        
    </div>

</body>
</html>
<?php require __DIR__ . "/../../style/tabelajs.php"?>
<?php require __DIR__ . "/../../style/funcoes.php"?>



