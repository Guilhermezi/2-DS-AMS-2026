import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Bhaskara extends JFrame {
    JLabel a, b, c, titulo, X1, X2;
    JTextField aText, bText, cText;
    JButton Calcular;

    public Bhaskara() {
        super("Bhaskara");
        setLayout(null);
        Container tela = getContentPane();
        tela.setBackground(Color.yellow);
        tela.setLayout(null);

        a = new JLabel("Valor de A:");
        b = new JLabel("Valor de B:");
        c = new JLabel("Valor de C:");
        titulo = new JLabel("Bhaskara");
        Calcular = new JButton("Calcular");
        X1 = new JLabel("X1:");
        X2 = new JLabel("X2:");

        aText = new JTextField(5);
        bText = new JTextField(5);
        cText = new JTextField(5);

        titulo.setBounds(115, 10, 100, 30);

        a.setBounds(20, 50, 80, 25);
        aText.setBounds(110, 50, 140, 25);

        b.setBounds(20, 85, 80, 25);
        bText.setBounds(110, 85, 140, 25);

        c.setBounds(20, 120, 80, 25);
        cText.setBounds(110, 120, 140, 25);

        Calcular.setBounds(90, 160, 110, 30);

        X1.setBounds(20, 205, 250, 25);
        X2.setBounds(20, 235, 250, 25);

        Calcular.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    // Pede o número 1, 2 e 3
                    double valA = getNumero1();
                    double valB = getNumero2();
                    double valC = getNumero3();

                    double delta = Math.pow(valB, 2) - (4 * valA * valC);

                    if (delta < 0) {
                        X1.setText("Sem raízes reais (Delta negativo).");
                        X2.setText("");
                    } else {

                        double bhaskara1 = (-valB + (Math.sqrt(delta))) / (2 * valA);
                        double bhaskara2 = (-valB - (Math.sqrt(delta))) / (2 * valA);

                        X1.setText("X1 é igual a: " + bhaskara1);
                        X2.setText("X2 é igual a: " + bhaskara2);
                    }

                } catch (NumberFormatException erro) {
                    X1.setText("ERRO: Digite apenas números válidos!");
                    X2.setText("");
                }
            }
        });

        tela.add(a);
        tela.add(b);
        tela.add(c);
        tela.add(X1);
        tela.add(X2);
        tela.add(Calcular);
        tela.add(titulo);
        tela.add(aText);
        tela.add(bText);
        tela.add(cText);

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 350);
        setVisible(true);
    }
    public double getNumero1() {
        return Double.parseDouble(aText.getText());
    }

    public double getNumero2() {
        return Double.parseDouble(bText.getText());
    }

    public double getNumero3() {
        return Double.parseDouble(cText.getText());
    }
}
