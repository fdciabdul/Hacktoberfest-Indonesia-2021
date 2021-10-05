#include <iostream>

using namespace std;

int main()
{
    cout << "======== PROGRAM SEQUENTIAL SEARCH CHAR ========\n" << endl;

    char bil_cari, Data[100];
    int i,n, ketemu;

    cout << "Inputan Jumlah Data dalam Array: "; cin >> n;
    cout << endl;

    for(int c=0; c<n; c++){
        cout << "Elemen Data Array Ke-" << c << " = ";
        cin >> Data[c];

    }
    i = 0;
    cout << "\n\nInputkan Bilangan Yang dicari = ";
    cin >> bil_cari;
    ketemu = 0;

    while((i<10) && (ketemu == 0)){
        if(Data[i] == bil_cari){
            ketemu = 1;
            cout << "\nPencarian Sequential " << bil_cari << " Ada Pada Indeks Ke-" << i;
        }else{
            i++;
        }
    }
    if(ketemu == 1){
        cout << "\nData Ditemukan!!!\n";
    }else{
        cout << "\nData Tidak Ditemukan!!!\n";
    }

    return 0;
}
