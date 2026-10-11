async function buscaIBGE() {
    const uf = document.getElementById("ibgeInput").value.trim();

    if(uf === ""){
        alert("Digite a sigla do estado!");
        return;
    }

    try{
        const resposta = await fetch(`https://brasilapi.com.br/api/ibge/municipios/v1/${uf}`);

        if(!resposta.ok){
            alert("Estado não encontrado!");
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

// Apertar Enter no campo já faz a busca
document.getElementById("ibgeInput").addEventListener("keydown", function (evento) {
    if (evento.key === "Enter") {
        buscaIBGE();
    }
});
