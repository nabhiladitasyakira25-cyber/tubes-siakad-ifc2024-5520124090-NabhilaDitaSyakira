# 🎓 SIAKAD - Sistem Informasi Akademik

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql">
  <img src="https://img.shields.io/badge/Status-Completed-success?style=for-the-badge">
</p>

## 🌐 Link Hosting

> **Akses aplikasi melalui link berikut:**  
> 🔗 **[SIAKAD - Sistem Informasi Akademik]**
## 🔑 Akun Login
### 👨‍💼 Admin
- **Email / Username:** `admin@siakad.com`
- **Password:** `password123`
### 👨‍🎓 Mahasiswa
- **Email / Username:** `nabhila@mahasiswa.com`
- **Password:** `password123`

## 📖 Tentang Aplikasi

SIAKAD (Sistem Informasi Akademik) merupakan aplikasi berbasis web yang dibangun menggunakan Framework Laravel untuk membantu pengelolaan kegiatan akademik pada perguruan tinggi.

Aplikasi ini memungkinkan administrator untuk mengelola data dosen, mahasiswa, mata kuliah, jadwal perkuliahan, serta Kartu Rencana Studi (KRS). Selain itu, mahasiswa dapat melihat jadwal kuliah dan melakukan pengisian KRS secara mandiri.

---

## 👨‍💼 Hak Akses Pengguna

### Admin
* Mengelola data dosen
* Mengelola data mahasiswa
* Mengelola data mata kuliah
* Mengelola data jadwal perkuliahan
* Melihat data KRS mahasiswa
* Mencetak data KRS dalam format PDF
* Mengakses seluruh fitur sistem

### Mahasiswa

* Login ke sistem
* Melihat jadwal perkuliahan
* Mengambil mata kuliah (KRS)
* Menghapus mata kuliah yang telah diambil
* Melihat daftar KRS
* Mencetak data KRS dalam format PDF

---
# 📁 Penjelasan Fungsi Halaman

## Halaman Autentikasi

| Halaman | Fungsi |
|----------|---------|
| `Login` | Digunakan sebagai halaman masuk ke dalam sistem menggunakan email dan password sesuai hak akses pengguna. |
| `Logout` | Mengeluarkan pengguna dari sistem dan mengakhiri sesi login dengan aman. |

---

## Halaman Admin

| Halaman | Fungsi |
|----------|---------|
| `Dashboard` | Menampilkan ringkasan informasi sistem seperti jumlah mahasiswa, dosen, mata kuliah, jadwal, dan data KRS. |
| `Data Dosen` | Digunakan untuk melihat, menambahkan, mengubah, serta menghapus data dosen yang terdaftar pada sistem. |
| `Data Mahasiswa` | Mengelola seluruh informasi mahasiswa, termasuk data akun login dan dosen wali. |
| `Data Mata Kuliah` | Mengelola daftar mata kuliah beserta informasi kode mata kuliah, jumlah SKS, dan nama mata kuliah. |
| `Data Jadwal` | Mengatur jadwal perkuliahan yang meliputi mata kuliah, dosen pengampu, hari, jam, ruang, dan kelas. |
| `Data KRS` | Menampilkan seluruh data Kartu Rencana Studi mahasiswa sebagai bahan pemantauan oleh admin. |

---

## Halaman Mahasiswa

| Halaman | Fungsi |
|----------|---------|
| `Dashboard` | Menampilkan informasi singkat mengenai aktivitas akademik mahasiswa setelah berhasil login. |
| `Jadwal Perkuliahan` | Menampilkan jadwal kuliah yang dapat diikuti oleh mahasiswa sesuai data yang tersedia. |
| `KRS` | Digunakan untuk mengambil mata kuliah, melihat daftar mata kuliah yang telah dipilih, serta membatalkan pengambilan mata kuliah apabila diperlukan. |

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| Laravel 12 | Framework Backend |
| PHP 8.2 | Bahasa Pemrograman |
| MySQL | Database |
| Laravel Breeze | Autentikasi |
| Blade Template Engine | Template View |
| Tailwind CSS | Framework CSS |
| JavaScript | Interaktivitas |
| Eloquent ORM | Akses Database |
| Eloquent Relationship | Relasi Data |
| Middleware | Hak Akses |
| Laravel DomPDF | Export PDF |
---


## 🔗 Relasi Antar Tabel (Eloquent Relationship)

| Relasi | Keterangan |
|---------|------------|
| User → Mahasiswa | Satu user memiliki satu data mahasiswa. |
| Dosen → Jadwal | Satu dosen dapat mengajar banyak jadwal. |
| Mata Kuliah → Jadwal | Satu mata kuliah dapat digunakan pada banyak jadwal. |
| Mahasiswa → KRS | Satu mahasiswa dapat memiliki banyak data KRS. |
| Jadwal → KRS | Satu jadwal dapat dipilih oleh banyak mahasiswa melalui KRS. |

Seluruh relasi tersebut diimplementasikan menggunakan **Eloquent ORM** dan **Eloquent Relationship** pada framework Laravel.

## 📷 Dokumentasi Tampilan

Folder screenshot aplikasi:

Screenshot aplikasi dapat dilihat pada folder:

📁 [screenshots](./screenshots)

---

## 🚀 Cara Menjalankan Project

### Clone Repository

```bash
git clone https://github.com/nabhiladitasyakira25-cyber/tubes-siakad-ifc2024-5520124090-NabhilaDitaSyakira.git
```

### Install Dependency

```bash
composer install
npm install && npm run dev
```

### Konfigurasi Environment

```bash
cp .env.example .env
```

### Generate Key

```bash
php artisan key:generate
```

### Migrasi Database & Seeder

```bash
php artisan migrate
php artisan db:seed
```

### Menjalankan Server

```bash
php artisan serve
```

---

## 👩‍💻 Developer

**Nama :** Nabhila Dita Syakira
**NPM :** 5520124090
**Mata Kuliah :** Pemrograman Web II
**Program Studi :** Teknik Informatika

---

## 🎯 Tujuan Pengembangan

Project ini dibuat untuk memenuhi Tugas Besar Mata Kuliah Web II dengan menerapkan konsep:

* Authentication & Authorization
* CRUD Laravel
* Migration
* Seeder
* Eloquent ORM
* Eloquent Relationship
* Middleware
* MVC Architecture

---
