async function buscaDDD() {
    const ddd = document.getElementById("dddInput").value.trim();

    if(ddd === ""){
        alert("Digite um DDD!");
        return;
    }

    try{
        const resposta = await fetch(`https://brasilapi.com.br/api/ddd/v1/${ddd}`);

        if(!resposta.ok){
            alert("DDD não encontrado!");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("state").innerHTML = `Estado: ${dados.state}`;
        document.getElementById("citiesQtd").innerHTML = `Quantidade de Cidades: ${dados.cities.length}`;

        const listaCidades = dados.cities
            .slice(0, dados.cities.length)
            .map((cidade) => `• ${cidade}`)
            .join("<br>");
        document.getElementById("cities").innerHTML = `Cidades:<br>${listaCidades}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("state").innerHTML = "Estado:";
    document.getElementById("citiesQtd").innerHTML = "Quantidade de Cidades:";
    document.getElementById("cities").innerHTML = "Cidades:";
}

// Apertar Enter no campo já faz a busca
document.getElementById("dddInput").addEventListener("keydown", function (evento) {
    if (evento.key === "Enter") {
        buscaDDD();
    }
});
