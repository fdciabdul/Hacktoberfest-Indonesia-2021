#include <iostream>

using namespace std;

int main()
{
    int num = 1;
    int den = 1;
    int num2 = 0;
    int den2 = 0;
    int range;

    cout << "Range : ";
    cin >> range;

    cout << endl;

    cout << num << "/" << den << " ";

    while (num && den < range)
    {
        num2 = num + 1;
        den2 = (2 * den) + 1;
        cout << num2 << "/" << den2 << " ";
        num++;
        den++;
    }
    cout << endl;
    return 0;
}
