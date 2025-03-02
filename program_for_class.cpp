/*
NAME EMMANUEL KIPKOECH
REG NO BSE-0169/2024
PROGRAM FOR BANK ACCOUNT 
class for encapsulation
*/
#include <iostream>
using namespace std;
class car{
public:
 string brand;
 string model;
 float price;
 int mileage;
 car(string a, string b, float c, int d ){
 brand = a;
 model =b;
 price =c;
 mileage =d;
 }
 void display(){
 cout<<"brand:"<<brand<<endl;
 cout<<"model:"<<model<<endl;
 cout<<"price:"<<price<<endl;
 cout<<"mileage:"<<mileage<<endl;
 }

 float drive(float distance){
 mileage += distance;
 cout<<"distance travelled "<<distance<<" total mileage moved "<<mileage<<endl;
 }

};
int main(){
car instance1("toyota", "corolla", 2000, 5000);
instance1.display();
//simulaate driving
instance1.drive(150);
instance1.drive(300);


return 0;
}
