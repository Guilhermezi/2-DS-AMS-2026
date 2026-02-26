/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package exemplohipotenusa;

import java.util.Scanner;

/**
 *
 * @author guilherme
 */
public class Hipotenusa {
    Scanner sc = new Scanner(System.in);
    
    String calcular() {
        int expoente = 2;
        double[] medidas = baseAltura();
        double b = medidas[0];
        double h = medidas[1];
        double somaQuadrados = Math.pow(h, expoente) + Math.pow(b, expoente);
        double hipotenusa = Math.sqrt(somaQuadrados); 
        
        return "O valor da hipotenusa é: " + hipotenusa;
    }
    
    double[] baseAltura() {
    System.out.print("Base: ");
    double base = sc.nextDouble();
    System.out.print("Altura: ");
    double altura = sc.nextDouble();
    return new double[]{altura, base}; // Retorna os dois valores juntos
}

    
}
