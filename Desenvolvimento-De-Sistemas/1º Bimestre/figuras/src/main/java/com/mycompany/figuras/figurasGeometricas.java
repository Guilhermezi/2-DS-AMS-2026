/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.figuras;
import java.util.Scanner;

/**
 *
 * @author guilherme
 */
public class figurasGeometricas {
    Scanner sc = new Scanner(System.in);
    
    String circulo(){
        System.out.println("Voce escolheu a figura circulo para circunferencia");
        System.out.println("Digite o raio do circulo: ");
        double raio = sc.nextDouble();
        
        double circunferencia = 2 * Math.PI * raio;
        return("A circunferência: " + circunferencia);
    }
    
    String circuloArea(){
        System.out.println("Voce escolheu a figura circulo para area");
        System.out.println("Digite o raio do circulo: ");
        double raio = sc.nextDouble();
        
        int expoente = 2;
        double circunferencia = Math.PI * Math.pow(raio,expoente);
        return("A area: " + circunferencia);
    }
    
    String quadradoArea(){
        System.out.println("Voce escolheu a figura quadrado para area");
        System.out.println("Digite o valor do lado do quadrado: ");
        double lado = sc.nextDouble();
        
        double area = lado * lado;
        return("A area do seu quadrado: " + area);
    }
    
    String quadradoPerimetro(){
        System.out.println("Voce escolheu a figura quadrado para perimetro");
        System.out.println("Digite o valor do lado do quadrado: ");
        double lado = sc.nextDouble();
        
        double perimetro = 4 * lado;
        return("O perimetro do quadrado: " + perimetro);
    }
    
    String retanguloArea(){
        System.out.println("Voce escolheu o retangulo para fazer a area");
        System.out.println("Digite o valor da altura do retangulo: ");
        double altura = sc.nextDouble();
        
        System.out.println("Digite o valor da base do retangulo: ");
        double base = sc.nextDouble();
        
        double area = altura * base;
        return("A area do retangulo: " + area);
    }
    
    String RetanguloPerimetro(){
        System.out.println("Voce escolheu o retangulo para fazer perimetro");
        System.out.println("Digite o valor da altura do retangulo: ");
        double altura = sc.nextDouble();
        
        System.out.println("Digite o valor da base do retangulo: ");
        double base = sc.nextDouble();
        
        double perimetro = 2 * (altura + base);
        return("O perimetro do retangulo: " + perimetro);
    }
}
