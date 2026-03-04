DROP TABLE IF EXISTS pengumpulan_tugas;
DROP TABLE IF EXISTS materi;
DROP TABLE IF EXISTS tugas;
DROP TABLE IF EXISTS kelas;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'guru', 'siswa') NOT NULL DEFAULT 'siswa'
);

CREATE TABLE kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(120) NOT NULL,
    users_id INT NOT NULL,
    CONSTRAINT fk_kelas_users
        FOREIGN KEY (users_id)
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE materi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kelas_id INT NOT NULL,
    judul VARCHAR(150) NOT NULL,
    deskripsi TEXT NULL,
    file VARCHAR(255) NULL,
    CONSTRAINT fk_materi_kelas
        FOREIGN KEY (kelas_id)
        REFERENCES kelas(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kelas_id INT NOT NULL,
    judul VARCHAR(150) NOT NULL,
    deadline DATETIME NOT NULL,
    CONSTRAINT fk_tugas_kelas
        FOREIGN KEY (kelas_id)
        REFERENCES kelas(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE pengumpulan_tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tugas_id INT NOT NULL,
    user_id INT NOT NULL,
    file VARCHAR(255) NOT NULL,
    nilai DECIMAL(5,2) NULL,
    feedback TEXT NULL,
    CONSTRAINT fk_pengumpulan_tugas
        FOREIGN KEY (tugas_id)
        REFERENCES tugas(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_pengumpulan_users
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

INSERT INTO users (nama, email, password, role) VALUES
('Admin E-Learning', 'admin@elearning.test', '$2y$10$U9mJ4zYjXbQb2JvV4K7xpeYf0p1Y0xjNBjvQWhf5f1Shv0mVYN9jC', 'admin'),
('Budi Pengajar', 'budi@elearning.test', '$2y$10$U9mJ4zYjXbQb2JvV4K7xpeYf0p1Y0xjNBjvQWhf5f1Shv0mVYN9jC', 'guru'),
('Sinta Siswa', 'sinta@elearning.test', '$2y$10$U9mJ4zYjXbQb2JvV4K7xpeYf0p1Y0xjNBjvQWhf5f1Shv0mVYN9jC', 'siswa');

INSERT INTO kelas (nama_kelas, users_id) VALUES
('PHP MVC Dasar', 2),
('Database MySQL untuk Pemula', 2);

INSERT INTO materi (kelas_id, judul, deskripsi, file) VALUES
(1, 'Pengenalan MVC', 'Memahami konsep model, view, controller.', 'materi-mvc.pdf'),
(2, 'Relasi Tabel', 'Belajar relasi one-to-many pada MySQL.', 'relasi-tabel.pdf');

INSERT INTO tugas (kelas_id, judul, deadline) VALUES
(1, 'Buat Router Sederhana', '2026-03-20 23:59:00'),
(2, 'Desain ERD E-Learning', '2026-03-25 23:59:00');

INSERT INTO pengumpulan_tugas (tugas_id, user_id, file, nilai, feedback) VALUES
(1, 3, 'router-sinta.zip', 88.50, 'Struktur sudah rapi, tingkatkan validasi input.');