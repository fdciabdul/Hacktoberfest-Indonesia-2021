# Hacktoberfest Indonesia

<img alt="HF2020" src="https://hacktoberfest.digitalocean.com/_nuxt/img/logo-hacktoberfest-full.f42e3b1.svg">

# Apa Itu Hacktoberfest ?

Hacktoberfest adalah acara tahunan yang bertujuan untuk mendorong
berkontribusi kedalam ekosistem open source .

Acara ini bebas untuk siapa saja baik untuk pemula hingga professional sekalipun , berlangsung mulai dari tanggal
1 oktober hingga 31 oktober . acara tahun ini di jalankan oleh digital ocean , github dan dev.to . target dari acara ini adalah peserta dapat melakukan 4 pull request di antara tanggal 1 hingga 31 oktober 2021.

# Cara daftar Hacktoberfest

- Buka link ini https://hacktoberfest.digitalocean.com/
- klik Tombol Start Hacking

  <a href="https://hacktoberfest.digitalocean.com/register">
  <img src="https://user-images.githubusercontent.com/31664438/135388900-c636109d-b597-492e-9430-04f22e4e98e6.png">
  </a>
  
- klik signup with github

![image](https://user-images.githubusercontent.com/31664438/135388934-a11297cc-cdf4-42ed-8546-dbd66294f34d.png)

- Centang informasi sesuai dengan informasi dirimu sendiri

Mulailah berkontribusi di berbagai repository di github

# Cara Berkontribusi di Repository Ini

- Silahkan klik `TEMPLATE_BIO.md` kemudian klik edit

- Lalu isi biodata kalian masing masing

- Copy semua kode template yang kalian isi tadi

- Buka folder `profile` di repository ini
  kemudian klik Add File disamping kanan dan klik `Create New File`

- Beri nama file nya `Namamu.md` dan Pastekan kode Markdown yang tadi sudah di copy

- Selamat mengikuti Hacktoberfest 🌠

  Atau kamu bisa mengisi kode dalam folder code , isikan snippet kode apapun didalam nya

---

## Kontributor List

  <img src="https://contrib.rocks/image?repo=fdciabdul/Hacktoberfest-Indonesia-2021" />
Kalian bisa melihat siapa saja yang berkontribusi dalam repository ini

<a href="https://fdciabdul.github.io/Hacktoberfest-Indonesia-2021/"/> Kontributor List</a>

---

## Bagaimana cara berkontribusi di Repository github ?

Berikut langkah-langkahnya secara singkat:

1. Fork it!
2. Buatlah _branch_ fitur baru: `git checkout -b my-new-feature`
3. _Commit_ perubahannya: `git commit -am 'Add some features'`
4. _Push_ ke branch di _remote_: `git push origin my-new-feature`
5. Buat _pull request_

6. Cari proyek open source.  
   _Kali ini, saya sebagai pengembang Android akan menggunakan_ **[awesome-for-beginners](https://github.com/MunGell/awesome-for-beginners)** _sebagai contoh._
7. Cari info tentang aturan kontribusi, atau hubungi developer yang terkait baik via email atau media sosial.
8. Jika memang tidak tertera aturan kontribusi dan sang developer tidak merespon, anda bisa langsung melakukan fork proyek yang akan anda kontribusikan.
9. Setelah selesai fork, maka repository akan masuk ke daftar repo milik anda.

---

## Time to GO CODE ;)

NB: gunakan `git --help` untuk melihat perintah-perintah git lainnya.

1.  Cloning project yang sudah anda fork ke akun anda

        git clone <alamat-repo>

    Contoh:

        git clone git@github.com:CreatorB/MaterialTabs.git

2.  Untuk mempermudah pengembangan, hendaknya kita menambahkan repository pusat dengan lokal milik kita agar tidak terjadi konflik dengan kontributor lainnya.

        git remote add <nama-repo> <alamat-repo>

    Contoh:

        git remote add upstream git://github.com/neokree/MaterialTabs.git

3.  Setelah remote repositori selesai, buatlah branch baru agar tidak merusak history branch utama, dan juga untuk memudahkan racking code.

        git checkout -b <nama-cabang>

    Contoh:

        git checkout -b sample-project

4.  Di cabang baru ini lah kita akan untuk melakukan perubahan kode, yang nantinya bisa kita push ke repo pusat. Untuk berpindah branch bisa kita gunakan `git checkout <nama-cabang>`, dimana `<nama-cabang>` adalah nama yang anda gunakan pada langkah sebelumnya.

5.  Setelah melakukan perubahan, kita bisa lakukan commit berisi deskripsi singkat tentang perubahan yang anda lakukan. Tetapi jika ada penambahan file, bisa menggunakan perintah `git add <nama-file-baru>`, atau gunakan `git add .` untuk menambahkan semua perubahan yang ada di direktori tersebut secara rekursif. Setelah itu baru bisa kita commit.

        git commit -m "<pesan singkat>"

    Contoh:

        git commit -m "fix sample project and added gradle compile"

6.  Setelah selesai melakukan commit, kita akan melakukan persiapan untuk membuat _pull request_ (biasa disingkat PR) ke repo pusat. Pertama kita pindah branch kembali ke master.

        git checkout master

7.  Setelah itu, kita akan mengambil kode lagi dari pusat, untuk memastikan tidak terdapat konflik pada kontribusi kode kita. Konflik dapat terjadi jika dua atau lebih kontributor melakukan perubahan pada satu berkas, terutama jika perubahan dilakukan pada baris yang sama, terlepas dari apakah tujuan perubahan sama atau tidak.

        git fetch upstream
        git merge upstream/master

8.  Dengan proses diatas, setidaknya kita telah bisa memastikan bahwa tidak ada konflik dengan repo pusat. Sekarang kita kembali ke branch lokal development kita `sample-project`.

        git checkout sample-project

9.  Setelah itu, kita gabungkan cabang tersebut dengan cabang utama, sehingga kontribusi dapat dikirimkan kembali ke repositori pusat milik neokree, Material Tabs android library, dengan perintah `git rebase <nama-branch>`.

        git rebase master

10. Sebelum push ke repositori pusat milik neokree, kita akan push ke repository hasil fork di awal pembahasan tadi.

        git push origin sample-project

11. Setelah di push, kita akan melakukan pull request dan membandingkan perubahan yang telah anda lakukan terhadap repo pusat. Anda juga bisa menyisipkan pesan untuk memberitahukan developer pemilik repo pusat tentang apa yang anda lakukan. Setelah yakin terhadap perubahan yang telah anda lakukan, silahkan pilih create pull request dan menunggu tanggapan dari pemilik repo pusat. Lebih lengkapnya bisa anda lihat di tag screenshot.

---

## Embed

![Customized Card](https://github-readme-stats.vercel.app/api/pin?username=fdciabdul&repo=Hacktoberfest-Indonesia-2021&title_color=fff&icon_color=f9f9f9&text_color=9f9f9f&bg_color=151515)

Copy dibawah kode kedalam file berformat markdown

```
![Customized Card](https://github-readme-stats.vercel.app/api/pin?username=fdciabdul&repo=Hacktoberfest-Indonesia-2021&title_color=fff&icon_color=f9f9f9&text_color=9f9f9f&bg_color=151515)
```
## Special Thanks

- [belajargit](https://github.com/endymuhardin/belajarGit) - Repository Untuk Belajar Git
