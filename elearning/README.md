# E-Learning MVC (PHP OOP)

Project ini adalah template sederhana PHP OOP MVC untuk pemula.

## Struktur Folder

- `app/Core` -> kelas inti (App, Router, Controller, View, Config, Database)
- `app/Controllers` -> logika request
- `app/Models` -> akses data
- `app/Views` -> tampilan
- `routes/web.php` -> daftar route
- `config/*.php` -> konfigurasi app dan database

## Menjalankan di Laragon

1. Akses: `http://localhost/elearning`
2. Route utama:
   - `http://localhost/elearning/`
   - `http://localhost/elearning/kelas`

## ERD dan Database

Skema database mengikuti ERD dengan 5 tabel:

- `users`
- `kelas`
- `materi`
- `tugas`
- `pengumpulan_tugas`

Relasi utama:

- `kelas.users_id -> users.id`
- `materi.kelas_id -> kelas.id`
- `tugas.kelas_id -> kelas.id`
- `pengumpulan_tugas.tugas_id -> tugas.id`
- `pengumpulan_tugas.user_id -> users.id`

## Setup Database

1. Buat database `elearning`.
2. Import `database/schema.sql`.
3. Sesuaikan koneksi di `config/database.php`.

Jika database belum siap, aplikasi tetap jalan dengan data contoh.