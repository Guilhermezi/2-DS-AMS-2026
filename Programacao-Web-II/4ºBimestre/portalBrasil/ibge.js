async function buscaIBGE() {
    const uf = document.getElementById("ibgeInput").value.trim().toUpperCase();

    if(uf === ""){
        alert("Digite a sigla do estado!");
        return;
    }

    try{
        const resposta = await fetch(`consultar.php?servico=ibge&valor=${encodeURIComponent(uf)}`);

        if(!resposta.ok){
            const erro = await resposta.json();
            alert(erro.erro || "Estado não encontrado!");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("ibgeQtd").innerHTML = `Quantidade de municípios: ${dados.length}`;

        const lista = dados
            .map((municipio) => `• ${municipio.nome}`)
            .join("<br>");
        document.getElementById("ibgeMunicipios").innerHTML = `Municípios:<br>${lista}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("ibgeQtd").innerHTML = "Quantidade de municípios:";
    document.getElementById("ibgeMunicipios").innerHTML = "Municípios:";
}
