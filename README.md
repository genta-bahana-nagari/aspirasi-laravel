
# Aspirasi Siswa - Laravel

## 📌 Deskripsi Proyek
**Aspirasi Siswa** adalah aplikasi berbasis web yang digunakan untuk menampung, mengelola, dan menindaklanjuti pengaduan atau aspirasi siswa terkait sarana dan prasarana sekolah.  
Aplikasi ini bertujuan untuk meningkatkan transparansi, efektivitas, dan komunikasi antara siswa dan pihak sekolah.

### Catatan:
- *Proyek ini hanya untuk mentoring, namun anda juga boleh mencobanya sendiri.*
- *Jangan hiraukan branch development. Cukup main saja.*

---

## 🎯 Tujuan
- Menyediakan media resmi pengaduan siswa
- Mempermudah pihak sekolah dalam mengelola laporan
- Meningkatkan kualitas sarana dan prasarana sekolah
- Mencatat status tindak lanjut pengaduan secara sistematis

---

## 🧩 Fitur Utama
- 🔐 Autentikasi pengguna (Login & Register)
- 📝 Pengajuan pengaduan/aspirasi
- 🗂️ Kategori pengaduan
- 📊 Status pengaduan:
  - Terkirim
  - Diproses
  - Dalam Perbaikan
  - Selesai
- 👤 Manajemen sesi pengguna
- 🚪 Logout sistem

---

## 🛠️ Teknologi yang Digunakan
- **Frontend**: Blade, Bootstrap
- **Backend**: PHP (Laravel 12)
- **Database**: MySQL / MariaDB
- **Web Server**: Apache (XAMPP / Laragon)
- **Version Control**: Git

### Catatan:
- *Kali ini tidak harus di folder C:\laragon\www\aspirasi-siswa. Bebas ditaruh folder mana saja. Karena nanti, kita pakai perintah artisan serve untuk menyalakan servernya. Laragon hanya untuk database saja.*

---


## Persyaratan (PENTING DAN WAJIB DIINSTALL)
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)

Step by step ada [disini](https://docs.google.com/document/d/1okyLDBd0aWZotveCJ9VHdl0vnv97R1NEXFlvSckl81Q/edit?usp=sharing)

---

## Instalasi Proyek

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/genta-bahana-nagari/aspirasi-siswa.git
   cd aspirasi-siswa
   ```
   *Jalankan perintah ini di CMD. Folder (direktorinya) bebas mau dimana.*

2. **Install Dependensi Laravel:**
   ```bash
   composer install
   ```

3. **Copy Paste File Environment :**   
   *Copy file .env.example, paste dan rename jadi .env*
   *Ctrl+C dan Ctrl+V biasa di VSCode (pastikan buka VSCode). Nanti ubah bagian ini*:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=buat_database_mu_sendiri!!!
   DB_USERNAME=root
   DB_PASSWORD=sesuaikan_password_root
   ```

4. **Migrasi Tabel dan Buat Key:**
*Oh iya, sekalian jalankan seeder. Karena user admin ini tidak bisa register lewat webnya.*
   ```bash
   php artisan migrate
   php artisan db:seed --class=AdminSeeder ==> Seeder
   php artisan key:generate
   ```

5. **Jalankan Local Server:**
   ```bash
   php artisan serve
   ```
