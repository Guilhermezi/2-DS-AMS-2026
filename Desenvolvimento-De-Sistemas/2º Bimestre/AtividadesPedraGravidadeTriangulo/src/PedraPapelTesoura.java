import javax.swing.*;
import java.awt.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Random;

public class PedraPapelTesoura extends JFrame {

    // Labels da tela
    private JLabel labelTitulo, resultado;

    // Botão para iniciar o jogo
    private JButton botaoJogar;

    // Opções do jogador
    private JRadioButton pedra, papel, tesoura;

    // Grupo para permitir selecionar apenas uma opção
    private ButtonGroup grupoEscolhas;

    // Lista para armazenar os radio buttons
    List<JRadioButton> listaEscolhas = new ArrayList<>();

    public PedraPapelTesoura() {

        // Título da janela
        super("Pedra, Papel e Tesoura");

        // Pega o container da janela
        Container tela = getContentPane();

        // Define layout manual
        setLayout(null);

        // Cria o texto do topo
        labelTitulo = new JLabel("Escolha sua jogada:");

        // Label que mostra o resultado
        resultado = new JLabel("", SwingConstants.CENTER);

        // Cria o botão de jogar
        botaoJogar = new JButton("Jogar");

        // Cria as opções do jogo
        pedra = new JRadioButton("Pedra");
        papel = new JRadioButton("Papel");
        tesoura = new JRadioButton("Tesoura");

        // Adiciona todos os radio buttons na lista
        Collections.addAll(listaEscolhas, pedra, papel, tesoura);

        // Cria o grupo
        grupoEscolhas = new ButtonGroup();

        // Adiciona os botões no grupo
        grupoEscolhas.add(pedra);
        grupoEscolhas.add(papel);
        grupoEscolhas.add(tesoura);

        // Define posição do título
        labelTitulo.setBounds(20, 20, 200, 30);

        // Define posição das opções
        pedra.setBounds(20, 60, 100, 30);
        papel.setBounds(20, 90, 100, 30);
        tesoura.setBounds(20, 120, 100, 30);

        // Define posição do botão
        botaoJogar.setBounds(160, 80, 100, 35);

        // Define posição do resultado
        resultado.setBounds(20, 170, 250, 30);

        // Evento de clique do botão
        botaoJogar.addActionListener(e -> {
            try {

                // Verifica se o usuário escolheu alguma opção
                if (!pedra.isSelected() && !papel.isSelected() && !tesoura.isSelected()) {
                    JOptionPane.showMessageDialog(
                            null,
                            "Escolha uma opção primeiro!",
                            "Aviso",
                            JOptionPane.WARNING_MESSAGE
                    );
                    return;
                }

                // Cria objeto para número aleatório
                Random rand = new Random();

                // Sorteia número entre 0 e 2
                int numeroRandom = rand.nextInt(3);

                // Variáveis para guardar jogadas
                String escolhaPc = "";
                String escolhaJogador = "";
                String vencedor = "";

                // Define jogada do computador
                if (numeroRandom == 0) {
                    escolhaPc = "Pedra";
                } else if (numeroRandom == 1) {
                    escolhaPc = "Papel";
                } else {
                    escolhaPc = "Tesoura";
                }

                // Descobre jogada do jogador
                if (pedra.isSelected()) {
                    escolhaJogador = "Pedra";
                } else if (papel.isSelected()) {
                    escolhaJogador = "Papel";
                } else {
                    escolhaJogador = "Tesoura";
                }

                // Se os dois escolheram a mesma coisa
                if (escolhaJogador.equals(escolhaPc)) {
                    vencedor = "Empate!";
                }

                // Verifica todas as condições de vitória do jogador
                else if (
                        (escolhaJogador.equals("Pedra") && escolhaPc.equals("Tesoura")) ||
                                (escolhaJogador.equals("Papel") && escolhaPc.equals("Pedra")) ||
                                (escolhaJogador.equals("Tesoura") && escolhaPc.equals("Papel"))
                ) {
                    vencedor = "Você venceu!";
                }

                // Caso contrário, computador vence
                else {
                    vencedor = "Computador venceu!";
                }

                // Mostra resultado na label
                resultado.setText(vencedor);

                // Mostra popup com resultado completo
                JOptionPane.showMessageDialog(
                        null,
                        "Sua jogada: " + escolhaJogador +
                                "\nComputador: " + escolhaPc +
                                "\n\n" + vencedor,
                        "Resultado",
                        JOptionPane.INFORMATION_MESSAGE
                );

            } catch (Exception ex) {

                // Caso aconteça algum erro
                JOptionPane.showMessageDialog(
                        null,
                        "Ocorreu um erro!",
                        "Erro",
                        JOptionPane.ERROR_MESSAGE
                );
            }
        });

        // Adiciona componentes na tela
        tela.add(labelTitulo);
        tela.add(resultado);
        tela.add(botaoJogar);

        // Adiciona todos os radio buttons
        for (JRadioButton radio : listaEscolhas) {
            tela.add(radio);
        }

        // Define tamanho da janela
        setSize(320, 260);

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