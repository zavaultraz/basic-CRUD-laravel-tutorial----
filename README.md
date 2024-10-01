arkdown
# Clone dan Setup Project Laravel

## 1. Clone Repository

Hal pertama yang harus dilakukan adalah melakukan clone ke repositori target. Pastikan Anda sudah menginstall Git di mesin lokal dan memiliki akses (minimal Read) terhadap repositori target.

### Contoh Clone dari GitHub

Jika Anda telah melakukan setup SSH Key di Git lokal dan GitHub, Anda dapat menggunakan metode SSH. Jika belum, gunakan metode HTTPS.

Gunakan terminal untuk menjalankan perintah berikut:
bash
git clone git@github.com:showcheap/laravel-apitoken.git
Output yang diharapkan:
Cloning into 'laravel-apitoken'...
remote: Counting objects: 128, done.
remote: Total 128 (delta 0), reused 0 (delta 0), pack-reused 128
Receiving objects: 100% (128/128), 165.48 KiB | 288.00 KiB/s, done.
Resolving deltas: 100% (16/16), done.
## 2. Install Dependency

Dependency adalah sekumpulan library yang dibutuhkan oleh aplikasi Laravel kita, termasuk framework Laravel itu sendiri. List dependency dapat dilihat pada berkas `composer.json`.

Untuk menginstall semua dependency, jalankan perintah berikut:
bash
composer install
Composer akan melakukan penelusuran dependency yang dibutuhkan aplikasi, lalu mengunduhnya ke dalam folder `vendor`. Proses ini mungkin memakan waktu tergantung koneksi internet dan cache Composer.

Output yang diharapkan:
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 59 installs, 0 updates, 0 removals
  - Installing doctrine/inflector (v1.1.0): Downloading (100%)
  - Installing erusev/parsedown (1.6.1): Downloading (100%)
  ...
## 3. Setup Environment Variable

Setelah proses `composer install` selesai, kita perlu membuat file `.env` di folder aplikasi kita. Biasanya sudah ada file sampelnya, cukup salin file tersebut:
bash
cp .env.example .env
Isi semua pengaturan yang perlu dimasukkan, terutama pengaturan koneksi database.

### Penting: App Key

Jika dalam file `.env` yang disalin belum memiliki `APP_KEY`, Anda mungkin akan mendapatkan error. Solusinya, jalankan perintah berikut di terminal:
bash
php artisan key:generate
## 4. Migrate & Seed

Langkah selanjutnya adalah melakukan migrate dan seed dengan menjalankan perintah berikut:
bash
php artisan migrate --seed
## 5. Jalankan Local Dev Server

Setelah semua langkah di atas berhasil, jalankan server lokal dengan perintah:
bash
php artisan serve
## Selesai

Selamat mencoba! 😁👏
