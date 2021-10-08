package main
/*
Deklarasi package main merupakan penanda untuk go compiler
agar package di-compile sebagai executable program dan bukan sebagai library.
*/

import "fmt"
/*
package fmt atau format package merupakan package dari go untuk memodifikasi output berupa string, int,
atau format lainnya.
*/
/*
Untuk memanggil package lebih dari satu, misal fmt dan strings, kita bisa menulis dengan

import (
	"fmt"
	"strings"
)
*/

func main()  {
	fmt.Println("Hello World!")
	/*
	baris kode di atas merupakan baris dasar untuk menampilkan Hello World! ke konsol.
	*/
}