import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Graus extends JFrame {
    // Declaração correta dos componentes para conversão de temperatura
    JLabel Celsius, Fahrenheit, Kelvin;
    JTextField Text;
    JButton converter;

    public Graus() {
        super("Conversor de Temperatura");
        Container tela = getContentPane();
        tela.setLayout(null);
        tela.setBackground(Color.LIGHT_GRAY);

        Celsius = new JLabel("Graus Celsius:");
        Fahrenheit = new JLabel("Fahrenheit: -");
        Kelvin = new JLabel("Kelvin: -");
        converter = new JButton("Converter");
        Text = new JTextField(5);

        // Alinhamento dos setBounds em grade (sem sobreposição)
        Celsius.setBounds(20, 30, 100, 25);
        Text.setBounds(130, 30, 120, 25);

        converter.setBounds(55, 75, 180, 30);

        // Labels de resultado na parte inferior
        Fahrenheit.setBounds(20, 125, 250, 25);
        Kelvin.setBounds(20, 155, 250, 25);

        converter.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    // Pega o valor digitado no campo de texto
                    double c = getNumero();

                    // Fórmulas de conversão de temperatura
                    double f = (c * 9 / 5) + 32;
                    double k = c + 273.15;

                    // Exibe os resultados formatados com duas casas decimais
                    Fahrenheit.setText("Fahrenheit: "+ f + " ºF");
                    Kelvin.setText("Kelvin: " + k);

                    Fahrenheit.setForeground(Color.BLUE);
                    Kelvin.setForeground(Color.BLUE);

                } catch (Exception ex) {
                    Fahrenheit.setText("ERRO: Digite um número válido!");
                    Kelvin.setText("");
                    Fahrenheit.setForeground(Color.RED);
                }
            }
        });

        tela.add(Celsius);
        tela.add(Text);
        tela.add(converter);
        tela.add(Fahrenheit);
        tela.add(Kelvin);

        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(300, 240);
        setVisible(true);
    }

    public double getNumero() {
        return Double.parseDouble(Text.getText());
    }
}
