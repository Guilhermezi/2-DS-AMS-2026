/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package exemplocarro;

/**
 *
 * @author guilherme
 */
public class ExemploCarro {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Carro meuCarro = new Carro();
        
        meuCarro.modelo = "911 GT3 RS";
        meuCarro.cor = "Lava Orange";
        meuCarro.motor = "4.0L boxer de seis cilindros";
        
        
        System.out.println("O modelo do carro: " + meuCarro.modelo);
        System.out.println("A cor do carro: " + meuCarro.cor);
        System.out.println("O motor dessa maquina de viuvas: " + meuCarro.motor);
        
        meuCarro.ligar();
        meuCarro.mudarMarcha();
        meuCarro.acelerar();
        meuCarro.brecar();
        meuCarro.desligar();
        
        
        meuCarro = null;
    }
    
}
