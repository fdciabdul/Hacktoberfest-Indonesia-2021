#include <iostream>
#include <conio.h>
#include <string.h>
using namespace std;
//Ikhari

int main()
{
    int alas, tinggi, panjang, r, lebar, LP;
    float LS, LL, phi = 3.14;
    char pilih, ulang, keluar, pemberianmenu[150], stringloop[200];

    do
    {
        strcpy(pemberianmenu, "============================\n"
                              "==== MENU LUAS BANGUNAN ====\n\n"
                              "1.MENU LUAS SEGITIGA\n"
                              "2.MENU LUAS LINGKARAN\n"
                              "3.MENU LUAS PERSEGI PANJANG\n"
                              "4.KELUAR\n"
                              "PILIHAN ANDA (1,2,3,4) : ");
        cout << pemberianmenu;
        cin >> pilih;
        cin.ignore();
        cout << "==========================\n";

        switch (pilih)
        {
        case '1':
            cout << "=== MENU LUAS SEGITIGA ===\n\n";
            cout << "MASUKAN NILAI TINGGI : ";
            cin.getline(stringloop, 200);
            tinggi = atoi(stringloop);
            cout << "MASUKAN NILAI ALAS : ";
            cin.getline(stringloop, 200);
            alas = atoi(stringloop);
            LS = 0.5 * alas * tinggi;
            cout << "\nLUAS SEGITIGA TERSEBUT : " << LS;
            break;

        case '2':
            cout << "=== MENU LUAS LINGKARAN ===\n\n";
            cout << "MASUKAN NILAI JARI-JARI : ";
            cin.getline(stringloop, 1000);
            r = atoi(stringloop);
            LL = phi * r * r;
            cout << "\nLUAS LINGKARAN TERSEBUT : " << LL;
            break;

        case '3':
            cout << "== MENU LUAS PERSEGI PANJANG ==\n\n";
            cout << "MASUKAN NILAI PANJANG : ";
            cin.getline(stringloop, 200);
            panjang = atoi(stringloop);
            cout << "MASUKAN NILAI LEBAR : ";
            cin.getline(stringloop, 200);
            lebar = atoi(stringloop);
            LP = panjang * lebar;
            cout << "\nLUAS PERSEGI TERSEBUT : " << LP;
            break;

        case '4':
            strcpy(pemberianmenu, "\n"
                                  "=== KELUAR DARI MENU ===\n"
                                  "\n"
                                  "Enter Something\n");
            cout << pemberianmenu;
            getchar();
            return 0;

        default:
            cout << "PILIHAN ANDA TIDAK ADA DALAM SISTEM\n";
        }
        cout << "\n\nKEMBALI KE MENU UTAMA? (y/n) : ";
        cin >> ulang;
    } while (ulang == 'y' || ulang == 'Y');
    getch();
}