<script>


    let array = [];
    let arrayObj = [];
    let contadorPessoa = 0;
    let contadorFilho = 0;

    function Pessoa(id,nome){
        this.filhos = [];
        this.id = id;
        this.nome = nome;
    
        
        this.adiciona = function(filho){
            this.filhos.push(filho);
        }
    }


    class Filho{
        constructor(id,nome,id_pessoa){
            this.id = id;
            this.nome = nome;
            this.id_pessoa = id_pessoa;
        }

    }


    let textArea = document.getElementById("json");
    let valorTextArea = textArea.value;

    function testeJson(item) {
        try {
            JSON.parse(item);
        } catch (e) {
            return false;
        }
        return true;
    }


    let valorJson = testeJson(valorTextArea);

    if(valorJson === true){

        let objTextArea = JSON.parse(valorTextArea);
        
        let contador = 1;



        objTextArea.forEach((objeto)=>{

            let pessoaObj = new  Pessoa(Number(objeto.id) - 1, objeto.nome);
            


        //atributos da tabela
            let tabela = document.getElementById("tabela_info");
            let div = document.createElement("div");
            let tr = document.createElement("tr");
            let th = document.createElement("th");
            let botao = document.createElement("th");
            let trFilho = document.createElement("tr");
            let botaoFilho = document.createElement("button");
            let divFilho = document.createElement("div");


            divFilho.setAttribute("id",`filhos${Number(pessoaObj.id)}`);
            divFilho.classList.add("filhosDiv");
            
            botaoFilho.textContent = "Adicionar filho";
            botaoFilho.classList.add("botaoAddFilho");
            botaoFilho.setAttribute("id",`adiciona${Number(pessoaObj.id)}`);
            botaoFilho.setAttribute("onclick",`adicionaFilho(${Number(pessoaObj.id)})`);

            botao.textContent = "apagar";
            botao.classList.add("botaoApagaPessoa");
            botao.setAttribute("ondblclick",`deletaPessoa(${Number(pessoaObj.id)})`);
            botao.classList.add(Number(pessoaObj.id));

            th.textContent = pessoaObj.nome;
            th.classList.add("pessoaTh");

            th.setAttribute("id",`pessoa${Number(pessoaObj.id)}`);
            th.classList.add(Number(pessoaObj.id));

            tr.setAttribute("id",`trPessoa${Number(pessoaObj.id)}`);


            trFilho.appendChild(botaoFilho);
            tr.appendChild(th);
            tr.appendChild(botao);
            div.appendChild(tr);
            div.appendChild(divFilho);
            div.appendChild(trFilho);
            tabela.appendChild(div);  





            objeto.filhos.forEach((filho)=>{
                
                let filhoObj = new Filho(Number(filho.id) - 1,filho.nome,Number(filho.id_pessoa) - 1);
                

                let tr = document.createElement("tr");
                let th = document.createElement("th");
                let thApaga = document.createElement("th");
                let tabela = document.getElementById(`filhos${pessoaObj.id}`);

                tr.setAttribute("id",`filhoTr${filhoObj.id}`)

                th.textContent = filho.nome;
                th.classList.add("filhoTh");

                let itensApagaF = [pessoaObj.id,filhoObj.id];

                thApaga.textContent = "apagar";
                thApaga.classList.add("apagaFilho");
                thApaga.setAttribute("id",`apagaFilho${filhoObj.id}`);

                thApaga.setAttribute("ondblclick",`deletaFilho(${itensApagaF})`);
                tr.appendChild(th);
                tr.appendChild(thApaga);
                tabela.appendChild(tr);
                
                
                pessoaObj.adiciona(filhoObj);
                contadorFilho = Number(filhoObj.id) + 1;
            
            });

            let pessoaJson = JSON.stringify(pessoaObj);
            array.push(pessoaJson);  
            arrayObj.push(pessoaObj);
            contadorPessoa = Number(pessoaObj.id) + 1;
        });

        //console.log(array);
    }

</script>