package org.example;
// =============================================
// IMPORTAÇÕES NECESSÁRIAS
// =============================================

import javax.swing.*;       // Componentes visuais: JFrame, JList, JButton, JLabel, JScrollPane
import java.awt.*;          // Container, layout e ferramentas gráficas base
import java.awt.event.*;    // ActionListener e ActionEvent (para capturar cliques no botão)

// =============================================
// CLASSE PRINCIPAL — herda de JFrame (janela)
// =============================================
public class ExemploJList extends JFrame {

    // -----------------------------------------------
    // ATRIBUTOS DA CLASSE (componentes da interface)
    // -----------------------------------------------

    JList lista;            // Lista visual que exibirá os estados brasileiros
    String cidades[] = {    // Array de Strings com os estados a serem listados
            "Rio de Janeiro", "São Paulo", "Minas Gerais", "Espírito Santo",
            "Bahia", "Pernambuco", "Rio Grande do Sul", "Acre"
    };
    JButton exibir;         // Botão que o usuário clicará para ver o estado selecionado
    JLabel rotulo;          // Rótulo (texto) que mostrará o resultado na tela

    // -----------------------------------------------
    // CONSTRUTOR — configura e monta a janela
    // -----------------------------------------------
    public ExemploJList() {

        super("Exemplo de List");           // Define o título da janela

        Container tela = getContentPane(); // Obtém o painel principal da janela
        setLayout(null);                   // Remove o layout automático (posicionamento manual)

        exibir = new JButton("Exibir");    // Cria o botão com o texto "Exibir"
        rotulo = new JLabel("");           // Cria o rótulo inicialmente vazio

        lista = new JList(cidades);        // Cria a JList passando o array de estados
        lista.setVisibleRowCount(5);       // Define que 5 linhas ficam visíveis por vez

        // Envolve a lista em um painel com barra de rolagem (scroll)
        JScrollPane painelRolagem = new JScrollPane(lista);

        // Define seleção simples: apenas um item pode ser selecionado por vez
        lista.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);

        // Define a posição e tamanho do painel de rolagem (x, y, largura, altura)
        painelRolagem.setBounds(40, 50, 150, 100);

        // Define posição e tamanho do botão
        exibir.setBounds(270, 50, 100, 30);

        // Define posição e tamanho do rótulo
        rotulo.setBounds(50, 150, 200, 30);

        // -----------------------------------------------
        // LISTENER — ação executada ao clicar no botão
        // -----------------------------------------------
        exibir.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {
                        // Atualiza o rótulo com o estado selecionado na lista
                        rotulo.setText("o estado é: " + lista.getSelectedValue().toString());
                    }
                }
        );

        // Adiciona os componentes ao painel da janela
        tela.add(painelRolagem); // Adiciona a lista com scroll
        tela.add(exibir);        // Adiciona o botão
        tela.add(rotulo);        // Adiciona o rótulo de resultado

        setSize(400, 250);       // Define o tamanho da janela (largura x altura)
        setVisible(true);        // Torna a janela visível na tela
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // Encerra o programa ao fechar
    }
}