package main

import "fmt"

func main()  {
	// tipe-tipe variabel di GO
	// 1. String
	var kata string
	kata = "Halo"
	fmt.Println(kata)
	/*
	Penjelasan :
	deklarasi variabel dapat dilakukan dengan "var namavariabel tipevariabel
	kemudian diinisiasi nilai atau isi dari variabel tersebut denganan namavariabel = isivariabel
	*/
	// 2. Integer
	/*
	Tipe data integer dapat berupa int, int8, int16, int32 dan int64
	perbedaan integer di atas adalah nilai yang dapat ditampung.
	int tergantung platform.
	int8 => -128 sampai 127
	int16 => -32768 sampai 32767
	int32 => -2147483648 sampai 2147483647
	int64 => -9223372036854775808 sampai 9223372036854775807
	*/
	var angka int = 32
	fmt.Println(angka)

	/*
	selain cara deklarasi di angka 1, deklarasi variabel juga dapat
	dilakukan seperti di angka 2.
	 */

	// 3. Tipe data Boolean
	/*
	Selain string dan integer, go juga memiliki tipe data boolean
	yaitu true dan false saja.
	 */
	trueFalse := true
	fmt.Println(trueFalse)
	/*
	selain angka 1 dan 2, pendeklarasian variabel juga dapat dilakukan seperti
	di angka 3 tanpa menulis var
	 */

	var angka1, angka2 = 1,2
	fmt.Println(angka1, angka2)
	/*
	langkah di atas adalah pendeklarasian lebih dari 1 variabel dalam 1 baris kode
	 */

	kata1, kata2 := "aku", "kamu"
	fmt.Println(kata1, kata2)
	/*
	pendeklarasian tanpa menggunakan var
	 */
}