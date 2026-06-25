  int trig = 4;
  int echo = 5;
  int led = 8;
  int buzzer = 2;

  // Variável para controlar se o alarme já foi tocado
  bool jaApitou = false; 

  void setup(){
    Serial.begin(9600);
    
    pinMode(trig, OUTPUT);
    pinMode(echo, INPUT);
    pinMode(led, OUTPUT);
    pinMode(buzzer, OUTPUT);
  }

  void loop(){
    digitalWrite(trig, LOW);
    delayMicroseconds(2);
    digitalWrite(trig, HIGH);
    delayMicroseconds(10);
    digitalWrite(trig, LOW);
    
    int duracao = pulseIn(echo, HIGH);
    int distancia = (duracao / 2) / 29.1;
    
    Serial.print("Distancia: ");
    Serial.print(distancia);
    Serial.println(" cm");
    
    // Verifica se está na distância E se ainda NÃO apitou
    if (distancia >= 50 && distancia <= 60){
      digitalWrite(led, HIGH);
      
      if (jaApitou == false) {
        tone(buzzer, 400, 2000); // Apita por 2000 milissegundos
        jaApitou = true;        // Salva que já apitou para não repetir
      }
    } else {
      digitalWrite(led, LOW);
      noTone(buzzer);
      jaApitou = false;         // Reseta quando o objeto sai da distância
    }
    
    delay(100);
  }
