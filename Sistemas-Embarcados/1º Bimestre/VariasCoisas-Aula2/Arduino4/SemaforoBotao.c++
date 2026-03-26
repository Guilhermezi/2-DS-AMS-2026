const int VERDE = 11;
const int AMARELO = 10;
const int VERMELHO = 9;

const int VERDE_PEDESTRE = 8;
const int VERMELHO_PEDESTRE = 7;

const int BOTAO = 2;
boolean estado_botao;

void setup()
{
  pinMode(VERDE, OUTPUT);
  pinMode(AMARELO, OUTPUT);
  pinMode(VERMELHO, OUTPUT);
  
  pinMode(VERDE_PEDESTRE, OUTPUT);
  pinMode(VERMELHO_PEDESTRE, OUTPUT);
  
  pinMode(BOTAO, INPUT);
  // para ativar o resistor pull-up
  digitalWrite(BOTAO, HIGH);
}

void loop()
{
  estado_botao = digitalRead(BOTAO);
  
  	digitalWrite(VERDE, HIGH);
  	digitalWrite(VERMELHO_PEDESTRE, HIGH);
  	delay(5000);
  
  	digitalWrite(VERDE, LOW);
  	delay(10); 
  
    digitalWrite(AMARELO, HIGH);
    delay(2000); 
    digitalWrite(AMARELO, LOW);
    delay(10);
  
    digitalWrite(VERMELHO_PEDESTRE, LOW);
    delay(10);

    digitalWrite(VERMELHO, HIGH);
    digitalWrite(VERDE_PEDESTRE, HIGH);
    delay(5000); 
    delay(10); 

    digitalWrite(VERMELHO, LOW);
    delay(10);
    digitalWrite(VERDE_PEDESTRE, LOW);
    delay(10);
  
  if (estado_botao == LOW) {
  	digitalWrite(VERDE, HIGH);
  	digitalWrite(VERMELHO_PEDESTRE, HIGH);
  	delay(1000);
  
  	digitalWrite(VERDE, LOW);
  	delay(10); 
  
    digitalWrite(AMARELO, HIGH);
    delay(2000); 
    digitalWrite(AMARELO, LOW);
    delay(10);
  
    digitalWrite(VERMELHO_PEDESTRE, LOW);
    delay(10);

    digitalWrite(VERMELHO, HIGH);
    digitalWrite(VERDE_PEDESTRE, HIGH);
    delay(1000); 
    delay(10); 

    digitalWrite(VERMELHO, LOW);
    delay(10);
    digitalWrite(VERDE_PEDESTRE, LOW);
    delay(10);
  } 
    
}