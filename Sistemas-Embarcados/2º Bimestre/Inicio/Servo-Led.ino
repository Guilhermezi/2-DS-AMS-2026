#include <Servo.h>
Servo servo; // Instanciando o servo motor
int pos;// var de controle
void setup (){
servo.attach(6); // Dizendo onde o servo está
servo.write(0); // Dizendo que vale 0
pinMode(4, OUTPUT); // pino dos leds
pinMode(2, OUTPUT); // pino dos leds
delay(1000);
}
void loop(){
for(pos = 0; pos < 180; pos++){
servo.write(pos);
delay(15);
digitalWrite(4, HIGH);
digitalWrite(2, LOW);
}
delay(1000);
for(pos = 180; pos >= 0; pos--){
servo.write(pos);
delay(15);
digitalWrite(4, LOW);
digitalWrite(2, HIGH);
}
}