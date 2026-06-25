import javax.swing.*;
import java. awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Notas extends JFrame {
    //Crinado as variaveis de label e text
    JLabel nota1, nota2, nota3, nota4, exibir;
    JTextField n1, n2, n3, n4;
    JButton Media;

    public Notas() {
        super("Notas");
        Container tela = getContentPane();
        tela.setLayout(null);
        tela.setBackground(new  Color(219, 219, 219));

        // As variaveis de instancia com seus conteudos
        nota1 = new JLabel("Nota 1:");
        nota2 = new JLabel("Nota 2:");
        nota3 = new JLabel("Nota 3:");
        nota4 = new JLabel("Nota 4:");
        exibir = new JLabel("A média é:");

        n1 = new JTextField(2);
        n2 = new JTextField(2);
        n3 = new JTextField(2);
        n4 = new JTextField(2);

        Media = new JButton("Calcular média");


        n1.setBounds(100, 20, 50, 20);
        n2.setBounds(100, 50, 50, 20);
        n3.setBounds(100, 80, 50, 20);
        n4.setBounds(100, 120, 50, 20);

        nota1.setBounds(50, 20, 100, 20);
        nota2.setBounds(50, 50, 100, 20);
        nota3.setBounds(50, 80, 100, 20);
        nota4.setBounds(50, 120, 100, 20);

        exibir.setBounds(50, 160, 180, 20);
        Media.setBounds(50, 180, 180, 20);

        exibir.setHorizontalAlignment(SwingConstants.CENTER);

        Font font = new Font("Arial", Font.BOLD, 14);

        nota1.setFont(font);
        nota2.setFont(font);
        nota3.setFont(font);
        nota4.setFont(font);
        exibir.setFont(font);

        Media.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {

                //Resolvi usar o Try catch para tratamento de erros, o professor deu uma explicada, eu espequisei e é simples
                // Tenta executar esse bloco de código, caso dê erro ele vai para o catch
                try {
                    // Pede o número 1 e 2 para o metodo getNumero, já convertidos
                    double numero1 = getNumero1();
                    double numero2 = getNumero2();
                    double numero3 = getNumero3();
                    double numero4 = getNumero4();

                    // faz a soma dos dois números
                    double soma = numero1 + numero2  + numero3 + numero4;
                    double media = soma / 4;

                    //Chama o metodo motrarResultado, que mostra essa mensagem de uma forma mais bonita
                    mostrarResultado("A média é: " + media);
                    // Captura o erro caso o usuario digite algo que não é um número
                } catch (NumberFormatException erro) {
                    // Mensagem de erro
                    mostrarResultado("ERRO, Digite apenas números!");
                }
            }
        });

        exibir.setVisible(false);

        tela.add(nota1);
        tela.add(nota2);
        tela.add(nota3);
        tela.add(nota4);
        tela.add(exibir);
        tela.add(n1);
        tela.add(n2);
        tela.add(n3);
        tela.add(n4);
        tela.add(Media);

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(400, 500);
        setVisible(true);

    }

    public double getNumero1() {
        return Double.parseDouble(n1.getText());
    }

    // pega o número do segundo campo
    public double getNumero2() {
        return Double.parseDouble(n2.getText());
    }

    public double getNumero3() {
        return Double.parseDouble(n3.getText());
    }

    public double getNumero4() {
        return Double.parseDouble(n4.getText());
    }

    public void mostrarResultado(String mensagem) {
        exibir.setVisible(true);
        exibir.setText(mensagem);
        exibir.setForeground(Color.RED);
    }
}

