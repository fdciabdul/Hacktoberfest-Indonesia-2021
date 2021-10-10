//Copy the contents of one text file to another file, after removing all whitespaces.
#include<fstream>
#include<process.h>
#include<iostream>
using namespace std;
int main(){
fstream f1,f2;
f1.open("sample.txt",ios::in);
f2.open("sample1.txt",ios::out);
if(!f1 || !f2)
{
cout<<"Unable to open the files. Exiting.";
exit(0);
}
char ch;
while(!f1.eof())
{
f1>>ch;
if(ch != ' ')
{
f2<<ch;
}
}
f1.close();
f2.close();
return 0;
}
