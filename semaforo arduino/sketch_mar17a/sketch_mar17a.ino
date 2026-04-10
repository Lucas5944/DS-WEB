const int RED = 10;
const int YELLOW = 12;
const int GREEN = 11;

void setup() {
  pinMode(10,OUTPUT);
  pinMode(12,OUTPUT);
  pinMode(11,OUTPUT);//porta saida
  
  Serial.begin(9600);//iniciando a comunicaçao serial


}

void loop() {
  if(Serial.available()>0) {
    char comando =  Serial.read();

    if (comando == 'R' || comando == 'r'){
      digitalWrite(10, HIGH); //ligar led
    }
    if (comando == 'G'  || comando == 'g'){
      digitalWrite(11, HIGH);//desligar led
    }
     if (comando == 'Y'  || comando == 'Y'){z
    
    if (comando == 'P' || comando == 'p'){
      digitalWrite(10, LOW); //ligar led
     
    }
     if (comando == 'L' || comando == 'l'){
      digitalWrite(11, LOW); //ligar led
  } 
   if (comando == 'K' || comando == 'k'){
      digitalWrite(12, LOW); //ligar led
     

}
