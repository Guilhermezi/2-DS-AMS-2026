// C++ code
//
#define ledVermelho 10
#define ledVerde 9
#define ledAmarelo 8

#define ledPassar 11
#define ledFica 12

void setup()
{
  pinMode(ledVerde, OUTPUT);
  pinMode(ledAmarelo, OUTPUT);
  pinMode(ledVermelho, OUTPUT);
  
  pinMode(ledPassar, OUTPUT);
  pinMode(ledFica, OUTPUT);
}

void loop()
{
  digitalWrite(ledVerde, HIGH);
  digitalWrite(ledFica, HIGH);
  delay(5000);
  
  digitalWrite(ledVerde, LOW);
  delay(10); 
  
  digitalWrite(ledAmarelo, HIGH);
  delay(2000); 
  digitalWrite(ledAmarelo, LOW);
  delay(10);
  
  digitalWrite(ledFica, LOW);
  delay(10);
  
  digitalWrite(ledVermelho, HIGH);
  digitalWrite(ledPassar, HIGH);
  delay(5000); 
  delay(10); 
  
  digitalWrite(ledVermelho, LOW);
  delay(10);
  digitalWrite(ledPassar, LOW);
  delay(10);
  
}