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
public class Menu {
    Scanner sc = new Scanner(System.in);
    
    int opcoes(){
        System.out.println("Menu:\n");
        System.out.println("Circulo:");
        System.out.println("Digite [1] para saber a circunferencia de um circulo\n");
        System.out.println("Digite [2] para saber a area de um circulo\n");
        
        System.out.println("Quadrado:");
        System.out.println("Digite [3] para saber a area de um quadrado\n");
        System.out.println("Digite [4] para saber o perimetro de um quadrado\n");
        
        System.out.println("Retangulo:");
        System.out.println("Digite [5] para saber a area de um retangulo\n");
        System.out.println("Digite [6] para saber o perimetro de um retangulo\n");
        int menu = sc.nextInt();
        return(menu);
    }
    
    
     
}
