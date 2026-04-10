const int RED = 10;
const int YELLOW = 12;
const int GREEN = 11;

// Variáveis de tempo (em milissegundos)

void setup() {
  pinMode(RED, OUTPUT);
  pinMode(YELLOW, OUTPUT);
  pinMode(GREEN, OUTPUT);
  Serial.begin(1000);
  Serial.println("Sistema Pronto!");
  Serial.println("Comandos: L (Lento - 20s), N (Normal - 15s), R (Rapido - 10s)");
}

void loop() {
  // 1. VERIFICAÇÃO DO SERIAL
  if (Serial.available() > 0) {
    char comando = Serial.read();
    
    
    
    if (comando == 'P' || comando == 'p') {
      ligado = false;
      // Apaga todos os LEDs para indicar que parou
      digitalWrite(RED, LOW);
      digitalWrite(YELLOW, LOW);
      digitalWrite(GREEN, LOW);
      Serial.println(">> Sistema PARADO ");
    }

   

    // Ajuste de Velocidade para Verde e Vermelho
    if (comando == 'L' || comando == 'l') {
      tempoVerde = 20000;
      tempoVermelho = 20000;
      Serial.println("Modo Lento: Verde e Vermelho em 20 segundos");
    }
    else if (comando == 'N' || comando == 'n') {
      tempoVerde = 15000;
      tempoVermelho = 15000;
      Serial.println("Modo Normal: Verde e Vermelho em 15 segundos");
    }
    else if (comando == 'R' || comando == 'r') {
      tempoVerde = 10000;
      tempoVermelho = 10000;
      Serial.println("Modo Rápido: Verde e Vermelho em 10 segundos");
    }
  }

  // 2. LÓGICA DO SEMÁFORO
  if (ligado) {
    // VERDE
    digitalWrite(RED, LOW);
    digitalWrite(YELLOW, LOW);
    digitalWrite(GREEN, HIGH);
    delay(tempoVerde); // Aplica o tempo escolhido (20, 15 ou 10)

    // AMARELO
    digitalWrite(GREEN, LOW);
    digitalWrite(YELLOW, HIGH);
    delay(2000); // Mantido em 2 segundos para segurança

    // VERMELHO
    digitalWrite(YELLOW, LOW);
    digitalWrite(RED, HIGH);
    delay(tempoVermelho); // Aplica o tempo escolhido (20, 15 ou 10)
  }
}