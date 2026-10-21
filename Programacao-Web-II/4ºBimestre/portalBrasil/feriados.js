async function buscaFeriados() {
    const ano = document.getElementById("feriadoInput").value.trim();

    if(ano === ""){
        alert("Digite um ano!");
        return;
    }

    try{
        const resposta = await fetch(`consultar.php?servico=feriados&valor=${encodeURIComponent(ano)}`);

        if(!resposta.ok){
            const erro = await resposta.json();
            alert(erro.erro || "Ano inválido! Use um ano entre 1900 e 2199.");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("feriadosQtd").innerHTML = `Quantidade de feriados: ${dados.length}`;

        // A API manda a data no formato "2026-01-01".
        // O ".split('-')" separa em ["2026", "01", "01"], o ".reverse()" vira
        // ["01", "01", "2026"] e o ".join('/')" junta de novo: "01/01/2026".
        const lista = dados
            .map((feriado) => `• ${feriado.date.split("-").reverse().join("/")} — ${feriado.name}`)
            .join("<br>");
        document.getElementById("feriadosLista").innerHTML = `Feriados:<br>${lista}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("feriadosQtd").innerHTML = "Quantidade de feriados:";
    document.getElementById("feriadosLista").innerHTML = "Feriados:";
}
