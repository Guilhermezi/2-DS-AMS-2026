import javax.swing.*;
import java.awt.*;

public class Triangulo extends JFrame {

    // Labels da tela
    private JLabel labelLado1, labelLado2, labelLado3, resultado;

    // Campos onde o usuário digita os lados
    private JTextField campoLado1, campoLado2, campoLado3;

    // Botão para verificar o tipo do triângulo
    private JButton botaoVerificar;

    public Triangulo() {

        // Define o título da janela
        super("Verificador de Triângulo");

        // Define layout manual
        setLayout(null);

        // Pega o container da tela
        Container tela = getContentPane();

        // Cria labels dos lados
        labelLado1 = new JLabel("Lado 1:");
        labelLado2 = new JLabel("Lado 2:");
        labelLado3 = new JLabel("Lado 3:");

        // Cria campos de texto
        campoLado1 = new JTextField();
        campoLado2 = new JTextField();
        campoLado3 = new JTextField();

        // Cria botão
        botaoVerificar = new JButton("Verificar Tipo");

        // Label que mostra o resultado
        resultado = new JLabel("Tipo: ");

        // Define posição das labels
        labelLado1.setBounds(20, 20, 60, 30);
        labelLado2.setBounds(20, 60, 60, 30);
        labelLado3.setBounds(20, 100, 60, 30);

        // Define posição dos campos de texto
        campoLado1.setBounds(80, 20, 80, 30);
        campoLado2.setBounds(80, 60, 80, 30);
        campoLado3.setBounds(80, 100, 80, 30);

        // Define posição do botão
        botaoVerificar.setBounds(20, 140, 140, 30);

        // Define posição do resultado
        resultado.setBounds(20, 180, 200, 30);

        // Evento de clique do botão
        botaoVerificar.addActionListener(e -> {
            try {

                // Converte os valores digitados para números
                double lado1 = Double.parseDouble(campoLado1.getText());
                double lado2 = Double.parseDouble(campoLado2.getText());
                double lado3 = Double.parseDouble(campoLado3.getText());

                // Verifica se os lados realmente formam um triângulo
                if (lado1 + lado2 <= lado3 ||
                        lado1 + lado3 <= lado2 ||
                        lado2 + lado3 <= lado1) {

                    // Mostra que o triângulo é inválido
                    resultado.setText("Triângulo inválido");

                    // Exibe mensagem de aviso
                    JOptionPane.showMessageDialog(
                            null,
                            "Esses lados não formam um triângulo!",
                            "Aviso",
                            JOptionPane.WARNING_MESSAGE
                    );

                    return;
                }

                // Se os 3 lados forem iguais
                if (lado1 == lado2 && lado2 == lado3) {
                    resultado.setText("Triângulo Equilátero");
                }

                // Se todos os lados forem diferentes
                else if (lado1 != lado2 &&
                        lado1 != lado3 &&
                        lado2 != lado3) {

                    resultado.setText("Triângulo Escaleno");
                }

                // Caso contrário, 2 lados são iguais
                else {
                    resultado.setText("Triângulo Isósceles");
                }

            } catch (NumberFormatException ex) {

                // Caso o usuário digite texto ou valor inválido
                JOptionPane.showMessageDialog(
                        null,
                        "Insira apenas números válidos",
                        "Erro",
                        JOptionPane.ERROR_MESSAGE
                );

                // Reseta label de resultado
                resultado.setText("Tipo: ");
            }
        });

        // Adiciona labels na tela
        tela.add(labelLado1);
        tela.add(labelLado2);
        tela.add(labelLado3);

        // Adiciona campos de texto
        tela.add(campoLado1);
        tela.add(campoLado2);
        tela.add(campoLado3);

        // Adiciona botão e resultado
        tela.add(botaoVerificar);
        tela.add(resultado);

        // Define tamanho da janela
        setSize(270, 280);

        // Centraliza a janela
        setLocationRelativeTo(null);

        // Impede redimensionar
        setResizable(false);

        // Fecha o programa ao fechar a janela
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        // Torna a janela visível
        setVisible(true);
    }
}