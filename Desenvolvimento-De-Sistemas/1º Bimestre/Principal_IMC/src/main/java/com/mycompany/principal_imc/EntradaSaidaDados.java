package com.mycompany.principal_imc;

import javax.swing.JOptionPane;
public class EntradaSaidaDados {
    public String entradaDados(String mensagemEntrada){
        String entrada = JOptionPane.showInputDialog(mensagemEntrada);
        return entrada;
    }
    public void saidaDados(String mensagemEntrada){
        JOptionPane.showMessageDialog(null, mensagemEntrada);
    }
}
