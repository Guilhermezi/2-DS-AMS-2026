#include <Servo.h>

Servo servo;
int pos;
void setup (){
servo.attach(6);
// coloca o servo na posição inicial
servo.write(0);
delay(1000);
}
void loop(){
// movimentação até 180
for(pos = 0; pos < 180; pos++){
servo.write(pos);
delay(15);
}
delay(1000);
// movimentação até 0
for(pos = 180; pos >= 0; pos--){
servo.write(pos);
delay(15);
}
}