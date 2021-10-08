Simple Kalkulator Dengan Javascript

```Javascript
const operator = prompt('Tambah/Kali/Kurang/Bagi: ');
const number1 = parseFloat(prompt('Masukan Angka Pertama: '));
const number2 = parseFloat(prompt('Masukan Angka Kedua: '));

let result;
if (operator == '+') {
    result = number1 + number2;
}
else if (operator == '-') {
    result = number1 - number2;
}
else if (operator == '*' || 'x' || 'X') {
    result = number1 * number2;
}
else if (operator == '/' || ':'){
    result = number1 / number2;
}
else {
    console.log('Something Error');
}
console.log(`${number1} ${operator} ${number2} = ${result}`);

```
