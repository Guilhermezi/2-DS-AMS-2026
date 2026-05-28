package org.example;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;


public class ExemploJList2 extends JFrame {

    // -----------------------------------------------
    // ATRIBUTOS — precisam ser declarados aqui fora
    // para serem acessados dentro do ActionListener
    // -----------------------------------------------
    JList lista;
    JButton exibir;
    String cidades[] = {
            "Rio de Janeiro", "São Paulo", "Minas Gerais", "Espírito Santo",
            "Bahia", "Pernambuco", "Rio Grande do Sul", "Acre"
    };

    // =============================================
    // CONSTRUTOR — monta a janela (versão 2)
    // =============================================
    public ExemploJList2() {

        super("Exemplo de List");          // Título da janela

        Container tela = getContentPane(); // Painel principal da janela
        setLayout(null);                   // Posicionamento manual dos componentes

        exibir = new JButton("Exibir");    // Botão de ação
        lista = new JList(cidades);        // Lista com os estados do array
        lista.setVisibleRowCount(5);       // Mostra 5 itens visíveis por vez

        JScrollPane painelRolagem = new JScrollPane(lista); // Scroll na lista

        // Permite selecionar MÚLTIPLOS itens (Ctrl+Clique ou Shift+Clique)
        lista.setSelectionMode(ListSelectionModel.MULTIPLE_INTERVAL_SELECTION);

        painelRolagem.setBounds(40, 50, 150, 100); // Posição e tamanho do scroll
        exibir.setBounds(270, 50, 100, 30);        // Posição e tamanho do botão

        // -----------------------------------------------
        // LISTENER — ação ao clicar no botão
        // -----------------------------------------------
        exibir.addActionListener(
                new ActionListener() {
                    public void actionPerformed(ActionEvent e) {

                        // Retorna array com TODOS os itens selecionados
                        Object selecionados[] = lista.getSelectedValues();

                        // String que acumulará os estados selecionados
                        String resultados = "Valores selecionados:\n";

                        // Percorre e concatena cada estado selecionado
                        for (int i = 0; i < selecionados.length; i++) {
                            resultados += selecionados[i].toString() + "\n";
                        }

                        // Exibe popup com os resultados
                        JOptionPane.showMessageDialog(null, resultados);
                    }
                }
        );

        tela.add(painelRolagem); // Adiciona lista com scroll
        tela.add(exibir);        // Adiciona botão
        setSize(400, 250);       // Tamanho da janela
        setVisible(true);        // Exibe a janela
    }
}