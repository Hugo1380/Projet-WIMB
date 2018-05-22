#include <Process.h>
#include <SoftwareSerial.h>


SoftwareSerial Serial3(8, 9);


String line_id = "2";
String stop_id = "6";
String bus_id = "11";
int nbr = 0;
int dix = 0;
int uni = 0;
int tps = 0;


void setup() {
    Bridge.begin();
    Serial.begin(9600);
    Serial3.begin(115200);
}


void loop() 
{
    str:
    delay (1000);
    Serial3.print("1");
    Serial.println("1");
    if(Serial3.available())
    {
        Serial.print("Donne recue");
        switch (Serial3.read()) 
        {
        case 48:
            dix = 0;
            break;
        case 49:
            dix = 1;
            break;
        case 50:
            dix = 2;
            break;
        case 51:
            dix = 3;
            break;  
        case 52:
            dix = 4;
            break;
        case 53:
            dix = 5;
            break;
         case 54:
            dix = 6;
            break;
        case 55:
            dix = 7;
            break;
        case 56:
            dix = 8;
            break;  
        case 57:
            dix = 9;
            break;
        default:
            goto str;
            break;
        }
        while ((Serial3.available() == 0) || tps < 5)
        {
            tps += 1;
            delay(1000);
        }
        if (tps < 5)
          goto str;
        else
          tps = 0;
        switch (Serial3.read()) 
        {
        case 48:
            uni = 0;
            break;
        case 49:
            uni = 1;
            break;
        case 50:
            uni = 2;
            break;
        case 51:
            uni = 3;
            break;  
        case 52:
            uni = 4;
            break;
        case 53:
            uni = 5;
            break;
        case 54:
            uni = 6;
            break;
        case 55:
            uni = 7;
            break;
        case 56:
            uni = 8;
            break;  
        case 57:
            uni = 9;
            break;
        default:
            goto str;
            break;
        }   
        Serial.println("Calcul");
        nbr = 10*dix+uni;
        Serial.print("nbr = ");
        Serial.println(nbr);
        Serial.println("Insertion dans bus_id...");
        bus_id = nbr;
        Serial.print("bus_id = ");
        Serial.println(bus_id);
        delay(500);
        gobdd();
    }
}


void gobdd() 
{
    Serial.println("Envoi...");
    Process p;        
    p.begin("php-cli");  
    p.addParameter("/www/send.php");
    p.addParameter(line_id);
    p.addParameter(stop_id);
    p.addParameter(bus_id);
    p.run();      
    while (p.available()>0) 
    {
        char c = p.read();
        Serial.print(c);
    }
    Serial.flush();
    delay(1000);
    loop();
}

