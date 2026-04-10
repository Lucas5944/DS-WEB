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
  } 

}
