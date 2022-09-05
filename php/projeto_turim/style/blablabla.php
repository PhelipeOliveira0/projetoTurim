<?php

    use php\projeto_turim\Models\{Pessoa,Filho};
    use php\projeto_turim\Controllers\{PessoaController,FilhoController};


?>

<script>

function apagar(id){
    filho = document.getElementById(id);
    if(!confirm("quer apagar este filho?")){
        return;
    }
    alert("você apagou este filho")
    filho.classList.add("apagar");
    
    setTimeout(function(){
        filho.hidden = true;
    },500);


}



function criaFilho(id){
    let nomeF = prompt("Nome para o filho")
    
    let filhoId = Math.floor((Math.random() * 1000) + 1);

    let tr = document.createElement("tr");
    tr.classList.add("filho");
    tr.setAttribute('id', `filho${filhoId}`);
    
    let th = document.createElement("th");
    th.textContent = nomeF;
    th.setAttribute("ondblclick",`apagar('filho${filhoId}')`);

    let pessoa = document.getElementById(`nome${id}`);
 
    tr.appendChild(th);
    console.log(tr);
    pessoa.appendChild(tr);

    window.open("/adicionaFilho");

    <?php
    if($_SERVER["PATH_INFO"] === "/adicionaFilho"){
    $id = "document.write(filhoId)";
    $nome = "document.write(nomeF)";
    $pessoaId = "document.write(id)";
        
    $filho = new Filho(echo $id,echo $nome,echo $pessoaId);
    //$filhoController->insert($filho);
    }
    ?>

}


</script>