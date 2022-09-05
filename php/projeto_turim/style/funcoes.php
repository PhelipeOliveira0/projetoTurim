<script>





    


    class ObjetoDePessoas{
        constructor(pessoas){
            this.pessoas = pessoas;
        }
    }

    function inserePessoaJson(){
        const nome = document.getElementById("input_nome");

        if(nome.value === ""){
            return;
        }

        const pessoa = new Pessoa(contadorPessoa,nome.value);
        nome.value = "";
        let textArea = document.getElementById("json");
        
        let jsonPessoa = JSON.stringify(pessoa);
        array.push(jsonPessoa);
        arrayObj.push(pessoa);
        //textArea

        let conjuntoDePessoas = new ObjetoDePessoas(arrayObj);
        let conjuntoDePessoasJson = JSON.stringify(conjuntoDePessoas);
        textArea.value = conjuntoDePessoasJson;

        //atributos da tabela
        let tabela = document.getElementById("tabela_info");
        let div = document.createElement("div");
        let objetoPessoa = JSON.parse(jsonPessoa);
        let tr = document.createElement("tr");
        let th = document.createElement("th");
        let botao = document.createElement("th");
        let trFilho = document.createElement("tr");
        let botaoFilho = document.createElement("button");
        let divFilho = document.createElement("div");


        //elementos
        divFilho.setAttribute("id",`filhos${contadorPessoa}`);
        divFilho.classList.add("filhosDiv");

        botaoFilho.textContent = "Adicionar filho";
        botaoFilho.classList.add("botaoAddFilho");
        botaoFilho.setAttribute("id",`adiciona${contadorPessoa}`);
        botaoFilho.setAttribute("onclick",`adicionaFilho(${contadorPessoa})`);
        
        botao.textContent = "apagar";
        botao.classList.add("botaoApagaPessoa");
        botao.setAttribute("ondblclick",`deletaPessoa(${objetoPessoa.id})`);
        botao.classList.add(contadorPessoa);

        th.textContent = objetoPessoa.nome;
        th.classList.add("pessoaTh");
        th.setAttribute("id",`pessoa${contadorPessoa}`);
        th.classList.add(contadorPessoa);

        tr.setAttribute("id",`trPessoa${contadorPessoa}`);
        

        //childs
        trFilho.appendChild(botaoFilho);
        tr.appendChild(th);
        tr.appendChild(botao);
        div.appendChild(tr);
        div.appendChild(divFilho);
        div.appendChild(trFilho);
        tabela.appendChild(div);  

        contadorPessoa++;
    }

    function deletaPessoa(id){
        let textArea = document.getElementById("json");
        if(!confirm("voce quer apagar esta pessoa?")){
            return;
        }
        let botao = document.getElementById(`adiciona${id}`);
        let pessoa = document.getElementById(`trPessoa${id}`);
        let filho = document.getElementById(`filhos${id}`);
        pessoa.remove();
        botao.remove();
        filho.remove();
        array.splice(id,1,null); 
        arrayObj.splice(id,1,null);
        let conjuntoDePessoas = new ObjetoDePessoas(arrayObj);
        let jsonConjuntoDeObjetos = JSON.stringify(conjuntoDePessoas);
        textArea.value = jsonConjuntoDeObjetos;

    }

    function adicionaFilho(id){
        let nome = prompt();
        if(nome === "" || !nome){
            alert("a adição foi cancelada");
            return;
        }

        let tr = document.createElement("tr");
        let th = document.createElement("th");
        let thApaga = document.createElement("th");
        
        let tabela = document.getElementById(`filhos${id}`);
        let textArea = document.getElementById("json");

        let pessoaJson = array[id];
        let pessoaObj = JSON.parse(pessoaJson);

        let filho = new Filho(contadorFilho,nome,id);
        let pessoaNome = pessoaObj.nome;
        let pessoaFilho = pessoaObj.filhos;
        let pessoaNovaObj = new Pessoa(id,pessoaNome,pessoaFilho);



        pessoaNovaObj.adiciona(filho);
        
        if(pessoaFilho.length > 0){
            pessoaFilho.forEach((filho)=>{
              pessoaNovaObj.adiciona(filho);
            });
        }
            
        let pessoaNovaJson = JSON.stringify(pessoaNovaObj);
        array.splice(id,1,pessoaNovaJson);
        arrayObj.splice(id,1,pessoaNovaObj);
        let conjuntoDePessoas = new ObjetoDePessoas(arrayObj);
        let jsonConjuntoDeObjetos = JSON.stringify(conjuntoDePessoas);


        tr.setAttribute("id",`filhoTr${contadorFilho}`)

        th.textContent = nome;
        th.classList.add("filhoTh");
    
        let itensApagaF = [id,contadorFilho];
        thApaga.textContent = "apagar";
        thApaga.classList.add("apagaFilho");
        thApaga.setAttribute("id",`apagaFilho${contadorFilho}`);
        thApaga.setAttribute("ondblclick",`deletaFilho(${itensApagaF})`);

        tr.appendChild(th);
        tr.appendChild(thApaga);
        tabela.appendChild(tr);
        textArea.value = jsonConjuntoDeObjetos;
        contadorFilho++;

    }


    function deletaFilho(idPessoa,id){
        let textArea = document.getElementById("json");

        let tr = document.getElementById(`filhoTr${id}`);
        let nomeFilho = tr.firstChild.textContent;
        tr.remove();

        let filho = new Filho(id,nomeFilho,idPessoa);
        let filhoJson = JSON.stringify(filho)

        let pessoaJson = array[idPessoa];
        let pessoaObj = JSON.parse(pessoaJson);

        let filhosArray = pessoaObj.filhos;
        let filhosArrayJson = JSON.stringify(filhosArray);


        let filhoIndex = filhosArray.map(function(e) { return e.id; }).indexOf(id);
        filhosArray.splice(filhoIndex,1);
        console.log(filhosArray);
        pessoaObj.filhos = filhosArray;
        let pessoaJsonFinal = JSON.stringify(pessoaObj);
        console.log(pessoaObj);
        array.splice(idPessoa,1,pessoaJsonFinal);
        arrayObj.splice(idPessoa,1,pessoaObj);
        let conjuntoDeObjetos = new ObjetoDePessoas(arrayObj);
        let conjuntoDeObjetosJson = JSON.stringify(conjuntoDeObjetos);
        textArea.value = conjuntoDeObjetosJson;

        
    }
</script>