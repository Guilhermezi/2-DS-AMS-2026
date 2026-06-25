#include <Servo.h>
Servo servo; // Instanciando o servo motor
int pos;// var de controle

void setup (){
  
servo.attach(6); // Dizendo onde o servo está
servo.write(0); // Dizendo que vale 0
pinMode(8, OUTPUT); // pino do buzzer
pinMode(4, OUTPUT); // pino dos leds
pinMode(2, OUTPUT); // pino dos leds
delay(1000);
  
}
void loop(){
  pos = analogRead(A0);
  pos = map(pos,0,1023,0,180);
  servo.write(pos);
  if(pos<5){
  	tone(8,250);
    digitalWrite(4, HIGH);
    digitalWrite(2, LOW);
  }else if(pos>175){
    tone(8,250);
    digitalWrite(4,LOW);
    digitalWrite(2, HIGH);
  }else{
  	noTone(8);
    digitalWrite(4, LOW);
    digitalWrite(2, LOW);
  }
  delay(15);
}