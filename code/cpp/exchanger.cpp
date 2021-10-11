#include <iostream>
#include <iomanip>
#include <windows.h>

using namespace std;


int main()
{
    int menu;

    do
    {
        cout << "---------------------------" << endl;
        cout << "                           " << endl;
        cout << "      Money Exchanger      " << endl;
        cout << "         v. 1.0.0          " << endl;
        cout << "                           " << endl;
        cout << "---------------------------" << endl;
        cout << "1. Rupiah to US Dollar     " << endl;
        cout << "2. US Dollar to Rupiah     " << endl;
        cout << "3. About Me                " << endl << endl;
        cout << "0. Exit                    " << endl;
        cout << "---------------------------" << endl;
        cout << "Menu : ";
        cin >> menu;
        cout << "---------------------------" << endl;
        if (menu == 1)
        {
            system("CLS");
            float rupiah = 0;
            float dollar = 0; //The Data Type is float because there's some decimal number on USD number
            cout << "---------------------------" << endl;
            cout << "Exchange IDR to USD" << endl;
            cout << "---------------------------" << endl;
            cout << "Rupiah : ";
            cin >> rupiah;
            cout << "---------------------------" << endl;
            dollar = rupiah / 14255;
            cout << "USD : " << fixed << setprecision(2) << dollar << endl; //Setprecisious to manage the decimal number is 2 behind the coma
            cout << "---------------------------" << endl;
            cout << rupiah << " IDR : " << fixed << setprecision(2) << dollar << " USD" << endl;
            cout << "---------------------------" << endl << endl;
        }
        else if (menu == 2)
        {
            system("CLS");
            float dollar = 0;
            float rupiah = 0;
            cout << "---------------------------" << endl;
            cout << "Exchange USD to IDR" << endl;
            cout << "---------------------------" << endl;
            cout << "Dollar : ";
            cin >> dollar;
            cout << "---------------------------" << endl;
            rupiah = dollar * 14255;
            cout << "IDR : " << rupiah << " ,00" << endl;
            cout << "---------------------------" << endl;
            cout << dollar << " USD : " << rupiah << " IDR" << endl;
            cout << "---------------------------" << endl << endl;
        }
        else if (menu == 3) //Use else if because the program only accept 3 for showing "About Me"
        {
            system("CLS");
            cout << "IAM NOBODY" << endl;
        }

    } while (menu > 0); //While menu isn't 0 and not greater than 3, then repeat the menu

    system("CLS");
    cout << endl;
    cout << "Thanks for using my program :D" << endl;

    return 0;
}
