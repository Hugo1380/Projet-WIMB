
int ID = 10;
int MEMO = 0;

void setup() {
  Serial.begin(9600);
  Serial3.begin(115200);
}
void loop() {

    
    Serial3.print("$$$");
    Serial.println("Mode commande active");
    delay(100);
    while (Serial3.available())
    Serial.print(Serial3.read());
    if (MEMO == 0){
        Serial3.println("C,0006667C8132");
        Serial.println("Connection a arret 1 ...");
    }
    if (MEMO == 1){
        Serial3.println("C,0006667C812B");
        Serial.println("Connection a arret 2 ...");
    }
    delay(10000);
    while (Serial3.available())
    Serial.println(Serial3.read());
    Serial3.println("---");
    delay(100);
    while (Serial3.available())
    Serial.println(Serial3.read());
    delay (1000);
    start:
    if(Serial3.available()){
        Serial.println("Detec");
        if (Serial3.read() == 49)
        {
            Serial.println(Serial3.read());
            Serial3.println(ID);
            Serial.print("ID envoyé :");
            Serial.println(ID);
            delay(100);
            Serial3.print("$$$");
            delay(1000);
            Serial3.println("k,");
            Serial.println("Kill");
            delay(5000);
        }
        if (MEMO == 1)
        {
            MEMO = 0;
        }
        else
        MEMO = 1;
    }
    else{
        delay(1000);
        Serial3.print("$$$");
        Serial.println("Mode commande active");
        delay(100);
        while (Serial3.available())
        Serial.println(Serial3.read());
        if (MEMO == 0){
            Serial3.println("C,0006667C8132");
            Serial.println("Connection a arret 1 ...");
        }
        if (MEMO == 1){
            Serial3.println("C,0006667C812B");
            Serial.println("Connection a arret 2 ...");
        }
        delay(10000);
        while (Serial3.available())
        Serial.println(Serial3.read());
        Serial3.println("---");
        delay(1500);
        while (Serial3.available())
        Serial.print(Serial3.read());
        delay (2000);
        goto start;
    }
    delay(5000);
  }
/*
0006667C8132,ARRET1,1F00
0006667C812B,ARRET2,1F00
*/

