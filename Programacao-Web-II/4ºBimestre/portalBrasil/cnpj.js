async function buscaCNPJ() {
    const cnpj = document.getElementById("cnpjInput").value.replace(/\D/g, "");

    if(cnpj === ""){
        alert("Digite um cnpj!");
        return;
    }

    try{
        const resposta = await fetch(`https://brasilapi.com.br/api/cnpj/v1/${cnpj}`);

        if(!resposta.ok){
            alert("cnpj não encontrado!");
            return;
        }

        const dados = await resposta.json();

        // Monta o endereço completo juntando os campos que a API manda separados.
        // O "||" quer dizer: "se o valor da esquerda não existir (vazio/null), usa o da direita".
        // Ex.: se a empresa não tiver número, aparece "s/n" (sem número).
        const endereco = `${dados.logradouro || ""}, ${dados.numero || "s/n"} - ${dados.bairro || ""}, ${dados.municipio || ""}/${dados.uf || ""}`;

        // A API devolve os sócios numa LISTA (array) chamada "qsa".
        // O "|| []" evita erro caso a empresa não tenha sócios (aí usa uma lista vazia).
        // O ".map" percorre a lista e transforma CADA sócio numa linha: "• NOME — CARGO".
        // O ".join('<br>')" junta todas as linhas com uma quebra de linha (<br>) entre elas.
        const socios = (dados.qsa || [])
            .map((s) => `• ${s.nome_socio} — ${s.qualificacao_socio}`)
            .join("<br>");

        document.getElementById("cnpjRazao").innerHTML = `Razão social: ${dados.razao_social}`;
        document.getElementById("cnpjFantasia").innerHTML = `Nome fantasia: ${dados.nome_fantasia || "Não informado"}`;
        document.getElementById("cnpjSituacao").innerHTML = `Situação: ${dados.descricao_situacao_cadastral}`;
        document.getElementById("cnpjAtividade").innerHTML = `Atividade: ${dados.cnae_fiscal_descricao}`;
        document.getElementById("cnpjNatureza").innerHTML = `Natureza jurídica: ${dados.natureza_juridica}`;
        document.getElementById("cnpjPorte").innerHTML = `Porte: ${dados.porte}`;
        document.getElementById("cnpjCapital").innerHTML = `Capital social: R$ ${Number(dados.capital_social).toLocaleString("pt-BR")}`;
        document.getElementById("cnpjEndereco").innerHTML = `Endereço: ${endereco}`;
        document.getElementById("cnpjTelefone").innerHTML = `Telefone: ${dados.ddd_telefone_1 || "Não informado"}`;
        document.getElementById("cnpjInicio").innerHTML = `Início da atividade: ${dados.data_inicio_atividade}`;
        document.getElementById("cnpjSocios").innerHTML = `Sócios:<br>${socios}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("cnpjRazao").innerHTML = "Razão social:";
    document.getElementById("cnpjFantasia").innerHTML = "Nome fantasia:";
    document.getElementById("cnpjSituacao").innerHTML = "Situação:";
    document.getElementById("cnpjAtividade").innerHTML = "Atividade:";
    document.getElementById("cnpjNatureza").innerHTML = "Natureza jurídica:";
    document.getElementById("cnpjPorte").innerHTML = "Porte:";
    document.getElementById("cnpjCapital").innerHTML = "Capital social:";
    document.getElementById("cnpjEndereco").innerHTML = "Endereço:";
    document.getElementById("cnpjTelefone").innerHTML = "Telefone:";
    document.getElementById("cnpjInicio").innerHTML = "Início da atividade:";
    document.getElementById("cnpjSocios").innerHTML = "Sócios:";
}

// Apertar Enter no campo já faz a busca
document.getElementById("cnpjInput").addEventListener("keydown", function (evento) {
    if (evento.key === "Enter") {
        buscaCNPJ();
    }
});
