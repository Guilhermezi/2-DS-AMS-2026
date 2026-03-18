/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package principal;

/**
 *
 * @author guilherme
 */
// Classe responsável por controlar o menu da calculadora
public class MenuCalculadora {
    // Objeto da classe Calculadora (onde ficam as operações)
    private Calculadora calculadora;

    // Guarda a opção escolhida pelo usuário no menu
    private int opcao;

    // Objeto responsável por converter String para número
    private ConversorNumeros conversor;

    // Objeto responsável pela entrada e saída de dados (tipo Scanner / JOptionPane)
    private EntradaSaidaDados io;

    // CONSTRUTOR -> inicializa tudo quando o objeto é criado
    public MenuCalculadora () {
        this.calculadora = new Calculadora(); // cria calculadora
        this.opcao = -1; // valor inicial inválido
        this.conversor = new ConversorNumeros(); // cria conversor
        this.io = new EntradaSaidaDados(); // cria entrada/saida
    }

    // Método principal que roda a calculadora
    public void executarCalculadora () {

        // Loop que fica rodando até o usuário escolher sair
        do {
            this.executarMenuPrincipal(); // mostra menu
            this.avaliarOpcaoEscolhida(); // executa ação
        } while(this.opcao != 5);
    }

    // Método que mostra o menu e lê a opção
    private void executarMenuPrincipal () {

        // Texto do menu
        String mensagemMenu = "Selecione uma opção"
                + "\n 1 - Somar"
                + "\n 2 - Subtrair"
                + "\n 3 - Multiplicar"
                + "\n 4 - Dividir"
                + "\n 5 - Sair";

        // Recebe a entrada do usuário (vem como String)
        String entradaDados = io.entradaDados(mensagemMenu);

        // Converte String para int
        this.opcao = conversor.StringToInt(entradaDados);
    }

    // Método que verifica a opção escolhida e executa
    public void avaliarOpcaoEscolhida(){

        String saida;

        // 🔴 CORREÇÃO: nome da variável estava errado (num → num2)
        double num1 = 0, num2 = 0;

        // Se for uma operação (1 até 4), pede os números
        if(this.opcao >= 1 && this.opcao <= 4) {

            String mensagemEntrada = "Digite o 1º número";
            num1 = conversor.StringToDouble(io.entradaDados(mensagemEntrada));

            calculadora.setNumero01(num1); // salva no objeto

            mensagemEntrada = "Digite o 2º número";
            num2 = conversor.StringToDouble(io.entradaDados(mensagemEntrada));

            calculadora.setNumero02(num2); // 🔴
        }

        // Switch escolhe a operação
        switch(this.opcao){

            case 1:
                calculadora.somar(num1, num2);
                saida = "Resultado da soma: " + calculadora.getResultado();
                io.saidaDados(saida);
                break;

            case 2:
                calculadora.subtrair(num1, num2);
                saida = "Resultado da subtração: " + calculadora.getResultado();
                io.saidaDados(saida);
                break;

            case 3:
                calculadora.multiplicar(num1, num2);
                // 🔴 CORREÇÃO: mensagem estava errada (subtração)
                saida = "Resultado da multiplicação: " + calculadora.getResultado();
                io.saidaDados(saida);
                break;

            case 4:
                calculadora.dividir(num1, num2);
                saida = "Resultado da divisão: " + calculadora.getResultado();
                io.saidaDados(saida);
                break;

            case 5:
                calculadora.sair(); // método pra encerrar (se existir)
                break;

            default:
                io.saidaDados("Opção inválida");
                break;
        }
    }
}