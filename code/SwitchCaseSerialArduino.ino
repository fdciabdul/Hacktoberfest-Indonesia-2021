#define red 5
#define green 6
#define blue 7

void setup() {
  // put your setup code here, to run once:
  pinMode(red, OUTPUT);
  pinMode(green, OUTPUT);
  pinMode(blue, OUTPUT);
  Serial.begin(9600);
  Serial2.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:

  while (Serial2.available()) {
   
    char val = Serial2.read();
    Serial.println(val);
    
    switch (val) {
      case 'r':
        digitalWrite(red, HIGH);
        break;
      case 'g':
        digitalWrite(green, HIGH);
        break;
      case 'b':
        digitalWrite(blue, HIGH);
        break;
      default:
        digitalWrite(red, LOW);
        digitalWrite(green, LOW);
        digitalWrite(blue, LOW);
        break;
    }
  }
}
