#include <iostream>
using namespace std;

void nonne(double dig1, double dig2, double dig3) {
    if (dig1 >= dig2 && dig1 >= dig3) {
        cout << "The largest number is: " << dig1 << endl;
    }
    else if (dig2 >= dig1 && dig2 >= dig3) {
        cout << "The largest number is: " << dig2 << endl;
    }
    else {
        cout << "The largest number is: " << dig3 << endl;
    }
}

int main() {
    double num1, num2, num3;
    char choice;

    do {
        cout << "Enter number: ";
        cin >> num1;
        cout << "Enter number: ";
        cin >> num2;
        cout << "Enter number: ";
        cin >> num3;

        nonne(num1, num2, num3);  // Call the function to find and print the largest number

        cout << "Do you want to enter more numbers? (y/n): ";
        cin >> choice;

    } while (choice == 'y' || choice == 'Y');  // Continue if user enters 'y' or 'Y'

    cout << "Goodbye!" << endl;  // Display a goodbye message when the user exits
    return 0;
}
