async function buscaCEP() {
    const cep = document.getElementById("cepInput").value.trim();

    if(cep === ""){
        alert("Digite um cep!");
        return;
    }

    try{
        const resposta = await fetch(`consultar.php?servico=cep&valor=${encodeURIComponent(cep)}`);

        if(!resposta.ok){
            const erro = await resposta.json();
            alert(erro.erro || "CEP não encontrado!");
            return;
        }

        const dados = await resposta.json();

        document.getElementById("cep").innerHTML = `CEP: ${dados.cep}`;
        document.getElementById("state").innerHTML = `Estado: ${dados.state}`;
        document.getElementById("city").innerHTML = `Cidade: ${dados.city}`;
        document.getElementById("neighborhood").innerHTML = `Bairro: ${dados.neighborhood}`;
        document.getElementById("street").innerHTML = `Rua: ${dados.street}`;
        document.getElementById("location").innerHTML = `Localização: ${dados.location.coordinates.latitude}, ${dados.location.coordinates.longitude}`;
        document.getElementById("timezoneName").innerHTML = `Fuso horário: ${dados.timezoneName}`;

    } catch (erro) {
        console.log(erro);
        alert("Erro ao consultar a API");
    }
}

function limparResultados() {
    document.getElementById("cep").innerHTML = "CEP:";
    document.getElementById("state").innerHTML = "Estado:";
    document.getElementById("city").innerHTML = "Cidade:";
    document.getElementById("neighborhood").innerHTML = "Bairro:";
    document.getElementById("street").innerHTML = "Rua:";
    document.getElementById("location").innerHTML = "Localização:";
    document.getElementById("timezoneName").innerHTML = "Fuso horário:";
}
