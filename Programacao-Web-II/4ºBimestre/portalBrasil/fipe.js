async function buscaFIPE() {
    const tipo = document.getElementById("fipeInput").value.trim().toLowerCase();

    if(tipo === ""){
        alert("Digite o tipo!");
        return;
    }

    try{
        const resposta = await fetch(`consultar.php?servico=fipe&valor=${encodeURIComponent(tipo)}`);

        if(!resposta.ok){
            const erro = await resposta.json();
            alert(erro.erro || "Tipo inválido! Use carros, motos ou caminhoes.");
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
