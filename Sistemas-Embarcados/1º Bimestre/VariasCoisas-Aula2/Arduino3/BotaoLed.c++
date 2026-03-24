const int LED = 7;
const int BOTAO = 10;
boolean estado_botao;


void setup()
{
  pinMode(LED, OUTPUT);
  pinMode(BOTAO, INPUT);
  // para ativar o resistor pull-up
  digitalWrite(BOTAO, HIGH);
}

void loop()
{
  estado_botao = digitalRead(BOTAO);
  
  if (estado_botao == HIGH) {
  	digitalWrite(LED, HIGH);
  } else {
    digitalWrite(LED, LOW);	
  }
  
  
}