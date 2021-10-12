#include <iostream>

using namespace std;

int main()
{
    int gender;

    do
    {
        cout << "Body Mass Index" << endl;
        cout << "Gender" << endl << endl;
        cout << "1. Male" << endl;
        cout << "2. Female" << endl;
        cout << "3. Exit" << endl << endl;
        cout << "Pilih : ";
        cin >> gender;

        if (gender == 1)
        {
            float height, weight;

            cout << "Input your height : ";
            cin >> height;
            cout << "Input your weight : ";
            cin >> weight;

            float bmi, tmp;

            bmi = (height - 100) - ((height - 100) * 0.10);
            tmp = weight - bmi;

            cout << "Description : " << endl;

            if (weight > bmi)
            {
                if (tmp < 1)
                {
                    cout << "Your Body Mass Index now : " << bmi << " [IDEAL]";
                }
                else
                {
                    cout << "Your Body Mass Index : " << bmi << " [FAT]";
                }
            }
            else
            {
                tmp = tmp * (-1);

                if (tmp < 1)
                {
                    cout << "Your Body Mass Index now : " << bmi << " [IDEAL]";
                }
                else
                {
                    cout << "Your Body Mass Index now : " << bmi << " [THIN]";
                }
            }
        }
        else if (gender == 2)
        {
            float height, weight;

            cout << "Input your height : ";
            cin >> height;
            cout << "Input your weight : ";
            cin >> weight;

            float bmi, tmp;

            bmi = (height - 100) - ((height - 100) * 0.15);
            tmp = weight - bmi;

            cout << "Description : " << endl;

            if (weight > bmi)
            {
                if (tmp < 1)
                {
                    cout << "Your Body Mass Index now : " << bmi << " [IDEAL]";
                }
                else
                {
                    cout << "Your Body Mass Index : " << bmi << " [FAT]";
                }
            }
            else
            {
                tmp = tmp * (-1);

                if (tmp < 1)
                {
                    cout << "Your Body Mass Index now : " << bmi << " [IDEAL]";
                }
                else
                {
                    cout << "Your Body Mass Index now : " << bmi << " [THIN]";
                }
            }
        }
    } while (gender < 3);

    cout << "Thank You " << endl;

    return 0;
}

