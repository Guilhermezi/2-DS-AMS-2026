package org.example;

// =============================================
// IMPORTAÇÕES NECESSÁRIAS
// =============================================
import javax.swing.*;       // JFrame, JComboBox, JButton, JLabel
import java.awt.*;          // Container, layout e ferramentas gráficas base
import java.awt.event.*;    // ActionListener e ActionEvent (captura clique do botão)

// =============================================
// CLASSE PRINCIPAL — herda de JFrame (janela)
// =============================================
public class ExemploJCombox extends JFrame {

    // -----------------------------------------------
    // ATRIBUTOS DA CLASSE
    // -----------------------------------------------
    JComboBox lista;    // Lista suspensa (dropdown) com os estados

    String cidades[] = {  // Array com as opções que aparecerão no dropdown
            "Rio de Janeiro", "São Paulo", "Minas Gerais", "Espírito Santo",
            "Bahia", "Pernambuco", "Rio Grande do Sul", "Acre"
    };

    JButton exibir;  // Botão que o usuário clica para ver o estado selecionado
    JLabel rotulo;   // Rótulo que exibe o resultado na tela

    // =============================================
    // CONSTRUTOR — configura e monta a janela
    // =============================================
    public ExemploJCombox() {

        super("Exemplo JCombox");          // Título da janela

        Container tela = getContentPane(); // Painel principal da janela
        tela.setLayout(null);              // Posicionamento manual com setBounds()

        exibir = new JButton("Exibir");    // Cria o botão
        rotulo = new JLabel("");           // Cria o rótulo inicialmente vazio

        lista = new JComboBox(cidades);    // Cria o dropdown com o array de estados

        // Define quantas opções ficam visíveis antes de aparecer a barra de rolagem
        // (diferente da JList que usa setVisibleRowCount)
        lista.setMaximumRowCount(5);

        // Define posição e tamanho de cada componente (x, y, largura, altura)
        lista.setBounds(50, 50, 150, 30);
        exibir.setBounds(270, 50, 100, 30);
        rotulo.setBounds(50, 150, 200, 30);

        // -----------------------------------------------
        // LISTENER — ação ao clicar no botão
        // -----------------------------------------------
        exibir.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {

                // getSelectedItem() retorna o item atualmente selecionado no dropdown
                // (diferente da JList que usa getSelectedValue())
                rotulo.setText("o estado é: " + lista.getSelectedItem().toString());
            }
        });

        // Adiciona os componentes ao painel da janela
        tela.add(lista);   // Adiciona o dropdown
        tela.add(exibir);  // Adiciona o botão
        tela.add(rotulo);  // Adiciona o rótulo de resultado

        setSize(400, 250); // Tamanho da janela

        setVisible(true);
    }
}