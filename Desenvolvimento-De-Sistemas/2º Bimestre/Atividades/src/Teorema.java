import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Teorema extends JFrame {
    JLabel CatetoA, CatetoB, HipotenusaC;
    JTextField TextA, TextB;
    JButton Calcular;


    public Teorema() {
        super("Teorema de Pitágoras");
        Container tela = getContentPane();
        tela.setLayout(null);
        tela.setBackground(Color.LIGHT_GRAY);

        CatetoA = new JLabel("Cateto A");
        CatetoB = new JLabel("Cateto B");
        HipotenusaC = new JLabel("Hipotenusa C: ");
        Calcular = new JButton("Calcular a Hipotenusa");

        TextA = new JTextField(5);
        TextB = new JTextField(5);

        CatetoA.setBounds(20, 30, 80, 25);
        TextA.setBounds(110, 30, 140, 25);

        CatetoB.setBounds(20, 70, 80, 25);
        TextB.setBounds(110, 70, 140, 25);

        Calcular.setBounds(55, 120, 180, 30);

        HipotenusaC.setBounds(20, 175, 250, 25);

        Calcular.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {

                try{
                    double CatA = getNumero1();
                    double CatB = getNumero1();

                    double hipo = Math.sqrt(Math.pow(CatA, 2) + Math.pow(CatB, 2));
                    HipotenusaC.setText("Hipotenusa C: " + hipo);
                }
                catch(Exception ex){
                    HipotenusaC.setText("ERRO: Digite apenas números válidos");
                }
            }
        });

        tela.add(CatetoA);
        tela.add(CatetoB);
        tela.add(HipotenusaC);
        tela.add(TextA);
        tela.add(TextB);
        tela.add(Calcular);

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 350);
        setVisible(true);
    }
    public double getNumero1() {
        return Double.parseDouble(TextA.getText());
    }

    public double getNumero2() {
        return Double.parseDouble(TextB.getText());
    }
}
