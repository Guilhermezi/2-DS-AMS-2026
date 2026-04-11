package com.mycompany.principal_imc;

/**
 *
 * @author d3
 */
public class MenuIMC {
    private Imc imc;
    private int opcao = 0;
    private ConversorNumero conversor;
    private EntradaSaidaDados io;
    

    public MenuIMC(){
        this.imc = new Imc();
        this.opcao = 0;
        this.conversor = new ConversorNumero();
        this.io = new EntradaSaidaDados();
    }

    public void executarImc(){
        do {
            this.executarMenuPrincipal();
            this.avaliarOpcaoEscolhida();
        }while (opcao != 5);
    }

    private void executarMenuPrincipal(){
        String message =
                "1.Digitar sua altura \n" +
                        "2.Digitar seu peso \n" +
                        "3.Ver IMC \n"+
                        "4.Ver situação corporal \n" +
                        "5.Sair";

        String enviandoDados = io.entradaDados(message);
        this.opcao = conversor.StringToInt (enviandoDados);
    }

    private void avaliarOpcaoEscolhida(){
        
        double altura, peso;
        switch (this.opcao){
            case 1:
                String messageEntrada = "Digite sua altura:";
                altura = conversor.StringToDouble(io.entradaDados(messageEntrada));
                imc.setAltura(altura);
                break;
            case 2:
                messageEntrada = "Digite seu peso:";
                peso = conversor.StringToDouble(io.entradaDados(messageEntrada));
                imc.setPeso(peso);
                break;
            case 3:
                double imc_calculado = imc.calcularIMC();
                io.saidaDados("Seu IMC é:" + Double.toString(imc_calculado));
                break;
            case 4:
                Situacao situacao = new Situacao();
                situacao.verificarSituacao(imc);
                String resultado = situacao.getSituacao();
                io.saidaDados(resultado);
                break;
            case 5:
                io.saidaDados("Saindo do programa...");
                break;
            default:
                io.saidaDados("Opção inválida");
                break;
        }
    }
}
