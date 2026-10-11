async function buscaBanco() {
    const codigo = document.getElementById("bancoInput").value.trim();

    if(codigo === ""){
        alert("Digite o código do banco!");
        return;
    }

    try{
        const resposta = await fetch(`https://brasilapi.com.br/api/banks/v1/${codigo}`);

        if(!resposta.ok){
            alert("Banco não encontrado!");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("bancoNome").innerHTML = `Nome: ${dados.name}`;
        document.getElementById("bancoCodigo").innerHTML = `Código: ${dados.code}`;
        document.getElementById("bancoIspb").innerHTML = `ISPB: ${dados.ispb}`;
        document.getElementById("bancoCompleto").innerHTML = `Nome completo: ${dados.fullName}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("bancoNome").innerHTML = "Nome:";
    document.getElementById("bancoCodigo").innerHTML = "Código:";
    document.getElementById("bancoIspb").innerHTML = "ISPB:";
    document.getElementById("bancoCompleto").innerHTML = "Nome completo:";
}

// Apertar Enter no campo já faz a busca
document.getElementById("bancoInput").addEventListener("keydown", function (evento) {
    if (evento.key === "Enter") {
        buscaBanco();
    }
});
