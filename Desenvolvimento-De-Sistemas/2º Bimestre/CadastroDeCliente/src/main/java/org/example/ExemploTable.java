package org.example;

// =============================================
// IMPORTAÇÕES NECESSÁRIAS
// =============================================
import java.awt.Dimension;    // Para definir tamanhos (largura x altura)
import java.awt.FlowLayout;   // Layout que posiciona componentes em sequência (esquerda → direita)
import javax.swing.JFrame;    // Janela principal da aplicação
import javax.swing.JScrollPane; // Painel com barra de rolagem
import javax.swing.JTable;    // Componente de tabela com linhas e colunas

// =============================================
// CLASSE — herda de JFrame (é uma janela)
// =============================================
public class ExemploTable extends JFrame {

    // -----------------------------------------------
    // ATRIBUTOS
    // -----------------------------------------------

    private JTable table; // Componente visual da tabela (declarado aqui para ser acessível em todo a classe)

    // Cabeçalho das colunas — define os títulos que aparecem no topo da tabela
    private final String colunas[] = {"Nome:", "Idade:", "Sexo:"};

    // Dados da tabela — matriz 2D (linhas x colunas)
    // Cada {} interno = uma linha da tabela
    // A ordem dos valores segue a ordem das colunas: Nome, Idade, Sexo
    private final String dados[][] = {
            {"Charles",    "19",  "Masculino"},
            {"Galileu",   "454",  "Masculino"},
            {"Hawking",    "76",  "Masculino"},
            {"Newton",    "375",  "Masculino"},
            {"Kepler",    "447",  "Masculino"},
            {"Einstein",  "139",  "Masculino"},
            {"Copernicus","545",  "Masculino"}
    };

    // =============================================
    // CONSTRUTOR — configura e monta a janela
    // =============================================
    public ExemploTable() {

        setLayout(new FlowLayout());         // Define o layout: componentes organizados em linha
        setSize(new Dimension(600, 200));    // Tamanho da janela: 600px largura × 200px altura
        setLocationRelativeTo(null);         // Centraliza a janela no monitor
        setTitle("Exemplo JTable");          // Texto exibido na barra de título da janela
        setDefaultCloseOperation(
                JFrame.EXIT_ON_CLOSE             // Ao fechar a janela, encerra o processo Java
        );

        // -----------------------------------------------
        // CRIANDO A JTABLE
        // -----------------------------------------------

        // Instancia a tabela passando:
        //   dados[][]  → o conteúdo de cada célula
        //   colunas[]  → os títulos do cabeçalho
        table = new JTable(dados, colunas);

        // Define o tamanho da área visível da tabela dentro do scroll
        // Sem isso, o JScrollPane não sabe quanto espaço reservar
        table.setPreferredScrollableViewportSize(new Dimension(500, 100));

        // Faz a tabela expandir verticalmente para preencher o JScrollPane
        // Sem isso, com poucos dados, fica um espaço vazio abaixo da tabela
        table.setFillsViewportHeight(true);

        // -----------------------------------------------
        // ADICIONANDO A TABELA NO SCROLL
        // -----------------------------------------------

        // Envolve a tabela em um JScrollPane
        // OBRIGATÓRIO: sem o JScrollPane, o cabeçalho (Nome/Idade/Sexo)
        // não aparece e não há barra de rolagem
        JScrollPane scrollPane = new JScrollPane(table);

        // Adiciona o scrollPane (com a tabela dentro) à janela
        // SEM este add(), a janela abre vazia
        add(scrollPane);
    }
}