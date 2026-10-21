async function buscaBanco() {
    const codigo = document.getElementById("bancoInput").value.trim();

    if(codigo === ""){
        alert("Digite o código do banco!");
        return;
    }

    try{
        const resposta = await fetch(`consultar.php?servico=bancos&valor=${encodeURIComponent(codigo)}`);

        if(!resposta.ok){
            const erro = await resposta.json();
            alert(erro.erro || "Banco não encontrado!");
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
