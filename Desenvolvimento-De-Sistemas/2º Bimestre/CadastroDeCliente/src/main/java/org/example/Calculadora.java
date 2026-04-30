package org.example;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class Calculadora extends JFrame{
    // Criando Variaveis de instancia
    JLabel rotulo1, rotulo2, exibir;
    JTextField texto1,  texto2;
    JButton somar, subtracao, multiplicar, dividir, raiz, potencia;

    public Calculadora(){
        super("Calculadora"); // Nome da tela
        Container tela = getContentPane(); // Instanciando o Objeto tela
        setLayout(null); // dizendo que o layout é null pq eu que vou fazer
        tela.setBackground(new Color(219, 219, 219)); // Dizendo a cor de fundo da tela

        // Dizendo oq cada variavel de instancia vai mostrar
        rotulo1 = new JLabel("1ºNúmero:");
        rotulo2 = new JLabel("2ºNúmero:");

        texto1 = new JTextField(5);
        texto2 = new JTextField(5);
        exibir = new JLabel("Resultado:");

        somar = new JButton(" + Somar");
        subtracao = new JButton(" - Subtrair");
        multiplicar = new JButton(" x Multiplicar");
        dividir = new JButton(" ÷ Dividir");
        raiz = new JButton(" √ Raiz");
        potencia = new JButton(" ** Potência");

        // Dizendo onde cada coisa vão ficar
        rotulo1.setBounds(50, 20, 100, 20);
        rotulo2.setBounds(50, 60, 100, 20);
        texto1.setBounds(120, 20, 200, 25);
        texto2.setBounds(120, 60, 200, 25);
        exibir.setBounds(50, 350, 300, 30);

        // centraliza o texto do JLabel (deixa no meio em vez de ficar à esquerda)
        exibir.setHorizontalAlignment(SwingConstants.CENTER);

        somar.setBounds(120, 100, 160, 30);
        subtracao.setBounds(120, 140, 160, 30);
        multiplicar.setBounds(120, 180, 160, 30);
        dividir.setBounds(120, 220, 160, 30);
        raiz.setBounds(120, 260, 160, 30);
        potencia.setBounds(120, 300, 160, 30);

        // Fonte para deixar mais bonito
        Font fonte = new Font("Arial", Font.BOLD, 14);

        rotulo1.setFont(fonte);
        rotulo2.setFont(fonte);
        exibir.setFont(new Font("Arial", Font.BOLD, 16));

        texto1.setFont(fonte);
        texto2.setFont(fonte);

        somar.setFont(fonte);
        subtracao.setFont(fonte);
        multiplicar.setFont(fonte);
        dividir.setFont(fonte);
        raiz.setFont(fonte);
        potencia.setFont(fonte);


// pega o número do segundo campo

        // adiciona uma ação ao botão "somar"
        somar.addActionListener(

                // cria um "ouvinte" (listener) que fica esperando o clique do botão
                new ActionListener() {

                    // metodo que é executado automaticamente quando o botão é clicado
                    public void actionPerformed(ActionEvent e) {

                        //Resolvi usar o Try catch para tratamento de erros, o professor deu uma explicada, eu espequisei e é simples
                        // Tenta executar esse bloco de código, caso dê erro ele vai para o catch
                        try {
                            // Pede o número 1 e 2 para o metodo getNumero, já convertidos
                            int numero1 = getNumero1();
                            int numero2 = getNumero2();

                            // faz a soma dos dois números
                            int soma = numero1 + numero2;

                            //Chama o metodo motrarResultado, que mostra essa mensagem de uma forma mais bonita
                            mostrarResultado("A soma é: " + soma);
                            // Captura o erro caso o usuario digite algo que não é um número
                        } catch (NumberFormatException erro) {
                            // Mensagem de erro
                            mostrarResultado("ERRO, Digite apenas números!");
                        }
                    }
                }
        );

        // muda a cor de fundo do botão
        somar.setBackground(new Color(33, 150, 243));

        // muda a cor do texto do botão para branco
        somar.setForeground(Color.WHITE);

        subtracao.addActionListener(
        new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    int numero1 = getNumero1();
                    int numero2 = getNumero2();
                    int subtracao = numero1 - numero2;
                    mostrarResultado("A Subtração é: " + subtracao);
                }
                catch (NumberFormatException erro){
                    mostrarResultado("ERRO, Digite apenas números!");
                }
            }
        }
        );
        subtracao.setBackground(new Color(33, 150, 243));
        subtracao.setForeground(Color.WHITE);

        multiplicar.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        try {
                            int numero1 = getNumero1();
                            int numero2 = getNumero2();
                            int multiplicacao = numero1 * numero2;
                            mostrarResultado("A Multiplicação é: " + multiplicacao);
                        }
                        catch (NumberFormatException erro){
                            mostrarResultado("ERRO, Digite apenas números!");
                        }
                    }
                }
        );
        multiplicar.setBackground(new Color(33, 150, 243));
        multiplicar.setForeground(Color.WHITE);

        dividir.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        try {
                            int numero1 = getNumero1();
                            int numero2 = getNumero2();
                            int dividir = numero1 / numero2;
                            mostrarResultado("A divisão é: " + dividir);
                        }
                        catch (NumberFormatException erro){
                            mostrarResultado("ERRO, Digite apenas números!");
                        }
                    }
                }
        );
        dividir.setBackground(new Color(33, 150, 243));
        dividir.setForeground(Color.WHITE);

        raiz.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        try {
                            int numero1 = getNumero1();
                            int numero2 = getNumero2();
                            int soma = numero1 + numero2;
                            double raiz = Math.sqrt(soma);
                            mostrarResultado("A Raiz de " + soma + " é: " + raiz);
                        }
                        catch (NumberFormatException erro){
                            mostrarResultado("ERRO, Digite apenas números!");
                        }
                    }
                }
        );
        raiz.setBackground(new Color(33, 150, 243));
        raiz.setForeground(Color.WHITE);

        potencia.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        try {

                            int  numero1 = getNumero1();
                            int numero2 = getNumero2();
                            double potencia = Math.pow(numero1, numero2);
                            mostrarResultado("A potencia é: " + potencia);

                        }
                        catch (NumberFormatException erro){
                            mostrarResultado("ERRO, Digite apenas números!");
                        }
                    }
                }
        );
        potencia.setBackground(new Color(33, 150, 243));
        potencia.setForeground(Color.WHITE);

        // deixa exibir invisível
        // ele só vai aparecer quando o usuário clicar em algum botão (quando mostramos o resultado)
        exibir.setVisible(false);

        // Colocando tudo na tela
        tela.add(rotulo1);
        tela.add(rotulo2);
        tela.add(texto1);
        tela.add(texto2);

        tela.add(somar);
        tela.add(exibir);
        tela.add(subtracao);
        tela.add(dividir);
        tela.add(raiz);
        tela.add(potencia);
        tela.add(multiplicar);

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(400, 500);
        setVisible(true);

    }
    //Metodos para melhorar o código

    // pega o número do primeiro campo
    public int getNumero1() {
        return Integer.parseInt(texto1.getText());
    }

    // pega o número do segundo campo
    public int getNumero2() {
        return Integer.parseInt(texto2.getText());
    }

    //Metodo para mostrar as mensagens da mesma forma sem muita repetição de código
    public void mostrarResultado(String mensagem) {
        exibir.setVisible(true);
        exibir.setText(mensagem);
        exibir.setForeground(Color.RED);
    }
}