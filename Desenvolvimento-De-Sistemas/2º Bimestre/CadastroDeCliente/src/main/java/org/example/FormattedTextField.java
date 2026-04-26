package org.example;
import javax.swing.*;
import javax.swing.text.*;
import java.awt.*;
import java.awt.event.*;
import java.text.*;

public class FormattedTextField extends JFrame {
    JLabel rotuloCEP, rotuloTEL, rotuloCPF, rotuloDATA; //Crindo as variaveis de Texto do tipo JLabel
    JFormattedTextField CEP, TEL, CPF, DATA; //Criando as variaveis de input
    MaskFormatter mascaraCEP, mascaraTEL, mascaracCPF, mascaracDATA; // Faço ideia

    public FormattedTextField() {
        super("Formatted TextField");
        Container tela = getContentPane(); // Cria tela
        setLayout(null); // diz que não tem layout nenhum para mim mesmo criar

        // Dizendo oq cada var vai mostrar na tela
        rotuloCEP = new JLabel("CEP:");
        rotuloTEL  = new JLabel("TEL:");
        rotuloCPF = new JLabel("CPF:");
        rotuloDATA = new JLabel("DATA:");

        // Dizendo o lugar na tela
        rotuloCEP.setBounds(50, 40, 100, 20);
        rotuloTEL.setBounds(50, 80, 100, 20);
        rotuloCPF.setBounds(50, 120, 100, 20);
        rotuloDATA.setBounds(50, 160, 100, 20);

        try{
            mascaraCEP = new MaskFormatter("#####-###");
            mascaraTEL = new MaskFormatter("(##)####-####");
            mascaracCPF = new MaskFormatter("########-##");
            mascaracDATA = new MaskFormatter("##/##/####");

            mascaraCEP.setPlaceholderCharacter('_');
            mascaraTEL.setPlaceholderCharacter('_');
            mascaracCPF.setPlaceholderCharacter('_');
            mascaracDATA.setPlaceholderCharacter('_');
        }
        catch(ParseException excp){}
        CEP = new JFormattedTextField(mascaraCEP);
        TEL = new JFormattedTextField(mascaraTEL);
        CPF = new JFormattedTextField(mascaracCPF);
        DATA = new JFormattedTextField(mascaracDATA);

        // Dizendo onde vai ficar
        CEP.setBounds(150, 40, 100, 20);
        TEL.setBounds(150, 80, 100, 20);
        CPF.setBounds(150, 120, 100, 20);
        DATA.setBounds(150, 160, 100, 20);


        // ADD na tela
        tela.add(rotuloCEP);
        tela.add(rotuloTEL);
        tela.add(rotuloCPF);
        tela.add(rotuloDATA);

        tela.add(CEP);
        tela.add(TEL);
        tela.add(CPF);
        tela.add(DATA);

        setSize(300, 300);

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        setVisible(true);
    }

}
