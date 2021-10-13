#include <iostream>
#include <math.h>

using namespace std;

int main()
{
    int choose;

    do
    {
        cout << "=========================" << endl;
        cout << "=   CONVERTER PROGRAM   =" << endl;
        cout << "=     HACKTOBERFEST     =" << endl;
        cout << "=          2021         =" << endl;
        cout << "=========================" << endl;
        cout << "= 1. DECIMAL - BINARY   =" << endl;
        cout << "= 2. BINARY - DECIMAL   =" << endl;
        cout << "= 3. EXIT               =" << endl;
        cout << "=========================" << endl;
        cout << ">> ";
        cin >> choose;

        if (choose == 1)
        {
            int decimal, tmp;
            int binary = 0;
            int digit = 0;

            cout << "Input decimal number : ";
            cin >> decimal;

            while (decimal > 0)
            {
                tmp = decimal % 2;
                binary = binary + (tmp * round(pow((double)10,(double)digit)));
                decimal = decimal / 2;
                digit++;
            }
            cout << "Binary : " << binary << " ";
            cout << endl;
        }
        if (choose == 2)
        {
            int binary, tmp, rem;
            int decimal = 0;
            int digit = 0;

            cout << "Input binary number : ";
            cin >> binary;

            for (int i = 0; i < 8; i++)
            {
                tmp = binary / (int)(pow(10, i) + 0.1) % 10;
                decimal += (pow(2, i) + 0.1) * tmp;
            }

            cout << "Decimal : " << decimal << " ";
            cout << endl;
        }
    cout << endl;
    } while (choose < 3);

    cout << "THANS FOR USING MY PROGRAM" << endl;
    cout << "https://github.com/0xfr3d" << endl;

    return 0;
}
