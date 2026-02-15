/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.bhaskara;
import java.util.Scanner;

/**
 *
 * @author Admin
 */
public class Bhaskara {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        
        System.out.println("Digite o valor de a: ");
        double a = sc.nextDouble();
        
        System.out.println("Digite o valor de b: ");
        double b = sc.nextDouble();   

        System.out.println("Digite o valor de c: ");
        double c = sc.nextDouble();
        
        double bQuadrado = b * b;
        
        double delta = bQuadrado - 4 * a * c;

        if (delta >= 0) {
            double raiz = Math.sqrt(delta);
            
            double Xmais = (-b + (raiz)) / (2 * a);
            double Xmenos = (-b - (raiz)) / (2 * a);
            
            System.out.println("Mais X = " + Xmais);
            System.out.println("Mais X = " + Xmenos);
    
        } else {
            System.out.println("Não existem raízes reais.");
        }

        
        sc.close();
        
    }
}
