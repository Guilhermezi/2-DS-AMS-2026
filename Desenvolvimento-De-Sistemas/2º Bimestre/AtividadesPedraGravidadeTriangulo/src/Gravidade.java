import javax.swing.*;
import javax.swing.border.LineBorder;
import java.awt.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

public class Gravidade extends JFrame {

    // Labels da tela
    private JLabel peso, selecionar, resultado;

    // Campo onde o usuário digita o peso
    private JTextField Tpeso;

    // Botão para calcular
    private JButton calcularPeso;

    // Opções de planetas
    private JRadioButton mercurio, venus, marte, jupiter, saturno, urano;

    // Grupo para permitir selecionar apenas 1 planeta
    private ButtonGroup grupoPlanetas;

    // Lista para armazenar todos os radio buttons
    List<JRadioButton> radios = new ArrayList<>();

    public Gravidade() {

        // Título da janela
        super("Calculadora de Gravidade");

        // Pega o container da tela
        Container tela = getContentPane();

        // Define layout manual
        setLayout(null);

        // Cria labels
        peso = new JLabel("Digite seu peso (KG):");
        selecionar = new JLabel("Selecione o planeta:");

        // Label que vai mostrar o resultado
        resultado = new JLabel("", SwingConstants.CENTER);

        // Campo de texto
        Tpeso = new JTextField();

        // Botão de calcular
        calcularPeso = new JButton("Calcular");

        // Cria radio buttons dos planetas
        mercurio = new JRadioButton("Mercúrio");
        venus = new JRadioButton("Vênus");
        marte = new JRadioButton("Marte");
        jupiter = new JRadioButton("Júpiter");
        saturno = new JRadioButton("Saturno");
        urano = new JRadioButton("Urano");

        // Adiciona todos os radio buttons na lista
        Collections.addAll(radios, mercurio, venus, marte, jupiter, saturno, urano);

        // Cria grupo dos radio buttons
        grupoPlanetas = new ButtonGroup();

        // Adiciona cada planeta no grupo
        for (JRadioButton radio : radios) {
            grupoPlanetas.add(radio);
        }

        // Posiciona label do peso
        peso.setBounds(20, 20, 150, 30);

        // Posiciona campo do peso
        Tpeso.setBounds(20, 55, 150, 30);

        // Posiciona label dos planetas
        selecionar.setBounds(220, 20, 150, 30);

        // Posições dos radio buttons
        mercurio.setBounds(220, 55, 100, 25);
        venus.setBounds(220, 80, 100, 25);
        marte.setBounds(220, 105, 100, 25);
        jupiter.setBounds(220, 130, 100, 25);
        saturno.setBounds(220, 155, 100, 25);
        urano.setBounds(220, 180, 100, 25);

        // Posição do botão
        calcularPeso.setBounds(20, 110, 150, 35);

        // Posição da caixa de resultado
        resultado.setBounds(20, 170, 170, 40);

        // Coloca borda na label de resultado
        resultado.setBorder(new LineBorder(Color.GRAY));

        // Evento de clique do botão
        calcularPeso.addActionListener(e -> {
            try {

                // Converte texto digitado para número
                double pesoUsuario = Double.parseDouble(Tpeso.getText());

                // Variável que guarda resultado final
                double resultadoFinal = 0;

                // Verifica planeta escolhido e calcula gravidade
                if (mercurio.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 0.37;

                } else if (venus.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 0.88;

                } else if (marte.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 0.38;

                } else if (jupiter.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 2.64;

                } else if (saturno.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 1.15;

                } else if (urano.isSelected()) {
                    resultadoFinal = (pesoUsuario / 10) * 1.17;

                } else {

                    // Caso nenhum planeta seja selecionado
                    JOptionPane.showMessageDialog(
                            null,
                            "Selecione um planeta!",
                            "Aviso",
                            JOptionPane.WARNING_MESSAGE
                    );
                    return;
                }

                // Mostra resultado formatado com 2 casas decimais
                resultado.setText(String.format("%.2f N", resultadoFinal));

                // Mostra mensagem de sucesso
                JOptionPane.showMessageDialog(
                        null,
                        "Cálculo realizado com sucesso!",
                        "Sucesso",
                        JOptionPane.INFORMATION_MESSAGE
                );

            } catch (Exception ex) {

                // Caso o usuário digite algo inválido
                JOptionPane.showMessageDialog(
                        null,
                        "Digite um peso válido!",
                        "Erro",
                        JOptionPane.ERROR_MESSAGE
                );
            }
        });

        // Adiciona labels
        tela.add(peso);
        tela.add(selecionar);
        tela.add(resultado);

        // Adiciona campo de texto
        tela.add(Tpeso);

        // Adiciona botão
        tela.add(calcularPeso);

        // Adiciona todos os radio buttons
        for (JRadioButton radio : radios) {
            tela.add(radio);
        }

        // Define tamanho da janela
        setSize(420, 300);

        // Centraliza a janela
        setLocationRelativeTo(null);

        // Impede redimensionar
        setResizable(false);

        // Fecha aplicação ao fechar janela
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        // Torna a janela visível
        setVisible(true);
    }
}