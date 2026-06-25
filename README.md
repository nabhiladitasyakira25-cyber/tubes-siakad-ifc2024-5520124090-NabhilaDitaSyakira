# 🎓 SIAKAD - Sistem Informasi Akademik

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql">
  <img src="https://img.shields.io/badge/Status-Completed-success?style=for-the-badge">
</p>

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
* Mengakses seluruh fitur sistem

### Mahasiswa

* Login ke sistem
* Melihat jadwal perkuliahan
* Mengambil mata kuliah (KRS)
* Menghapus mata kuliah yang telah diambil
* Melihat daftar KRS

---

## ✨ Fitur Utama

### 🔐 Authentication & Authorization

* Login
* Logout
* Role Admin
* Role Mahasiswa
* Middleware Role

### 👨‍🏫 Manajemen Dosen

* Tambah Data Dosen
* Edit Data Dosen
* Hapus Data Dosen
* Lihat Data Dosen

### 👨‍🎓 Manajemen Mahasiswa

* Tambah Data Mahasiswa
* Edit Data Mahasiswa
* Hapus Data Mahasiswa
* Lihat Data Mahasiswa

### 📚 Manajemen Mata Kuliah

* Tambah Mata Kuliah
* Edit Mata Kuliah
* Hapus Mata Kuliah
* Lihat Daftar Mata Kuliah

### 🗓️ Manajemen Jadwal

* Tambah Jadwal
* Edit Jadwal
* Hapus Jadwal
* Penentuan Dosen Pengajar
* Penentuan Hari dan Jam Kuliah
* Penentuan Kelas

### 📝 Kartu Rencana Studi (KRS)

* Ambil Mata Kuliah
* Hapus Mata Kuliah
* Lihat Daftar KRS

### 📊 Dashboard

* Statistik Data Mahasiswa
* Statistik Data Dosen
* Statistik Mata Kuliah
* Statistik Jadwal Perkuliahan

---

## 🛠️ Teknologi yang Digunakan

| Teknologi  | Keterangan         |
| ---------- | ------------------ |
| Laravel    | Framework Backend  |
| PHP        | Bahasa Pemrograman |
| MySQL      | Database           |
| Bootstrap  | User Interface     |
| HTML/CSS   | Frontend           |
| JavaScript | Interaktivitas     |

---

## 🗄️ Struktur Database

Aplikasi menggunakan beberapa tabel utama:

* users
* dosens
* mahasiswas
* mata_kuliahs
* jadwals
* krs

Relasi antar tabel dibangun menggunakan Eloquent Relationship Laravel.

---

## 📷 Dokumentasi Tampilan

Screenshot aplikasi dapat dilihat pada folder:

[📁 Folder Screenshots](./screenshots)
```

---

## 🚀 Cara Menjalankan Project

### Clone Repository

```bash
git clone https://github.com/username/repository.git
```

### Install Dependency

```bash
composer install
```

### Konfigurasi Environment

```bash
cp .env.example .env
```

### Generate Key

```bash
php artisan key:generate
```

### Migrasi Database

```bash
php artisan migrate
```

### Menjalankan Server

```bash
php artisan serve
```

---

## 📂 Struktur Project

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## 👩‍💻 Developer

**Nama :** Nabhila Dita Syakira
**NPM :** 5520124090
**Mata Kuliah :** Web II
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

