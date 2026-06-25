import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Triangulo extends JFrame {
    JLabel lado1, lado2, lado3, exibir;
    JTextField Text1, Text2, Text3;
    JButton Tipo;

    public Triangulo() {
        super("Triangulos");
        Container tela = getContentPane();
        tela.setLayout(null);
        tela.setBackground(Color.LIGHT_GRAY);

        lado1 = new JLabel("Lado 1:");
        lado2 = new JLabel("Lado 2:");
        lado3 = new JLabel("Lado 3:");

        exibir = new JLabel("");

        Tipo = new JButton("Verificar Tipo");

        Text1 = new JTextField(5);
        Text2 = new JTextField(5);
        Text3 = new JTextField(5);

        lado1.setBounds(20, 30, 80, 25);
        Text1.setBounds(110, 30, 140, 25);

        lado2.setBounds(20, 65, 80, 25);
        Text2.setBounds(110, 65, 140, 25);

        lado3.setBounds(20, 100, 80, 25);
        Text3.setBounds(110, 100, 140, 25);

        Tipo.setBounds(55, 145, 180, 30);
        exibir.setBounds(20, 195, 260, 25);

        Tipo.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    double l1 = getNumero1();
                    double l2 = getNumero2();
                    double l3 = getNumero3();

                    // CORREÇÃO 4: Validação se os lados formam um triângulo real
                    if ((l1 + l2 <= l3) || (l1 + l3 <= l2) || (l2 + l3 <= l1)) {
                        mostrarResultado("Estes lados não formam um triângulo!");
                    }
                    else if (l1 == l2 && l2 == l3) {
                        mostrarResultado("É um triângulo Equilátero");
                    }
                    else if (l1 == l2 || l2 == l3 || l1 == l3) {
                        mostrarResultado("É um triângulo Isósceles");
                    }
                    else {
                        mostrarResultado("É um triângulo Escaleno");
                    }
                }
                catch(Exception ex) {
                    mostrarResultado("ERRO: Digite apenas números válidos");
                }
            }
        });

        tela.add(lado1);
        tela.add(lado2);
        tela.add(lado3);
        tela.add(Tipo);
        tela.add(exibir);
        tela.add(Text1);
        tela.add(Text2);
        tela.add(Text3);

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 280);
        setVisible(true);
    }

    public double getNumero1() {
        return Double.parseDouble(Text1.getText());
    }

    public double getNumero2() {
        return Double.parseDouble(Text2.getText());
    }

    public double getNumero3() {
        return Double.parseDouble(Text3.getText());
    }

    public void mostrarResultado(String mensagem) {
        exibir.setVisible(true);
        exibir.setText(mensagem);
        exibir.setForeground(Color.RED);
    }
}
