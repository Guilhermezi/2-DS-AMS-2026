const int BOTAO = 12;
boolean estado_botao;

void setup()
{
  pinMode(BOTAO, INPUT);
  Serial.begin(9600);
}

void loop()
{
  estado_botao = digitalRead(BOTAO);
  if (estado_botao == false) {
  	Serial.println("Botao pressionado!!!");
  }
}