async function buscaFIPE() {
    const tipo = document.getElementById("fipeInput").value.trim().toLowerCase();

    if(tipo === ""){
        alert("Digite o tipo!");
        return;
    }

    try{
        const resposta = await fetch(`https://brasilapi.com.br/api/fipe/marcas/v1/${tipo}`);

        if(!resposta.ok){
            alert("Tipo inválido! Use carros, motos ou caminhoes.");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("fipeQtd").innerHTML = `Quantidade de marcas: ${dados.length}`;

        const lista = dados
            .map((marca) => `• ${marca.nome}`)
            .join("<br>");
        document.getElementById("fipeMarcas").innerHTML = `Marcas:<br>${lista}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("fipeQtd").innerHTML = "Quantidade de marcas:";
    document.getElementById("fipeMarcas").innerHTML = "Marcas:";
}

// Apertar Enter no campo já faz a busca
document.getElementById("fipeInput").addEventListener("keydown", function (evento) {
    if (evento.key === "Enter") {
        buscaFIPE();
    }
});
