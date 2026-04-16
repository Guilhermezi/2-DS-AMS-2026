package org.example;
import java.awt.*;
import javax.swing.*;

public class CadastroCliente extends JFrame{
    JLabel rotulo1, rotulo2, rotulo3, rotulo4, rotulo5, rotulo6, rotulo7, rotulo8;
    JTextField texto1, texto2, texto3, texto4, texto5, texto6, texto7;

    public CadastroCliente(){
    super("Cadastro Cliente"); //Titulo do app
        Container tela = getContentPane(); // Obtém a camada de conteúdo da janela para permitir a adição e organização de componentes (botões, textos, etc.)
        setLayout(null); //

        setSize(500, 500); //Diz o tamanho inicial do app
//        setResizable(false);  // Bloqueia o redimencinamento do app
        setLocationRelativeTo(null); //Diz para o app aparecer no centro da tela
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // para poder fechar o app no X

        tela.setBackground(Color.lightGray); //Cor da Tela em Hexadecimal

        // Colocando Textos:
        rotulo1 = new JLabel("Nome");
        rotulo2 = new JLabel("CPF");
        rotulo3 = new JLabel("RG");
        rotulo4 = new JLabel("Endereço");
        rotulo5 = new JLabel("Cidade");
        rotulo6 = new JLabel("Estado");
        rotulo7 = new JLabel("CEP");
        rotulo8 = new JLabel("Cadastro de Cliente");

        // Dizendo o lugar que vai ficar na tela, e tamanho
        rotulo1.setBounds(50, 20, 80, 20); // Os número corespondem a X, Y, Largura e Altura
        rotulo2.setBounds(50, 60, 80, 20);
        rotulo3.setBounds(50, 100, 80, 20);
        rotulo4.setBounds(50, 140, 80, 20);
        rotulo5.setBounds(50, 180, 80, 20);
        rotulo6.setBounds(50, 220, 80, 20);
        rotulo7.setBounds(50, 260, 80, 20);
        rotulo8.setBounds(120, 5, 250, 20);

        // Dizendo as cores das letras
        rotulo1.setForeground(Color.decode("#333333"));
        rotulo2.setForeground(Color.decode("#333333"));
        rotulo3.setForeground(Color.decode("#333333"));
        rotulo4.setForeground(Color.decode("#333333"));
        rotulo5.setForeground(Color.decode("#333333"));
        rotulo6.setForeground(Color.decode("#333333"));
        rotulo7.setForeground(Color.decode("#333333"));
        rotulo8.setForeground(Color.RED);

        //Fontes:
        rotulo1.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo2.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo3.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo4.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo5.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo6.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo7.setFont(new Font("Arial", Font.BOLD, 16));
        rotulo8.setFont(new Font("Arial", Font.BOLD, 24));

        //Colocando na Tela:
        tela.add(rotulo1);
        tela.add(rotulo2);
        tela.add(rotulo3);
        tela.add(rotulo4);
        tela.add(rotulo5);
        tela.add(rotulo6);
        tela.add(rotulo7);
        tela.add(rotulo8);




        //Colocando os Inputs
        texto1 = new JTextField(50);
        texto2 = new JTextField(13);
        texto3 = new JTextField(10);
        texto4 = new JTextField(60);
        texto5 = new JTextField(40);
        texto6 = new JTextField(40);
        texto7 = new JTextField(8);

        // Dizendo o lugar que vai ficar na tela, e tamanho
        texto1.setBounds(50, 36, 80, 20); // Os número corespondem a X, Y, Largura e Altura
        texto2.setBounds(50, 76, 70, 20);
        texto3.setBounds(50, 116, 60, 20);
        texto4.setBounds(50, 156, 120, 20);
        texto5.setBounds(50, 196, 120, 20);
        texto6.setBounds(50, 236, 90, 20);
        texto7.setBounds(50, 276, 50, 20);

        //Colocando na Tela:
        tela.add(texto1);
        tela.add(texto2);
        tela.add(texto3);
        tela.add(texto4);
        tela.add(texto5);
        tela.add(texto6);
        tela.add(texto7);

        setVisible(true); // Torna o app visivel Sempre o último no contrutor
    }
}
