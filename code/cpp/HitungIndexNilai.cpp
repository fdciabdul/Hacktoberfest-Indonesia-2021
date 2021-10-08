#include <iostream>

using namespace std;

/**
    - daftarkan seluruh variable global yang dibutuhkan di sini
**/
//=================================================
int pil,prUTS,prUAS,prTBS,A,B,C,D,E,nUTS,nUAS,nTBS;
double total;
string indexs;
//=================================================


 void main_menu();
 void set_standar();
 void set_proporsi_nilai();
 string hitung_index();
 void input_nilai();
 void thank_you();

int main() {
    main_menu();
    return 0;
}

void main_menu(){
    /**
    - fungsi berisi pilihan menu di dalam aplikasi:
      daftar menu:
      1. set standar index nilai
      2. set proporsi nilai
      3. input nilai
      4. keluar
    - fungsi meminta input pilihan menu dari user
      dan memanggil fungsi menu yang dipilih
    **/

    int pilihan;
    //=================================================
    do{
    cout<<"daftar menu: \n";
    cout<<"1. set standar index nilai \n";
    cout<<"2. set proporsi nilai \n";
    cout<<"3. input nilai \n";
    cout<<"4. keluar \n";
    cout<<"Pilihan anda : ";
    cin>>pil;

    if (pil==1){
        set_standar();
    }
    else if (pil==2){
        set_proporsi_nilai();
    }
    else if (pil==3){
        input_nilai();
        hitung_index();
    }
    } while (pil!=4);
    //=================================================
    thank_you();
}


void set_proporsi_nilai(){
    /**
    - fungsi mengubah prosentase nilai UTS, UAS, dan TUBES
    - fungsi akan menerima 3 input prosentase dari user untuk UTS, UAS, dan TUBES
    - fungsi akan mengulang menerima input dari user jika total prosentase != 100
    **/
    //=================================================
    cout<<"input dalam persen \n";
    cout<<"masukan presentase UTS ";
    cin>>prUTS;
    cout<<"masukan presentase UAS ";
    cin>>prUAS;
    cout<<"masukan presentase TUBES ";
    cin>>prTBS;
    if (prUTS+prUAS+prTBS != 100){
        cout<<"input yang anda masukan salah \n";
        set_proporsi_nilai();
    }
    //=================================================
}

void set_standar(){
    /**
    - fungsi mengubah standar index A, B, C, D, dan E
    - fungsi akan menerima input rentang nilai untuk masing-masing index nilai
    - fungsi akan mengulang menerima input dari user jika terdapat nilai yang overlap
    **/
    //=================================================
    cout<<"masukan standar minimun A ";
    cin>>A;
    cout<<"masukan standar minimum B ";
    cin>>B;
    cout<<"masukan standar minimum C ";
    cin>>C;
    cout<<"masukan standar minimum D ";
    cin>>D;
    cout<<"masukan standar minimum E ";
    cin>>E;
    if (B,C,D,E >= A){
        cout<<"nilai yang anda masukan overlap \n";
        set_standar();
    }
    //=================================================
}


string hitung_index(){
    /**
    - fungsi menghitung total nilai berdasarkan input parameter dan proporsi nilai
    - fungsi menentukan index nilai berdasarkan standar nilai
    - fungsi mengembalikan karakter index nilai
    **/

    char index;
    //=================================================
    total = (nUTS*prUTS/100+nUAS*prUAS/100+nTBS*prTBS/100);
    if (total>=A){
        indexs="A";
        cout<<indexs;
    }
    else if (total>=B){
        indexs="B";
        cout<<indexs;
    }
    else if (total>=C){
        indexs="C";
        cout<<indexs;
    }
    else if (total>=D){
        indexs="D";
        cout<<indexs;
    }
    else if (total>=E){
        indexs="E";
        cout<<indexs;
    }
    //=================================================

}


void input_nilai(){
    /**
    - fungsi menerima input nilai UTS, UAS, dan TUBES
    - fungsi menampilkan index yang didapat berdasarkan input nilai UTS, UAS, dan TUBES
    **/
    double uas, uts, tubes;
    //=================================================
    cout<<"masukan nilai UTS \n";
    cin>>nUTS;
    cout<<"masukan nilai UAS \n";
    cin>>nUAS;
    cout<<"masukan nilai TUBES \n";
    cin>>nTBS;
    //=================================================
}

void thank_you(){
    /**
    - fungsi menampilkan pesan singkat untuk mengakhiri program
    - tampilkan nim dan nama kalian
    **/
    //=================================================
    cout<<"terimakasih sudah menggunakan program ini \n";
    cout<<"Ayatullah Naufal \n";
    cout<<"1301164117 \n";
    //=================================================
}
