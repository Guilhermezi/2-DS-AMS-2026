package org.example;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class Password extends JFrame{
    JPasswordField caixa; // Criando a caixa de texto para a senha
    JLabel rotulo; // Colocando O titulo senha na tela
        public Password(){ // Contrutor
            super("Exemplo password"); // Titulo da PG
            Container tela = getContentPane(); // Não lembro
            setLayout(null); // Definindo o estilo para nulo

            rotulo = new JLabel("Senha"); // Definindo oq vai ser escrito no label rotulo

            caixa = new JPasswordField(10); // Definindo até quantos caracteres pode ter a senha

            rotulo.setBounds(50, 20, 100, 20); // Lugar na tela
            caixa.setBounds(50, 60, 100, 20);

            tela.add(rotulo); // Colocando na tela
            tela.add(caixa);

            setSize(400, 250); // Dizendo o tamanho da tela

            setLocationRelativeTo(null); //Diz para o app aparecer no centro da tela
            setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // para poder fechar o app no X


            setVisible(true); // Dizendo que a tela pode ser visivel
        }
}
