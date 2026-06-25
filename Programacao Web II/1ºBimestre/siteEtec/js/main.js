const form = document.getElementById("formContato");

if (form) {
    const telefone = document.getElementById("telefone");
    const mensagem = document.getElementById("mensagem");
    const contador = document.getElementById("contador");
    const botao = document.getElementById("btnEnviar");

    telefone.addEventListener("input", function () {
        let valor = this.value.replace(/\D/g, "");

        valor = valor.substring(0, 11);

        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
        valor = valor.replace(/(\d{5})(\d)/, "$1-$2");

        this.value = valor;
    });

    mensagem.addEventListener("input", function () {
        contador.textContent = this.value.length;
    });

    form.addEventListener("submit", function (e) {
        const nome = form.nome.value.trim();
        const email = form.email.value.trim();
        const telefoneValor = form.telefone.value.trim();
        const msg = form.mensagem.value.trim();

        if (nome.length < 3) {
            alert("Digite um nome válido.");
            e.preventDefault();
            return;
        }

        if (!email.includes("@") || !email.includes(".")) {
            alert("Digite um e-mail válido.");
            e.preventDefault();
            return;
        }

        if (telefoneValor.length < 14) {
            alert("Telefone inválido.");
            e.preventDefault();
            return;
        }

        if (msg.length < 10) {
            alert("Mensagem muito curta.");
            e.preventDefault();
            return;
        }

        botao.innerHTML = `
            <span class="spinner-border spinner-border-sm"></span>
            Enviando...
        `;

        botao.disabled = true;
    });
}