#include <iostream>
#include <stdlib.h>
#include <time.h>

using namespace std;

int main()
{
    int choose;
    int random;

    do
    {
        srand(time(NULL));
        cout << "--------------------------------" << endl;
        cout << "|       RANDOM GENERATOR       |" << endl;
        cout << "--------------------------------" << endl;
        cout << "| [1]/[0] >> ";
        cin >> choose;

        cout << endl;

        if (choose == 1)
        {
            random = rand() % 100 + 1; //Random number from 1 to 100
            cout << "RANDOM NUMBER : " << random << endl;
        }

    } while (choose != 0);

    cout << "Thanks for using program" << endl;

    return 0;
}
