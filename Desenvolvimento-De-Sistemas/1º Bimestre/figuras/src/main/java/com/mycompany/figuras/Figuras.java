/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.figuras;


/**
 *
 * @author guilherme
 */
public class Figuras {

    public static void main(String[] args) {
        Menu Mn = new Menu();
        figurasGeometricas Fg = new figurasGeometricas();
        
        
        switch (Mn.opcoes()) {
    case 1:
        String resultadoCirculo = Fg.circulo(); 
        System.out.println(resultadoCirculo); 
        break;
    case 2:
        String resultadoCirculoArea = Fg.circuloArea(); 
        System.out.println(resultadoCirculoArea); 
        break;
    case 3:
        String resultadoQuadradoArea = Fg.quadradoArea();
        System.out.println(resultadoQuadradoArea);
        break;
    case 4:
        String resultadoQuadradoPerimetro = Fg.quadradoPerimetro();
        System.out.println(resultadoQuadradoPerimetro);
        break;
    case 5:
        String resultadoretanguloArea = Fg.retanguloArea();
        System.out.println(resultadoretanguloArea);
        break;
    case 6:
        String resultadoRetanguloPerimetro = Fg.RetanguloPerimetro();
        System.out.println(resultadoRetanguloPerimetro);
        break;
    default:
        System.out.println("Digite um numero valido\n Vamos recomeçar: \n");
        Mn.opcoes();
} 
        
    }
    
    
}
