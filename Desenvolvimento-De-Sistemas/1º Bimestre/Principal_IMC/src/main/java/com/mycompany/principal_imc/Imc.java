/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.principal_imc;


/**
 *
 * @author guilherme
 */
public class Imc {
    private double peso;
    private double altura;
    private double imc;

    public double getAltura (){
        return this.altura;
    }

    public void setAltura (double altura){
        this.altura = altura;
    }

    public double getPeso (){
        return this.peso;
    }

    public void setPeso (double peso){
        this.peso = peso;
    }

    public double calcularIMC(){
        imc = peso/(altura*altura);
        return imc;
    }
    
    public double getIMC(){
        return this.imc;
    }
    public void setIMC(){
        this.imc = imc;
    }
    
    public void cadastrarDados(double peso, double altura) {
        this.peso = peso;
        this.altura = altura;
    }
}
