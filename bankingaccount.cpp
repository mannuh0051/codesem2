/*
NAME EMMANUEL KIPKOECH
REG NO BSE-0169/2024
PROGRAM FOR BANK ACCOUNT 
*/

#include <iostream>
using namespace std;

class BankAccount {
private:
    string accountHolder;
    double balance;

public:
    // Constructor
    BankAccount(string holder, double initialBalance) {
        accountHolder = holder;
        balance = initialBalance;
    }

    // Getter for accountHolder
    string getAccountHolder() {
        return accountHolder;
    }

    // Setter for accountHolder
    void setAccountHolder(string holder) {
        accountHolder = holder;
    }

    // Getter for balance
    double getBalance() {
        return balance;
    }

    // Setter for balance (with validation)
    void setBalance(double newBalance) {
        if (newBalance >= 0) {
            balance = newBalance;
        } else {
            cout << "Balance cannot be negative!" << endl;
        }
    }
};

int main() {
    // Creating an object of BankAccount
    BankAccount myAccount("John Doe", 1000.50);

    // Accessing private members using getters and setters
    cout << "Account Holder: " << myAccount.getAccountHolder() << endl;
    cout << "Balance: $" << myAccount.getBalance() << endl;

    // Updating balance
    myAccount.setBalance(1500.75);
    cout << "Updated Balance: $" << myAccount.getBalance() << endl;

    return 0;
}
