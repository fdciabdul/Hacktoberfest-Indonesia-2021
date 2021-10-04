#include <iostream>
#include <vector>
#include <string>
using namespace std;
 
// Function that matches an input string with a given wildcard pattern
bool isMatch(string word, string pattern, int n, int m, auto &lookup)
{
    // If both the input string and pattern reach their end,
    // return true
    if (m < 0 && n < 0) {
        return true;
    }
 
    // If only the pattern reaches its end, return false
    else if (m < 0) {
        return false;
    }
 
    // If only the input string reaches its end, return true
    // if the remaining characters in the pattern are all '*'
    else if (n < 0)
    {
        for (int i = 0; i <= m; i++)
        {
            if (pattern[i] != '*') {
                return false;
            }
        }
 
        return true;
    }
 
    // If the subproblem is encountered for the first time
    if (!lookup[m][n])
    {
        if (pattern[m] == '*')
        {
            // 1. '*' matches with current characters in the input string.
            // Here, we will move to the next character in the string.
 
            // 2. Ignore '*' and move to the next character in the pattern
            lookup[m][n] = isMatch(word, pattern, n - 1, m, lookup) ||
                        isMatch(word, pattern, n, m - 1, lookup);
        }
        else {
            // If the current character is not a wildcard character, it
            // should match the current character in the input string
            if (pattern[m] != '?' && pattern[m] != word[n]) {
                lookup[m][n] = 0;
            }
            // check if pattern[0…m-1] matches word[0…n-1]
            else {
                lookup[m][n] = isMatch(word, pattern, n - 1, m - 1, lookup);
            }
        }
    }
 
    return lookup[m][n];
}
 
// Wildcard Pattern Matching Implementation in C++
int main()
{
    string word = "xyxzzxy";
    string pattern = "x***x?";
 
    int n = word.length();
    int m = pattern.length();
 
    // Create a DP lookup table
    vector<vector<bool>> lookup(m + 1, vector<bool>(n + 1, false));
 
    if (isMatch(word, pattern, n - 1, m - 1, lookup)) {
        cout << "Match";
    }
    else {
        cout << "No Match";
    }
 
    return 0;
}
