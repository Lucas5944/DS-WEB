void setup() {
  pinMode(13,OUTPUT);//porta saida
  Serial.begin(9600);//iniciando a comunicaçao serial


}

void loop() {
  if(Serial.available()>0) {
    char comando =  Serial.read();

    if (comando == 'L' || comando == 'l'){
      digitalWrite(13, HIGH); //ligar led
    }
    if (comando == 'D'  || comando == 'd'){
      digitalWrite(13, LOW);//desligar led
    }
    if (comando == 'P'  || comando == 'p'){ 
      digitalWrite(13, HIGH); //ligar led
      delay(1000)
      digitalWrite(13, LOW); //ligar
      delay(500)

    digitalWrite(13, HIGH); //ligar led
      delay(1000)
      digitalWrite(13, LOW); //ligar
      delay(500)

      digitalWrite(13, HIGH); //ligar led
      delay(1000)
      digitalWrite(13, LOW); //ligar
      delay(500)

  

  } 

}
