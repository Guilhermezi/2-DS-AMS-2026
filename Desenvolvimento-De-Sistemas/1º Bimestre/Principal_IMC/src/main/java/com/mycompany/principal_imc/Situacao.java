/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.principal_imc;

public class Situacao {
    private String situacao;

    public String getSituacao() {
        return situacao;
    }

    public void setSituacao(String situacao) {
        this.situacao = situacao;
    }

    public void verificarSituacao(Imc p){

        double resultado = p.calcularIMC();//usando a variavel p para acessar o valor

        //estrutura if e else para verificar o valor
        if (resultado < 18.5){
            this.situacao =  "abaixo do peso";
        } else if (resultado >=  18.51 && resultado <= 24.9) {
            this.situacao =  "Normal (Eutrófico)";
        } else if (resultado >= 25 && resultado <= 29.9 ) {
            this.situacao =  "Sobrepeso de grau 1";
        } else if (resultado >= 30 && resultado <= 34.9 ) {
            this.situacao =  "Obesidade de grau 2";
        } else if (resultado >= 35 && resultado <= 39.9 ) {
            this.situacao =  "Obesidade Severa de grau 3";
        }else if (resultado >= 40) {
            this.situacao = "Obesidade Mórbida de grau 4";
        }

    }
}
