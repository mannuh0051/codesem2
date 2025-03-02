/*
NAME:EMMANUEL KIPKOECH MITEI
ADM: BSE-05-0169/2024
TITLE MANAGEMENT SYSTEM
*/

#include <iostream>
using namespace std;

class person {
protected:
    string name;
public:
    void setname(string n) {
        name = n;
    }
    string getname() {
        return name;
    }
};

class library_member : public person {
private:
    int member_id;
    int books_borrowed;
public:
    // Corrected constructor
    library_member(string n, int m, int b) {
        setname(n);  // Fixed: Use setname() instead of getname()
        member_id = m;
        books_borrowed = b;
    }

    // Getter methods
    int getMemberId() {
        return member_id;
    }
    int getBooksBorrowed() {
        return books_borrowed;
    }
};

class premium_member : public library_member {
private:
    double membership_fee;
public:
    // Corrected constructor
    premium_member(string n, int m, int b, double mm)
        : library_member(n, m, b) {  // Call base class constructor
        membership_fee = mm;
    }

    // Getter for membership fee
    double getmembershipfee() {
        return membership_fee;
    }
};

int main() {
    premium_member a("Jon", 1427, 57, 7000);

    cout << "Account holder: " << a.getname() << endl;
    cout << "Holder's ID: " << a.getMemberId() << endl;
    cout << "Books borrowed: " << a.getBooksBorrowed() << endl;
    cout << "Membership fee: " << a.getmembershipfee() << endl;

    return 0;
}
