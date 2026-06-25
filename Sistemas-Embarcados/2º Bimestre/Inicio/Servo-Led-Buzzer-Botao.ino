#include <Servo.h> 

Servo servo; 
int bnt = 2; 
int pos = 0; 
bool aberto = false; // Guarda se a cancela está aberta ou fechada

void setup() { 
  servo.attach(9); 
  servo.write(0); // Começa fechado
  pinMode(4, OUTPUT); // LED
  pinMode(8, OUTPUT); // Buzzer
  pinMode(2, INPUT_PULLUP); // Usa o pull-up interno do Arduino (evita ruídos no botão)
  delay(500); 
} 

void loop() { 
  // Se o botão for pressionado (LOW por causa do INPUT_PULLUP)
  if (digitalRead(2) == LOW) { 
    
    if (!aberto) { 
      // AÇÃO: ABRIR (Servo vai para 90, liga LED e toca som)
      pos = 90; 
      servo.write(pos); 
      digitalWrite(4, HIGH); 
      tone(8, 250, 150); // Som de abertura
      aberto = true;     // Salva que agora está aberto
    } 
    else { 
      // AÇÃO: FECHAR (Servo vai para 0, desliga LED e toca som)
      pos = 0; 
      servo.write(pos); 
      digitalWrite(4, LOW); 
      tone(8, 350, 150); // Som de fechamento (tom diferente)
      aberto = false;    // Salva que agora está fechado
    } 
    
    delay(500); // Tempo de espera para evitar que um clique longo acione duas vezes (Debounce)
  } 
}
