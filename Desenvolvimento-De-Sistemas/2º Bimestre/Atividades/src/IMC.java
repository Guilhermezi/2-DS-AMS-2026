
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class IMC extends JFrame {
    JLabel Peso, Altura, IMC;
    JTextField TextP, TextA;
    JButton Calcular;

    public IMC() {
        super("IMC");
        Container tela = getContentPane();
        tela.setLayout(null);
        tela.setBackground(Color.LIGHT_GRAY);

        Peso = new JLabel("Peso (kg):");
        Altura = new JLabel("Altura (m):");
        IMC = new JLabel("Resultado aparecerá aqui.");
        Calcular = new JButton("Calcular o IMC");

        TextP = new JTextField(5);
        TextA = new JTextField(5);

        // Alinhamento correto dos componentes do IMC na tela
        Peso.setBounds(20, 30, 80, 25);
        TextP.setBounds(110, 30, 140, 25);

        Altura.setBounds(20, 70, 80, 25);
        TextA.setBounds(110, 70, 140, 25);

        Calcular.setBounds(55, 120, 180, 30);

        IMC.setBounds(20, 175, 600, 25);

        Calcular.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    double peso = getNumero1();
                    double altura = getNumero2();
                    double imc = peso / Math.pow(altura, 2);

                    // Arredonda o valor do IMC para exibir apenas duas casas decimais
                    String imcFormatado = String.format("%.2f", imc);

                    // Correção dos intervalos lógicos das faixas de peso
                    if (imc < 18.5) {
                        mostrarResultado("IMC: " + imcFormatado + " - Você está abaixo do peso");
                    } else if (imc >= 18.5 && imc < 25.0) {
                        mostrarResultado("IMC: " + imcFormatado + " - Você está no peso ideal");
                    } else {
                        mostrarResultado("IMC: " + imcFormatado + " - Você está acima do peso");
                    }
                }
                catch(Exception ex) {
                    mostrarResultado("ERRO: Digite apenas números válidos (use ponto para decimais)");
                }
            }
        });

        tela.add(Peso);
        tela.add(Altura);
        tela.add(IMC);
        tela.add(TextP);
        tela.add(TextA);
        tela.add(Calcular);

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 260);
        setVisible(true);
    }

    public double getNumero1() {
        return Double.parseDouble(TextP.getText());
    }

    public double getNumero2() {
        return Double.parseDouble(TextA.getText());
    }

    public void mostrarResultado(String mensagem) {
        IMC.setText(mensagem);
        IMC.setForeground(Color.RED);
    }
}
