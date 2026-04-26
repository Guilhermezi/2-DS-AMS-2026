package org.example;
import javax.swing.*;
import java.awt.*;

public class Botoes extends JFrame {
    JButton botao, botaoTextImage, botaoImage;//Criando a variavel botoes
    ImageIcon icone;

    public Botoes() {//Construtor

        super("Botoes");//Titulo da PG

        Container tela = getContentPane(); //

        tela.setLayout(null); // setando o layout para poder eu mesmo estilizar

        icone = new ImageIcon("folder-open-fill.png");

        botao = new JButton("Novo"); // setando o botao com o texto Procurar
        botaoTextImage = new JButton("Abrir", icone);
        botaoImage = new JButton(icone);

        botao.setBounds(100, 20, 100, 20); // dizendo o lugar na tela
        botaoTextImage.setBounds(100, 50, 100, 20);
        botaoImage.setBounds(100, 80, 100, 20);

        tela.add(botao); // colocando na tela
        tela.add(botaoTextImage);
        tela.add(botaoImage);

        setSize(300, 250); // Dizendo o tamanho da tela

        setLocationRelativeTo(null); //Diz para o app aparecer no centro da tela
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // para poder fechar o app no X
        setVisible(true);  // Colocando como visivel
    }
}
